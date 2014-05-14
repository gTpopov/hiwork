<?php

/**
 * This is the model class for table "hiwork_user_own_photos".
 *
 * The followings are the available columns in table 'hiwork_user_own_photos':
 * @property string $uop_id
 * @property string $uop_layout_path
 * @property string $uop_avatar_photo
 * @property string $uop_users
 */
class UserOwnPhotos extends CActiveRecord
{

    public $image;


	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'hiwork_user_own_photos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
        return array(
            array(
                'image', 'file',
                'types' => 'jpg, gif, png',
                'maxSize' => 2097152
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
			'uop_id'            => 'id',
			'uop_layout_path'   => 'путь к обложке профиля',
			'uop_avatar_photo'  => 'путь к фото профиля',
			'uop_users'         => 'связь с hiwork_users',
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
		$criteria = new CDbCriteria;

		$criteria->compare('uop_id',           $this->uop_id,true);
		$criteria->compare('uop_layout_path',  $this->uop_layout_path,true);
		$criteria->compare('uop_avatar_photo', $this->uop_avatar_photo,true);
		$criteria->compare('uop_users',        $this->uop_users,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserOwnPhotos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

}
