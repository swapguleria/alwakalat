<?php
include("includes/header.php");
//session_start();
//print_r($_SESSION['whitelist']);
if (isset($_POST['btn']))
    {
    unset($_SESSION['whitelist'][$_POST['btn']]);
    header("Refresh:0");
    }
//echo "<pre>";
//print_r($_SESSION['whitelist']);
//echo "</pre>";
?>
<section>
    <div id="wish_list">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="wish_header">
                        <h2>My Wish<span> List</span></h2>
                    </div>
                </div>
                <?php
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

//                        echo "<pre>";
//                        print_r($_SESSION['whitelist']);
//                        echo "</pre>";
//                        echo "<pre>";
//                        print_r($key);
//                        echo "</pre>";
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
                                            <form method="POST" > <button type="submit" name="btn" value="<?php echo $key; ?>" class="btn btn-danger pull-right">Remove</button></form>
                                            <h4>QAR <?php echo number_format($results['price']); ?></h4>
                                            <ul>
                                                <li class="">
                                                    <div class="car_details text-center">
                                                        <h5>Mileage</h5>
                                                        <p><?php echo number_format($results['milage']); ?></p>
                                                    </div>
                                                </li>
                                                <li class="">
                                                    <div class="car_details text-center">
                                                        <h5>Speed</h5>
                                                        <p><?php echo ($results['speed']) ? $results['speed'] . " Ma" : "NA"; ?></p>
                                                    </div>
                                                </li>
                                                <li class="">
                                                    <div class="car_details text-center">
                                                        <h5>Engine Size</h5>
                                                        <p><?php echo ($results['engine_size'] != '0.0') ? $results['engine_size'] . " L" : "NA"; ?></p>
                                                    </div>
                                                </li>
                                                <li class="">
                                                    <div class="car_details text-center">
                                                        <h5>HorsePower</h5>
                                                        <p><?php echo ($results['horse_power']) ? $results['horse_power'] . " HP" : "NA"; ?></p>
                                                    </div>
                                                </li>
                                                <li class="">
                                                    <div class="car_details text-center">
                                                        <h5>Acceleration</h5>
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
                        <strong>Wishlist is Empty </strong>                 
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>

<?php include("includes/footer.php") ?>

