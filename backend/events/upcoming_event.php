<?php
include 'inc/page_header.php'; 
if(isset($_GET['id'])){
	$result = $obj->get_single_result('new','new_id',$_GET['id']);
}
else
{
$result = $obj->get_all_data_active('new','new_date','asc','new_active','yes');
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
	<h1><a href="upcoming_event">Upcoming Events</a></h1>
		<?php 
		if(isset($_GET['id'])) {
			if(is_array($result)){?>
			<div class="row">
				
					<div class="new">
						<div class="col-md-3 col-sm-4 col-xs-4">
						<h2><?php echo date('d',strtotime($result['new_date']));  ?></h2>
						<h6><?php echo date('M',strtotime($result['new_date'])); ?></h6>
						</div>
						<div class="col-md-9 col-sm-8 col-xs-8">
						<h4><?php echo $result['new_heading']; ?></h4>
						<p><?php echo $result['new_summary']; ?></p>
						</div>
					</div>
				
			</div>
		<?php }		
		}
		else {
		if(is_array($result)){
			foreach($result as $value){ ?>
			<div class="row">
				<a href="upcoming_events/<?php echo $value['new_id'];?>">
					<div class="new">
						<div class="col-md-3 col-sm-4 col-xs-4">
						<h2><?php echo date('d',strtotime($value['new_date']));  ?></h2>
						<h6><?php echo date('M',strtotime($value['new_date'])); ?></h6>
						</div>
						<div class="col-md-9 col-sm-8 col-xs-8">
						<h4><?php echo $value['new_heading']; ?></h4>
						<p><?php echo $value['new_summary']; ?></p>
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