
<?php $this->widget('booster.widgets.TbGridView', array(
'id' => 'used-car-grid',
'type'=>'bordered condensed striped',
'selectionChanged'=>"function(id){window.location='" . Yii::app()->createAbsoluteUrl('usedCar/view') . "/' + $.fn.yiiGridView.getSelection(id);}",
'dataProvider' => $dataProvider,
'columns' => array(
		'id',
		'maker_id',
		'model_id',
		array(
				'name' => 'body_type_id',
				'value'=>'$data->getTypeOptions($data->body_type_id)',
				'filter'=>UsedCar::getTypeOptions(),
				),
		'year',
		'milage',
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
array(
'header' => '<a>Actions</a>',
'class' => 'booster.widgets.TbButtonColumn',
'htmlOptions' => array(
'nowrap' => 'nowrap'
)
)
),
)); ?>