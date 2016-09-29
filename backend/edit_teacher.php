<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; 
$results	=	$obj->get_single_result('teacher','teacher_id',$_GET['id']);
?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">


<!-- Page content -->
<div id="page-content">
    <!-- Validation Header -->
    
    <ul class="breadcrumb breadcrumb-top">
        <li>Teacher</li>
        
    </ul>
    <!-- END Validation Header -->

    <div class="row">
        <div class="col-md-9">
            <!-- Form Validation Example Block -->
            <div class="block">
                <!-- Form Validation Example Title -->
                <div class="block-title">
                    <h2><strong>Edit Teacher Page</strong></h2>
                </div>
                <!-- END Form Validation Example Title -->

                <!-- Form Validation Example Content -->
                <form action="process.php" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
				<input type="hidden" name="action" value="Edit_teacher">
                <input type="hidden" name="teacher_id" value="<?php echo $results['teacher_id'];?>">
                <input type="hidden" name="teacher_image1" value="<?php echo $results['teacher_image'];?>">
                    <fieldset>
                        <legend><i class="fa fa-angle-right"></i> Teacher Info</legend>
						
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="events_name">Name <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="teacher_name" name="teacher_name" class="form-control" placeholder="Teacher Name.." value="<?php if(isset($results['teacher_name'])){echo $results['teacher_name'];} ?>">
                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                </div>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-md-3 control-label" for="events_name">Text With Name(optional) </label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="teacher_option" name="teacher_option" class="form-control" value="<?php if(isset($results['teacher_option'])){echo $results['teacher_option'];} ?>">
                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                </div>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-md-3 control-label" for="events_name">Text Below Name </label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="teacher_below_text" name="teacher_below_text" class="form-control" value="<?php if(isset($results['teacher_below_text'])){echo $results['teacher_below_text'];} ?>">
                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                </div>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-md-3 control-label" for="events_name">Email <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="teacher_email" name="teacher_email" class="form-control"  value="<?php if(isset($results['teacher_email'])){echo $results['teacher_email'];} ?>">
                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                </div>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-md-3 control-label" for="teacher_page">Teacher shown under Faculty page <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
								<?php $teacher_page = explode(',',$results['teacher_page']);?>
                                    <select id="teacher_page" name="teacher_page[]" class="form-control" multiple >
										<option <?php if (in_array("Voice", $teacher_page)) { echo 'selected'; } ?> value="Voice">Private Voice</option>
										<option <?php if (in_array("musical", $teacher_page)){ echo 'selected'; } ?> value="musical">Musical Theatre</option>
										<option <?php if (in_array("Dance", $teacher_page)){ echo 'selected'; } ?> value="Dance">Dance</option>
										<option <?php if (in_array("Acting", $teacher_page)){ echo 'selected'; } ?> value="Acting">Acting</option>
										<option <?php if (in_array("Piano", $teacher_page)){ echo 'selected'; } ?> value="Piano">Piano</option>                                 
									</select>
                                   (Multiple Select)
                                </div>
                            </div>
                        </div>
                      <div class="form-group">
                            <label class="col-md-3 control-label" for="teacher_summary">Summary<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                      <textarea id="teacher_summary" name="teacher_summary" rows="9" class="form-control" placeholder="Summary"><?php if(isset($results['teacher_summary'])){echo $results['teacher_summary'];} ?></textarea>
                                </div>
                            </div>
                        </div>
                       <div class="form-group">
                            <label class="col-md-3 control-label" for="teacher_professional">Professional <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
								<?php $teacher_professional = explode(',',$results['teacher_professional']);?>
									<select id="active" name="teacher_professional[]" class="form-control" multiple>
										<option value="">Select Type</option>
										<?php $genre	=	$obj->get_all_data_active('type','type_name','asc','type_active','yes');
										if(is_array($genre)){
										foreach($genre as $value)
										{
										$teacher_professional = explode(',',$results['teacher_professional']);$select="";
										foreach($teacher_professional as $prof)
										{ if($prof == $value['type_id'])
											{
												$select= 'selected';
											}
										}
										
										
										?>
										<option <?php echo $select;?> value="<?php echo $value['type_id']; ?>"><?php echo $value['type_name']; ?></option>
										<?php
										}	
										}
										?>    								
									</select>
									
                                   (Multiple Select)
                                </div>
                            </div>
                        </div>
						 <div class="form-group">
                            <label class="col-md-3 control-label" for="teacher_image">Image<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="file" id="teacher_image" name="teacher_image" >
                                   
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="teacher_price">Price<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                      <input type="text" id="teacher_price" name="teacher_price" class="form-control" placeholder="Teacher Price.." value="<?php if(isset($results['teacher_price'])){echo $results['teacher_price'];} ?>">
                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                </div>
                            </div>
                        </div>
                      <div class="form-group">
                            <label class="col-md-3 control-label" for="	teacher_active">Active<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <select id="active" name="teacher_active" class="form-control">
								<?php if(isset($results['teacher_active']) && $results['teacher_active']=='yes'){
								$yes	= 'selected'; 
							}else{
								$yes	= ''; 
							} if(isset($results['teacher_active']) && $results['teacher_active']=='no'){
								$no	= 'selected'; 
							}else{
								$no	= ''; 
							} ?>
                                    <option <?php echo $yes; ?> value="yes">Yes</option>
                                    <option <?php echo $no; ?> value="no">No</option>
                                   
                                </select>
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