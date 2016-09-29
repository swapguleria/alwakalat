<?php include 'inc/config.php'; ?>

<?php include 'inc/template_start.php'; ?>

<?php include 'inc/page_head.php';

	$results	=	$obj->get_single_result('enroll_fee','enroll_id',$_GET['id']);

 ?>



<!-- Page content -->

<div id="page-content">

    <!-- Validation Header -->

    

    <ul class="breadcrumb breadcrumb-top">

        <li>Enroll Fee & Text</li>

        

    </ul>

    <!-- END Validation Header -->



    <div class="row">

        <div class="col-md-9">

            <!-- Form Validation Example Block -->

            <div class="block">

                <!-- Form Validation Example Title -->

                <div class="block-title">

                    <h2><strong>Edit Enroll Fee & Text</strong></h2>

                </div>

                <!-- END Form Validation Example Title -->



                <!-- Form Validation Example Content -->

                <form action="process.php" method="post" class="form-horizontal form-bordered">

				<input type="hidden" name="action" value="Edit_enroll_fee">

                <input type="hidden" name="enroll_id" value="<?php echo $results['enroll_id']; ?>">

                    <fieldset>

                        <legend><i class="fa fa-angle-right"></i> Enroll Fee & Text Info</legend>

                        <div class="form-group">

                            <label class="col-md-4 control-label" for="fee">Fee <span class="text-danger">*</span></label>

                            <div class="col-md-6">

                                <div class="input-group">

                                    <input type="text" id="fee" name="fee" class="form-control" placeholder="Type fee.." value="<?php if(isset($results['fee'])){echo $results['fee'];} ?>">

                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>

                                </div>

                            </div>

                        </div>

						<div class="form-group">

							<label class="col-md-4 control-label" for="text">Text<span class="text-danger">*</span></label>

							<div class="col-md-6">

                                <div class="input-group">

                                    <input type="text" id="text" name="text" class="form-control" placeholder="Type text.." value="<?php if(isset($results['text'])){echo $results['text'];} ?>">

                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>

                                </div>

                            </div>

						</div>
						
						<div class="form-group">

                            <label class="col-md-4 control-label" for="underline_text">Underline Text  <span class="text-danger">*</span></label>

                            <div class="col-md-6">

                                <div class="input-group">

                                    <input type="text" id="underline_text" name="underline_text" class="form-control" placeholder="Type underline text.." value="<?php if(isset($results['underline_text'])){echo $results['underline_text'];} ?>">

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