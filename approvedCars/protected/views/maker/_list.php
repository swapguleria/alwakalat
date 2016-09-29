
<?php $this->widget('booster.widgets.TbGridView', array(
'id' => 'maker-grid',
'type'=>'bordered condensed striped',
'selectionChanged'=>"function(id){window.location='" . Yii::app()->createAbsoluteUrl('maker/view') . "/' + $.fn.yiiGridView.getSelection(id);}",
'dataProvider' => $dataProvider,
'columns' => array(
		'id',
		'name',
		array(
				'name' => 'state_id',
				'value'=>'$data->getStatusOptions($data->state_id)',
				'filter'=>Maker::getStatusOptions(),
				),
		array(
				'name' => 'type_id',
				'value'=>'$data->getTypeOptions($data->type_id)',
				'filter'=>Maker::getTypeOptions(),
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