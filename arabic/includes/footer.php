<div class="below-clients">
    <img src="images/below-clients.jpg" alt="" title="">
</div>
</div>
<div class="footer">
    <div class="footer-top">
        <ul>
            <li><a href="about.php">About us</a></li>
            <li><a href="advertise.php">Advertise with us</a></li>
            <li><a href="partners.php">Partners</a></li>
            <li><a href="finance.php">Finance</a></li>
            <li><a href="comparison.php">Comparison</a></li>
            <li><a href="contact-us.php">Contact Us</a></li>
            <li><a href="faq.php">FAQ</a></li>
        </ul>
    </div>
    <div class="footer-bottom">
        AL WAKALAT 2016 copyright &copy;
    </div>
</div>
</div>
<script defer='defer' type="text/javascript" src="js/bootstrap.min.js"></script>
<script defer='defer' type="text/javascript" src="js/owl.carousel.js"></script>
<script defer='defer' type="text/javascript" src="js/jquery.validate.js"></script>
<script defer='defer' type="text/javascript" src="js/custom.js"></script>
<script defer='defer' type="text/javascript" src="js/jquery.fancybox.js?v=2.1.5"></script>
<script defer='defer' type="text/javascript" src="js/jquery.youtubeplaylist.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<script type="text/javascript">
    _atrk_opts = {atrk_acct: "gQWwn1QolK10O7", domain: "alwakalat.com", dynamic: true};
    (function () {
        var as = document.createElement('script');
        as.type = 'text/javascript';
        as.async = true;
        as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js";
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(as, s);
    })();
</script>
<noscript><img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=gQWwn1QolK10O7" style="display:none" height="1" width="1" alt="" /></noscript>
<!-- End Alexa Certify Javascript -->
<script>
    $(function () {
//        alert("sad");
        $(".load-items").slice(0, 24).show();
        if ($(".load-items:hidden").length === 0) {
            $("#ViewMoreListItem").fadeOut('slow');
        }
        $("#ViewMoreListItem").on('click', function (e) {
            e.preventDefault();
            $(".load-items:hidden").slice(0, 24).slideDown();
            if ($(".load-items:hidden").length === 0) {
                $("#ViewMoreListItem").fadeOut('slow');
            }

        });
        $(".loaditems").slice(0, 6).show();
        if ($(".loaditems:hidden").length === 0) {
            $("#ViewMoreListItema").fadeOut('slow');
        }
          $("#ViewMoreListItema").on('click', function (e) {
            e.preventDefault();
            $(".loaditems:hidden").slice(0, 3).slideDown();
            if ($(".loaditems:hidden").length === 0) {
                $("#ViewMoreListItema").fadeOut('slow');
            }

        });
        $(".load-itemes").slice(0, 5).show();
        if ($(".load-itemes:hidden").length === 0) {
            $("#ViewMore").fadeOut('slow');
        }
        $("#ViewMore").on('click', function (e) {
            e.preventDefault();
            $(".load-itemes:hidden").slice(0, 5).slideDown();
            if ($(".load-itemes:hidden").length === 0) {
                $("#ViewMore").fadeOut('slow');
            }

        });
        $(".load-item").slice(0, 2).show();
        if ($(".load-item:hidden").length === 0) {
            $("#ViewMore1").fadeOut('slow');
        }
        $("#ViewMore1").on('click', function (e) {
            e.preventDefault();
            $(".load-item:hidden").slice(0, 2).slideDown();
            if ($(".load-item:hidden").length === 0) {
                $("#ViewMore1").fadeOut('slow');
            }

        });
    });
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
//                $('#example-datatable').DataTable({bFilter: false, bInfo: false});
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
                $("#owl-demo-two ,#owl-demo-two1").owlCarousel({
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




//                --------------------------------------Approved cars normal search Start -------------
//                $("#app_search_maker").change(function ()
//                {
//                    var id = $(this).val();
//                    var dataString = 'id=' + id + '&action=app_search_model';
//
//                    $.ajax
//                            ({
//                                type: "POST",
//                                url: "get_model.php",
//                                data: dataString,
//                                cache: false,
//                                success: function (html)
//                                {
//                                    $("#app_search_model").html(html);
//                                }
//                            });
//
//                });
//                --------------------------------------Approved cars normal search End ---------------

//                --------------------------------------Approved cars Advance search Start---------------
                $("#app_adv_search_maker, #app_adv_search_makers").change(function ()
                {
                    var id = $(this).val();
                    var dataString = 'id=' + id + '&action=app_adv_search_model';

                    $.ajax
                            ({
                                type: "POST",
                                url: "get_model.php",
                                data: dataString,
                                cache: false,
                                success: function (html)
                                {
                                    $("#app_adv_search_model, #app_adv_search_models").html(html);
                                }
                            });

                });
//                --------------------------------------Approved cars Advance search End ---------------

//                --------------------------------------Approved car section --------------------
                $("#app_maker").change(function ()
                {
                    var id = $(this).val();
                    var dataString = 'id=' + id + '&action=app_model';

                    $.ajax
                            ({
                                type: "POST",
                                url: "get_model.php",
                                data: dataString,
                                cache: false,
                                success: function (html)
                                {
                                    $("#app_model").html(html);
                                }
                            });

                });
                $("#app_maker2").change(function ()
                {
                    var id = $(this).val();
                    var dataString = 'id=' + id + '&action=app_model';

                    $.ajax
                            ({
                                type: "POST",
                                url: "get_model.php",
                                data: dataString,
                                cache: false,
                                success: function (html)
                                {
                                    $("#app_model2").html(html);
                                }
                            });

                });
                $("#app_maker3").change(function ()
                {
                    var id = $(this).val();
                    var dataString = 'id=' + id + '&action=app_model';

                    $.ajax
                            ({
                                type: "POST",
                                url: "get_model.php",
                                data: dataString,
                                cache: false,
                                success: function (html)
                                {
                                    $("#app_model3").html(html);
                                }
                            });

                });
                $("#app_model").on('change', function ()
                {
                    var id = $(this).val();
                    var dataString = 'id=' + id + '&action=app_sub_model';

                    $.ajax
                            ({
                                type: "POST",
                                url: "get_model.php",
                                data: dataString,
                                cache: false,
                                success: function (html)
                                {
                                    $("#app_Smodel").html(html);
                                }
                            });

                });
                $("#app_model2").on('change', function ()
                {
                    var id = $(this).val();
                    var dataString = 'id=' + id + '&action=app_sub_model';

                    $.ajax
                            ({
                                type: "POST",
                                url: "get_model.php",
                                data: dataString,
                                cache: false,
                                success: function (html)
                                {
                                    $("#app_Smodel2").html(html);
                                }
                            });

                });
                $("#app_model3").on('change', function ()
                {
                    var id = $(this).val();
                    var dataString = 'id=' + id + '&action=app_sub_model';

                    $.ajax
                            ({
                                type: "POST",
                                url: "get_model.php",
                                data: dataString,
                                cache: false,
                                success: function (html)
                                {
                                    $("#app_Smodel3").html(html);
                                }
                            });

                });


//                ---------------------------------------Approved car Section End
                /*****ADvanced search form******/

                $("#advancedsearch").on('click', function ()
                {
                    $('.budget_inner').toggle($('#find_cars').show());
                });
                $("#normalsearch").on('click', function ()
                {
                    $('#find_cars').toggle($('.budget_inner').show());
                });
//                ---------------------------------------Approved car Section End

            });
            function addCommas(nStr)
            {
                nStr += '';
                x = nStr.split('.');
                x1 = x[0];
                x2 = x.length > 1 ? '.' + x[1] : '';
                var rgx = /(\d+)(\d{3})/;
                while (rgx.test(x1)) {
                    x1 = x1.replace(rgx, '$1' + ',' + '$2');
                }
                return x1 + x2;
            }

            function remove() {
                $("#maker , #app_maker ").css('border', '1px solid rgba(0, 0, 0, 0.1)');
                $("#maker2 , #app_maker2").css('border', '1px solid rgba(0, 0, 0, 0.1)');
                $("#maker3 , #app_maker3").css('border', '1px solid rgba(0, 0, 0, 0.1)');
                $("#model_sel, #app_model").css('border', '1px solid rgba(0, 0, 0, 0.1)');
                $("#model_sel2 ,#app_model2").css('border', '1px solid rgba(0, 0, 0, 0.1)');
                $("#model_sel3 ,#app_model3").css('border', '1px solid rgba(0, 0, 0, 0.1)');
                $("#sub_model_sel ,#app_Smodel").css('border', '1px solid rgba(0, 0, 0, 0.1)');
                $("#sub_model_sel2 ,#app_Smodel2").css('border', '1px solid rgba(0, 0, 0, 0.1)');
                $("#sub_model_sel3 ,#app_Smodel3").css('border', '1px solid rgba(0, 0, 0, 0.1)');
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
                if (maker3 != "" || model3 != "" || version3 != "") {

                    if (maker3 == "") {
                        $("#maker3").css('border', '1px solid red');
                        return false;
                    }


                    if (model3 == "") {
                        $("#model_sel3").css('border', '1px solid red');
                        return false;
                    }


                    if (version3 == "") {
                        $("#sub_model_sel3").css('border', '1px solid red');
                        return false;
                    }
                }
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
            function app_compare() {
                remove();
                var app_maker1 = $("#app_maker").val();
                var app_model1 = $("#app_model").val();
                var app_version1 = $("#app_Smodel").val();
                var app_maker2 = $("#app_maker2").val();
                var app_model2 = $("#app_model2").val();
                var app_version2 = $("#app_Smodel2").val();
                var app_maker3 = $("#app_maker3").val();
                var app_model3 = $("#app_model3").val();
                var app_version3 = $("#app_Smodel3").val();

                if (app_maker1 == "") {
                    $("#app_maker").css('border', '1px solid red');
                    return false;
                }
                if (app_model1 == "") {
                    $("#app_model").css('border', '1px solid red');
                    return false;
                }
                if (app_version1 == "") {
                    $("#app_Smodel").css('border', '1px solid red');
                    return false;
                }
                if (app_maker2 == "") {
                    $("#app_maker2").css('border', '1px solid red');
                    return false;
                }
                if (app_model2 == "") {
                    $("#app_model2").css('border', '1px solid red');
                    return false;
                }
                if (app_version2 == "") {
                    $("#app_Smodel2").css('border', '1px solid red');
                    return false;
                }
                if (app_maker3 != "" || app_model3 != "" || app_version3 != "") {

                    if (app_maker3 == "") {
                        $("#app_maker3").css('border', '1px solid red');
                        return false;
                    }


                    if (app_model3 == "") {
                        $("#app_model3").css('border', '1px solid red');
                        return false;
                    }


                    if (app_version3 == "") {
                        $("#app_Smodel3").css('border', '1px solid red');
                        return false;
                    }
                }
                var dataString = 'maker1=' + app_maker1 + '&maker2=' + app_maker2 + '&maker3=' + app_maker3 + '&model1=' + app_model1 + '&model2=' + app_model2 + '&model3=' + app_model3 + '&version1=' + app_version1 + '&version2=' + app_version2 + '&version3=' + app_version3 + '&action=app_compare';

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
        /*display: block;*/
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
<script type="text/javascript">
            $(document).ready(function ()
            {
                $('.owl-prev').click(function ()
                {
                    $(this).removeClass('next_image_active');
                    $(this).addClass('prev_image_active');


                });
                $('.owl-next').click(function ()
                {
                    $(this).removeClass('prev_image_active');
                    $(this).addClass('next_image_active');
                });
            });
            $(document).ready(function () {
                $('input[name$="budget"]').click(function () {
                    var test = $(this).val();
                    $('div.desc').hide();
                    if (test == "0") {
                        $("#box_one").show();
                    } else {
                        $("#budget_label").show();
                    }
                });
            });


</script>  	

</body>  
<?php
//                        echo "<pre>";
//                        print_r($_SERVER['REQUEST_URI']);
//                        echo "<pre>";
?>
</html>