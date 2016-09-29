
<?php $this->widget('booster.widgets.TbGridView', array(
'id' => 'sub-model-grid',
'type'=>'bordered condensed striped',
'selectionChanged'=>"function(id){window.location='" . Yii::app()->createAbsoluteUrl('subModel/view') . "/' + $.fn.yiiGridView.getSelection(id);}",
'dataProvider' => $dataProvider,
'columns' => array(
		'id',
		'name',
		array(
			'name'=>'model_id',
			'value'=>'GxHtml::valueEx($data->model)',
			'filter'=>GxHtml::listDataEx(CarModel::model()->findAllAttributes(null, true)),
			),
		array(
			'name'=>'maker_id',
			'value'=>'GxHtml::valueEx($data->maker)',
			'filter'=>GxHtml::listDataEx(Maker::model()->findAllAttributes(null, true)),
			),
		array(
				'name' => 'state_id',
				'value'=>'$data->getStatusOptions($data->state_id)',
				'filter'=>SubModel::getStatusOptions(),
				),
		array(
				'name' => 'type_id',
				'value'=>'$data->getTypeOptions($data->type_id)',
				'filter'=>SubModel::getTypeOptions(),
				),
		/*
		'update_time:datetime',
		*/
array(
'header' => '<a>Actions</a>',
'class' => 'booster.widgets.TbButtonColumn',
'htmlOptions' => array(
'nowrap' => 'nowrap'
)
)
),
)); ?>