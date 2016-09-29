<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>
<?php $obj->admin_not_login(); ?>
<!-- Page content -->
<div id="page-content">
    <!-- Validation Header -->

    <div class="content-header">

        <div class="header-section">

            <h1>

                <i class="gi gi-brush"></i>Videos

            </h1>

        </div>

    </div>

    
    <ul class="breadcrumb breadcrumb-top">
        <li>Dashboard</li>
        <li><a href="manage_videos.php">Manage Videos</a></li>
        <li><a href="add_video_link.php">Add Video Link</a></li>
    </ul>
    <!-- END Validation Header -->

    <div class="row">
        <div class="col-md-9">
            <!-- Form Validation Example Block -->
            <div class="block">
                <!-- Form Validation Example Title -->
                <div class="block-title">
                    <h2><strong>Video Link</strong></h2>
                </div>
                <!-- END Form Validation Example Title -->

                <!-- Form Validation Example Content -->
                <form action="process.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
				<input type="hidden" name="action" value="add_video_link">
              
                    <fieldset>
					<?php if(isset($_SESSION['success'])) { ?>
						<div style="color: red;font-size: 15px;padding: 5px;"><?php echo $_SESSION['success']; unset($_SESSION['success']);?></div>
					<?php } ?>

						<div class="form-group">
                            <label class="col-md-3 control-label">Link Address</label>
                            <div class="col-md-6">															
							<input type="text" class="form-control" name="text">
                            </div>
							<label class="col-md-3 control-label">Title</label>
                            <div class="col-md-6">															
							<input type="text" class="form-control" name="title">
                            </div>
							<label class="col-md-3 control-label">Duration</label>
                            <div class="col-md-6">															
							<input type="text" class="form-control" name="duration">
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