<?php
/**
 * Company: flamedevelopers < www.flamedevelopers.com>
 * Author : flamedevelopers < flamedevelopers.com >
 */
/**
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property string $text
 * @property string $city
 * @property string $state
 * @property integer $state_id
 * @property integer $type_id
 * @property string $create_time
 */
Yii::import('application.models._base.BaseTestimonial');

class Testimonial extends BaseTestimonial
    {

    public static function model($className = __CLASS__)
        {
        return parent::model($className);
        }

    public function getImage()
        {
        if (!empty($this->image))
            {
            $image = $this->image;
            return Yii::app()->createAbsoluteUrl('user/thumbnail', array(
                        'file' => $image
            ));
            }
        return Yii::app()->theme->baseUrl . '/images/user.jpg';
        }

    }
