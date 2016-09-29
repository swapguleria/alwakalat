
				 <h1><?php if(isset($_SESSION['faculty'])){echo $pages_content['pages_name'].' faculty'; } else { echo $pages_content['pages_name']; }?></h1>
				 
				 <?php 
				 if(isset($_SESSION['faculty'])){
				 
					$teachers	=	$obj->get_all_data_active_faculty('teacher','teacher_id','asc','teacher_active','yes',$_SESSION['faculty']);
				 }
				 else
				 {
					$teachers	=	$obj->get_all_data_active('teacher','teacher_id','asc','teacher_active','yes'); 
				}
				if(isset($_GET['id'])){ 
					$value	=	$obj->get_single_result('teacher','teacher_id',$_GET['id']);
					if(is_array($value)){
				?>
				<div class="row">
					 <div class="col-md-12 col-sm-12 col-xs-12">                      
					  <div class="row">
					   <?php if($value['teacher_image']!='') { ?>
					    <div class="col-md-3 col-sm-3 col-xs-12">
						  <div class="faculty">
						  <img src="<?php echo $value['teacher_thumb_path'];?>" align="left" />
						  </div>
						  </div>
						 
						<?php } ?>
						<div class="col-md-9 col-sm-9 col-xs-12">
						<p class="teacher_name">							<span><strong><?php echo $value['teacher_name']; if ($value['teacher_option'] != "") { echo ', '.$value['teacher_option'];} ?></strong><br /></p>
						<p class="teacher_page"><?php echo $value['teacher_below_text']; ?></p>
						
						<P><a class="teacher_email email_teach" href="mailto:<?php echo $value['teacher_email']?>"><?php echo $value['teacher_email']?></a></P>
						<br />
						  <p class="teacher_page"><em><?php echo $value['teacher_summary']; ?></em></p>
						</div>
						 </div>
					  </div>
</div>					  
				
				
				
				
				<?php }else { echo "<h2>No Teacher Here</h2>";  }
				}
				else {
				 if(is_array($teachers))
				 {
				 $i =0;
					?>
					<div class="row">
					<?php
				 foreach($teachers as $value)
				 {
				 $i++;
				 ?>
				    
					
				    <div class="col-md-6 col-sm-6 col-xs-12">                      
					  <div class="row">
					   <?php if($value['teacher_image']!='') { ?>
					    <div class="col-md-5 col-sm-5 col-xs-12">
						  <div class="faculty">
						  <a href="faculty/<?php echo $value['teacher_id'];?>"><img src="<?php echo $value['teacher_thumb_path'];?>" align="left" /></a>
						  </div>
						  </div>
						 
						<?php } ?>
						<div class="col-md-7 col-sm-7 col-xs-12">
						<p class="center">							<span><strong><a href="faculty/<?php echo $value['teacher_id'];?>" class="colorg"><?php echo $value['teacher_name']; if ($value['teacher_option'] != "") { echo ', '.$value['teacher_option'];} ?></a></strong><br />	
						<?php  
						echo $value['teacher_below_text']; ?></p><br />
						  <p><em><?php if (strlen($value['teacher_summary']) > 50) {

								// truncate string
								$stringCut = substr($value['teacher_summary'], 0, 230);

								// make sure it ends in a word so assassinate doesn't become ass...
								echo $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a class="read_more" href="faculty/'.$value['teacher_id'].'">Read More</a>'; 
								}
								else {
								 echo $value['teacher_summary']; } ?></em></p>
						</div>
						 </div>
					  </div>                       
					<?php 
                  if($i%2==0)
				 {
				  ?>
				 </div>
				 <div class="blank1"></div>
				  <div class="row">
				 <?php }
				 ?>
				  <?php }} }?>
				  </div>
				  </div>
				  </div>
			
<div class="blank"></div>