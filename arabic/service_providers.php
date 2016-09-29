<?php include("includes/header.php");?>
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
  <div class="patners">
    <div class="container inner-container">
      <h1>لدينا مقدم الخدمة قيمة المتواجدون تدعمنا لتحقيق رضاكم</h1>
      <div class="clients-main row">
          <?php
            foreach ($service_providers as $providers)
                {
                ?>
                <div class="col-sm-4 clients">
                    <div class="client-inner">

                        <div class="client-img"><a href="provider-detail.php?id=<?php echo $providers['id']; ?>" ><img src="../<?php echo $providers['full_path']; ?>" alt="" title=""></a></div>
                        <div class="client-text">

                            <h2><a href="provider-detail.php?id=<?php echo $providers['id']; ?>"><?php echo $providers['provider_name']; ?></a></h2>
                        </div>
                    </div>
                </div>
            <?php } ?>


     
      </div></div></div>
 <?php include("includes/footer.php");?>