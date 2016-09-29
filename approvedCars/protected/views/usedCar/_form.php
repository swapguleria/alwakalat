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
                        echo '<option selected = "selected" value = "' . $maker['id'] . '">' . $maker['name'] . '</option>';
                        }
                    ?>

                </select>
            </div>
        </div>
        <?php
        }
    ?>
    <?php // echo $form->dropDownListGroup($model, 'maker_id', array('widgetOptions' => array('data' => CHtml::listData(Maker::model()->findAll(array('order' => 'id ASC')), 'id', 'name'), 'htmlOptions' => array('class' => 'input-large maker', 'empty' => 'Select Maker')))); ?>
    <div class="form-group">
        <label class="col-md-3 control-label" for="logo">Model <span class="required">*</span></label>
        <div class="col-md-9">
            <select name="UsedCar[model_id]" class="model form-control">
                <option selected="selected" value="0">Select Maker First</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label" for="logo">Sub-Model<span>*</span></label>
        <div class="col-md-9">
            <select name="UsedCar[sub_model_id]" class="sub_model form-control">
                <option selected="selected" value="0">Select Model First</option>
            </select>
        </div>
    </div>
    <?php // echo $form->dropDownListGroup($model, 'model_id', array('widgetOptions' => array('data' => CHtml::listData(CarModel::model()->findAll(array('order' => 'id ASC')), 'id', 'model_name'), 'htmlOptions' => array('class' => 'input-large', 'empty' => 'Select Model')))); ?>
    <?php echo $form->dropDownListGroup($model, 'body_type_id', array('widgetOptions' => array('data' => CHtml::listData(BodyType::model()->findAll(array('order' => 'id ASC')), 'id', 'name'), 'htmlOptions' => array('class' => 'input-large', 'empty' => 'Select body')))); ?>

    <?php // echo $form->fileFieldGroup($model, 'banner_image', array('class' => 'form-control')); ?>

    <div class="form-group"><label for="UsedCar_year" class="col-sm-3 control-label">Year</label><div class="col-sm-9"><select id="UsedCar_year" name="UsedCar[year]" placeholder="year" class="input-large form-control">
                <?php
                $year = date("Y");
                for ($i = 0; $i < 5; $i++)
                    {
                    ?>              
                    <option selected="selected" value="<?php echo $ye = $year + $i ?>"><?php echo $yea = $year + $i ?></option>
                <?php } ?>               
            </select><div style="display:none" id="UsedCar_year_em_" class="help-block error"></div></div></div>


    <?php // echo $form->textFieldGroup($model, 'year', array('class' => 'form-control'));   ?>

    <?php echo $form->textFieldGroup($model, 'milage', array('class' => 'form-control')); ?>

    <?php echo $form->textFieldGroup($model, 'speed', array('class' => 'form-control')); ?>

    <?php echo $form->textFieldGroup($model, 'acceleration', array('class' => 'form-control')); ?>

    <?php echo $form->textFieldGroup($model, 'engine_size', array('class' => 'form-control')); ?>

    <?php echo $form->textFieldGroup($model, 'horse_power', array('class' => 'form-control')); ?>

    <?php echo $form->dropDownListGroup($model, 'accident', array('widgetOptions' => array('data' => $model->getSelectOptions(), 'htmlOptions' => array('class' => 'input-large')))); ?> 
    <div id="UsedCar_accident_desc_id" style="display: none">
        <?php echo $form->textAreaGroup($model, 'accident_desc', array('class' => 'form-control', 'rows' => 5)); ?>
    </div>
    <?php echo $form->dropDownListGroup($model, 'warranty', array('widgetOptions' => array('data' => $model->getSelectOptions(), 'htmlOptions' => array('class' => 'input-large')))); ?> 

    <div id="UsedCar_warranty_id" style="display: none">
        <?php echo $form->datepickerGroup($model, 'warranty_expire_date', array('prepend' => '<i class="icon-calendar"></i>')); ?>
    </div>
    <?php echo $form->textFieldGroup($model, 'service_package', array('class' => 'form-control')); ?>

    <?php echo $form->dropDownListGroup($model, 'gear_type', array('widgetOptions' => array('data' => $model->getTransmissionOptions(), 'htmlOptions' => array('class' => 'input-large')))); ?> 

    <?php echo $form->dropDownListGroup($model, 'exterior_color', array('widgetOptions' => array('data' => $model->getColourOptions(), 'htmlOptions' => array('class' => 'input-large')))); ?> 

    <?php echo $form->dropDownListGroup($model, 'interior_color', array('widgetOptions' => array('data' => $model->getColourOptions(), 'htmlOptions' => array('class' => 'input-large')))); ?> 

    <?php echo $form->dropDownListGroup($model, 'camera', array('widgetOptions' => array('data' => $model->getSelectOptions(), 'htmlOptions' => array('class' => 'input-large')))); ?>

    <?php echo $form->dropDownListGroup($model, 'GPS', array('widgetOptions' => array('data' => $model->getSelectOptions(), 'htmlOptions' => array('class' => 'input-large')))); ?>

    <?php echo $form->dropDownListGroup($model, 'roof', array('widgetOptions' => array('data' => $model->getSelectOptions(), 'htmlOptions' => array('class' => 'input-large')))); ?> 

    <?php // echo $form->dropDownListGroup($model, 'fuel_type', array('widgetOptions' => array('data' => $model->getFuelOptions(), 'htmlOptions' => array('class' => 'input-large')))); ?> 

    <?php // echo $form->dropDownListGroup($model, 'owners', array('widgetOptions' => array('data' => $model->getOwnersOptions(), 'htmlOptions' => array('class' => 'input-large')))); ?> 


    <?php // echo $form->textFieldGroup($model, 'kilometer', array('class' => 'form-control')); ?>


    <?php echo $form->textFieldGroup($model, 'price', array('class' => 'form-control')); ?>
    <div class="form-group has-success" id="ImagesPreview" style="display: none">
        <label class="col-sm-3 control-label required"></label>
        <div class="col-sm-9" id="PreviewBox"></div>
    </div>
    <div class="form-group">
        <label for="UsedCarsImage_image" class="col-sm-3 control-label required">Image <span class="required">* </span></label>
        <div class="col-sm-9">
            <sup id="info-text" style="color: #E56639">(You are allowed to select only 5 to 9 images at once)</sup>
            <input type="hidden" name="UsedCarsImage[]" value="" id="ytUsedCarsImage_image">
            <input type="file" id="UsedCarsImage_image" name="UsedCarsImage[]" placeholder="Image" class="form-control" multiple>
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
//                        $("#model_display").slideDown("slow");
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
//                        $("#sub_model_display").slideDown("slow");
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
        $("#UsedCarsImage_image").on('change', function (e) {
            e.preventDefault();
            var Files = $("#UsedCarsImage_image[type='file']")[0].files, FileNames = [];

            if (Files.length < 5) {
                $("#PreviewBox").html("");
                $(this).parent('div').parent('div.form-group').addClass('has-error');
                $('#info-text').css({display: 'block'})
                $('#UsedCarsImage_image_em_').text('You Cannot Upload Less Then Five Files').show('slide', {direction: 'down'}, '10');
            } else {
                if (Files.length > 9) {
                    $("#PreviewBox").html("");
                    $(this).parent('div').parent('div.form-group').addClass('has-error');
                    $('#info-text').css({display: 'block'})
                    $('#UsedCarsImage_image_em_').text('You Cannot Upload More Then Nine Files').show('slide', {direction: 'down'}, '10');
                } else {
                    $('#ImagesPreview').css({display: 'block'});
                    $("#PreviewBox").html("");
                    $(this).parent('div').parent('div.form-group').removeClass('has-error').addClass('has-success');
                    $('#info-text').css({display: 'none'});
                    for (var i = 0; i < Files.length; i++) {
                        var Name = Files[i].name, reader = new FileReader(); // instance of the FileReader
                        reader.readAsDataURL(Files[i]); // read the local file
                        reader.onloadend = function () { // set image data as background of div
                            var PrevHtml = $("#PreviewBox").html();

                            $("#PreviewBox").html(PrevHtml + '<img width="150" height="150" src="' + this.result + '" alt="' + Name + '" />')
                        };
                        FileNames.push(Files[i].name);
                    }
                    $('#UsedCarsImage_image_em_').text('').hide('slide', {direction: 'up'}, '10');
                    console.log(FileNames);
                }
            }
        });
    });
</script>