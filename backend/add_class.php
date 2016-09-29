<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">


<!-- Page content -->
<div id="page-content">
    <!-- Validation Header -->
    
    <ul class="breadcrumb breadcrumb-top">
        <li>Class</li>
        
    </ul>
    <!-- END Validation Header -->

    <div class="row">
        <div class="col-md-9">
            <!-- Form Validation Example Block -->
            <div class="block">
                <!-- Form Validation Example Title -->
                <div class="block-title">
                    <h2><strong>Add Class Page</strong></h2>
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
				<input type="hidden" name="action" value="Insert_class">
                    <fieldset>
                        <legend><i class="fa fa-angle-right"></i> Class Info</legend>
						<div class="form-group">
                            <label class="col-md-3 control-label" for="class_name">Class Name <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="class_name" name="class_name" class="form-control" placeholder="Class Name..">
                                    <span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
                                </div>
                            </div>
                        </div>
                      <div class="form-group">
                            <label class="col-md-3 control-label" for="class_summary">Summary<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                      <textarea id="class_summary" name="class_summary" rows="9" class="form-control" placeholder="Summary"></textarea>
                                </div>
                            </div>
                        </div>	
						<div class="form-group">  
							<label class="col-md-3 control-label" for="class_type">Class Type<span class="text-danger">*</span></label> 
							<div class="col-md-6">  
								<select id="active" name="class_type" class="form-control">									
									<option value="">Select Type</option>									<?php $genre	=	$obj->get_all_data_active('type','type_name','asc','type_active','yes');																		if(is_array($genre)){										foreach($genre as $value)										{																				?>										<option value="<?php echo $value['type_id']; ?>"><?php echo $value['type_name']; ?></option>										<?php										}									}									?>
								</select>  
								
							</div>  
						</div>
						<div class="form-group">                            <label class="col-md-3 control-label" for="class_genre">Genre<span class="text-danger">*</span></label>                            <div class="col-md-6">                                <select id="active" name="class_genre" class="form-control">                                    <option value="">Select Genre</option>									<?php $genre	=	$obj->get_all_data_active('genre','genre_name','asc','genre_active','yes');																		if(is_array($genre)){										foreach($genre as $value)										{																				?>										<option value="<?php echo $value['genre_id']; ?>"><?php echo $value['genre_name']; ?></option>										<?php										}									}									?>                                </select>                            </div>                        </div>
						
						<div class="form-group">                            <label class="col-md-3 control-label" for="genre_teacher">Instructor<span class="text-danger">*</span></label>                            <div class="col-md-6">                                <select id="active" name="genre_teacher" class="form-control">                                    <option value="">Select Instructor</option>									<?php $location	=	$obj->get_all_data_active('teacher','teacher_name','asc','teacher_active','yes');									if(is_array($location)){										foreach($location as $value)										{										?>										<option value="<?php echo $value['teacher_id']; ?>"><?php echo $value['teacher_name']; ?></option>										<?php										}									}									?>                                </select>                            </div>                        </div>
						<div class="form-group">                            <label class="col-md-3 control-label" for="class_instructor_approval">Instructor Approval<span class="text-danger">*</span></label>                            <div class="col-md-6">                                <select id="active" name="class_instructor_approval" class="form-control">
							<option value="yes">Yes</option>
                            <option value="no">No</option>
						</select>                         
						</div>                   
						</div>
						<div class="form-group">                            <label class="col-md-3 control-label" for="genre_session">Session<span class="text-danger">*</span></label>                            <div class="col-md-6">                                <select id="active" name="genre_session" class="form-control">                                    <option value="">Select Session</option>									<?php $location	=	$obj->get_all_data_active('session','session_name','asc','session_active','yes');									if(is_array($location)){										foreach($location as $value)										{										?>										<option value="<?php echo $value['session_id']; ?>"><?php echo $value['session_name']; ?></option>										<?php										}									}									?>                                </select>                            </div>                        </div>												<div class="form-group">                            <label class="col-md-3 control-label" for="genre_gender">Gender<span class="text-danger">*</span></label>                            <div class="col-md-6">                                <select id="active" name="genre_gender" class="form-control">                                    <option value="Both">Both</option>									<option value="Male">Male</option>									<option value="Female">Female</option>					                                </select>                            </div>                        </div>																		
												<div class="form-group">                            <label class="col-md-3 control-label" for="class_agefrom">Class Age From <span class="text-danger">*</span></label>                            <div class="col-md-6">                                <div class="input-group">                                    <input type="text" id="class_agefrom" name="class_agefrom" class="form-control" placeholder="">                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>                                </div>                            </div>                        </div>
												<div class="form-group">                            <label class="col-md-3 control-label" for="class_ageto">Class Age To <span class="text-danger">*</span></label>                            <div class="col-md-6">                                <div class="input-group">                                    <input type="text" id="class_ageto" name="class_ageto" class="form-control" placeholder="">                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>                                </div>                            </div>                        </div>
                        						<div class="form-group">                            <label class="col-md-3 control-label" for="class_open">Class Seats <span class="text-danger">*</span></label>                            <div class="col-md-6">                                <div class="input-group">                                    <input type="text" id="class_open" name="class_open" class="form-control" placeholder="">                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>                                </div>                            </div>                        </div>
                        						<div class="form-group">                            <label class="col-md-3 control-label" for="class_program">Studio<span class="text-danger">*</span></label>                            <div class="col-md-6">                                <select id="active" name="class_program" class="form-control">                                    <option value="">Select Studio</option>									<?php $location	=	$obj->get_all_data_active('program','program_name','asc','program_active','yes');									if(is_array($location)){										foreach($location as $value)										{										?>										<option value="<?php echo $value['program_id']; ?>"><?php echo $value['program_name']; ?></option>										<?php										}									}									?>                                </select>                       
												</div>             
												</div>																		
                      <?php /* <div class="form-group">
                            <label class="col-md-3 control-label" for="class_start_date">Class Start Date <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="class_start_date" name="class_start_date" class="form-control events_start_date" placeholder="">
                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                </div>
                            </div>
                        </div>												
						<div class="form-group">                            <label class="col-md-3 control-label" for="class_end_date">Class End Date <span class="text-danger">*</span></label>                            <div class="col-md-6">                                <div class="input-group">                                    <input type="text" id="class_end_date" name="class_end_date" class="form-control events_end_date" placeholder="">                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>                                </div>                            </div>                        </div>	*/ 	?>	
						<div class="form-group">                            <label class="col-md-3 control-label" for="class_days">Days<span class="text-danger">*</span></label>                            <div class="col-md-6">                               
						<select id="active" name="class_days" class="form-control">                                    <option value="">Select Day</option>
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
                            <label class="col-md-3 control-label" for="class_start_time">Class Start Time<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="class_start_time" name="class_start_time" class="form-control class_time" placeholder="Time..">
                                   <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                </div>
                            </div>
                        </div>
                       <div class="form-group">
                            <label class="col-md-3 control-label" for="class_end_time">Class End Time<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="class_end_time" name="class_end_time" class="form-control class_time" placeholder="Time..">
                                   <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                </div>
                            </div>
                        </div>
                      <div class="form-group"> 
						  <label class="col-md-3 control-label" for="class_extrafee">Extra Class Fee Charges <span class="text-danger">*</span></label>
						  <div class="col-md-6">  
							  <div class="input-group">
								  <input type="text" id="class_extrafee" name="class_extrafee" class="form-control" placeholder="">
								  Leave empty if no extra charges					  
							  </div>       
						  </div>         
					  </div> 
                      <div class="form-group">
                            <label class="col-md-3 control-label" for="class_active">class_active<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <select id="active" name="class_active" class="form-control">
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