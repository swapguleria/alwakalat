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
                Crafted with <i class="fa fa-heart text-danger"></i> by <a href="http://goo.gl/vNS3I" target="_blank">pixelcave</a>
            </div>
            <div class="pull-left">
                <span id="year-copy"></span> &copy; <a href="http://goo.gl/TDOSuC" target="_blank"><?php echo $template['name'] . ' ' . $template['version']; ?></a>
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
		<?php	 

    	
            $query = "SELECT * FROM admin WHERE id='$id'";
			$results = mysql_query($query);
			if(mysql_num_rows($results) > 0)
			{
			   $result_display = mysql_fetch_assoc($results);
			
			}
			   
			 

 
 ?>
			
			
                <form action="" method="post" id="update_profileform" enctype="multipart/form-data" class="form-horizontal form-bordered">
                    <fieldset>
                        <legend>Vital Info</legend>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Username</label>
                            <div class="col-md-8">
                                <p class="form-control-static"><?= $result_display->name?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="user-settings-email">Email</label>
                            <div class="col-md-8">
                                <input type="email" id="user-settings-email" name="user-settings-email" class="form-control" value="<?= $result_display->name?>">
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
                                <input type="password" id="user-settings-password" name="user-settings-password" class="form-control" placeholder="Please enter password here">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="user-settings-repassword">Confirm New Password</label>
                            <div class="col-md-8">
                                <input type="password" id="user-settings-repassword" name="user-settings-repassword" class="form-control" placeholder="Please enter ">
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
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
<script type="text/javascript">
$(document).ready(function()
{
$("#update_profile").click(function (e) {
 e.preventDefault();
            
    var dataString = $("#update_profileform").serialize();
          
            jQuery.ajax({
            type: "POST", // HTTP method POST or GET
            url: "update_profile.php", //Where to make Ajax calls
            dataType:"text", // Data type, HTML, json etc.
            data:dataString, //Form variables
            success:function(response){
			
			alert(response);
                

            },
            error:function (xhr, ajaxOptions, thrownError){
                $("#FormSubmit").show(); //show submit button
                $("#LoadingImage").hide(); //hide loading image
                alert(thrownError);
            }
            });
    });
});

</script>




<!-- END User Settings -->
