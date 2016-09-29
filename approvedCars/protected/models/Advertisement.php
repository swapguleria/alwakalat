<?php

/**
 * Company: flamedevelopers < www.flamedevelopers.com>
 * Author : flamedevelopers < flamedevelopers.com >
 */
/**
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property string $desc
 * @property integer $state_id
 * @property integer $type_id
 * @property string $create_time
 */
Yii::import('application.models._base.BaseAdvertisement');
class Advertisement extends BaseAdvertisement
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}