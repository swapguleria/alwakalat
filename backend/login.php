<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php $obj->admin_login(); ?>
<!-- Login Background -->
<div id="login-background">
    <!-- For best results use an image with a resolution of 2560x400 pixels (prefer a blurred image for smaller file size) -->
    <img src="img/placeholders/headers/profile_header.jpg" alt="Login Background" class="animation-pulseSlow">
</div>
<!-- END Login Background -->

<!-- Login Container -->
<div id="login-container" class="animation-fadeIn">
    <!-- Login Title -->
    <div class="login-title text-center">
        <h1><i class="gi gi-flash"></i> <strong><?php echo $template['name']; ?> Login</strong></h1>
    </div>
    <!-- END Login Title -->

    <!-- Login Block -->
    <div class="block remove-margin">
        <!-- Login Form -->
        <form action="process.php" method="post" id="form-login" class="form-horizontal form-bordered form-control-borderless">
		<input type="hidden" name="action" value="Login">
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                        <input type="text" id="admin_username" name="admin_username" class="form-control input-lg" placeholder="Username">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                        <input type="password" id="admin_password" name="admin_password" class="form-control input-lg" placeholder="Password">
                    </div>
                </div>
            </div>
            <div class="form-group form-actions">
                
                <div class="col-xs-8 text-right">
                    <button type="submit" class="btn btn-sm btn-primary"> Login to Dashboard <i class="fa fa-angle-right"></i></button>
                </div>
            </div>
            <!--div class="form-group">
                <div class="col-xs-12">
                    <p class="text-center remove-margin"><small>Don't have an account?</small> <a href="javascript:void(0)" id="link-login"><small>Create one for free!</small></a></p>
                </div>
            </div-->
        </form>
        <!-- END Login Form -->

        
    </div>
    <!-- END Login Block -->
</div>
<!-- END Login Container -->


<?php include 'inc/template_scripts.php'; ?>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/login.js"></script>
<script>$(function(){ Login.init(); });</script>

<?php include 'inc/template_end.php'; ?>