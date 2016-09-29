<!--  form code start here -->
<div class="form">


    <?php
    $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
        'id' => 'used-car-form',
        'type' => 'horizontal',
        'enableAjaxValidation' => true,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>
    <p class="help-block" align="right">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->dropDownListGroup($model, 'maker_id', array('widgetOptions' => array('data' => CHtml::listData(Maker::model()->findAll(array('order' => 'id ASC')), 'id', 'name'), 'htmlOptions' => array('class' => 'input-large', 'empty' => 'Select Maker')))); ?>
    <?php echo $form->dropDownListGroup($model, 'model_id', array('widgetOptions' => array('data' => CHtml::listData(CarModel::model()->findAll(array('order' => 'id ASC')), 'id', 'model_name'), 'htmlOptions' => array('class' => 'input-large', 'empty' => 'Select Model')))); ?>
    <?php echo $form->dropDownListGroup($model, 'body_type_id', array('widgetOptions' => array('data' => CHtml::listData(BodyType::model()->findAll(array('order' => 'id ASC')), 'id', 'name'), 'htmlOptions' => array('class' => 'input-large', 'empty' => 'Select body')))); ?>
    <?php echo $form->textFieldGroup($model, 'year', array('class' => 'form-control')); ?>

    <?php echo $form->textFieldGroup($model, 'milage', array('class' => 'form-control')); ?>

    <?php echo $form->dropDownListGroup($model, 'accident', array('widgetOptions' => array('data' => $model->getSelectOptions(), 'htmlOptions' => array('class' => 'input-large')))); ?> 

    <?php echo $form->textAreaGroup($model, 'accident_desc', array('class' => 'form-control', 'rows' => 5)); ?>

    <?php echo $form->dropDownListGroup($model, 'warranty', array('widgetOptions' => array('data' => $model->getSelectOptions(), 'htmlOptions' => array('class' => 'input-large')))); ?> 

    <?php echo $form->datepickerGroup($model, 'warranty_expire_date', array('prepend' => '<i class="icon-calendar"></i>')); ?>

    <?php echo $form->textFieldGroup($model, 'service_package', array('class' => 'form-control')); ?>

    <?php echo $form->dropDownListGroup($model, 'gear_type', array('widgetOptions' => array('data' => $model->getTransmissionOptions(), 'htmlOptions' => array('class' => 'input-large')))); ?> 

    <?php echo $form->dropDownListGroup($model, 'exterior_color', array('widgetOptions' => array('data' => $model->getColourOptions(), 'htmlOptions' => array('class' => 'input-large')))); ?> 

    <?php echo $form->dropDownListGroup($model, 'interior_color', array('widgetOptions' => array('data' => $model->getColourOptions(), 'htmlOptions' => array('class' => 'input-large')))); ?> 

    <?php echo $form->dropDownListGroup($model, 'camera', array('widgetOptions' => array('data' => $model->getSelectOptions(), 'htmlOptions' => array('class' => 'input-large')))); ?>

    <?php echo $form->dropDownListGroup($model, 'GPS', array('widgetOptions' => array('data' => $model->getSelectOptions(), 'htmlOptions' => array('class' => 'input-large')))); ?>

    <?php echo $form->dropDownListGroup($model, 'roof', array('widgetOptions' => array('data' => $model->getSelectOptions(), 'htmlOptions' => array('class' => 'input-large')))); ?> 

    <?php echo $form->dropDownListGroup($model, 'fuel_type', array('widgetOptions' => array('data' => $model->getFuelOptions(), 'htmlOptions' => array('class' => 'input-large')))); ?> 

    <?php echo $form->dropDownListGroup($model, 'owners', array('widgetOptions' => array('data' => $model->getOwnersOptions(), 'htmlOptions' => array('class' => 'input-large')))); ?> 


    <?php echo $form->textFieldGroup($model, 'kilometer', array('class' => 'form-control')); ?>


    <?php echo $form->textFieldGroup($model, 'price', array('class' => 'form-control')); ?>


    <?php // echo $form->radioButtonListGroup($model, 'dealer_id', GxHtml::listDataEx(User::model()->findAllAttributes(null, true))); ?>


    <?php // echo $form->dropDownListGroup($model, 'type_id', array('widgetOptions' => array('data' => $model->getTypeOptions(), 'htmlOptions' => array('class' => 'input-large')))); ?>


    <?php // echo $form->dropDownListGroup($model, 'state_id', array('widgetOptions' => array('data' => $model->getStatusOptions(), 'htmlOptions' => array('class' => 'input-large')))); ?>





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