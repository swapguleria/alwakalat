<?php include 'inc/config.php'; ?>

<?php include 'inc/template_start.php'; ?>

<?php include 'inc/page_head.php'; ?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">

<!-- Page content -->

<div id="page-content">

    <!-- Validation Header -->

    

    <ul class="breadcrumb breadcrumb-top">

        <li>New Section Homepage</li>

        

    </ul>

    <!-- END Validation Header -->



    <div class="row">

        <div class="col-md-9">

            <!-- Form Validation Example Block -->

            <div class="block">

                <!-- Form Validation Example Title -->

                <div class="block-title">

                    <h2><strong>Add New Data</strong></h2>

                </div>

                <!-- END Form Validation Example Title -->



                <!-- Form Validation Example Content -->

                <form action="process.php" method="post" class="form-horizontal form-bordered">

				<input type="hidden" name="action" value="Insert_new">

                    <fieldset>

                        <legend><i class="fa fa-angle-right"></i> new Info</legend>

                        <div class="form-group">

                            <label class="col-md-4 control-label" for="new_heading">New Heading <span class="text-danger">*</span></label>

                            <div class="col-md-6">

                                <div class="input-group">

                                    <input type="text" id="new_heading" name="new_heading" class="form-control" placeholder="heading..">

                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>

                                </div>

                            </div>

                        </div>
						<div class="form-group">

                            <label class="col-md-4 control-label" for="new_summary">New Summary <span class="text-danger">*</span></label>

                            <div class="col-md-6">

                                <div class="input-group">

									<textarea id="new_summary" name="new_summary" rows="9" class="form-control" placeholder="Summary"></textarea>
                                    

                                </div>

                            </div>

                        </div>
						<div class="form-group">

                            <label class="col-md-4 control-label" for="new_date">New Date <span class="text-danger">*</span></label>

                            <div class="col-md-6">

                                <div class="input-group">

                                    <input type="text" id="new_date" name="new_date" class="form-control new_date" placeholder="date..">

                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>

                                </div>

                            </div>

                        </div>
                       <div class="form-group">
                            <label class="col-md-4 control-label" for="	new_active">Active<span class="text-danger">*</span></label>
                            <div class="col-md-6">
							 <div class="input-group">
                                <select id="active" name="new_active" class="form-control">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                   
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