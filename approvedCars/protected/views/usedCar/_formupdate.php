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

    <?php
//    print_r($_POST);
    echo $form->errorSummary($model);
    ?>
    <?php
    if (Yii::app()->user->isAdmin)
        {
        ?>

        <?php echo $form->dropDownListGroup($model, 'maker_id', array('widgetOptions' => array('data' => CHtml::listData(Maker::model()->findAll(array('order' => 'id ASC')), 'id', 'name'), 'htmlOptions' => array('class' => 'input-large maker', 'empty' => 'Select Maker')))); ?>
        <?php
        }
    else
        {
        $models = $this->loadModel(Yii::app()->user->id, 'User');
        ?>
        <div class="form-group">
            <label class="col-md-3 control-label" for="logo">Maker <span class="required">*</span></label>
            <div class="col-md-9">
                <select name="UsedCar[maker_id]" id="UsedCar_maker_id" class="maker form-control">
                    <option selected = "selected" value = "0">Select Maker</option>
                    <?php
                    $makers_id = explode(",", $models->makers);
                    foreach ($makers_id as $key => $val)
                        {
                        $criteria = new CDbCriteria;
                        $criteria->compare('id', $val);
                        $maker = Maker::model()->find($criteria);
                        ?> <option value = "<?php echo $maker['id']; ?>" 
                        <?php
                        if ($model->maker_id == $maker['id'])
                            {
                            echo 'selected = "selected"';
                            }
                        ?>
                                ><?php echo $maker['name'] ?> </option>;
                            <?php }
                            ?>

                </select>
            </div>
        </div>
        <?php
        }
    ?><?php // echo $form->dropDownListGroup($model, 'maker_id', array('widgetOptions' => array('data' => CHtml::listData(Maker::model()->findAll(array('order' => 'id ASC')), 'id', 'name'), 'htmlOptions' => array('class' => 'input-large maker', 'empty' => 'Select Maker'))));   ?>


    <div id="display">

        <?php echo $form->dropDownListGroup($model, 'model_id', array('widgetOptions' => array('data' => CHtml::listData(CarModel::model()->findAll(array('order' => 'id ASC')), 'id', 'model_name'), 'htmlOptions' => array('class' => 'input-large maker', 'empty' => 'Select Model')))); ?>
        <?php echo $form->dropDownListGroup($model, 'sub_model_id', array('widgetOptions' => array('data' => CHtml::listData(SubModel::model()->findAll(array('order' => 'id ASC')), 'id', 'name'), 'htmlOptions' => array('class' => 'input-large maker', 'empty' => 'Select Maker')))); ?>
    </div>

    <div class="form-group" style="display:none" id="model_display">
        <label class="col-md-3 control-label" for="logo">Model <span class="text-danger">*</span></label>
        <div class="col-md-9">
            <select name="UsedCar[model_id]" class="model form-control">
                <option selected="selected">Select Maker First</option>
            </select>
        </div>
    </div>
    <div class="form-group" style="display:none" id="sub_model_display">
        <label class="col-md-3 control-label" for="logo">Sub-Model<span class="text-danger">*</span></label>
        <div class="col-md-9">
            <select name="UsedCar[sub_model_id]" class="sub_model form-control">
                <option selected="selected">Select Model First</option>
            </select>
        </div>
    </div>
    <?php // echo $form->dropDownListGroup($model, 'model_id', array('widgetOptions' => array('data' => CHtml::listData(CarModel::model()->findAll(array('order' => 'id ASC')), 'id', 'model_name'), 'htmlOptions' => array('class' => 'input-large', 'empty' => 'Select Model'))));  ?>
    <?php echo $form->dropDownListGroup($model, 'body_type_id', array('widgetOptions' => array('data' => CHtml::listData(BodyType::model()->findAll(array('order' => 'id ASC')), 'id', 'name'), 'htmlOptions' => array('class' => 'input-large', 'empty' => 'Select body')))); ?>

    <?php echo $form->fileFieldGroup($model, 'banner_image', array('class' => 'form-control')); ?>

    <?php echo $form->textFieldGroup($model, 'year', array('class' => 'form-control')); ?>

    <?php echo $form->textFieldGroup($model, 'milage', array('class' => 'form-control')); ?>

    <?php echo $form->dropDownListGroup($model, 'accident', array('widgetOptions' => array('data' => $model->getSelectOptions(), 'htmlOptions' => array('class' => 'input-large')))); ?> 
    <div id="UsedCar_accident_desc_id" >
        <?php echo $form->textAreaGroup($model, 'accident_desc', array('class' => 'form-control', 'rows' => 5)); ?>
    </div>
    <?php echo $form->dropDownListGroup($model, 'warranty', array('widgetOptions' => array('data' => $model->getSelectOptions(), 'htmlOptions' => array('class' => 'input-large')))); ?> 

    <div id="UsedCar_warranty_id" >
        <?php echo $form->datepickerGroup($model, 'warranty_expire_date', array('prepend' => '<i class="icon-calendar"></i>')); ?>
    </div>
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

    <div class="form-group">
        <label for="UsedCarsImage_image" class="col-sm-3 control-label required">Image <span class="required">*</span></label>
        <div class="col-sm-9">
            <input type="hidden" name="UsedCarsImage[image]" value="" id="ytUsedCarsImage_image">
            <input type="file" id="UsedCarsImage_image" name="UsedCarsImage[image]" placeholder="Image" class="form-control" multiple>
            <div style="display:none" id="UsedCarsImage_image_em_" class="help-block error"></div>
        </div>
    </div>

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
<script>
    $(".maker").change(function ()
    {
        var id = $(this).val();
        var dataString = 'id=' + id + '&action=model';

        $.ajax
                ({
                    type: "POST",
                    url: "<?php echo Yii::app()->createUrl('carModel/getModel'); ?>",
                    data: dataString,
                    cache: false,
                    success: function (html)
                    {
                        $(".model").html(html);
                        $("#model_display").slideDown("slow");
                    }
                });

    });
    $(".model").on('change', function ()
    {
        var id = $(this).val();
        var dataString = 'id=' + id + '&action=sub_model';

        $.ajax
                ({
                    type: "POST",
                    url: "<?php echo Yii::app()->createUrl('carModel/getSubModel'); ?>",
                    data: dataString,
                    cache: false,
                    success: function (html)
                    {
                        $(".sub_model").html(html);
                        $("#sub_model_display").slideDown("slow");
                    }
                });

    });
    $("#UsedCar_accident").on('change', function () {
        var value_selected = $(this).val();
//        console.log(value_selected);
        if (value_selected == '1') {
            $("#UsedCar_accident_desc_id").slideDown("slow");
        } else {
            $("#UsedCar_accident_desc_id").slideUp("slow");
        }
    });
    $("#UsedCar_warranty").on("change", function () {
        var val_selected = $(this).val();
        if (val_selected == "1") {
            $("#UsedCar_warranty_id").slideDown("slow");
        } else {
            $("#UsedCar_warranty_id").slideUp("slow");

        }
    });




    //--------********IMAGE TAG SCRIPT**********--------
    $(function () {
        $("#yw2").on('click', function (e) {
            e.preventDefault();
            var fileUpload = $("input[type='file']").val(), Files = $("input[type='file']")[0].files, FileNames = [];

            if (Files.length < 5) {
                alert('Less Than 5 Files');
            } else {
                if (Files.length > 9) {
                    alert('More Than 9 Files');
                } else {
                    for (var i = 0; i < Files.length; i++) {
                        FileNames.push(Files[i]);
                    }
                    console.log(FileNames);
                }
            }
        });
    });
</script>