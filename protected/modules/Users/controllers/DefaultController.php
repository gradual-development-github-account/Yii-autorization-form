<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
        
        public function actionSettings()
	{
		$this->render('settings');
	}
        
        public function actionMessage()
	{
		$this->render('message');
	}
        
        public function actionChange()
	{
            $model = new User;  
            $model -> scenario = 'change';
            
            if ( isset( $_POST['User'] ) ) {
                $model -> attributes = $_POST['User'];
                
                if ( $model -> validate() ) {
                    $user_data = $model -> find( 'id=:value', array( ':value' => Yii::app()->user->id ) );
                    $user_data -> password = md5( '{__xx___xx__}'.$_POST['User']['password'] );
                    $user_data -> changestatus = 0;
                    $user_data -> changecode = md5('__xx__2'.time());;
                    $user_data ->save();
                    
                    $subject = 'Изменение пароля на сайте E-Portal ';
                    $body = 'Нажмите на ссылку чтобы подтвердить изменение пароля'
                            //.'<p>'. CHtml::link( CHtml::encode('Перейдите по ссылки для активации'), array( 'site/activation', 'key' => ( $model -> accode )) ) .'</p>';
                            . '<p>' . $this->createAbsoluteUrl('/site/ConfirmChangePassword', array('key' => ( $user_data -> changecode ))) . '</p>';
                    $headers = "From: $user_data->username <{$user_data->email}>\r\n" .
                            "Reply-To: {$user_data->email}\r\n" .
                            "MIME-Version: 1.0\r\n" .
                            "Content-Type: text/html; charset=UTF-8";
                    mail($user_data -> email, $subject, $body, $headers );                    
                    
                    Yii::app()->user->setFlash('change-success','На Ваш email было отправлено письмо, для подтверждения изменения пароля.');
                }
            }
            
		$this->render('change' ,array('model'=>$model) );
	}      
}