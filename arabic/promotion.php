<?php include('includes/header.php');
$slider = $get->get_all_data('promotion_slider', 'slider_id', 'desc');
//print_r($slider);
?>
<!--  <div class="inner-banner">
    <div id="demo">
      <div id="owl-demo" class="owl-carousel">
		<?php // foreach ($result->data as $post): ?>
		 Renders images. @Options (thumbnail,low_resoulution, high_resolution) 
		<div class="item"><a  class="fancybox" data-fancybox-group="gallery" href="<?php // echo $post->images->standard_resolution->url ?>"><img src="<?php // echo $post->images->thumbnail->url ?>" alt="" title=""></a></div>
		
	<?php // endforeach ?>
	  
	
        </div>
    </div>
  </div>-->
  <div id="demo-promotion">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div id="sync1" class="owl-carousel">
              <?php foreach ($slider as $sli) {    ?>
            <div class="item">
            <div class="sync1">
                <img src="../<?php if (isset($sli['full_path'])) {
        echo $sli['full_path'];
    } ?>" alt="">
    </div>
             <!-- <h1><img src="../images/promotion-slider-two.jpg" alt=""> <span><img src="../images/promotion-slider-car-icon.png" alt="">
<!--                <h3>SPECIAL<br>
                  OFFER</h3>
                <p>ONLY </p>
                <p>159 PER  MONTH </p>
                </span></h1>-->
            </div>
              <?php } ?>
           <!-- <div class="item">
              <h1><img src="../images/promotion-slider-three.jpg" alt=""> <span><img src="../images/promotion-slider-car-icon.png" alt="">
<!--                <h3>SPECIAL<br>
                  OFFER</h3>
                <p>ONLY </p>
                <p>159 PER  MONTH </p>
                </span></h1>
            </div>
            <div class="item">
              <h1><img src="../images/promotion-slider-one.jpg" alt=""> <span><img src="../images/promotion-slider-car-icon.png" alt="">
                <h3>SPECIAL<br>
                  OFFER</h3>
                <p>ONLY </p>
                <p>159 PER  MONTH </p>
                </span></h1>
            </div>
            <div class="item">
              <h1><img src="../images/promotion-slider-one.jpg" alt=""> <span><img src="../images/promotion-slider-car-icon.png" alt="">
                <h3>SPECIAL<br>
                  OFFER</h3>
                <p>ONLY </p>
                <p>159 PER  MONTH </p>
                </span></h1>
            </div>
            <div class="item">
              <h1><img src="../images/promotion-slider-one.jpg" alt=""> <span><img src="../images/promotion-slider-car-icon.png" alt="">
                <h3>SPECIAL<br>
                  OFFER</h3>
                <p>ONLY </p>
                <p>159 PER  MONTH </p>
                </span></h1>
            </div>
            <div class="item">
              <h1><img src="../images/promotion-slider-one.jpg" alt=""> <span><img src="../images/promotion-slider-car-icon.png" alt="">
                <h3>SPECIAL<br>
                  OFFER</h3>
                <p>ONLY </p>
                <p>159 PER  MONTH </p>
                </span></h1>
            </div>
            <div class="item">
              <h1><img src="../images/promotion-slider-one.jpg" alt=""> <span><img src="../images/promotion-slider-car-icon.png" alt="">
                <h3>SPECIAL<br>
                  OFFER</h3>
                <p>ONLY </p>
                <p>159 PER  MONTH </p>
                </span></h1>
            </div>
            <div class="item">
              <h1><img src="../images/promotion-slider-one.jpg" alt=""> <span><img src="../images/promotion-slider-car-icon.png" alt="">
                <h3>SPECIAL<br>
                  OFFER</h3>
                <p>ONLY </p>
                <p>159 PER  MONTH </p>
                </span></h1>
            </div>
            <div class="item">
              <h1><img src="../images/promotion-slider-one.jpg" alt=""> <span><img src="../images/promotion-slider-car-icon.png" alt="">
                <h3>SPECIAL<br>
                  OFFER</h3>
                <p>ONLY </p>
                <p>159 PER  MONTH </p>
                </span></h1>
            </div>
            <div class="item">
              <h1><img src="../images/promotion-slider-one.jpg" alt=""> <span><img src="../images/promotion-slider-car-icon.png" alt="">
                <h3>SPECIAL<br>
                  OFFER</h3>
                <p>ONLY </p>
                <p>159 PER  MONTH </p>
                </span></h1>
            </div>
            <div class="item">
              <h1><img src="../images/promotion-slider-one.jpg" alt=""> <span><img src="../images/promotion-slider-car-icon.png" alt="">
                <h3>SPECIAL<br>
                  OFFER</h3>
                <p>ONLY </p>
                <p>159 PER  MONTH </p>
                </span></h1>
            </div>
            <div class="item">
              <h1><img src="../images/promotion-slider-one.jpg" alt=""> <span><img src="../images/promotion-slider-car-icon.png" alt="">
                <h3>SPECIAL<br>
                  OFFER</h3>
                <p>ONLY </p>
                <p>159 PER  MONTH </p>
                </span></h1>
            </div>-->
          </div>
          <div id="sync2" class="owl-carousel">
              <?php foreach ($slider as $slider1) { ?>
            <div class="item" >
                         <!-- <h1><img src="images/promotono-small-image-onee.jpg" alt=""></h1>-->
                            <img src="http://alwakalat.com/timthumb/timthumb.php?w=170&h=150&src=http://alwakalat.com/<?= $slider1['full_path']; ?>" class="da-thumbs thumbnail" style="width: 170px;height:150px;">

 
    <!--                <img src="<?php
    if (isset($slider1['thumb_path']))
        {
        echo $slider1['thumb_path'];
        }
    ?>" alt=""> -->
                        </div>
              <?php } ?>
            <!--<div class="item" >
              <h1><img src="../images/promotono-small-image-one.jpg" alt=""></h1>
            </div>
            <div class="item" >
              <h1><img src="../images/promotono-small-image-one.jpg" alt=""></h1>
            </div>
            <div class="item" >
              <h1><img src="../images/promotono-small-image-one.jpg" alt=""></h1>
            </div>
            <div class="item" >
              <h1><img src="../images/promotono-small-image-one.jpg" alt=""></h1>
            </div>
            <div class="item" >
              <h1><img src="../images/promotono-small-image-one.jpg" alt=""></h1>
            </div>
            <div class="item" >
              <h1><img src="../images/promotono-small-image-one.jpg" alt=""></h1>
            </div>
            <div class="item" >
              <h1><img src="../images/promotono-small-image-one.jpg" alt=""></h1>
            </div>
            <div class="item" >
              <h1><img src="../images/promotono-small-image-one.jpg" alt=""></h1>
            </div>
            <div class="item">
              <h1><img src="../images/promotono-small-image-one.jpg" alt=""></h1>
            </div>
            <div class="item">
              <h1><img src="../images/promotono-small-image-one.jpg" alt=""></h1>
            </div>
            <div class="item">
              <h1><img src="../images/promotono-small-image-one.jpg" alt=""></h1>
            </div>-->
          </div>
        </div>
      </div>
    </div>
  </div>
   
  <?php include('includes/footer.php')?>