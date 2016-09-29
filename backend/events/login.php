<?php include 'inc/index_header.php';
/*****************Give the page title*********************/
$title =  $_SERVER['SCRIPT_NAME'];
$title1 = explode('.php',$title);
$title2 = explode('/',$title1[0]);
$title =  end($title2);

?>
<div class="title" style="display:none"><?php echo ucwords($title);?></div>
<?php if(isset($_SESSION['login']))
			{
				$obj->locate('myaccount');			
			}?>
<div class="content about">
  <div class="container">
    <div class="row">
	  <div class="col-md-6 col-sm-6 col-xs-12 col-sm-push-3">
	  <?php if(isset($_SESSION['error']))
			{
				echo "<span style='color:red'>".$_SESSION['error']."</span>";
				unset($_SESSION['error']);			
			}?>
	    <form action="process.php" method="post" id="login_form">
		  <input type="hidden" name="action" value="Login" class="inputbox" />
		  <div class="login">
		    <div class="login_inner">
		      <h5 class="text-center">To access your secure account, please enter the user name we have sent you in you email along with your password. It should be in your email.</h5>
			  <div class="field2">
				<input type="text" name="username" class="inputbox userinput"/>
			  </div>
			  <div class="field2">
				<input type="password" name="password" class="inputbox passinput" />
			  </div>
			  <div class="field2">
				<div class="login_btn">
				  <input type="submit" value="Login" class="btn btn-sm btn-default form_btn login_button" />
				</div>
			  </div>
			  <div class="field2">
			    <p class="text-center"><a href="#">Forgot your password or need to get started?</a></p>
			  </div>
			</div>
		  </div>
		</form>
		<div class="blank"></div>
	  </div>
	</div>
  </div>
</div>
<script src="js/jquery.validate.js"></script>
<?php include 'inc/footer.php'; ?>