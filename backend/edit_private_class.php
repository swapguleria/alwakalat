<?php include 'inc/config.php'; ?>

<?php include 'inc/template_start.php'; ?>

<?php include 'inc/page_head.php';

	$results	=	$obj->get_single_result('private_class_price','private_id',$_GET['id']);

 ?>



<!-- Page content -->

<div id="page-content">

    <!-- Validation Header -->

    

    <ul class="breadcrumb breadcrumb-top">

        <li>Private Lesson</li>

        

    </ul>

    <!-- END Validation Header -->



    <div class="row">

        <div class="col-md-9">

            <!-- Form Validation Example Block -->

            <div class="block">

                <!-- Form Validation Example Title -->

                <div class="block-title">

                    <h2><strong>Edit Lesson Page</strong></h2>
					<?php 
					if(isset($_SESSION['success'])){
						echo "<b style='color:red'>".$_SESSION['success']."</b>";
						unset($_SESSION['success']);
					}
				?>
                </div>

                <!-- END Form Validation Example Title -->



                <!-- Form Validation Example Content -->

                <form action="process.php" method="post" class="form-horizontal form-bordered">

				<input type="hidden" name="action" value="Edit_private">

                <input type="hidden" name="private_id" value="<?php echo $results['private_id']; ?>">

                    <fieldset>

                        <legend><i class="fa fa-angle-right"></i> Lesson Info</legend>

                        <div class="form-group">

                            <label class="col-md-4 control-label" for="day_name">Lesson Name <span class="text-danger">*</span></label>

                            <div class="col-md-6">

                                 <select id="active" name="private_class_name" class="form-control">
									<option value="">Select Type</option>									<?php $genre	=	$obj->get_all_data_active('type','type_name','asc','type_active','yes');																		if(is_array($genre)){										foreach($genre as $value)										{																				?>										<option <?php if($results['private_class_name'] == $value['type_id']){echo 'selected ';} ?> value="<?php echo $value['type_id']; ?>"><?php echo $value['type_name']; ?></option>										<?php										}									}									?>
								</select> 
                            </div>

                        </div>

                      
						<div class="form-group">

                            <label class="col-md-4 control-label" for="private_class_name">Lesson Price <span class="text-danger">*</span></label>

                            <div class="col-md-6">

                                <div class="input-group">

                                    <input type="text" id="private_class_price" name="private_class_price" class="form-control" value="<?php if(isset($results['private_class_price'])){echo $results['private_class_price'];} ?>">

                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>

                                </div>

                            </div>

                        </div>
                       
						<div class="form-group">

                            <label class="col-md-4 control-label" for="private_class_name">Lesson Extra Fee <span class="text-danger">*</span></label>

                            <div class="col-md-6">

                                <div class="input-group">

                                    <input type="text" id="private_class_extra_price" name="private_class_extra_price" class="form-control" value="<?php if(isset($results['private_class_extra_price'])){echo $results['private_class_extra_price'];} ?>">

                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>

                                </div>

                            </div>

                        </div>
                       

                      

                    </fieldset>

               

                   

                    <div class="form-group form-actions">

                        <div class="col-md-8 col-md-offset-4">

                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Submit</button>

                            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>

                        </div>

                    </div>

                </form>

                <!-- END Form Validation Example Content -->



               

            </div>

            <!-- END Validation Block -->

        </div>

       

    </div>

</div>

<!-- END Page Content -->



<?php include 'inc/page_footer.php'; ?>

<?php include 'inc/template_scripts.php'; ?>



<!-- Load and execute javascript code used only in this page -->

<?php include 'inc/template_end.php'; ?>