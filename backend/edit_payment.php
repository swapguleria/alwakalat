<?php include 'inc/config.php'; ?>

<?php include 'inc/template_start.php'; ?>

<?php include 'inc/page_head.php';

	$results	=	$obj->get_single_result('payment','payment_id',$_GET['id']);

 ?>



<!-- Page content -->

<div id="page-content">

    <!-- Validation Header -->

    

    <ul class="breadcrumb breadcrumb-top">

        <li>Payment</li>

        

    </ul>

    <!-- END Validation Header -->



    <div class="row">

        <div class="col-md-9">

            <!-- Form Validation Example Block -->

            <div class="block">

                <!-- Form Validation Example Title -->

                <div class="block-title">

                    <h2><strong>Edit Payment Page</strong></h2>

                </div>

                <!-- END Form Validation Example Title -->



                <!-- Form Validation Example Content -->

                <form action="process.php" method="post" class="form-horizontal form-bordered">

				<input type="hidden" name="action" value="Edit_payment">

                <input type="hidden" name="payment_id" value="<?php echo $results['payment_id']; ?>">

                    <fieldset>

                        <legend><i class="fa fa-angle-right"></i> Payment Info</legend>

                        <div class="form-group">

                            <label class="col-md-4 control-label" for="payment_length">Payment Length (Interval) <span class="text-danger">*</span></label>

                            <div class="col-md-6">

                                <div class="input-group">

                                    <input type="text" id="payment_length" name="payment_length" class="form-control" placeholder="Type Name.." value="<?php if(isset($results['payment_length'])){echo $results['payment_length'];} ?>">

                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>

                                </div>

                            </div>

                        </div>

						<div class="form-group">

							<label class="col-md-4 control-label" for="payment_unit">Payment Unit<span class="text-danger">*</span></label>

							<div class="col-md-6">  
								<select id="active" name="payment_unit" class="form-control">
									<option <?php if($results['payment_unit'] == "months"){echo 'selected ';} ?> value="months">months</option>
									<option <?php if($results['payment_unit'] == "days"){echo 'selected ';} ?> value="days">days</option>	
									
								</select>   
								
							</div>

						</div>
						
						<div class="form-group">

                            <label class="col-md-4 control-label" for="payment_occurrence">Payment occurrence  <span class="text-danger">*</span></label>

                            <div class="col-md-6">

                                <div class="input-group">

                                    <input type="text" id="payment_occurrence" name="payment_occurrence" class="form-control" placeholder="Type Name.." value="<?php if(isset($results['payment_occurrence'])){echo $results['payment_occurrence'];} ?>">

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