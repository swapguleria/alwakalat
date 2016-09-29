<?php
$this->breadcrumbs = array(
    $model->label(2) => array('index'),
    Yii::t('app', 'Manage'),
);
?>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <section class="content-header pull-left">
                        <h1><?php echo Yii::t('app', 'Manage') . ' : ' . GxHtml::encode($model->label(2)); ?></h1>
                    </section> 
                    <?php
                    $this->widget('booster.widgets.TbMenu', array(
                        'type' => 'navbar',
                        'items' => $this->actions,
                        'htmlOptions' => array('class' => 'pull-right btn-group'),
                    ));
                    ?>
                </div>    <div class="box-body">
                    <div class="table-outer">
                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'id' => 'used-car-grid',
                            'type' => 'striped bordered condensed',
                            'dataProvider' => $model->searchApproved(),
                            'filter' => $model,
                            'columns' => array(
                                'id',
                                array(
                                    'name' => 'maker_id',
                                    'value' => 'GxHtml::valueEx($data->maker)',
                                    'filter' => GxHtml::listDataEx(Maker::model()->findAllAttributes(null, true))
                                ),
                                array(
                                    'name' => 'model_id',
                                    'value' => 'GxHtml::valueEx($data->model)',
                                    'filter' => GxHtml::listDataEx(CarModel::model()->findAllAttributes(null, true))
                                ),
                                array(
                                    'name' => 'body_type_id',
                                    'value' => 'GxHtml::valueEx($data->bodyType)',
                                    'filter' => GxHtml::listDataEx(BodyType::model()->findAllAttributes(null, true))
                                ),
                                array(
                                    'header' => 'Added by ',
                                    'name' => 'dealer_id',
                                    'value' => 'GxHtml::valueEx($data->dealer)',
                                    'filter' => GxHtml::listDataEx(User::model()->findAllAttributes(null, true))
                                ),
//                                array(
//                                    'name' => 'body_type_id',
////				'value'=>'$data->getTypeOptions($data->body_type_id)',
////				'filter'=>UsedCar::getTypeOptions(),
//                                ),
//                                'year',
//                                'milage',
                                /*
                                  'accident',
                                  'accident_desc:html',
                                  'warranty',
                                  'warranty_expire_date:datetime',
                                  'service_package',
                                  array(
                                  'name' => 'gear_type',
                                  'value'=>'$data->getTypeOptions($data->gear_type)',
                                  'filter'=>UsedCar::getTypeOptions(),
                                  ),
                                  'exterior_color',
                                  'interior_color',
                                  'roof',
                                  'camera',
                                  'GPS',
                                  array(
                                  'name' => 'fuel_type',
                                  'value'=>'$data->getTypeOptions($data->fuel_type)',
                                  'filter'=>UsedCar::getTypeOptions(),
                                  ),
                                  'owners',
                                  'transmission',
                                  'kilometer',
                                  'price',
                                  array(
                                  'name'=>'dealer_id',
                                  'value'=>'GxHtml::valueEx($data->dealer)',
                                  'filter'=>GxHtml::listDataEx(User::model()->findAllAttributes(null, true)),
                                  ),
                                  array(
                                  'name' => 'type_id',
                                  'value'=>'$data->getTypeOptions($data->type_id)',
                                  'filter'=>UsedCar::getTypeOptions(),
                                  ),
                                  array(
                                  'name' => 'state_id',
                                  'value'=>'$data->getStatusOptions($data->state_id)',
                                  'filter'=>UsedCar::getStatusOptions(),
                                  ),
                                 */
//                                array(
//                                    'name' => 'state_id',
//                                    'value' => '$data->getStatusOptions($data->state_id)',
//                                    'filter' => UsedCar::getStatusOptions(),
//                                ),
//                                array(
//                                    'class' => 'bootstrap.widgets.TbToggleColumn',
//                                    'name' => 'state_id',
//                                    //'value'=>'$data->getStatusOptions($data->state_id)',
//                                    'filter' => UsedCar::getStatusOptions(),
//                                ),
//                                array(
//                                    'class' => 'booster.widgets.TbToggleColumn',
//                                    'toggleAction' => 'usedCar/change',
//                                    'htmlOptions' => array('display' => 'none'),
//                                    'name' => 'state_id',
//                                    'header' => 'Car Sold'
//                                ),
                                array(
                                    'class' => 'booster.widgets.TbToggleColumn',
                                    'toggleAction' => 'usedCar/toggle',
                                    'name' => 'state_id',
                                    'header' => '<a>UnApprove Car</a>'
                                ),
                                array(
                                    'class' => 'booster.widgets.TbToggleColumn',
                                    'toggleAction' => 'usedCar/togglesold',
                                    'name' => 'type_id',
                                    'header' => '<a>Sold Car</a>'
                                ),
//                                array(
//                                    'header' => '<a>Action</a>',
//                                    'class' => 'CButtonColumn',
//                                    // 'template' => '{view}{update}',
//                                    'template' => '{myAction}',
//                                    'buttons' => array(
////                                        'update' => array(
////                                            'url' => 'Yii::app()->controller->createUrl("banner/update",array( "id"=>$data->id))'
////                                        ),
////                                        'view' => array(
////                                            'url' => 'Yii::app()->controller->createUrl("banner/view", array( "id"=>$data->id))'
////                                        ), 
//                                        'myAction' => array(
//                                            'url' => 'Yii::app()->controller->createUrl("usedCar/unapprove",array( "id"=>$data->id))'
//                                        ),
//                                    ),
//                                ),
                                array(
                                    'header' => '<a>Action</a>',
                                    'class' => 'booster.widgets.TbButtonColumn',
                                    'htmlOptions' => array('nowrap' => 'nowrap'),
                                ),
                            ),
                        ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
