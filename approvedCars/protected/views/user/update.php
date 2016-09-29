
<section class="content-header">
    <h1>
        <?php
        if ($model->role_id == '3' && Yii::app()->user->isAdmin)
            {
            ?> 
            <?php echo Yii::t('app', 'Update') . ' ' . GxHtml::encode($model->label()); ?>
            <?php
            }
        else
            {
            ?>
            Update Profile <?php } ?> </h1>

    <?php
    $makers = Maker::model()->findAll();

    $makers_array = array();
    foreach ($makers as $key => $val)
        {
        $makers_array[$val['id']] = $val['name'];
        }
    ?>
</section>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo Yii::t('app', 'Please fill the details here'); ?></h3>
                </div>
                <div class="box-body">
                    <!--  form code start here -->
                    <div class="form col-md-12">


                        <?php
                        $form = $this->beginWidget('booster.widgets.TbActiveForm', array(
                            'id' => 'user-form',
                            'type' => 'horizontal',
                            'enableAjaxValidation' => true,
//'enableClientValidation'=>true,
                            'clientOptions' => array('validateOnSubmit' => true),
                            'htmlOptions' => array('enctype' => 'multipart/form-data'),
                        ));
                        ?>
                        <p class="help-block" align="right">
                            Fields with <span class="required">*</span> are required.
                        </p>

                        <?php echo $form->errorSummary($model); ?>
                        <?php
//                        if (!Yii::app()->user->isAdmin)
//                            {
                        ?>
                        <!--                            <div class="form-group">
                        
                        <?php // echo $form->labelEx($model, "email", array('class' => 'col-md-3  control-label'))
                        ?>
                                                        <div class="col-md-9 border-class"><?php // echo $model->email;                              ?> </div>
                                                    </div>-->

                        <?php
//                            }
//                        else
//                            {
                        ?>
                        <?php // echo $form->textFieldGroup($model, 'email', array('class' => 'form-control', 'placeHolder' => 'Email'));  ?>

                        <?php // }
                        ?>
                        <div class = "clearfix"></div>
                        <?php
                        if ($model->role_id == '3')
                            {
                            ?> 
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
                            <div class="col-md-12">  
                                <div class="form-group">
                                    <label for="User_password" class="col-sm-2 control-label required">
                                        Maker <span class="required">*</span></label>
                                    <div class="col-sm-10">
                                        <div class="row">

                                            <?php
                                          
                                            $makers_selected = explode(',', $model['makers']);
//                                           print_r($model['makers']);
                                           foreach ($makers_array as $key => $maker)
                                                {
                                                ?>
                                                <div class="col-md-3">
                                                    <input type="checkbox" value="<?php echo $key; ?>" name="options[]"  <?php if (in_array($key, $makers_selected)) echo 'checked="checked"'
                                                    ?> >  <?php echo $maker; ?>
                                                </div>
                                                <?php
                                                }
                                            ?>
                                        </div>
                                        <div style="display:none" id="User_password_em_" class="help-block error"></div></div></div></div>    <?php
                            }else
                            {
                            ?>

                            <div class="col-md-6">

                                <?php echo $form->textFieldGroup($model, 'first_name', array('class' => 'form-control', 'maxlength' => 512, 'placeHolder' => 'User Name')); ?>

                                <?php echo $form->textFieldGroup($model, 'username', array('class' => 'form-control', 'maxlength' => 512, 'placeHolder' => 'Username')); ?>

                                <?php echo $form->textFieldGroup($model, 'password', array('class' => 'form-control', 'maxlength' => 512, 'placeHolder' => 'Password')); ?>
                            </div>
                        <?php } ?>

                        <?php // echo $form->textFieldGroup($model,'phone_no',array('class'=>'form-control','placeHolder'=>'Contact Number'));   ?>
                        <?php // echo $form->textAreaGroup($model,'about_me',array('class'=>'form-control','placeHolder'=>'About Us'));         ?>
                        <?php //echo $form->fileFieldGroup($model,'image_file',array('class'=>'form-control','placeHolder'=>'Image File'));            ?>


                        <div class="form-group">
                            <div class="col-md-3"></div>
                            <div class="col-md-9">
                                <?php
//                $this->widget('booster.widgets.TbButton', array(
//			'buttonType'=>'submit',
//			'label'=>'Save',
//			'context'=>'success',
//		));
                                ?> 
                                <div class="form-group">
                                    <button class="btn btn-default" id="yw1" type="submit" name="yt0">Save</button>
                                </div>
                            </div>



                        </div>

                    </div>

                    <?php $this->endWidget(); ?>

                </div>
                <div class="clearfix"></div>
                <!-- form code ends here -->
            </div>

        </div>
    </div>
</div>






<!-- form code ends here -->


















