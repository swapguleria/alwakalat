<?php
include("includes/header.php");
$testimonials = $get->get_all_data('tbl_testimonial', 'id', 'desc');
$makers = $get->get_all_data('tbl_maker', 'id', 'asc');
$bodyType = $get->get_all_data('tbl_body_type', 'id', 'asc');
$approved_cars = $get->get_all_approved_card();
$min = $get->get_price('min');
$max = $get->get_price('max');
?>
<section>
    <div id="process">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="process_head text-center">
                        <h2>Neque porro <span>quisquam est</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="process_one text-center">
                        <div class="process_inner text-center">
                            <h3>Approved Cars Process Box</h3>
                            <h5>Content will add later</h5>
                        </div>    
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 process_search">
                    <div class="process_search_inner">
                        <div class="process_search_head text-left">
                            <h3>Search</h3>
                        </div>
                        <div class="process_search_body clearfix">
                            <div class="col-sm-5 budget">
                                <div class="budget_inner">
                                    <div class="budget_cetagory">
                                        <form action="carSearch.php" method="get" >
                                            <input checked="checked" type="radio" name="budget" value="2"><label>By Budget</label>
                                            <input type="radio" name="budget" value="1"><label>By Make and Model</label>

                                    </div>

                                    <div id="box_one" class="desc">
                                        <div class="budget_sec">

                                            <label>Your Budget</label>

                                        </div>

                                        <div class="range">
                                            <div id="slider-range"></div>
                                            <input type="text"  id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                                            <input type="text" value="<?php echo $min['mi'].'-'.$value = $max['mi'] + 1; ?>" name='price' id="amount2">
                                            <!--<input type="range" name="price" min="<?php echo $min['mi']; ?>" max="<?php echo $value = $max['mi'] + 1; ?>" value="<?php echo $value = $max['mi'] + 1; ?>" onchange="rangePrimary.value = 'QAR ' + addCommas(value)">-->
                                            <output id="rangePrimary"> QAR <?php
                                                $value = $max['mi'] + 1;
                                                echo number_format($value);
                                                ?></output>
                                        </div>
                                    </div>  

                                    <div id="budget_label" class="desc" style="display: none;">

                                        <div class="label-modal">

                                            <select name="mid" id="app_adv_search_maker">

                                                <option value="">Select Maker</option>

                                                <?php
                                                foreach ($makers as $maker) {
                                                    ?>

                                                    <option value="<?php echo $maker['id']; ?>" ><?php echo $maker['name']; ?></option>

                                                <?php } ?>

                                            </select>

                                        </div>

                                        <div class="label-modal">

                                            <select name="moid" id="app_adv_search_model">

                                                <option value="">Select Maker First</option>

                                            </select>

                                        </div>

                                    </div>
                                    <div class="budget_btn">
                                        <button class="btb btn-default btn_srch">Search</button>
                                    </div>
                                    </form>
                                </div>    
                                <div class="budget_btn text-center">
                                    <a href="advanceSearch.php"><button class="btb btn-default btn_ad_srch">Advanced Search</button></a>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="budget_img text-center">
                                    <img src="<?php echo $main_url; ?>/images/car_1.jpg"/>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <div id="body_type">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 body_type_head">
                    <div class="process_head text-left">
                        <h2>By body <span>type</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="body_type">
                    <div class="col-sm-8 body_type_left">
                        <div class="body_type_left_inner">
                            <?php
                            foreach ($bodyType as $body) {
                                ?>      <div class="col-sm-3 type">
                                    <a href="carSearch.php?bid=<?php echo $body['id']; ?>">
                                        <div class="type_inner text-center">
                                            <?php
                                            if (@$body['image']) {
                                                ?><img src="http://alwakalat.com/timthumb/timthumb.php?w=100&h=35&src=http://alwakalat.com/approvedCars/wdir/uploads/<?php echo $body['image']; ?>" > <?php
                                            } else {
                                                ?><img src="/images/hatchback.png">
                                            <?php } ?>
                                            <a href="carSearch.php?bid=<?php echo $body['id']; ?>">
                                                <?= $body['name'] ?></a>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                    <div class="col-sm-4 body_type_right">
                        <div class="body_type_right_inner text-center">
                            <div class="advertisement text-center">
                                <h4>Advertisement</h4>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="compare">
                        <a href="approvedcomparison.php"><button class="btn btn-default compare_btn">Compare Approved Cars</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <div id="approved_cars">  
        <div class="searches container">
            <div class="container inner-container">
                <h2>VEIW OUR ALL approved CARS</h2>
                <div class="search-products clearfix">
                    <?php
                    foreach ($makers as $maker) {
//                        echo '<pre>';
//                        print_r($maker);
                        ?>
                        <div class="search-main-product">
                            <div class="search-product-img"> <a href="carSearch.php?mid=<?php echo $maker['id']; ?>">
                                    <img src="http://alwakalat.com/timthumb/timthumb.php?w=117&h=115&src=http://alwakalat.com/approvedCars/wdir/uploads/<?php echo $maker['image']; ?>" >
                                </a> </div>
                            <div class="search-product-text">
                                <h2><a href="carSearch.php?mid=<?php echo $maker['id']; ?>">
                                        <?php echo strtoupper($maker['name']); ?></a></h2>
                            </div>
                        </div><?php } ?>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div id="demo">
                        <div id="owl-demo-two" class="owl-carousel app_slider">
                            <?php foreach ($approved_cars as $key => $val) { ?>
                                <div class="item">
                                    <div class="approved_slider clearfix">
                                        <div class="col-sm-8">
                                            <div class="approved_slider_img">
                                                <?php
                                                if ($val['banner_image']) {
                                                    ?><img src="<?php echo $main_url; ?>/approvedCars/wdir/uploads/<?php echo $val['banner_image']; ?>"/> <?php
                                                } else {
                                                    ?><img src="<?php echo $main_url; ?>/approvedCars/themes/basic/images/nocarimage.jpg"/>


                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="approved_slider_left text-left">
                                                <h3><?php echo $get->get_single_field('tbl_maker', 'name', 'id', $val['maker_id']), ' ', $get->get_single_field('tbl_car_model', 'model_name', 'id', $val['model_id']), ' ', $get->get_single_field('tbl_sub_model', 'name', 'id', $val['sub_model_id']); ?></h3>
                                                <p><?php echo $get->get_single_field('tbl_body_type', 'name', 'id', $val['body_type_id']); ?></p>
                                                <h4>QAR <?php echo $val['price']; ?></h4>
                                                <a  href="/approvedCar.php?id=<?php echo $val['id']; ?>" class = "btn btn-default slider_btn">Read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="teximonial">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 textimonial">
                    <div class="texti_head text-center">
                        <h3>Testimonial</h3>
                    </div>
                    <div id="demo">
                        <div id="owl-demo-two1" class="owl-carousel">
                            <?php
                            foreach ($testimonials as $key => $value) {
                                ?>

                                <div class="item">
                                    <div class="textimonial_inner text-center">
                                        <div class="texti_img">
                                            <?php
                                            if ($value['image']) {
                                                ?><img src="<?php echo $main_url; ?>/approvedCars/wdir/uploads/<?php echo $value['image']; ?>"/> <?php
                                            } else {
                                                ?><img src="<?php echo $main_url; ?>/approvedCars/themes/basic/images/user.jpg"/>


                                            <?php } ?>
                                        </div>
                                        <div class="texti_content">
                                            <p>
                                                “<?= $value['text'] ?>”
                                            </p>
                                            <p>
                                                - <?= $value['name'] ?>, <?= $value['city'] ?>, <?= $value['state'] ?> -
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>-->

<?php include("includes/footer.php"); ?>
  <script>
  $( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: <?php echo $min['mi']; ?>,
      max: <?php echo $value = $max['mi'] + 1; ?>,
      values: [ 75, 300 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
        $( "#amount2" ).val( ui.values[ 0 ] + "-" + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );
  } );
  </script>