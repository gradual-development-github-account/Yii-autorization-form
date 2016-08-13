<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact' ,array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;
                $user = new User;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
                
                $user_data = $user -> find( 'username=:value', array( ':value' => $_POST['LoginForm']['username'] ) );
                
		// collect user input data
		if( isset( $_POST['LoginForm'] ) )
		{   
                    if( $user_data -> username ) {
                        
                        //var_dump($user_data);
                        //var_dump( md5( '{__xx___xx__}'.$_POST['LoginForm']['password'] ) );
                        
                        if ( $user_data -> password == md5( '{__xx___xx__}'.$_POST['LoginForm']['password'] ) ) {
                    
                            if ( $user_data -> activstatus == 1 ) {

                                if( $user_data -> changestatus == 1 ) {
                                    $model->attributes=$_POST['LoginForm'];
                                    // validate user input and redirect to the previous page if valid
                                    if($model->validate() && $model->login())
                                            $this->redirect(Yii::app()->user->returnUrl);                        

                                } else {
                                    Yii::app()->user->setFlash('login-notice','Для входа на сайт необходимо подтвердить изменение пароля. Пожалуйста проверьте Вашу почту и перейдите по ссылке для подтверждения изменения пароля.');
                                }

                            } else {
                                Yii::app()->user->setFlash('login-notice','Для входа на сайт необходимо активировать Ваш аккаунт. Пожалуйста проверьте Вашу почту и перейдите по ссылке для активации аккаунта.');
                            }
                            
                        } else {
                            Yii::app()->user->setFlash('login-error','Введён неправильный пароль.');
                        }
                        
                    } else {
                        Yii::app()->user->setFlash('login-error','Пользователя с таким именем не существует.');
                    }
		} 
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
        
	public function actionRegistration()
	{
            $model = new User;
            $model -> scenario = 'registration';
            $model -> accode = md5('__xx__'.time());
            
            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if (isset($_POST['User'])) 
            {
                $model -> attributes = $_POST['User'];
                $model -> password = md5( '{__xx___xx__}'.$model -> password );
                
                    if ( $model->save() ) {
                        
                        $subject = 'Регистрация на сайте E-Portal ' ;
                        $body = 'Нажмите на ссылку чтобы подтвердить Ваш e-mail адрес:'
                                .'<p>'. $this->createAbsoluteUrl( 'site/activation', array( 'key' => ( $model -> accode )) ) .'</p>';
                        $headers = "From: $model->username <{$model->email}>\r\n" .
                            "Reply-To: {$model->email}\r\n" .
                            "MIME-Version: 1.0\r\n" .
                            "Content-Type: text/html; charset=UTF-8";
                        mail( $model -> email, $subject, $body, $headers );
                         
                        Yii::app()->user->setFlash('registration','Регистрация прошла успешно. Проверьте пожалуйста свой почтовый ящик, чтобы активировать Ваш аккуант');
                    //$this->redirect( array('index') );
                }
            }

            $this -> render('registration', array(
                'model' => $model,
            ));
    }
    
    public function actionActivation( $key )
    {
        if ( isset($key) ) {
            $accode_require = User::model()->find( 'accode=:key', array( ':key' => $key ) );
            
            if ( $accode_require -> activstatus ) {
                Yii::app()->user->setFlash('activation-notice','Ваш аккаунт уже был активирован');
            } else {
                $accode_require -> activstatus = 1;
                $accode_require -> changestatus = 1;
                $accode_require ->save();
                Yii::app()->user->setFlash('activation-success','Спасибо за подтверждение e-mail. Теперь Ваш аккаунт активирован');
            }
        }
        
        $this -> render( 'activation' );
    }

        public function actionConfirmChangePassword( $key )
        {
            if ( isset($key) ) {
                $changecode_require = User::model()->find( 'changecode=:key', array( ':key' => $key ) );
            
                if ( $changecode_require -> changestatus ) {
                    Yii::app()->user->setFlash('confirm-change-notice','Вы уже активировали пароль');
                } else {
                    $changecode_require -> changestatus = 1;
                    $changecode_require ->save();
                    Yii::app()->user->setFlash('confirm-change-success','Спасибо за подтверждение пароля. Теперь Вы можете войти в свой профиль');
                }        
            }
            
            $this -> render( 'confirm' );
        }    

    
    
    public function actionReset()
    {
        $model = new User;
        $model -> scenario = 'reset';
        
        if ( isset( $_POST['User'] ) ) {
            $model -> attributes = $_POST['User'];
            
            if ( $model -> validate() ) {
                $user_data = $model -> find( 'email=:value', array( ':value' => $_POST['User']['email'] ) );
                
                if ( $user_data ) {
                    $temporary_password = User::temporaryPassword();
                    $user_data -> password = md5( '{__xx___xx__}'.$temporary_password );
                    $user_data -> save();

                    $subject = 'Восстановление пароля на сайте E-Portal ';
                    $body = 'Высылаем Вам временный пароль для входа в Ваш аккаунт - ' . $temporary_password;
                    $headers = "From: $user_data->username <{$user_data->email}>\r\n" .
                            "Reply-To: {$user_data->email}\r\n" .
                            "MIME-Version: 1.0\r\n" .
                            "Content-Type: text/html; charset=UTF-8";
                    mail( $user_data -> email, $subject, $body, $headers );
                    Yii::app()->user->setFlash('reset-success','На Ваш email был выслан пароль.');                    
                    
                } else {
                    Yii::app()->user->setFlash('reset-error','Указанный почтовый ящик не зарегистрирован');
                }
            }
        }
        
        $this->render('reset', array(
            'model' => $model,
        ));
    }
}