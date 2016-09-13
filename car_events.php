<?php include("includes/header.php"); ?>
<!--<div class="inner-banner">
    <div id="demo">
<div id="owl-demo" class="owl-carousel">
        <?php // foreach ($result->data as $post): ?>
		<div class="item"><a class="fancybox" data-fancybox-group="gallery" href="<?php // echo $post->images->standard_resolution->url ?>"><img src="<?php // echo $post->images->thumbnail->url ?>" alt="" title=""></a></div>
		
	<?php // endforeach ?>
      </div>
    </div>
  </div>-->
  <div class="patners">
    <div class="container inner-container">
      <h1>Car Events</h1>
      <div class="clients-main row">
      <div class="car-allevent">
        <?php 
		$datearray = array();
		 foreach($eventsAll as $event){
				$event_date = $event['event_end_date']; 
				$current_date = date("Y-m-d");
	//echo $event_date;
				if($current_date < $event_date) 
				{
					
					$datearray[]= $event['id'];
			?>
			

            <div class="client-text">
              <h2><a href="event_detail.php?id=<?php echo $event['id']; ?>"><?php echo $event['event_title'];?></a></h2>
            </div>
            <div class="owl-wrapper1">
             <div id="owl-demo-<?php echo $event['id']; ?>" class="owl-carousel">
           <div><img src="<?php echo $event['thumb'];?>" alt="" title=""></div>
            <?php $event_images = $get->get_all_event_imgs('event_images','id','asc',$event['id']);
			       foreach($event_images as $images){ ?>
					  <div><img src="<?php echo $images['thumb_path'];?>" alt="" title=""></div>
				 <?php  }
			?>
           
            </div>
            <div class="customNavigation eventNav<?php echo $event['id'];?>">
      <a class="btn prev"><</a>
      <a class="btn next">></a>
    </div>
<?php } ?>
            </div>
        
		<?php }  if(empty($datearray)) { echo "There are no upcoming events"; }?>
        </div>

		</div>
    </div></div>

<?php include("includes/footer.php");?>