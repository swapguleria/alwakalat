<?php
include("includes/header.php");
if (@$_GET['id'])
    {
    $id = $_GET['id'];
    }
else
    {
    $reviews = $get->get_review('', 1);
    if (@$reviews[0]['cat_id'])
        {
        $id = $reviews[0]['cat_id'];
        }
    else
        {
        $id = 1;
        }
    }
//echo "<pre>";
$reviews = $get->get_review('', 1);
//print_r($id);
// To get the reviews for sidebar
$views = $get->get_view('', 1);
if (isset($id))
    {
    $views_update = $get->update_view($id);
    $model = $get->get_single_result('reviews', 'cat_id', $id);
//    print_r($model);

    $car_details = $get->get_single_result('car_data', 'id', $id);
    $model_detail = $get->get_single_result('model', 'model_id', $car_details['model']);
    $sub_model_detail = $get->get_single_result('sub_model', 'sub_id', $car_details['sub_model']);
    $name = $model_detail['model_name'] . " " . $sub_model_detail['sub_model_name'] . " " . $car_details['bodyType'];
    }
else
    {
    
    }
?>
<div class="review-container">
    <div class="container">
        <div class="row">

            <div id="secondary1" class="col-sm-9 second">
                <div class="review-siebar">
                    <h3>Car Reviews </h3>

                    <?php
                    if (@$reviews)
                        {
                        ?><?php
                        foreach ($reviews as $review)
                            {
                            $car_details = $get->get_single_result('car_data', 'id', $review['cat_id']);
                            $model_detail = $get->get_single_result('model', 'model_id', $car_details['model']);
                            $sub_model_detail = $get->get_single_result('sub_model', 'sub_id', $car_details['sub_model']);
                            $name_car = $model_detail['model_name'] . " " . $sub_model_detail['sub_model_name'] . " " . $car_details['bodyType'];
                            ?>


                            <div class="latest-review load-item" style="display:none" >
                                <div class="comment-box comment-mini">
                                    <!--                                        <div class="comment-box-num">
                                                                                <a href="car_reviews.php?id=<?php echo $review["cat_id"]; ?>#disqus_thread" class="disqus-comment-count" title="<?= $name_car ?>"></a>
                                                                            </div>comment-box-num-->
                                    <span class="ca-comment-shadow"></span>
                                </div><!--comment-box-->

                                <?php
                                $slider_car = $get->get_all_data_active('car_slider', 'id', 'asc', 'car_id', $review["id"]);
                                ?>
                                <div class="row">
                                    <div class="col-sm-4 review-car-img">
                                        <a href="car_reviews.php?id=<?php echo $review['cat_id']; ?>"><img src="<?php echo $car_details['full_path']; ?>" title="<?= $name_car ?>" alt="<?= $name_car ?>"></a></div>

                                    <div class="col-sm-8 review-description">
                                        <!--latest-review-->
                                        <div class="about-review">
                                            <h6><b><a href="car_reviews.php?id=<?php echo $review['cat_id']; ?>"><?= $name_car ?></a></b></h6>
                                            <h5><a href="car_reviews.php?id=<?php echo $review['cat_id']; ?>"><?php echo SUBSTR($review['description'], 0, 200); ?>read more..</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--latest-review-->

                        <?php } ?>
                        <div class="col-md-12">
                            <div class="col-sm-4 col-sm-offset-4">
                                <div class="more_list_item">
                                    <a href="javascript:void(0)" id="ViewMore1">Load More</a>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                    else
                        {
                        ?>
                        <div class="alert alert-info">
                            <strong>Sorry !</strong> No reviews.
                        </div>
                    <?php } ?>   <!--review-section-->



                </div><!--review-sidebar-->
            </div><!--secondary-->
            <div  class="col-sm-3 most">
                <div class="car-ranks">
                    <h3>Most Viewed Reviews</h3>
                    <?php
                    if (@$views)
                        {
                        ?><?php
                        $count = 1;
                        foreach ($views as $view)
                            {
                            $car_details = $get->get_single_result('car_data', 'id', $view['cat_id']);
                            $model_detail = $get->get_single_result('model', 'model_id', $car_details['model']);
                            $sub_model_detail = $get->get_single_result('sub_model', 'sub_id', $car_details['sub_model']);
                            $name_car = $model_detail['model_name'] . " " . $sub_model_detail['sub_model_name'] . " " . $car_details['bodyType'];
                            ?><div class="rank-container">
                                <div class="car-thumb">
                                    <?php $slider_car = $get->get_all_data_active('car_slider', 'id', 'asc', 'car_id', $view["id"]); ?> 
                                    <a href="car_reviews.php?id=<?php echo $view['cat_id']; ?>"><img src="<?php echo $car_details['full_path']; ?>" title="<?= $name_car ?>" alt="<?= $name_car ?>"></a>
                                </div><!--car-thumb-->
                                <div class="car-descriptionone">
                                    <ol>
                                        <li>
                                            <?= $count ?>.<?= $name_car ?><span>Price: QR<?php echo $car_details['price']; ?></span>
                                        </li>
                                    </ol>
                                </div><!--car-description-->
                            </div><!--rank-container-->
                            <?php
                            $count++;
                            }
                        ?>
                        <?php
                        }
                    else
                        {
                        ?>
                        <div class="alert alert-info">
                            <strong>Sorry !</strong> No reviews.
                        </div>
                    <?php } ?>   
                </div><!--car-ranks--> 
            </div>
        </div>
    </div>

</div>




<?php include("includes/footer.php"); ?>