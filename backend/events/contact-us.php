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
	  <div class="col-md-8 col-sm-8 col-xs-12">
	    <h1 style="border-bottom:none;"><iframe style="font-size: 10px; border: 0px; max-width: 700px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3225.8992357321677!2d-95.81435!3d36.047165!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87b68c08823763cf%3A0xe1845d28339bc47e!2sTheatre+Arts+Inc!5e0!3m2!1sen!2sin!4v1424168517724" frameborder="0" width="100%" height="257"></iframe></h1>
		
		<h1 style="font-size:30px;">Contact Our Faculty</h1>
		  <ul class="contact_faculty">
			<?php $teachers	=	$obj->get_all_data_active('teacher','teacher_id','asc','teacher_active','yes');
			if(is_array($teachers))
			{ $i=0;
				foreach($teachers as $value)
				{ if($i==2){
			?>
				<li><a href="mailto:theatreartstulsa1@gmail.com">Janet Wallace, Office Manager</a></li>
			<?php $i++; } else { ?>
					<li><a href="mailto:<?php echo $value['teacher_email']?>"><?php echo $value['teacher_name']; ?></a></li>	
			<?php $i++; }
				}
			}?>
			</ul>
	  </div>
	  
	  <div class="col-md-4 col-sm-4 col-xs-12">
	    <h1>CONTACT US</h1>
	    <p class="colorb"><span style="font-size: medium;"><strong>2034 W. Houston St.</strong></span></p>
        <p class="colorb"><span style="font-size: medium;"><strong>Broken Arrow, Oklahoma 74012</strong></span></p>
        <p class="colorb"><span style="font-size: medium;"><strong>T: &nbsp;</strong>918.258.2543 </span><br /><span style="font-size: medium;"><strong> F: &nbsp;</strong>918.258.9580 </span><br /><span style="font-size: medium;"> <a class="email" href="mailto:info@theatreartstulsa.com">info@theatreartstulsa.com</a></span></p>
		
		<?php 
	if(isset($_SESSION['feedback']))
	{
		echo "<h3 class='feedback'>".$_SESSION['feedback']."</h3>";
		unset($_SESSION['feedback']);
	}

 ?>
<form action="process.php" method="post" id="feedback_form">
<div class="field"><input class="inputbox" type="hidden" name="action" value="Contact" /></div>
<div class="field"><input class="inputbox" type="text" name="name" placeholder="Name" /></div>
<div class="field"><input class="inputbox" type="text" name="phone" placeholder="Phone" /></div>
<div class="field"><input class="inputbox" type="text" name="email" placeholder="Email" /></div>
<div class="field" style="padding-bottom:0px;"><textarea class="inputbox" rows="12" cols="5" placeholder="Message" name="message"></textarea></div>
<input class="btn btn-default btn-sm morebtn pull-right" type="submit" name="submit" value="Send Message" /><input class="btn btn-default btn-sm morebtn pull-right clear_btn" type="reset" name="reset" value="Clear" />
</form>
	  </div>
	</div>

	<div class="blank"></div>

	</div>

  </div>

</div>

 <div class="blank"></div>


 

 

 <?php include 'inc/footer.php'; ?>