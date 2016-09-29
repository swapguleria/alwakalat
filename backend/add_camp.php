	<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">


<!-- Page content -->
<div id="page-content">
    <!-- Validation Header -->
    
    <ul class="breadcrumb breadcrumb-top">
        <li>Camp</li>
        
    </ul>
    <!-- END Validation Header -->

    <div class="row">
        <div class="col-md-9">
            <!-- Form Validation Example Block -->
            <div class="block">
                <!-- Form Validation Example Title -->
                <div class="block-title">
                    <h2><strong>Add Camp Page</strong></h2>
					<?php 
					if(isset($_SESSION['success'])){
						echo "<b style='color:red'>".$_SESSION['success']."</b>";
						unset($_SESSION['success']);
					}
				?>
                </div>
                <!-- END Form Validation Example Title -->

                <!-- Form Validation Example Content -->
                <form action="process.php" method="post" class="form-horizontal form-bordered">
				<input type="hidden" name="action" value="Insert_camp">
                    <fieldset>
                        <legend><i class="fa fa-angle-right"></i> Camp Info</legend>
						<div class="form-group">
                            <label class="col-md-3 control-label" for="camp_name">Camp Name <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="camp_name" name="camp_name" class="form-control" placeholder="camp name..">
                                    <span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
                                </div>
                            </div>
                        </div>
                      <div class="form-group">
                            <label class="col-md-3 control-label" for="camp_summary">Summary<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                      <textarea id="camp_summary" name="camp_summary" rows="9" class="form-control" placeholder="Summary"></textarea>
                                </div>
                            </div>
                        </div>	
								  
												
						<div class="form-group">                            <label class="col-md-3 control-label" for="camp_agefrom">Camp Seats <span class="text-danger">*</span></label>                            <div class="col-md-6">                                <div class="input-group">                                    <input type="text" id="camp_seat" name="camp_seat" class="form-control" placeholder="">                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>                                </div>                            </div>                        </div>
						<div class="form-group">                            <label class="col-md-3 control-label" for="camp_agefrom">Camp Age From <span class="text-danger">*</span></label>                            <div class="col-md-6">                                <div class="input-group">                                    <input type="text" id="camp_agefrom" name="camp_agefrom" class="form-control" placeholder="">                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>                                </div>                            </div>                        </div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="	camp_ageto">Camp Age To <span class="text-danger">*</span></label>                            <div class="col-md-6">                                <div class="input-group">                                    <input type="text" id="camp_ageto" name="camp_ageto" class="form-control" placeholder="">                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>                                </div>                            </div>                        </div>
						
																							
                       <div class="form-group">
                            <label class="col-md-3 control-label" for="camp_start_date">Camp Start Date <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="camp_start_date" name="camp_start_date" class="form-control events_start_date" placeholder="">
                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                </div>
                            </div>
                        </div>												
						<div class="form-group">                            <label class="col-md-3 control-label" for="camp_end_date">Camp End Date <span class="text-danger">*</span></label>                            <div class="col-md-6">                                <div class="input-group">                                    <input type="text" id="camp_end_date" name="camp_end_date" class="form-control events_end_date" placeholder="">                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>                                </div>                            </div>                        </div>			
						<div class="form-group">                            <label class="col-md-3 control-label" for="camp_days">Days<span class="text-danger">*</span></label>                            <div class="col-md-6">                               
						<select id="active" name="camp_days" class="form-control">                                    <option value="">Select Day</option>
						<?php $location	=	$obj->get_all_data_active('day','day_name','asc','day_active','yes');							
						if(is_array($location)){			
						foreach($location as $value)		
						{										?>	
						<option value="<?php echo $value['day_id']; ?>"><?php echo $value['day_name']; ?></option>							
						<?php	}				
						}	?>                               				                               
						</select>    
                        </div>                        </div>						
						 <div class="form-group">
                            <label class="col-md-3 control-label" for="camp_time">Camp Start Time<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="camp_start_time" name="camp_start_time" class="form-control class_time" placeholder="Time..">
                                   <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                </div>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-md-3 control-label" for="class_end_time">Camp End Time<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="camp_end_time" name="camp_end_time" class="form-control class_time" placeholder="Time..">
                                   <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                </div>
                            </div>
                        </div>
                      <?php /* <div class="form-group">                            <label class="col-md-3 control-label" for="class_fee">Class Fee <span class="text-danger">*</span></label>                            <div class="col-md-6">                                <div class="input-group">                                    <input type="text" id="class_fee" name="class_fee" class="form-control" placeholder="">                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>                                </div>                            </div>                        </div> */?>
                      <div class="form-group">
                            <label class="col-md-3 control-label" for="camp_active">Preschool Camp<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <select id="active" name="camp_preschool" class="form-control">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                   
                                </select>
                            </div>
                        </div>
                      <div class="form-group">
                            <label class="col-md-3 control-label" for="camp_active">camp_active<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <select id="active" name="camp_active" class="form-control">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                   
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