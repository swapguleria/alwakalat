<?php
/**
 * Company: flamedevelopers < www.flamedevelopers.com>
 * Author : flamedevelopers < flamedevelopers.com >
 */
/**
 * @property integer $id
 * @property integer $maker_id
 * @property integer $model_id
 * @property integer $body_type_id
 * @property integer $year
 * @property double $milage
 * @property string $accident
 * @property string $accident_desc
 * @property string $warranty
 * @property string $warranty_expire_date
 * @property integer $service_package
 * @property integer $gear_type
 * @property integer $exterior_color
 * @property integer $interior_color
 * @property string $roof
 * @property string $camera
 * @property string $GPS
 * @property integer $fuel_type
 * @property integer $owners
 * @property integer $transmission
 * @property integer $kilometer
 * @property integer $price
 * @property integer $dealer_id
 * @property string $type_id
 * @property string $state_id
 * @property integer $create_user_id
 * @property string $create_time
 */
Yii::import('application.models._base.BaseUsedCar');

class UsedCar extends BaseUsedCar
    {

    public static function model($className = __CLASS__)
        {
        return parent::model($className);
        }

    protected function beforeDelete()
        {

        UsedCarsImage::model()->deleteAllByAttributes(array(
            'car_id' => $this->id
        ));
        
        return parent::beforeDelete();
        }

    }
