<?php include 'inc/config.php'; ?>

<?php include 'inc/template_start.php'; ?>

<?php include 'inc/page_head.php'; 


	$footer	=	$obj->get_single_result('footer','id','1');
?>
<?php $obj->admin_not_login(); ?>


<!-- Page content -->

<div id="page-content">

    <!-- Blank Header -->

    <div class="content-header">

        <div class="header-section">

            <h1>

                <i class="gi gi-brush"></i>Manage Footer<br><small>A clean page to help you start!</small>

            </h1>

        </div>

    </div>

    <ul class="breadcrumb breadcrumb-top">

        <li>Dashboard</li>

        <li><a href="">Manage Footer</a></li>

    </ul>

    <!-- END Blank Header -->



    <!-- Example Block -->

    <div class="block">

        <!-- Example Title -->

        <div class="block-title">

            <h2>Footer Content</h2>

        </div>

        <!-- END Example Title -->



        <!-- Example Content -->

			<form action="process.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
			<input type="hidden" name="action" value="edit_footer">
              <input type="hidden" name="slider_id" value="<?php echo $footer['id']; ?>">
              <input type="hidden" name="slider_name1" value="<?php echo $footer['footer_image']; ?>">
              
                    <fieldset>
					<?php if(isset($_SESSION['success'])) { ?>
						<div style="color: red;font-size: 15px;padding: 5px;"><?php echo $_SESSION['success']; unset($_SESSION['success']);?></div>
					<?php } ?>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo"> Footer Image <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="file" id="slider" name="slider">
								</div>
                            </div>
                        </div><div class="form-group">                           
						<label class="col-md-3 control-label" for="slider_active">Footer Text<span class="text-danger"></span></label>                            <div class="col-md-6">
						<input type="text" class="form-control" name="text" value="<?php if(isset($footer['footer_text'])) {echo $footer['footer_text'];} ?>">									                            
						</div>                        
						</div>												
						<div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Submit</button>
                           
                        </div>
                    </div>
               
                   
                    
					<div class="form-group">
					<?php if($footer['footer_image'] !='') {?>
							<img src="../<?php echo $footer['full_path'];?> ">
					<?php } ?>
					</div>
					
                </form>
			</div>


    <!-- END Example Block -->

</div>

<!-- END Page Content -->



<?php include 'inc/page_footer.php'; ?>

<?php include 'inc/template_scripts.php'; ?>

<?php include 'inc/template_end.php'; ?>