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

                <i class="gi gi-brush"></i>Providers

            </h1>

        </div>

    </div>

    <ul class="breadcrumb breadcrumb-top">
        <li>Dashboard</li>
        <li>Homepage</li>
        <li><a href="provider.php">Providers Section</a></li>
		<li><a href="">Add Provider</a></li>
    </ul>
    <!-- END Validation Header -->

    <div class="row">
        <div class="col-md-9">
            <!-- Form Validation Example Block -->
            <div class="block">
                <!-- Form Validation Example Title -->
                <div class="block-title">
                    <h2><strong>Add Provider</strong></h2>
                </div>
                <!-- END Form Validation Example Title -->

                <!-- Form Validation Example Content -->
                <form action="process.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
				<input type="hidden" name="action" value="add_provider">
              
                    <fieldset>
					<?php if(isset($_SESSION['success'])) { ?>
						<div style="color: red;font-size: 15px;padding: 5px;"><?php echo $_SESSION['success']; unset($_SESSION['success']);?></div>
					<?php } ?>
                        
						<div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">Provider Name<span class="text-danger"></span></label>
                            <div class="col-md-6">															
							<input type="text" class="form-control" name="text">									
                            </div>
                        </div>
						
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Provider Image <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="file" id="slider" name="slider">
								</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Provider pdf English <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="file" id="pdf_english" name="pdf_english">
								</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Provider pdf Arabic <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="file" id="pdf_arabic" name="pdf_arabic">
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
                            <label class="col-md-3 control-label" for="logo">Social facebook <span class="text-danger"></span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                               <i class="fa fa-facebook"></i> <input type="text" class="form-control" name="social_link1" value="<?php if(isset($results['social_link1'])) {echo $results['social_link1'];} ?>">
								   
								</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Social twitter <span class="text-danger"></span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                  <i class="fa fa-twitter"></i><input type="text" class="form-control" name="social_link2" value="<?php if(isset($results['social_link2'])) {echo $results['social_link2'];} ?>">
								</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Social snapchat <span class="text-danger"></span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <i class="fa fa-google"></i><input type="text" class="form-control" name="social_link3" value="<?php if(isset($results['social_link3'])) {echo $results['social_link3'];} ?>">
								</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Social instagram <span class="text-danger"></span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                   <i class="fa fa-dribbble"></i><input type="text" class="form-control" name="social_link4" value="<?php if(isset($results['social_link4'])) {echo $results['social_link4'];} ?>">
								</div>
                            </div>
                        </div>

						
						
						
                        <div class="form-group">                           
						<label class="col-md-3 control-label" for="slider_active">Content<span class="text-danger">*</span></label> 
						<div class="col-md-6">
						
						<textarea name="content" id="ckeditor"><?php if(isset($results['content'])) {echo $results['content'];} ?></textarea>		
						</div>                        
						</div>
                        <div class="form-group">                           
						<label class="col-md-3 control-label" for="slider_active">Content(Arabic)<span class="text-danger">*</span></label> 
						<div class="col-md-6">
						
						<textarea name="content_arabic" id="ckeditor2"><?php if(isset($results['content_arabic'])) {echo $results['content_arabic'];} ?></textarea>		
						</div>                        
						</div>
                        
                        
                        <div class="form-group">
                            <h4><strong>Service Center</strong></h4>
                        </div>
						
							
						
						
						<div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">Name<span class="text-danger"></span></label>
                            <div class="col-md-6">															
							<input type="text" class="form-control" name="name_service">									
                            </div>
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