<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php';
	$results	=	$obj->get_single_result('logo','logo_id','1');
 ?>

<!-- Page content -->
<div id="page-content">
    <!-- Validation Header -->
    
    <ul class="breadcrumb breadcrumb-top">
        <li>Logo</li>
        
    </ul>
    <!-- END Validation Header -->

    <div class="row">
        <div class="col-md-9">
            <!-- Form Validation Example Block -->
            <div class="block">
                <!-- Form Validation Example Title -->
                <div class="block-title">
                    <h2><strong>Logo</strong></h2>
                </div>
                <!-- END Form Validation Example Title -->

                <!-- Form Validation Example Content -->
                <form action="process.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
				<input type="hidden" name="action" value="Edit_logo">
                <input type="hidden" name="logo_id" value="<?php echo $results['logo_id']; ?>">
                <input type="hidden" name="logo_name1" value="<?php echo $results['logo_name']; ?>">
                    <fieldset>
					<?php if(isset($_SESSION['success'])) { ?>
						<div style="color: red;
    font-size: 15px;
    padding: 5px;"><?php echo $_SESSION['success']; unset($_SESSION['success']);?></div>
					<?php } ?>
                        <legend><i class="fa fa-angle-right"></i>Logo</legend>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="logo">Logo <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="file" id="logo" name="logo">
                                    
                                </div>
                            </div>
                        </div>
                       <div class="form-group">
					   <?php if($results['logo_path']!=''){ ?>
						<img src="../<?php echo $results['logo_path'];?>">
						<?php } ?>
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