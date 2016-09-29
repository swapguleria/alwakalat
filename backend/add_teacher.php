<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>
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
                    <h2><strong>Add Teacher Page</strong></h2>
                </div>
                <!-- END Form Validation Example Title -->

                <!-- Form Validation Example Content -->
                <form action="process.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered">
				<input type="hidden" name="action" value="Insert_teacher">
                    <fieldset>
					<?php if(isset($_SESSION['success'])) { ?>
						<div style="color: red;
    font-size: 15px;
    padding: 5px;"><?php echo $_SESSION['success']; unset($_SESSION['success']);?></div>
					<?php } ?>
                        <legend><i class="fa fa-angle-right"></i> Teacher Info</legend>
						
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="events_name">Name <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="teacher_name" name="teacher_name" class="form-control" placeholder="Teacher Name..">
                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                </div>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-md-3 control-label" for="events_name">Text with name(optional) </label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="teacher_option" name="teacher_option" class="form-control" >
                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                </div>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-md-3 control-label" for="events_name">Text Below Name </label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="teacher_below_text" name="teacher_below_text" class="form-control" >
                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                </div>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-md-3 control-label" for="events_name">Email <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="teacher_email" name="teacher_email" class="form-control" placeholder="Teacher email..">
                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                            <label class="col-md-3 control-label" for="teacher_page">Teacher shown under Faculty page <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select id="teacher_page" name="teacher_page[]" class="form-control" multiple >
										<option value="Voice">Private Voice</option>
										<option value="musical">Musical Theatre</option>
										<option value="Dance">Dance</option>
										<option value="Acting">Acting</option>
										<option value="Piano">Piano</option>                                 
									</select>
                                   (Multiple Select)
                                </div>
                            </div>
                        </div>
						
                      <div class="form-group">
                            <label class="col-md-3 control-label" for="teacher_summary">Summary<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                      <textarea id="teacher_summary" name="teacher_summary" rows="9" class="form-control" placeholder="Summary"></textarea>
                                </div>
                            </div>
                        </div>
                       <div class="form-group">
                            <label class="col-md-3 control-label" for="teacher_professional">Professional <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <select id="teacher_professional" name="teacher_professional[]" class="form-control" multiple >
										<?php /* <option value="Voice">Voice</option>
										<option value="musical">Musical Theatre</option>
										<option value="Dance">Dance</option>
										<option value="Acting">Acting</option>
										<option value="Piano">Piano</option> */  ?><option value="">Select Type</option>									<?php $genre	=	$obj->get_all_data_active('type','type_name','asc','type_active','yes');																		if(is_array($genre)){										foreach($genre as $value)										{																				?>										<option value="<?php echo $value['type_id']; ?>"><?php echo $value['type_name']; ?></option>										<?php										}									}									?>                                 
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
                            <label class="col-md-3 control-label" for="events_name">Price <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="teacher_price" name="teacher_price" class="form-control" placeholder="Teacher Price..">
                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                </div>
                            </div>
                        </div>
                       
                      <div class="form-group">
                            <label class="col-md-3 control-label" for="	teacher_active">Active<span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <select id="active" name="teacher_active" class="form-control">
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