<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; 
$results	=	$obj->get_single_result('social','social_id',1);
?>

<!-- Page content -->
<div id="page-content">
    <!-- Validation Header -->
    
    <ul class="breadcrumb breadcrumb-top">
        <li>Social</li>
        
    </ul>
    <!-- END Validation Header -->

    <div class="row">
        <div class="col-md-9">
            <!-- Form Validation Example Block -->
            <div class="block">
                <!-- Form Validation Example Title -->
                <div class="block-title">
                    <h2><strong>Social Icon</strong></h2>
                </div>
                <!-- END Form Validation Example Title -->

                <!-- Form Validation Example Content -->
                <form action="process.php" method="post" class="form-horizontal form-bordered">
				<input type="hidden" name="action" value="Edit_social">
                <input type="hidden" name="social_id" value="<?php echo $results['social_id']; ?>">
                    <fieldset>
                        <legend><i class="fa fa-angle-right"></i> Social Info</legend>
						<legend>Leave empty if you dont want to shown any one social link.</legend>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="social_facebook">Facebook <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="social_facebook" name="social_facebook" class="form-control" placeholder="Facebook.." value="<?php if(isset($results['social_facebook'])){echo $results['social_facebook'];} ?>">
                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                </div>
                            </div>
                        </div>
                       <div class="form-group">
                            <label class="col-md-4 control-label" for="social_twitter">Twitter <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="social_twitter" name="social_twitter" class="form-control" placeholder="Twitter.." value="<?php if(isset($results['social_twitter'])){echo $results['social_twitter'];} ?>">
                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                </div>
                            </div>
                        </div>
                      <div class="form-group">
                            <label class="col-md-4 control-label" for="social_google">Google Plus <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="social_google" name="social_google" class="form-control" placeholder="Google.." value="<?php if(isset($results['social_google'])){echo $results['social_google'];} ?>">
                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                </div>
                            </div>
                        </div>
                      <div class="form-group">
                            <label class="col-md-4 control-label" for="social_vimeo">Vimeo<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="social_vimeo" name="social_vimeo" class="form-control" placeholder="Vimeo.." value="<?php if(isset($results['social_vimeo'])){echo $results['social_vimeo'];} ?>">
                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                </div>
                            </div>
                        </div>
                      
                       <div class="form-group">
                            <label class="col-md-4 control-label" for="social_instagram">Instagram<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="social_instagram" name="social_instagram" class="form-control" placeholder="Instagram.." value="<?php if(isset($results['social_instagram'])){echo $results['social_instagram'];} ?>">
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