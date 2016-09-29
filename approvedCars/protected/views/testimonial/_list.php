
<?php $this->widget('booster.widgets.TbGridView', array(
'id' => 'testimonial-grid',
'type'=>'bordered condensed striped',
'selectionChanged'=>"function(id){window.location='" . Yii::app()->createAbsoluteUrl('testimonial/view') . "/' + $.fn.yiiGridView.getSelection(id);}",
'dataProvider' => $dataProvider,
'columns' => array(
		'id',
		'name',
		'image',
//		'text:html',
		'city',
		'state',
//		array(
//				'name' => 'state',
//				'value'=>'$data->getStatusOptions($data->state)',
//				'filter'=>Testimonial::getStatusOptions(),
//				),
		/*
		array(
				'name' => 'state_id',
				'value'=>'$data->getStatusOptions($data->state_id)',
				'filter'=>Testimonial::getStatusOptions(),
				),
		array(
				'name' => 'type_id',
				'value'=>'$data->getTypeOptions($data->type_id)',
				'filter'=>Testimonial::getTypeOptions(),
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