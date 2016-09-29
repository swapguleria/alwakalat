<?php include 'inc/config.php'; error_reporting(0);?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; 
$results	=	$obj->get_single_result('pages','pages_id',$_GET['id']);
?>



<!-- Page content -->
<div id="page-content">
    <!-- Validation Header -->
    
    <ul class="breadcrumb breadcrumb-top">
        <li>Pages</li>
        
    </ul>
    <!-- END Validation Header -->

    <div class="row">
        <div class="col-md-10">
            <!-- Form Validation Example Block -->
            <div class="block">
                <!-- Form Validation Example Title -->
                <div class="block-title">
                    <h2><strong>Edit Page</strong></h2>
					<?php 
					if(isset($_SESSION['success'])){
						echo "<b style='color:red'>".$_SESSION['success']."</b>";
						unset($_SESSION['success']);
					}
				?>
                </div>
                <!-- END Form Validation Example Title -->

                <!-- Form Validation Example Content -->
                <form id="formsubmit" action="process.php" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
				<input type="hidden" name="action" value="Edit_pages">
                <input type="hidden" id="pages_id" name="pages_id" value="<?php echo $results['pages_id'];?>">
                    <fieldset>
                        <legend><i class="fa fa-angle-right"></i> Page Info</legend>
						 <div class="form-group">
                            <label class="col-md-3 control-label" for="pages_parent">Parent Page<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <select id="pages_parent" name="pages_parent" class="form-control changethis">
								<option value="">Select Parent page</option>
									 <?php $genre	=	$obj->get_data_dual_field_check('pages','pages_active','yes','pages_parent','');
									 if(is_array($genre)){	
									 foreach($genre as $value)	
									 {	 if($value['pages_slug'] != 'home') {?>			
									 <option <?php if($results['pages_parent'] == $value['pages_slug']){echo 'selected';} ?> value="<?php echo $value['pages_slug']; ?>"><?php echo $value['pages_name']; ?></option>	
									 <?php	} }
									 }	 ?>  
								</select>
                            </div>
                        </div>
						 <div class="form-group">
                            <label class="col-md-3 control-label" for="pages_name">Page Name<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group"> 
                                    <input type="text" id="pages_name" name="pages_name" class="form-control" placeholder="Page Name..." value="<?php if(isset($results['pages_name'])){echo $results['pages_name'];} ?>">
                                    <span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
									
                                </div>
								<div class="help-block animation-slideDown error_message"></div>
                            </div> 
                        </div>
						
						 <div class="form-group">
                            <label class="col-md-3 control-label" for="page_module">Module<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <select id="pages_module" name="pages_module" class="form-control changethis">
								<?php if($results['pages_module']=='Teachers')
										{
										$selected1	=	'selected';
										}else if($results['pages_module']=='Classes')
										{
										$selected2	=	'selected';
										}else if($results['pages_module']=='Content')
										{
										$selected3	=	'selected';
										}else if($results['pages_module']=='Files')
										{
										$selected4	=	'selected';
										}else{
										$selected	=	'';
										}
								?>
                                    <option value="">Select Module</option>
									<option <?php echo $selected1;?> value="Teachers">Teachers</option>
									<option <?php echo $selected2;?> value="Classes">Classes</option>
									<option <?php echo $selected3;?> value="Content">Content</option>
									<option <?php echo $selected4;?> value="Files">Files</option>
									
								</select>
                            </div>
                        </div>
                   <?php if($results['pages_module']=='Content')
						{
							$style	=	'style="display:block"';
						}else{
							$style	=	'style="display:none"';
						}
						if($results['pages_module']=='Files')
						{
							$style1	=	'style="display:block"';
						}else{
							$style1	=	'style="display:none"';
						}
				   ?>
						<div class="form-group fileadd_show" <?php echo $style1;?>>
                            <label class="col-md-3 control-label" for="pages_name">PDF FILE</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="file" id="pages_file" name="pages_file"  />                                 
                                </div>
								<div class="help-block animation-slideDown error_message"></div>
                            </div>
                        </div> 
				   
                        <div class="form-group textarea_show" <?php echo $style;?>>
                            <label class="col-md-3 control-label" for="events_name">Content <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                   <textarea class="ckeditor" id="ckeditor" name="pages_text"><?php if(isset($results['pages_text'])){echo $results['pages_text'];} ?></textarea>
                                </div>
                            </div>
                        </div>
                      <div class="form-group">
                            <label class="col-md-3 control-label" for="pages_meta_title">Meta Title<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                      <textarea id="pages_meta_title" class="form-control" name="pages_meta_title" rows="9" class="form-control" placeholder="Pages Meta Title"><?php if(isset($results['pages_meta_title'])){echo $results['pages_meta_title'];} ?></textarea>
                                </div>
                            </div>
                        </div>
                       <div class="form-group">
                            <label class="col-md-3 control-label" for="pages_meta_description">Meta Description <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <textarea id="pages_meta_description" class="form-control" name="pages_meta_description"><?php if(isset($results['pages_meta_description'])){echo $results['pages_meta_description'];} ?></textarea>
                                </div>
                            </div>
                        </div>
						 <div class="form-group">
                            <label class="col-md-3 control-label" for="pages_meta_keywords">Meta Keywords<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                   <textarea id="pages_meta_keywords" class="form-control" name="pages_meta_keywords"><?php if(isset($results['pages_meta_keywords'])){echo $results['pages_meta_keywords'];} ?></textarea>
                                 </div>
                            </div>
                        </div>
                       
                      <div class="form-group">
                            <label class="col-md-3 control-label" for="pages_order">Order<span class="text-danger">*</span></label>
                            <div class="col-md-6">
							 <div class="input-group">
                                <input type="text" id="pages_order" name="pages_order" class="form-control" placeholder="Page Order..." value="<?php if(isset($results['pages_order'])){echo $results['pages_order'];} ?>">
                                    <span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
									</div>
                            </div>
                        </div>
                     <div class="form-group">
                            <label class="col-md-3 control-label" for="pages_active">Active<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                
                                    <?php if(isset($results['pages_active']) && $results['pages_active']=='yes'){
								$yes	= 'selected'; 
							}else{
								$yes	= ''; 
							} if(isset($results['pages_active']) && $results['pages_active']=='no'){
								$no	= 'selected'; 
							}else{
								$no	= ''; 
							} ?>
                                <select id="active" name="pages_active" class="form-control">
                                   <option <?php echo $yes; ?> value="yes">Yes</option>
                                    <option <?php echo $no; ?> value="no">No</option>
                                   
                                </select>
                            </div>
                        </div>
                     
                      
                    </fieldset>
               
                   
                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="button" class="btn btn-sm btn-primary" onclick="return edit_pages();"><i class="fa fa-arrow-right"></i> Submit</button>
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