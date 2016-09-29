<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; 
$results	=	$obj->get_single_result('events','events_id',$_GET['id']);
?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
<!-- Page content -->
<div id="page-content">
    <!-- Validation Header -->
    
    <ul class="breadcrumb breadcrumb-top">
        <li>Events</li>
        
    </ul>
    <!-- END Validation Header -->

    <div class="row">
        <div class="col-md-9">
            <!-- Form Validation Example Block -->
            <div class="block">
                <!-- Form Validation Example Title -->
                <div class="block-title">
                    <h2><strong>Add Events Page</strong></h2>
                </div>
                <!-- END Form Validation Example Title -->

                <!-- Form Validation Example Content -->
                <form action="process.php" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
				<input type="hidden" name="action" value="Edit_events">
                <input type="hidden" name="events_id" value="<?php echo $results['events_id'];?>">
                    <fieldset>
                        <legend><i class="fa fa-angle-right"></i> Event Info</legend>
						<?php /* <div class="form-group">
                            <label class="col-md-3 control-label" for="events_category">Category<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <select id="active" name="events_category" class="form-control">
                                    <option value="">Select Category</option>
									<?php $categories	=	$obj->get_all_data_active('category','category_name','asc','category_active','yes');
									
									if(is_array($categories)){
										foreach($categories as $value)
										{
										if($value['category_id']==$results['events_category'])
										{
											$selected	=	'selected';
										}else{
											$selected	=	'';
										}
										?>
										<option <?php echo $selected; ?> value="<?php echo $value['category_id']; ?>"><?php echo $value['category_name']; ?></option>
										<?php
										}
									}
									?>
                                </select>
                            </div>
                        </div>*/ ?>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="events_location">Location<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <select id="active" name="events_location" class="form-control">
                                    <option value="">Select Location</option>
									<?php $location	=	$obj->get_all_data_active('location','location_name','asc','location_active','yes');
									if(is_array($location)){
										foreach($location as $value)
										{
										if($value['location_id']==$results['events_location'])
										{
											$selected	=	'selected';
										}else{
											$selected	=	'';
										}
										?>
										<option <?php echo $selected; ?> value="<?php echo $value['location_id']; ?>"><?php echo $value['location_name']; ?></option>
										<?php
										}
									}
									?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="events_name">Events Name <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="events_name" name="events_name" class="form-control" placeholder="Events Name.." value="<?php if(isset($results['events_name'])){echo $results['events_name'];} ?>">
                                    <span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
                                </div>
                            </div>
                        </div>
                      <div class="form-group">
                            <label class="col-md-3 control-label" for="events_summary">Summary<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                      <textarea id="events_summary" name="events_summary" rows="9" class="form-control" placeholder="Summary"><?php if(isset($results['events_summary'])){echo $results['events_summary'];} ?></textarea>
                                </div>
                            </div>
                        </div>
                       <div class="form-group">
                            <label class="col-md-3 control-label" for="events_start_date">Events Start Date <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="events_start_date" name="events_start_date" class="form-control events_start_date" placeholder="Events Start Date.." value="<?php if(isset($results['events_start_date'])){echo $obj->setdate($results['events_start_date']);} ?>">
                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                </div>
                            </div>
                        </div>
						 <div class="form-group">
                            <label class="col-md-3 control-label" for="events_end_date">Events End Date<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="events_end_date" name="events_end_date" class="form-control events_end_date" placeholder="Events End Date.." value="<?php if(isset($results['events_end_date'])){echo $obj->setdate($results['events_end_date']);} ?>">
                                   <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                </div>
                            </div>
                        </div>
                       
                      
                      <div class="form-group">
                            <label class="col-md-3 control-label" for="events_image">Image<span class="text-danger">*</span></label>
                            <div class="col-md-6">
								
                                    <input type="file" id="events_image" name="events_image"  >
                                    
                                
                            </div>
                        </div>
                      <div class="form-group">
                            <label class="col-md-3 control-label" for="location_pending">Active<span class="text-danger">*</span></label>
                            <div class="col-md-6">
							<?php if(isset($results['events_active']) && $results['events_active']=='yes'){
								$yes	= 'selected'; 
							}else{
								$yes	= ''; 
							} if(isset($results['events_active']) && $results['events_active']=='no'){
								$no	= 'selected'; 
							}else{
								$no	= ''; 
							} ?>
                                <select id="active" name="events_active" class="form-control">
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