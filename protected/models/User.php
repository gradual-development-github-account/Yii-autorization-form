<?php

/**
 * This is the model class for table "{{users}}".
 *
 * The followings are the available columns in table '{{users}}':
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password
 */
class User extends CActiveRecord
{
    public $verifyCode;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{users}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('username, email, password', 'required', 'on' => 'registration' ),
                        array('email', 'email', 'on' => 'registration'),   
                        array('email', 'unique', 'on' => 'registration'),   
                        array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(), 'on' => 'registration'),
                    
                        array('email', 'required',  'on' => 'reset' ),
                        array('email', 'email',     'on' => 'reset' ),
                    
                        array('password, confirmpassword', 'required', 'on' => 'change' ),
                        array('password, confirmpassword', 'length',  'min'=>5, 'on' => 'change' ),
                        array('password', 'compare',  'compareAttribute' => 'confirmpassword', 'message' => 'Введённые пароли не совпадают', 'on' => 'change' ),
                        
			array('username, email, password', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, email, password', 'safe', 'on'=>'search'),
                        
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Имя пользователя',
			'email' => 'Email',
			'password' => 'Пароль',
                        'confirmpassword' => 'Подтверждение пароля',
                        'verifyCode' => 'Код на изображении',
                        'accode' => 'Код активации аккуанта',
                        'activstatus' => 'Статус активации'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

        public function change() {
            
        }
        
        
        
        
        public function beforeSave() 
        {
//            $this -> password = md5( '{__xx___xx__}'.$this -> password );
            
            return parent::beforeSave();
        }
        
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public static function temporaryPassword () {
            // Символы, которые будут использоваться в пароле.
            $chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
            // Количество символов в пароле.
            $max=10;
            // Определяем количество символов в $chars
            $size=StrLen($chars)-1;
            // Определяем пустую переменную, в которую и будем записывать символы.
            $password=null;
            // Создаём пароль.
            while($max--)
            $password.=$chars[rand(0,$size)];
            
            return $password;
        }
}
