<?php

class model
    {

    function redirect($url)
        {
        header('location:' . $url . '');
        exit();
        }

    function escape_string($value)
        {
        $return = mysql_real_escape_string(stripslashes(trim($value)));
        return $return;
        }

    function login()
        {
        $email = $this->escape_string($_POST['email']);
        $password = $this->escape_string($_POST['password']);
        $select = "select * from `register` where `email`='" . $email . "' AND `password`='" . md5($password) . "'";
        $query = mysql_query($select) or die(mysql_error());
        $rows = mysql_num_rows($query);
        if ($rows > 0)
            {
            $fetch = mysql_fetch_Assoc($query);
            $_SESSION['email'] = $fetch['email'];
            $_SESSION['user_id'] = $fetch['user_id'];
            $_SESSION['profile'] = $fetch['profile'];
            if ($fetch['profile'] == "expert")
                {
                $this->redirect('expert-profile.php');
                }
            else
                {
                $this->redirect('expert-profile.php');
                }
            }
        else
            {
            $_SESSION['error'] = 'Invalid Credential';
            $this->redirect('login.php');
            }
        }

    function is_login()
        {
        if (isset($_SESSION['admin_id']))
            {
            $this->redirect('index.php');
            }
        }

    function is_not_login()
        {

        if (!isset($_SESSION['admin_id']))
            {
            $this->redirect('login.php');
            }
        }

    function Executequery($query)
        {
        $result = mysql_query($query) or die(mysql_error());
        return $result;
        }

    function logout()
        {
        unset($_SESSION['admin_id']);
        unset($_SESSION['admin_username']);
        unset($_SESSION['type']);
        $this->redirect('login.php');
        }

    function get_all_result($table, $field, $order)
        {
        $select = "select * from `$table` order by `$field` $order";
        $query = mysql_query($select) or die(mysql_error());
        $rows = mysql_num_rows($query);
        if ($rows > 0)
            {
            while ($fetch = mysql_fetch_assoc($query))
                {
                $abc[] = $fetch;
                }
            return $abc;
            }
        }

    function add_user()
        {
        $fname = $this->escape_string($_POST['fname']);
        $lname = $this->escape_string($_POST['lname']);
        $email = $this->escape_string($_POST['email']);
        $password = $this->escape_string($_POST['password']);
        $business_type = $this->escape_string($_POST['business_type']);
        $website = $this->escape_string($_POST['website']);
        $phone = $this->escape_string($_POST['phone']);
        $address = $this->escape_string($_POST['address']);
        $breif = $this->escape_string($_POST['breif']);
        $country = $this->escape_string($_POST['country']);
        $state = $this->escape_string($_POST['state']);
        $city = $this->escape_string($_POST['city']);
        $profile = $this->escape_string($_POST['profile']);
        $insert = "INSERT INTO `register`(`firstname`, `lastname`, `password`, `email`, `business_type`, `website`, `phone`, `address`, `breif`, `country`, `state`, `city`,`profile`) VALUES ('" . $fname . "','" . $lname . "','" . md5($password) . "','" . $email . "','" . $business_type . "','" . $website . "','" . $phone . "','" . $address . "','" . $breif . "','" . $country . "','" . $state . "','" . $city . "','" . $profile . "')";
        $query = mysql_query($insert) or die(mysql_error());
        if ($query)
            {
            $_SESSION['success'] = "Your registration is successfull!";
            if ($profile == "member")
                {
                $this->redirect('user-register.php');
                }
            else
                {
                $this->redirect('register.php');
                }
            }
        }

    function delete($table, $field, $id, $page)
        {
        $delete = "delete from $table  where `$field`=	'" . $id . "'";
        $query = mysql_query($delete) or die(mysql_error());
        if ($query)
            {
            $_SESSION['success'] = 'Delete Successfully';
            $this->redirect($page);
            }
        }

    function get_single_result($table, $field, $id)
        {
        $select = "select * from  $table where `$field`='" . $id . "'";
        $query = mysql_query($select) or die(mysql_error());
        $fetch = mysql_fetch_Assoc($query);
        return $fetch;
        }
    function get_single_result_for_used_car($table, $field, $id)
        {
        $date = date('y-m-d');
        $select = "select * from  tbl_used_car where `state_id`='1'and expire_date > '" . $date . "' and  `$field`='" . $id . "'";
        $query = mysql_query($select) or die(mysql_error());
        $fetch = mysql_fetch_Assoc($query);
        return $fetch;
        }

//    function get_search_result($field, $id)
//        {
//        $select = "select * from  tbl_used_car where `state_id`='1' and `type_id`='1' and `$field`='" . $id . "'";
//        $query = $this->Executequery($select);
//        $rows = mysql_num_rows($query);
//        if ($rows > 0)
//            {
//            while ($results = mysql_fetch_Assoc($query))
//                {
//                $abc[] = $results;
//                }
//            return $abc;
//            }
//        }

    function get_search_result($id = NUll, $mid = NUll, $moid = NUll, $smid = NUll, $bid = NUll, $price = NUll, $year = NUll, $milage = NUll, $sorting = NUll, $order = NUll)
        {
//        print_r($price);
//        $select .= "select * from `$table` where ' ";

        $date = date('y-m-d');
        $select = "select * from  tbl_used_car where `state_id`='1'and expire_date > '" . $date . "'  ";
        if (@$id)
            {
            $select .=" and id = " . $id;
            }
        if (@$mid)
            {
            $select .=" and  maker_id = " . $mid;
            }
        if (@$moid)
            {
            $select .=" and  model_id = " . $moid;
            }
        if (@$smid)
            {
            $select .=" and  sub_model_id = " . $smid;
            }
        if (@$bid)
            {
            $select .=" and  body_type_id = " . $bid;
            }
        if (@$price)
            {
            if ($price == 'a')
                {
                $select .=" and  price = 0";
                }
            else
                {
                $pri = explode('-', $price);
                $select .=" and  price >= " . $pri[0];
                $select .=" and  price <= " . $pri[1];
                }
            }
        if (@$year)
            {
            $select .=" and  year = " . $year;
            }
        if (@$milage)
            {
            $select .=" and  milage = " . $milage;
            }
        $select .= " order by `$order` $sorting ";
        // print_r($select);
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

    function get_search_result_post($id = NUll, $mid = NUll, $moid = NUll, $smid = NUll, $bid = NUll, $price = NUll, $year = NUll, $milage = NUll, $sorting = NUll, $order = NUll)
        {
//        print_r($price);
//        $select .= "select * from `$table` where ' ";

        $date = date('y-m-d');
        $select = "select * from  tbl_used_car where `state_id`='1' and expire_date > '" . $date . "'  ";
        if (@$id)
            {
            $select .=" and id = " . $id;
            }
        if (@$mid)
            {
            $select .=" and  maker_id = " . $mid;
            }
        if (@$moid)
            {
            $select .=" and  model_id = " . $moid;
            }
        if (@$smid)
            {
            $select .=" and  sub_model_id = " . $smid;
            }
        if (@$bid)
            {
            $select .=" and  body_type_id = " . $bid;
            }
        if (@$price)
            {
            if ($price == 1)
                {
                $select .=" and  price <=65000";
                }
            elseif ($price == 2)
                {
                $select .=" and  price <=100000";
                }
            elseif ($price == 3)
                {
                $select .=" and  price <=125000";
                }
            elseif ($price == 4)
                {
                $select .=" and  price <=150000";
                }
            elseif ($price == 5)
                {
                $select .=" and  price <=200000";
                }
            elseif ($price == 6)
                {
                $select .=" and  price <=250000";
                }
            elseif ($price == 7)
                {
                $select .=" and  price <=350000";
                }
            elseif ($price == 8)
                {
                $select .=" and  price <=500000";
                }
            elseif ($price == 9)
                {
                $select .=" and  price >=500000";
                }
            }
        if (@$year)
            {
            $select .=" and  year = " . $year;
            }
        if (@$milage)
            {
            $select .=" and  milage <= " . $milage;
            }
        $select .= " order by `$order` $sorting ";
//        print_r($select);
//        die();
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

    function getFuelOptions($id = null)
        {
        $list = array("Petrol", "Diesel", "CNG", "LPG", "Electric", "Hybrid");
        if ($id == null) return $list;
        if (is_numeric($id)) return $list [$id];
        return $id;
        }

    function getOwnersOptions($id = null)
        {
        $list = array("First Owner", "Second Owner", "Third or More Owners", "Unregistered Car");
        if ($id == null) return $list;
        if (is_numeric($id)) return $list [$id];
        return $id;
        }

    function getTransmissionOptions($id = null)
        {
        $list = array("Manual transmission", "Automatic transmission", "Continuously variable transmission (CVT)", "Semi-automatic and dual-clutch transmissions");
        if ($id == null) return $list;
        if (is_numeric($id)) return $list [$id];
        return $id;
        }

    function getColourOptions($id = null)
        {
        $list = array("White", "Black", "Silver", "Red", "Blue", "Grey", "Beige", "Brown", "Gold / Yellow", "Green", "Purple", "Maroon", "Others");
        if ($id == null) return $list;
        if (is_numeric($id)) return $list [$id];
        return $id;
        }

    /*     * *************get event images************************* */

    function get_all_event_imgs($table, $field, $sorting, $event_id)
        {
        $select = "select * from `$table` where event_id= '" . $event_id . "' AND status='active' order by `$field` $sorting ";
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

    function get_single_field($table, $want, $field, $id)
        {
        $select = "select $want from  $table where `$field`='" . $id . "'";
        $query = mysql_query($select) or die(mysql_error());
        $fetch = mysql_fetch_Assoc($query);
        return $fetch[$want];
        }

    function get_all_data_active($table, $field, $sorting, $active, $value)
        {
        $select = "select * from `$table` where `$active`='" . $value . "' order by `$field` $sorting ";
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

    function get_price($by)
        {
        $date = date('y-m-d');
        $select = "select " . $by . "(`price`) as mi from `tbl_used_car` where `state_id`='1'  and expire_date > '" . $date . "'";
        $query = $this->Executequery($select);
        $rows = mysql_num_rows($query);
        if ($rows > 0)
            {
            $results = mysql_fetch_Assoc($query);
            }

        return $results;
        }

    function get_all_data_active_approved_car($table, $field, $sorting, $active, $value)
        {
        $date = date('y-m-d');
        $select = "select * from `$table` where `state_id`='1' and expire_date > '" . $date . "' and`$active`='" . $value . "' order by `$field` $sorting ";
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

    function get_all_approved_card()
        {
        $date = date('y-m-d');
        $select = "select * from `tbl_used_car` where `state_id`='1'  and expire_date > '" . $date . "' ORDER BY rand() LIMIT 4 ";

//        print_r($select);
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

    function get_all_approved_card_by_body($bodyType)
        {

        $date = date('y-m-d');
        $select = "select * from `tbl_used_car` where `state_id`='1' and expire_date > '" . $date . "' and body_type_id=" . $bodyType . " ORDER BY rand() LIMIT 4";
//        print_r($select);
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

    function get_all_event_data($table, $field, $sorting, $active, $value)
        {
        $select = "";
        $select .= "select * from `$table` where `$active`='" . $value . "' order by `$field` $sorting ";
        $select .= " LIMIT 0 , 2";
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

    function get_all_event_data_all($table, $field, $sorting, $active, $value)
        {
        $select = "";
        $select .= "select * from `$table` where `$active`='" . $value . "' order by `$field` $sorting ";
//        $select .= " LIMIT 0 , 2";
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

    function get_all_data($table, $field, $sorting)
        {
        $select = "select * from $table order by $field $sorting ";
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

// get the review 
    function get_review($id = NULL, $limit = NULL, $cat_id = NULL)
        {
        $select = "select * from reviews Where 1 ";

        if (@$id)
            {
            $select .= " and id = " . $id;
            }
        if (@$cat_id)
            {
            $select .= " and cat_id = " . $cat_id;
            }
        $select .= " order by id DESC";
        if (@limit)
            {
            $select .= " limit 0,3";
            }

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

    function get_view($id = NULL, $limit = NULL)
        {
        $select = "select * from reviews Where 1 ";
        if (@$id)
            {
            $select .= " and id = " . $id;
            }
        $select .= " order by view DESC";
        if (@limit)
            {
            $select .= " limit 0,3";
            }

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

    // for views 
    function update_view($id = NULL)
        {
        $select = "update reviews set view = view + 1 where cat_id = " . $id;
        $query = $this->Executequery($select);
        }

    /*     * ******************Get Cars*************************** */

    //for join table
    function get_join_data($table1, $id1, $table2, $id2, $field, $sorting)
        {
        $select = "SELECT * FROM $table1 INNER JOIN $table2 ON $table1.$id1=$table2.$id2 order by  $table1.$field $sorting";

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

    public function get_All_Cars($start = NULL, $record_per_page = NULL)
        {


        $query = "";
        $query .= "SELECT * FROM car_data";
        $total_records = $this->Executequery($query);
        $query .= " LIMIT $start , $record_per_page";
        $stmt = $this->db->query($query);
        return array('query1' => $stmt, 'totalrecord' => $total_records);
        }

    /*     * ************pagination******** */

    function pagination($page = 1, $total_records_found, $per_page = 10, $url = '?')
        {
        $total = $total_records_found;
        $adjacents = "2";

        $page = ($page == 0 ? 1 : $page);
        $start = ($page - 1) * $per_page;

        $prev = $page - 1;
        $next = $page + 1;
        $lastpage = ceil($total / $per_page);
        $lpm1 = $lastpage - 1;

        $pagination = "";
        if ($lastpage > 1)
            {
            $pagination .= "<ul class='pagination'>";
            //$pagination .= "<li class='details'>Page $page of $lastpage</li>";
            if ($page > $counter + 1)
                {
                $pagination.= "<li><a href='{$url}page=$prev'>Prev</a></li>";
                }
            else
                {
                $pagination.= "<li><a>Prev</a></li>";
                }
            if ($lastpage < 7 + ($adjacents * 2))
                {
                for ($counter = 1; $counter <= $lastpage; $counter++)
                    {
                    if ($counter == $page) $pagination.= "<li class='active'><a>$counter</a></li>";
                    else $pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";
                    }
                }
            elseif ($lastpage > 5 + ($adjacents * 2))
                {
                if ($page < 1 + ($adjacents * 2))
                    {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                        {
                        if ($counter == $page) $pagination.= "<li class='active'><a>$counter</a></li>";
                        else $pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";
                        }
                    $pagination.= "<li class='dot'>...</li>";
                    $pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";
                    $pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";
                    }
                elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
                    {
                    $pagination.= "<li><a href='{$url}page=1'>1</a></li>";
                    $pagination.= "<li><a href='{$url}page=2'>2</a></li>";
                    $pagination.= "<li class='dot'>...</li>";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                        {
                        if ($counter == $page) $pagination.= "<li class='active'><a>$counter</a></li>";
                        else $pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";
                        }
                    $pagination.= "<li class='dot'>..</li>";
                    $pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";
                    $pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";
                    }
                else
                    {
                    $pagination.= "<li><a href='{$url}page=1'>1</a></li>";
                    $pagination.= "<li><a href='{$url}page=2'>2</a></li>";
                    $pagination.= "<li class='dot'>..</li>";
                    for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                        {
                        if ($counter == $page) $pagination.= "<li class='active'><a>$counter</a></li>";
                        else $pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";
                        }
                    }
                }

            if ($page < $counter - 1)
                {
                $pagination.= "<li><a href='{$url}page=$next'>Next</a></li>";
                //$pagination.= "<li><a href='{$url}&page=$lastpage'>Last</a></li>";
                }
            else
                {
                $pagination.= "<li><a>Next</a></li>";
                //$pagination.= "<li class='active'><a>Last</a></li>";
                }
            $pagination.= "</ul>\n";
            }


        return $pagination;
        }

    function get_filtered_cars($maker_id, $maker_val, $body_type = NULL, $body_val = NULL, $price = NULL, $price_val = NULL)
        {
        $select = "SELECT * FROM car_data WHERE $maker_id='" . $maker_val . "' ";

        if ($body_type !== NULL && $body_val !== NULL)
            {
            if ($body_val !== 'All')
                {
                $select .= "AND " . $body_type . " = '" . $body_val . "' ";
                }
            }
        if ($price !== NULL && $price_val !== NULL)
            {
            if ($price_val !== 'All')
                {
                $select .= "AND " . $price . " " . $price_val;
                }
            }
        //print_r($select); 
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

    /* ==================  Start Get product function ====================== */

    function get_products($table1 = null, $id = null, $value = null, $field = null, $sorting = null)
        {

        $select = "SELECT * FROM $table1";
        if (isset($id) && !empty($id) && isset($value) && !empty($value))
            {
            $select .= " WHERE $id = $value";
            }
        if (isset($field) && !empty($field) && isset($sorting) && !empty($sorting))
            {
            $select .= " ORDER BY $field $sorting";
            }


        //print_r($select); 
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

    /* ================    End get product function ======================= */

    /* ================  START get product Details By their product ID  ===== */


    /* ==============    End Get product Details By their product ID ========= */

    function get_products_details($table1 = null, $id = null, $value = null, $offset = null, $limit = null)
        {

        $select = "SELECT * FROM $table1";
        if (isset($id) && !empty($id) && isset($value) && !empty($value))
            {
            $select .= " WHERE $id = $value";
            }
        if (isset($offset) && !empty($offset) && isset($limit) && !empty($limit))
            {
            $select .= " LIMIT  $offset $limit";
            }
        //print_r($select); 
        $query = $this->Executequery($select);
        $rows = mysql_num_rows($query);
        if ($rows > 0)
            {
            $results = mysql_fetch_Assoc($query);

            return $results;
            }
        }

    function get_product_color_names($table_name, $field, $id, $value)
        {
        $select = "SELECT color , p_id, pd_id FROM $table_name";
        if (isset($field) && !empty($field))
            {
            $select .= " GROUP BY $field";
            }
        if (isset($id) && !empty($id) && isset($value) && !empty($value))
            {
            $select .= " Having $id = $value ";
            }




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

    function get_product_size($table_name, $field1, $value1, $field2, $value2)
        {
        $select = "SELECT * FROM $table_name";
        if (isset($field1) && !empty($field1) && isset($value1) && !empty($value1))
            {
            $select .= " WHERE $field1=$value1";
            }

        if (isset($field2) && !empty($field2) && isset($value2) && !empty($value2))
            {
            $select .= " AND $field2 = '$value2'";
            }



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

    function get_product_description($table_name, $field1, $value1, $field2, $value2)
        {
        $select = "SELECT * FROM $table_name";
        if (isset($field1) && !empty($field1) && isset($value1) && !empty($value1))
            {
            $select .= " WHERE $field1=$value1";
            }

        if (isset($field2) && !empty($field2) && isset($value2) && !empty($value2))
            {
            $select .= " AND $field2 = $value2";
            }



        $query = $this->Executequery($select);
        $rows = mysql_num_rows($query);
        if ($rows > 0)
            {

            $results = mysql_fetch_Assoc($query);

            return $results;
            }
        }

    /* ================ Start Country list ============== */

    function get_country_list($table_name, $field1, $value1, $field2, $value2)
        {
        $select = "SELECT * FROM $table_name";
        if (isset($field1) && !empty($field1) && isset($value1) && !empty($value1))
            {
            $select .= " WHERE $field1 = $value1";
            }


        if (isset($field2) && !empty($field2) && isset($value2) && !empty($value2))
            {
            $select .= " ORDER BY $field2  $value2";
            }

        $query = $this->Executequery($select);
        $rows = mysql_num_rows($query);
        if ($rows > 0)
            {
            while ($rows = mysql_fetch_Assoc($query))
                {
                $results[] = $rows;
                }
            return $results;
            }
        }

    /* ================ End Country list ============== */
    /* ============== Start  Get Category in Shop Page =================== */

    function get_product_cat($table1 = null, $where_cond = null, $value = null, $field = null, $sorting = null)
        {
        $select = "SELECT * FROM $table1";

        if (isset($where_cond) && !empty($value))
            {

            $select .= " WHERE $where_cond = $value";
            }

        if (isset($field) && !empty($field) && isset($sorting) && !empty($sorting))
            {

            $select .= " order by  $field $sorting";
            }


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

    /* ==============  End  Get Category in Shop Page =================== */

    function get_single_product_details($table1 = null, $where_cond = null, $value = null)
        {
        $select = "SELECT * FROM $table1 WHERE $where_cond = $value";

        $query = $this->Executequery($select);

        $rows = mysql_num_rows($query);

        if ($rows > 0)
            {

            $results = mysql_fetch_Assoc($query);
            }

        return $results;
        }

    /* ============== End  Get Single product details ====================================== */

    function get_single_productdetails($table1 = null, $where_cond = null, $value = null)
        {
        $select = "SELECT * FROM $table1 WHERE $where_cond = $value";

        $query = $this->Executequery($select);

        $rows = mysql_num_rows($query);

        if ($rows > 0)
            {


            while ($rows = mysql_fetch_Assoc($query))
                {
                $results[] = $rows;
                }
            }

        return $results;
        }

    /* ============   END Get Single product details =========================== */
    }

?>