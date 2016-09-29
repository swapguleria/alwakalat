<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; 
$results	=	$obj->get_single_result('slider','slider_id',$_GET['id']);

?>

<!-- Page content -->
<div id="page-content">
    <!-- Validation Header -->
    
    <ul class="breadcrumb breadcrumb-top">
        <li>Edit Slide</li>
        
    </ul>
    <!-- END Validation Header -->

    <div class="row">
        <div class="col-md-9">
            <!-- Form Validation Example Block -->
            <div class="block">
                <!-- Form Validation Example Title -->
                <div class="block-title">
                    <h2><strong>Slide</strong></h2>
                </div>
                <!-- END Form Validation Example Title -->

                <!-- Form Validation Example Content -->
                <form action="process.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
				<input type="hidden" name="action" value="Edit_slider">
              <input type="hidden" name="slider_id" value="<?php echo $results['slider_id']; ?>">
              <input type="hidden" name="slider_name1" value="<?php echo $results['slider_image_name']; ?>">
              
                    <fieldset>
					<?php if(isset($_SESSION['success'])) { ?>
						<div style="color: red;
    font-size: 15px;
    padding: 5px;"><?php echo $_SESSION['success']; unset($_SESSION['success']);?></div>
					<?php } ?>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="logo">Slide Image <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="file" id="slider" name="slider">
								</div>
                            </div>
                        </div>												<div class="form-group">                            <label class="col-md-3 control-label" for="slider_active">H1<span class="text-danger"></span></label>                            <div class="col-md-6">															<input type="text" class="form-control" name="h1" value="<?php if(isset($results['h1'])) {echo $results['h1'];} ?>">									                            </div>                        </div>												<div class="form-group">                            <label class="col-md-3 control-label" for="slider_active">H2<span class="text-danger"></span></label>                            <div class="col-md-6">															<input type="text" class="form-control" name="h2" value="<?php if(isset($results['h2'])) {echo $results['h2'];} ?>">									                            </div>                        </div>
						
						<div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">H1(arabic)<span class="text-danger"></span></label>
                            <div class="col-md-6">															<input type="text" class="form-control" name="h1_arab">	
								
                            </div>
                        </div>
											
						<div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">H2(arabic)<span class="text-danger"></span></label>
                            <div class="col-md-6">															<input type="text" class="form-control" name="h2_arab">	
								
                            </div>
                        </div>
						   <div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">Active<span class="text-danger">*</span></label>
                            <div class="col-md-6">
							
                                <select id="active" name="slider_active" class="form-control">
								<?php if(isset($results['slider_active']) && $results['slider_active']=='yes'){
								$yes	= 'selected'; 
							}else{
								$yes	= ''; 
							} if(isset($results['slider_active']) && $results['slider_active']=='no'){
								$no	= 'selected'; 
							}else{
								$no	= ''; 
							} ?>
                                    <option <?php echo $yes;?>  value="yes">Yes</option>
                                    <option <?php echo $no;?> value="no">No</option>
                                   
                                </select>
                            </div>
                        </div>
                      </fieldset>
               
                   
                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Submit</button>
                           
                        </div>
                    </div>
					<div class="form-group">
					<?php if($results['slider_image_name'] !='') {?>
							<img src="../<?php echo $results['slider_thumb_path'];?> ">
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