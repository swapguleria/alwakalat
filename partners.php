<?php include("includes/header.php");?>
  
  <div class="patners">
    <div class="container inner-container">
      <h1>Our Valuable Partners Who Support Us To Achieve Your Satisfaction</h1>
      <div class="clients-main row">
        <?php foreach($clients as $client){?>
        <div class="col-sm-4 clients">
          <div class="client-inner">
            <div class="client-img"><a href="partner-detail.php?id=<?php echo $client['id']; ?>"><img src="<?php echo $client['full_path'];?>" alt="" title=""></a></div>
            <div class="client-text">
              <h2><a href="partner-detail.php?id=<?php echo $client['id']; ?>"><?php echo $client['client_name'];?></a></h2>
            </div>
          </div>
        </div>
		<?php } ?>
      
        
      </div>
    </div></div>
 <?php include("includes/footer.php");?>