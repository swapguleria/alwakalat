<?php include("includes/header.php");
	if(isset($_GET['id'])){

	$event_data	=	$get->get_single_result('events','id',$_GET["id"]);
	
	$slider_event	=	$get->get_all_data_active('event_images','id','asc','event_id',$_GET["id"]);
	
	}?>
	<style>
	.left-inner input, .left-inner textarea {
    margin-top: 10px;
}
.event-slider .owl-prev {
    background:  rgba(0, 0, 0, 0) url(../image/left-button-event.png) no-repeat !important;
    color: rgba(0, 0, 0, 0) !important;
    height: 69px;
    left: 50px;
    position: absolute;
    top:50%;
    width: 10px;


}

.event-slider .owl-next {
    background: rgba(0, 0, 0, 0) url(../image/event-right-button.png) no-repeat !important;
    color: rgba(0, 0, 0, 0) !important;
	    height: 69px;
    right: 50px;
    position: absolute;
    top: 50%;
    width: 10px;
}


.event-inner hr {
    border-color:#8d8d8d;
    margin: 2px 0;
}

.event-inner {
    padding: 15px 0 20px;
}
.event-slider .item {
	position:relative;

}
.event-main {
    background: rgba(0, 0, 0, 0.5) no-repeat scroll center bottom;
    bottom: -220px;
    display: block;
    left: 0;
    padding: 30px 0;
    position: absolute;
    right: 0;
    transition: all 0.7s ease 0s;
}
.event-slider
{
	
}
.event-slider:hover .event-main {display:block; bottom:0;}


.event-slider::after {
    background: rgba(0, 0, 0, 0) url("../image/top-slider.png") no-repeat scroll 0 0;

    content: "";
    height: 30px;
    left: 0;
    margin: auto;

    position: absolute;
    right: 0;
    top: 0px;
    width: 100%;
    z-index: 99999; background-size:cover;
}



.event-slider::before {
    background: rgba(0, 0, 0, 0) url("../image/slider-bottom.png") no-repeat scroll 0 0;
    bottom: -14px;
    content: "";
    height: 30px;
    left: 0;
    margin: auto;

    position: absolute;
    right: 0;
    width: 100%;
    z-index: 99999;
	background-size:cover;
}

.event-details h3 {
    color: rgb(255, 255, 255);
    font-size: 28px;
    text-transform: uppercase; margin:0;
}


.event-details p {
    color: rgb(255, 255, 255);
    font-size: 14px;
    line-height: 25px;
	 margin:0;
}

.event-slider .owl-controls {
    margin: 0 !important;
}
.event-slider .owl-pagination {
    display: none;
}


.event-slider {
    position: relative; overflow:hidden;
}

    #owl-demo .item img{
        display: block;
        width: 100%;
        height: auto;
    }
	
	</style>
	



<div class="event-slider">
  <div id="demo">
    <div class="row">
      <div class="span12">
        <div id="owl-demoEvent" class="owl-carousel">
          <div class="item"><img src="<?php echo $event_data['full_path'];?>" alt="" title=""></div>
		<?php foreach($slider_event as $event) {?>
        <div class="item"><img src="<?php echo $event['full_path'];?>" alt="" title=""></div>
        
		<?php } ?>
        </div>
      </div>
    </div>
  </div>
  <div class="event-main">
    <div class="container">
      <div class="event-details">
        <h3>Event Details</h3>
        <div class="event-inner">
        
        
          <hr />
          <hr />
          <hr />
        </div>
        <p> <?php echo $event_data['event_description'];  ?> </p>
      </div>
    </div>
  </div>
</div>


		
  
<div class="series-main">
  <div class="container">
  <div class="row">
  <div class=" col-lg-12 col-md-12 col-sm-12 slider-main">
  
 
  
  <div class="brands-prices-bottom">
  <div class="event_title">
     <?php echo $event_data['event_title'];?>
  </div> 
  <!--<div class="description">
  <?php //if($event_data['event_description']!=''){ ?><h3>Event Details</h3> <?php //echo $event_data['event_description']; } ?></div>-->
  </div>
  <div class="test_drive">
  <?php if($event_data['test_drive']!=''){ ?><h3>Test Drive </h3><?php echo $event_data['test_drive']; } ?></div>
  </div>
  </div>
  
   
  </div>
  </div>
  </div>
<script src="js/jquery-1.9.1.min.js"></script> 
<script src="js/owl.carousel.js"></script> 

  
  
 <?php include("includes/footer.php");?>
  <script>
    $(document).ready(function() {
		//alert("test");
      $("#owl-demoEvent").owlCarousel({

      navigation : true,
      slideSpeed : 1000,
      paginationSpeed : 400,
      singleItem : true,
	  autoPlay:true,
	  items : 1

      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false

      });
    });
    </script>