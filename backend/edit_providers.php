<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; 
$results	=	$obj->get_single_result('providers','id',$_GET['id']);

?>

<!-- Page content -->
<div id="page-content">
    <!-- Validation Header -->
    
    <ul class="breadcrumb breadcrumb-top">
        <li>Edit Provider</li>
        
    </ul>
    <!-- END Validation Header -->

    <div class="row">
        <div class="col-md-9">
            <!-- Form Validation Example Block -->
            <div class="block">
                <!-- Form Validation Example Title -->
                <div class="block-title">
                    <h2><strong>Provider</strong></h2>
                </div>
                <!-- END Form Validation Example Title -->

                <!-- Form Validation Example Content -->
                <form action="process.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
				<input type="hidden" name="action" value="edit_provider">
              <input type="hidden" name="slider_id" value="<?php echo $results['id']; ?>">
              <input type="hidden" name="slider_name1" value="<?php echo $results['provider_image']; ?>">
               <input type="hidden" name="pdf_english1" value="<?php echo $results['pdf_english']; ?>">
               <input type="hidden" name="pdf_arabic1" value="<?php echo $results['pdf_arabic']; ?>">
              
                    <fieldset>
					<?php if(isset($_SESSION['success'])) { ?>
						<div style="color: red;
    font-size: 15px;
    padding: 5px;"><?php echo $_SESSION['success']; unset($_SESSION['success']);?></div>
					<?php } ?>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Provider Image <span class="text-danger"></span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="file" id="slider" name="slider">
								</div>
                            </div>
                        </div>	
                        <div class="form-group">
            <label class="col-md-3 control-label" for="logo">Provider Pdf English<span class="text-danger"></span></label>
            <div class="col-md-6">
            <div class="input-group">
                <input type="file" id="pdf_english" name="pdf_english" >
                                            </div>
                <div class="form-group">
                        <?php if($results['pdf_english']!='') { ?>
                        <a href="http://alwakalat.com/pdf/<?php echo $results['pdf_english']; ?>"target="_blank">Check pdf English </a>
                    
                        <?php } ?>

                    </div>
            </div>
            </div> 											
                        <div class="form-group">
            <label class="col-md-3 control-label" for="logo">Provider Pdf Arabic<span class="text-danger"></span></label>
            <div class="col-md-6">
            <div class="input-group">
                <input type="file" id="pdf_arabic" name="pdf_arabic" >
                                            </div>
                <div class="form-group">
                        <?php if($results['pdf_arabic']!='') { ?>
                        <a href="http://alwakalat.com/pdf/<?php echo $results['pdf_arabic']; ?>"target="_blank">Check pdf Arabic </a>
                    
                        <?php } ?>

                    </div>
            </div>
            </div> 											
						<div class="form-group">                           
						<label class="col-md-3 control-label" for="slider_active">Provider Name<span class="text-danger"></span></label> 
						<div class="col-md-6">
						<input type="text" class="form-control" name="text" value="<?php if(isset($results['provider_name'])) {echo $results['provider_name'];} ?>">									                            
						</div>                        
						</div>	
						
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Website <span class="text-danger"></span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="website" value="<?php if(isset($results['website'])) {echo $results['website'];} ?>">
								</div>
                            </div>
                        </div>
                        
                       
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Social Link1 <span class="text-danger"></span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                               <i class="fa fa-facebook"></i> <input type="text" placeholder="Please enter facebook url here" class="form-control" name="social_link1" value="<?php if(isset($results['social_link1'])) {echo $results['social_link1'];} ?>">
								   
								</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Social Link2 <span class="text-danger"></span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <i class="fa fa-twitter"></i><input type="text" placeholder="Please enter twitter url here" class="form-control" name="social_link2" value="<?php if(isset($results['social_link2'])) {echo $results['social_link2'];} ?>">
								</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Social Link3 <span class="text-danger"></span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <i class="fa fa-google-plus-square" aria-hidden="true"></i><input type="text" placeholder="Please enter google plus url here" class="form-control" name="social_link3" value="<?php if(isset($results['social_link3'])) {echo $results['social_link3'];} ?>">
								</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="logo">Social Link4 <span class="text-danger"></span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <i class="fa fa-dribbble"></i><input type="text" placeholder="Please enter dripple  url here" class="form-control" name="social_link4" value="<?php if(isset($results['social_link4'])) {echo $results['social_link4'];} ?>">
								</div>
                            </div>
                        </div>
                        
                        <div class="form-group">                           
						<label class="col-md-3 control-label" for="slider_active">Content<span class="text-danger"></span></label> 
						<div class="col-md-6">
						
						<textarea name="content" id="ckeditor"><?php if(isset($results['content'])) {echo $results['content'];} ?></textarea>		
						</div>                        
						</div>
                        <div class="form-group">                           
						<label class="col-md-3 control-label" for="slider_active">Content(Arabic)<span class="text-danger"></span></label> 
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
							<input type="text" class="form-control" name="name_service" value="<?php if(isset($results['s_name'])) {echo $results['s_name'];} ?>">									
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">Mobile<span class="text-danger"></span></label>
                            <div class="col-md-6">															
							<input type="text" class="form-control" name="mobile_service" value="<?php if(isset($results['s_mob'])) {echo $results['s_mob'];} ?>">									
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">Email<span class="text-danger"></span></label>
                            <div class="col-md-6">															
							<input type="text" class="form-control" name="email_service"  value="<?php if(isset($results['s_email'])) {echo $results['s_email'];} ?>">									
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">Address<span class="text-danger"></span></label>
                            <div class="col-md-6">															
							<input type="text" class="form-control" name="line1_service"  value="<?php if(isset($results['s_address1'])) {echo $results['s_address1'];} ?>">									
                            </div>
                            
                        </div>
						<div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active"><span class="text-danger"></span></label>
                            <div class="col-md-6">															
							<input type="text" class="form-control" name="line2_service" value="<?php if(isset($results['s_address2'])) {echo $results['s_address2'];} ?>">									
                            </div>
                            
                            
                        </div>
						<div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">Working Hours<span class="text-danger"></span></label>
                            <div class="col-md-6">															
							<input type="text" class="form-control" name="line3_service" value="<?php if(isset($results['s_address3'])) {echo $results['s_address3'];} ?>">									
                            </div>
                            
                        </div>
						<div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">Google Map Iframe<span class="text-danger"></span></label>
                            <div class="col-md-6">															
							<input type="text" class="form-control" name="iframe_service" value='<?php if(isset($results["sr_map"])) {echo $results["sr_map"];} ?>'>									
                            </div>
                        </div>
                        <div class="form-group">
                            <h4><strong>Showroom</strong></h4>
                        </div>
						
							
						
						
						<div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">Name<span class="text-danger"></span></label>
                            <div class="col-md-6">															
							<input type="text" class="form-control" name="name_showroom" value="<?php if(isset($results['sr_name'])) {echo $results['sr_name'];} ?>" >									
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">Mobile<span class="text-danger"></span></label>
                            <div class="col-md-6">															
							<input type="text" class="form-control" name="mobile_showroom" value="<?php if(isset($results['sr_mob'])) {echo $results['sr_mob'];} ?>">									
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">Email<span class="text-danger"></span></label>
                            <div class="col-md-6">															
							<input type="text" class="form-control" name="email_showroom" value="<?php if(isset($results['sr_email'])) {echo $results['sr_email'];} ?>">									
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">Address<span class="text-danger"></span></label>
                            <div class="col-md-6">															
							<input type="text" class="form-control" name="line1_showroom" value="<?php if(isset($results['sr_address1'])) {echo $results['sr_address1'];} ?>">									
                            </div>
                            
                        </div>
						<div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active"><span class="text-danger"></span></label>
                            <div class="col-md-6">															
							<input type="text" class="form-control" name="line2_showroom" value="<?php if(isset($results['sr_address2'])) {echo $results['sr_address2'];} ?>">									
                            </div>
                            
                            
                        </div>
						<div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">Working Hours<span class="text-danger"></span></label>
                            <div class="col-md-6">															
							<input type="text" class="form-control" name="line3_showroom" value="<?php if(isset($results['sr_address3'])) {echo $results['sr_address3'];} ?>">									
                            </div>
                            
                        </div>
						<div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">Google Map Iframe<span class="text-danger"></span></label>
                            <div class="col-md-6">															
							<input type="text" class="form-control" name="iframe_showroom" value='<?php if(isset($results["sr_map"])) {echo $results["sr_map"];} ?>'>									
                            </div>
                        </div>
						   <div class="form-group">
                            <label class="col-md-3 control-label" for="slider_active">Show on Homepage<span class="text-danger"></span></label>
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
                        </div>
                      </fieldset>
               
                   
                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Submit</button>
                           
                        </div>
                    </div>
					<div class="form-group">
					<?php if($results['provider_image'] !='') {?>
							<img src="../<?php echo $results['thumb'];?> ">
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