
<?php

class model
    {

    function escape_string($value)
        {
        return trim(mysql_real_escape_String(stripslashes($value)));
        }

    function setdate($date)
        {
        return date('m-d-y', strtotime($date));
        }

    function Executequery($query)
        {
        $result = mysql_query($query) or die(mysql_error());
        return $result;
        }

    function locate($url)
        {
        header('location:' . $url . '');
        exit;
        }

    function Admin_signin()
        {
        $admin_username = $this->escape_string($_POST['admin_username']);
        $admin_password = $this->escape_string($_POST['admin_password']);
        $select = "select * from admin where `name`='" . $admin_username . "' AND `password`='" . md5($admin_password) . "'";
        $query = $this->Executequery($select);
        $rows = mysql_num_rows($query);
        if ($rows > 0)
            {
            $_SESSION['admin'] = mysql_fetch_assoc($query);
            $this->locate('index.php');
            }
        else
            {
            $_SESSION['invalid'] = "Invalid Credential";
            $this->locate('login.php');
            }
        }

    function admin_not_login()
        {
        if (!isset($_SESSION['admin']['name']))
            {
            $this->locate('login.php');
            }
        }

    function admin_login()
        {
        if (isset($_SESSION['admin']['name']))
            {
            $this->locate('index.php');
            }
        }

    function logout()
        {
        unset($_SESSION['admin']);
        $this->locate('login.php');
        }

    function get_all_data($table, $field, $sorting)
        {
        $select = "select * from $table order by `$field` $sorting ";
        $query = $this->Executequery($select);
        $rows = mysql_num_rows($query);
        if ($rows > 0)
            {
            while ($results = mysql_fetch_Assoc($query))
                {
                $abc[] = $results;
                }
            return $abc;
            }
        }

    function get_all_data_active($table, $field, $sorting, $active, $value)
        {
        $select = "select * from $table where $active='" . $value . "' order by $field $sorting ";
        $query = $this->Executequery($select);
        $rows = mysql_num_rows($query);
        if ($rows > 0)
            {
            while ($results = mysql_fetch_Assoc($query))
                {
                $abc[] = $results;
                }
            return $abc;
            }
        }

    function get_single_field($table, $field, $fieldvalue, $id)
        {
        $select = "select `$field` from `$table` where $fieldvalue='" . $id . "'";
        $query = $this->Executequery($select);
        $result = mysql_fetch_Assoc($query);
        return $result[$field];
        }

    function get_field_dual_field_check($table, $field, $field1, $value1, $field2, $value2)
        {
        $select = "select $field from $table where $field1='" . $value1 . "' and $field2='" . $value2 . "'";
        $query = $this->Executequery($select);
        $result = mysql_fetch_Assoc($query);
        return $result[$field];
        }

    function get_data_dual_field_check($table, $field1, $value1, $field2, $value2)
        {
        $select = "select * from $table where $field1='" . $value1 . "' and $field2='" . $value2 . "'";
        $query = $this->Executequery($select);
        $rows = mysql_num_rows($query);
        if ($rows > 0)
            {
            while ($results = mysql_fetch_Assoc($query))
                {
                $abc[] = $results;
                }
            return $abc;
            }
        }

    function get_single_result($table, $field, $id)
        {
        $select = "select * from $table where $field='" . $id . "'";
        $query = $this->Executequery($select);
        $result = mysql_fetch_Assoc($query);
        return $result;
        }

    function delete_data($table, $field, $id, $page)
        {
        $delete = "delete from $table where $field='" . $id . "'";
        $query = $this->Executequery($delete);
        if ($query)
            {
            $this->locate('' . $page . '');
            }
        }

    function add_slider()
        {
        $slider_name = $this->escape_string($_FILES['slider']['name']);
        $h1 = $this->escape_string($_POST['h1']);
        $h1_arab = $this->escape_string($_POST['h1_arab']);
        $h2_arab = $this->escape_string($_POST['h2_arab']);
        $h2 = $this->escape_string($_POST['h2']);
        $allowed_filetypes = array('jpg', 'gif', 'bmp', 'png');
        $path_parts = pathinfo($slider_name);
        $ext = $path_parts['extension'];
        $slider_path = '../slider/';
        $full_path = 'slider/' . $slider_name;
        $thumb_path = 'slider/thumb/' . $slider_name;
        $slider_active = $this->escape_string($_POST['slider_active']);
        if (!in_array($ext, $allowed_filetypes))
            {
            $_SESSION['success'] = 'Invalid Image. Please upload (jpg,gif,png,bmp) only';
            $this->locate('add_slider.php');
            }
        move_uploaded_file($_FILES["slider"]["tmp_name"], $slider_path . $slider_name);
        $this->make_thumb('../' . $full_path, '../' . $thumb_path, 150, $ext);
        $insert = "INSERT INTO slider SET `slider_image_name`='" . $slider_name . "',`slider_thumb_path`='" . $thumb_path . "',`slider_full_path`='" . $full_path . "',`slider_active`='" . $slider_active . "',`h1`='" . $h1 . "',`h2`='" . $h2 . "',`h1_arab`='" . $h1_arab . "',`h2_arab`='" . $h2_arab . "'";

        $query = $this->Executequery($insert);
        if ($query)
            {
            $_SESSION['success'] = 'Successfully Uploaded';
            $this->locate('slider.php');
            }
        }

    function add_slide()
        {
        $car_id = $this->escape_string($_POST['car_id']);
        $slider_name = $this->escape_string($_FILES['slider']['name']);
        $allowed_filetypes = array('jpg', 'gif', 'bmp', 'png');
        $path_parts = pathinfo($slider_name);
        $ext = $path_parts['extension'];
        $slider_path = '../slider/';
        $full_path = 'slider/' . $slider_name;
        $thumb_path = 'slider/thumb/' . $slider_name;
        if (!in_array($ext, $allowed_filetypes))
            {
            $_SESSION['success'] = 'Invalid Image. Please upload (jpg,gif,png,bmp) only';
            $this->locate('add_slide.php');
            }
        move_uploaded_file($_FILES["slider"]["tmp_name"], $slider_path . $slider_name);
        $this->make_thumb('../' . $full_path, '../' . $thumb_path, 150, $ext);
        $insert = "INSERT INTO car_slider SET `image_name`='" . $slider_name . "',`thumb_path`='" . $thumb_path . "',`full_path`='" . $full_path . "',`car_id`='" . $car_id . "'";

        $query = $this->Executequery($insert);
        if ($query)
            {
            $_SESSION['success'] = 'Successfully Uploaded';
            $this->locate('other_slider.php?id=' . $car_id . '');
            }
        }

    /* -----------Function for add promotin slider--------- */

    function add_promotion_slide()
        {

        $slider_name = $this->escape_string($_FILES['sliderp']['name']);
        //print_r($slider_name)   ;die('hjfjkhfkjhsfkj');
        $allowed_filetypes = array('jpg', 'gif', 'bmp', 'png');
        $path_parts = pathinfo($slider_name);
        $ext = $path_parts['extension'];
        $slider_path = '../slider/';
        $full_path = 'slider/' . $slider_name;
        $thumb_path = 'slider/thumb/' . $slider_name;
        if (!in_array($ext, $allowed_filetypes))
            {
            $_SESSION['success'] = 'Invalid Image. Please upload (jpg,gif,png,bmp) only';
            $this->locate('add_promotion_slider.php');
            }
        move_uploaded_file($_FILES["sliderp"]["tmp_name"], $slider_path . $slider_name);
        $this->car_make_thumb('../' . $full_path, '../' . $thumb_path, 200, $ext);
        $insert = "INSERT INTO promotion_slider SET `image_name`='" . $slider_name . "',`thumb_path`='" . $thumb_path . "',`full_path`='" . $full_path . "'";

        $query = $this->Executequery($insert);
        if ($query)
            {
            $_SESSION['success'] = 'Successfully Uploaded';
            $this->locate('promotion_slider.php');
            }
        }

    /* -----------End of Promotion Slider------------------ */

    function add_image()
        {
        $slider_name = $this->escape_string($_FILES['slider']['name']);
        $text = $this->escape_string($_POST['text']);
        $text_arabic = $this->escape_string($_POST['text_arabic']);
        $link = $this->escape_string($_POST['link']);
        $allowed_filetypes = array('jpg', 'gif', 'bmp', 'png');
        $path_parts = pathinfo($slider_name);
        $ext = $path_parts['extension'];
        $slider_path = '../slider/';
        $full_path = 'slider/' . $slider_name;
        $thumb_path = 'slider/thumb/' . $slider_name;
        $slider_active = $this->escape_string($_POST['slider_active']);
        if (!in_array($ext, $allowed_filetypes))
            {
            $_SESSION['success'] = 'Invalid Image. Please upload (jpg,gif,png,bmp) only';
            $this->locate('add_slider.php');
            }
        move_uploaded_file($_FILES["slider"]["tmp_name"], $slider_path . $slider_name);
        $this->make_thumb('../' . $full_path, '../' . $thumb_path, 150, $ext);
        $insert = "INSERT INTO home_content_image SET `image_name`='" . $slider_name . "',`thumb`='" . $thumb_path . "',`full_path`='" . $full_path . "',`show`='" . $slider_active . "',`text`='" . $text . "',`text_arabic`='" . $text_arabic . "',`link`='" . $link . "'";

        $query = $this->Executequery($insert);
        if ($query)
            {
            $_SESSION['success'] = 'Successfully Uploaded';
            $this->locate('content.php');
            }
        }

    function edit_review()
        {
//        print_r($_POST);
//        exit();
        $title = $this->escape_string($_POST['title']);
        $sub_title = $this->escape_string($_POST['sub_title']);
        $sub_title_ar = $this->escape_string($_POST['sub_title_ar']);
        $description = $this->escape_string($_POST['description']);
        $description_ar = $this->escape_string($_POST['description_ar']);
        $description2 = $this->escape_string($_POST['description2']);
        $description2_ar = $this->escape_string($_POST['description2_ar']);
        $video = $this->escape_string($_POST['video']);
        $photo_by = $this->escape_string($_POST['photo_by']);
        $photo_by_ar = $this->escape_string($_POST['photo_by_ar']);
        $review_id = $this->escape_string($_POST['review_id']);

        $update = "UPDATE `reviews` set  sub_title = '" . $sub_title . "', sub_title_ar = '" . $sub_title_ar . "', description = '" . $description . "', description_ar = '" . $description_ar . "', description2 = '" . $description2 . "', description2_ar = '" . $description2_ar . "', video = '" . $video . "', photo_by = '" . $photo_by . "', photo_by_ar = '" . $photo_by_ar . "' where id = '" . $review_id . "'";

        $query = $this->Executequery($update);
        if ($query)
            {
            $_SESSION['success'] = 'Data Added Successfully!';
            $this->locate('manage_review.php');
            }
        }

    function add_review()
        {
        $sub_title = $this->escape_string($_POST['sub_title']);
        $sub_title_ar = $this->escape_string($_POST['sub_title_ar']);
        $description = $this->escape_string($_POST['description']);
        $description_ar = $this->escape_string($_POST['description_ar']);
        $description = $this->escape_string($_POST['description2']);
        $description2_ar = $this->escape_string($_POST['description2_ar']);
        $video = $this->escape_string($_POST['video']);
        $cat_id = $this->escape_string($_POST['cat_id']);
        $photo_by = $this->escape_string($_POST['photo_by']);
        $photo_by_ar = $this->escape_string($_POST['photo_by_ar']);
        $insert = "INSERT INTO  reviews SET 
					`sub_title` = '" . $sub_title . "',
					`sub_title_ar` = '" . $sub_title_ar . "',
					`description` = '" . $description . "', 	
					`description_ar` = '" . $description_ar . "', 	
					`description2` = '" . $description2 . "', 	
					`description2_ar` = '" . $description2_ar . "', 	
					`video` = '" . $video . "',
                                        `cat_id` = '" . $cat_id . "',
					`photo_by` = '" . $photo_by . "',
					`photo_by_ar` = '" . $photo_by_ar . "'";
//        print_r($insert);
//        die();
//        
        $query = $this->Executequery($insert);
        if ($query)
            {
            $_SESSION['success'] = 'Successfully Inserted';
            $this->locate('manage_review.php');
            }
        }

    function add_car_event()
        {
        $slider_name = $this->escape_string($_FILES['slider']['name']);
        $event_title = $this->escape_string($_POST['event_title']);
        $ar_title = $this->escape_string($_POST['ar_title']);
        $event_location = $this->escape_string($_POST['event_location']);
        $ar_location = $this->escape_string($_POST['ar_location']);
        $event_desc = $this->escape_string($_POST['event_desc']);
        $ar_desc = $this->escape_string($_POST['ar_desc']);
        $test_drive = $this->escape_string($_POST['test_drive']);
        $ar_drive = $this->escape_string($_POST['ar_drive']);
        $start_date = $this->escape_string($_POST['start_date']);
        $close_date = $this->escape_string($_POST['close_date']);
        $allowed_filetypes = array('jpg', 'gif', 'bmp', 'png');
        $path_parts = pathinfo($slider_name);
        $ext = $path_parts['extension'];
        $slider_path = '../slider/';
        $full_path = 'slider/' . $slider_name;
        $thumb_path = 'slider/thumb/' . $slider_name;
        $slider_active = $this->escape_string($_POST['slider_active']);
        if (!in_array($ext, $allowed_filetypes))
            {
            $_SESSION['success'] = 'Invalid Image. Please upload (jpg,gif,png,bmp) only';
            $this->locate('add_slider.php');
            }
        $date = date('Y-m-d');
        move_uploaded_file($_FILES["slider"]["tmp_name"], $slider_path . $slider_name);
        $this->make_thumb('../' . $full_path, '../' . $thumb_path, 150, $ext);
        $insert = "INSERT INTO events SET
`image` = '" . $slider_name . "',
 `event_title` = '" . $event_title . "',
 `title_arabic` = '" . $ar_title . "',
 `event_location` = '" . $event_location . "',
 `location_arabic` = '" . $ar_location . "',
 `event_description` = '" . $event_desc . "',
 `desc_arabic` = '" . $ar_desc . "',
 `test_drive` = '" . $test_drive . "',
 `drive_arabic` = '" . $ar_drive . "',
 `event_start_date` = '" . $start_date . "',
 `event_end_date` = '" . $close_date . "',
 `thumb` = '" . $thumb_path . "',
 `full_path` = '" . $full_path . "',
 `status` = 'active',
 `create_date` = '" . $date . "'";
        $query = $this->Executequery($insert);
        if ($query)
            {
            $_SESSION['success'] = 'Successfully Inserted';
            $this->locate('manage_events.php');
            }
        }

    function edit_car_event()
        {
        $slider_name = $this->escape_string($_FILES['slider']['name']);
        $event_title = $this->escape_string($_POST['event_title']);
        $ar_title = $this->escape_string($_POST['ar_title']);
        $event_location = $this->escape_string($_POST['event_location']);
        $ar_location = $this->escape_string($_POST['ar_location']);
        $event_desc = $this->escape_string($_POST['event_desc']);
        $ar_desc = $this->escape_string($_POST['ar_desc']);
        $test_drive = $this->escape_string($_POST['test_drive']);
        $ar_drive = $this->escape_string($_POST['ar_drive']);
        $start_date = $this->escape_string($_POST['start_date']);
        $close_date = $this->escape_string($_POST['close_date']);
        $event_id = $this->escape_string($_POST['event_id']);
        if (!empty($slider_name))
            {
            //echo $slider_name;
            //exit;
            $allowed_filetypes = array('jpg', 'gif', 'bmp', 'png');
            $path_parts = pathinfo($slider_name);
            $ext = $path_parts['extension'];
            $slider_path = '../slider/';
            $full_path = 'slider/' . $slider_name;
            $thumb_path = 'slider/thumb/' . $slider_name;
            $slider_active = $this->escape_string($_POST['slider_active']);
            if (!in_array($ext, $allowed_filetypes))
                {
                $_SESSION['success'] = 'Invalid Image. Please upload (jpg,gif,png,bmp) only';
                $this->locate('add_slider.php');
                }
            $date = date('Y-m-d');
            move_uploaded_file($_FILES["slider"]["tmp_name"], $slider_path . $slider_name);
            $this->make_thumb('../' . $full_path, '../' . $thumb_path, 150, $ext);

            $update = "UPDATE `events` set image = '" . $slider_name . "', thumb = '" . $thumb_path . "', full_path = '" . $full_path . "', event_title = '" . $event_title . "', title_arabic = '" . $ar_title . "', event_location = '" . $event_location . "', location_arabic = '" . $ar_location . "', event_description = '" . $event_desc . "', desc_arabic = '" . $ar_desc . "', test_drive = '" . $test_drive . "', drive_arabic = '" . $ar_drive . "' where id = '" . $event_id . "'";
            }
        else
            {
            $update = "UPDATE `events` set event_title = '" . $event_title . "', title_arabic = '" . $ar_title . "', event_location = '" . $event_location . "', location_arabic = '" . $ar_location . "', event_description = '" . $event_desc . "', desc_arabic = '" . $ar_desc . "', test_drive = '" . $test_drive . "', drive_arabic = '" . $ar_drive . "' where id = '" . $event_id . "'";
            }
        $query = $this->Executequery($update);
        if ($query)
            {
            $_SESSION['success'] = 'Data Added Successfully!';
            $this->locate('manage_events.php');
            }
        }

    /* ----------function for edit country name------------------ */

    function edit_order()
        {
        foreach ($_POST['set'] as $key => $value)
            {
            $order = $this->escape_string($_POST['order']);
            $update = "UPDATE `searches` set `order` = '" . $key . "'  where id = '" . $value . "'";
            $query = $this->Executequery($update);
            }
        }

    function edit_country()
        {

        $name = $this->escape_string($_POST['name']);

        $id = $this->escape_string($_POST['id']);
        $update = "UPDATE `country` set name = '" . $name . "'  where id = '" . $id . "'";

        $query = $this->Executequery($update);
        if ($query)
            {
            $_SESSION['success'] = 'Data Added Successfully!';
            $this->locate('manage_country.php');
            }
        }

    /* ------------End of country name update function----------- */

    function add_event_slide()
        {
        $event_id = $_POST['event_id'];

        $slider_name = $this->escape_string($_FILES['slider']['name']);
        $allowed_filetypes = array('jpg', 'gif', 'bmp', 'png');
        $path_parts = pathinfo($slider_name);
        $ext = $path_parts['extension'];
        $slider_path = '../slider/';
        $full_path = 'slider/' . $slider_name;
        $thumb_path = 'slider/thumb/' . $slider_name;
        $slider_active = $this->escape_string($_POST['slider_active']);
        if (!in_array($ext, $allowed_filetypes))
            {
            $_SESSION['success'] = 'Invalid Image. Please upload (jpg,gif,png,bmp) only';
            $this->locate('add_event_slide.php');
            }
        move_uploaded_file($_FILES["slider"]["tmp_name"], $slider_path . $slider_name);
        $this->make_thumb('../' . $full_path, '../' . $thumb_path, 150, $ext);
        $insert = "INSERT INTO event_images SET `event_id` = '" . $event_id . "', `image_name` = '" . $slider_name . "', `thumb_path` = '" . $thumb_path . "', `full_path` = '" . $full_path . "', `status` = 'active'";

        $query = $this->Executequery($insert);
        if ($query)
            {
            $_SESSION['success'] = 'Successfully Uploaded';
            $this->locate('event_images.php?id=' . $event_id . '');
            }
        }

    function add_client()
        {
        $slider_name = $this->escape_string($_FILES['slider']['name']);
        $text = $this->escape_string($_POST['text']);
        $s_title = $this->escape_string($_POST['s_title']);
        $s_name_2 = $this->escape_string($_POST['name_service_2']);
        $s_title_2 = $this->escape_string($_POST['s_title_2']);
        $s_mobile_2 = $this->escape_string($_POST['mobile_service_2']);
        $s_email_2 = $this->escape_string($_POST['email_service_2']);
        $s_address1_2 = $this->escape_string($_POST['line1_service_2']);
        $s_address2_2 = $this->escape_string($_POST['line2_service_2']);
        $s_address3_2 = $this->escape_string($_POST['line3_service_2']);
        $sr_title_2 = $this->escape_string($_POST['sr_title_2']);
        $sr_name_2 = $this->escape_string($_POST['name_showroom_2']);
        $sr_mobile_2 = $this->escape_string($_POST['mobile_showroom_2']);
        $sr_email_2 = $this->escape_string($_POST['email_showroom_2']);
        $sr_address1_2 = $this->escape_string($_POST['line1_showroom_2']);
        $sr_address2_2 = $this->escape_string($_POST['line2_showroom_2']);
        $sr_address3_2 = $this->escape_string($_POST['line3_showroom_2']);
        $sr_title = $this->escape_string($_POST['sr_title']);
        $website = $this->escape_string($_POST['website']);
        $s_name = $this->escape_string($_POST['name_service']);
        $s_mobile = $this->escape_string($_POST['mobile_service']);
        $s_email = $this->escape_string($_POST['email_service']);
        $s_address1 = $this->escape_string($_POST['line1_service']);
        $s_address2 = $this->escape_string($_POST['line2_service']);
        $s_address3 = $this->escape_string($_POST['line3_service']);
        $s_map_2 = $this->escape_string($_POST['iframe_service_2']);
        $s_map = $this->escape_string($_POST['iframe_service']);

        $sr_name = $this->escape_string($_POST['name_showroom']);
        $sr_mobile = $this->escape_string($_POST['mobile_showroom']);
        $sr_email = $this->escape_string($_POST['email_showroom']);
        $sr_address1 = $this->escape_string($_POST['line1_showroom']);
        $sr_address2 = $this->escape_string($_POST['line2_showroom']);
        $sr_address3 = $this->escape_string($_POST['line3_showroom']);
        $sr_map = $this->escape_string($_POST['iframe_showroom']);
        $sr_map_2 = $this->escape_string($_POST['iframe_showroom_2']);

        $allowed_filetypes = array('jpg', 'gif', 'bmp', 'png');
        $path_parts = pathinfo($slider_name);
        $ext = $path_parts['extension'];
        $slider_path = '../slider/';
        $full_path = 'slider/' . $slider_name;
        $thumb_path = 'slider/thumb/' . $slider_name;
        $slider_active = $this->escape_string($_POST['slider_active']);
        if (!in_array($ext, $allowed_filetypes))
            {
            $_SESSION['success'] = 'Invalid Image. Please upload (jpg,gif,png,bmp) only';
            $this->locate('add_slider.php');
            }
        move_uploaded_file($_FILES["slider"]["tmp_name"], $slider_path . $slider_name);
        $this->make_thumb('../' . $full_path, '../' . $thumb_path, 150, $ext);
        $insert = "INSERT INTO clients SET
`client_image` = '" . $slider_name . "',
 `thumb` = '" . $thumb_path . "',
 `full_path` = '" . $full_path . "',
 `show` = '" . $slider_active . "',
 `client_name` = '" . $text . "',
 `website` = '" . $website . "',
 `s_name` = '" . $s_name . "',
 `s_mob` = '" . $s_mobile . "',
 `s_email` = '" . $s_email . "',
 `s_address1` = '" . $s_address1 . "',
 `s_address2` = '" . $s_address2 . "',
 `s_address3` = '" . $s_address3 . "',
 `s_map` = '" . $s_map . "',
 `s_map_2` = '" . $s_map_2 . "',
 `sr_name` = '" . $sr_name . "',
 `sr_mob` = '" . $sr_mobile . "',
 `sr_email` = '" . $sr_email . "',
 `sr_address1` = '" . $sr_address1 . "',
 `sr_address2` = '" . $sr_address2 . "',
 `sr_address3` = '" . $sr_address3 . "',
      `s_name_2` = '" . $s_name_2 . "',
  `s_title` = '" . $s_title . "',
  `s_title_2` = '" . $s_title_2 . "',
  `sr_title` = '" . $sr_title . "',
  `sr_title_2` = '" . $sr_title_2 . "',
 `s_mob_2` = '" . $s_mobile_2 . "',
 `s_email_2` = '" . $s_email_2 . "',
 `s_address1_2` = '" . $s_address1_2 . "',
 `s_address2_2` = '" . $s_address2_2 . "',
 `s_address3_2` = '" . $s_address3_2 . "',
 `sr_name_2` = '" . $sr_name_2 . "',
 `sr_mob_2` = '" . $sr_mobile_2 . "',
 `sr_email_2` = '" . $sr_email_2 . "',
 `sr_address1_2` = '" . $sr_address1_2 . "',
 `sr_address2_2` = '" . $sr_address2_2 . "',
 `sr_address3_2` = '" . $sr_address3_2 . "',
 `sr_map_2` = '" . $sr_map_2 . "',
 `sr_map` = '" . $sr_map . "'";

        $query = $this->Executequery($insert);
        if ($query)
            {
            $_SESSION['success'] = 'Successfully Uploaded';
            $this->locate('clients.php');
            }
        }

    function add_search()
        {
        $select = "select MAX(`order`) AS heighest from searches where  1 ";
        $query1 = $this->Executequery($select);
        $rows = mysql_num_rows($query1);
        if ($rows > 0)
            {
            while ($results1 = mysql_fetch_Assoc($query1))
                {
                $order = 1 + $results1['heighest'];
                }
            }
        else
            {
            $order = 1;
            }


        $slider_name = $this->escape_string($_FILES['slider']['name']);
        $text = $this->escape_string($_POST['text']);
        $maker = $this->escape_string($_POST['maker']);
        $allowed_filetypes = array('jpg', 'gif', 'bmp', 'png');
        $path_parts = pathinfo($slider_name);
        $ext = $path_parts['extension'];
        $slider_path = '../slider/';
        $full_path = 'slider/' . $slider_name;
        $thumb_path = 'slider/thumb/' . $slider_name;
//        $slider_active = $this->escape_string($_POST['slider_active']);
        $slider_active = 'yes';
        if (!in_array($ext, $allowed_filetypes))
            {
            $_SESSION['success'] = 'Invalid Image. Please upload (jpg,gif,png,bmp) only';
            $this->locate('add_search.php');
            }
        move_uploaded_file($_FILES["slider"]["tmp_name"], $slider_path . $slider_name);
        $this->make_thumb('../' . $full_path, '../' . $thumb_path, 150, $ext);
        $insert = "INSERT INTO searches SET `search_image` = '" . $slider_name . "', `thumb` = '" . $thumb_path . "', `full_path` = '" . $full_path . "', `order` = '" . $order . "', `show` = '" . $slider_active . "', `maker_id` = '" . $maker . "', `search_name` = '" . $text . "'";

        $query = $this->Executequery($insert);
        if ($query)
            {
            $_SESSION['success'] = 'Successfully Uploaded';
            $this->locate('searches.php');
            }
        }

    function add_link()
        {
        $slider_name = $this->escape_string($_FILES['slider']['name']);
        $text = $this->escape_string($_POST['text']);
        $allowed_filetypes = array('jpg', 'gif', 'bmp', 'png');
        $path_parts = pathinfo($slider_name);
        $ext = $path_parts['extension'];
        $slider_path = '../slider/';
        $full_path = 'slider/' . $slider_name;
        $thumb_path = 'slider/thumb/' . $slider_name;
        $slider_active = $this->escape_string($_POST['slider_active']);
        if (!in_array($ext, $allowed_filetypes))
            {
            $_SESSION['success'] = 'Invalid Image. Please upload (jpg,gif,png,bmp) only';
            $this->locate('manage_header.php');
            }
        move_uploaded_file($_FILES["slider"]["tmp_name"], $slider_path . $slider_name);
        $this->make_thumb('../' . $full_path, '../' . $thumb_path, 150, $ext);
        $insert = "INSERT INTO social_links SET `name` = '" . $slider_name . "', `thumb` = '" . $thumb_path . "', `full_path` = '" . $full_path . "', `active` = '" . $slider_active . "', `address` = '" . $text . "'";

        $query = $this->Executequery($insert);
        if ($query)
            {
            $_SESSION['success'] = 'Successfully Uploaded';
            $this->locate('manage_header.php');
            }
        }

    function add_video_link()
        {
        $text = $this->escape_string($_POST['text']);
        $title = $this->escape_string($_POST['title']);
        $duration = $this->escape_string($_POST['duration']);

        $insert = "INSERT INTO video_links SET `address` = '" . $text . "', `title` = '" . $title . "', `duration` = '" . $duration . "'";
        $query = $this->Executequery($insert);
        if ($query)
            {
            //$_SESSION['success']	=	'Inserted Successfully';
            $this->locate('manage_videos.php');
            }
        }

    function edit_slider()
        {
        $slider_name = $this->escape_string($_FILES['slider']['name']);
        $h1 = $this->escape_string($_POST['h1']);
        $h2 = $this->escape_string($_POST['h2']);
        $h1_arab = $this->escape_string($_POST['h1_arab']);
        $h2_arab = $this->escape_string($_POST['h2_arab']);
        $slider_active = $this->escape_string($_POST['slider_active']);
        $slider_id = $this->escape_string($_POST['slider_id']);
        if ($slider_name != '')
            {
            $allowed_filetypes = array('jpg', 'gif', 'bmp', 'png');
            $path_parts = pathinfo($slider_name);
            $ext = $path_parts['extension'];
            $slider_path = '../slider/';
            $full_path = 'slider/' . $slider_name;
            $thumb_path = 'slider/thumb/' . $slider_name;

            if (!in_array($ext, $allowed_filetypes))
                {
                $_SESSION['success'] = 'Invalid Image. Please upload (jpg,gif,png,bmp) only';
                $this->locate('edit_slider.php?id=' . $slider_id . '');
                }
            move_uploaded_file($_FILES["slider"]["tmp_name"], $slider_path . $slider_name);
            $this->make_thumb('../' . $full_path, '../' . $thumb_path, 150, $ext);
            $update = "update slider SET `slider_image_name` = '" . $slider_name . "', `slider_thumb_path` = '" . $thumb_path . "', `slider_full_path` = '" . $full_path . "', `slider_active` = '" . $slider_active . "', `h1` = '" . $h1 . "', `h2` = '" . $h2 . "', `h1_arab` = '" . $h1_arab . "', `h2_arab` = '" . $h2_arab . "' where `slider_id` = '" . $slider_id . "'";
            }
        else
            {
            $slider_name1 = $this->escape_string($_POST['slider_name1']);
            $update = "update slider SET `slider_image_name` = '" . $slider_name1 . "', `slider_active` = '" . $slider_active . "', `h1` = '" . $h1 . "', `h2` = '" . $h2 . "', `h1_arab` = '" . $h1_arab . "', `h2_arab` = '" . $h2_arab . "' where `slider_id` = '" . $slider_id . "'";
            }
        $query = $this->Executequery($update);
        if ($query)
            {
            $_SESSION['success'] = 'Successfully Uploaded';
            $this->locate('slider.php');
            }
        }

    function edit_slide()
        {
        $slider_name = $this->escape_string($_FILES['slider']['name']);
        $h1 = $this->escape_string($_POST['h1']);
        $h2 = $this->escape_string($_POST['h2']);
        $slider_active = $this->escape_string($_POST['slider_active']);
        $slider_id = $this->escape_string($_POST['slider_id']);
        if ($slider_name != '')
            {
            $allowed_filetypes = array('jpg', 'gif', 'bmp', 'png');
            $path_parts = pathinfo($slider_name);
            $ext = $path_parts['extension'];
            $slider_path = '../slider/';
            $full_path = 'slider/' . $slider_name;
            $thumb_path = 'slider/thumb/' . $slider_name;

            if (!in_array($ext, $allowed_filetypes))
                {
                $_SESSION['success'] = 'Invalid Image. Please upload (jpg,gif,png,bmp) only';
                $this->locate('edit_slide.php?id=' . $slider_id . '');
                }
            move_uploaded_file($_FILES["slider"]["tmp_name"], $slider_path . $slider_name);
            $this->make_thumb('../' . $full_path, '../' . $thumb_path, 150, $ext);
            $update = "update o_slider SET `slider_image_name` = '" . $slider_name . "', `slider_thumb_path` = '" . $thumb_path . "', `slider_full_path` = '" . $full_path . "', `slider_active` = '" . $slider_active . "' where `slider_id` = '" . $slider_id . "'";
            }
        else
            {
            $slider_name1 = $this->escape_string($_POST['slider_name1']);
            $update = "update o_slider SET `slider_image_name` = '" . $slider_name1 . "', `slider_active` = '" . $slider_active . "' where `slider_id` = '" . $slider_id . "'";
            }
        $query = $this->Executequery($update);
        if ($query)
            {
            $_SESSION['success'] = 'Successfully Uploaded';
            $this->locate('other_slider.php');
            }
        }

    function edit_image()
        {
        $slider_name = $this->escape_string($_FILES['slider']['name']);
        $text = $this->escape_string($_POST['text']);
        $link = $this->escape_string($_POST['link']);
        $text_arabic = $this->escape_string($_POST['text_arabic']);
        $slider_active = $this->escape_string($_POST['slider_active']);
        $slider_id = $this->escape_string($_POST['slider_id']);
        if ($slider_name != '')
            {
            $allowed_filetypes = array('jpg', 'gif', 'bmp', 'png');
            $path_parts = pathinfo($slider_name);
            $ext = $path_parts['extension'];
            $slider_path = '../slider/';
            $full_path = 'slider/' . $slider_name;
            $thumb_path = 'slider/thumb/' . $slider_name;

            if (!in_array($ext, $allowed_filetypes))
                {
                $_SESSION['success'] = 'Invalid Image. Please upload (jpg,gif,png,bmp) only';
                $this->locate('edit_image.php?id=' . $slider_id . '');
                }
            move_uploaded_file($_FILES["slider"]["tmp_name"], $slider_path . $slider_name);
            $this->make_thumb('../' . $full_path, '../' . $thumb_path, 150, $ext);
            $update = "update home_content_image SET `image_name` = '" . $slider_name . "', `thumb` = '" . $thumb_path . "', `full_path` = '" . $full_path . "', `show` = '" . $slider_active . "', `text` = '" . $text . "', `text_arabic` = '" . $text_arabic . "', `link` = '" . $link . "' where `id` = '" . $slider_id . "'";
            }
        else
            {
            $slider_name1 = $this->escape_string($_POST['slider_name1']);
            $update = "update home_content_image SET `image_name` = '" . $slider_name1 . "', `show` = '" . $slider_active . "', `text` = '" . $text . "', `text_arabic` = '" . $text_arabic . "', `link` = '" . $link . "' where `id` = '" . $slider_id . "'";
            }
        $query = $this->Executequery($update);
        if ($query)
            {
            $_SESSION['success'] = 'Successfully Uploaded';
            $this->locate('content.php');
            }
        }

    function edit_client()
        {
        $slider_name = $this->escape_string($_FILES['slider']['name']);
        $text = $this->escape_string($_POST['text']);
        $website = $this->escape_string($_POST['website']);
        $s_name = $this->escape_string($_POST['name_service']);
        $s_title = $this->escape_string($_POST['s_title']);
        $s_mobile = $this->escape_string($_POST['mobile_service']);
        $s_email = $this->escape_string($_POST['email_service']);
        $s_address1 = $this->escape_string($_POST['line1_service']);
        $s_address2 = $this->escape_string($_POST['line2_service']);
        $s_address3 = $this->escape_string($_POST['line3_service']);
        $s_name_2 = $this->escape_string($_POST['name_service_2']);
        $s_title_2 = $this->escape_string($_POST['s_title_2']);
        $s_mobile_2 = $this->escape_string($_POST['mobile_service_2']);
        $s_email_2 = $this->escape_string($_POST['email_service_2']);
        $s_address1_2 = $this->escape_string($_POST['line1_service_2']);
        $s_address2_2 = $this->escape_string($_POST['line2_service_2']);
        $s_address3_2 = $this->escape_string($_POST['line3_service_2']);
        $s_map_2 = $this->escape_string($_POST['iframe_service_2']);
        $s_map = $this->escape_string($_POST['iframe_service']);
        $sr_title = $this->escape_string($_POST['sr_title']);
        $sr_name = $this->escape_string($_POST['name_showroom']);
        $sr_mobile = $this->escape_string($_POST['mobile_showroom']);
        $sr_email = $this->escape_string($_POST['email_showroom']);
        $sr_address1 = $this->escape_string($_POST['line1_showroom']);
        $sr_address2 = $this->escape_string($_POST['line2_showroom']);
        $sr_address3 = $this->escape_string($_POST['line3_showroom']);
        $sr_title_2 = $this->escape_string($_POST['sr_title_2']);
        $sr_name_2 = $this->escape_string($_POST['name_showroom_2']);
        $sr_mobile_2 = $this->escape_string($_POST['mobile_showroom_2']);
        $sr_email_2 = $this->escape_string($_POST['email_showroom_2']);
        $sr_address1_2 = $this->escape_string($_POST['line1_showroom_2']);
        $sr_address2_2 = $this->escape_string($_POST['line2_showroom_2']);
        $sr_address3_2 = $this->escape_string($_POST['line3_showroom_2']);
        $sr_map = $this->escape_string($_POST['iframe_showroom']);
        $sr_map_2 = $this->escape_string($_POST['iframe_showroom_2']);
        $slider_active = $this->escape_string($_POST['slider_active']);
        $slider_id = $this->escape_string($_POST['slider_id']);
        if ($slider_name != '')
            {
            $allowed_filetypes = array('jpg', 'gif', 'bmp', 'png');
            $path_parts = pathinfo($slider_name);
            $ext = $path_parts['extension'];
            $slider_path = '../slider/';
            $full_path = 'slider/' . $slider_name;
            $thumb_path = 'slider/thumb/' . $slider_name;

            if (!in_array($ext, $allowed_filetypes))
                {
                $_SESSION['success'] = 'Invalid Image. Please upload (jpg,gif,png,bmp) only';
                $this->locate('edit_image.php?id=' . $slider_id . '');
                }
            move_uploaded_file($_FILES["slider"]["tmp_name"], $slider_path . $slider_name);
            $this->make_thumb('../' . $full_path, '../' . $thumb_path, 150, $ext);
            $update = "update clients SET `client_image` = '" . $slider_name . "', `thumb` = '" . $thumb_path . "', `full_path` = '" . $full_path . "', `show` = '" . $slider_active . "', `client_name` = '" . $text . "', `s_name` = '" . $s_name . "',
 `s_mob` = '" . $s_mobile . "',
 `s_email` = '" . $s_email . "',
 `s_address1` = '" . $s_address1 . "',
 `s_address2` = '" . $s_address2 . "',
 `s_address3` = '" . $s_address3 . "',
  `s_name_2` = '" . $s_name_2 . "',
  `s_title` = '" . $s_title . "',
  `s_title_2` = '" . $s_title_2 . "',
  `sr_title` = '" . $sr_title . "',
  `sr_title_2` = '" . $sr_title_2 . "',
 `s_mob_2` = '" . $s_mobile_2 . "',
 `s_email_2` = '" . $s_email_2 . "',
 `s_address1_2` = '" . $s_address1_2 . "',
 `s_address2_2` = '" . $s_address2_2 . "',
 `s_address3_2` = '" . $s_address3_2 . "',
 `s_map` = '" . $s_map . "',
 `s_map_2` = '" . $s_map_2 . "',
 `sr_name` = '" . $sr_name . "',
 `sr_mob` = '" . $sr_mobile . "',
 `sr_email` = '" . $sr_email . "',
 `sr_address1` = '" . $sr_address1 . "',
 `sr_address2` = '" . $sr_address2 . "',
 `sr_address3` = '" . $sr_address3 . "',
 `sr_name_2` = '" . $sr_name_2 . "',
 `sr_mob_2` = '" . $sr_mobile_2 . "',
 `sr_email_2` = '" . $sr_email_2 . "',
 `sr_address1_2` = '" . $sr_address1_2 . "',
 `sr_address2_2` = '" . $sr_address2_2 . "',
 `sr_address3_2` = '" . $sr_address3_2 . "',
 `website` = '" . $website . "',
 `sr_map_2` = '" . $sr_map_2 . "',`sr_map` = '" . $sr_map . "' where `id` = '" . $slider_id . "'";
            }
        else
            {
            $slider_name1 = $this->escape_string($_POST['slider_name1']);
            echo $update = "update clients SET `client_image` = '" . $slider_name1 . "', `show` = '" . $slider_active . "', `client_name` = '" . $text . "', `s_name` = '" . $s_name . "',
 `s_mob` = '" . $s_mobile . "',
 `s_name_2` = '" . $s_name_2 . "',
  `s_title` = '" . $s_title . "',
  `s_title_2` = '" . $s_title_2 . "',
  `sr_title` = '" . $sr_title . "',
  `sr_title_2` = '" . $sr_title_2 . "',
 `s_email` = '" . $s_email . "',
 `s_address1` = '" . $s_address1 . "',
 `s_address2` = '" . $s_address2 . "',
 `s_address3` = '" . $s_address3 . "',
 `s_mob_2` = '" . $s_mobile_2 . "',
 `s_email_2` = '" . $s_email_2 . "',
 `s_address1_2` = '" . $s_address1_2 . "',
 `s_address2_2` = '" . $s_address2_2 . "',
 `s_address3_2` = '" . $s_address3_2 . "',
 `s_map` = '" . $s_map . "',
 `s_map_2` = '" . $s_map_2 . "',
 `sr_name` = '" . $sr_name . "',
 `sr_mob` = '" . $sr_mobile . "',
 `sr_email` = '" . $sr_email . "',
 `sr_address1` = '" . $sr_address1 . "',
 `sr_address2` = '" . $sr_address2 . "',
 `sr_address3` = '" . $sr_address3 . "',
 `sr_name_2` = '" . $sr_name_2 . "',
 `sr_mob_2` = '" . $sr_mobile_2 . "',
 `sr_email_2` = '" . $sr_email_2 . "',
 `sr_address1_2` = '" . $sr_address1_2 . "',
 `sr_address2_2` = '" . $sr_address2_2 . "',
 `sr_address3_2` = '" . $sr_address3_2 . "',
 `website` = '" . $website . "',
 `sr_map` = '" . $sr_map . "',`sr_map_2` = '" . $sr_map_2 . "' where `id` = '" . $slider_id . "'";
            }
        $query = $this->Executequery($update);
        if ($query)
            {
            $_SESSION['success'] = 'Successfully Uploaded';
            $this->locate('clients.php');
            }
        }

    function edit_search()
        {
        $slider_name = $this->escape_string($_FILES['slider']['name']);
        $text = $this->escape_string($_POST['text']);
        $slider_active ='yes';
//        $slider_active = $this->escape_string($_POST['slider_active']);
        $slider_id = $this->escape_string($_POST['slider_id']);
        if ($slider_name != '')
            {
            $allowed_filetypes = array('jpg', 'gif', 'bmp', 'png');
            $path_parts = pathinfo($slider_name);
            $ext = $path_parts['extension'];
            $slider_path = '../slider/';
            $full_path = 'slider/' . $slider_name;
            $thumb_path = 'slider/thumb/' . $slider_name;

            if (!in_array($ext, $allowed_filetypes))
                {
                $_SESSION['success'] = 'Invalid Image. Please upload (jpg,gif,png,bmp) only';
                $this->locate('edit_image.php?id=' . $slider_id . '');
                }
            move_uploaded_file($_FILES["slider"]["tmp_name"], $slider_path . $slider_name);
            $this->make_thumb('../' . $full_path, '../' . $thumb_path, 150, $ext);
            $update = "update searches SET `search_image` = '" . $slider_name . "', `thumb` = '" . $thumb_path . "', `full_path` = '" . $full_path . "', `show` = '" . $slider_active . "', `search_name` = '" . $text . "' where `id` = '" . $slider_id . "'";
            }
        else
            {
            $slider_name1 = $this->escape_string($_POST['slider_name1']);
            $update = "update searches SET `search_image` = '" . $slider_name1 . "', `show` = '" . $slider_active . "', `search_name` = '" . $text . "' where `id` = '" . $slider_id . "'";
            }
        $query = $this->Executequery($update);
        if ($query)
            {
            $_SESSION['success'] = 'Successfully Uploaded';
            $this->locate('searches.php');
            }
        }

    function edit_footer()
        {
        $slider_name = $this->escape_string($_FILES['slider']['name']);
        $text = $this->escape_string($_POST['text']);
        $slider_id = $this->escape_string($_POST['slider_id']);
        if ($slider_name != '')
            {
            $allowed_filetypes = array('jpg', 'gif', 'bmp', 'png');
            $path_parts = pathinfo($slider_name);
            $ext = $path_parts['extension'];
            $slider_path = '../slider/';
            $full_path = 'slider/' . $slider_name;
            $thumb_path = 'slider/thumb/' . $slider_name;

            if (!in_array($ext, $allowed_filetypes))
                {
                $_SESSION['success'] = 'Invalid Image. Please upload (jpg,gif,png,bmp) only';
                $this->locate('manage_footer.php?id=' . $slider_id . '');
                }
            move_uploaded_file($_FILES["slider"]["tmp_name"], $slider_path . $slider_name);
            $this->make_thumb('../' . $full_path, '../' . $thumb_path, 150, $ext);
            $update = "update footer SET `footer_image` = '" . $slider_name . "', `thumb` = '" . $thumb_path . "', `full_path` = '" . $full_path . "', `footer_text` = '" . $text . "' where `id` = '" . $slider_id . "'";
            }
        else
            {
            $slider_name1 = $this->escape_string($_POST['slider_name1']);
            $update = "update footer SET `footer_image` = '" . $slider_name1 . "', `footer_text` = '" . $text . "' where `id` = '" . $slider_id . "'";
            }
        $query = $this->Executequery($update);
        if ($query)
            {
            $_SESSION['success'] = 'Successfully Uploaded';
            $this->locate('manage_footer.php');
            }
        }

    function edit_link()
        {
        $slider_name = $this->escape_string($_FILES['slider']['name']);
        $text = $this->escape_string($_POST['text']);
        $slider_active = $this->escape_string($_POST['slider_active']);
        $slider_id = $this->escape_string($_POST['slider_id']);
        if ($slider_name != '')
            {
            $allowed_filetypes = array('jpg', 'gif', 'bmp', 'png');
            $path_parts = pathinfo($slider_name);
            $ext = $path_parts['extension'];
            $slider_path = '../slider/';
            $full_path = 'slider/' . $slider_name;
            $thumb_path = 'slider/thumb/' . $slider_name;

            if (!in_array($ext, $allowed_filetypes))
                {
                $_SESSION['success'] = 'Invalid Image. Please upload (jpg,gif,png,bmp) only';
                $this->locate('edit_link.php?id=' . $slider_id . '');
                }
            move_uploaded_file($_FILES["slider"]["tmp_name"], $slider_path . $slider_name);
            $this->make_thumb('../' . $full_path, '../' . $thumb_path, 150, $ext);
            $update = "update social_links SET `name` = '" . $slider_name . "', `thumb` = '" . $thumb_path . "', `full_path` = '" . $full_path . "', `active` = '" . $slider_active . "', `address` = '" . $text . "' where `id` = '" . $slider_id . "'";
            }
        else
            {
            $slider_name1 = $this->escape_string($_POST['slider_name1']);
            $update = "update social_links SET `name` = '" . $slider_name1 . "', `active` = '" . $slider_active . "', `address` = '" . $text . "' where `id` = '" . $slider_id . "'";
            }
        $query = $this->Executequery($update);
        if ($query)
            {
            $_SESSION['success'] = 'Successfully Uploaded';
            $this->locate('manage_header.php');
            }
        }

    function edit_logo()
        {
        $slider_name = $this->escape_string($_FILES['slider']['name']);
        $slider_id = $this->escape_string($_POST['slider_id']);
        if ($slider_name != '')
            {
            $allowed_filetypes = array('jpg', 'gif', 'bmp', 'png');
            $path_parts = pathinfo($slider_name);
            $ext = $path_parts['extension'];
            $slider_path = '../slider/';
            $full_path = 'slider/' . $slider_name;
            $thumb_path = 'slider/thumb/' . $slider_name;

            if (!in_array($ext, $allowed_filetypes))
                {
                $_SESSION['success'] = 'Invalid Image. Please upload (jpg,gif,png,bmp) only';
                $this->locate('manage_header.php?id=' . $slider_id . '');
                }
            move_uploaded_file($_FILES["slider"]["tmp_name"], $slider_path . $slider_name);
            $this->make_thumb('../' . $full_path, '../' . $thumb_path, 150, $ext);
            $update = "update logo SET `name` = '" . $slider_name . "', `thumb_path` = '" . $thumb_path . "', `full_path` = '" . $full_path . "' where `id` = '" . $slider_id . "'";
            }
        else
            {
            $slider_name1 = $this->escape_string($_POST['slider_name1']);
            $update = "update logo SET `name` = '" . $slider_name1 . "' where `id` = '" . $slider_id . "'";
            }
        $query = $this->Executequery($update);
        if ($query)
            {
            $_SESSION['success'] = 'Successfully Uploaded';
            $this->locate('manage_header.php');
            }
        }

    function about_page()
        {
        $slider_name = $this->escape_string($_FILES['slider']['name']);
        $content = $this->escape_string($_POST['content']);
        $content_arabic = $this->escape_string($_POST['content_arabic']);
        $page_title = $this->escape_string($_POST['page_title']);
        $page_title_arabic = $this->escape_string($_POST['page_title_arabic']);
        $slider_id = $this->escape_string($_POST['slider_id']);
        if ($slider_name != '')
            {
            $allowed_filetypes = array('jpg', 'gif', 'bmp', 'png');
            $path_parts = pathinfo($slider_name);
            $ext = $path_parts['extension'];
            $slider_path = '../slider/';
            $full_path = 'slider/' . $slider_name;
            $thumb_path = 'slider/thumb/' . $slider_name;

            if (!in_array($ext, $allowed_filetypes))
                {
                $_SESSION['success'] = 'Invalid Image. Please upload (jpg,gif,png,bmp) only';
                $this->locate('about.php?id=' . $slider_id . '');
                }
            move_uploaded_file($_FILES["slider"]["tmp_name"], $slider_path . $slider_name);
            $this->make_thumb('../' . $full_path, '../' . $thumb_path, 150, $ext);
            $update = "update page SET `image_name` = '" . $slider_name . "', `page_title` = '" . $page_title . "', `page_title_arabic` = '" . $page_title_arabic . "', `thumb` = '" . $thumb_path . "', `full_path` = '" . $full_path . "', `content` = '" . $content . "', `content_arabic` = '" . $content_arabic . "' where `id` = '" . $slider_id . "'";
            }
        else
            {
            $slider_name1 = $this->escape_string($_POST['slider_name1']);
            $update = "update page SET `image_name` = '" . $slider_name1 . "', `page_title` = '" . $page_title . "', `page_title_arabic` = '" . $page_title_arabic . "', `content` = '" . $content . "', `content_arabic` = '" . $content_arabic . "' where `id` = '" . $slider_id . "'";
            }
        $query = $this->Executequery($update);
        if ($query)
            {
            $_SESSION['success'] = 'Successfully Uploaded';
            $this->locate('about.php?id=' . $slider_id . '');
            }
        }

    function add_question()
        {
        $question = $this->escape_string($_POST['question']);
        $question_arabic = $this->escape_string($_POST['question_arabic']);
        $answer = $this->escape_string($_POST['answer']);
        $answer_arabic = $this->escape_string($_POST['answer_arabic']);
        $slider_active = $this->escape_string($_POST['slider_active']);
        $insert = "INSERT INTO `faq`(`question`, `question_arabic`, `answer`, `answer_arabic`, `show`) VALUES ('" . $question . "', '" . $question_arabic . "', '" . $answer . "', '" . $answer_arabic . "', '" . $slider_active . "')";
        $query = $this->Executequery($insert);
        if ($query)
            {
            $_SESSION['success'] = 'Question Successfully Added!';
            $this->locate('faq.php');
            }
        }

    function edit_question()
        {
        $question_arabic = $this->escape_string($_POST['question_arabic']);
        $question = $this->escape_string($_POST['question']);
        $answer_arabic = $this->escape_string($_POST['answer_arabic']);
        $answer = $this->escape_string($_POST['answer']);
        $slider_active = $this->escape_string($_POST['slider_active']);
        $id = $this->escape_string($_POST['id']);

        $update = "update `faq` set `question` = '" . $question . "', `question_arabic` = '" . $question_arabic . "', `answer` = '" . $answer . "', `answer_arabic` = '" . $answer_arabic . "', `show` = '" . $slider_active . "' where `id` = '" . $id . "'";
        $query = $this->Executequery($update);
        if ($query)
            {
            $_SESSION['success'] = 'Question Successfully Updated!';
            $this->locate('faq.php');
            }
        }

    function edit_details()
        {
        $contact_name = $this->escape_string($_POST['contact_name']);
        $phone = $this->escape_string($_POST['phone']);
        $email = $this->escape_string($_POST['email']);
        $id = $this->escape_string($_POST['id']);

        $update = "update `contact_details` set `contact_name` = '" . $contact_name . "', `phone` = '" . $phone . "', `email` = '" . $email . "' where `id` = '" . $id . "'";
        $query = $this->Executequery($update);
        if ($query)
            {
            $_SESSION['success'] = 'Contact Details Successfully Updated!';
            $this->locate('contact_detail.php');
            }
        }

    function add_maker()
        {
        $name = $this->escape_string($_POST['name']);
        $insert = "INSERT INTO `maker`(`name`) VALUES ('" . $name . "')";
        $query = $this->Executequery($insert);
        if ($query)
            {
            $_SESSION['success'] = 'Data Added Successfully!';
            $this->locate('manage_category.php');
            }
        }

    function edit_maker()
        {
        $name = $this->escape_string($_POST['name']);
        $id = $this->escape_string($_POST['id']);
        $update = "UPDATE `maker` set name = '" . $name . "' where id = " . $id . "";
        $query = $this->Executequery($update);
        if ($query)
            {
            $_SESSION['success'] = 'Data Added Successfully!';
            $this->locate('manage_category.php');
            }
        }

    function add_car()
        {
        $slider_name = $this->escape_string($_FILES['slider']['name']);
        $maker = $this->escape_string($_POST['maker']);
        $pdf_english = $this->escape_string($_FILES['pdf_english']['name']);
        $pdf_arabic = $this->escape_string($_FILES['pdf_arabic']['name']);
        $bodyType = $this->escape_string($_POST['bodyType']);
        $model = $this->escape_string($_POST['model']);
        $sub_model = $this->escape_string($_POST['sub_model']);
        $year = $this->escape_string($_POST['year']);
        $price = $this->escape_string($_POST['price']);
        $color = $this->escape_string($_POST['color']);
        $Warranty = $this->escape_string($_POST['Warranty']);
        $acceleration = $this->escape_string($_POST['acceleration']);
        $top_speed = $this->escape_string($_POST['top_speed']);
        $engineSize = $this->escape_string($_POST['engineSize']);
        $h_power = $this->escape_string($_POST['h_power']);
        $clyinders = $this->escape_string($_POST['clyinders']);
        $drivenWheels = $this->escape_string($_POST['drivenWheels']);
        $specialFeatures = $this->escape_string($_POST['specialFeatures']);

        $allowed_filetypes = array('jpg', 'gif', 'bmp', 'png');
        $path_parts = pathinfo($slider_name);
        $ext = $path_parts['extension'];
        $slider_path = '../slider/';
        $full_path = 'slider/' . $slider_name;
        $thumb_path = 'slider/thumb/' . $slider_name;
        if (!in_array($ext, $allowed_filetypes))
            {
            $_SESSION['success'] = 'Invalid Image. Please upload (jpg,gif,png,bmp) only';
            $this->locate('add_car.php');
            }
        move_uploaded_file($_FILES["slider"]["tmp_name"], $slider_path . $slider_name);
        $this->car_make_thumb('../' . $full_path, '../' . $thumb_path, 200, $ext);
        //$this->make_thumb('../' . $full_path, '../' . $thumb_path, 150, $ext);
        /* -------Code for pdf----------- */
        if (!empty($_FILES['pdf_english']['name']))
            {
            $pdf_allowed_filetypes = array('pdf');
            $pdf_path_parts = pathinfo($_FILES['pdf_english']['name']);
            $ext = $pdf_path_parts['extension'];
            if (!in_array($ext, $pdf_allowed_filetypes))
                {
                $_SESSION['success'] = 'Invalid document. Please upload (pdf only) only';
                $this->locate('add_car.php');
                }

            $upload_path = '../pdf/';
            // $full_path1 = 'pdf_english/' . $pdf_english;
            $pd_image_name = time() . "_" . $_FILES['pdf_english']['name'];
            $pdf_path = $upload_path . $pd_image_name;
            move_uploaded_file($_FILES["pdf_english"]["tmp_name"], $pdf_path);
            }
        /* -------End of Pdf------------- */
        /* ----------------pdf upload code for Arabic--------------- */
        if (!empty($_FILES['pdf_arabic']['name']))
            {
            $pdf_allowed_filetypes1 = array('pdf');
            $pdf_path_parts1 = pathinfo($_FILES['pdf_arabic']['name']);
            $ext = $pdf_path_parts1['extension'];
            if (!in_array($ext, $pdf_allowed_filetypes1))
                {
                $_SESSION['success'] = 'Invalid document. Please upload (pdf only) only';
                $this->locate('add_car.php');
                }


            $upload_path1 = '../pdf_arabic/';
            // $full_path1 = 'pdf_english/' . $pdf_english;
            $pd_image_name1 = time() . "_" . $_FILES['pdf_arabic']['name'];
            $pdf_path1 = $upload_path1 . $pd_image_name1;
            move_uploaded_file($_FILES["pdf_arabic"]["tmp_name"], $pdf_path1);
            }
        /* ----------------End of Arabic pdf Code------------------- */
        $insert = "INSERT INTO `car_data`(`maker_id`,`pdf_english`,`pdf_arabic`, `bodyType`, `model`, `sub_model`, `year`, `color`, `price`, `Warranty`, `acceleration`, `top_speed`, `engineSize`, `h_power`, `clyinders`, `drivenWheels`, `specialFeatures`, `image_name`, `thumb_path`, `full_path`) VALUES ('" . $maker . "','" . $pd_image_name . "','" . $pd_image_name1 . "', '" . $bodyType . "', '" . $model . "', '" . $sub_model . "', '" . $year . "', '" . $color . "', '" . $price . "', '" . $Warranty . "', '" . $acceleration . "', '" . $top_speed . "', '" . $engineSize . "', '" . $h_power . "', '" . $clyinders . "', '" . $drivenWheels . "', '" . $specialFeatures . "', '" . $slider_name . "', '" . $thumb_path . "', '" . $full_path . "')"; /*
          $insert		=	"INSERT INTO `car_data`(`maker_id`, `bodyType`, `model`, `sub_model`, `year`, `color`, `price`, `Warranty`, `acceleration`, `top_speed`, `engineSize`, `h_power`, `clyinders`, `drivenWheels`, `specialFeatures`) VALUES ('".$maker."', '".$bodyType."', '".$model."', '".$sub_model."', '".$year."', '".$color."', '".$price."', '".$Warranty."', '".$acceleration."', '".$top_speed."', '".$engineSize."', '".$h_power."', '".$clyinders."', '".$drivenWheels."', '".$specialFeatures."')"; */
        $query = $this->Executequery($insert);
        if ($query)
            {
            $_SESSION['success'] = 'Data Added Successfully!';
            $this->locate('manage_cars.php');
            }
        }

    function edit_car()
        {
        //echo "<pre>";
        //print_r($_FILES);
        //echo "</pre>";
        //exit();
        $slider_name = $this->escape_string($_FILES['slider']['name']);
        $pdf_english = $this->escape_string($_FILES['pdf_english']['name']);
        $pdf_arabic = $this->escape_string($_FILES['pdf_arabic']['name']);
        $id = $this->escape_string($_POST['id']);
        $maker = $this->escape_string($_POST['maker']);
        $bodyType = $this->escape_string($_POST['bodyType']);
        $model = $this->escape_string($_POST['model']);
        $sub_model = $this->escape_string($_POST['sub_model']);
        $year = $this->escape_string($_POST['year']);
        $price = $this->escape_string($_POST['price']);
        $color = $this->escape_string($_POST['color']);
        $Warranty = $this->escape_string($_POST['Warranty']);
        $acceleration = $this->escape_string($_POST['acceleration']);
        $top_speed = $this->escape_string($_POST['top_speed']);
        $engineSize = $this->escape_string($_POST['engineSize']);
        $h_power = $this->escape_string($_POST['h_power']);
        $clyinders = $this->escape_string($_POST['clyinders']);
        $drivenWheels = $this->escape_string($_POST['drivenWheels']);
        $specialFeatures = $this->escape_string($_POST['specialFeatures']);

        if ($slider_name != '')
            {
            $allowed_filetypes = array('jpg', 'gif', 'bmp', 'png');
            $path_parts = pathinfo($slider_name);
            $ext = $path_parts['extension'];
            $slider_path = '../slider/';
            $full_path = 'slider/' . $slider_name;
            $thumb_path = 'slider/thumb/' . $slider_name;

            if (!in_array($ext, $allowed_filetypes))
                {
                $_SESSION['success'] = 'Invalid Image. Please upload (jpg,gif,png,bmp) only';
                $this->locate('edit_car.php?id=' . $id . '');
                }
            move_uploaded_file($_FILES["slider"]["tmp_name"], $slider_path . $slider_name);
            //$this->make_thumb('../' . $full_path, '../' . $thumb_path, 150, $ext);
            $this->car_make_thumb('../' . $full_path, '../' . $thumb_path, 200, $ext);
            $insert = "UPDATE `car_data` SET `maker_id` = '" . $maker . "',`pdf_english` = '" . $pd_image_name . "',`pdf_arabic` = '" . $pd_image_name1 . "', `bodyType` = '" . $bodyType . "', `model` = '" . $model . "', `sub_model` = '" . $sub_model . "', `year` = '" . $year . "', `color` = '" . $color . "', `price` = '" . $price . "', `Warranty` = '" . $Warranty . "', `acceleration` = '" . $acceleration . "', `top_speed` = '" . $top_speed . "', `engineSize` = '" . $engineSize . "', `h_power` = '" . $h_power . "', `clyinders` = '" . $clyinders . "', `drivenWheels` = '" . $drivenWheels . "', `specialFeatures` = '" . $specialFeatures . "', `image_name` = '" . $slider_name . "', `thumb_path` = '" . $thumb_path . "', `full_path` = '" . $full_path . "' WHERE id = '" . $id . "'";
            }
        else
            {
            $slider_name1 = $this->escape_string($_POST['slider_name1']);
            /* -------Code for pdf----------- */
            if (!empty($_FILES['pdf_english']['name']))
                {
                $pdf_allowed_filetypes = array('pdf');
                $pdf_path_parts = pathinfo($_FILES['pdf_english']['name']);
                $ext = $pdf_path_parts['extension'];
                if (!in_array($ext, $pdf_allowed_filetypes))
                    {
                    $_SESSION['success'] = 'Invalid document. Please upload (pdf only) only';
                    $this->locate('edit_car.php');
                    }

                $upload_path = '../pdf/';
                // $full_path1 = 'pdf_english/' . $pdf_english;
                $pd_image_name = time() . "_" . $_FILES['pdf_english']['name'];
                $pdf_path = $upload_path . $pd_image_name;
                move_uploaded_file($_FILES["pdf_english"]["tmp_name"], $pdf_path);
                }
            /* -------End of Pdf------------- */
            /* ----------------pdf upload code for Arabic--------------- */
            if (!empty($_FILES['pdf_arabic']['name']))
                {
                $pdf_allowed_filetypes1 = array('pdf');
                $pdf_path_parts1 = pathinfo($_FILES['pdf_arabic']['name']);
                $ext = $pdf_path_parts1['extension'];
                if (!in_array($ext, $pdf_allowed_filetypes1))
                    {
                    $_SESSION['success'] = 'Invalid document. Please upload (pdf only) only';
                    $this->locate('edit_car.php');
                    }


                $upload_path1 = '../pdf_arabic/';
                // $full_path1 = 'pdf_english/' . $pdf_english;
                $pd_image_name1 = time() . "_" . $_FILES['pdf_arabic']['name'];
                $pdf_path1 = $upload_path1 . $pd_image_name1;
                move_uploaded_file($_FILES["pdf_arabic"]["tmp_name"], $pdf_path1);
                }
            /* ----------------End of Arabic pdf Code------------------- */
            $insert = "UPDATE `car_data` SET `maker_id` = '" . $maker . "',`pdf_english` = '" . $pd_image_name . "',`pdf_arabic` = '" . $pd_image_name1 . "', `bodyType` = '" . $bodyType . "', `model` = '" . $model . "', `sub_model` = '" . $sub_model . "', `year` = '" . $year . "', `color` = '" . $color . "', `price` = '" . $price . "', `Warranty` = '" . $Warranty . "', `acceleration` = '" . $acceleration . "', `top_speed` = '" . $top_speed . "', `engineSize` = '" . $engineSize . "', `h_power` = '" . $h_power . "', `clyinders` = '" . $clyinders . "', `drivenWheels` = '" . $drivenWheels . "', `specialFeatures` = '" . $specialFeatures . "', `image_name` = '" . $slider_name1 . "' WHERE id = '" . $id . "'";
            }

        $query = $this->Executequery($insert);
        if ($query)
            {
            $_SESSION['success'] = 'Data Updated Successfully!';
            $this->locate('manage_cars.php');
            }
        }

    function add_banks()
        {
        $slider_name = $this->escape_string($_FILES['slider']['name']);
        $provider = $this->escape_string($_POST['provider']);
        $minimum_salary = $this->escape_string($_POST['minimum_salary']);
        $down_payment = $this->escape_string($_POST['down_payment']);
        $monthly_payment = $this->escape_string($_POST['monthly_payment']);
        $flat_rate = $this->escape_string($_POST['flat_rate']);
        $reducing_rate = $this->escape_string($_POST['reducing_rate']);
        $link = $this->escape_string($_POST['link']);

        $allowed_filetypes = array('jpg', 'gif', 'bmp', 'png');
        $path_parts = pathinfo($slider_name);
        $ext = $path_parts['extension'];
        $slider_path = '../slider/';
        $full_path = 'slider/' . $slider_name;
        $thumb_path = 'slider/thumb/' . $slider_name;
        if (!in_array($ext, $allowed_filetypes))
            {
            $_SESSION['success'] = 'Invalid Image. Please upload (jpg,gif,png,bmp) only';
            $this->locate('mange_finance.php');
            }
        move_uploaded_file($_FILES["slider"]["tmp_name"], $slider_path . $slider_name);
        $this->make_thumb('../' . $full_path, '../' . $thumb_path, 150, $ext);

        $insert = "INSERT INTO `finance`(`provider`, `minimum_salary`, `down_payment`, `monthly_payment`, `flat_rate`, `reducing_rate`, `image_name`, `thumb_path`, `full_path`, `link`) VALUES ('" . $provider . "', '" . $minimum_salary . "', '" . $down_payment . "', '" . $monthly_payment . "', '" . $flat_rate . "', '" . $reducing_rate . "', '" . $slider_name . "', '" . $thumb_path . "', '" . $full_path . "', '" . $link . "')";
        $query = $this->Executequery($insert);
        if ($query)
            {
            $_SESSION['success'] = 'Data Added Successfully!';
            $this->locate('manage_finance.php');
            }
        }

    function edit_banks()
        {
        $slider_name = $this->escape_string($_FILES['slider']['name']);
        $id = $this->escape_string($_POST['id']);
        $provider = $this->escape_string($_POST['provider']);
        $minimum_salary = $this->escape_string($_POST['minimum_salary']);
        $down_payment = $this->escape_string($_POST['down_payment']);
        $monthly_payment = $this->escape_string($_POST['monthly_payment']);
        $flat_rate = $this->escape_string($_POST['flat_rate']);
        $reducing_rate = $this->escape_string($_POST['reducing_rate']);
        $link = $this->escape_string($_POST['link']);
        if ($slider_name != '')
            {
            $allowed_filetypes = array('jpg', 'gif', 'bmp', 'png');
            $path_parts = pathinfo($slider_name);
            $ext = $path_parts['extension'];
            $slider_path = '../slider/';
            $full_path = 'slider/' . $slider_name;
            $thumb_path = 'slider/thumb/' . $slider_name;

            if (!in_array($ext, $allowed_filetypes))
                {
                $_SESSION['success'] = 'Invalid Image. Please upload (jpg,gif,png,bmp) only';
                $this->locate('edit_banks.php?id=' . $id . '');
                }
            move_uploaded_file($_FILES["slider"]["tmp_name"], $slider_path . $slider_name);
            $this->make_thumb('../' . $full_path, '../' . $thumb_path, 150, $ext);
            $insert = "UPDATE `finance` SET `provider` = '" . $provider . "', `minimum_salary` = '" . $minimum_salary . "', `down_payment` = '" . $down_payment . "', `monthly_payment` = '" . $monthly_payment . "', `flat_rate` = '" . $flat_rate . "', `reducing_rate` = '" . $reducing_rate . "', `image_name` = '" . $slider_name . "', `thumb_path` = '" . $thumb_path . "', `full_path` = '" . $full_path . "', `link` = '" . $link . "' WHERE id = '" . $id . "'";
            }
        else
            {
            $slider_name1 = $this->escape_string($_POST['slider_name1']);
            $insert = "UPDATE `finance` SET `provider` = '" . $provider . "', `minimum_salary` = '" . $minimum_salary . "', `down_payment` = '" . $down_payment . "', `monthly_payment` = '" . $monthly_payment . "', `flat_rate` = '" . $flat_rate . "', `reducing_rate` = '" . $reducing_rate . "', `image_name` = '" . $slider_name1 . "', `link` = '" . $link . "' WHERE id = '" . $id . "'";
            }

        $query = $this->Executequery($insert);
        if ($query)
            {
            $_SESSION['success'] = 'Data Updated Successfully!';
            $this->locate('manage_finance.php');
            }
        }

    function make_thumb($src, $dest, $desired_width, $type)
        {
        /* read the source image */
        if ($type == 'jpg' || $type == 'jpeg')
            {
            $source_image = imagecreatefromjpeg($src);
            }
        else if ($type == 'png')
            {
            $source_image = imagecreatefrompng($src);
            } $width = imagesx($source_image);
        $height = imagesy($source_image);    /* find the "desired height" of this thumbnail, relative to the desired width  */ $desired_height = 188;    /* create a new, "virtual" image */ $virtual_image = imagecreatetruecolor($desired_width, $desired_height);    /* copy source image at a resized size */ imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);    /* create the physical thumbnail image to its destination */
        if ($type == 'jpg' || $type == 'jpeg')
            {
            $source_image = imagejpeg($virtual_image, $dest);
            }
        else if
        ($type == 'png')
            {
            $source_image = imagepng($virtual_image, $dest);
            }
        }

    /* -------------Function for car thumb height----------------------- */

    function car_make_thumb($src, $dest, $desired_width, $type)
        {
        /* read the source image */
        if ($type == 'jpg' || $type == 'jpeg')
            {
            $source_image = imagecreatefromjpeg($src);
            }
        else if ($type == 'png')
            {
            $source_image = imagecreatefrompng($src);
            } $width = imagesx($source_image);
        $height = imagesy($source_image);    /* find the "desired height" of this thumbnail, relative to the desired width  */ $desired_height = 121;    /* create a new, "virtual" image */ $virtual_image = imagecreatetruecolor($desired_width, $desired_height);    /* copy source image at a resized size */ imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);    /* create the physical thumbnail image to its destination */
        if ($type == 'jpg' || $type == 'jpeg')
            {
            $source_image = imagejpeg($virtual_image, $dest);
            }
        else if
        ($type == 'png')
            {
            $source_image = imagepng($virtual_image, $dest);
            }
        }

    /* -------------End of Car thumb height----------------------------- */

    function clean($string)
        {
        $string = str_replace(' ', '-', $string);
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
        }

    function check_already($value, $table, $field)
        {
        $select = "select $field from $table where $field = '" . $value . "'";
        $query = $this->Executequery($select);
        $rows = mysql_num_rows($query);
        if ($rows > 0)
            {
            echo '1';
            }
        else
            {
            echo '0';
            }
        }

    function check_already_this_id($value, $table, $field, $id, $value_id)
        {
        $select = "select $field from $table where $field = '" . $value . "' AND $value_id!='" . $id . "'";
        $query = $this->Executequery($select);
        $rows = mysql_num_rows($query);
        if ($rows > 0)
            {
            echo '1';
            }
        else
            {
            echo '0';
            }
        }

    function add_model()
        {
        $model = $this->escape_string($_POST['model']);
        $maker = $this->escape_string($_POST['maker']);
        $insert = "INSERT INTO `model`(`model_name`, `maker_id`) VALUES ('" . $model . "', '" . $maker . "')";
        $query = $this->Executequery($insert);
        if ($query)
            {
            $_SESSION['success'] = 'Data Added Successfully!';
            $this->locate('manage_model.php');
            }
        }

    function edit_model()
        {
        $model = $this->escape_string($_POST['model']);
        $maker = $this->escape_string($_POST['maker']);
        $id = $this->escape_string($_POST['model_id']);
        $update = "UPDATE `model` set model_name = '" . $model . "', maker_id = '" . $maker . "' where model_id = " . $id . "";
        $query = $this->Executequery($update);
        if ($query)
            {
            $_SESSION['success'] = 'Data Added Successfully!';
            $this->locate('manage_model.php');
            }
        }

    function add_sub_model()
        {
        $model = $this->escape_string($_POST['model']);
        $maker = $this->escape_string($_POST['maker']);
        $sub_model_name = $this->escape_string($_POST['sub_model_name']);
        $insert = "INSERT INTO `sub_model`(`model_id`, `maker_id`, `sub_model_name`) VALUES ('" . $model . "', '" . $maker . "', '" . $sub_model_name . "')";
        $query = $this->Executequery($insert);
        if ($query)
            {
            $_SESSION['success'] = 'Data Added Successfully!';
            $this->locate('manage_sub_model.php');
            }
        }

    function edit_sub_model()
        {
        $model = $this->escape_string($_POST['model']);
        $maker = $this->escape_string($_POST['maker']);
        $sub_model_name = $this->escape_string($_POST['sub_model_name']);
        $sub_id = $this->escape_string($_POST['sub_id']);
        $update = "UPDATE `sub_model` set sub_model_name = '" . $sub_model_name . "', maker_id = '" . $maker . "', model_id = '" . $model . "' where sub_id = " . $sub_id . "";
        $query = $this->Executequery($update);
        if ($query)
            {
            $_SESSION['success'] = 'Data Added Successfully!';
            $this->locate('manage_sub_model.php');
            }
        }

    function edit_provider()
        {


        $slider_name = $this->escape_string($_FILES['slider']['name']);
//        echo "slider "; print_r($slider_name);
//       echo "<br> ,slider old"; print_r($_POST['slider_name1']);
//        die();
        $pdf_english = $this->escape_string($_FILES['pdf_english']['name']);
        $pdf_arabic = $this->escape_string($_FILES['pdf_arabic']['name']);
        $text = $this->escape_string($_POST['text']);
        $website = $this->escape_string($_POST['website']);
        $social_link1 = $this->escape_string($_POST['social_link1']);
        $social_link2 = $this->escape_string($_POST['social_link2']);
        $social_link3 = $this->escape_string($_POST['social_link3']);
        $social_link4 = $this->escape_string($_POST['social_link4']);
        $content = $this->escape_string($_POST['content']);
        $content_arabic = $this->escape_string($_POST['content_arabic']);
        $s_name = $this->escape_string($_POST['name_service']);
        $s_mobile = $this->escape_string($_POST['mobile_service']);
        $s_email = $this->escape_string($_POST['email_service']);
        $s_address1 = $this->escape_string($_POST['line1_service']);
        $s_address2 = $this->escape_string($_POST['line2_service']);
        $s_address3 = $this->escape_string($_POST['line3_service']);
        $s_map = $this->escape_string($_POST['iframe_service']);

        $sr_name = $this->escape_string($_POST['name_showroom']);
        $sr_mobile = $this->escape_string($_POST['mobile_showroom']);
        $sr_email = $this->escape_string($_POST['email_showroom']);
        $sr_address1 = $this->escape_string($_POST['line1_showroom']);
        $sr_address2 = $this->escape_string($_POST['line2_showroom']);
        $sr_address3 = $this->escape_string($_POST['line3_showroom']);
        $sr_map = $this->escape_string($_POST['iframe_showroom']);
        $slider_active = $this->escape_string($_POST['slider_active']);
        $slider_id = $this->escape_string($_POST['slider_id']);
        if ($slider_name != NULL)
            {
//            print_r($slider_name);
            $allowed_filetypes = array('jpg', 'gif', 'bmp', 'png');
            $path_parts = pathinfo($slider_name);
            $ext = $path_parts['extension'];
            $slider_path = '../slider/';
            $full_path = 'slider/' . $slider_name;
            $thumb_path = 'slider/thumb/' . $slider_name;

            if (!in_array($ext, $allowed_filetypes))
                {
                $_SESSION['success'] = 'Invalid Image. Please upload (jpg,gif,png,bmp) only';
                $this->locate('edit_image.php?id=' . $slider_id . '');
                }
            move_uploaded_file($_FILES["slider"]["tmp_name"], $slider_path . $slider_name);
            $this->make_thumb('../' . $full_path, '../' . $thumb_path, 150, $ext);
            }
        else
            {
            $slider_name = $this->escape_string($_POST['slider_name1']);
            $full_path = "slider/" . $this->escape_string($_POST['slider_name1']);
            $thumb_path = "slider/thumb/" . $this->escape_string($_POST['slider_name1']);
            }
//         print_r($slider_name);
//        die();
//            $update = "update providers SET `provider_image` = '" . $slider_name . "', `thumb` = '" . $thumb_path . "', `full_path` = '" . $full_path . "', `show` = '" . $slider_active . "', `provider_name` = '" . $text . "', `s_name` = '" . $s_name . "',
// `s_mob` = '" . $s_mobile . "',
//  `pdf_english`	='".$pd_image_name."',
//  `pdf_arabic`	='".$pd_image_name1."',
// `s_email` = '" . $s_email . "',
// `s_address1` = '" . $s_address1 . "',
// `s_address2` = '" . $s_address2 . "',
// `s_address3` = '" . $s_address3 . "',
// `s_map` = '" . $s_map . "',
// `sr_name` = '" . $sr_name . "',
// `sr_mob` = '" . $sr_mobile . "',
// `sr_email` = '" . $sr_email . "',
// `sr_address1` = '" . $sr_address1 . "',
// `sr_address2` = '" . $sr_address2 . "',
// `sr_address3` = '" . $sr_address3 . "',
// `website` = '" . $website . "',
// `social_link1` = '" . $social_link1 . "',
// `social_link2` = '" . $social_link2 . "',
// `social_link3` = '" . $social_link3 . "',
// `social_link4` = '" . $social_link4 . "',
// `content` = '" . $content . "',
// `content_arabic` = '" . $content_arabic . "',
// `sr_map` = '" . $sr_map . "' where `id` = '" . $slider_id . "'";
//        }
//        else
//            {
//            $slider_name1 = $this->escape_string($_POST['slider_name1']);
        //$pdf_english1 = $this->escape_string($_POST['pdf_english1']);
        /* -----------------code for pdf update------------------- */
        if (!empty($_FILES['pdf_english']['name']))
            {
            $pdf_allowed_filetypes = array('pdf');
            $pdf_path_parts = pathinfo($_FILES['pdf_english']['name']);
            $ext = $pdf_path_parts['extension'];
            if (!in_array($ext, $pdf_allowed_filetypes))
                {
                $_SESSION['success'] = 'Invalid document. Please upload (pdf only) only';
                $this->locate('add_providers.php');
                }

            $upload_path = '../pdf/';
            // $full_path1 = 'pdf_english/' . $pdf_english;
            $pd_image_name = time() . "_" . $_FILES['pdf_english']['name'];
            $pdf_path = $upload_path . $pd_image_name;
            move_uploaded_file($_FILES["pdf_english"]["tmp_name"], $pdf_path);
            }
        else
            {
            $pd_image_name = $this->escape_string($_POST['pdf_english1']);
            }
        if (!empty($_FILES['pdf_arabic']['name']))
            {
            $pdf_allowed_filetypes = array('pdf');
            $pdf_path_parts = pathinfo($_FILES['pdf_arabic']['name']);
            $ext = $pdf_path_parts['extension'];
            if (!in_array($ext, $pdf_allowed_filetypes))
                {
                $_SESSION['success'] = 'Invalid document. Please upload (pdf only) only';
                $this->locate('add_providers.php');
                }

            $upload_path = '../pdf/';
            // $full_path1 = 'pdf_english/' . $pdf_english;
            $pd_image_name1 = time() . "_" . $_FILES['pdf_arabic']['name'];
            $pdf_path = $upload_path . $pd_image_name1;
            move_uploaded_file($_FILES["pdf_arabic"]["tmp_name"], $pdf_path);
            }
        else
            {
            $pd_image_name1 = $this->escape_string($_POST['pdf_arabic1']);
            }

        /* -----------------End of pdf update--------------------- */
        echo $update = "update providers SET `provider_image` = '" . $slider_name . "', `thumb` = '" . $thumb_path . "', `full_path` = '" . $full_path . "', `show` = '" . $slider_active . "', `provider_name` = '" . $text . "', `s_name` = '" . $s_name . "',
 `s_mob` = '" . $s_mobile . "',
     `pdf_english` = '" . $pd_image_name . "',
     `pdf_arabic` = '" . $pd_image_name1 . "',
 `s_email` = '" . $s_email . "',
 `s_address1` = '" . $s_address1 . "',
 `s_address2` = '" . $s_address2 . "',
 `s_address3` = '" . $s_address3 . "',
 `s_map` = '" . $s_map . "',
 `sr_name` = '" . $sr_name . "',
 `sr_mob` = '" . $sr_mobile . "',
 `sr_email` = '" . $sr_email . "',
 `sr_address1` = '" . $sr_address1 . "',
 `sr_address2` = '" . $sr_address2 . "',
 `sr_address3` = '" . $sr_address3 . "',
 `website` = '" . $website . "',
 `social_link1` = '" . $social_link1 . "',
 `social_link2` = '" . $social_link2 . "',
 `social_link3` = '" . $social_link3 . "',
 `social_link4` = '" . $social_link4 . "',
 `content` = '" . $content . "',
 `content_arabic` = '" . $content_arabic . "',
 `sr_map` = '" . $sr_map . "' where `id` = '" . $slider_id . "'";
//            }
//        print_r($update);
//        die();
        $query = $this->Executequery($update) or die(mysql_error());
        if ($query)
            {
            $_SESSION['success'] = 'Successfully Uploaded';
            $this->locate('providers.php');
            }
        }

    function add_provider()
        {
//                print_r($_POST);
//			die('helll');
        $slider_name = $this->escape_string($_FILES['slider']['name']);
        $pdf_english = $this->escape_string($_FILES['pdf_english']['name']);
        $pdf_arabic = $this->escape_string($_FILES['pdf_arabic']['name']);
        $text = $this->escape_string($_POST['text']);
        $website = $this->escape_string($_POST['website']);
        $content = $this->escape_string($_POST['content']);
        $content_arabic = $this->escape_string($_POST['content_arabic']);
        $social_link1 = $this->escape_string($_POST['social_link1']);
        $social_link2 = $this->escape_string($_POST['social_link2']);
        $social_link3 = $this->escape_string($_POST['social_link3']);
        $social_link4 = $this->escape_string($_POST['social_link4']);
        $s_name = $this->escape_string($_POST['name_service']);
        $s_mobile = $this->escape_string($_POST['mobile_service']);
        $s_email = $this->escape_string($_POST['email_service']);
        $s_address1 = $this->escape_string($_POST['line1_service']);
        $s_address2 = $this->escape_string($_POST['line2_service']);
        $s_address3 = $this->escape_string($_POST['line3_service']);
        $s_map = $this->escape_string($_POST['iframe_service']);

        $sr_name = $this->escape_string($_POST['name_showroom']);
        $sr_mobile = $this->escape_string($_POST['mobile_showroom']);
        $sr_email = $this->escape_string($_POST['email_showroom']);
        $sr_address1 = $this->escape_string($_POST['line1_showroom']);
        $sr_address2 = $this->escape_string($_POST['line2_showroom']);
        $sr_address3 = $this->escape_string($_POST['line3_showroom']);
        $sr_map = $this->escape_string($_POST['iframe_showroom']);

        $allowed_filetypes = array('jpg', 'gif', 'bmp', 'png');
        $path_parts = pathinfo($slider_name);
        $ext = $path_parts['extension'];
        $slider_path = '../slider/';
        $full_path = 'slider/' . $slider_name;
        $thumb_path = 'slider/thumb/' . $slider_name;
        $slider_active = $this->escape_string($_POST['slider_active']);
        if (!in_array($ext, $allowed_filetypes))
            {
            $_SESSION['success'] = 'Invalid Image. Please upload (jpg,gif,png,bmp) only';
            $this->locate('add_slider.php');
            }
        move_uploaded_file($_FILES["slider"]["tmp_name"], $slider_path . $slider_name);
        $this->make_thumb('../' . $full_path, '../' . $thumb_path, 150, $ext);
        /* _________pdf upload code_______________ */

        if (!empty($_FILES['pdf_english']['name']))
            {
            $pdf_allowed_filetypes = array('pdf');
            $pdf_path_parts = pathinfo($_FILES['pdf_english']['name']);
            $ext = $pdf_path_parts['extension'];
            if (!in_array($ext, $pdf_allowed_filetypes))
                {
                $_SESSION['success'] = 'Invalid document. Please upload (pdf only) only';
                $this->locate('add_providers.php');
                }


            $upload_path = '../pdf/';
            // $full_path1 = 'pdf_english/' . $pdf_english;
            $pd_image_name = time() . "_" . $_FILES['pdf_english']['name'];
            $pdf_path = $upload_path . $pd_image_name;
            move_uploaded_file($_FILES["pdf_english"]["tmp_name"], $pdf_path);
            }
        /* ------------End of file uplod-------------------------- */
        /* ----------------pdf upload code for Arabic--------------- */
        if (!empty($_FILES['pdf_arabic']['name']))
            {
            $pdf_allowed_filetypes1 = array('pdf');
            $pdf_path_parts1 = pathinfo($_FILES['pdf_arabic']['name']);
            $ext = $pdf_path_parts1['extension'];
            if (!in_array($ext, $pdf_allowed_filetypes1))
                {
                $_SESSION['success'] = 'Invalid document. Please upload (pdf only) only';
                $this->locate('add_providers.php');
                }


            $upload_path1 = '../pdf_arabic/';
            // $full_path1 = 'pdf_english/' . $pdf_english;
            $pd_image_name1 = time() . "_" . $_FILES['pdf_arabic']['name'];
            $pdf_path1 = $upload_path1 . $pd_image_name1;
            move_uploaded_file($_FILES["pdf_arabic"]["tmp_name"], $pdf_path1);
            }
        /* ----------------End of Arabic pdf Code------------------- */
        $insert = "INSERT INTO providers SET
`provider_image` = '" . $slider_name . "',
 `thumb` = '" . $thumb_path . "',
 `full_path` = '" . $full_path . "',
 `pdf_english`	=	'" . $pd_image_name . "',
     `pdf_arabic`	=	'" . $pd_image_name1 . "',
 `show` = '" . $slider_active . "',
 `provider_name` = '" . $text . "',
 `website` = '" . $website . "',
 `social_link1` = '" . $social_link1 . "',
 `social_link2` = '" . $social_link2 . "',
 `social_link3` = '" . $social_link3 . "',
 `social_link4` = '" . $social_link4 . "',
 `content` = '" . $content . "',
 `content_arabic` = '" . $content_arabic . "',
 `s_name` = '" . $s_name . "',
 `s_mob` = '" . $s_mobile . "',
 `s_email` = '" . $s_email . "',
 `s_address1` = '" . $s_address1 . "',
 `s_address2` = '" . $s_address2 . "',
 `s_address3` = '" . $s_address3 . "',
 `s_map` = '" . $s_map . "',
 `sr_name` = '" . $sr_name . "',
 `sr_mob` = '" . $sr_mobile . "',
 `sr_email` = '" . $sr_email . "',
 `sr_address1` = '" . $sr_address1 . "',
 `sr_address2` = '" . $sr_address2 . "',
 `sr_address3` = '" . $sr_address3 . "',
 `sr_map` = '" . $sr_map . "'";

        $query = $this->Executequery($insert);
        if ($query)
            {
            $_SESSION['success'] = 'Successfully Uploaded';
            $this->locate('providers.php');
            }
        }

    //for join table
    function get_join_data($table1, $id1, $table2, $id2, $field, $sorting)
        {
        $select = "SELECT  $table1.*,$table2.$field from $table1 LEFT JOIN $table2 ON $table1.$id1=$table2.$id2 order by  $table2.$field $sorting";

        $query = $this->Executequery($select);
        $rows = mysql_num_rows($query);
        if ($rows > 0)
            {
            while ($results = mysql_fetch_Assoc($query))
                {
                $abc[] = $results;
                }
            return $abc;
            }
        }

    /* -----------------end join------------------ */

    function get_product_details($table1, $field, $sorting)
        {
        $select = "SELECT  * FROM  $table1  order by  $field $sorting";

        $query = $this->Executequery($select);
        $rows = mysql_num_rows($query);
        if ($rows > 0)
            {
            while ($results = mysql_fetch_Assoc($query))
                {
                $abc[] = $results;
                }
            return $abc;
            }
        }

    }

?>