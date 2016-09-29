<?php

include 'inc/database.php';
//print_r($_POST);
//die();
if (isset($_POST['action']) && $_POST['action'] == 'Login') {
    $obj->Admin_signin();
}
if (isset($_POST['action']) && $_POST['action'] == 'Insert_category') {
    $obj->insert_category();
}
if (isset($_POST['action']) && $_POST['action'] == 'add_car_event') {
    $obj->add_car_event();
}
if (isset($_POST['action']) && $_POST['action'] == 'edit_country') {
    $obj->edit_country();
}
if (isset($_POST['action']) && $_POST['action'] == 'add_review') {
//    die("SAD");
    $obj->add_review();
}
if (isset($_POST['action']) && $_POST['action'] == 'edit_review') {
    $obj->edit_review();
}
if (isset($_POST['action']) && $_POST['action'] == 'edit_event') {
    $obj->edit_car_event();
}
if (isset($_POST['action']) && $_POST['action'] == 'Edit_category') {
    $obj->edit_category();
}if (isset($_POST['action']) && $_POST['action'] == 'add_event_slide') {
    $obj->add_event_slide();
}
if (isset($_POST['action']) && $_POST['action'] == 'add_product') {
    $obj->add_product();
}
if (isset($_POST['action']) && $_POST['action'] == 'add_promotion_slide') {
   
   //echo "<pre>";
   //print_r($_POST);
   //echo "</pre>";
//die('stop');    
    $obj->add_promotion_slide();
}

if (isset($_POST['action']) && $_POST['action'] == 'edit_product') {
    $obj->edit_product();
}
if (isset($_POST['action']) && $_POST['action'] == 'Add_slider') {
    $obj->add_slider();
}
if (isset($_POST['action']) && $_POST['action'] == 'Edit_slider') {
    $obj->edit_slider();
}
if (isset($_POST['action']) && $_POST['action'] == 'add_image') {
    $obj->add_image();
}
if (isset($_POST['action']) && $_POST['action'] == 'edit_image') {
    $obj->edit_image();
}
if (isset($_POST['action']) && $_POST['action'] == 'add_client') {
    $obj->add_client();
}
if (isset($_POST['action']) && $_POST['action'] == 'edit_client') {
    $obj->edit_client();
}
if (isset($_POST['action']) && $_POST['action'] == 'add_provider') {
    $obj->add_provider();
}
if (isset($_POST['action']) && $_POST['action'] == 'edit_provider') {
    $obj->edit_provider();
}

if (isset($_POST['action']) && $_POST['action'] == 'add_search') {
    $obj->add_search();
}
if (isset($_POST['action']) && $_POST['action'] == 'edit_search') {
    $obj->edit_search();
}
if (isset($_POST['action']) && $_POST['action'] == 'add_link') {
    $obj->add_link();
}
if (isset($_POST['action']) && $_POST['action'] == 'add_video_link') {
    $obj->add_video_link();
}

if (isset($_POST['action']) && $_POST['action'] == 'edit_link') {
    $obj->edit_link();
}

if (isset($_POST['action']) && $_POST['action'] == 'edit_logo') {
    $obj->edit_logo();
}
if (isset($_POST['action']) && $_POST['action'] == 'edit_footer') {
    $obj->edit_footer();
}
if (isset($_POST['action']) && $_POST['action'] == 'about_page') {
    $obj->about_page();
}
if (isset($_POST['action']) && $_POST['action'] == 'add_slide') {
    $obj->add_slide();
}

if (isset($_POST['action']) && $_POST['action'] == 'edit_slide') {
    $obj->edit_slide();
}
if (isset($_POST['action']) && $_POST['action'] == 'add_question') {
    $obj->add_question();
}
if (isset($_POST['action']) && $_POST['action'] == 'edit_question') {
    $obj->edit_question();
}
if (isset($_POST['action']) && $_POST['action'] == 'edit_details') {
    $obj->edit_details();
}
if (isset($_POST['action']) && $_POST['action'] == 'add_maker') {
    $obj->add_maker();
}
if (isset($_POST['action']) && $_POST['action'] == 'edit_maker') {
    $obj->edit_maker();
}
if (isset($_POST['action']) && $_POST['action'] == 'add_car') {
    $obj->add_car();
}
if (isset($_POST['action']) && $_POST['action'] == 'edit_car') {
    
    $obj->edit_car();
}

if (isset($_POST['action']) && $_POST['action'] == 'add_banks') {
    $obj->add_banks();
}
if (isset($_POST['action']) && $_POST['action'] == 'edit_banks') {
    $obj->edit_banks();
}
if (isset($_POST['action']) && $_POST['action'] == 'add_model') {
    $obj->add_model();
}

if (isset($_POST['action']) && $_POST['action'] == 'edit_model') {
    $obj->edit_model();
}
if (isset($_POST['action']) && $_POST['action'] == 'add_sub_model') {
    $obj->add_sub_model();
}
if (isset($_POST['action']) && $_POST['action'] == 'edit_sub_model') {
    $obj->edit_sub_model();
}
if (isset($_POST['action']) && $_POST['action'] == 'service_provider_gallery') {
    $image_name = $_FILES['gallery_image']['name'];
	
    $provider = $_POST['service_provider'];
    $allowed_filetypes = array('JPG', 'jpg', 'gif', 'bmp', 'png');
    $path_parts = pathinfo($image_name);
    $ext = $path_parts['extension'];
    $image_path = '../images/gallery/';
    $full_path = 'images/gallery/' . $image_name;
    $thumb_path = 'images/gallery/thumb/' . $image_name;
	
    if (!in_array($ext, $allowed_filetypes)) {
        $_SESSION['success'] = 'Invalid Image. Please upload (jpg,gif,png,bmp) only';
        header('location:manage_provider_gallery.php');
    }
    move_uploaded_file($_FILES["gallery_image"]["tmp_name"], $image_path . $image_name);
    $insert = "INSERT INTO provider_gallery (`provider_id`, `image_name`, `full_path`, `thumb` ) VALUES('" . $provider . "', '" . $image_name . "', '" . $full_path . "', '" . $thumb_path . "')";
    $query = $obj->Executequery($insert);
    
    if ($query) {
        $_SESSION['success'] = 'Successfully Uploaded';
		
        $obj->locate('manage_provider_gallery.php');
    }
}
if (isset($_POST['action']) && $_POST['action'] == 'service_provider_icons') {
    $address=$_POST['address'];
    $image_name = $_FILES['name']['name'];
	
    $provider = $_POST['service_provider'];
    $allowed_filetypes = array('JPG', 'jpg', 'gif', 'bmp', 'png');
    $path_parts = pathinfo($image_name);
    $ext = $path_parts['extension'];
    $image_path = '../images/gallery/';
    $full_path = 'images/gallery/' . $image_name;
    $thumb_path = 'images/gallery/thumb/' . $image_name;
	
    if (!in_array($ext, $allowed_filetypes)) {
        $_SESSION['success'] = 'Invalid Image. Please upload (jpg,gif,png,bmp) only';
        header('location:provider_social_icon.php');
    }
    move_uploaded_file($_FILES["name"]["tmp_name"], $image_path . $image_name);
    $insert = "INSERT INTO provider_social_icon (`provider_id`, `name`,`address`, `full_path`, `thumb` ) VALUES('" . $provider . "', '" . $image_name . "','" . $address . "', '" . $full_path . "', '" . $thumb_path . "')";
    $query = $obj->Executequery($insert);
    
    if ($query) {
        $_SESSION['success'] = 'Successfully Uploaded';
		
        $obj->locate('provider_social_icon.php');
    }
}

/*-----------Code for Add Shop Category-------------------*/
if (isset($_POST['action']) && $_POST['action'] == 'add_shop_category') {
    $cat_name=$_POST['cat_name'];
    
    $insert = "INSERT INTO category ( `cat_name` ) VALUES( '" . $cat_name . "')";
    $query = $obj->Executequery($insert);
    
    if ($query) {
        $_SESSION['success'] = 'Successfully Inser Record';
		
        $obj->locate('manage_shop_category.php');
    }
}
/*-----------End OF Manage Shop Category---------------------*/
/*-----------Code for Add Product Details-------------------*/
if (isset($_POST['action']) && $_POST['action'] == 'add_product_details') {
    $p_id=$_POST['p_id'];
    $price=$_POST['price'];
    $color=$_POST['color'];
    $size=$_POST['size'];
	$product_sku = $_POST['product_sku'];
	
	
    $insert = "INSERT INTO product_details ( `p_id`,`price`,`color`,`size`,`product_sku` ) VALUES( '" . $p_id . "','" . $price . "','" . $color . "','" . $size . "','".$product_sku."')";
    $query = $obj->Executequery($insert);
   
    if ($query) {
        $_SESSION['success'] = 'Successfully Insert Record';
		
        $obj->locate('manage_product.php');
    }
}
/*-----------End OF Product Details---------------------*/

/*----------Add Shop Product--------------------------------*/
if (isset($_POST['action']) && $_POST['action'] == 'shop_product') {
    $c_id=$_POST['c_id'];
    $product_name=$_POST['product_name'];
    $image_name = $_FILES['product_image']['name'];
	
  //  $provider = $_POST['service_provider'];
    $allowed_filetypes = array('JPG', 'jpg', 'gif', 'bmp', 'png');
    $path_parts = pathinfo($image_name);
    $ext = $path_parts['extension'];
    $image_path = '../images/gallery/';
    $full_path = 'images/gallery/' . $image_name;
    $thumb_path = 'images/gallery/thumb/' . $image_name;
	
    if (!in_array($ext, $allowed_filetypes)) {
        $_SESSION['success'] = 'Invalid Image. Please upload (jpg,gif,png,bmp) only';
        header('location:shop_product.php');
    }
    move_uploaded_file($_FILES["product_image"]["tmp_name"], $image_path . $image_name);
    $insert = "INSERT INTO product ( `c_id`,`product_name`,`product_image`, `full_path`, `thumb` ) VALUES( '" . $c_id . "','" . $product_name . "','" . $image_name . "', '" . $full_path . "', '" . $thumb_path . "' )";
    $query = $obj->Executequery($insert);
    
    if ($query) {
        $_SESSION['success'] = 'Successfully Uploaded';
		
        $obj->locate('shop_product.php');
    }
}
/*----------End Of Shop Product-----------------------------*/
?>