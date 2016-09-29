<?php
include 'inc/page_header.php'; 
if(isset($_GET['id'])){
	$result = $obj->get_single_result('testimonial','testimonial_id',$_GET['id']);
}
else
{
$result = $obj->get_all_data_active('testimonial','testimonial_id','asc','testimonial_active','yes');
}
/*****************Give the page title*********************/
$title =  $_SERVER['SCRIPT_NAME'];
$title1 = explode('.php',$title);
$title2 = explode('/',$title1[0]);
$title =  end($title2);

?>
<div class="title" style="display:none"><?php echo ucwords($title);?></div>


<div class="content about">
	<div class="col-md-12 col-sm-12 col-xs-12">
	<h1><a href="testimonial">Testimonial</a></h1>
		<?php 
		if(isset($_GET['id'])) {
			if(is_array($result)){?>
			<div class="row">
				
					<div class="new">
						<div class="col-md-12 col-sm-12 col-xs-12">
						
							<h4><?php echo $result['testimonial_heading']; ?></h4>
							<p><?php echo $result['testimonial_summary']; ?></p>
							<div class="testimonial_name">"<?php echo $result['testimonial_username']; ?>"</div>
						</div>
					</div>
				
			</div>
		<?php }		
		}
		else {
		if(is_array($result)){
			foreach($result as $value){ ?>
			<div class="row">
				<a href="testimonials/<?php echo $value['testimonial_id'];?>">
					<div class="new">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<h4 class="testi_head"><?php echo $value['testimonial_heading']; ?></h4>
							<p><?php echo $value['testimonial_summary']; ?></p>
							<div class="testimonial_name">"<?php echo $value['testimonial_username']; ?>"</div>
						</div>
					</div>
				</a>
			</div>
		<?php }
		}
		}?>
	</div>
		<div class="blank"></div>
</div>
<?php
include 'inc/footer.php'; 
?>