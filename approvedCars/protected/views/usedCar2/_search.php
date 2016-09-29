<div class="wide form">

<?php 	$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	//'method' => 'get',
	'id' => 'used-car-form',
	'type'=>'horizontal',		
)); ; 
?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'maker_id'); ?>
		<?php echo $form->textField($model, 'maker_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'model_id'); ?>
		<?php echo $form->textField($model, 'model_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'body_type_id'); ?>
		<?php 
			$this->widget('ext.widgets.CJuiRadioButtonList', array(
			'model'=>$model,
			'attribute'=>'body_type_id',
			'data'=>$model->getTypeOptions(),
			)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'year'); ?>
		<?php echo $form->textField($model, 'year'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'milage'); ?>
		<?php echo $form->textField($model, 'milage'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'accident'); ?>
		<?php echo $form->textField($model, 'accident', array('maxlength' => 1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'accident_desc'); ?>
		<?php $this->richTextEditor($model,'accident_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'warranty'); ?>
		<?php echo $form->textField($model, 'warranty', array('maxlength' => 1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'warranty_expire_date'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'warranty_expire_date',
			'value' => $model->warranty_expire_date,
			'options' => array(
			'showButtonPanel' => true,
			'changeYear' => true,
			'dateFormat' => 'yy-mm-dd',
			),
			));
; ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'service_package'); ?>
		<?php echo $form->textField($model, 'service_package'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'gear_type'); ?>
		<?php echo $form->textField($model, 'gear_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'exterior_color'); ?>
		<?php echo $form->textField($model, 'exterior_color'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'interior_color'); ?>
		<?php echo $form->textField($model, 'interior_color'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'roof'); ?>
		<?php echo $form->textField($model, 'roof', array('maxlength' => 1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'camera'); ?>
		<?php echo $form->textField($model, 'camera', array('maxlength' => 1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'GPS'); ?>
		<?php echo $form->textField($model, 'GPS', array('maxlength' => 1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'fuel_type'); ?>
		<?php echo $form->textField($model, 'fuel_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'owners'); ?>
		<?php echo $form->textField($model, 'owners'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'transmission'); ?>
		<?php echo $form->textField($model, 'transmission'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'kilometer'); ?>
		<?php echo $form->textField($model, 'kilometer'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'price'); ?>
		<?php echo $form->textField($model, 'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'dealer_id'); ?>
		<?php echo $form->dropDownList($model, 'dealer_id', GxHtml::listDataEx(User::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'type_id'); ?>
		<?php 
			$this->widget('ext.widgets.CJuiRadioButtonList', array(
			'model'=>$model,
			'attribute'=>'type_id',
			'data'=>$model->getTypeOptions(),
			)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'state_id'); ?>
		<?php 
			$this->widget('ext.widgets.CJuiRadioButtonList', array(
			'model'=>$model,
			'attribute'=>'state_id',
			'data'=>$model->getStatusOptions(),
			)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'create_user_id'); ?>
		<?php echo $form->dropDownList($model, 'create_user_id', GxHtml::listDataEx(User::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'create_time'); ?>
		<?php $form->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'create_time',
			'value' => $model->create_time,
			'options' => array(
			'showButtonPanel' => true,
			'changeYear' => true,
			'dateFormat' => 'yy-mm-dd',
			),
			));
; ?>
	</div>


	<div class="form-group">
		<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'label'=>'Search',
		)); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- search-form -->
