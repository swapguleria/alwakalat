<?php include 'inc/database.php'; ?>
<?php 
if($_GET['name'] == 'class')
{
$value	=	$obj->get_single_field('class','class_open','class_id',$_GET['id']);
if($value > 0 ){ echo 'open'; }
else { echo 'close'; }
}
if($_GET['name'] == 'camp')
{
$value	=	$obj->get_single_field('camp','camp_seat','camp_id',$_GET['id']);
if($value > 0 ){ echo 'open'; }
else { echo 'close'; }
}


	?>