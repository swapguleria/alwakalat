<?php
include 'inc/page_header.php'; 
?>
	<?php 
		if(isset($pages_content['pages_module']))
		{
		switch($pages_content['pages_module']){
		case 'Content':
		?>
			 <div class="content about">
				<div class="container">
				<div class="row">				<?php	/* 		 if($pages_content['pages_slug'] == 'contact'){ ?>
					<div class="col-md-8 col-sm-8 col-xs-12">
					<?php } else {  */ ?>		
						<div class="col-md-12 col-sm-12 col-xs-12"> 							<?php/*  } */ ?>
							<?php echo $pages_content['pages_text'];	?>				
						</div>
						<?php if($pages_content['pages_slug'] == 'contact'){			
								include('contact1.php');			
							}
							break;		
							?>
					</div>
				</div>
			</div>
			<div class="blank"></div>
	
	<?php
		case	'Teachers':
		?>
		 <div class="content about">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
					
			<?php if($pages_content['pages_slug']== 'dance'){$_SESSION['faculty'] = 'Dance';}
			else if($pages_content['pages_slug']== 'musical-theatre'){ $_SESSION['faculty'] = 'musical';}
			else if($pages_content['pages_slug']== 'acting'){$_SESSION['faculty'] = 'Acting';}
			else if($pages_content['pages_slug']== 'private-voice'){$_SESSION['faculty'] = 'Voice';}
			else if($pages_content['pages_slug']== 'piano'){$_SESSION['faculty'] = 'Piano';}
			else { unset($_SESSION['faculty']); }
			include('teacher.php');
				break;
				?>
			 </div>
			  </div>
				</div>
			</div> 
			<div class="blank"></div>
		<?php
		}
		}
	?>
</div>
<?php
include 'inc/footer.php'; 
?>