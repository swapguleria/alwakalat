<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
<?php $res =$obj->get_single_result('camp','camp_id',$_GET['id']);?>
<!-- Page content --><div id="page-content">   
 <!-- Validation Header -->      
 <ul class="breadcrumb breadcrumb-top">    
    <li>Class</li>            
	</ul>    <!-- END Validation Header -->   
	<div class="row">       
	<div class="col-md-9">            <!-- Form Validation Example Block -->            
	<div class="block">                <!-- Form Validation Example Title -->               
	<div class="block-title">                  
	<h2><strong>Edit Camp Page</strong></h2>  
<?php 
					if(isset($_SESSION['success'])){
						echo "<b style='color:red'>".$_SESSION['success']."</b>";
						unset($_SESSION['success']);
					}
				?>	
	</div>                <!-- END Form Validation Example Title -->    
	<!-- Form Validation Example Content -->              
	<form action="process.php" method="post" class="form-horizontal form-bordered">
	<input type="hidden" name="action" value="Edit_camp">	
	<input type="hidden" id="camp_id" name="camp_id" value="<?php echo $_GET['id']; ?>">                 
	<fieldset>     
	<legend><i class="fa fa-angle-right"></i> Camp Info</legend>	
	<div class="form-group">
		<label class="col-md-3 control-label" for="camp_name">Camp Name <span class="text-danger">*</span></label>
		<div class="col-md-6">
			<div class="input-group">
				<input type="text" id="camp_name" name="camp_name" class="form-control" value="<?php echo $res['camp_name']; ?>">
				<span class="input-group-addon"><i class="fa fa-circle-o"></i></span>
			</div>
		</div>
	</div>
		 <div class="form-group">
                            <label class="col-md-3 control-label" for="camp_summary">Summary<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                      <textarea id="camp_summary" name="camp_summary" rows="9" class="form-control" ><?php echo $res['camp_summary']; ?></textarea>
                                </div>
                            </div>
                        </div>
										
						<div class="form-group">                            <label class="col-md-3 control-label" for="camp_seat">Camp Seats <span class="text-danger">*</span></label>                            <div class="col-md-6">                                <div class="input-group">                                    <input type="text" id="camp_seat" name="camp_seat" class="form-control" value="<?php echo $res['camp_seat']; ?>">                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>                                </div>                            </div>                        </div>
						<div class="form-group">                            <label class="col-md-3 control-label" for="camp_agefrom">Camp Age From <span class="text-danger">*</span></label>                            <div class="col-md-6">                                <div class="input-group">                                    <input type="text" id="camp_agefrom" name="camp_agefrom" class="form-control" value="<?php echo $res['camp_agefrom']; ?>">                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>                                </div>                            </div>                        </div>
						<div class="form-group">
							<label class="col-md-3 control-label" for="	camp_ageto">Camp Age To <span class="text-danger">*</span></label>                            <div class="col-md-6">                                <div class="input-group">                                    <input type="text" id="camp_ageto" name="camp_ageto" class="form-control" value="<?php echo $res['camp_ageto']; ?>">                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>                                </div>                            </div>                        </div>	
																							
                       <div class="form-group">
                            <label class="col-md-3 control-label" for="camp_start_date">Camp Start Date <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="camp_start_date" name="camp_start_date" class="form-control events_start_date" value="<?php echo $obj->setdate($res['camp_start_date']); ?>">
                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                </div>
                            </div>
                        </div>												
						<div class="form-group">                            <label class="col-md-3 control-label" for="camp_end_date">Camp End Date <span class="text-danger">*</span></label>                            <div class="col-md-6">                                <div class="input-group">                                    <input type="text" id="camp_end_date" name="camp_end_date" class="form-control events_end_date" value="<?php echo $obj->setdate($res['camp_end_date']); ?>">                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>                                </div>                            </div>                        </div>		
					<div class="form-group">  
					<label class="col-md-3 control-label" for="camp_days">Days<span class="text-danger">*</span></label>      
					<div class="col-md-6">                          
					<select id="active" name="camp_days" class="form-control">                                  
					<option value="">Select Day</option>								
					<?php $location	=	$obj->get_all_data_active('day','day_name','asc','day_active','yes');					
					if(is_array($location)){										foreach($location as $value)	
					{									
					?>									
					<option <?php if($res['camp_days'] == $value['day_id']){echo 'selected ';} ?> value="<?php echo $value['day_id']; ?>"><?php echo $value['day_name']; ?></option>
					<?php								
					}								
					}								
					?>                                
					</select>                     
					</div>                      
					</div>						
					<div class="form-group">
                            <label class="col-md-3 control-label" for="camp_time">Camp Strat Time<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="camp_start_time" name="camp_start_time" class="form-control class_time" value="<?php echo $res['camp_start_time']; ?>">
                                   <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                </div>
                            </div>
                    </div>                    
					<div class="form-group">
                            <label class="col-md-3 control-label" for="camp_time">Camp End Time<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="camp_end_time" name="camp_end_time" class="form-control class_time" value="<?php echo $res['camp_end_time']; ?>">
                                   <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                </div>
                            </div>
                    </div>                    
					<div class="form-group">                       					<label class="col-md-3 control-label" for="camp_preschool">Preschool Camp<span class="text-danger">*</span></label>                          					<div class="col-md-6">      					<select id="active" name="camp_preschool" class="form-control"> 					<option <?php if($res['camp_preschool'] == 'yes'){echo 'selected ';} ?> value="yes">Yes</option>                                 					<option <?php if($res['camp_preschool'] == 'no'){echo 'selected ';} ?> value="no">No</option>                                                              					</select>                         					</div>                      					</div>                                 					<div class="form-group">                       					<label class="col-md-3 control-label" for="camp_active">active<span class="text-danger">*</span></label>                          					<div class="col-md-6">      					<select id="active" name="camp_active" class="form-control"> 					<option <?php if($res['camp_active'] == 'yes'){echo 'selected ';} ?> value="yes">Yes</option>                                 					<option <?php if($res['camp_active'] == 'no'){echo 'selected ';} ?> value="no">No</option>                                                              					</select>                         					</div>                      					</div>                                 					</fieldset>                                                      <div class="form-group form-actions">                        <div class="col-md-8 col-md-offset-4">                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Submit</button>                            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>                        </div>                    </div>                </form>                <!-- END Form Validation Example Content -->                           </div>            <!-- END Validation Block -->        </div>           </div></div><!-- END Page Content --><?php include 'inc/page_footer.php'; ?><?php include 'inc/template_scripts.php'; ?><!-- Load and execute javascript code used only in this page --><?php include 'inc/template_end.php'; ?>