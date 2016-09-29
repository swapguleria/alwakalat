<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>
<?php $obj->admin_not_login(); ?>

<!-- Page content -->
<div id="page-content">
    <!-- Validation Header -->
    <div id="page-content">
        <!-- Validation Header -->
        <div class="content-header">

            <div class="header-section">

                <h1>

                    <i class="gi gi-brush"></i>Clients

                </h1>

            </div>

        </div>

        <ul class="breadcrumb breadcrumb-top">
            <li>Dashboard</li>
            <li>Homepage</li>
            <li><a href="clients.php">Clients Section</a></li>
            <li><a href="">Add Client</a></li>
        </ul>
        <!-- END Validation Header -->

        <div class="row">
            <div class="col-md-9">
                <!-- Form Validation Example Block -->
                <div class="block">
                    <!-- Form Validation Example Title -->
                    <div class="block-title">
                        <h2><strong>Add Client</strong></h2>
                    </div>
                    <!-- END Form Validation Example Title -->

                    <!-- Form Validation Example Content -->
                    <form action="process.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
                        <input type="hidden" name="action" value="add_client">

                        <fieldset>
                            <?php
                            if (isset($_SESSION['success']))
                                {
                                ?>
                                <div style="color: red;font-size: 15px;padding: 5px;"><?php
                                    echo $_SESSION['success'];
                                    unset($_SESSION['success']);
                                    ?></div>
                            <?php } ?>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="slider_active">Client Name<span class="text-danger"></span></label>
                                <div class="col-md-6">															
                                    <input type="text" class="form-control" name="text">									
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="logo">Client Image <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="file" id="slider" name="slider">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="logo">Website <span class="text-danger">*</span></label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="website">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <h4><strong>Service Center</strong></h4>
                            </div>



                            <div class="form-group">
                                <label class="col-md-3 control-label" for="slider_active">Title<span class="text-danger"></span></label>
                                <div class="col-md-6">						
                                    <input type="text" class="form-control" name="s_title">				                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="slider_active">Name<span class="text-danger"></span></label>
                                <div class="col-md-6">							
                                    <input type="text" class="form-control" name="name_service">			       </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="slider_active">Mobile<span class="text-danger"></span></label>
                                <div class="col-md-6">															
                                    <input type="text" class="form-control" name="mobile_service">									
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="slider_active">Email<span class="text-danger"></span></label>
                                <div class="col-md-6">															
                                    <input type="text" class="form-control" name="email_service">									
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="slider_active">Address<span class="text-danger"></span></label>
                                <div class="col-md-6">															
                                    <input type="text" class="form-control" name="line1_service">									
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="slider_active"><span class="text-danger"></span></label>
                                <div class="col-md-6">															
                                    <input type="text" class="form-control" name="line2_service">									
                                </div>


                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="slider_active">Working Hours<span class="text-danger"></span></label>
                                <div class="col-md-6">															
                                    <input type="text" class="form-control" name="line3_service">									
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="slider_active">Google Map Iframe<span class="text-danger"></span></label>
                                <div class="col-md-6">															
                                    <input type="text" class="form-control" name="iframe_service">									
                                </div>
                            </div>
                            <div class="form-group">
                                <h4><strong>Showroom</strong></h4>
                            </div>



                            <div class="form-group">
                                <label class="col-md-3 control-label" for="slider_active">Title<span class="text-danger"></span></label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="sr_title" >									
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="slider_active">Name<span class="text-danger"></span></label>
                                <div class="col-md-6">															
                                    <input type="text" class="form-control" name="name_showroom">									
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="slider_active">Mobile<span class="text-danger"></span></label>
                                <div class="col-md-6">															
                                    <input type="text" class="form-control" name="mobile_showroom">									
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="slider_active">Email<span class="text-danger"></span></label>
                                <div class="col-md-6">															
                                    <input type="text" class="form-control" name="email_showroom">									
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="slider_active">Address<span class="text-danger"></span></label>
                                <div class="col-md-6">															
                                    <input type="text" class="form-control" name="line1_showroom">									
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="slider_active"><span class="text-danger"></span></label>
                                <div class="col-md-6">															
                                    <input type="text" class="form-control" name="line2_showroom">									
                                </div>


                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="slider_active">Working Hours<span class="text-danger"></span></label>
                                <div class="col-md-6">															
                                    <input type="text" class="form-control" name="line3_showroom">									
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="slider_active">Google Map Iframe<span class="text-danger"></span></label>
                                <div class="col-md-6">															
                                    <input type="text" class="form-control" name="iframe_showroom">									
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="slider_active">Show on Homepage<span class="text-danger">*</span></label>
                                <div class="col-md-6">

                                    <select id="active" name="slider_active" class="form-control">
                                        <option  value="yes">Yes</option>
                                        <option  value="no">No</option>

                                    </select>
                                </div>
                            </div>
                            <div id="div_showroom">
                                <div class="form-group">
                                    <h4><strong>Service Center 2</strong></h4>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="slider_active">Title<span class="text-danger"></span></label>
                                    <div class="col-md-6">										 					
                                        <input type="text" class="form-control" name="s_title_2">									
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="slider_active">Name<span class="text-danger"></span></label>
                                    <div class="col-md-6">										 					
                                        <input type="text" class="form-control" name="name_service_2">									
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="slider_active">Mobile<span class="text-danger"></span></label>
                                    <div class="col-md-6">					     <input type="text" class="form-control" name="mobile_service_2">									
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="slider_active">Email<span class="text-danger"></span></label>
                                    <div class="col-md-6">															
                                        <input type="text" class="form-control" name="email_service_2" >									
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="slider_active">Address<span class="text-danger"></span></label>
                                    <div class="col-md-6">															
                                        <input type="text" class="form-control" name="line1_service_2">									
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="slider_active"><span class="text-danger"></span></label>
                                    <div class="col-md-6">															
                                        <input type="text" class="form-control" name="line2_service_2">									
                                    </div>


                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="slider_active">Working Hours<span class="text-danger"></span></label>
                                    <div class="col-md-6">															
                                        <input type="text" class="form-control" name="line3_service_2">									
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="slider_active">Google Map Iframe<span class="text-danger"></span></label>
                                    <div class="col-md-6">															
                                        <input type="text" class="form-control" name="iframe_service_2">									
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h4><strong>Showroom 2</strong></h4>
                                </div>



                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="slider_active">Title<span class="text-danger"></span></label>
                                    <div class="col-md-6">										 					
                                        <input type="text" class="form-control" name="sr_title_2">									
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="slider_active">Name<span class="text-danger"></span></label>
                                    <div class="col-md-6">															
                                        <input type="text" class="form-control" name="name_showroom_2" >									
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="slider_active">Mobile<span class="text-danger"></span></label>
                                    <div class="col-md-6">															
                                        <input type="text" class="form-control" name="mobile_showroom_2" >									
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="slider_active">Email<span class="text-danger"></span></label>
                                    <div class="col-md-6">															
                                        <input type="text" class="form-control" name="email_showroom_2" >									
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="slider_active">Address<span class="text-danger"></span></label>
                                    <div class="col-md-6">															
                                        <input type="text" class="form-control" name="line1_showroom_2" >									
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="slider_active"><span class="text-danger"></span></label>
                                    <div class="col-md-6">															
                                        <input type="text" class="form-control" name="line2_showroom_2" >									
                                    </div>


                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="slider_active">Working Hours<span class="text-danger"></span></label>
                                    <div class="col-md-6">															
                                        <input type="text" class="form-control" name="line3_showroom_2" >									
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="slider_active">Google Map Iframe<span class="text-danger"></span></label>
                                    <div class="col-md-6">															
                                        <input type="text" class="form-control" name="iframe_showroom_2">									
                                    </div>
                                </div>



                            </div>
                        </fieldset>


                        <div class="form-group form-actions">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Submit</button>

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