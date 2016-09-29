<?php include("includes/header.php");
	  $slider	=	$get->get_all_data_active('slider','slider_id','desc','slider_active','yes'); 
	  $content	=	$get->get_all_data_active('home_content_image','id','asc','show','yes'); 
	  $searches	=	$get->get_all_data_active('searches','order','asc','show','yes'); 
	  $clients	=	$get->get_all_data_active('clients','id','asc','show','yes'); 
	  $makers	=	$get->get_all_data('maker','id','desc');
?>
<div class="col-sm-12 left-contact" id="find_car" style="display:none;width:400px;">
        <div class="find_car_form">
          <h1>Find Your Car</h1>
          <form action="search_result.php" method="POST" id="feedback" novalidate="novalidate">
				<select name="maker" id="maker_">
				<option value="">--Select Maker--</option>
				<?php foreach($makers as $maker){?>
				
				<option value="<?php echo $maker['id'];?>"><?php echo $maker['name'];?></option>
				<?php } ?>
				</select>
				<!--select name="model" id="model_sel">
					<option selected="selected">Select Maker First</option>
				</select>
				<select name="sub_model" id="sub_model_sel">
					<option selected="selected">Select Model First</option>
				</select-->
				<select id="filter_bodytype" name="bodyType" ><option value="">--Select BodyType--</option>
					<option value="Sedan">Sedan</option>
					<option value="Coupe">Coupe</option>
					<option value="Saloon">Saloon</option>
					<option value="SUV">SUV</option>
					<option value="Hatchback">Hatchback</option>
				</select>
				<select id="filter_price" name="price" ><option value="">--Select Price--</option>
					<option value="<=65000">Below QR 65,000</option>
					<option value="<=100000">Below QR 100,000</option>
					<option value="<=125000">Below QR 125,000</option>
					<option value="<=150000">Below QR 150,000</option>
					<option value="<=200000">Below QR 200,000</option>
					<option value="<=250000">Below QR 250,000</option>
					<option value="<=350000">Below QR 350,000</option>
					<option value="<=500000">Below QR 500,000</option>
					<option value="=>500000">More than QR 500,000</option>
				</select>
				<!--a href="javascript:void(0);" id="find_car_btn" >Find Car</a-->
				<input type="submit" name="submit" value="Find Car">
				</form>
				<div class="result"></div>
          </div>
        </div>
  <div class="banner">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
      <!-- Indicators --> 
      <!-- <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>--> 
      
      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <?php foreach($slider as $result) {	?>
        <div class="item background-1"> <img src="<?php if(isset($result['slider_full_path'])) {echo $result['slider_full_path'];} ?>" alt="">
          <div class="carousel-caption">
            <div class="banner-text">
              <h1>Al Wakalat is the first online showroom</h1>
              <h2>to host automobile dealerships in Qatar and soon, the region.</h2>
              <a class="compaison" href="comparison.php">Comparison</a> <a class="find fancybox" href="#find_car">find your car</a> </div> 
          </div>
        </div>
		<?php } ?>
      </div>
      
      <!-- Controls --> 
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"><span><img src="images/arrow-left.png" alt="" title=""></span> </a> <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"><span><img src="images/arrow-right.png" alt="" title=""></span></a> </div>
  </div>
  <div class="promotion-main">
    <div class="container">
      <div class="row">
		<?php foreach($content as $data){?>
        <div class="col-sm-4 promotion-div">
          <div class="promotion-inner">
            <div class="promotion-img"> <img src="<?php echo $data['full_path'];?>" alt="" title=""> </div>
            <div class="promotion-text"> <a href="<?php echo $data['link'];?>"><?php echo $data['text'];?> <img src="images/double-arrow.png" alt="" title="" ></a> </div>
          </div>
        </div>
		<?php } ?>
        
      </div>
    </div>
  </div>
  <div class="searches">
    <div class="container inner-container">
      <h1>Top 10 <span>Searches</span>
      </h1>
      <div class="search-products clearfix">
	  <?php foreach($searches as $search){?>
        <div class="search-main-product">
          <div class="search-product-img"> <a href="brand_car.php?id=<?php echo $search['maker_id'];?>"><img src="<?php echo $search['full_path'];?>" alt="" title=""></a> </div>
          <div class="search-product-text">
            <h2><a href="brand_car.php?id=<?php echo $search['maker_id'];?>"><?php echo $search['search_name'];?></a></h2>
          </div>
	  </div><?php } ?>
        
      </div>
    </div>
  </div>
  
  <div class="clients-supports">
    <div class="container inner-container">
      <h1>Clients and Supporters</h1>
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
        
        <div class="col-sm-4 clients coming-soon"> 
          <div class="client-inner">
            <div class="coming">Coming soon!</div>
          </div>
        </div>
      </div>
      </div>
     <?php include("includes/footer.php")?>