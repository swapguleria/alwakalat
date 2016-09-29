<?php include("includes/header.php");
if(isset($_GET['id']) && $_GET['id']!=""){
	$cars	=	$get->get_all_data_active('car_data','id','asc','maker_id',$_GET['id']);	
}
?> 
<style>
.search-main-product{padding:10px 10px;}</style>
  <div class="inner-banner">
    <div id="demo">
      <div id="owl-demo" class="owl-carousel">
		<?php foreach ($result->data as $post): ?>
		<!-- Renders images. @Options (thumbnail,low_resoulution, high_resolution) -->
		<div class="item"><a  class="fancybox" data-fancybox-group="gallery" href="<?php echo $post->images->standard_resolution->url ?>"><img src="<?php echo $post->images->thumbnail->url ?>" alt="" title=""></a></div>
		
	<?php endforeach ?>
	  
	
        </div>
    </div>
  </div>
  
  <div class="searches">
    <div class="container inner-container">
	
      <h1><?php echo $get->get_single_field('maker','name','id',$_GET['id']) ; ?> </h1> 
	  
	  <div class="filter">
		<label>Body Type</label>
		<input type="hidden" name="maker_id" id="maker" value="<?php echo $_GET['id'];?>">
		<select id="filter_bodytype"><option value="All">--Select--</option>
			<option value="Sedan">Sedan</option>
			<option value="Coupe">Coupe</option>
			<option value="Saloon">Saloon</option>
			<option value="SUV">SUV</option>
			<option value="Hatchback">Hatchback</option>
		</select>
		<label>Price Filter</label>
		<select id="filter_price"><option value="All">--Select--</option>
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
		

		<a id="filter_it" href="javascript:void(0);">Filter</a></div>
		
      <div class="search-products clearfix" id="filter">
		
	  <?php foreach($cars as $car){
//              echo "<pre>" ; 
//              print_r($car);
              ?>
        <div class="search-main-product">
          <div class=""> <a href="car-brands.php?id=<?php echo $car['id'];?>"><img src="<?php echo $car['full_path'];?>" alt="" title=""></a> </div>
          <div class="search-product-text">
            <h2><a href="car-brands.php?id=<?php echo $car['id'];?>">
                <?php echo $get->get_single_field('model','model_name','model_id',$car['model']) ; ?>
 <?php echo $get->get_single_field('sub_model','sub_model_name','sub_id',$car['sub_model']) ; ?> 
 <?php echo $car['bodyType'];?></a></h2>
          </div>
	  </div><?php } ?>
        
      </div>
    </div>
  </div>
  <?php include("includes/footer.php");