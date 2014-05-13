<?php

/**
 * This is the model class for table "hiwork_users".
 *
 * The followings are the available columns in table 'hiwork_users':
 * @property string $user_id
 * @property string $user_first_name
 * @property string $user_last_name
 * @property string $user_nick_name
 * @property string $user_main_email
 * @property string $user_password
 * @property string $user_contact_email
 * @property string $user_phone
 * @property string $user_skype_login
 * @property string $user_age
 * @property string $user_gender
 * @property string $user_profession
 * @property string $user_work_search_status
 * @property string $user_payment_size
 * @property string $user_payment_work_type
 * @property string $user_prepayment_size
 * @property string $user_owner_type
 * @property string $user_pay_way
 * @property string $user_skills
 * @property string $user_self_story
 * @property string $user_location
 * @property string $user_registration_date
 * @property string $user_last_enter_date
 * @property string $user_link_to_vk
 * @property string $user_link_to_fb
 * @property string $user_link_to_gp
 * @property string $user_link_to_tw
 * @property string $user_role_access
 * @property string $user_account_status
 */
class Users extends CActiveRecord
{

    const SCENARIO_REGISTRATION = 'registration';

    const ROLE_ADMIN  = 'admin';
    const ROLE_MODER  = 'moderator';
    const ROLE_USER   = 'user';
    const ROLE_BANNED = 'banned';

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'hiwork_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(

            array(
                'user_nick_name, user_main_email, user_password','required',
                'on'      =>  self::SCENARIO_REGISTRATION,
                'message' => '{attribute} не заполнен'
            ),
            array(
                'user_nick_name, user_main_email','unique',
                'on'      => self::SCENARIO_REGISTRATION,
                'message' => 'Этот {attribute} уже занят'
            ),
            array(
                'user_main_email', 'match',
                'pattern' => '/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/',
                'on'      => self::SCENARIO_REGISTRATION,
                'message' => '{attribute} содержит ошибку'
            ),
            array(
                'user_password', 'length',
                'on'    => self::SCENARIO_REGISTRATION,
                'min'   => 8, 'max' => 32
            ),

		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id'                 => 'id',
			'user_first_name'         => 'имя',
			'user_last_name'          => 'фамилия',
			'user_nick_name'          => 'никнейм',
			'user_main_email'         => 'email',
			'user_password'           => 'пароль',
			'user_contact_email'      => 'контактный email',
			'user_phone'              => 'телефон',
			'user_skype_login'        => 'skype логин',
			'user_age'                => 'возраст',
			'user_gender'             => 'пол',
			'user_profession'         => 'профессия',
			'user_work_search_status' => 'статус поиска проетов/работы',
			'user_payment_size'       => 'оплата',
			'user_payment_work_type'  => 'тип оплаты',
			'user_prepayment_size'    => 'размер предоплаты',
			'user_owner_type'         => 'форма собственности',
			'user_pay_way'            => 'способ оплаты',
			'user_skills'             => 'навыки',
			'user_self_story'         => 'о себе',
			'user_location'           => 'местонахождения',
			'user_registration_date'  => 'дата регистрации',
			'user_last_enter_date'    => 'дата последнего входа',
			'user_link_to_vk'         => 'User Link To Vk',
			'user_link_to_fb'         => 'User Link To Fb',
			'user_link_to_gp'         => 'User Link To Gp',
			'user_link_to_tw'         => 'User Link To Tw',
			'user_role_access'        => 'User Role Access',
			'user_account_status'     => 'User Account Status',
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

		$criteria->compare('user_id',                   $this->user_id,                 true);
		$criteria->compare('user_first_name',           $this->user_first_name,         true);
		$criteria->compare('user_last_name',            $this->user_last_name,          true);
		$criteria->compare('user_nick_name',            $this->user_nick_name,          true);
		$criteria->compare('user_main_email',           $this->user_main_email,         true);
		$criteria->compare('user_password',             $this->user_password,           true);
		$criteria->compare('user_contact_email',        $this->user_contact_email,      true);
		$criteria->compare('user_phone',                $this->user_phone,              true);
		$criteria->compare('user_skype_login',          $this->user_skype_login,        true);
		$criteria->compare('user_age',                  $this->user_age,                true);
		$criteria->compare('user_gender',               $this->user_gender,             true);
		$criteria->compare('user_profession',           $this->user_profession,         true);
		$criteria->compare('user_work_search_status',   $this->user_work_search_status, true);
		$criteria->compare('user_payment_size',         $this->user_payment_size,       true);
		$criteria->compare('user_payment_work_type',    $this->user_payment_work_type,  true);
		$criteria->compare('user_prepayment_size',      $this->user_prepayment_size,    true);
		$criteria->compare('user_owner_type',           $this->user_owner_type,         true);
		$criteria->compare('user_pay_way',              $this->user_pay_way,            true);
		$criteria->compare('user_skills',               $this->user_skills,             true);
		$criteria->compare('user_self_story',           $this->user_self_story,         true);
		$criteria->compare('user_location',             $this->user_location,           true);
		$criteria->compare('user_registration_date',    $this->user_registration_date,  true);
		$criteria->compare('user_last_enter_date',      $this->user_last_enter_date,    true);
		$criteria->compare('user_link_to_vk',           $this->user_link_to_vk,         true);
		$criteria->compare('user_link_to_fb',           $this->user_link_to_fb,         true);
		$criteria->compare('user_link_to_gp',           $this->user_link_to_gp,         true);
		$criteria->compare('user_link_to_tw',           $this->user_link_to_tw,         true);
		$criteria->compare('user_role_access',          $this->user_role_access,        true);
		$criteria->compare('user_account_status',       $this->user_account_status,     true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}


    protected function beforeSave(){

        $this->user_password = md5('HiWork.greg.2014'.$this->user_password);
        return parent::beforeSave();

    }

}
