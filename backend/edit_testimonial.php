<?php include 'inc/config.php'; ?>

<?php include 'inc/template_start.php'; ?>

<?php include 'inc/page_head.php';

	$results	=	$obj->get_single_result('testimonial','testimonial_id',$_GET['id']);

 ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">


<!-- Page content -->

<div id="page-content">

    <!-- Validation Header -->

    

    <ul class="breadcrumb breadcrumb-top">

        <li>Testimonial</li>

        

    </ul>

    <!-- END Validation Header -->



    <div class="row">

        <div class="col-md-9">

            <!-- Form Validation Example Block -->

            <div class="block">

                <!-- Form Validation Example Title -->

                <div class="block-title">

                    <h2><strong>Edit Testimonial</strong></h2>

                </div>

                <!-- END Form Validation Example Title -->



                <!-- Form Validation Example Content -->

                <form action="process.php" method="post" class="form-horizontal form-bordered">

				<input type="hidden" name="action" value="Edit_testimonial">

                <input type="hidden" name="testimonial_id" value="<?php echo $results['testimonial_id']; ?>">

                    <fieldset>

                        <legend><i class="fa fa-angle-right"></i> New Data Info</legend>

                        <div class="form-group">

                            <label class="col-md-4 control-label" for="new_heading">Testimonial Heading<span class="text-danger">*</span></label>

                            <div class="col-md-6">

                                 <div class="input-group">

                                    <input type="text" id="testimonial_heading" name="testimonial_heading" class="form-control" value="<?php if(isset($results['testimonial_heading'])){echo $results['testimonial_heading'];} ?>">

                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>

                                </div> 
                            </div>

                        </div>

                      
						<div class="form-group">

                            <label class="col-md-4 control-label" for="private_class_name">Testimonial Summary <span class="text-danger">*</span></label>

                            <div class="col-md-6">

                                <div class="input-group">

                        
								<textarea id="testimonial_summary" name="testimonial_summary" rows="9" class="form-control" placeholder="Summary"><?php if(isset($results['testimonial_summary'])){echo $results['testimonial_summary'];} ?></textarea>

                                </div>

                            </div>

                        </div>
						<div class="form-group">

                            <label class="col-md-4 control-label" for="new_date">Testimonial_summary <span class="text-danger">*</span></label>

                            <div class="col-md-6">

                                <div class="input-group">

                                    <input type="text" id="testimonial_username" name="testimonial_username" class="form-control" value="<?php if(isset($results['testimonial_username'])){echo $results['testimonial_username'];} ?>">

                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>

                                </div>

                            </div>

                        </div>
                       <div class="form-group">
                            <label class="col-md-4 control-label" for="	new_active">Testimonial Active<span class="text-danger">*</span></label>
                            <div class="col-md-6">
							 <div class="input-group">
                                <select id="active" name="testimonial_active" class="form-control">
								<?php if(isset($results['testimonial_active']) && $results['testimonial_active']=='yes'){
								$yes	= 'selected'; 
							}else{
								$yes	= ''; 
							} if(isset($results['testimonial_active']) && $results['testimonial_active']=='no'){
								$no	= 'selected'; 
							}else{
								$no	= ''; 
							} ?>
                                    <option <?php echo $yes; ?> value="yes">Yes</option>
                                    <option <?php echo $no; ?> value="no">No</option>
                                   
                                </select>
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