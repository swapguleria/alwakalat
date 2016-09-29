<?php
include("includes/header.php");
if (@$_GET['mid']) {
    $mid = $_GET['mid'];
    $title = " البحث عن " . $get->get_single_field('tbl_maker', 'name', 'id', $mid);
}
if (@$_GET['bid']) {
    $bid = $_GET['bid'];
    $title = " البحث عن " . $get->get_single_field('tbl_body_type', 'name', 'id', $bid);
}
if (@$_GET['moid']) {
    $moid = $_GET['moid'];
}
if (@$_GET['smid']) {
    $smid = $_GET['smid'];
}
if (@$_GET['price']) {
    $price = $_GET['price'];
}
if (@$_GET['year']) {
    $year = $_GET['year'];
}
if (@$_GET['milage']) {
    $milage = $_GET['milage'];
}
if (@$_GET['order']) {
    $order = $_GET['order'];
} else {
    $order = 'id';
}
if (@$_GET['sort']) {
    $sorting = $_GET['sort'];
} else {
    $sorting = 'asc';
}
if (@$_GET['budget']) {
    if (@$_GET['budget'] == 1) {
        $price = 0;
    } else {
        if (isset($_GET['price'])) {
            if ($_GET['price'] == '0-0') {
                $price = 'a';
            }
            $moid = 0;
            $mid = 0;
        }
    }
}
//print_r($price);
$results = $get->get_search_result($id, $mid, $moid, $smid, $bid, $price, $year, $milage, $sorting, $order);
//echo '<pre>';
//print_r($results); 
//echo '</pre>';
?>
<section>		
    <div id="car_search">		
        <div class="container">	
            <div class="row">	
                <div class="car_search_header clearfix">						
                    <div class="col-sm-4 pull-left">				
                        <h3>السيارة بحث <?= $title ?> </h3>
                    </div>						
                    <div class="col-sm-6 pull-right text-right carsearch_new">							
                        <div class="form-group">						
                            <form action="" method="get">
                                <?php
                                echo (@$mid) ? '<input type="hidden" name="mid" value="' . $mid . '">' : '';
                                echo (@$bid) ? '<input type="hidden" name="bid" value="' . $bid . '">' : '';
                                echo (@$moid) ? '<input type="hidden" name="moid" value="' . $moid . '">' : '';
                                echo (@$price) ? '<input type="hidden" name="price" value="' . $price . '">' : '';
                                echo (@$smid) ? '<input type="hidden" name="smid" value="' . $smid . '">' : '';
                                echo (@$year) ? '<input type="hidden" name="year" value="' . $year . '">' : '';
                                echo (@$sort) ? '<input type="hidden" name="sort" value="' . $sort . '">' : '';
                                ?>
                                ترتيب حسب:
                                <select name="order" onchange="javascript: submit()">
                                    <option value="id" <?php echo ($_GET['order'] == 'id') ? 'selected="Selected"' : ''; ?>>الاجدد </option>
                                    <option value="year" <?php echo ($_GET['order'] == 'year') ? 'selected="Selected"' : ''; ?>>السنة</option>
                                    <option value="price" <?php echo ($_GET['order'] == 'price') ? 'selected="Selected"' : ''; ?>>السعر</option>
                                </select>
                            </form>

                        </div>
                    </div>				
                </div>				
            </div>		
            <div class="row">			
                <div id="car_model" class="clearfix">	
                    <div class="col-sm-9 car_model">						
                        <?php
                        if (isset($_POST['color'])) {
//        echo '<pre>';
//    print_r($results);
//    echo '</pre>';
                            echo "The selected Value is <b>" . $_POST['color'] . "</b><br><br>";
                        }

                        if (@$results) {
                            foreach ($results as $key => $val) {
//                            echo '<pre>';
//                            print_r($val);
//                            echo '</pre>';
//                            break;
                                ?><div class="car_model_inner loaditems" style="display:none;">								
                                    <div class="car_model_content">								
                                        <div class="car_model_img">									
                                            <?php
                                            if ($val['banner_image']) {
                                                ?>
                                                <img src="http://alwakalat.com/timthumb/timthumb.php?w=275&h=255&src=http://www.alwakalat.com/approvedCars/wdir/uploads/<?php echo $val['banner_image']; ?>"/> <?php
                                            } else {
                                                ?><img src="<?php echo $main_url; ?>/approvedCars/themes/basic/images/nocarimage.jpg"/>


                                            <?php } ?>									
                                            <div class="car_model_hover">								
                                                <div class="car_model_hover_inner text-center">									
                                                    <a href="approvedCar.php?id=<?php echo $val[id]; ?>" class="btn btn-default hover_btn " style="background: rgba(49, 39, 131, 0.8) none repeat scroll 0 0;    border: medium none;  border-radius: 0;    color: #fff;    margin-top: 37%;    padding: 14px;    text-transform: uppercase;">شاهد التفاصيل</a>							
                                                </div>								
                                            </div>							
                                        </div>									
                                        <div class="car_text">
                                            <h3><?php
                                                echo $get->get_single_field('tbl_maker', 'name', 'id', $val['maker_id'])
                                                , ' '
                                                , $get->get_single_field('tbl_car_model', 'model_name', 'id', $val['model_id'])
                                                , ' '
                                                , $get->get_single_field('tbl_body_type', 'name', 'id', $val['body_type_id']);
                                                ?></h3>										
                                            <h4>QAR <?php echo number_format($val['price']); ?></h4>		
                                                <?php
//                                              <----------  get the year of worranty Start------------->
                                                $date_parts1 = date('Y');
                                                $date_parts2 = explode("-", $val['warranty_expire_date']);
                                                $year = $date_parts2[0] - $date_parts1;
                                                if (@$year) {
                                                    if ($year > '1') {
                                                        $year = $year . " Years";
                                                    } else {
                                                        $year = $year . " Year";
                                                    }
                                                } else {
                                                    $curdate = strtotime(date("Y-m-d"));
                                                    $mydate = strtotime($val['warranty_expire_date']);
                                                    if ($curdate > $mydate) {
                                                        $year = 'Expired';
                                                    } else {
                                                        $year = 'This Years';
                                                    }
                                                }
//                                              <----------  get the year of worranty Start------------->
                                                ?>

                                            <div class="car_text_2">
                                                <p>الضمان</p>
                                                <span class="pull-right"><?php echo $year; ?></span>
                                            </div>										
                                            <div class="car_text_2">
                                                <p>قاطع</p>						
                                                <span class="pull-right"><?php echo $val['milage'], ' km'; ?></span>						
                                            </div>
                                            <div class="car_text_2">
                                                <p>السرعة</p>
                                                <span class="pull-right"><?php echo (@$val['speed']) ? $val['speed']." Ma" : "N/A"; ?></span>
                                            </div>
                                            <div class="car_text_2">
                                                <p>التسارع 0-100</p>
                                                <span class="pull-right"><?php echo (@$val['acceleration'] !='0.0') ? $val['acceleration']." Seconds" : "N/A"; ?></span>
                                            </div>
                                            <div class="car_text_2">
                                                <p>سعة المحرك</p>
                                                <span class="pull-right"><?php echo (@$val['engine_size']!='0.0') ? $val['engine_size']." L" : "N/A"; ?></span>
                                            </div>
                                            <div class="car_text_2">
                                                <p>حصان</p>
                                                <span class="pull-right"><?php echo (@$val['horse_power']) ? $val['horse_power']." HP" : "N/A"; ?></span>
                                            </div>    
                                        </div>	
                                    </div>	
                                </div>
                            <?php }
                            ?> <div class="col-md-12">
                                <div class="col-sm-4 col-sm-offset-4">
                                    <div class="more_list_item">
                                        <a href="javascript:void(0)" id="ViewMoreListItema">حمل اكثر</a>
                                    </div>
                                </div>
                            </div><?php
                        } else {
                            ?>
                            <div class="alert alert-danger">
                                <strong>عذرا!</strong> لا يوجد سيارات.
                            </div> 
                        <?php } ?> 




                    </div>						
                    <div class="col-sm-3 add">							
                        <div class="add-inner text-right">								
                            <img src="images/add_1.jpg"/>								
                            <img src="images/add_2.jpg"/>							
                        </div>						
                    </div>					
                </div>					
                <div id="buttons" class="text-center">						
                    <div class="car_model_btn">							
                        <div class="car_model_btn_prev">								
<!--                                <p>Previous<i class="fa fa-arrow-left" aria-hidden="true"></i></p>								
                            <p><i class="fa fa-arrow-right" aria-hidden="true"></i>next</p>-->
                        </div>						
                    </div>					
                </div>				
            </div>			
        </div>		
    </div>   
</section>


<?php include("includes/footer.php") ?>    
