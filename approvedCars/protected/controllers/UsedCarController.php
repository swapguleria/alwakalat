<?php

class UsedCarController extends GxController
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
            array('allow',
                'actions' => array('index', 'view', /* 'download', 'thumbnail' */),
                'users' => array('*'),
            ),
            array('allow',
                'actions' => array('create', 'toggle', 'togglesold', 'update', 'search', 'admin', 'adminDealer', 'adminApproval', 'adminApproved', 'change', 'delete', 'dealerApproved', 'adminSold', 'dealerSold'),
                'users' => array('@'),
            ),
//				array('allow', 
//					'actions'=>array('admin','delete'),
//					'expression'=>'Yii::app()->user->isAdmin',
//					),
            array('deny',
                'users' => array('*'),
            ),
        );
        }

    public function isAllowed($model)
        {
        return $model->isAllowed();
        }

    public function actionView($id)
        {
        $model = $this->loadModel($id, 'UsedCar');
//if( !($this->isAllowed ( $model)))	throw new CHttpException(403, Yii::t('app','You are not allowed to access this page.'));
        $this->updateMenuItems($model);
        $this->render('view', array(
            'model' => $model
        ));
        }

    public function actionChange()
        {
        $id = $_REQUEST['pk'];
        $model = $this->loadModel($id, 'UsedCar');
        if ($model->state_id == User::STATE_INACTIVE)
            {
            $model->state_id = User::STATE_ACTIVE;
            }
        elseif ($model->state_id == User::STATE_ACTIVE)
            {
            $model->state_id = User::STATE_INACTIVE;
            }
        else
            {
            $model->state_id = User::STATE_INACTIVE;
            }
        $result = $model->saveAttributes(array('state_id'));
        if ($result)
            {
            print 1;
            }
        else
            {
            print 0;
            }
//        echo 1;
//        print_r($_POST);
        }

    public function actionCreate()
        {
        ini_set('post_max_size', '64M');
        ini_set('upload_max_filesize', '64M');
        ini_set('max_execution_time', 300);
        $model = new UsedCar;
        $this->performAjaxValidation($model, 'used-car-form');
        if (isset($_POST['UsedCar']))
            {
//            echo "<pre>";
//            print_r($_POST);
//            die();
            $model->setAttributes($_POST['UsedCar']);
//            $model->saveUploadedFile($model, 'banner_image');
            $model->dealer_id = Yii::app()->user->id;
            if (Yii::app()->user->isAdmin) $model->state_id = User::STATE_ACTIVE;
            else $model->state_id = User::STATE_INACTIVE;
            $model->type_id = User::STATE_ACTIVE;
            if ($model->accident == '0')
                {
                $model->accident_desc = "";
                }
            if ($model->warranty == '0')
                {
                $model->warranty_expire_date = "";
                }
            if ($model->save())
                {
                if (isset($_FILES['UsedCarsImage']))
                    {
                    $i = 0;
                    foreach ($_FILES["UsedCarsImage"]["tmp_name"] as $key => $tmp_name)
                        {
                        $file_name = $_FILES["UsedCarsImage"]["name"][$key];
                        $file_tmp = $_FILES["UsedCarsImage"]["tmp_name"][$key];
                        $path = Yii::app()->basePath . '/..' . UPLOAD_PATH;
                        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
                        $filename = basename($file_name, $ext);
                        $FileName = $key . "-" . time() . "." . $ext;
                        move_uploaded_file($file_tmp = $_FILES["UsedCarsImage"]["tmp_name"][$key], $path . $FileName);
                        $model_image = new UsedCarsImage;
                        if ($i == 0)
                            {
                            $banner_image = $FileName;
                            $model_image->state_id = User::STATE_ACTIVE;
                            }

                        $model_image->car_id = $model->id;
                        $model_image->image = $FileName;
                        $model_image->save();
                        $i++;
                        }
                    $model->banner_image = $banner_image;
                    $model->save();
                    if (Yii::app()->getRequest()->getIsAjaxRequest()) Yii::app()->end();
                    else $this->redirect(array('view', 'id' => $model->id));
                    }
                }else
                {

//                print_r($model->getErrors());
                }
            }
        $this->updateMenuItems($model);
        $this->render('create', array('model' => $model));
        }

    public function actionUpdate($id)
        {
        $model = $this->loadModel($id, 'UsedCar');
        $old_image = $model->banner_image;
//if( !($this->isAllowed ( $model)))	throw new CHttpException(403, Yii::t('app','You are not allowed to access this page.'));
        $this->performAjaxValidation($model, 'used-car-form');
        if (isset($_POST['UsedCar']))
            {

            $model->setAttributes($_POST['UsedCar']);
            $image = $model->saveUploadedFile($model, 'banner_image');
            if (!$image)
                {
                $model->banner_image = $old_image;
                }
            if ($model->save())
                {
                $this->redirect(array('view', 'id' => $model->id));
                }
            }
        $this->updateMenuItems($model);
        $this->render('update', array(
            'model' => $model,
        ));
        }

    public function actionDelete($id)
        {
        $model = $this->loadModel($id, 'UsedCar');
//if( !($this->isAllowed ( $model)))	throw new CHttpException(403, Yii::t('app','You are not allowed to access this page.'));
        if (Yii::app()->getRequest()->getIsPostRequest())
            {
            $this->loadModel($id, 'UsedCar')->delete();
            if (!Yii::app()->getRequest()->getIsAjaxRequest()) $this->redirect(array('admin'));
            }
        else throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
        }

    public function actionIndex()
        {
        $this->updateMenuItems();
        $dataProvider = new CActiveDataProvider('UsedCar');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
        }

    public function actionSearch()
        {
        $model = new Job('search');
        $model->unsetAttributes();
        $this->updateMenuItems($model);
        if (isset($_GET['UsedCar']))
            {
            $model->setAttributes($_GET['UsedCar']);
            $this->renderPartial('_list', array(
                'dataProvider' => $model->search(),
                'model' => $model,
            ));
            }
        $this->renderPartial('_search', array(
            'model' => $model,
        ));
        }

    public function actionAdmin()
        {
        $model = new UsedCar('search');
        $model->unsetAttributes();
        $this->updateMenuItems($model);
        if (isset($_GET['UsedCar'])) $model->setAttributes($_GET['UsedCar']);
        $this->render('admin', array(
            'model' => $model,
        ));
        }

    public function actionAdminDealer()
        {
        $model = new UsedCar('search');
        $model->unsetAttributes();
        $this->updateMenuItems($model);
        if (isset($_GET['UsedCar'])) $model->setAttributes($_GET['UsedCar']);
        $this->render('adminDealer', array(
            'model' => $model,
        ));
        }

    public function actionadminApproval()
        {
        $model = new UsedCar('search');
        $model->unsetAttributes();
        $this->updateMenuItems($model);
        if (isset($_GET['UsedCar'])) $model->setAttributes($_GET['UsedCar']);
        $this->render('adminApproval', array(
            'model' => $model,
        ));
        }

    public function actionToggle()
        {
//        print_r($_POST);
//        print_r($_REQUEST['pk']);
//        echo "sad";
        $model = $this->loadModel($_REQUEST['pk'], 'UsedCar');
        print_r($model);
        if ($model->state_id == User::STATE_ACTIVE) $model->state_id = User::STATE_INACTIVE;
        else $model->state_id = User::STATE_ACTIVE;
        if ($model->save())
            {
            return array(
                'toggle' => array(
                    'class' => 'booster.actions.TbToggleAction',
                    'modelName' => 'state_id',
                )
            );
            }
//else {
// print_r($model->getErrors());
//
//}
        }

    public function actionTogglesold()
        {
//        print_r($_POST);
//        print_r($_REQUEST['pk']);
//        echo "sad";
        $model = $this->loadModel($_REQUEST['pk'], 'UsedCar');
//        print_r($model);
        $model->type_id = User::STATE_INACTIVE;
        $model->expire_date = $tomorrow = date('y-m-d', time() + 3*86400);;
        
        if ($model->save())
            {
            return array(
                'toggle' => array(
                    'class' => 'booster.actions.TbToggleAction',
                    'modelName' => 'type_id',
                )
            );
            }
//else {
// print_r($model->getErrors());
//
//}
        }

    public function actionAdminApproved()
        {
        $model = new UsedCar('search');
        $model->unsetAttributes();
        $this->updateMenuItems($model);
        if (isset($_GET['UsedCar'])) $model->setAttributes($_GET['UsedCar']);
        $this->render('adminApproved', array(
            'model' => $model,
        ));
        }

    public function actionDealerSold()
        {
        $model = new UsedCar('search');
        $model->unsetAttributes();
        $this->updateMenuItems($model);
        if (isset($_GET['UsedCar'])) $model->setAttributes($_GET['UsedCar']);
        $this->render('dealerSold', array(
            'model' => $model,
        ));
        }

    public function actionDealerApproved()
        {
        $model = new UsedCar('search');
        $model->unsetAttributes();
        $this->updateMenuItems($model);
        if (isset($_GET['UsedCar'])) $model->setAttributes($_GET['UsedCar']);
        $this->render('dealerApproved', array(
            'model' => $model,
        ));
        }

    public function actionAdminSold()
        {
        $model = new UsedCar('search');
        $model->unsetAttributes();
        $this->updateMenuItems($model);
        if (isset($_GET['UsedCar'])) $model->setAttributes($_GET['UsedCar']);
        $this->render('adminSold', array(
            'model' => $model,
        ));
        }

    /* protected function processActions($model = null)
      {
      parent::processActions($model);
      //$this->actions [] = array('label'=>Yii::t('app', 'Add Skill'), 'url'=>array('skill', 'id' => $model->id),'icon'=>'icon-plus icon-white');
      } */

    protected function updateMenuItems($model = null)
        {
// create static model if model is null
        if ($model == null) $model = new UsedCar();
        switch ($this->action->id)
            {
            case 'update':
                    {
                    $this->menu[] = array('label' => Yii::t('app', 'View'), 'url' => array('view', 'id' => $model->id), 'icon' => 'icon-plus icon-white');
                    }
            case 'create':
                    {
//                    $this->menu[] = array('label' => Yii::t('app', 'Manage'), 'url' => array('admin'), 'visible' => Yii::app()->user->isAdmin, 'icon' => 'icon-wrench icon-white');
//                    $this->menu[] = array('label' => Yii::t('app', 'Manage'), 'url' => array('adminDealer'), 'visible' => Yii::app()->user->isUser, 'icon' => 'icon-wrench icon-white');
//                    $this->menu[] = array('label' => Yii::t('app', 'List'), 'url' => array('index'), 'icon' => 'icon-th-list icon-white');
                    }
                break;
            case 'index':
                    {
                    $this->menu[] = array('label' => Yii::t('app', 'Manage'), 'url' => array('admin'), 'visible' => Yii::app()->user->isAdmin, 'icon' => 'icon-wrench icon-white');
                    $this->menu[] = array('label' => Yii::t('app', 'Create'), 'url' => array('create'), 'icon' => 'icon-plus icon-white');
                    }
                break;
            case 'admin':
                    {
//                    $this->menu[] = array('label' => Yii::t('app', 'List'), 'url' => array('index'), 'icon' => 'icon-th-list icon-white');
//$this->menu[] = array('label' => Yii::t('app', 'Create'), 'url' => array('create'), 'icon' => 'icon-plus icon-white');
                    }
                break;
            case 'adminApproval':
                    {
//                    $this->menu[] = array('label' => Yii::t('app', 'List'), 'url' => array('index'), 'icon' => 'icon-th-list icon-white');
//$this->menu[] = array('label' => Yii::t('app', 'Create'), 'url' => array('create'), 'icon' => 'icon-plus icon-white');
                    }
                break;
            case 'adminSold':
                    {
//                    $this->menu[] = array('label' => Yii::t('app', 'List'), 'url' => array('index'), 'icon' => 'icon-th-list icon-white');
//$this->menu[] = array('label' => Yii::t('app', 'Create'), 'url' => array('create'), 'icon' => 'icon-plus icon-white');
                    }
                break;
            case 'dealerSold':
                    {
//                    $this->menu[] = array('label' => Yii::t('app', 'List'), 'url' => array('index'), 'icon' => 'icon-th-list icon-white');
//$this->menu[] = array('label' => Yii::t('app', 'Create'), 'url' => array('create'), 'icon' => 'icon-plus icon-white');
                    }
                break;
            case 'adminDealer':
                    {
//                    $this->menu[] = array('label' => Yii::t('app', 'List'), 'url' => array('index'), 'icon' => 'icon-th-list icon-white');
                    $this->menu[] = array('label' => Yii::t('app', 'Create'), 'url' => array('create'), 'icon' => 'icon-plus icon-white');
                    }
                break;
            default:
            case 'view':
                    {
//					$this->menu[] = array('label'=>Yii::t('app', 'List'), 'url'=>array('index'),'icon'=>'icon-th-list icon-white');
                    $this->menu[] = array('label' => Yii::t('app', 'Manage'), 'url' => array('admin'), 'visible' => Yii::app()->user->isAdmin, 'icon' => 'icon-wrench icon-white');
                    $this->menu[] = array('label' => Yii::t('app', 'Manage'), 'url' => array('adminDealer'), 'visible' => Yii::app()->user->isUser, 'icon' => 'icon-wrench icon-white');
//                    $this->menu[] = array('label' => Yii::t('app', 'Delete'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id),
//                            'confirm' => 'Are you sure you want to delete this item?'), 'visible' => Yii::app()->user->isAdmin, 'icon' => 'icon-remove icon-white');
//                    $this->menu[] = array('label' => Yii::t('app', 'Create'), 'url' => array('create'), 'icon' => 'icon-plus icon-white');
                    $this->menu[] = array('label' => Yii::t('app', 'Update'), 'url' => array('update', 'id' => $model->id), 'visible' => Yii::app()->user->isAdmin, 'icon' => 'icon-edit icon-white');
                    }
                break;
            }
// Add SEO headers
        $this->processSEO($model);
//merge actions with menu
        $this->actions = array_merge($this->actions, $this->menu);
        }

    }
