<?php
include 'inc/page_header.php'; 
if(isset($_GET['id'])){
	$result = $obj->get_single_result('events','events_id',$_GET['id']);
}
else
{
$result = $obj->get_all_data_active('events','events_id','desc','events_active','yes');
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
	<h1><a href="event">EVENTS</a></h1>
		<?php 
		if(isset($_GET['id'])) {
			if(is_array($result)){?>
			<div class="row">
				
					<div class="new">
						<div class="col-md-3 col-sm-4 col-xs-4">
						<img src="<?php echo $result['events_thumb_path'];?>"/>
						</div>
						<div class="col-md-9 col-sm-8 col-xs-8">
						<h4><?php echo $result['events_name'].'('.$result['events_start_date'].' to '.$result['events_end_date'].'),'.$obj->get_single_field('location','location_name','location_id',$result['events_location']); ?></h4>
						<p><?php echo $result['events_summary']; ?></p>
						</div>
					</div>
				
			</div>
		<?php }		
		}
		else {
		if(is_array($result)){
			foreach($result as $value){ ?>
			<div class="row">
				<a href="new_event/<?php echo $value['events_id'];?>">
					<div class="new">
						<div class="col-md-3 col-sm-4 col-xs-4">
						<img src="<?php echo $value['events_thumb_path'];?>"/>
						</div>
						<div class="col-md-9 col-sm-8 col-xs-8">
						<h4><?php echo $value['events_name'].'('.$value['events_start_date'].' to '.$value['events_end_date'].'),'.$obj->get_single_field('location','location_name','location_id',$value['events_location']); ?></h4>
						<p><?php echo $value['events_summary']; ?></p>
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