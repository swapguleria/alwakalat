<?php
include("includes/header.php");
// To get the reviews for sidebar
$reviews = $get->get_review('', 1);
if (@$_GET['id'])
    {
    $views_update = $get->update_view($_GET['id']);
}
// To get the reviews for sidebar
$views = $get->get_view('', 1);





if (isset($_GET['id']))
    {
    $model = $get->get_single_result('reviews', 'cat_id', $_GET['id']);
   
$car_details = $get->get_single_result('car_data', 'id', $_GET['id']);
$model_detail = $get->get_single_result('model', 'model_id', $car_details['model']);
$sub_model_detail = $get->get_single_result('sub_model', 'sub_id', $car_details['sub_model']);
$name = $model_detail['model_name'] . " " . $sub_model_detail['sub_model_name'] . " " . $car_details['bodyType'];
 }?>

<!--// Facebook share-->
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=751484061626759";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<!--// google +-->
<script src="https://apis.google.com/js/platform.js" async defer></script>

<div class="content-title">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2><?php
                    if (@$model['date'])
                        {
                        echo date("Y", strtotime($model['date']));
                        }
                    ?> <?php echo $name; ?> Review</h2>
            </div><!--col-sm-12-->
        </div><!--row-->
    </div><!--container-->
</div><!--content-title-->

<div class="review-contai ner">
    <div class="container">
        <div class="row">
            <div id="primary" class="col-sm-9">
                <div class="review-content">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="car_reviews.php?id=<?php echo $_GET['id']; ?>#disqus">Review</a></li>
                        <li><a href="#">Photos</a></li>
                    </ul>

                    <?php
                    if (@$model['video'])
                        {
                        $url = explode("watch?v=", $model['video']);
                        ?>

                        <div class="review-img">
                            <iframe width="850" height="450"
                                    src="<?php
                                    if (@$model['video'])
                                        {
                                        echo "http://www.youtube.com/embed/" . $url[1] . "?autoplay=0";
                                        }
                                    ?>">
                            </iframe> 
                        </div><!--review-img-->
                        <?php
                        }
                    else
                        {
                        ?>
                        <a href="#" style="border: 1px "><img src="images/no_video.jpg" title="<?php echo date("Y", strtotime($model['date'])); ?> <?php echo $name; ?> Review Quick Drive" alt="<?php echo date("Y", strtotime($model['date'])); ?> <?php echo $name; ?> Review Quick Drive"></a>
<?php }
?>
                    <div class="review-description">
                        <h3><?php
                            if (@$model['date'])
                                {
                                echo date("Y", strtotime($model['date']));
                                }
                            ?> <?php echo $name; ?> </h3>
                        <span class="review-tagline"><?php
                            if (@$model['sub_title'])
                                {
                                echo $model['sub_title'];
                                }
                            ?></span>
                        <div class="review-published">
                            <ul>
                                <li><?php
                                    if (@$model['date'])
                                        {
                                        echo date("M Y", strtotime($model['date']));
                                        }
                                    ?></li>
                                <li>By <span><?php
                                        if (@$model['photo_by'])
                                            {
                                            echo $model['photo_by'];
                                            }
                                        else
                                            {
                                            echo "Admin";
                                            }
                                        ?></span></li>
                                <li>PHOTOGRAPHY By <span><?php
                                        if (@$model['photo_by'])
                                            {
                                            echo $model['photo_by'];
                                            }
                                        else
                                            {
                                            echo "Admin";
                                            }
                                        ?></span></li>
                            </ul>
                        </div><!--review-published-->
                        <div class="social-likes">
                            <div class="fb-share-button" data-href="http://development.dexterousteam.com/alwakalat/car_reviews.php?id=<?php echo $_GET['id']; ?>" data-layout="button_count" data-mobile-iframe="true"></div>

                            <a href="https://twitter.com/share?url=http://development.dexterousteam.com/alwakalat/car_reviews.php?id=<?php echo $_GET['id']; ?>" target="_blank">
                                <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
                            </a>
                            <div class="g-plus" data-action="share" data-annotation="none" data-height="24" data-href="car_reviews.php?id=<?php echo $_GET['id']; ?>"></div>
                            <a class="comments" href="car_reviews.php?id=<?php echo $_GET['id']; ?>#disqus" title="Comments"><img src="images/comment-icon.png" title="Comments" alt="Comments"></a>
                        </div><!--social-likes-->
                        <p><?php echo $model['description']; ?></p>
                        <!--                        <div class="manufacture-links">
                                                    <p>Advertisement - Continue Reading Below</p>
                                                    <ul>
                                                        <li><a href="#">C/D 2016 Editors' Choice Awards</a></li>
                                                        <li><a href="#">C/D 2016 10Best Cars</a></li>
                                                        <li><a href="#">Free Newsletter!</a></li>
                                                    </ul>
                                                </div>manufacture-links-->

                        <?php
                        $slider_car = $get->get_all_data_active('car_slider', 'id', 'asc', 'car_id', @$_GET["id"]);
                        ?><div class="review-artcles">
                            <div class="article-content row">	
                                <img src="<?php echo $slider_car[0]['full_path']; ?>" title="" alt="Article Image">
                                <div class="article-thumbnail">
                                    <img src="<?php echo $slider_car[1]['full_path']; ?>" title="" alt="First Thumb">
                                    <img src="<?php echo $slider_car[2]['full_path']; ?>" title="" alt="Second Thumb">
                                </div>
                                <!--article-thumbnail-->

                                <p><?php echo $model['description']; ?></p>
                            </div>
                        </div><!--review-articles-->
                    </div><!--review-description-->
                </div><!--review-content-->


                <!--//Discuss Box--> 
                <div id="disqus" ></div>
                <div id="disqus_thread" ></div>
                <script>
    /**
     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
     */
    /*
     var disqus_config = function () {
     this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
     this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
     };
     */
    (function () {  // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');

        s.src = '//alwakalat.disqus.com/embed.js';

        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
                </script>
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
                <!--article-comments-->
            </div><!--col-sm-9-->





            <!--//sidebar--> 


            <div id="secondary" class="col-sm-3">
                <h3>Latest Reviews </h3>

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

                        <div class="review-section">
                            <div class="latest-review">
                                <div class="comment-box comment-mini">
                                    <div class="comment-box-num">
                                        <a href="car_reviews.php?id=<?php echo $review["cat_id"]; ?>#disqus_thread" class="disqus-comment-count" title="<?= $name_car ?>"></a>
                                    </div><!--comment-box-num-->
                                    <span class="ca-comment-shadow"></span>
                                </div><!--comment-box-->
        <?php $slider_car = $get->get_all_data_active('car_slider', 'id', 'asc', 'car_id', $review["id"]); ?> 
                                <a href="#"><img src="<?php echo $slider_car[0]['full_path']; ?>" title="<?= $name_car ?>" alt="<?= $name_car ?>"></a>
                            </div><!--latest-review-->
                            <div class="about-review">
                                <h6><?= $name_car ?></h6>
                            </div><!--about-review-->
                        </div>
                    <?php } ?>
                    <?php
                    }
                else
                    {
                    ?>
                    <div class="alert alert-info">
                        <strong>Sorry !</strong> No reviews.
                    </div>
<?php } ?> 


                <div class="car-ranks">
                    <h3>Most Viewed Reviews</h3>
                    <?php
                    if (@$views)
                        {
                        ?><?php
                        foreach ($views as $view)
                            {
                            $car_details = $get->get_single_result('car_data', 'id', $view['cat_id']);
                            $model_detail = $get->get_single_result('model', 'model_id', $car_details['model']);
                            $sub_model_detail = $get->get_single_result('sub_model', 'sub_id', $car_details['sub_model']);
                            $name_car = $model_detail['model_name'] . " " . $sub_model_detail['sub_model_name'] . " " . $car_details['bodyType'];
                            ?><div class="rank-container">
                                <div class="car-thumb">
        <?php $slider_car = $get->get_all_data_active('car_slider', 'id', 'asc', 'car_id', $view["id"]); ?> 
                                    <a href="#"><img src="<?php echo $slider_car[0]['full_path']; ?>" title="<?= $name_car ?>" alt="<?= $name_car ?>"></a>
                                </div><!--car-thumb-->
                                <div class="car-description">
                                    <ol>
                                        <li>
        <?= $name_car ?><span>Price: $<?php echo $car_details['price']; ?></span>
                                        </li>
                                    </ol>
                                </div><!--car-description-->
                            </div><!--rank-container-->
                        <?php } ?>
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
            </div><!--secondary-->
        </div><!--row-->
    </div><!--container-->
</div>
<script>
    $(document).ready(
            /* This is the function that will get executed after the DOM is fully loaded */
                    function () {
                        $("#datepicker").datepicker({
                            changeMonth: true, //this option for allowing user to select month
                            changeYear: true //this option for allowing user to select from year range
                        });
                    }

            );

            $(document).ready(function () {
                $('.fancybox').fancybox();
                $('#example-datatable').DataTable({bFilter: false, bInfo: false});
                $('.item:first-child').addClass('active');

                $("#owl-demo").owlCarousel({
                    autoPlay: 3000, //Set AutoPlay to 3 seconds


                    navigation: true,
                    itemsCustom: [
                        [320, 2],
                        [450, 3],
                        [600, 4],
                        [700, 7],
                        [1000, 5],
                        [1200, 8],
                        [1400, 8],
                        [1600, 8]
                    ]

                });
                $("#owl-demo-two").owlCarousel({
                    autoPlay: 3000, //Set AutoPlay to 3 seconds


                    navigation: true,
                    itemsCustom: [
                        [0, 1],
                        [450, 1],
                        [600, 1],
                        [700, 1],
                        [1000, 1],
                        [1200, 1],
                        [1400, 1],
                        [1600, 1]
                    ]

                });

                $(document).ajaxStart(function () {

                    $("#wait").css("display", "block");
                    $(".overlay").css("display", "block");
                });
                $(document).ajaxComplete(function () {
                    $("#wait").css("display", "none");
                    $(".overlay").css("display", "none");
                });



                $("#maker").change(function ()
                {
                    var id = $(this).val();
                    var dataString = 'id=' + id + '&action=model';

                    $.ajax
                            ({
                                type: "POST",
                                url: "get_model.php",
                                data: dataString,
                                cache: false,
                                success: function (html)
                                {
                                    $("#model_sel").html(html);
                                }
                            });

                });
                $("#maker2").change(function ()
                {
                    var id = $(this).val();
                    var dataString = 'id=' + id + '&action=model';

                    $.ajax
                            ({
                                type: "POST",
                                url: "get_model.php",
                                data: dataString,
                                cache: false,
                                success: function (html)
                                {
                                    $("#model_sel2").html(html);
                                }
                            });

                });
                $("#maker3").change(function ()
                {
                    var id = $(this).val();
                    var dataString = 'id=' + id + '&action=model';

                    $.ajax
                            ({
                                type: "POST",
                                url: "get_model.php",
                                data: dataString,
                                cache: false,
                                success: function (html)
                                {
                                    $("#model_sel3").html(html);
                                }
                            });

                });
                $("#model_sel").on('change', function ()
                {
                    var id = $(this).val();
                    var dataString = 'id=' + id + '&action=sub_model';

                    $.ajax
                            ({
                                type: "POST",
                                url: "get_model.php",
                                data: dataString,
                                cache: false,
                                success: function (html)
                                {
                                    $("#sub_model_sel").html(html);
                                }
                            });

                });
                $("#model_sel2").on('change', function ()
                {
                    var id = $(this).val();
                    var dataString = 'id=' + id + '&action=sub_model';

                    $.ajax
                            ({
                                type: "POST",
                                url: "get_model.php",
                                data: dataString,
                                cache: false,
                                success: function (html)
                                {
                                    $("#sub_model_sel2").html(html);
                                }
                            });

                });
                $("#model_sel3").on('change', function ()
                {
                    var id = $(this).val();
                    var dataString = 'id=' + id + '&action=sub_model';

                    $.ajax
                            ({
                                type: "POST",
                                url: "get_model.php",
                                data: dataString,
                                cache: false,
                                success: function (html)
                                {
                                    $("#sub_model_sel3").html(html);
                                }
                            });

                });

            });
            function remove() {
                $("#maker").css('border', '1px solid rgba(0, 0, 0, 0.1)');
                $("#maker2").css('border', '1px solid rgba(0, 0, 0, 0.1)');
                $("#maker3").css('border', '1px solid rgba(0, 0, 0, 0.1)');
                $("#model_sel").css('border', '1px solid rgba(0, 0, 0, 0.1)');
                $("#model_sel2").css('border', '1px solid rgba(0, 0, 0, 0.1)');
                $("#model_sel3").css('border', '1px solid rgba(0, 0, 0, 0.1)');
                $("#sub_model_sel").css('border', '1px solid rgba(0, 0, 0, 0.1)');
                $("#sub_model_sel2").css('border', '1px solid rgba(0, 0, 0, 0.1)');
                $("#sub_model_sel3").css('border', '1px solid rgba(0, 0, 0, 0.1)');
            }
            function compare() {
                remove();
                var maker1 = $("#maker").val();
                var model1 = $("#model_sel").val();
                var version1 = $("#sub_model_sel").val();
                var maker2 = $("#maker2").val();
                var model2 = $("#model_sel2").val();
                var version2 = $("#sub_model_sel2").val();
                var maker3 = $("#maker3").val();
                var model3 = $("#model_sel3").val();
                var version3 = $("#sub_model_sel3").val();

                if (maker1 == "") {
                    $("#maker").css('border', '1px solid red');
                    return false;
                }
                if (model1 == "") {
                    $("#model_sel").css('border', '1px solid red');
                    return false;
                }
                if (version1 == "") {
                    $("#sub_model_sel").css('border', '1px solid red');
                    return false;
                }
                if (maker2 == "") {
                    $("#maker2").css('border', '1px solid red');
                    return false;
                }
                if (model2 == "") {
                    $("#model_sel2").css('border', '1px solid red');
                    return false;
                }
                if (version2 == "") {
                    $("#sub_model_sel2").css('border', '1px solid red');
                    return false;
                }
                /* 
                 if(maker3==""){
                 $("#maker3").css('border','1px solid red');
                 return false;
                 }
                 
                 
                 if(model3==""){
                 $("#model_sel3").css('border','1px solid red');
                 return false;
                 }
                 
                 
                 if(version3==""){
                 $("#sub_model_sel3").css('border','1px solid red');
                 return false;
                 } */
                var dataString = 'maker1=' + maker1 + '&maker2=' + maker2 + '&maker3=' + maker3 + '&model1=' + model1 + '&model2=' + model2 + '&model3=' + model3 + '&version1=' + version1 + '&version2=' + version2 + '&version3=' + version3 + '&action=compare';

                $.ajax
                        ({
                            type: "POST",
                            url: "get_model.php",
                            data: dataString,
                            cache: false,
                            success: function (html)
                            {
                                $("#return").html(html);
                            }
                        });



            }

</script>
<script>
            $(document).ready(function () {

                var sync1 = $("#sync1");
                var sync2 = $("#sync2");

                sync1.owlCarousel({
                    singleItem: true,
                    slideSpeed: 1000,
                    navigation: true,
                    pagination: false,
                    afterAction: syncPosition,
                    responsiveRefreshRate: 200,
                });

                sync2.owlCarousel({
                    items: 8,
                    itemsDesktop: [1199, 10],
                    itemsDesktopSmall: [979, 10],
                    itemsTablet: [768, 8],
                    itemsMobile: [479, 4],
                    pagination: false,
                    responsiveRefreshRate: 100,
                    afterInit: function (el) {
                        el.find(".owl-item").eq(0).addClass("synced");
                    }
                });

                function syncPosition(el) {
                    var current = this.currentItem;
                    $("#sync2")
                            .find(".owl-item")
                            .removeClass("synced")
                            .eq(current)
                            .addClass("synced")
                    if ($("#sync2").data("owlCarousel") !== undefined) {
                        center(current)
                    }

                }

                $("#sync2").on("click", ".owl-item", function (e) {
                    e.preventDefault();
                    var number = $(this).data("owlItem");
                    sync1.trigger("owl.goTo", number);
                });

                function center(number) {
                    var sync2visible = sync2.data("owlCarousel").owl.visibleItems;

                    var num = number;
                    var found = false;
                    for (var i in sync2visible) {
                        if (num === sync2visible[i]) {
                            var found = true;
                        }
                    }

                    if (found === false) {
                        if (num > sync2visible[sync2visible.length - 1]) {
                            sync2.trigger("owl.goTo", num - sync2visible.length + 2)
                        } else {
                            if (num - 1 === -1) {
                                num = 0;
                            }
                            sync2.trigger("owl.goTo", num);
                        }
                    } else if (num === sync2visible[sync2visible.length - 1]) {
                        sync2.trigger("owl.goTo", sync2visible[1])
                    } else if (num === sync2visible[0]) {
                        sync2.trigger("owl.goTo", num - 1)
                    }
                }

            });
</script>
<style>
    #owl-demo .item{
        margin: 3px;
    }
    #owl-demo .item img{
        display: block;
        width: 100%;
        height: auto;
    }
</style>


<script>
            $(document).ready(function () {

                $("#owl-demo-two").owlCarousel({
                    itemsCustom: [
                        [0, 1],
                        [479, 1],
                        [768, 1],
                        //[995, 2],
                        [1200, 6]
                    ],
                    lazyLoad: true,
                    navigation: true
                });

            });
</script>
<script>
            jQuery(document).ready(function () {
                var owlWrap = $('.owl-wrapper1');
// checking if the dom element exists
                if (owlWrap.length > 0) {
                    // check if plugin is loaded
                    if (jQuery().owlCarousel) {
                        owlWrap.each(function () {
                            var carousel = $(this).find('.owl-carousel'),
                                    navigation = $(this).find('.customNavigation'),
                                    nextBtn = navigation.find('.next'),
                                    prevBtn = navigation.find('.prev'),
                                    playBtn = navigation.find('.play'),
                                    stopBtn = navigation.find('.stop');

                            carousel.owlCarousel({
                                itemsCustom: [
                                    [0, 3],
                                    [479, 4],
                                    [768, 4],
                                    //[995, 2],
                                    [1200, 6]
                                ],
                                navigation: false,
                                stopOnHover: true,
                                autoPlay: 2000,
                                responsive: true,
                                loop: false
                            });

                            // Custom Navigation Events
                            nextBtn.click(function () {
                                carousel.trigger('owl.next');
                            });
                            prevBtn.click(function () {
                                carousel.trigger('owl.prev');
                            });
                            playBtn.click(function () {
                                owl.trigger('owl.play', 1000); //owl.play event accept autoPlay speed as second parameter
                            });
                            stopBtn.click(function () {
                                owl.trigger('owl.stop');
                            });

                        });
                    }
                    ;
                }
                ;
            });
</script>  	
<script id="dsq-count-scr" src="//alwakalat.disqus.com/count.js" async></script>


<?php include("includes/footer.php"); ?>