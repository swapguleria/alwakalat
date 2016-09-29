<?php include 'inc/index_header.php';
/*****************Give the page title*********************/
$title =  $_SERVER['SCRIPT_NAME'];
$title1 = explode('.php',$title);
$title2 = explode('/',$title1[0]);
$title =  end($title2);
$title =   str_replace( '_', ' ', $title);
?>
<div class="title" style="display:none"><?php echo ucwords($title);?></div>

<div class="content about">
  <div class="container">
    <div class="row">
	  <div class="col-md-12 col-sm-12 col-xs-12">
	    <h1>Change Password</h1>
		 <div class="col-md-6 col-sm-6 col-xs-12 col-sm-push-3">
		 <?php if(isset($_SESSION['error']))
			{
				echo "<span style='color:red'>".$_SESSION['error']."</span>";
				unset($_SESSION['error']);			
			}?>
		<form action="process.php" method="post" id="change_password_form" autocomplete="off">
		  <input type="hidden" name="action" value="Change_password" class="inputbox" />
		  <div class="login">
		    <div class="login_inner">
			  <div class="field2">
				<input type="password" name="old_pass" class="inputbox passinput" placeholder="Old Password"/>
			  </div>
			  <div class="field2">
				<input type="password" name="new_pass" class="inputbox passinput" id="password" placeholder="New Password"/>
			  </div>
			  <div class="field2">
				<input type="password" name="retype_pass" class="inputbox passinput" placeholder="Retype Password" />
			  </div>
			  <div class="field2">
				<div class="login_btn">
				  <input type="submit" value="Submit" class="btn btn-sm btn-default form_btn login_button" />
				</div>
			  </div>
			</div>
		  </div>
		</form>
		<div class="blank"></div>
		</div>
		
	  </div>
	</div>
  </div>
</div>
 
 
 <script src="js/jquery.validate.js"></script>
 
 <?php include 'inc/footer.php'; ?>