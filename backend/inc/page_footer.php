<?php
/**
 * page_footer.php
 *
 * Author: pixelcave
 *
 * The footer of each page
 *
 */
 
 
 
?>
        <!-- Footer -->
        <footer class="clearfix">
            <div class="pull-right">
                Crafted with <i class="fa fa-heart text-danger"></i> by <a href="http://swapdevelopment.com/"target="_blank">Swap Developers</a>
            </div>
            <div class="pull-left">
                <?php echo date("Y");  echo "-";
                 echo date("Y")+1 ;?> &copy; <a href="http://swapdevelopment.com/" target="_blank"><?php echo $template['name'] . ' ' . $template['version']; ?></a>
            </div>
        </footer>
        <!-- END Footer -->
    </div>
    <!-- END Main Container -->
</div>
<!-- END Page Container -->

<!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
<a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>

<!-- User Settings, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->
<div id="modal-user-settings" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center">
                <h2 class="modal-title"><i class="fa fa-pencil"></i> Settings</h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
		
			
			
                <form action="" method="post" id="update_profileform" enctype="multipart/form-data" class="form-horizontal form-bordered">
                   
                 
				   <fieldset>
				     <?php	 

    	
            $query = "SELECT * FROM admin WHERE id='".$_SESSION['admin']['id']."'";
			$results = mysql_query($query);
			if(mysql_num_rows($results) > 0)
			{
			   $result_display = mysql_fetch_array($results);
			
			}
			   
		  $result_display['name'];
			
			
 
             ?>
                        <legend>Vital Info</legend>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Username</label>
                            <div class="col-md-8">
                                <p class="form-control-static"><?php echo $result_display['name']?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="user-settings-email">Email</label>
                            <div class="col-md-8">
                                <input type="email" id="user-settings-email" name="user-settings-email" class="form-control" value="<?php echo $result_display['email']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="user-settings-notifications">Email Notifications</label>
                            <div class="col-md-8">
                                <label class="switch switch-primary">
                                    <input type="checkbox" id="user-settings-notifications" name="user-settings-notifications" value="1" checked>
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Password Update</legend>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="user-settings-password">New Password</label>
                            <div class="col-md-8">
                                <input type="password" id="user-settings-password" required="required" name="user-settings-password" class="form-control" placeholder="Please enter password here">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="user-settings-repassword">Confirm New Password</label>
                            <div class="col-md-8">
                                <input type="password" id="user-settings-repassword" required="required" name="user-settings-repassword" class="form-control" placeholder="Please enter ">
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
						    <input type="hidden" name="user_id" value="<?php echo $result_display['id']?>"/>
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" name="update_profile" id="update_profile" class="btn btn-sm btn-primary">Save Changes</button>
                        </div>
                    </div>
					
                </form>
            </div>
            <!-- END Modal Body -->
        </div>
    </div>
</div>




<!-- END User Settings -->
