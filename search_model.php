<?php
include ("includes/config.php");
echo 'asdfasdfasdf';
	$cars=$get->get_data_dual_field_check('car_data', 'make_id', 8, 'bodyType', 'Crossover', 'price', '116000');
	//$cars=$get->get_data_dual_field_check('car_data', 'make_id', @$_POST['id'], 'bodyType', @$_POST['body_type'], 'price', @$_POST['price']);
        
        
        
        //get_all_data_active('car_data','price','asc','maker_id',$_POST['id']);
//print_r($cars);
?> 
  <div class="search-products clearfix filter" id="filter">
      hellosdfgsdfg
	  <?php foreach($cars as $car){
              ?>
        <div class="search-filter-product">
          <div class=""> <a href="car-brands.php?id=<?= $car['id'];?>"><img src="<?= $car['full_path'];?>" alt="" title=""></a> </div>
          <div class="search-product-text">
            <h2><a href="car-brands.php?id=<?= $car['id'];?>">
                <?= $get->get_single_field('model','model_name','model_id',$car['model']) ; ?>
          <?= $get->get_single_field('sub_model','sub_model_name','sub_id',$car['sub_model']) ; ?> 
          <?= $car['bodyType'];?></a></h2>
          </div>
	  </div><?php } ?>
      </div>
	  
	  