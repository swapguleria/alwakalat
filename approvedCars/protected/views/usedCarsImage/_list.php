
<?php
$this->widget('booster.widgets.TbGridView', array(
    'id' => 'used-cars-image-grid',
    'type' => 'bordered condensed striped',
//    'selectionChanged' => "function(id){window.location='" . Yii::app()->createAbsoluteUrl('usedCarsImage/view') . "/' + $.fn.yiiGridView.getSelection(id);}",
    'dataProvider' => $dataProvider,
    'columns' => array(
        'id',    
//		array(
//			'name'=>'car_id',
//			'value'=>'GxHtml::valueEx($data->car)',
//			'filter'=>GxHtml::listDataEx(UsedCar::model()->findAllAttributes(null, true)),
//			),
        array(
            'header' => '<a>Image</a>',
            'type' => 'raw',
            'value' => 'CHtml::image($data->getImage(),"", array("height"=>100) )'
        ),
//		'image',
        array(
            'class' => 'booster.widgets.TbToggleColumn',
            'toggleAction' => 'usedCarsImage/toggle',
            'name' => 'state_id',
            'header' => '<a>Main Image</a>'
        ),
//		array(
//				'name' => 'type_id',
//				'value'=>'$data->getTypeOptions($data->type_id)',
//				'filter'=>UsedCarsImage::getTypeOptions(),
//				),
//		'update_time:datetime',
//array(
//'header' => '<a>Actions</a>',
//'class' => 'booster.widgets.TbButtonColumn',
//'htmlOptions' => array(
//'nowrap' => 'nowrap'
//)
//)
        array(
            'header' => '<a>Actions</a>',
            'class' => 'CButtonColumn',
            // 'template' => '{view}',
            'template' => '{update}{delete}',
            'buttons' => array(
                'update' => array(
                    'url' => 'Yii::app()->controller->createUrl("usedCarsImage/update",array( "id"=>$data->id))'
                ),
//                                        'view' => array(
//                                            'url' => 'Yii::app()->controller->createUrl("banner/view", array( "id"=>$data->id))'
//                                        ), 
                'delete' => array(
                    'url' => 'Yii::app()->controller->createUrl("usedCarsImage/delete",array( "id"=>$data->id))'
                ),
            ),
        ),
    ),
));
?>
<style>
    .glyphicon-ok-circle, .glyphicon-remove-sign{
        color: #159E09;
        font-size: 30px;
    }
    .glyphicon-remove-sign{
        color: #ed0b5e !important;
    }
    .toggle-column{
        width: 20% !important;
    }
    .button-column{
        width: 15% !important;
    }
</style>