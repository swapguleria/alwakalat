<?php
  include 'includes/config.php';
  if(isset($_POST['action']) && $_POST['action'] == 'color_select')
  {
    
     $product_id = trim($_POST['product_id']);
	
	
	$product_size = $get->get_product_size('product_details','p_id',trim($_POST['product_id']),'color',trim($_POST['color_name']));  
     foreach($product_size as $size)
	 {
    ?>
	  <option value="<?= $size['pd_id']?>"><?= $size['size']?></option>
	<?php
     }
	 
  }
  
  /*===========================  START Get price and sku from size ===================== */
   else if(isset($_POST['action']) && $_POST['action'] == 'select_size')
   {
    
	   $product_size = $get->get_product_description('product_details','p_id',trim($_POST['product_id']),'pd_id',trim($_POST['product_size']));
	   
	   ?>
	   <input type="hidden" name="size" id="size" value="<?= $product_size['size']?>"/>
	   <input type="hidden" name="price" id="price" value="<?= $product_size['price']?>"/>
	   <input type="hidden" name="sku" id="sku" value="<?= $product_size['product_sku']?>"/>
       <?php 
	     }
		 
/*===========================  END Get Get price and sku from size =================== */

/*=================== START Fetch State list according to country ==================== */
    else if(isset($_POST['action']) && $_POST['action'] == 'country_list')
	{
       $country_id = trim($_POST['country_id']);

      $states_list = $get->get_country_list('states','country_id',$country_id,'name','asc');
	  if(!empty($states_list))
	  {
	  
	   ?>
	    <option value="">Select option</option>
	   <?php
	  
	     foreach($states_list as $lists)
		 {
		   
		 ?>
		  <option value="<?= $lists['name']?>"><?= $lists['name']?></option>
	    <?php
	     }
	  
	  }
	   
	  

    }
	
	
/*=================== END Fetch State list according to country ==================== */

	   ?>
