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
           

                <?php   $this->widget('booster.widgets.TbMenu', array(
                'type' => 'navbar',
                'items'=>$this->actions,
                'htmlOptions'=>array('class'=> 'pull-right btn-group'),
                ));
                ?>
            </div>    <div class="box-body">

                <div class="table-outer">

                    <?php $this->widget('booster.widgets.TbGridView', array(
                    'id' => 'body-type-grid',
                    'type'=>'striped bordered condensed',
                    'dataProvider' => $model->searchDealer(),
                    'filter' => $model,
                    'columns' => array(
                    		'id',
		'name',
//		array(
//				'name' => 'state_id',
//				'value'=>'$data->getStatusOptions($data->state_id)',
//				'filter'=>BodyType::getStatusOptions(),
//				),
//		array(
//				'name' => 'type_id',
//				'value'=>'$data->getTypeOptions($data->type_id)',
//				'filter'=>BodyType::getTypeOptions(),
//				),
//		'update_time:datetime',
                    array(
                                    'header' => '<a>Actions</a>',
                                    'class' => 'CButtonColumn',
                                    // 'template' => '{view}{update}',
                                    'template' => '{update}{delete}  ',
                                    'buttons' => array(
                                        'update' => array(
                                            'url' => 'Yii::app()->controller->createUrl("bodyType/update",array( "id"=>$data->id))'
                                        ),
//                                        'view' => array(
//                                            'url' => 'Yii::app()->controller->createUrl("bodyType/view", array( "id"=>$data->id))'
//                                        ),
                                        'delete' => array(
                                            'url' => 'Yii::app()->controller->createUrl("bodyType/delete",array( "id"=>$data->id))'
                                        ),
                                    ),
                                ),
//                        array(
//                    'class'=>'booster.widgets.TbButtonColumn',
//                    'htmlOptions' => array('nowrap'=>'nowrap'),
//                    ),
                    ),
                    )); ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
