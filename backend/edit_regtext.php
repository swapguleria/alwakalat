<?php include 'inc/config.php'; ?>

<?php include 'inc/template_start.php'; ?>

<?php include 'inc/page_head.php';

	$results	=	$obj->get_single_result('regtext','id',$_GET['id']);

 ?>



<!-- Page content -->

<div id="page-content">

    <!-- Validation Header -->

    

    <ul class="breadcrumb breadcrumb-top">

        <li>Text</li>

        

    </ul>

    <!-- END Validation Header -->



    <div class="row">

        <div class="col-md-9">

            <!-- Form Validation Example Block -->

            <div class="block">

                <!-- Form Validation Example Title -->

                <div class="block-title">

                    <h2><strong>Edit Text Page</strong></h2>

                </div>

                <!-- END Form Validation Example Title -->



                <!-- Form Validation Example Content -->

                <form action="process.php" method="post" class="form-horizontal form-bordered">

				<input type="hidden" name="action" value="Edit_text">

                <input type="hidden" name="id" value="<?php echo $results['id']; ?>">

                    <fieldset>

                        <legend><i class="fa fa-angle-right"></i> Text Info</legend>

                        <div class="form-group">

                            <label class="col-md-4 control-label" for="payment_length">Paragraph 1 <span class="text-danger">*</span></label>

                            <div class="col-md-6">

                               

                                    
                                    <textarea name="p1" class="form-control" cols="10" rows="10"><?php if(isset($results['p1'])){echo $results['p1'];} ?></textarea>

                               

                            </div>

                        </div>

						<div class="form-group">

							<label class="col-md-4 control-label" for="payment_unit">Paragraph 1<span class="text-danger">*</span></label>

							<div class="col-md-6">  
								 <textarea name="p2" class="form-control" cols="10" rows="10"><?php if(isset($results['p2'])){echo $results['p2'];} ?></textarea>  
								
							</div>

						</div>
						
						<div class="form-group">

                            <label class="col-md-4 control-label" for="payment_occurrence">Paragraph 1  <span class="text-danger">*</span></label>

                            <div class="col-md-6">

                                 <textarea name="p3" class="form-control" cols="10" rows="10"><?php if(isset($results['p3'])){echo $results['p3'];} ?></textarea>

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