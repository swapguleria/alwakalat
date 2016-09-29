<?php
$main_url = "http://alwakalat.com";
include('config.php');
$logo = $get->get_single_result('logo', 'id', '1');
$page = str_replace("/", "", $_SERVER['REQUEST_URI']);
$keywords = "Qatar cars,Qatar car,doha cars,doha car,car qatar,cars qatar,car doha,cars doha,cars renatl qatar,cars rental doha,cars for sale qatar,car for sale qatar,toyota for sale qatar,toyota for sale doha,nissan for sale qatar,nissan for sale doha,luxury cars for sale qatar,luxury cars for sale doha,sport cars for sale doha,sport cars for sale qatar	";
$description = " you can easily find car in Qutar.";

$keywords = "wakalat qatar,wakalat doha,alwakalat qatar,alwakalat doha";
?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Alwakalat</title>

        <meta name="keywords"
              content="<?php echo $keywords; ?>">
        <meta name="description"
              content="<?php echo $description; ?>">
        <meta name="author" content="alwakalat" />

        <link rel="stylesheet" href="<?php echo $main_url; ?>/css/font-awsome.css" >

        <link href="<?php echo $main_url; ?>/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo $main_url; ?>/css/magic.css" rel="stylesheet">
        <link href="<?php echo $main_url; ?>/css/owl.carousel.css" rel="stylesheet"> 
        <link rel="stylesheet" type="text/css" href="<?php echo $main_url; ?>/css/jquery.fancybox.css?v=2.1.5" media="screen" />
        <link rel="stylesheet" href="<?php echo $main_url; ?>/css/jquery-ui.css" /> 
        <link href="<?php echo $main_url; ?>/css/style.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800' rel='stylesheet' type='text/css'>
        <!--<script src='js/api.js'></script>-->

        <script defer='defer' type="text/javascript" src="<?php echo $main_url; ?>/js/api.js"></script><style>
            .error{color:red} 
        </style>
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-81399867-1', 'auto');
            ga('send', 'pageview');

        </script>
    </head>
    <body>
        <div class="overlay"></div>
        <div id ="wait" style="position: fixed; padding: 2px;display:none; z-index: 9; top: 25%; width: 270px; left: 40%;"><img src="<?php echo $main_url; ?>/images/loading-1.gif"  ></div>
        <div class="main">
            <div class="header">
                <div class="header-top">
                    <div class="container">
                        <ul>
                            <li><a href="https://www.facebook.com/alwakalatsite?_rdr=p" target="_blank"><img title="" alt="" src="<?php echo $main_url; ?>/images/fb-icon.png" ></a></li>
                            <li><a href="https://twitter.com/al_wakalat" target="_blank"><img title="" alt="" src="<?php echo $main_url; ?>/images/twiiter-icon.png" ></a></li>
                            <li><a href="https://www.instagram.com/alwakalat/" target="_blank"><img title="" alt="" src="<?php echo $main_url; ?>/images/insta-icon.png" ></a></li>
                            <li><a href="https://www.snapchat.com/add/alwakalat" target="_blank"><img title="" alt="" src="<?php echo $main_url; ?>/images/snap-chat.png" ></a></li>
                        </ul>

                        <ul class="pull-right launguage">
                            <a href="http://alwakalat.com/arabic<?php echo (@$_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : ""; ?><?php echo (@$_SERVER['argv'][0]) ? '?' . $_SERVER['argv'][0] : ""; ?>"><img src="<?php echo $main_url; ?>/images/mq1.jpg" alt="" title="" height="26px" width="23px"> </a>
                        </ul>
                    </div>
                </div>
                <div class="header-bottom">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid container"> 
                            <div class="logo"><a href="<?php echo $main_url; ?>/index.php"><img src="<?php echo $main_url . "/" . $logo['full_path']; ?>" alt="" title="" ></a></div>
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                            </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">	
                                <ul class="nav navbar-nav">	<?php
                                    $full_name = $_SERVER['PHP_SELF'];
                                    $name_array = explode('/', $full_name);
                                    $count = count($name_array);
                                    $page_name = $name_array[$count - 1];
                                    ?><li><a class="<?php echo ($page_name == 'index.php') ? 'active' : ''; ?>" href="<?php echo $main_url; ?>/index.php">Home</a></li>							<li><a class="<?php echo ($page_name == 'about.php') ? 'active' : ''; ?>" href="<?php echo $main_url; ?>/about.php">About us</a></li>							<li><a class="<?php echo ($page_name == 'partners.php') ? 'active' : ''; ?>" href="<?php echo $main_url; ?>/partners.php">Partners</a></li>							<li><a class="<?php echo ($page_name == 'finance.php') ? 'active' : ''; ?>" href="<?php echo $main_url; ?>/finance.php">Finance</a></li>							<li><a class="<?php echo ($page_name == 'car_events.php') ? 'active' : ''; ?>" href="<?php echo $main_url; ?>/car_events.php">Events</a></li>							<li><a class="<?php echo ($page_name == 'comparison.php') ? 'active' : ''; ?>" href="<?php echo $main_url; ?>/comparison.php">Comparison</a></li>						</ul>                                                           <ul class="nav navbar-nav navbar-right">									<li><a class="<?php echo ($page_name == 'guide-new-car.php') ? 'active' : ''; ?>" href="<?php echo $main_url; ?>/guide-new-car.php">Al Wakalat Card</a></li>				
                                    <li><a class="<?php echo ($page_name == 'service_providers.php') ? 'active' : ''; ?>" href="<?php echo $main_url; ?>/service_providers.php">Service Provider</a></li>
                                    <li><a class="<?php echo ($page_name == 'car_reviewsall.php') ? 'active' : ''; ?>" href="<?php echo $main_url; ?>/car_reviewsall.php">Car Reviews</a></li>					<li><a class="<?php echo ($page_name == 'shop.php') ? 'active' : ''; ?>" href="<?php echo $main_url; ?>/shop.php">Shop</a></li>							

                                    <li><a class="<?php echo ($page_name == 'contact-us.php') ? 'active' : ''; ?>" href="<?php echo $main_url; ?>/contact-us.php">Contact Us</a>									
                                        <ul class="sub_menu">
                                            <li>
                                                <a href="<?php echo $main_url; ?>/advertise.php">
                                                    Advertise with us
                                                </a></li>
                                            <li><a href="<?php echo $main_url; ?>/faq.php">FAQ</a></li></ul>
                                    </li>

                                </ul>
                            </div>

                        </div>
                </div>
                </nav>
            </div>
