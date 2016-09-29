
<?php $this->widget('booster.widgets.TbGridView', array(
'id' => 'car-model-grid',
'type'=>'bordered condensed striped',
'selectionChanged'=>"function(id){window.location='" . Yii::app()->createAbsoluteUrl('carModel/view') . "/' + $.fn.yiiGridView.getSelection(id);}",
'dataProvider' => $dataProvider,
'columns' => array(
		'id',
		'maker_id',
		'model_name',
		array(
				'name' => 'state_id',
				'value'=>'$data->getStatusOptions($data->state_id)',
				'filter'=>CarModel::getStatusOptions(),
				),
		array(
				'name' => 'type_id',
				'value'=>'$data->getTypeOptions($data->type_id)',
				'filter'=>CarModel::getTypeOptions(),
				),
		'update_time:datetime',
array(
'header' => '<a>Actions</a>',
'class' => 'booster.widgets.TbButtonColumn',
'htmlOptions' => array(
'nowrap' => 'nowrap'
)
)
),
)); ?>