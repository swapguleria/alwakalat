<?php include 'inc/index_header.php';/*****************Give the page title*********************/
$title =  $_SERVER['SCRIPT_NAME'];
$title1 = explode('.php',$title);
$title2 = explode('/',$title1[0]);
$title =  end($title2);

?>
<div class="title" style="display:none"><?php echo ucwords($title);?></div>
<?php if(!isset($_SESSION['login']))
			{
				$obj->locate('login');			
			}
			$results	=	$obj->get_all_data_user('register','register_id',$_SESSION['login']);
			?>
<div class="content about">
  <div class="container">
    <div class="row">
	  <div class="col-md-12 col-sm-12 col-xs-12">
	    <h1>News</h1>
			<p>Welcome !  Here you can register, view your account, view and edit your information, and send messages to us regarding your account. </p>
			<p>When registering for all classes, classes that are already full will NOT display.  If you are intent on registering for a class that is full, or would like to be added to the waiting list for a class, please contact us.</p>
		<div class="blank"></div>
	  </div>
	</div>
  </div>
</div>
 
 
 
 
 <?php include 'inc/footer.php'; ?>