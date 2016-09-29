<?php
include("includes/header.php");
$provider_data = $get->get_single_result('providers', 'id', $_GET['id']);
?>   

<!--<div class="inner-banner">
    <div id="demo">
        <div id="owl-demo" class="owl-carousel">
<?php // foreach ($result->data as $post): ?>
                 Renders images. @Options (thumbnail,low_resoulution, high_resolution) 
                <div class="item"><a  class="fancybox" data-fancybox-group="gallery" href="<?php // echo $post->images->standard_resolution->url ?>"><img src="<?php // echo $post->images->thumbnail->url ?>" alt="" title=""></a></div>

<?php // endforeach ?>


        </div>
    </div>
</div>-->
<div class="provided-detial">



    <div class="container">


        <!DOCTYPE html>
        <html lang="en">
            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
                <title>Alwakalat</title>

                <!-- Bootstrap -->
                <link href="css/bootstrap.min.css" rel="stylesheet">
                <link href="css/style.css" type="text/css" rel="stylesheet">

                <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
                <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
                <!--[if lt IE 9]>
                  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                <![endif]-->
            </head>
            <body>

                <div class="detail-main">
                    <div class="container">
                        <div class="detailer-pro">

                            <img src="<?php echo $provider_data['full_path']; ?>" alt="">

                        </div>
                        <div class="social-detl">
                            <ul>
                                <li><a href="#"><img src="images/facebook.png" alt=""></a></li>
                                <li><a href="#"><img src="images/snapchat.png" alt=""></a></li>
                                <li><a href="https://www.instagram.com/detailer_cc/"><img src="images/instagram.png" alt=""></a></li>

                            </ul>
                        </div>
                    </div>
                </div>



                <div class="details">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 detail-txt">
                                <h4>At Detailer car care, we offer the finest experience for your car's interior, exterior and wheels. With over the edge leading technology and the premium products; precision is guaranteed ..</h4>
                                <h2>Why us ?</h2>
                                <p>By using innovative techniques and the right scientific understanding of all products and methods, Detailer Car Care team is able to provide you the ultimate care and offers the best results in polishing and protection. Due to the development of science everything became possible in this sector. We, Detailer Car Care, promise to bring back the gloss and beauty to your car to regain its glory and brilliance.</p>


                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> <span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
                                                    Interior
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                We rely on using the safest cleaning materials that remove accumulations of dust as well as body oils.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> <span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
                                                    Wheels
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                We rely on using the safest cleaning materials that remove accumulations of dust as well as body oils.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingThree">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree"> <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> <span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>          Paint
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                            <div class="panel-body">
                                                We rely on using the safest cleaning materials that remove accumulations of dust as well as body oils.
                                            </div>
                                        </div>
                                    </div>



                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingfour">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefour" aria-expanded="false" aria-controls="collapsefour"> <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> <span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>          Franchies
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                                            <div class="panel-body">
                                                We rely on using the safest cleaning materials that remove accumulations of dust as well as body oils.
                                            </div>
                                        </div>
                                    </div>


                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingfive">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefive" aria-expanded="false" aria-controls="collapsefive"> <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span> <span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>          Profile
                                                </a>
                                            </h4>
                                        </div>

                                    </div>


                                </div>



                            </div>
                            <!--<div id="menu2">-->
                                <div class="series-slider">
                                    <div id="demo">
                                        <div id="owl-demo-two" class="owl-carousel">
                                            <?php
                                            $slider_car = $get->get_all_data_active('car_slider', 'id', 'asc', 'car_id', $id);
                                            foreach ($slider_car as $car)
                                                {
                                                ?>
                                                <div class="item"><a href="#"><img src="<?php echo $car['full_path']; ?>" alt="" title=""></a></div>
<?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <!--</div>-->
                            
                        </div>
                    </div>
                </div>



                <div class="contact-detail">
                    <div class="container">
                        <div class="cntct-txt"><h3>Contact Details:</h3></div>
                        <div class="cntct-ad">
                            <div class="ad-icon"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></div>
                            <div class="ad-txt">
                                <h4>Address</h4><p> <?php echo $provider_data['s_address1']; ?><br>
<?php echo $provider_data['s_address2']; ?></p>
                            </div>
                        </div>
                        <div class="cntct-work">
                            <div class="ad-icon"><span class="glyphicon glyphicon-time" aria-hidden="true"></span></div>
                            <div class="ad-txt">
                                <h4>Working Hours</h4><p> <?php echo $provider_data['s_address3']; ?></p>
                            </div>
                        </div>
                        <div class="cntct-ph">
                            <div class="ad-icon"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span></div>
                            <div class="ad-txt">
                                <h4>Phone</h4><p><?php echo $provider_data['s_mob']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lociatin-pro">
                    <div class="row">
                        <div class="col-sm-6 loc-pro">
                            <div class="location-form-main">
                                <div class="location-map">
<?php echo $provider_data['s_map']; ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 form-pro">
                            <div class="location-form-main">
                                <?php
                                if (isset($_POST['submit']))
                                    {
                                    $to = $contact_details['email'];
//				$to = "Info@alwakalat.com"; 
                                    /*  $to = "swap.dedarsingh@gmail.com"; */
                                    $subject = "Feedback for Provider";

                                    $message = ' 
                        <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
                        <html>
                            <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

                            </head>
                            <body style="margin: 0;
                                  font-family: Tahoma, sans-serif;">
                                <table width="100%" id="html"  style="background-color: #eee;
                                       width: 100%;
                                       height: 100%;
                                       margin: 0 auto;" border="0" cellpadding="0"
                                       cellspacing="0">
                                    <tr>
                                        <td align="center" valign="top">
                                            <table width="650px" id="body" style="width: 500px;
                                                   margin: 0 auto;
                                                   font-size: 12px;
                                                   color: #333333;
                                                   background-color: #fff;
                                                   border: 1px solid antiquewhite;
                                                   text-valign: center;" border="0" cellpadding="0"
                                                   cellspacing="20">
                                                <tr>
                                                    <td id="header" style="color: white;
                                                        font-size: 1.2em;
                                                        padding: 15px;
                                                        background: #108c74;
                                                        text-align: center;
                                                        text-valign: center;
                                                        font-weight: bold;
                                                        margin-bottom: 30px;
                                                        border-radius: 4px 4px 4px 4px;">Hello &nbsp;<b> Alwakalat </b></td>
                                                </tr>
                                                <tr>
                                                <div class="mail-box" style="
                                                     width:350px;
                                                     margin:auto;">

                                                    <div class="mail-content" style="
                                                         font-size:14px;
                                                         padding:10px;">

                                                        <p><b>Name</b>: ' . $_POST["name"] . ' </p>
                                                        <p><b>Email</b>: ' . $_POST["email"] . ' </p>
                                                        <p><b>Message</b>:  ' . $_POST["message"] . '  </p>                                                     Please.</br>

                                                        </p>


                                                    </div>
                                                </div><p>
                                                    Sincerely,<br> Alwakalat.
                                                </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="footer" style="background: #108c74;
                                            color: #E2E2E2;
                                            border-radius: 4px 4px 4px 4px;
                                            margin-top: 30px;
                                            padding: 15px;
                                            text-weight: bold;
                                            text-align: center;
                                            text-valign: center;">
                                            <p>
                                                Copyright &copy;
                                                ' . date("Y") . ' 
                                                by
                                                Swap Developers
                                                . All Rights Reserved.<br />
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </body>
                        </html>
                        ';
//                                $message = "<b>Hello Alwakalat.</b>";
//				 $message .= "<p><b>Name</b>: ".$_POST['name']."</p>";
//				 $message .= "<p><b>Email</b>: ".$_POST['email']."</p>";
//				 $message .= "<p><b>Message</b>:".$_POST['message'].".</p>";

                                    $header = "From:" . $_POST['email'] . " \r\n";
                                    $header .= "MIME-Version: 1.0\r\n";
                                    $header .= "Content-type: text/html\r\n";

                                    $retval = mail($to, $subject, $message, $header);

                                    if ($retval == true)
                                        {
                                        echo "<p style='color: green; font-weight: bold; font-size: 15px;'>Thankyou For Your Feedback ...</p>";
                                        }
                                    }
                                ?>
                                <h3>Your Feed back here</h3>
                                <form action="" method="POST" id="feedback">
                                    <input type="text" name="name" placeholder="Name*">

                                    <input type="text" name="email" placeholder="Email*">

                                    <textarea placeholder="Message*" name="message"></textarea>

                                    <p></p>


                                    <div class="note-form-text">

                                        <p>Your email will not be published</p>
                                    </div>


                                    <div class="add-feedback-button">

                                        <input type="submit" name="submit" value="ADD YOUR FEEDBACK">

                                    </div>
                                </form>

                                <div class="package-icon">
                                    <img src="images/package-icon.png" alt="">
                                </div>
                            </div>
                        </div>


                    </div>
                </div>




    </div> 

</div> 


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

</body>
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
</html>

<?php include("includes/footer.php"); ?>   