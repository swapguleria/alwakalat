<?php include 'inc/config.php'; ?>

<?php include 'inc/template_start.php'; ?>

<?php include 'inc/page_head.php'; 
$results	=	$obj->get_single_result('maker','id',$_GET['id']);
?>



<!-- Page content -->

<div id="page-content">

    <!-- Blank Header -->

    <div class="content-header">

        <div class="header-section">

            <h1>

                <i class="gi gi-brush"></i>Manage Makers<br><small></small>

            </h1>

        </div>

    </div>

    <ul class="breadcrumb breadcrumb-top">

        <li>Dashboard</li>

        <li>Homepage</li>

        <li><a href="">Edit Makers</a></li>

    </ul>

    <!-- END Blank Header -->
	<div class="block">
                <!-- Form Validation Example Title -->
                <div class="block-title">
                    <h2><strong>Edit Maker</strong></h2>
                </div>
                <!-- END Form Validation Example Title -->

                <!-- Form Validation Example Content -->
                <form action="process.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
				<input type="hidden" name="action" value="edit_maker">
				<input type="hidden" name="id" value="<?php echo $results['id'];?>">
              
                    <fieldset>
					<?php if(isset($_SESSION['success'])) { ?>
						<div style="color: red; font-size: 15px;padding: 5px;"><?php echo $_SESSION['success']; unset($_SESSION['success']);?></div>
					<?php } ?>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Name <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                
                                    <input type="text" name="name" value="<?php echo $results['name'];?>" class="form-control">
								
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



    <!-- END Example Block -->

</div>

<!-- END Page Content -->



<?php include 'inc/page_footer.php'; ?>

<?php include 'inc/template_scripts.php'; ?>

<?php include 'inc/template_end.php'; ?>