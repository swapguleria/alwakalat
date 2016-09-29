



<!--<div class="page-header">-->
<!--<h1> echo GxHtml::encode(GxHtml::valueEx($model)); ?></h1>-->
<!--</div>-->

<div class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <section class="content-header pull-left">

                        <h1><?php  echo ucfirst(GxHtml::encode(GxHtml::valueEx($model))); ?></h1>
                    </section>

                    <?php   $this->widget('booster.widgets.TbMenu', array(
                    'type' => 'navbar',
                    'items'=>$this->actions,
                    'htmlOptions'=>array('class'=> 'pull-right btn-group'),
                    ));
                    ?>
                </div>
                <div class="box-body">

                    <div class="table-outer">
                        <?php $this->widget('booster.widgets.TbDetailView', array(
                        'data' => $model,
                        'attributes' => array(
                        'id',
'maker_id',
'model_id',
array(
				'name' => 'body_type_id',
				'type' => 'raw',
				'value'=>$model->getTypeOptions($model->body_type_id),
				),
'year',
'milage',
'accident',
'accident_desc:html',
'warranty',
'warranty_expire_date:datetime',
'service_package',
array(
				'name' => 'gear_type',
				'type' => 'raw',
				'value'=>$model->getTypeOptions($model->gear_type),
				),
'exterior_color',
'interior_color',
'roof',
'camera',
'GPS',
array(
				'name' => 'fuel_type',
				'type' => 'raw',
				'value'=>$model->getTypeOptions($model->fuel_type),
				),
'owners',
'transmission',
'kilometer',
'price',
array(
			'name' => 'dealer',
			'type' => 'raw',
			'value' => $model->dealer !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->dealer)), array('user/view', 'id' => GxActiveRecord::extractPkValue($model->dealer, true))) : null,
			),
array(
				'name' => 'type_id',
				'type' => 'raw',
				'value'=>$model->getTypeOptions($model->type_id),
				),
array(
				'name' => 'state_id',
				'type' => 'raw',
				'value'=>$model->getStatusOptions($model->state_id),
				),
array(
			'name' => 'createUser',
			'type' => 'raw',
			'value' => $model->createUser !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->createUser)), array('user/view', 'id' => GxActiveRecord::extractPkValue($model->createUser, true))) : null,
			),
'create_time:datetime',
                        ),
                        )); ?>

                                                                                                                                                                        
<?php   $this->widget('CommentPortlet', array(
                        'model' => $model,
                        ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>