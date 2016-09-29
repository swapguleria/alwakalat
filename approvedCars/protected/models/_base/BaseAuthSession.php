<?php

/**
 * This is the model base class for the table "{{auth_session}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "AuthSession".
 *
 * Columns in table "{{auth_session}}" available as properties of the model,
 * followed by relations of table "{{auth_session}}" available as properties of the model.
 *
 * @property integer $id
 * @property string $auth_code
 * @property string $device_token
 * @property integer $type_id
 * @property integer $create_user_id
 * @property string $create_time
 * @property string $update_time
 *
 * @property User $createUser
 */
abstract class BaseAuthSession extends GxActiveRecord {

	public static function getTypeOptions($id = null)
	{
		$list = array("Unknown","Android","iOS");
		if ($id == null )	return $list;
		if ( is_numeric( $id )) return $list [ $id ];
		return $id;
	}
	public function beforeValidate()
	{
		if($this->isNewRecord)
		{
			if ( !isset( $this->create_time ) )$this->create_time = date( 'Y-m-d H:i:s');
			if ( !isset( $this->update_time ) )$this->update_time = date( 'Y-m-d H:i:s');
			if ( !isset( $this->create_user_id ) )$this->create_user_id = Yii::app()->user->id;
		}else{
			$this->update_time = date( 'Y-m-d H:i:s');
		}
		return parent::beforeValidate();
	}



	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{auth_session}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'AuthSession|AuthSessions', $n);
	}

	public static function representingColumn() {
		return 'auth_code';
	}

	public function rules() {
		return array(
		array('auth_code, create_user_id, create_time, update_time', 'required'),
		array('type_id, create_user_id', 'numerical', 'integerOnly'=>true),
		array('auth_code, device_token,device_id', 'length', 'max'=>256),
		array('type_id', 'default', 'setOnEmpty' => true, 'value' => null),
		array('id, auth_code, device_token,device_id, type_id, create_user_id, create_time, update_time', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'createUser' => array(self::BELONGS_TO, 'User', 'create_user_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'auth_code' => Yii::t('app', 'Auth Code'),
			'device_token' => Yii::t('app', 'Device Token'),
			'type_id' => Yii::t('app', 'Type'),
			'create_user_id' => null,
			'create_time' => Yii::t('app', 'Create Time'),
			'update_time' => Yii::t('app', 'Update Time'),
			'createUser' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('auth_code', $this->auth_code, true);
		$criteria->compare('device_token', $this->device_token, true);
		$criteria->compare('type_id', $this->type_id);
		$criteria->compare('create_user_id', $this->create_user_id);
		$criteria->compare('create_time', $this->create_time, true);
		$criteria->compare('update_time', $this->update_time, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}