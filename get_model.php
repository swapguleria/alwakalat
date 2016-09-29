<?php
include 'includes/config.php';
$maker_id = $_POST['id'];
if (isset($_POST['action']) && $_POST['action'] == "model")
    {
    $result = $get->get_all_data_active("model", "model_id", "ASC", "maker_id", $maker_id);
    echo '<option value="" selected="selected">Select Model</option>';
    foreach ($result as $value)
        {

        echo '<option value="' . $value['model_id'] . '">' . $value['model_name'] . '</option>';
        }
    }

if (isset($_POST['action']) && $_POST['action'] == "sub_model")
    {
    $result = $get->get_all_data_active("car_data", "id", "ASC", "model", $maker_id);
    /* $results	=	$get->get_all_data_active("car_data","bodyType","ASC","sub_model",$maker_id); */
    echo '<option value="" selected="selected">Select Sub-Model</option>';
    foreach ($result as $value)
        {
        echo '<option value="' . $value['id'] . '">' . $get->get_single_field('sub_model', 'sub_model_name', 'sub_id', $value['sub_model']) . ' ' . $value['bodyType'] . '</option>';
        }
    }

//                --------------------------------------Approved cars Advance search Start---------------
if (isset($_POST['action']) && $_POST['action'] == "app_adv_search_model")
    {
    $result = $get->get_all_data_active("tbl_car_model", "id", "ASC", "maker_id", $maker_id);
    echo '<option value="" selected="selected">Select Model</option>';
    foreach ($result as $value)
        {

        echo '<option value="' . $value['id'] . '">' . $value['model_name'] . '</option>';
        }
    }

//                --------------------------------------Approved cars Advance search End---------------
if (isset($_POST['action']) && $_POST['action'] == "app_model")
    {
    $result = $get->get_all_data_active_approved_car("tbl_used_car", "id", "ASC", "maker_id", $maker_id);
    if (@$result)
        {
        $my_makers = array();

        echo '<option value="" selected="selected">Select Model</option>';
        foreach ($result as $value)
            {
            $my_makers[] = $value['model_id'];
            }
        $my_makers = array_unique($my_makers);
        foreach ($my_makers as $value)
            {
            echo '<option value="' . $value . '">' . $get->get_single_field('tbl_car_model', 'model_name', 'id', $value) . '</option>';
            }
        }
    else
        {
        echo '<option value="" selected="selected">NO Approved car Available</option>';
        }
    }
if (isset($_POST['action']) && $_POST['action'] == "app_sub_model")
    {
    $result = $get->get_all_data_active_approved_car("tbl_used_car", "id", "ASC", "model_id", $maker_id);
//    print_r($result);
    if (@$result)
        {
        echo '<option value="" selected="selected">Select Sub-Model</option>';
        foreach ($result as $value)
            {
            $my_models[] = $value['sub_model_id'];
            }
        $my_models = array_unique($my_models);
        foreach ($my_models as $value)
            {
            echo '<option value="' . $value . '">' . $get->get_single_field('tbl_sub_model', 'name', 'id', $value) . '</option>';
            }
        }
    else
        {
        echo '<option value="" selected="selected">NO Approved car Available</option>';
        }
    }


if (isset($_POST['action']) && $_POST['action'] == "compare")
    {


    $maker1 = $_POST['maker1'];
    $maker2 = $_POST['maker2'];
    $maker3 = $_POST['maker3'];

    $model1 = $_POST['model1'];
    $model2 = $_POST['model2'];
    $model3 = $_POST['model3'];

    $version1 = $_POST['version1'];
    $version2 = $_POST['version2'];
    $version3 = $_POST['version3'];
    $var1 = $maker1 . $model1 . $version1;
    $var2 = $maker2 . $model2 . $version2;
    $var3 = $maker3 . $model3 . $version3;
//    print_r($var1);
    if (isset($maker3) && $maker3 != "")
        {
        $query = "SELECT * from `car_data` where maker_id IN(" . $maker1 . "," . $maker2 . "," . $maker3 . ") and model IN(" . $model1 . "," . $model2 . "," . $model3 . ") and id IN(" . $version1 . "," . $version2 . "," . $version3 . ") ";
        }
    else
        {
        $query = "SELECT * from `car_data` where maker_id IN(" . $maker1 . "," . $maker2 . ") and model IN(" . $model1 . "," . $model2 . ") and id IN(" . $version1 . "," . $version2 . ") ";
        }
    $run_query = mysql_query($query) or die(mysql_error());
    $html = '<div class="col-sm-2 fields-left">
		  <div class="field-outer-img"> </div>
          <div class="fields-right-inner">
		  <h1>Fields</h1>
          
          <p><span>price:</span> </p>
          <p><span>Warranty:</span> </p>
          <p class="acc"><span>Acceleration (0-100):</span> </p>
          <p><span>Top Speed:</span> </p>
          <p><span>Engine Size:</span> </p>
          <p><span>Horsepower:</span> </p>
          <p><span>Cylinders:</span> </p>
         
           <p class="acc"><span>Driven <br>Wheels:</span> </p>
           <p class="acc"><span>Special<br> Features:</span> </p>
        </div></div>';
    while ($row = mysql_fetch_array($run_query))
        {
        $var = $row['maker_id'] . $row['model'] . $row['id'];

        if ($var1 == $var)
            {
            $cv = '
		<div class="col-sm-3 fields-right">
		<div class="field-outer-img"> <img src="../' . $row['full_path'] . '"></div>
		
		<div class="fields-right-inner">
		
        <h1>' . $get->get_single_field('maker', 'name', 'id', $row['maker_id']) . ' ' . $get->get_single_field('model', 'model_name', 'model_id', $row['model']) . ' ' . $get->get_single_field('sub_model', 'sub_model_name', 'sub_id', $value['sub_model']) . '</h1>
        <p><span>price:</span>QAR ' . number_format($row['price']) . '</p>
        <p><span>Warranty:</span>' . $row['Warranty'] . '</p>
        <p><span>Acceleration (0-100):</span>' . $row['acceleration'] . ' seconds</p>
        <p><span>Top Speed:</span>' . $row['top_speed'] . ' km/hr</p>
        <p><span>Engine Size:</span>' . $row['engineSize'] . ' litres</p> 
        <p><span>Horsepower:</span>' . $row['h_power'] . ' HP</p>
        <p><span>Cylinders:</span>' . $row['clyinders'] . '</p>
        <p><span>Driven <br>Wheels:</span>' . $row['drivenWheels'] . '</p>
        <p><span>Special<br> Features:</span>' . $row['specialFeatures'] . '</p>
        </div></div>';
            }
        else if ($var2 == $var)
            {
            $b = '
		<div class="col-sm-3 fields-right">
		<div class="field-outer-img"> <img src="../' . $row['full_path'] . '"></div>
		
		<div class="fields-right-inner">
		
        <h1>' . $get->get_single_field('maker', 'name', 'id', $row['maker_id']) . ' ' . $get->get_single_field('model', 'model_name', 'model_id', $row['model']) . ' ' . $get->get_single_field('sub_model', 'sub_model_name', 'sub_id', $value['sub_model']) . '</h1>
        <p><span>price:</span>QAR ' . number_format($row['price']) . '</p>
        <p><span>Warranty:</span>' . $row['Warranty'] . '</p>
        <p><span>Acceleration (0-100):</span>' . $row['acceleration'] . ' seconds</p>
        <p><span>Top Speed:</span>' . $row['top_speed'] . ' km/hr</p>
        <p><span>Engine Size:</span>' . $row['engineSize'] . ' litres</p> 
        <p><span>Horsepower:</span>' . $row['h_power'] . ' HP</p>
        <p><span>Cylinders:</span>' . $row['clyinders'] . '</p>
        <p><span>Driven <br>Wheels:</span>' . $row['drivenWheels'] . '</p>
        <p><span>Special<br> Features:</span>' . $row['specialFeatures'] . '</p>
        </div></div>';
            }
        else
            {
            $c = '
		<div class="col-sm-3 fields-right">
		<div class="field-outer-img"> <img src="../' . $row['full_path'] . '"></div>
		
		<div class="fields-right-inner">
		
        <h1>' . $get->get_single_field('maker', 'name', 'id', $row['maker_id']) . ' ' . $get->get_single_field('model', 'model_name', 'model_id', $row['model']) . ' ' . $get->get_single_field('sub_model', 'sub_model_name', 'sub_id', $value['sub_model']) . '</h1>
        <p><span>price</span>QAR ' . number_format($row['price']) . '</p>
        <p><span>Warranty</span>' . $row['Warranty'] . '</p>
        <p><span>Acceleration (0-100)</span>' . $row['acceleration'] . ' seconds</p>
        <p><span>Top Speed</span>' . $row['top_speed'] . ' km/hr</p>
        <p><span>Engine Size</span>' . $row['engineSize'] . ' litres</p> 
        <p><span>Horsepower</span>' . $row['h_power'] . ' HP</p>
        <p><span>Cylinders</span>' . $row['clyinders'] . '</p>
        <p><span>Driven <br>Wheels</span>' . $row['drivenWheels'] . '</p>
        <p><span>Special<br> Features</span>' . $row['specialFeatures'] . '</p>
        </div></div>';
            }
        }
    $html.=$cv;
    $html.=$b;
    $html.=$c;
    echo $html;
    }

if (isset($_POST['action']) && $_POST['action'] == "app_compare")
    {
//print_r($_POST);
    $maker1 = $_POST['maker1'];
    $maker2 = $_POST['maker2'];
    $maker3 = $_POST['maker3'];

    $model1 = $_POST['model1'];
    $model2 = $_POST['model2'];
    $model3 = $_POST['model3'];

    $version1 = $_POST['version1'];
    $version2 = $_POST['version2'];
    $version3 = $_POST['version3'];
    $var1 = $maker1 . $model1 . $version1;
    $var2 = $maker2 . $model2 . $version2;
    $var3 = $maker3 . $model3 . $version3;
//    print_r($var1);
    if (isset($maker3) && $maker3 != "")
        {
        $query = "SELECT * from `tbl_used_car` where maker_id IN(" . $maker1 . "," . $maker2 . "," . $maker3 . ") and model_id IN(" . $model1 . "," . $model2 . "," . $model3 . ") and sub_model_id IN(" . $version1 . "," . $version2 . "," . $version3 . ") ";
        }
    else
        {
        $query = "SELECT * from `tbl_used_car` where maker_id IN(" . $maker1 . "," . $maker2 . ") and model_id IN(" . $model1 . "," . $model2 . ") and sub_model_id IN(" . $version1 . "," . $version2 . ") ";
        }
    $run_query = mysql_query($query) or die(mysql_error());

    $html = '<div class="col-sm-2 fields-left">
		  <div class="field-outer-img"> </div>
          <div class="fields-right-inner">
		  <h1>Fields</h1>
           <p><span>Model:</span></p>
           <p><span>Sub Model:</span></p>
            <p><span>Body Type:</span></p>
            
            <p><span>Exterior color:</span></p>
            
             <p><span>Interior Color:</span></p>
           <p><span>price:</span> </p>
          <p><span>Warranty:</span> </p>
          <p class="acc"><span>Acceleration (0-100):</span> </p>
         <p><span>Milage:</span> </p>
          <p><span>Top Speed:</span> </p>
          <p><span>Engine Size:</span> </p>
          <p><span>Gear Type:</span></p>
          <p><span>Roof:</span></p>
          <p><span>Camera:</span></p>
           <p><span>GPS:</span></p>
            <p><span>Accident:</span></p>
             <p><span>Year:</span></p>
           <p><span>Service package ends:</span></p>
            <p><span>Warranty:</span></p>
            <p><span>Horsepower:</span> </p>
        </div></div>';
//    print_r($query);
    while ($row = mysql_fetch_array($run_query))
        {
//          echo "<pre>";
//          print_r($row);
//          echo "</pre>";

        $model = $get->get_single_field('tbl_car_model', 'model_name', 'id', $row['model_id']);
        $maker = $get->get_single_field('tbl_maker', 'name', 'id', $row['maker_id']);
        $sub_model = $get->get_single_field('tbl_sub_model', 'name', 'id', $row['sub_model_id']);
        $bodyType = $get->get_single_field('tbl_body_type', 'name', 'id', $row['body_type_id']);
        $camara = ($row['camera'] == '0') ? "NO" : "YES";
        $GPS = ($row['GPS'] == '0') ? "NO" : "YES";
        $roof = ($row['roof'] == '0') ? "NO" : "YES";
        $accident = ($row['accident'] == '0') ? "NO" : $row['accident_desc'];
        $warranty = ($row['warranty'] == '0') ? "NO" : $row['warranty_expire_date'];
        $owners = $get->getOwnersOptions($row['owners']);
//          $fuel_type = $get->getFuelOptions($row['fuel_type']);
        $transmission = $get->getTransmissionOptions($row['transmission']);
        $interior_color = $get->getColourOptions($row['interior_color']);
        $exterior_color = $get->getColourOptions($row['interior_color']);

        $date_parts1 = date('Y');
        $date_parts2 = explode("-", $row['warranty_expire_date']);
        $year = $date_parts2[0] - $date_parts1;

        $datetime1 = new DateTime($row['warranty_expire_date']);

        $datetime2 = new DateTime(date('Y-m-d'));

        $difference = $datetime1->diff($datetime2);

        if (@$row['banner_image'])
            {
            $img = 'http://alwakalat.com/timthumb/timthumb.php?h=150&src=http://alwakalat.com/approvedCars/wdir/uploads/' . $row["banner_image"];
            }
        else
            {
            $img = '/images/hatchback.png';
            }
        $var = $row['maker_id'] . $row['model_id'] . $row['sub_model_id'];
        if ($var1 == $var)
            {



            if (@$year)
                {
                if ($year > '1')
                    {

                    $year = $difference->y . ' years, '
                            . $difference->m . ' months, '
                            . $difference->d . ' days';

                    //  $year = $year . " Years";
                    }
                else
                    {
                    // $year = $year . " Year";

                    $year = $difference->y . ' years, '
                            . $difference->m . ' months, '
                            . $difference->d . ' days';
                    }
                }
            else
                {
                $curdate = strtotime(date("Y-m-d"));
                $mydate = strtotime($row['warranty_expire_date']);
                if ($curdate > $mydate)
                    {
                    $year = 'Expired';
                    }
                else
                    {
                    $year = 'This Year';
                    }
                }



            $cv = '
		<div class="col-sm-3 fields-right">
		<div class="field-outer-img"> <img src="' . $img . '"></div>
		
		<div class="fields-right-inner">
		
        <h1>' . $get->get_single_field('maker', 'name', 'id', $row['maker_id']) . ' ' . $get->get_single_field('model', 'model_name', 'model_id', $row['model']) . ' ' . $get->get_single_field('sub_model', 'sub_model_name', 'sub_id', $value['sub_model']) . '</h1>
       
        <p><span>Model:</span>' . $model . '</p>            
        <p><span>Sub Model:</span>' . $sub_model . '</p>            
        <p><span>Body Type:</span>' . $bodyType . '</p>  
        <p><span>Exterior color:</span>' . $exterior_color . '</p>
        <p><span>Interior Color:</span>' . $interior_color . '</p>
        <p><span>price:</span>QAR ' . number_format($row['price']) . '</p>
        
     
        <p><span>Warranty:</span>' . $year . '</p>
        <p><span>Acceleration (0-100):</span>' . $row['acceleration'] . ' seconds</p>
       <p><span>Milege:</span>' . $row['milage'] . '</p>
        <p><span>Top Speed:</span>' . $row['top_speed'] . ' km/hr</p>
        <p><span>Engine Size:</span>' . $row['engineSize'] . ' litres</p> 
        
         <p><span>Gear Type:</span>' . $transmission . '</p>
         <p><span>Roof:</span>' . $roof . '</p>
         <p><span>Camera:</span>' . $camara . '</p>
         <p><span>GPS:</span>' . $GPS . '</p>
         <p><span>Accident:</span>' . $accident . '</p>
         <p><span>Year:</span>' . $row['year'] . '</p>
         <p><span>Service package ends:</span>' . $row['service_package'] . '</p>
               <p><span>Warranty:</span>' . $difference->y . ' years, '
                    . $difference->m . ' months, '
                    . $difference->d . ' days' . '</p>
        <p><span>Horsepower:</span>' . $row['h_power'] . ' HP</p>
            
        
        
        </div></div>';
            }
        else if ($var2 == $var)
            {
            $b = '
		<div class="col-sm-3 fields-right">
		<div class="field-outer-img"> <img src="' . $img . '"></div>
		
		<div class="fields-right-inner">
		
        <h1>' . $get->get_single_field('maker', 'name', 'id', $row['maker_id']) . ' ' . $get->get_single_field('model', 'model_name', 'model_id', $row['model']) . ' ' . $get->get_single_field('sub_model', 'sub_model_name', 'sub_id', $value['sub_model']) . '</h1>
        <p><span>Model:</span>' . $model . '</p>            
        <p><span>Sub Model:</span>' . $sub_model . '</p>            
        <p><span>Body Type:</span>' . $bodyType . '</p>  
       <p><span>Exterior color:</span>' . $exterior_color . '</p>
        <p><span>Interior Color:</span>' . $interior_color . '</p>
        <p><span>price:</span>QAR ' . number_format($row['price']) . '</p>
        <p><span>Warranty:</span>' . $year . '</p>
        
        <p><span>Acceleration (0-100):</span>' . $row['acceleration'] . ' seconds</p>
        
       <p><span>Milege:</span>' . $row['milage'] . '</p>
        <p><span>Top Speed:</span>' . $row['top_speed'] . ' km/hr</p>
        <p><span>Engine Size:</span>' . $row['engineSize'] . ' litres</p> 
   <p><span>Gear Type:</span>' . $transmission . '</p>  
       
   <p><span>Roof:</span>' . $roof . '</p>
   <p><span>Camera:</span>' . $camara . '</p>
   <p><span>GPS:</span>' . $GPS . '</p>
    <p><span>Accident:</span>' . $accident . '</p>
     <p><span>Year:</span>' . $row['year'] . '</p>
    <p><span>Service package ends:</span>' . $row['service_package'] . '</p>
        <p><span>Warranty:</span>' . $difference->y . ' years, '
                    . $difference->m . ' months, '
                    . $difference->d . ' days' . '</p>
<p><span>Horsepower:</span>' . $row['h_power'] . ' HP</p>
        
        
        </div></div>';
            }
       else if ($var3 == $var )
            {
            $c = '
		<div class="col-sm-3 fields-right">
		<div class="field-outer-img"> <img src="' . $img . '"></div>
		
		<div class="fields-right-inner">
		
        <h1>' . $get->get_single_field('maker', 'name', 'id', $row['maker_id']) . ' ' . $get->get_single_field('model', 'model_name', 'model_id', $row['model']) . ' ' . $get->get_single_field('sub_model', 'sub_model_name', 'sub_id', $value['sub_model']) . '</h1>
        <p><span>Model:</span>' . $model . '</p>            
        <p><span>Sub Model:</span>' . $sub_model . '</p>            
        <p><span>Body Type:</span>' . $bodyType . '</p>  
       <p><span>Exterior color:</span>' . $exterior_color . '</p>
        <p><span>Interior Color:</span>' . $interior_color . '</p>
        <p><span>price:</span>QAR ' . number_format($row['price']) . '</p>
        <p><span>Warranty:</span>' . $year . '</p>
        
        <p><span>Acceleration (0-100):</span>' . $row['acceleration'] . ' seconds</p>
        
       <p><span>Milege:</span>' . $row['milage'] . '</p>
        <p><span>Top Speed:</span>' . $row['top_speed'] . ' km/hr</p>
        <p><span>Engine Size:</span>' . $row['engineSize'] . ' litres</p> 
   <p><span>Gear Type:</span>' . $transmission . '</p>  
       
   <p><span>Roof:</span>' . $roof . '</p>
   <p><span>Camera:</span>' . $camara . '</p>
   <p><span>GPS:</span>' . $GPS . '</p>
    <p><span>Accident:</span>' . $accident . '</p>
     <p><span>Year:</span>' . $row['year'] . '</p>
    <p><span>Service package ends:</span>' . $row['service_package'] . '</p>
        <p><span>Warranty:</span>' . $difference->y . ' years, '
                    . $difference->m . ' months, '
                    . $difference->d . ' days' . '</p>
<p><span>Horsepower:</span>' . $row['h_power'] . ' HP</p>
        
        
        </div></div>';
            }
        }
    $html.=$cv;
    $html.=$b;
    $html.=$c;
    echo $html;
    }

if (isset($_POST['action']) && $_POST['action'] == "get_car")
    {
    $value = $_POST['val'];
    $maker = $_POST['maker'];
    $price = $_POST['price'];
    if ($value == "All" && $price != "All")
        {
        $query = "SELECT * from `car_data` where maker_id =" . $maker . " and `price`" . $price . "";
        }
    else if ($value != "All" && $price == "All")
        {
        $query = "SELECT * from `car_data` where maker_id =" . $maker . " and bodyType='" . $value . "' ";
        }
    else if ($value != "All" && $price != "All")
        {
        $query = "SELECT * from `car_data` where maker_id =" . $maker . " and bodyType='" . $value . "' and `price`" . $price . "";
        }
    else if ($value == "All" && $price == "All")
        {
        $query = "SELECT * from `car_data` where maker_id =" . $maker . "";
        }
    $run_query = mysql_query($query) or die(mysql_error());
    $num = mysql_num_rows($run_query);
    if ($num > 0)
        {
        while ($car = mysql_fetch_array($run_query))
            {
            $html.= '<div class="search-main-product">
          <div class=""> <a href="car-brands.php?id=' . $car["id"] . '"><img src="' . $car["full_path"] . '" alt="" title=""></a> </div>
          <div class="search-product-text">
            <h2><a href="car-brands.php?id=' . $car["id"] . '">' . $get->get_single_field("model", "model_name", "model_id", $car["model"]) . ' ' . $get->get_single_field("sub_model", "sub_model_name", "sub_id", $car["sub_model"]) . '  ' . $car["bodyType"] . '</a></h2>
          </div>
	  </div>';
            }
        }
    else
        {

        echo"Sorry,No record Found!";
        }
    echo $html;
    }

if (isset($_POST['action']) && $_POST['action'] == "find_car")
    {
    $model_sel = $_POST['model_sel'];
    $sub_model = $_POST['sub_model'];
    $maker = $_POST['maker'];
    $price = $_POST['price'];
    $bodyType = $_POST['bodyType'];

    $query = "SELECT * from `car_data` where maker_id =" . $maker . " and bodyType='" . $bodyType . "' and `price`" . $price . "";

    $run_query = mysql_query($query) or die(mysql_error());
    $num = mysql_num_rows($run_query);
    if ($num > 0)
        {
        $car = mysql_fetch_array($run_query);
        echo $car['id'];
        }
    else
        {

        echo"false";
        }
    }










/*
  if(isset($_POST['action']) && $_POST['action']=="find_car_form"){
  $result	=	$get->get_all_data_active("car_data","id","ASC","maker_id",$maker_id);
  echo '<option value="" selected="selected">--Select BodyType--</option>';
  foreach($result as $value){

  echo '<option value="'.$value['bodyType'].'">'.$value['bodyType'].'</option>';
  }
  } */
?>