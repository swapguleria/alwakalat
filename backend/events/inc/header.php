<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo SITEURL;?>">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php if(isset($pages_title)){echo $pages_title;} else {echo 'Index';} ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="<?php if(isset($pages_meta_keywords)){echo $pages_meta_keywords;}?>"/>
<meta name="description" content="<?php if(isset($pages_meta_description)){echo $pages_meta_description;}?>" />
<meta name="title" content="<?php if(isset($pages_meta_title)){echo $pages_meta_title;}?>" />
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Kalam:400,300,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/slider.css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
<script>
$(document).ready(function(){

});
</script>

<script>
$(document).ready(function(){
$("#cross").click(function(){
$("#popup").hide();
$(".popup").hide();
});
$("#cross2").click(function(){
$("#popup2").hide();
$(".popup1").hide();
$('.result2').html('<span></span>');
});
});
</script>
</head>

<body>
<div class="overlay" id="popup" style="display:none;"></div>

<div id="main_container">
  <div id="topheader_container">
    <div class="container">
	  <div class="row">
	    <div class="header">		  
		  <div class="col-md-3 col-sm-4 col-xs-12 pull-right">
		    <div class="social">
			  <ul>
			  <?php $social	=	$obj->get_single_result('social','social_id','1');?>
			  <?php if($social['social_facebook']!=''){ ?>
			    <li class="facebook"><a href="<?php echo $social['social_facebook']; ?>"></a></li>
				<?php } ?>
				<?php if($social['social_twitter']!=''){ ?>
				<li class="twitter"><a href="<?php echo $social['social_twitter']; ?>"></a></li>
				<?php } ?>
				<?php if($social['social_google']!=''){ ?>
				<li class="vimo"><a href="<?php echo $social['social_google']; ?>"></a></li>
				<?php } ?>
				<?php if($social['social_vimeo']!=''){ ?>
				<li class="google"><a href="<?php echo $social['social_vimeo']; ?>"></a></li>
				<?php } ?>
				<?php if($social['social_instagram']!=''){ ?>
				<li class="instagram"><a href="<?php echo $social['social_instagram']; ?>"></a></li>
				<?php } ?>
				
			  </ul>
			</div>
		  </div>
		  
		</div>
	  </div>
	</div>
  </div>
  
  <div id="content_container">
    <div class="container">
	  <div class="row">
	    <div class="topheader">
		<div class="top_header1">
		 <div class="blank" style="height:0px;"></div>
		  <div class="col-md-4 col-sm-5 col-xs-12">
		    <div class="logo">
			<?php $logo	=	$obj->get_single_result('logo','logo_id','1');?>
			  <a href="<?php echo SITEURL; ?>"><img src="<?php echo $logo['logo_path']; ?>" class="img-responsive" /></a>  
			</div>
		  </div>
		  <div class="col-md-6 col-sm-7 col-xs-12 pull-right">
		    <div class="top_header1_right">
			<h2>Oklahoma's Premier Performing Arts School</h2>
			<p class="colorb"><!--span class="icons"><img src="images/address-icon.png" /></span><strong>Address : </strong-->(918) 258-2543 <br />2034 West Houston <br />Broken Arrow, OK 74012</p>
			<!--<p class="colorb" style="margin-bottom:0px;"><span class="icons" style="margin-top:-1px;"><img src="images/phone-icon.png" /></span><strong>Telephone : </strong></p>
			<p class="colorb" style="margin-bottom:0px;"><span class="icons" style="margin-top:-1px;"><img src="images/phone-icon.png" /></span><strong>Telephone : </strong></p>-->
			<?php if(isset($_SESSION['login'])) { ?>
			<span class="loginas">Login as : <?php echo $obj->get_single_field('register','student_parent_email','register_id',$_SESSION['login']) ?></span>
							
			
		            
						
						<div class="btn btn-sm btn-default register_btn pull-right header_btns">	
							<a href="logout">Logout</a>		
						</div>
						<div class="btn btn-sm btn-default register_btn pull-right header_btns">
							<a href="change_password">Change Password</a>	
						</div>	
													
							
					<?php }
					else { ?>
						<div class="btn btn-sm btn-default register_btn pull-right header_btns">	
							<a href="login">Login</a>		
						</div>
						<div class="btn btn-sm btn-default register_btn pull-right header_btns">		    <a href="register">Registration</a>		  </div>
					<?php } ?>	 
</div>
		  </div>					
						</div>	  
		  <div class="navi">
		  <div class="col-md-12 col-sm-12 col-xs-12">
		    <nav class="navbar navbar-default navigation" role="navigation">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle navbar_icon" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			    <span class="sr-only">Toggle navigation</span>
				<span class="icon-bar icon-bar1"></span>
				<span class="icon-bar icon-bar1"></span>
				<span class="icon-bar icon-bar1"></span>
				</button>
            </div>
            <div class="collapse navbar-collapse row" id="bs-example-navbar-collapse-1">
            					
			 <ul class="nav navbar-nav <?php if(isset($_SESSION['login'])) { echo 'login_nav'; } ?>	 ">
			  <?php  if($_SERVER['SCRIPT_NAME']=='/events/contact_us.php'){ 
			  $active1	=	'active';
			  }else{
			  $active1	=	'';
			  }?>
			 <?php/*   <li><a href="<?php echo SITEURL; ?>" class="<?php echo $active1; ?>">Home</a></li>
			    if(isset($_SESSION['login']))
			{?>	
				<li><a href="myaccount" class="<?php if($_SERVER['SCRIPT_NAME']=='/events/myaccount.php'){echo 'active';}?>">My Account</a></li>	
			<?php }  */?>				
			  <?php $pages = $obj->get_all_data_active_home('pages','pages_order','asc','pages_active','yes');
			if(is_array($pages))
			{
				foreach($pages as $value)
				{ 
					if($value['pages_slug']==$_GET['page'])
					{
						$active	=	'active';
					}else{
						$active	=	'';
					} 
					$num_sub_menu = $obj->get_sub_menu_num_rows($value['pages_slug']);
				?>
					 <li <?php if($num_sub_menu > 0){echo 'class="dropdown-toggle"'; }?>>
					 <a href="<?php echo $value['pages_slug']; ?>" class="<?php echo $active; ?>"><?php echo $value['pages_name'];?> <?php  if($num_sub_menu > 0){echo "<b class='caret'></b>"; }?></a>					 
					  <?php $sub_pages = $obj->get_all_data_active_page('pages','pages_order','asc','pages_active','yes','pages_parent',$value['pages_slug']);
						if(is_array($sub_pages))
						{ echo "<ul class='dropdown-menu'>";
							foreach($sub_pages as $value1)
							{ 
								if($value['pages_slug']==$_GET['page'])
								{
									$active	=	'active';
								}else{
									$active	=	'';
								} 
								if($value['pages_file'] == '' ) { $href = $value1['pages_file'];  }
								
							?>
								
									<li><a href="<?php if(isset($href)){echo $href;unset($href);}else {echo $value1['pages_slug'];} ?>" ><?php echo $value1['pages_name']; ?></a></li>
									
														
								 
							<?php } 
							echo "</ul>"; }
							?>	 
					 
					 </li>
					<?php 
				}
			}
			?>
           <li><a href="contact-us" class="<?php if($_SERVER['SCRIPT_NAME']=='/events/contact-us.php'){ echo 'active';}?>">Contact Us</a></li>
              
			<?php   
			if(isset($_SESSION['login'])) { ?>				
			  
			  <li><a href="myaccount" class="dropdown-toggle <?php if($_SERVER['SCRIPT_NAME']=='/events/myaccount.php'){echo 'active';}?>">My Account<b class='caret'></b></a>	
			  <ul class='dropdown-menu'>
				  <?php /* <li><a href="fee_payment" class="<?php if($_SERVER['SCRIPT_NAME']=='/events/fee_payment.php'){echo 'active';}?>">Fee-Payment</a></li> */	 ?>
				  <li><a href="mystudent" class="<?php if($_SERVER['SCRIPT_NAME']=='/events/mystudent.php'){/* echo 'active'; */}?>">My Student</a></li>	
				  <li><a href="myclasses" class="<?php if($_SERVER['SCRIPT_NAME']=='/events/myclasses.php'){/* echo 'active'; */}?>">My Classes</a></li>	
				  <li><a href="mycamps" class="<?php if($_SERVER['SCRIPT_NAME']=='/events/mycamps.php'){/* echo 'active'; */}?>">My Camps</a></li>	
				  <?php /*<li><a href="enroll" class="<?php if($_SERVER['SCRIPT_NAME']=='/events/enroll.php'){ echo 'active'; }?>">Enroll</a></li>*/?>
					<?php /*<li><a href="policies" class="<?php  if($_SERVER['SCRIPT_NAME']=='/events/policies.php'){echo 'active';}  ?>">Our Policies</a></li>    */?>        
              </ul>
			</li> 
			 <li><a href="payment" class="<?php if($_SERVER['SCRIPT_NAME']=='/events/payment.php'){echo 'active';}?>">Payment</a>	</li>

			
			<?php }  ?>
			</ul>
            </div>
          </nav>
		  </div>
		  </div>