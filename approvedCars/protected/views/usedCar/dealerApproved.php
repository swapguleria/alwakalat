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
                            'dataProvider' => $model->searchDealerApproved(),
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
//                                    'class' => 'CButtonColumn',
//                                    'template' => '{update}{add}{delete}',
//                                    'buttons' => array(
//                                        'update' => array(
//                                            'url' => '$this->grid->controller->createUrl("/Extras/update", array("id"=>$data->id,"asDialog"=>1,"gridId"=>$this->grid->id))',
//                                            'click' => 'function(){$("#cru-frame").attr("src",$(this).attr("href")); $("#cru-dialog").dialog("open");  return false;}',
//                                            'visible' => '($data->id===null)?false:true;'
//                                        ),
//                                        'add' => array(
//                                            'label' => 'Add',
//                                            'imageUrl' => Yii::app()->request->baseUrl . '/css/gridViewStyle/images/gr-plus.png',
//                                            'url' => '$this->grid->controller->createUrl("/Extras/create", array("eid"=>$data->extras_id, "bid"=>' . $model->id . ', "asDialog"=>1,"gridId"=>$this->grid->id))',
//                                            'click' => 'function(){$("#cru-frame").attr("src",$(this).attr("href")); $("#cru-dialog").dialog("open");  return false;}',
//                                            'visible' => '($data->id===null)?true:false;'
//                                        ),
//                                        'delete' => array(
//                                            'url' => '$this->grid->controller->createUrl("/Extras/delete", array("id"=>$data->primaryKey,"asDialog"=>1,"gridId"=>$this->grid->id))',
//                                        ),
//                                    ),
//                                ),
//                                array(
//                                    'header' => '<a>Actions</a>',
//                                    'class' => 'CButtonColumn',
//                                    // 'template' => '{view}{update}',
//                                    'template' => '{delete}',
//                                    'buttons' => array(
////                                        'update' => array(
////                                            'url' => 'Yii::app()->controller->createUrl("banner/update",array( "id"=>$data->id))'
////                                        ),
////                                        'view' => array(
////                                            'url' => 'Yii::app()->controller->createUrl("banner/view", array( "id"=>$data->id))'
////                                        ), 
//                                        'delete' => array(
//                                            'url' => '$this->grid->controller->createUrl("/History/delete", array("id"=>$data->primaryKey,"asDialog"=>1,"gridId"=>$this->grid->id))',
//                                        ),
////                                        'delete' => array(
////                                            'url' => 'Yii::app()->controller->createUrl("usedCarsImage/delete",array( "id"=>$data->id))'
////                                        ),
//                                    ),
//                                ),
//                                array(
//                                    'class' => 'booster.widgets.TbToggleColumn',
//                                    'toggleAction' => 'usedCar/change',
//                                    'htmlOptions' => array('display' => 'block'),
//                                    'name' => 'state_id',
//                                    'header' => 'Car Sold',
//                                    
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
                                    'toggleAction' => 'usedCar/toggleSold',
                                    'htmlOptions' => array('display' => 'block'),
                                    'name' => 'type_id',
                                    'header' => 'Car Sold',
                                ),
                                array(
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
<script>
//    $(document).ready(function(){
//        'use strict';
//        setInterval(function(){
//            var STATE = $('a.state_id_toggle').attr('data-original-title');
////            alert(STATE);
//            if(STATE === 'Uncheck'){
//                $('a.state_id_toggle').children('span').css({display: 'none'});
//            }else{
//                
//            }
//        }, 5000);
//        $(document).on('load', 'a.state_id_toggle', function(event){
//            event.preventDefault();
//            var URL = $(this).attr('href');
//            alert(URL);
////            $.get(URL, function(data){
////                if()
////            });
//        });
////        $.get( "ajax/test.html", function( data ) {
////  $( ".result" ).html( data );
////  alert( "Load was performed." );
////});
////        var State = $('a.state_id_toggle').attr('data-original-title');
////        alert(State);
//    });
</script>