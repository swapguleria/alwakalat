<?php

class DashboardController extends GxController
    {

    public function filters()
        {
        return array(
            'accessControl',
        );
        }

    public function accessRules()
        {
        return array(
            array(
                'allow',
                'actions' => array(
                    'index',
                ),
                'expression' => 'Yii::app()->user->isAdmin'
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
        }

    public function actionIndex()
        {
//        $lists = Yii::app()->mailchimp->lists();
        $data = Yii::app()->mailchimp->emailExists("neerajk@gmaila.com");
//        echo "<pre>";
//        print_r($data);
        $total_users = User::model()->count();
        $total_jobs = $total_requirements = $total_transection = 10;
//	$criteria=new CDbCriteria();
//	$criteria->Compare('type_id',Job::POST_ADVERTISER);
//	$total_jobs =Job::model()->count($criteria);
//
//	
//	$criteria=new CDbCriteria();
//	$criteria->Compare('type_id',Job::POST_REQUEST);
//	$total_requirements =Job::model()->count($criteria);
//	
//	
//		$criteria=new CDbCriteria();
//		$criteria->addCondition('type_id='.SubscriptionPlans::SUBSCRIPTION_PAID);
//		$total_transection=UserPlan::model()->count($criteria);
//
        $model = new user ( );
//		$model = new Job ( 'search' );
// 		$model->unsetAttributes ();


        $this->render('index', array(
            'total_user' => $total_users,
            'total_jobs' => $total_jobs,
            'total_transection' => $total_transection,
            'total_requirements' => $total_requirements,
            'model' => $model
        ));
        }

    }
