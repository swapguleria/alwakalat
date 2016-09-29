<!--  form code start here -->
<div class="form ">


    <?php
    $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
        'id' => 'user-form',
        'type' => 'horizontal',
        'enableAjaxValidation' => true,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    ));
    ?>
    <?php echo $form->errorSummary($model); ?>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-body"> <b>Company Information</b></div>
            </div>
            <?php echo $form->textFieldGroup($model, 'company_name', array('class' => 'form-control', 'maxlength' => 512, 'placeHolder' => 'Company Name')); ?>
            <?php echo $form->textFieldGroup($model, 'company_profile', array('class' => 'form-control', 'maxlength' => 512, 'placeHolder' => 'Company Profile')); ?>
            <?php echo $form->textFieldGroup($model, 'address', array('class' => 'form-control', 'maxlength' => 512, 'placeHolder' => 'address')); ?>
            <?php echo $form->textFieldGroup($model, 'website', array('class' => 'form-control', 'maxlength' => 512, 'placeHolder' => 'Website')); ?>
            <?php echo $form->textFieldGroup($model, 'username', array('class' => 'form-control', 'maxlength' => 512, 'placeHolder' => 'Username')); ?>

            <?php echo $form->textFieldGroup($model, 'password', array('class' => 'form-control', 'maxlength' => 512, 'placeHolder' => 'Password')); ?>
        </div>
        <div class="col-md-6">
            <div class="panel panel-info">
                <div class="panel-body "> <b>   Contact Information </b></div>
            </div>
            <?php echo $form->textFieldGroup($model, 'first_name', array('class' => 'form-control', 'maxlength' => 512, 'placeHolder' => 'User Name')); ?>
            <?php echo $form->textFieldGroup($model, 'family_name', array('class' => 'form-control', 'maxlength' => 512, 'placeHolder' => 'Family Name')); ?>
            <?php echo $form->textFieldGroup($model, 'title', array('class' => 'form-control', 'maxlength' => 512, 'placeHolder' => 'Designation/Title')); ?>
            <?php echo $form->textFieldGroup($model, 'phone_no', array('class' => 'form-control', 'maxlength' => 512, 'placeHolder' => 'Phone Number')); ?>
            <?php echo $form->textFieldGroup($model, 'mobile_no', array('class' => 'form-control', 'maxlength' => 512, 'placeHolder' => 'Mobile Number')); ?>
            <?php echo $form->textFieldGroup($model, 'email', array('class' => 'form-control', 'maxlength' => 128, 'placeHolder' => 'Email')); ?>
            <?php echo $form->fileFieldGroup($model, 'logo', array('class' => 'form-control', 'maxlength' => 128)); ?>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="User_password" class="col-sm-2 control-label required">
                Maker <span class="required">*</span></label>
            <div class="col-sm-10">
                <div class="row">

                    <?php
                    foreach ($makers_array as $key => $maker)
                        {
                        ?>
                        <div class="col-md-3">
                            <input type="checkbox" value="<?php echo $key; ?>" name="options[]"   >  <?php echo $maker; ?>
                        </div>
                        <?php
                        }
                    ?>
                </div>
                <div style="display:none" id="User_password_em_" class="help-block error"></div></div></div></div>
    <div class="form-group">
        <button class="btn btn-block  btn-success" id="yw1" type="submit" name="yt0">Add Dealer</button>
    </div>
    <?php $this->endWidget(); ?>

</div>
<!-- form code ends here -->
<script>
    $(document).ready(function () {
//        $('#User_maker').on('blur', function (e) {
//            alert("as");
//        });
    });

</script>