<?php include("includes/header.php");?>
<!--  <div class="inner-banner">
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
      <h1>دينا قيما الشركاء الذين يدعموننا لتحقيق رضاكم</h1>
      <div class="clients-main row">
        <?php foreach($clients as $client){?>
        <div class="col-sm-4 clients">
          <div class="client-inner">
            <div class="client-img"><a href="partner-detail.php?id=<?php echo $client['id'];?>"><img src="<?php echo $client['full_path'];?>" alt="" title=""></a></div>
            <div class="client-text">
              <h2><a href="partner-detail.php?id=<?php echo $client['id'];?>"><?php echo $client['client_name'];?></a></h2>
            </div>
          </div>
        </div>
		<?php } ?>
      
        
      </div>
      </div>
 <?php include("includes/footer.php");?>