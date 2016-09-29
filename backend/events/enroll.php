<?php include 'inc/index_header.php';?>
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
	    <h1>Enroll Classes or Camps</h1>
		   
		   
		   
		<div class="blank"></div>
	  </div>
	</div>
  </div>
</div>
 
 
 
 
 <?php include 'inc/footer.php'; ?>