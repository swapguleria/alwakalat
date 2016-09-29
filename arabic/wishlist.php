<?php
include("includes/header.php");

//session_start();

//print_r($_SESSION['whitelist']);
?>
<section>
    <div id="wish_list">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="wish_header">
                        <h2>قائمة المفضلة</h2>
                    </div>
                </div>
                <?php
//                echo "<pre>";
//                print_r($_SESSION);
//                echo "</pre>";
                if (@$_SESSION['whitelist'])
                    {
                    $wishlists = $_SESSION['whitelist'];
                    $wishlist = array_unique($wishlists);
                    foreach ($wishlist as $key => $val)
                        {
                        $results = $get->get_single_result('tbl_used_car', 'id', $val);
                        $maker = $get->get_single_field('tbl_maker', 'name', 'id', $results['maker_id']);
                        $sub_model = $get->get_single_field('tbl_sub_model', 'name', 'id', $results['sub_model_id']);
                        $model = $get->get_single_field('tbl_car_model', 'model_name', 'id', $results['model_id']);
                        $bodyType = $get->get_single_field('tbl_body_type', 'name', 'id', $results['body_type_id']);
                        ?>

                        <div class="col-sm-12 one">
                            <div class="row">
                                <div class="wish_list clearfix">
                                    <div class="col-sm-4">
                                        <div class="wish_list_img">
                                            <img class="thumbnail" src="http://alwakalat.com/timthumb/timthumb.php?h=604&src=http://www.alwakalat.com/approvedCars/wdir/uploads/<?php echo $results['banner_image']; ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="wish_list_content">
                                            <a href="approvedCar.php?id=<?php echo $results['id']; ?>"><h3><?php echo $maker, " ", $model, " ", $sub_model, " ", $bodyType; ?></h3></a>
                                            <h4>QAR <?php echo number_format($results['price']); ?></h4>
                                            <ul>
                                                <li class="">
                                                    <div class="car_details text-center">
                                                        <h5>قاطع</h5>
                                                        <p><?php echo number_format($results['milage']); ?></p>
                                                    </div>
                                                </li>
                                                <li class="">
                                                    <div class="car_details text-center">
                                                        <h5>السرعة</h5>
                                                        <p><?php echo ($results['speed']) ? $results['speed'] . " Ma" : "NA"; ?></p>
                                                    </div>
                                                </li>
                                                <li class="">
                                                    <div class="car_details text-center">
                                                        <h5>سعة المحرك</h5>
                                                        <p><?php echo ($results['engine_size'] != '0.0') ? $results['engine_size'] . " L" : "NA"; ?></p>
                                                    </div>
                                                </li>
                                                <li class="">
                                                    <div class="car_details text-center">
                                                        <h5>حصان</h5>
                                                        <p><?php echo ($results['horse_power']) ? $results['horse_power'] . " HP" : "NA"; ?></p>
                                                    </div>
                                                </li>
                                                <li class="">
                                                    <div class="car_details text-center">
                                                        <h5>التسارع</h5>
                                                        <p><?php echo ($results['acceleration'] != '0.0') ? $results['acceleration'] . " Seconds" : "NA"; ?> </p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                    ?> <br><?php
                    }
                else
                    {
                    ?>
                    <div class="alert alert-danger">
                        <strong>قائمة المفضلة فارغة </strong>                 
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<?php include("includes/footer.php") ?>

