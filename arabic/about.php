<?php include("includes/header.php");
$results	=	$get->get_single_result('page','id','1');

?>   

  
  <div class="about-section">
    <div class="container">
      <div class="inner-about">
        <div class="about-img"> <img src="../<?php echo $results['full_path'];?>" alt="" title=""> </div>
        <div class="about-text">
          <?php echo $results['content_arabic'];?>
        </div>
      </div>
    </div>
  </div>
<!--<div class="inner-banner">
    <div id="demo">
      <div id="owl-demo" class="owl-carousel">
        <?php // foreach ($result->data as $post): ?>
		 Renders images. @Options (thumbnail,low_resoulution, high_resolution) 
		<div class="item"><a class="fancybox" data-fancybox-group="gallery" href="<?php // echo $post->images->standard_resolution->url ?>"><img src="<?php // echo $post->images->thumbnail->url ?>" alt="" title=""></a></div>
		
	<?php // endforeach ?>
      </div>
    </div>
  </div>-->
    <?php include("includes/footer.php")?>   