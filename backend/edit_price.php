<?php include 'inc/config.php'; ?>

<?php include 'inc/template_start.php'; ?>

<?php include 'inc/page_head.php';

	$results	=	$obj->get_single_result('price','price_id',$_GET['id']);

 ?>



<!-- Page content -->

<div id="page-content">

    <!-- Validation Header -->

    

    <ul class="breadcrumb breadcrumb-top">

        <li>Price</li>

        

    </ul>

    <!-- END Validation Header -->



    <div class="row">

        <div class="col-md-9">

            <!-- Form Validation Example Block -->

            <div class="block">

                <!-- Form Validation Example Title -->

                <div class="block-title">

                    <h2><strong>Edit Price Page</strong></h2>

                </div>

                <!-- END Form Validation Example Title -->



                <!-- Form Validation Example Content -->

                <form action="process.php" method="post" class="form-horizontal form-bordered">

				<input type="hidden" name="action" value="Edit_price">

                <input type="hidden" name="price_id" value="<?php echo $results['price_id']; ?>">

                    <fieldset>

                        <legend><i class="fa fa-angle-right"></i> Price Info</legend>

                        <div class="form-group">

                            <label class="col-md-4 control-label" for="class_per_week">Classes Per Week <span class="text-danger">*</span></label>

                            <div class="col-md-6">

                                <div class="input-group">

                                    <input type="text" id="class_per_week" name="class_per_week" class="form-control" placeholder="Type Name.." value="<?php if(isset($results['class_per_week'])){echo $results['class_per_week'];} ?>">

                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>

                                </div>

                            </div>

                        </div>

						<div class="form-group">

                            <label class="col-md-4 control-label" for="price">Price Per Month <span class="text-danger">*</span></label>

                            <div class="col-md-6">

                                <div class="input-group">

                                    <input type="text" id="price" name="price" class="form-control"  value="<?php if(isset($results['price'])){echo $results['price'];} ?>">

                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>

                                </div>

                            </div>

                        </div>

                      

                       

                      <div class="form-group">

                            <label class="col-md-4 control-label" for="price_active">Active<span class="text-danger">*</span></label>

                            <div class="col-md-6">

							<?php if(isset($results['price_active']) && $results['price_active']=='yes'){

								$yes	= 'selected'; 

							}else{

								$yes	= ''; 

							} if(isset($results['type_active']) && $results['type_active']=='no'){

								$no	= 'selected'; 

							}else{

								$no	= ''; 

							} ?>

                                <select id="active" name="price_active" class="form-control">

                                    <option <?php echo $yes; ?> value="yes">Yes</option>

                                    <option <?php echo $no; ?> value="no">No</option>

                                   

                                </select>

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