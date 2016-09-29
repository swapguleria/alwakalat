<?php include("includes/header.php"); ?>
  <div class="patners">
    <div class="container inner-container">
      <h1>الأحداث سيارة</h1>
      <div class="clients-main row">
      <div class="car-allevent">
        <?php foreach($eventsAll as $event){?>
       
            
            <div class="client-text">
              <h2><a href="event_detail.php?id=<?php echo $event['id']; ?>"><?php echo $event['title_arabic'];?></a></h2>
            </div>
           <div class="owl-wrapper1">
             <div id="owl-demo-<?php echo $event['id']; ?>" class="owl-carousel">
           <div><img src="../<?php echo $event['thumb'];?>" alt="" title=""></div>
            <?php $event_images = $get->get_all_event_imgs('event_images','id','asc',$event['id']);
			       foreach($event_images as $images){ ?>
					  <div><img src="../<?php echo $images['thumb_path'];?>" alt="" title=""></div>
				 <?php  }
			?>
           
            </div>
            <div class="customNavigation eventNav<?php echo $event['id'];?>">
      <a class="btn prev"><</a>
      <a class="btn next">></a>
    </div>
            </div>
        
		<?php } ?>
        </div>

        
      </div>
    </div></div>
    


<?php include("includes/footer.php");?> 
<script>
    jQuery(document).ready(function(){
    var owlWrap = $('.owl-wrapper1');
    // checking if the dom element exists
    if (owlWrap.length > 0) {
        // check if plugin is loaded
        if (jQuery().owlCarousel) {
            owlWrap.each(function(){
                var carousel= $(this).find('.owl-carousel'),
                    navigation = $(this).find('.customNavigation'),
                    nextBtn = navigation.find('.next'),
                    prevBtn = navigation.find('.prev'),
                    playBtn = navigation.find('.play'),
                    stopBtn = navigation.find('.stop');
                
              carousel.owlCarousel({
                  itemsCustom : [
						[0,2],
						[479, 2],
						[768, 2],
						//[995, 2],
						[1200, 6]
					],
					navigation  : false,
					stopOnHover : true,
					autoPlay    : 2000,
					responsive  : true,
					loop : false
              });
             
              // Custom Navigation Events
              nextBtn.click(function(){
                carousel.trigger('owl.next');
              });
              prevBtn.click(function(){
                carousel.trigger('owl.prev');
              });
              playBtn.click(function(){
                owl.trigger('owl.play',1000); //owl.play event accept autoPlay speed as second parameter
              });
              stopBtn.click(function(){
                owl.trigger('owl.stop');
              });

            });
        };
    };
});
</script>  