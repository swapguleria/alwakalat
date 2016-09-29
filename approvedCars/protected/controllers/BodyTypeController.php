<?php

class BodyTypeController extends GxController
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
                'actions' => array('create', 'update', 'search', 'admin', 'adminDealer', 'delete'),
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
        $model = $this->loadModel($id, 'BodyType');

        //if( !($this->isAllowed ( $model)))	throw new CHttpException(403, Yii::t('app','You are not allowed to access this page.'));

        $this->updateMenuItems($model);
        $this->render('view', array(
            'model' => $model
        ));
        }

    public function actionCreate()
        {
        $model = new BodyType;

        $this->performAjaxValidation($model, 'body-type-form');

        if (isset($_POST['BodyType']))
            {
            $model->setAttributes($_POST['BodyType']);
            $model->saveUploadedFile($model, 'image');

            if ($model->save())
                {
                if (Yii::app()->getRequest()->getIsAjaxRequest()) Yii::app()->end();
                else $this->redirect(array('admin'));
                }
            }
        $this->updateMenuItems($model);
        $this->render('create', array('model' => $model));
        }

    public function actionUpdate($id)
        {
        $model = $this->loadModel($id, 'BodyType');
        $old_logo = $model->image;
        //if( !($this->isAllowed ( $model)))	throw new CHttpException(403, Yii::t('app','You are not allowed to access this page.'));

        $this->performAjaxValidation($model, 'body-type-form');

        if (isset($_POST['BodyType']))
            {
            $model->setAttributes($_POST['BodyType']);
            $new = $model->saveUploadedFile($model, 'image');
            if (!$new)
                {
                $model->image = $old_logo;
                }
            if ($model->save())
                {
                $this->redirect(array('admin'));
                }
            }
        $this->updateMenuItems($model);
        $this->render('update', array(
            'model' => $model,
        ));
        }

    public function actionDelete($id)
        {
        $model = $this->loadModel($id, 'BodyType');

        //if( !($this->isAllowed ( $model)))	throw new CHttpException(403, Yii::t('app','You are not allowed to access this page.'));

        if (Yii::app()->getRequest()->getIsPostRequest())
            {
            $this->loadModel($id, 'BodyType')->delete();

            if (!Yii::app()->getRequest()->getIsAjaxRequest()) $this->redirect(array('admin'));
            }
        else throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
        }

    public function actionIndex()
        {
        $this->updateMenuItems();
        $dataProvider = new CActiveDataProvider('BodyType');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
        }

    public function actionSearch()
        {
        $model = new Job('search');
        $model->unsetAttributes();
        $this->updateMenuItems($model);

        if (isset($_GET['BodyType']))
            {
            $model->setAttributes($_GET['BodyType']);
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
        $model = new BodyType('search');
        $model->unsetAttributes();
        $this->updateMenuItems($model);

        if (isset($_GET['BodyType'])) $model->setAttributes($_GET['BodyType']);

        $this->render('admin', array(
            'model' => $model,
        ));
        }

    public function actionAdminDealer()
        {
        $model = new BodyType('search');
        $model->unsetAttributes();
        $this->updateMenuItems($model);

        if (isset($_GET['BodyType'])) $model->setAttributes($_GET['BodyType']);

        $this->render('adminDealer', array(
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
        if ($model == null) $model = new BodyType();

        switch ($this->action->id)
            {
            case 'update':
                    {
//                    $this->menu[] = array('label' => Yii::t('app', 'View'), 'url' => array('view', 'id' => $model->id), 'icon' => 'icon-plus icon-white');
                    }
            case 'create':
                    {
                    $this->menu[] = array('label' => Yii::t('app', 'Manage'), 'url' => array('adminDealer'), 'visible' => Yii::app()->user->isUser, 'icon' => 'icon-wrench icon-white');
                    $this->menu[] = array('label' => Yii::t('app', 'Manage'), 'url' => array('admin'), 'visible' => Yii::app()->user->isAdmin, 'icon' => 'icon-wrench icon-white');
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
                    $this->menu[] = array('label' => Yii::t('app', 'Create'), 'url' => array('create'), 'icon' => 'icon-plus icon-white');
                    }
                break;
            default:
            case 'view':
                    {
//                    $this->menu[] = array('label' => Yii::t('app', 'List'), 'url' => array('index'), 'icon' => 'icon-th-list icon-white');
                    $this->menu[] = array('label' => Yii::t('app', 'Manage'), 'url' => array('adminDealer'), 'visible' => Yii::app()->user->isUser, 'icon' => 'icon-wrench icon-white');
                    $this->menu[] = array('label' => Yii::t('app', 'Manage'), 'url' => array('admin'), 'visible' => Yii::app()->user->isAdmin, 'icon' => 'icon-wrench icon-white');
//                    $this->menu[] = array('label' => Yii::t('app', 'Delete'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id),
//                            'confirm' => 'Are you sure you want to delete this item?'), 'visible' => Yii::app()->user->isAdmin, 'icon' => 'icon-remove icon-white');
                    $this->menu[] = array('label' => Yii::t('app', 'Create'), 'url' => array('create'), 'icon' => 'icon-plus icon-white');
                    $this->menu[] = array('label' => Yii::t('app', 'Update'), 'url' => array('update', 'id' => $model->id), 'icon' => 'icon-edit icon-white');
                    }
                break;
            }

        // Add SEO headers
        $this->processSEO($model);

        //merge actions with menu
        $this->actions = array_merge($this->actions, $this->menu);
        }

    }
