<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; 
$results	=	$obj->get_single_result('searches','id',$_GET['id']);

?>

<!-- Page content -->
<div id="page-content">
    <!-- Validation Header -->
    
    <ul class="breadcrumb breadcrumb-top">
        <li>Edit Search</li>
        
    </ul>
    <!-- END Validation Header -->

    <div class="row">
        <div class="col-md-9">
            <!-- Form Validation Example Block -->
            <div class="block">
                <!-- Form Validation Example Title -->
                <div class="block-title">
                    <h2><strong>Change image </strong></h2>
                </div>
                <!-- END Form Validation Example Title -->

                <!-- Form Validation Example Content -->
                <form action="process.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
				<input type="hidden" name="action" value="edit_search">
              <input type="hidden" name="slider_id" value="<?php echo $results['id']; ?>">
              <input type="hidden" name="slider_name1" value="<?php echo $results['search_image']; ?>">
              
                    <fieldset>
					<?php if(isset($_SESSION['success'])) { ?>
						<div style="color: red;
    font-size: 15px;
    padding: 5px;"><?php echo $_SESSION['success']; unset($_SESSION['success']);?></div>
					<?php } ?>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Search Image <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="file" id="slider" name="slider">
								</div>
                            </div>
                        </div>												
<!--						<div class="form-group">                           
						<label class="col-md-3 control-label" for="slider_active">Search Name<span class="text-danger"></span></label> 
						<div class="col-md-6">
						<input type="text" class="form-control" name="text" value="<?php if(isset($results['search_name'])) {echo $results['search_name'];} ?>">									                            
						</div>                        
						</div>												
						   <div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">Show on Homepage<span class="text-danger">*</span></label>
                            <div class="col-md-6">
							
                                <select id="active" name="slider_active" class="form-control">
								<?php if(isset($results['show']) && $results['show']=='yes'){
								$yes	= 'selected'; 
							}else{
								$yes	= ''; 
							} if(isset($results['show']) && $results['show']=='no'){
								$no	= 'selected'; 
							}else{
								$no	= ''; 
							} ?>
                                    <option <?php echo $yes;?>  value="yes">Yes</option>
                                    <option <?php echo $no;?> value="no">No</option>
                                   
                                </select>
                            </div>
                        </div>-->
                      </fieldset>
               
                   
                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Submit</button>
                           
                        </div>
                    </div>
					<div class="form-group">
					<?php if($results['search_image'] !='') {?>
							 <img src="http://alwakalat.com/timthumb/timthumb.php?w=117&h=115&src=http://alwakalat.com/<?php echo $results['full_path']; ?>" >
                                                         <!--<img src="../<?php echo $results['thumb'];?> ">-->
					<?php } ?>
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