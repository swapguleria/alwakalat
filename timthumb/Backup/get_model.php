<?php include 'includes/config.php'; 
 $maker_id	=	 $_POST['id'];
if(isset($_POST['action']) && $_POST['action']=="model"){
	$result	=	$get->get_all_data_active("model","model_id","ASC","maker_id",$maker_id);
	 echo '<option value="" selected="selected">Select Model</option>';
	foreach($result as $value){
		
		echo '<option value="'.$value['model_id'].'">'.$value['model_name'].'</option>';
	}
}/* 
if(isset($_POST['action']) && $_POST['action']=="find_car_form"){
	$result	=	$get->get_all_data_active("car_data","id","ASC","maker_id",$maker_id);
	 echo '<option value="" selected="selected">--Select BodyType--</option>';
	foreach($result as $value){
		
		echo '<option value="'.$value['bodyType'].'">'.$value['bodyType'].'</option>';
	}
} */
if(isset($_POST['action']) && $_POST['action']=="sub_model"){
	$result	=	$get->get_all_data_active("car_data","id","ASC","model",$maker_id);
	/* $results	=	$get->get_all_data_active("car_data","bodyType","ASC","sub_model",$maker_id); */
	 echo '<option value="" selected="selected">Select Sub-Model</option>';
	foreach($result as $value){
		echo '<option value="'.$value['id'].'">'.$get->get_single_field('sub_model','sub_model_name','sub_id',$value['sub_model']).' '.$value['bodyType'].'</option>';
	}
}

if(isset($_POST['action']) && $_POST['action']=="compare"){
	
	 $maker1	=	 $_POST['maker1'];
	 $maker2	=	 $_POST['maker2'];
	 $maker3	=	 $_POST['maker3'];
	 
	 $model1	=	 $_POST['model1'];
	 $model2	=	 $_POST['model2'];
	 $model3	=	 $_POST['model3'];
	 
	 $version1	=	 $_POST['version1'];
	 $version2	=	 $_POST['version2'];
	 $version3	=	 $_POST['version3'];
	 
	 if(isset($maker3) && $maker3!=""){
		 $query = "SELECT * from `car_data` where maker_id IN(".$maker1.",".$maker2.",".$maker3.") and model IN(".$model1.",".$model2.",".$model3.") and id IN(".$version1.",".$version2.",".$version3.") ";
	 }else{
		 $query = "SELECT * from `car_data` where maker_id IN(".$maker1.",".$maker2.") and model IN(".$model1.",".$model2.") and id IN(".$version1.",".$version2.") ";
		 
	 }
	$run_query	= mysql_query($query) or die(mysql_error());
	$html = '<div class="col-sm-2 fields-left">
		  <div class="field-outer-img"> </div>
          <div class="fields-right-inner">
		  <h1>Fields</h1>
          
          <p>price</p>
          <p>Warranty</p>
          <p class="acc">Acceleration (0-100)</p>
          <p>Top Speed</p>
          <p>Engine Size</p>
          <p>Horsepower</p>
          <p>Cylinders</p>
         
           <p class="acc">Driven <br>Wheels</p>
           <p class="acc">Special<br> Features</p>
        </div></div>';
	while($row = mysql_fetch_array($run_query)){
		$html.='
		<div class="col-sm-3 fields-right">
		<div class="field-outer-img"> <img src="'.$row['full_path'].'"></div>
		
		<div class="fields-right-inner">
		
        <h1>'.$get->get_single_field('maker','name','id',$row['maker_id']).' '.$get->get_single_field('model','model_name','model_id',$row['model']).' '.$get->get_single_field('sub_model','sub_model_name','sub_id',$value['sub_model']).'</h1>
        <p>QAR '.number_format($row['price']).'</p>
        <p>'.$row['Warranty'].'</p>
        <p>'.$row['acceleration'].' seconds</p>
        <p>'.$row['top_speed'].' km/hr</p>
        <p>'.$row['engineSize'].' litres</p> 
        <p>'.$row['h_power'].' HP</p>
        <p>'.$row['clyinders'].'</p>
        <p>'.$row['drivenWheels'].'</p>
        <p>'.$row['specialFeatures'].'</p>
        </div></div>';
	}
	echo $html;
	
}

if(isset($_POST['action']) && $_POST['action']=="get_car"){
	$value =	$_POST['val'];
	$maker =	$_POST['maker'];
	$price =	$_POST['price'];
	if($value=="All" && $price!="All"){$query = "SELECT * from `car_data` where maker_id =".$maker." and `price`".$price."";}
	else if($value!="All" && $price=="All"){$query = "SELECT * from `car_data` where maker_id =".$maker." and bodyType='".$value."' ";}
	else if($value!="All" && $price!="All")	{$query = "SELECT * from `car_data` where maker_id =".$maker." and bodyType='".$value."' and `price`".$price."";}
	else if($value=="All" && $price=="All")	{$query = "SELECT * from `car_data` where maker_id =".$maker."";}
	$run_query	= mysql_query($query) or die(mysql_error());
	$num = mysql_num_rows($run_query);
	if($num>0){
	 while($car = mysql_fetch_array($run_query)){
		$html.= '<div class="search-main-product">
          <div class=""> <a href="car-brands.php?id='.$car["id"].'"><img src="'.$car["full_path"].'" alt="" title=""></a> </div>
          <div class="search-product-text">
            <h2><a href="car-brands.php?id='.$car["id"].'">'.$get->get_single_field("model","model_name","model_id",$car["model"]).' '.$get->get_single_field("sub_model","sub_model_name","sub_id",$car["sub_model"]).'  '.$car["bodyType"].'</a></h2>
          </div>
	  </div>';
		
	} }else{
		
	echo"Sorry,No record Found!";	
	}
	echo $html;
}

if(isset($_POST['action']) && $_POST['action']=="find_car"){
	$model_sel =	$_POST['model_sel'];
	$sub_model =	$_POST['sub_model'];
	$maker	   =	$_POST['maker'];
	$price     =	$_POST['price'];
	$bodyType  =	$_POST['bodyType'];
	
	$query = "SELECT * from `car_data` where maker_id =".$maker." and bodyType='".$bodyType."' and `price`".$price."";
	
	$run_query	= mysql_query($query) or die(mysql_error());
	$num = mysql_num_rows($run_query);
	if($num>0){
		$car = mysql_fetch_array($run_query);
		echo $car['id'];
	}else{
		
	echo"false";	
	}
	
}
?>