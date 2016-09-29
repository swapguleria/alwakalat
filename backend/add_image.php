<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>

<!-- Page content -->
<div id="page-content">
    <!-- Validation Header -->
    <div class="content-header">

        <div class="header-section">

            <h1>

                <i class="gi gi-brush"></i>Add Image

            </h1>

        </div>

    </div>
    
    <ul class="breadcrumb breadcrumb-top">
        <li>Dashboard</li>
        <li>Homepage</li>
        <li><a href="content.php">Content Images</a></li>
		<li><a href="">Add Image</a></li>
    </ul>
    <!-- END Validation Header -->

    <div class="row">
        <div class="col-md-9">
            <!-- Form Validation Example Block -->
            <div class="block">
                <!-- Form Validation Example Title -->
                <div class="block-title">
                    <h2><strong>Image</strong></h2>
                </div>
                <!-- END Form Validation Example Title -->

                <!-- Form Validation Example Content -->
                <form action="process.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
				<input type="hidden" name="action" value="add_image">
              
                    <fieldset>
					<?php if(isset($_SESSION['success'])) { ?>
						<div style="color: red;font-size: 15px;padding: 5px;"><?php echo $_SESSION['success']; unset($_SESSION['success']);?></div>
					<?php } ?>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Image <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="file" id="slider" name="slider">
								</div>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">Text<span class="text-danger"></span></label>
                            <div class="col-md-6">															
							<input type="text" class="form-control" name="text">									
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">Text(Arabic)<span class="text-danger"></span></label>
                            <div class="col-md-6">															
							<input type="text" class="form-control" name="text_arabic">									
                            </div>
                        </div>	
						<div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">Link<span class="text-danger"></span></label>
                            <div class="col-md-6">															
							<input type="text" class="form-control" name="link" value="">									
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