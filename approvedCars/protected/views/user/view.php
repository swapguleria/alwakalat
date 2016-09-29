<section class="content-header">
    <h1>
        <?php
        if ($model->first_name)
            {
            echo $model->first_name;
            }
        else echo 'User Details';
        ?>
    </h1>


</section>

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">



                    <?php
                    if ($model->role_id == '3')
                        {
                        ?>    Dealer in <b><?php
                            $name = '';
                            $makers_id = explode(",", $model->makers);
                            foreach ($makers_id as $key => $val)
                                {
                                $criteria = new CDbCriteria;
                                $criteria->compare('id', $val);
                                $criteria->select = 'name';
                                $maker = Maker::model()->find($criteria);
                                if (@$name) $name = $name . "," . $maker['name'];
                                else $name = $maker['name'];
                                }
                            echo $name;
                            ?></b>
                    <?php } ?>

                    <?php
                    $this->widget('booster.widgets.TbMenu', array(
                        'type' => 'navbar',
                        'items' => $this->actions,
                        'htmlOptions' => array('class' => 'pull-right btn-group'),
                    ));
                    ?>

                </div>
                <div class="box-body user-view">
                    <div class="row"> 
                        <div class="col-md-2 user_img"> 
                            <?php echo CHtml::image($model->getImage(), 'logo', array('height' => 200)); ?>
                        </div> 


                        <?php
                        if ($model->role_id == '1')
                            {
                            ?> 
                            <div class="col-md-5">
                                <?php
                                $this->widget('booster.widgets.TbDetailView', array(
                                    'data' => $model,
                                    'attributes' => array(
                                        'first_name',
                                        'username',
                                        'password',
                                    ),
                                ));
                                ?>
                            </div>
                            <?php
                            }
                        else
                            {
                            ?>

                            <div class="col-md-5">
                                <?php
                                $this->widget('booster.widgets.TbDetailView', array(
                                    'data' => $model,
                                    'attributes' => array(
                                        'company_name',
                                        'email',
                                        'username',
                                        'password',
                                        'company_profile',
                                        'website',
                                    ),
                                ));
                                ?>

                            </div>
                            <div class="col-md-5">
                                <?php
                                $this->widget('booster.widgets.TbDetailView', array(
                                    'data' => $model,
                                    'attributes' => array(
                                        'first_name',
                                        'family_name',
                                        'title',
                                        'address',
                                        'phone_no',
                                        'mobile_no',
                                    ),
                                ));
                                ?>
                            </div>
                        <?php }
                        ?>
                    </div>
                    <div class = "clearfix"></div>
                    <br>


                </div>


                <?php
                $this->StartPanel();
                ?>
                <?php //  	$this->AddPanel($model->getRelationLabel('userPlans'), $model->getRelatedDataProvider('userPlans'),	'userPlans','userPlan');   ?>
                <?php //$this->AddPanel($model->getRelationLabel('jobEmployers'), $model->getRelatedDataProvider('jobEmployers'),	'jobEmployers','jobEmployer'); ?>
                <?php $this->EndPanel(); ?>

                <?php
                /*
                 * $this->widget('CommentPortlet', array(
                 * 'model' => $model,
                 * ));
                 */
                ?>
            </div>
        </div>
    </div>


</div>









