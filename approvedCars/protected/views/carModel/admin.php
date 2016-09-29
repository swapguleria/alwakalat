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
                            'id' => 'car-model-grid',
                            'type' => 'striped bordered condensed',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
                                'id',
                                array(
                                    'name' => 'maker_id',
                                    'value' => 'GxHtml::valueEx($data->maker)',
                                    'filter' => GxHtml::listDataEx(Maker::model()->findAllAttributes(null, true))
                                ),
                                'model_name',
                                
//		array(
//				'name' => 'state_id',
//				'value'=>'$data->getStatusOptions($data->state_id)',
//				'filter'=>CarModel::getStatusOptions(),
//				),
//		array(
//				'name' => 'type_id',
//				'value'=>'$data->getTypeOptions($data->type_id)',
//				'filter'=>CarModel::getTypeOptions(),
//				),
//		'update_time:datetime',
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
