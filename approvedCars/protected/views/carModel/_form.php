<!--  form code start here -->
<div class="form">


    <?php
    $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
        'id' => 'car-model-form',
        'type' => 'horizontal',
        'enableAjaxValidation' => true,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>
    <p class="help-block" align="right">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->dropDownListGroup($model, 'maker_id', array('widgetOptions' => array('data' => CHtml::listData(Maker::model()->findAll(array('order' => 'id ASC')), 'id', 'name'), 'htmlOptions' => array('class' => 'input-large', 'empty' => 'Select Maker')))); ?>

<?php // echo $form->textFieldGroup($model, 'maker_id', array('class' => 'form-control')); ?>


<?php echo $form->textFieldGroup($model, 'model_name', array('class' => 'form-control', 'maxlength' => 255)); ?>


<?php // echo $form->dropDownListGroup($model,'state_id', array('widgetOptions'=>array('data'=>$model->getStatusOptions(), 'htmlOptions'=>array('class'=>'input-large'))));  ?>


<?php // echo $form->dropDownListGroup($model,'type_id', array('widgetOptions'=>array('data'=>$model->getTypeOptions(), 'htmlOptions'=>array('class'=>'input-large'))));  ?>


    <?php
    // echo $form->datepickerGroup($model, 'update_time',
//					array('hint'=>'Click inside! to select a date.',
//					'prepend'=>'<i class="icon-calendar"></i>'))
//; 
    ?>



    <div class="form-group">
        <?php
        $this->widget('booster.widgets.TbButton', array(
            'buttonType' => 'submit',
            'label' => 'Save',
            'context' => 'success',
        ));
        ?>
    </div>

<?php $this->endWidget(); ?>

</div>
<!-- form code ends here -->