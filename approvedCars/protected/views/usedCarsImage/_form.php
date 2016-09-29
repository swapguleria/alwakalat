<!--  form code start here -->
<div class="form">


    <?php
    $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
        'id' => 'used-cars-image-form',
        'type' => 'horizontal',
        'enableAjaxValidation' => true,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>
    <p class="help-block" align="right">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>



    <?php // echo $form->dropDownListGroup($model, 'car_id', array('widgetOptions' => array('data' => CHtml::listData(UsedCar::model()->findAll(array('order' => 'id ASC')), 'id', 'id'), 'htmlOptions' => array('class' => 'input-large', 'empty' => 'Select id')))); ?>
    <?php // echo $form->radioButtonListGroup($model, 'car_id', GxHtml::listDataEx(UsedCar::model()->findAllAttributes(null, true))); ?>

    <?php
//    $this->widget('CMultiFileUpload', array(
//        'name' => 'image',
//        'model' => $model,
//        'id' => 'imagepath',
//        'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
//        'duplicate' => 'Duplicate file!', // useful, i think
//        'denied' => 'Invalid file type', 'max'=>10,// useful, i think
//    ));
//   $this->widget('ext-prod.imageSelect.ImageSelect',  array(
//        'path'=>'path/to/current/image',
//        'alt'=>'alt text',
//        'uploadUrl'=>'url that accepts the uploaded image and returns the new path',
//        'htmlOptions'=>array()
//   ));
    ?>
<!--    <div class="form-group"><label for="UsedCarsImage_image" class="col-sm-3 control-label required">Image <span class="required">*</span></label><div class="col-sm-9"><input type="hidden" name="UsedCarsImage[image]" value="" id="ytUsedCarsImage_image"><input type="file" id="UsedCarsImage_image" name="UsedCarsImage[image]" placeholder="Image" class="form-control" multiple><div style="display:none" id="UsedCarsImage_image_em_" class="help-block error"></div></div></div>-->

    <?php echo $form->fileFieldGroup($model, 'image', array('class' => 'form-control', 'maxlength' => 255));  ?>


    <?php // echo $form->dropDownListGroup($model, 'state_id', array('widgetOptions' => array('data' => $model->getStatusOptions(), 'htmlOptions' => array('class' => 'input-large')))); ?>


    <?php // echo $form->dropDownListGroup($model, 'type_id', array('widgetOptions' => array('data' => $model->getTypeOptions(), 'htmlOptions' => array('class' => 'input-large')))); ?>


    <?php
//    echo $form->datepickerGroup($model, 'update_time', array('hint' => 'Click inside! to select a date.',
//        'prepend' => '<i class="icon-calendar"></i>'))
//    ;
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
<script>
//    $(document).ready(function () {
//        $("#UsedCarsImage_image").attr('multiple', true);
//    });
//
//    $(function () {
//        $("#yw2").on('click', function (e) {
//            e.preventDefault();
//            var fileUpload = $("input[type='file']").val(), Files = $("input[type='file']")[0].files, FileNames = [];
//
//            if (Files.length < 5) {
//                alert('Less Than 5 Files');
//            } else {
//                if (Files.length > 9) {
//                    alert('More Than 9 Files');
//                } else {
//                    for (var i = 0; i < Files.length; i++) {
//                        FileNames.push(Files[i]);
//                    }
//                    console.log(FileNames);
//                }
//            }
//        });
//    });
</script>
<!-- form code ends here -->