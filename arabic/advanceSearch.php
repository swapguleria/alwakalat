<?php
include("includes/header.php"); //print_r($_GET);
$makers = $get->get_all_data('tbl_maker', 'id', 'asc');
$models = $get->get_all_data('tbl_car_model', 'id', 'asc');
$bodys = $get->get_all_data('tbl_body_type', 'id', 'asc');

if (@$_GET['maker'])
    {
    if ($_GET['maker'])
        {
        $mid = $_GET['maker'];
        }
    if (@$_GET['bodyType'])
        {
        $bid = $_GET['bodyType'];
        }
    if (@$_GET['model'])
        {
        $moid = $_GET['model'];
        }
    if (@$_GET['order'])
        {
        $order = $_GET['order'];
        }
    else
        {
        $order = 'id';
        }
    if (@$_GET['price'])
        {
        $price = $_GET['price'];
        }
    if (@$_GET['sort'])
        {
        $sorting = $_GET['sort'];
        }
    else
        {
        $sorting = 'asc';
        }
    if (@$_GET['id'])
        {
        $order = $_GET['id'];
        }
    else
        {
        $order = 'id';
        }
    if (@$_GET['milage'])
        {
        $milage = $_GET['milage'];
        }
    if (@$_GET['year'])
        {
        $year = $_GET['year'];
        }
    $results = $get->get_search_result_post($id, $mid, $moid, $smid, $bid, $price, $year, $milage, $sorting, $order);
    }
?>
<section>		
    <div id="car_search">		
        <div class="container">	
            <div id="find_car" class="clearfix">                    
                <form action="#related" method="get" id="feedback" novalidate="novalidate">
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="find_car" class="find_car">
                                <div class="find_car_header clearfix">                                    
                                    <h3 class="pull-left">بحث تفصيلي </h3>
                                </div>
                                <div class="find_car_option">
                                    <div class="form-group text-center">
                                        <label>اختيار الصنع</label>
                                        <select name="maker" id="app_adv_search_makers" required="">
                                            <option value="">--اختيار الصنع--</option>
                                            <?php
                                            foreach ($makers as $maker)
                                                {
                                                ?>
                                                <option value="<?php echo $maker['id']; ?>" <?php
                                                if ($_GET['maker'] == $maker['id'])
                                                    {
                                                    echo 'Selected="Selected"';
                                                    }
                                                ?>><?php echo $maker['name']; ?></option>
                                                    <?php } ?>	
                                        </select>
                                    </div>
                                    <div class="form-group text-center">
                                        <label>اختيار الفئة</label>
                                        <select name="model" id="app_adv_search_models" required="">
                                            <option value="">--اختار الصنع اولا--</option>
                                            <?php
                                            foreach ($models as $model)
                                                {
                                                ?>
                                                <option value="<?php echo $model['maker_id']; ?>" <?php
                                                if ($_GET['model'] == $model['maker_id'])
                                                    {
                                                    echo 'Selected="Selected"';
                                                    }
                                                ?>><?php echo $model['model_name']; ?></option>
                                                    <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group text-center">
                                        <label>اختيار الصنف</label>
                                        <select id="filter_bodytype" name="bodyType" >
                                            <option value="">--اختيار الصنف--</option>
                                            <?php
                                            foreach ($bodys as $body)
                                                {
                                                ?>	
                                                <option value="<?php echo $body['id']; ?>" <?php
                                                if ($_GET['bodyType'] == $body['id'])
                                                    {
                                                    echo 'Selected="Selected"';
                                                    }
                                                ?>><?php echo $body['name']; ?></option>
                                                    <?php } ?>
                                        </select>
                                    </div>	
                                    <div class="form-group text-center">
                                        <label>اختيار السعر</label>
                                        <select id="filter_price" name="price" >
                                            <option value="">--اختيار السعر--</option>
                                            <option value="1"<?php
                                            if ($_GET['price'] == 1)
                                                {
                                                echo 'Selected="Selected"';
                                                }
                                            ?>>أقل من  65,000</option>
                                            <option value="2"<?php
                                            if ($_GET['price'] == 2)
                                                {
                                                echo 'Selected="Selected"';
                                                }
                                            ?>>أقل من  100,000</option>
                                            <option value="3"<?php
                                            if ($_GET['price'] == 3)
                                                {
                                                echo 'Selected="Selected"';
                                                }
                                            ?>>أقل من  125,000</option>	
                                            <option value="4"<?php
                                            if ($_GET['price'] == 4)
                                                {
                                                echo 'Selected="Selected"';
                                                }
                                            ?>>أقل من  150,000</option>
                                            <option value="5"<?php
                                            if ($_GET['price'] == 5)
                                                {
                                                echo 'Selected="Selected"';
                                                }
                                            ?>>أقل من  200,000</option>
                                            <option value="6"<?php
                                            if ($_GET['price'] == 6)
                                                {
                                                echo 'Selected="Selected"';
                                                }
                                            ?>>أقل من  250,000</option>
                                            <option value="7"<?php
                                            if ($_GET['price'] == 7)
                                                {
                                                echo 'Selected="Selected"';
                                                }
                                            ?>>أقل من  350,000</option>	
                                            <option value="8"<?php
                                            if ($_GET['price'] == 8)
                                                {
                                                echo 'Selected="Selected"';
                                                }
                                            ?>>أقل من  500,000</option>
                                            <option value="9" <?php
                                            if ($_GET['price'] == 9)
                                                {
                                                echo 'Selected="Selected"';
                                                }
                                            ?>>اكثر من QR 500,000</option>
                                            <!--                                           <option value="9"<?php
                                            if ($_GET['price'] == 9)
                                                {
                                                echo 'Selected="Selected"';
                                                }
                                            ?>>More than QR 500,000</option>-->
                                        </select>
                                    </div>
                                    <div class="form-group text-center">
                                        <label>اختيار قاطع </label>
                                        <select id="filter_price" name="milage" >
                                            <option value="">--اختيار قاطع --</option>
                                            <option value="10000" <?php
                                            if ($_GET['milage'] == 10000)
                                                {
                                                echo 'Selected="Selected"';
                                                }
                                            ?> > 0 -  10,000</option>
                                            <option value="20000" <?php
                                            if ($_GET['milage'] == 20000)
                                                {
                                                echo 'Selected="Selected"';
                                                }
                                            ?> >أقل من 20,000</option>
                                            <option value="30000" <?php
                                            if ($_GET['milage'] == 30000)
                                                {
                                                echo 'Selected="Selected"';
                                                }
                                            ?> >أقل من 30,000</option>
                                            <option value="40000" <?php
                                            if ($_GET['milage'] == 40000)
                                                {
                                                echo 'Selected="Selected"';
                                                }
                                            ?> >أقل من 40,000</option>
                                            <option value="50000" <?php
                                            if ($_GET['milage'] == 50000)
                                                {
                                                echo 'Selected="Selected"';
                                                }
                                            ?> >أقل من 50,000</option>
                                            <option value="60000" <?php
                                            if ($_GET['milage'] == 60000)
                                                {
                                                echo 'Selected="Selected"';
                                                }
                                            ?> >أقل من 60,000</option>





                                        </select>
                                    </div>
                                    <div class="form-group text-center">
                                        <label> اختيار السنة</label>
                                        <select id="filter_year" name="year" >
                                            <option value="">--اختيار السنة --</option>

                                            <?php
                                            $years = date("Y");
                                            for ($i = 6; $i > -1; $i--)
                                                {
                                                ?>              
                                                <option  value="<?php echo $ye = $years - $i ?>" <?php
                                                if ($_GET['year'] == $ye)
                                                    {
                                                    echo 'Selected="Selected"';
                                                    }
                                                ?>><?php echo $yea = $years - $i ?></option>                
                                                     <?php } ?>
                                        </select>
                                    </div>
                                    <div class="find_car_submit text-center">
                                        <input type="submit"  value="ابحث عن السيارة">
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div> 
                    <div class="row">
                </form>
                <div class="result"></div>
            </div>


            <?php
            if ($_GET['maker'])
                {
                ?><div id="related" class="advanced_related">
                    <div class="container">
                        <div class="row">
                            <div class="related col-sm-12">
                                <div class="related_header clearfix">
                                    <h3 class="pull-left">نتائج البحث</h3>
                                    <div class="find_car_filter pull-right">
                                        <form action="#related" method="get">
                                            <?php
                                            echo (@$mid) ? '<input type="hidden" name="maker" value="' . $mid . '">' : '';
                                            echo (@$moid) ? '<input type="hidden" name="model" value="' . $moid . '">' : '';
                                            echo (@$bid) ? '<input type="hidden" name="bodyType" value="' . $bid . '">' : '';
                                            echo (@$year) ? '<input type="hidden" name="year" value="' . $year . '">' : '';
                                            echo (@$price) ? '<input type="hidden" name="price" value="' . $price . '">' : '';
                                            echo (@$milage) ? '<input type="hidden" name="milage" value="' . $milage . '">' : '';
                                            ?>
                                            <div class="car_filter">
                                                <p>ترتيب حسب</p>
                                                <select name="order" onchange="javascript: submit()">
                                                    <option value="year" <?php echo(@$_GET['order'] == 'year') ? 'selected="Selected"' : ''; ?>>السنة</option> 
                                                    <option value="price" <?php echo (@$_GET['order'] == 'price') ? 'selected="Selected"' : ''; ?>>السعر</option>
                                                    <option value="milage" <?php echo (@$_GET['order'] == 'milage') ? 'selected="Selected"' : ''; ?>>قاطع</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php
                                if (@$results)
                                    {
                                    foreach ($results as $key => $val)
                                        {
                                        //                            echo '<pre>';
                                        //                            print_r($val);
                                        //                            echo '</pre>';
                                        //                            break;
                                        ?> <div class="related_cars col-sm-3">
                                            <div class="related_inner">
                                                <div class="related_img">
                                                    <?php
                                                    if ($val['banner_image'])
                                                        {
                                                        ?>
                                                        <img src="http://alwakalat.com/timthumb/timthumb.php?w=275&h=255&src=http://www.alwakalat.com/approvedCars/wdir/uploads/<?php echo $val['banner_image']; ?>"/>
                                                        <?php
                                                        }
                                                    else
                                                        {
                                                        ?><img src="<?php echo $main_url; ?>/approvedCars/themes/basic/images/nocarimage.jpg"/>

                                                    <?php } ?>
                                                    <div class="related_hover">
                                                        <div class="related_hover_inner  text-center">
                                                            <a href="approvedCar.php?id=<?php echo $val['id']; ?>"  class="btn btn-default hover_btn" style="background: rgba(49, 39, 131, 0.8) none repeat scroll 0 0;    border: medium none;  border-radius: 0;    color: #fff;    margin-top: 37%;    padding: 14px;    text-transform: uppercase;">شاهد التفاصيل</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="related_text">
                                                    <h3><?php echo $get->get_single_field('tbl_maker', 'name', 'id', $val['maker_id']), ' ', $get->get_single_field('tbl_car_model', 'model_name', 'id', $val['model_id']), ' ', $get->get_single_field('tbl_sub_model', 'name', 'id', $val['sub_model_id']); ?></h3>
                                                    <h4>QAR <?php echo number_format($val['price']); ?></h4> <?php
//                                              <----------  get the year of worranty Start------------->
                                                    $date_parts1 = date('Y');
                                                    $date_parts2 = explode("-", $val['warranty_expire_date']);
                                                    $year = $date_parts2[0] - $date_parts1;

                                                    $datetime1 = new DateTime($val['warranty_expire_date']);

                                                    $datetime2 = new DateTime(date('Y-m-d'));

                                                    $difference = $datetime1->diff($datetime2);


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
                                                        $mydate = strtotime($val['warranty_expire_date']);
                                                        if ($curdate > $mydate)
                                                            {
                                                            $year = 'Expired';
                                                            }
                                                        else
                                                            {
                                                            $year = 'This Years';
                                                            }
                                                        }
//                                              <----------  get the year of worranty Start------------->
                                                    ?>

                                                    <div class="related_text_2 clearfix">
                                                        <p>الضمان</p>
                                                        <span class="pull-right"><?php echo $year; ?></span>
                                                    </div>
                                                    <div class="related_text_2 clearfix">
                                                        <p>قاطع</p>
                                                        <span class="pull-right"><?php echo (@$val['milage'] != '0') ? $val['milage'] . " Km" : "N/A"; ?></span>
                                                    </div>
                                                    <div class="related_text_2 clearfix">
                                                        <p>السرعة</p>
                                                        <span class="pull-right"><?php echo(@$val['speed'] != '0') ? $val['speed'] . " Ma" : "N/A"; ?></span>
                                                    </div>
                                                    <div class="related_text_2 clearfix">
                                                        <p>التسارع 0-100</p>
                                                        <span class="pull-right"><?php echo(@$val['acceleration'] != '0.0') ? $val['acceleration'] . " Seconds" : "N/A"; ?></span>
                                                    </div>
                                                    <div class="related_text_2 clearfix">
                                                        <p>سعة المحرك</p>
                                                        <span class="pull-right"><?php echo(@$val['engine_size'] != '0.0') ? $val['engine_size'] . ' L' : "N/A" ?></span>
                                                    </div>
                                                    <div class="related_text_2">
                                                        <p>حصان</p>
                                                        <span class="pull-right"><?php echo(@$val['horse_power'] != '0.0') ? $val['horse_power'] . ' HP' : "N/A" ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                    }
                                else
                                    {
                                    ?>
                                    <div class="alert alert-danger">
                                        <strong>عذرا!</strong> لا يوجد سيارات.
                                    </div> 
                                <?php } ?> 
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>   
</div>          
</section>


<?php include("includes/footer.php") ?>    
