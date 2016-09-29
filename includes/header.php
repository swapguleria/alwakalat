<?php
//header('Content-type: text/plain; charset=utf-8');
include('config.php');
session_start();
$logo = $get->get_single_result('logo', 'id', '1');
$social = $get->get_all_data('social_links', 'id', 'desc');
$slider_o = $get->get_all_data_active('o_slider', 'slider_id', 'desc', 'slider_active', 'yes');
$clients = $get->get_all_data_active('clients', 'id', 'asc', 'show', 'yes');
$events = $get->get_all_event_data('events', 'id', 'desc', 'status', 'active');
$eventsAll = $get->get_all_data_active('events', 'id', 'desc', 'status', 'active');
$service_providers = $get->get_all_data_active('providers', 'id', 'desc', 'show', 'yes');

//$page = $_SERVER['REQUEST_URI'];

$page = str_replace("/", "", $_SERVER['SCRIPT_NAME']);


//echo "<pre>";
//print_r($page);
//print_r($_SERVER);
//echo $page;
if ($page == "index.php" || $page == "")
    {
    $keywords = "Qatar cars,Qatar car,doha cars,doha car,car qatar,cars qatar,car doha,cars doha,car service qatar,car service doha,car rental qatar,car rental doha,cars service qatar,cars service doha,cars renatal qatar,cars rental doha,car comparison,car comparison doha,car comparison qatar,cars comparison doha,cars comparison qatar,cars for sale qatar,car for sale qatar,cars for sale doha,car for sale doha,car service centre qatar,cars service centre qata,cars service centre doha,car service centre doha,car dealers qatar,car dealers doha,cars dealer qatar,cars dealer doha,buy car doha,buy car qatar,wakalat qatar,wakalat doha,alwakalat qatar,alwakalat doha,buying cars doha,buying cars qatar,buy cars qatar,buy cars doha,toyota for sale qatar,toyota for sale doha,nissan for sale qatar,nissan for sale doha,luxury cars for sale qatar,luxury cars for sale doha,sport cars for sale doha,sport cars for sale qatar,buying cars qatar,buying car doha,rolls royce qatar,rolls royce doha,bmw qatar,bmw doha,range rover doha,range rover qatar,lexus qatar,lexus doha,car event qatar,car events doha,car reviews qatar,car reviews doha,car promotions in qatar,car promotions in doha,car ACCESSORIES qatar,car accessories doha,alwakalat partners,alwakalat service providers,service providers qatar,service providers doha,car service providers qatar,car service providers doha,wakalat ,alwakalat,cars finance options,cars finance ,alwakalat card,almulathem card,almulatham card,alwakalat tshirt,alwakalat shop ,alwakalat car reviews ,alwakalat snapchat review,alwakalat instagram,compare cars doha,compare cars qatar";
    $description = " you can easily find car in Qutar.";
    }else if ($page == "about.php")
    {
     $keywords = "alwakalat partners,New trade engineering ,New trade engineering qatar,New trade engineering doha,jaidah automotive ,jaidah automotive qatar,jaidah automotive doha,saleh hamad almana co.,saleh hamad almana ,saleh hamad almana qatar,saleh hamad almana doha,nissan qatar,nissan doha,infinity qatar,infinity doha,chevrolet qatar,chevrolet doha,abdullah abdulghani ,abdullah abdulghani qatar,toyota qatar,toyota doha,lexus qatar,lexus doha,alfardan premier motors,alfardan premier motors qatar,alfardan premier motors doha,alfardan,alfardan qatar,alfardan motors,alfardan doha,al attiya motors and trading company,alattiya motors and trading company,alattiya motors & trading company,alattiya motors,alattiya motors qatar,alattiya motors doha,Kia ,Kia qatar,kia doha,Mustafawi motors ,mustafawai automobiles,mustafawi qatar,mustafawi doha,mustafawi automobiles doha,mustafawi automobiles qatar,mercedes qatar,mercedes doha,almana motors,almana motors qatar,almana motors doha,ford qatar,fiat qatar,fiat doha,alfa romeo doha,alfa romeo qatar,ford showroom,ford service centre,kia showroom,kia service centre,chevrolet showroom,chevrolet service centre,toyota showroom,toyota service centre,nissan showroom,nissan service centre,kia showroom qatar,kia service centre qatar,chevrolet showroom qatar,chevrolet service centre qatar,toyota showroom qatar,toyota service centre qatar,nissan showroom qatar,nissan service centre qatar,kia showroom doha,kia service centre doha,chevrolet showroom doha,chevrolet service centre doha,toyota showroom doha,toyota service centre doha,nissan showroom doha,nissan service centre doha,car dealers qatar,car dealers doha,car showrooms doha,car showrooms qatar";
    $description = "you can easily find car in Qutar.";
    }
    else if ($page == "partners.php")
    {
    $keywords = "alwakalat partners,New trade engineering ,New trade engineering qatar,New trade engineering doha,jaidah automotive ,jaidah automotive qatar,jaidah automotive doha,saleh hamad almana co.,saleh hamad almana ,saleh hamad almana qatar,saleh hamad almana doha,nissan qatar,nissan doha,infinity qatar,infinity doha,chevrolet qatar,chevrolet doha,abdullah abdulghani ,abdullah abdulghani qatar,toyota qatar,toyota doha,lexus qatar,lexus doha,alfardan premier motors,alfardan premier motors qatar,alfardan premier motors doha,alfardan,alfardan qatar,alfardan motors,alfardan doha,al attiya motors and trading company,alattiya motors and trading company,alattiya motors & trading company,alattiya motors,alattiya motors qatar,alattiya motors doha,Kia ,Kia qatar,kia doha,Mustafawi motors ,mustafawai automobiles,mustafawi qatar,mustafawi doha,mustafawi automobiles doha,mustafawi automobiles qatar,mercedes qatar,mercedes doha,almana motors,almana motors qatar,almana motors doha,ford qatar,fiat qatar,fiat doha,alfa romeo doha,alfa romeo qatar,ford showroom,ford service centre,kia showroom,kia service centre,chevrolet showroom,chevrolet service centre,toyota showroom,toyota service centre,nissan showroom,nissan service centre,kia showroom qatar,kia service centre qatar,chevrolet showroom qatar,chevrolet service centre qatar,toyota showroom qatar,toyota service centre qatar,nissan showroom qatar,nissan service centre qatar,kia showroom doha,kia service centre doha,chevrolet showroom doha,chevrolet service centre doha,toyota showroom doha,toyota service centre doha,nissan showroom doha,nissan service centre doha,car dealers qatar,car dealers doha,car showrooms doha,car showrooms qatar";
    $description = " you can easily Find Partners of alwakalat in Quatar.";
    }
    else if ($page == "partner-detail.php")
    {
    $keywords = "alwakalat partners,New trade engineering ,New trade engineering qatar,New trade engineering doha,jaidah automotive ,jaidah automotive qatar,jaidah automotive doha,saleh hamad almana co.,saleh hamad almana ,saleh hamad almana qatar,saleh hamad almana doha,nissan qatar,nissan doha,infinity qatar,infinity doha,chevrolet qatar,chevrolet doha,abdullah abdulghani ,abdullah abdulghani qatar,toyota qatar,toyota doha,lexus qatar,lexus doha,alfardan premier motors,alfardan premier motors qatar,alfardan premier motors doha,alfardan,alfardan qatar,alfardan motors,alfardan doha,al attiya motors and trading company,alattiya motors and trading company,alattiya motors & trading company,alattiya motors,alattiya motors qatar,alattiya motors doha,Kia ,Kia qatar,kia doha,Mustafawi motors ,mustafawai automobiles,mustafawi qatar,mustafawi doha,mustafawi automobiles doha,mustafawi automobiles qatar,mercedes qatar,mercedes doha,almana motors,almana motors qatar,almana motors doha,ford qatar,fiat qatar,fiat doha,alfa romeo doha,alfa romeo qatar,ford showroom,ford service centre,kia showroom,kia service centre,chevrolet showroom,chevrolet service centre,toyota showroom,toyota service centre,nissan showroom,nissan service centre,kia showroom qatar,kia service centre qatar,chevrolet showroom qatar,chevrolet service centre qatar,toyota showroom qatar,toyota service centre qatar,nissan showroom qatar,nissan service centre qatar,kia showroom doha,kia service centre doha,chevrolet showroom doha,chevrolet service centre doha,toyota showroom doha,toyota service centre doha,nissan showroom doha,nissan service centre doha,car dealers qatar,car dealers doha,car showrooms doha,car showrooms qatar";
    $description = " you can easily Find Partners of alwakalat in Quatar.";
    }
    else if ($page == "finance.php")
    {
    $keywords = "buy car doha,buy car qatar,buying cars doha,buying cars qatar,buy cars qatar,buy cars doha,toyota for sale qatar,cars doha";
    $description = " you can easily find finance options for car in quatar.";
    }else if ($page == "car_events.php")
    {
    $keywords = "car event qatar,car events doha";
    $description = "In this you can find any events on alwakalat in Quatar.";
    }else if ($page == "comparison.php")
    {
    $keywords = "car comparison,car comparison doha,car comparison qatar,cars comparison doha,cars comparison qatar";
    $description = "In this you can easily take any service regarding your home work.";
    }else if ($page == "guide-new-car.php")
    {
    $keywords = "wakalat qatar,wakalat doha,alwakalat qatar,alwakalat doha";
    $description = "In this you can easily take any guide regarding alwakalat.";
    }
    else if ($page == "service_providers.php")
    {
     $keywords = "car service qatar,car service doha,car rental qatar,car rental doha,cars service qatar,cars service doha,cars renatal qatar,cars rental doha,car service centre qatar,cars service centre qata,cars service centre doha,car service centre doha,car ACCESSORIES qatar,car accessories doha,alwakalat partners,alwakalat service providers,service providers qatar,service providers doha,car service providers qatar,car service providers doha,Detailer Qatar,Detailer Doha,Auto Innovation Qatar,Auto Innovation Doha,AWRS Qatar,AWRS Doha,City Car Qatar,City car doha,Royal car doha,royal car qatar,A1 automotive qatar,A1 automotive doha,brio auto care ,brio auto care qatar,brio auto care doha,carbono ,carbono qatar ,carbono doha,vantage auto service,vantage auto service doha,vantage auto servivce qatar,qatar car service,doha car service,repair shop qatar,repair shop doha,car tuning doha,car tuning qatar,window tinting doha,
window tinting qatar,car window tinting doha,car window tinting qatar,car cleaning service qatar,car cleaning service doha,car detailing doha,car detailing qatar,car paint doha,car paint qatar";
    $description = "In this you can easily take any service regarding your home work.";
    }
    else if ($page == "provider-detail.php")
    {
     $keywords = "car service qatar,car service doha,car rental qatar,car rental doha,cars service qatar,cars service doha,cars renatal qatar,cars rental doha,car service centre qatar,cars service centre qata,cars service centre doha,car service centre doha,car ACCESSORIES qatar,car accessories doha,alwakalat partners,alwakalat service providers,service providers qatar,service providers doha,car service providers qatar,car service providers doha,Detailer Qatar,Detailer Doha,Auto Innovation Qatar,Auto Innovation Doha,AWRS Qatar,AWRS Doha,City Car Qatar,City car doha,Royal car doha,royal car qatar,A1 automotive qatar,A1 automotive doha,brio auto care ,brio auto care qatar,brio auto care doha,carbono ,carbono qatar ,carbono doha,vantage auto service,vantage auto service doha,vantage auto servivce qatar,qatar car service,doha car service,repair shop qatar,repair shop doha,car tuning doha,car tuning qatar,window tinting doha,
window tinting qatar,car window tinting doha,car window tinting qatar,car cleaning service qatar,car cleaning service doha,car detailing doha,car detailing qatar,car paint doha,car paint qatar";
    $description = "In this you can easily take any service regarding your home work.";
    }
    else if ($page == "car_reviewsall.php")
    {
    $keywords = "car reviews qatar,car reviews doha";
    $description = " you can easily take any review regarding alwakalat.";
    }else if ($page == "shop.php")
    {
    $keywords = "car ACCESSORIES qatar,car accessories doha,buying cars qatar,buying car doha,buying cars doha,buying cars qatar,buy cars qatar,buy cars doha,buy car doha,buy car qatar";
    $description = "In this you can easily buy any car.";
    }else if ($page == "promotion.php")
    {
    $keywords = "car promotions in qatar,car promotions in doha";
    $description = "In this you can easily take any promotion of alwakalat.";
    }else if ($page == "all_car.php")
    {
    $keywords = "Qatar cars,Qatar car,doha cars,doha car,car qatar,cars qatar,car doha,cars doha,range rover doha,range rover qatar,lexus qatar,lexus doha,bmw qatar,bmw doha,";
    $description = "In this you can easily find car .";
    }else if ($page == "search_result.php")
    {
    $keywords = "Qatar cars,Qatar car,doha cars,doha car,car qatar,cars qatar,car doha,cars doha,rolls royce qatar,rolls royce doha,bmw qatar,bmw doha,range rover doha,range rover qatar,lexus qatar,lexus doha";
    $description = "In this you can easily find car .";
    }else if ($page == "partner-detail.php")
    {
    $keywords = "car service qatar,car service doha,cars service qatar,cars service doha,car service centre qatar,cars service centre qata,cars service centre doha,car service centre doha,car dealers qatar,car dealers doha,cars dealer qatar,cars dealer doha";
    $description = "In this you can easily find partner of alwakalat in quater.";
    }else if ($page == "brand_car.php")
    {
    $keywords = "rolls royce qatar,rolls royce doha,bmw qatar,bmw doha,range rover doha,range rover qatar,lexus qatar,lexus doha";
    $description = "In this you can easily find brand car .";
    }
else if ($page == "contact-us.php")
    {
    $keywords = "Qatar cars,Qatar car,doha cars,doha car,car qatar,cars qatar,car doha,cars doha";
    $description = "In this you can easily find car on alwakalat .";
    }
else if ($page == "advertise.php")
    {
    $keywords = "wakalat qatar,wakalat doha,alwakalat qatar,alwakalat doha";
    $description = "In this you can find advertise on alwakalat .";
    }
else if ($page == "faq.php")
    {
    $keywords = "car rental qatar,car rental doha,cars renatl qatar,cars rental doha";
    $description = "In this you can find advertise on alwakalat .";
    }
else
    {
    $keywords = "Qatar cars,Qatar car,doha cars,doha car,car qatar,cars qatar,car doha,cars doha,cars renatl qatar,cars rental doha,cars for sale qatar,car for sale qatar,toyota for sale qatar,toyota for sale doha,nissan for sale qatar,nissan for sale doha,luxury cars for sale qatar,luxury cars for sale doha,sport cars for sale doha,sport cars for sale qatar	";
    $description = " you can easily find car in Qutar.";
    }
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

        <link rel="stylesheet" href="css/font-awsome.css" >
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/magic.css" rel="stylesheet">
        <link href="css/owl.carousel.css" rel="stylesheet"> 
        <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css?v=2.1.5" media="screen" />
        <link rel="stylesheet" href="css/jquery-ui.css" /> 
        <link href="css/style.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <!--<script src='js/api.js'></script>-->

        <script defer='defer' type="text/javascript" src="js/api.js"></script><style>
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
        <div id ="wait" style="position: fixed; padding: 2px;display:none; z-index: 9; top: 25%; width: 270px; left: 40%;"><img src="images/loading-1.gif"  ></div>
        <div class="main">
            <div class="header">
                <div class="header-top">
                    <div class="container">
                        <ul>
                            <li><a href="https://www.facebook.com/alwakalatsite?_rdr=p" target="_blank"><img title="" alt="" src="images/fb-icon.png" ></a></li>
                            <li><a href="https://twitter.com/al_wakalat" target="_blank"><img title="" alt="" src="images/twiiter-icon.png" ></a></li>
                            <li><a href="https://www.instagram.com/alwakalat/" target="_blank"><img title="" alt="" src="images/insta-icon.png" ></a></li>
                            <li><a href="https://www.snapchat.com/add/alwakalat" target="_blank"><img title="" alt="" src="images/snap-chat.png" ></a></li>
                        </ul>

                        <ul class="pull-right launguage">
                            <?php if(@$_SESSION['whitelist']){  ?><a href="http://www.alwakalat.com/wishlist.php"><img src="images/wishlist.png" alt="" title="" height="30px" width="auto"> </a> <?php } ?>
                            <a href="http://alwakalat.com/arabic<?php echo (@$_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : ""; ?><?php echo (@$_SERVER['argv'][0]) ? '?' . $_SERVER['argv'][0] : ""; ?>"><img src="images/mq1.png" alt="" title="" height="30px" width="auto""> </a>
                        </ul>
                    </div>
                </div>
                <div class="header-bottom">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid container"> 
                            <div class="logo"><a href="index.php"><img src="<?php echo $logo['full_path']; ?>" alt="" title="" ></a></div>
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                            </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">	<ul class="nav navbar-nav">	<?php
                                    $full_name = $_SERVER['PHP_SELF'];
                                    $name_array = explode('/', $full_name);
                                    $count = count($name_array);
                                    $page_name = $name_array[$count - 1];
                                    ?><li><a class="<?php echo ($page_name == 'index.php') ? 'active' : ''; ?>" href="index.php">Home</a></li>							<li><a class="<?php echo ($page_name == 'about.php') ? 'active' : ''; ?>" href="about.php">About us</a></li>							<li><a class="<?php echo ($page_name == 'partners.php') ? 'active' : ''; ?>" href="partners.php">Partners</a></li>							<li><a class="<?php echo ($page_name == 'finance.php') ? 'active' : ''; ?>" href="finance.php">Finance</a></li>							<li><a class="<?php echo ($page_name == 'car_events.php') ? 'active' : ''; ?>" href="car_events.php">Events</a></li>							<li><a class="<?php echo ($page_name == 'comparison.php') ? 'active' : ''; ?>" href="comparison.php">Comparison</a></li>						</ul>                                                           <ul class="nav navbar-nav navbar-right">									<li><a class="<?php echo ($page_name == 'guide-new-car.php') ? 'active' : ''; ?>" href="guide-new-car.php">Al Wakalat Card</a></li>				
                                    <li><a class="<?php echo ($page_name == 'service_providers.php') ? 'active' : ''; ?>" href="service_providers.php">Service Provider</a></li>
                                    <li><a class="<?php echo ($page_name == 'car_reviewsall.php') ? 'active' : ''; ?>" href="car_reviewsall.php">Car Reviews</a></li>					<li><a class="<?php echo ($page_name == 'shop.php') ? 'active' : ''; ?>" href="shop.php">Shop</a></li>							

                                    <li><a class="<?php echo ($page_name == 'contact-us.php') ? 'active' : ''; ?>" href="contact-us.php">Contact Us</a>									
                                        <ul class="sub_menu">
                                            <li>
                                                <a href="advertise.php">
                                                    Advertise with us
                                                </a></li>
                                            <li><a href="faq.php">FAQ</a></li></ul>
                                    </li>

                                </ul>
                            </div>

                        </div>
                </div>
                </nav>
            </div>

            <?php
            $userid = "1265122336";
            $accessToken = "1265122336.1677ed0.e2e75148d8ad47fc912cc209af23dfc4";

            function fetchData($url)
                {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_TIMEOUT, 20);
                $result = curl_exec($ch);
                curl_close($ch);
                return $result;
                }

            $result = fetchData("https://api.instagram.com/v1/users/{$userid}/media/recent/?access_token={$accessToken}&count=100");
            $result = json_decode($result);
            ?>