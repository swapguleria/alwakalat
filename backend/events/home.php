<!-- Owl Carousel Assets -->
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">
	<script src="js/owl.carousel.js"></script>
   
<div class="col-md-4 col-sm-4 col-xs-12">
<h1>Upcoming Events</h1>
<div class="event_data">
<?php $result = $obj->get_all_data_active_new('new','new_date','asc','new_active','yes');
if(is_array($result)){ 
foreach($result as $value){
?>


<div class="new">
<a href="upcoming_events/<?php echo $value['new_id'];?>">
<div class="col-md-3 col-sm-4 col-xs-4">
<h2><?php echo date('d',strtotime($value['new_date']));  ?></h2>
<h6><?php echo date('M',strtotime($value['new_date'])); ?></h6>
</div></a>
<div class="col-md-9 col-sm-8 col-xs-8">
<h4><?php echo $value['new_heading']; ?></h4>
<p><?php
if (strlen($value['new_summary']) > 50) {

    // truncate string
    $stringCut = substr($value['new_summary'], 0, 50);

    // make sure it ends in a word so assassinate doesn't become ass...
    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a style="color:blue" href="new.php?'.$value['new_id'].'">Read More</a>'; 
}
else {
 echo $value['new_summary']; }?></p> 
</div>
</div>

<?php } }else { echo "<h3 style='text-decoration:none'>No Updates</h3>";}
?>
</div>

<?php   if(count($result) > 3){?>
<div class="btn btn-sm btn-default morebtn"><a href="upcoming_event">View All</a></div> <?php } ?>
</div>

<div class="col-md-4 col-sm-4 col-xs-12">
<h1 class="events">VIDEOS</h1>
<?php $result = $obj->get_all_data_active_video('video','video_id','desc','video_active','yes');
if(is_array($result)){ 
foreach($result as $value){
?>
 <iframe width="100%" height="200" class="home_video"
src="<?php echo $value['video_url'];?>">
</iframe> 
<div style="margin-bottom:10px;"></div>
 <?php }
 } ?>



<?php/* $result = $obj->get_all_data_active_events('events','events_start_date','asc','events_active','yes');
if(is_array($result)){ 
foreach($result as $value){
?>
<div class="row">
<div class="new borderb event_spacing">
<a href="new_event/<?php echo $value['events_id'];?>">
<div class="col-md-5 col-sm-5 col-xs-5">
<div class="marginb dance_image"><img src="<?php echo $value['events_thumb_path'];?>" alt="" /></div>
</div></a>
<div class="col-md-7 col-sm-7 col-xs-7">
<h4><?php echo $value['events_name']; ?></h4>
<p><?php if (strlen($value['events_summary']) > 50) {

    // truncate string
    $stringCut = substr($value['events_summary'], 0, 80);

    // make sure it ends in a word so assassinate doesn't become ass...
    echo $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a style="color:blue" href="events.php?id='.$value['events_id'].'">Read More</a>'; 
}
else {
 echo $value['events_summary']; }?></p>
</div>
</div>
</div>
<?php } }else { echo "<h3 style='text-decoration:none'>No Updates</h3>";} if(is_array($result)){?>
<div class="btn btn-sm btn-default morebtn"><a  href="event">View All</a></div><?php } */?>
</div> 

<div class="col-md-4 col-sm-4 col-xs-12">
<h1>Testimonial</h1>

<div id="owl-demo" class="owl-carousel"> 
<?php $result = $obj->get_all_data_active('testimonial','testimonial_id','asc','testimonial_active','yes');
if(is_array($result)){ 
foreach($result as $value){
?>         
<div class="new item">
<a href="testimonials/<?php echo $value['testimonial_id'];?>">

<h4><?php echo $value['testimonial_heading']; ?></h4>
<p><?php echo $value['testimonial_summary']; ?></p> 
<div class="testimonial_name">"<?php echo $value['testimonial_username']; ?>"</div>
</a>
</div>

<?php }

}?>
</div>

<div class="btn btn-sm btn-default morebtn"><a href="testimonial">View All</a></div>
</div>



<script>
    $(document).ready(function() {
      $("#owl-demo").owlCarousel({
		 autoPlay : 5000,
        stopOnHover : true,
      navigation : true,
      slideSpeed : 700,
      paginationSpeed : 400,
      singleItem : true});
    });
    </script>

