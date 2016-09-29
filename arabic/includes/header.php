<?php
include('config.php');


session_start();
$logo = $get->get_single_result('logo', 'id', '1');

$social = $get->get_all_data('social_links', 'id', 'desc');

/* $slider_o	=	$get->get_all_data_active('o_slider','slider_id','desc','slider_active','yes');  */

$clients = $get->get_all_data_active('clients', 'id', 'asc', 'show', 'yes');

$events1 = $get->get_all_event_data('events', 'id', 'desc', 'status', 'active');

$eventsAll = $get->get_all_data_active('events', 'id', 'desc', 'status', 'active');



$service_providers = $get->get_all_data_active('providers', 'id', 'desc', 'show', 'yes');

$page = str_replace("/", "", $_SERVER['SCRIPT_NAME']);
//echo "<pre>";
//print_r($_SERVER);
//echo "</pre>";
if ($page == "arabicindex.php")
    {
    $keywords = "Qatar cars,Qatar car,doha cars,doha car,car qatar,cars qatar,car doha,cars doha,car service qatar,car service doha,car rental qatar,car rental doha,cars service qatar,cars service doha,cars renatal qatar,cars rental doha,car comparison,car comparison doha,car comparison qatar,cars comparison doha,cars comparison qatar,cars for sale qatar,car for sale qatar,cars for sale doha,car for sale doha,car service centre qatar,cars service centre qata,cars service centre doha,car service centre doha,car dealers qatar,car dealers doha,cars dealer qatar,cars dealer doha,buy car doha,buy car qatar,wakalat qatar,wakalat doha,alwakalat qatar,alwakalat doha,buying cars doha,buying cars qatar,buy cars qatar,buy cars doha,toyota for sale qatar,toyota for sale doha,nissan for sale qatar,nissan for sale doha,luxury cars for sale qatar,luxury cars for sale doha,sport cars for sale doha,sport cars for sale qatar,buying cars qatar,buying car doha,rolls royce qatar,rolls royce doha,bmw qatar,bmw doha,range rover doha,range rover qatar,lexus qatar,lexus doha,car event qatar,car events doha,car reviews qatar,car reviews doha,car promotions in qatar,car promotions in doha,car ACCESSORIES qatar,car accessories doha,alwakalat partners,alwakalat service providers,service providers qatar,service providers doha,car service providers qatar,car service providers doha,wakalat ,alwakalat,cars finance options,cars finance ,alwakalat card,almulathem card,almulatham card,alwakalat tshirt,alwakalat shop ,alwakalat car reviews ,alwakalat snapchat review,alwakalat instagram,compare cars doha,compare cars qatar";
    $description = " you can easily find car in Qutar.";
    }
else if ($page == "arabicabout.php")
    {
    $keywords = "Qatar cars,Qatar car,doha cars,doha car,car qatar,cars qatar,car doha,cars doha,wakalat qatar,wakalat doha,lwakalat qatar,alwakalat doha";
    $description = "you can easily find car in Qutar.";
    }
else if ($page == "arabicpartners.php")
    {
    $keywords = "alwakalat partners,New trade engineering ,New trade engineering qatar,New trade engineering doha,jaidah automotive ,jaidah automotive qatar,jaidah automotive doha,saleh hamad almana co.,saleh hamad almana ,saleh hamad almana qatar,saleh hamad almana doha,nissan qatar,nissan doha,infinity qatar,infinity doha,chevrolet qatar,chevrolet doha,abdullah abdulghani ,abdullah abdulghani qatar,toyota qatar,toyota doha,lexus qatar,lexus doha,alfardan premier motors,alfardan premier motors qatar,alfardan premier motors doha,alfardan,alfardan qatar,alfardan motors,alfardan doha,al attiya motors and trading company,alattiya motors and trading company,alattiya motors & trading company,alattiya motors,alattiya motors qatar,alattiya motors doha,Kia ,Kia qatar,kia doha,Mustafawi motors ,mustafawai automobiles,mustafawi qatar,mustafawi doha,mustafawi automobiles doha,mustafawi automobiles qatar,mercedes qatar,mercedes doha,almana motors,almana motors qatar,almana motors doha,ford qatar,fiat qatar,fiat doha,alfa romeo doha,alfa romeo qatar,ford showroom,ford service centre,kia showroom,kia service centre,chevrolet showroom,chevrolet service centre,toyota showroom,toyota service centre,nissan showroom,nissan service centre,kia showroom qatar,kia service centre qatar,chevrolet showroom qatar,chevrolet service centre qatar,toyota showroom qatar,toyota service centre qatar,nissan showroom qatar,nissan service centre qatar,kia showroom doha,kia service centre doha,chevrolet showroom doha,chevrolet service centre doha,toyota showroom doha,toyota service centre doha,nissan showroom doha,nissan service centre doha,car dealers qatar,car dealers doha,car showrooms doha,car showrooms qatar";
    $description = " you can easily Find Partners of alwakalat in Quatar.";
    }
else if ($page == "arabicpartner-detail.php")
    {
    $keywords = "alwakalat partners,New trade engineering ,New trade engineering qatar,New trade engineering doha,jaidah automotive ,jaidah automotive qatar,jaidah automotive doha,saleh hamad almana co.,saleh hamad almana ,saleh hamad almana qatar,saleh hamad almana doha,nissan qatar,nissan doha,infinity qatar,infinity doha,chevrolet qatar,chevrolet doha,abdullah abdulghani ,abdullah abdulghani qatar,toyota qatar,toyota doha,lexus qatar,lexus doha,alfardan premier motors,alfardan premier motors qatar,alfardan premier motors doha,alfardan,alfardan qatar,alfardan motors,alfardan doha,al attiya motors and trading company,alattiya motors and trading company,alattiya motors & trading company,alattiya motors,alattiya motors qatar,alattiya motors doha,Kia ,Kia qatar,kia doha,Mustafawi motors ,mustafawai automobiles,mustafawi qatar,mustafawi doha,mustafawi automobiles doha,mustafawi automobiles qatar,mercedes qatar,mercedes doha,almana motors,almana motors qatar,almana motors doha,ford qatar,fiat qatar,fiat doha,alfa romeo doha,alfa romeo qatar,ford showroom,ford service centre,kia showroom,kia service centre,chevrolet showroom,chevrolet service centre,toyota showroom,toyota service centre,nissan showroom,nissan service centre,kia showroom qatar,kia service centre qatar,chevrolet showroom qatar,chevrolet service centre qatar,toyota showroom qatar,toyota service centre qatar,nissan showroom qatar,nissan service centre qatar,kia showroom doha,kia service centre doha,chevrolet showroom doha,chevrolet service centre doha,toyota showroom doha,toyota service centre doha,nissan showroom doha,nissan service centre doha,car dealers qatar,car dealers doha,car showrooms doha,car showrooms qatar";
    $description = " you can easily Find Partners of alwakalat in Quatar.";
    }
else if ($page == "arabicfinance.php")
    {
    $keywords = "buy car doha,buy car qatar,buying cars doha,buying cars qatar,buy cars qatar,buy cars doha,toyota for sale qatar,cars doha";
    $description = " you can easily find finance options for car in quatar.";
    }
else if ($page == "arabiccar_events.php")
    {
    $keywords = "car event qatar,car events doha";
    $description = "In this you can find any events on alwakalat in Quatar.";
    }
else if ($page == "arabiccomparison.php")
    {
    $keywords = "car comparison,car comparison doha,car comparison qatar,cars comparison doha,cars comparison qatar";
    $description = "In this you can easily take any service regarding your home work.";
    }
else if ($page == "arabicguide-new-car.php")
    {
    $keywords = "wakalat qatar,wakalat doha,alwakalat qatar,alwakalat doha";
    $description = "In this you can easily take any guide regarding alwakalat.";
    }
else if ($page == "arabicservice_providers.php")
    {
    $keywords = "car service qatar,car service doha,car rental qatar,car rental doha,cars service qatar,cars service doha,cars renatal qatar,cars rental doha,car service centre qatar,cars service centre qata,cars service centre doha,car service centre doha,car ACCESSORIES qatar,car accessories doha,alwakalat partners,alwakalat service providers,service providers qatar,service providers doha,car service providers qatar,car service providers doha,Detailer Qatar,Detailer Doha,Auto Innovation Qatar,Auto Innovation Doha,AWRS Qatar,AWRS Doha,City Car Qatar,City car doha,Royal car doha,royal car qatar,A1 automotive qatar,A1 automotive doha,brio auto care ,brio auto care qatar,brio auto care doha,carbono ,carbono qatar ,carbono doha,vantage auto service,vantage auto service doha,vantage auto servivce qatar,qatar car service,doha car service,repair shop qatar,repair shop doha,car tuning doha,car tuning qatar,window tinting doha,
window tinting qatar,car window tinting doha,car window tinting qatar,car cleaning service qatar,car cleaning service doha,car detailing doha,car detailing qatar,car paint doha,car paint qatar";
    $description = "In this you can easily take any service regarding your home work.";
    }
else if ($page == "arabicprovider-detail.php")
    {
    $keywords = "car service qatar,car service doha,car rental qatar,car rental doha,cars service qatar,cars service doha,cars renatal qatar,cars rental doha,car service centre qatar,cars service centre qata,cars service centre doha,car service centre doha,car ACCESSORIES qatar,car accessories doha,alwakalat partners,alwakalat service providers,service providers qatar,service providers doha,car service providers qatar,car service providers doha,Detailer Qatar,Detailer Doha,Auto Innovation Qatar,Auto Innovation Doha,AWRS Qatar,AWRS Doha,City Car Qatar,City car doha,Royal car doha,royal car qatar,A1 automotive qatar,A1 automotive doha,brio auto care ,brio auto care qatar,brio auto care doha,carbono ,carbono qatar ,carbono doha,vantage auto service,vantage auto service doha,vantage auto servivce qatar,qatar car service,doha car service,repair shop qatar,repair shop doha,car tuning doha,car tuning qatar,window tinting doha,
window tinting qatar,car window tinting doha,car window tinting qatar,car cleaning service qatar,car cleaning service doha,car detailing doha,car detailing qatar,car paint doha,car paint qatar";
    $description = "In this you can easily take any service regarding your home work.";
    }
else if ($page == "arabiccar_reviewsall.php")
    {
    $keywords = "car reviews qatar,car reviews doha";
    $description = " you can easily take any review regarding alwakalat.";
    }
else if ($page == "shop.php")
    {
    $keywords = "car ACCESSORIES qatar,car accessories doha,buying cars qatar,buying car doha,buying cars doha,buying cars qatar,buy cars qatar,buy cars doha,buy car doha,buy car qatar";
    $description = "In this you can easily buy any car.";
    }
else if ($page == "arabicpromotion.php")
    {
    $keywords = "car promotions in qatar,car promotions in doha";
    $description = "In this you can easily take any promotion of alwakalat.";
    }
else if ($page == "arabicall_car.php")
    {
    $keywords = "Qatar cars,Qatar car,doha cars,doha car,car qatar,cars qatar,car doha,cars doha,range rover doha,range rover qatar,lexus qatar,lexus doha,bmw qatar,bmw doha,";
    $description = "In this you can easily find car .";
    }
else if ($page == "arabicsearch_result.php")
    {
    $keywords = "Qatar cars,Qatar car,doha cars,doha car,car qatar,cars qatar,car doha,cars doha,rolls royce qatar,rolls royce doha,bmw qatar,bmw doha,range rover doha,range rover qatar,lexus qatar,lexus doha";
    $description = "In this you can easily find car .";
    }
else if ($page == "arabicpartner-detail.php")
    {
    $keywords = "alwakalat partners,New trade engineering ,New trade engineering qatar,New trade engineering doha,jaidah automotive ,jaidah automotive qatar,jaidah automotive doha,saleh hamad almana co.,saleh hamad almana ,saleh hamad almana qatar,saleh hamad almana doha,nissan qatar,nissan doha,infinity qatar,infinity doha,chevrolet qatar,chevrolet doha,abdullah abdulghani ,abdullah abdulghani qatar,toyota qatar,toyota doha,lexus qatar,lexus doha,alfardan premier motors,alfardan premier motors qatar,alfardan premier motors doha,alfardan,alfardan qatar,alfardan motors,alfardan doha,al attiya motors and trading company,alattiya motors and trading company,alattiya motors & trading company,alattiya motors,alattiya motors qatar,alattiya motors doha,Kia ,Kia qatar,kia doha,Mustafawi motors ,mustafawai automobiles,mustafawi qatar,mustafawi doha,mustafawi automobiles doha,mustafawi automobiles qatar,mercedes qatar,mercedes doha,almana motors,almana motors qatar,almana motors doha,ford qatar,fiat qatar,fiat doha,alfa romeo doha,alfa romeo qatar,ford showroom,ford service centre,kia showroom,kia service centre,chevrolet showroom,chevrolet service centre,toyota showroom,toyota service centre,nissan showroom,nissan service centre,kia showroom qatar,kia service centre qatar,chevrolet showroom qatar,chevrolet service centre qatar,toyota showroom qatar,toyota service centre qatar,nissan showroom qatar,nissan service centre qatar,kia showroom doha,kia service centre doha,chevrolet showroom doha,chevrolet service centre doha,toyota showroom doha,toyota service centre doha,nissan showroom doha,nissan service centre doha,car dealers qatar,car dealers doha,car showrooms doha,car showrooms qatar";
    $description = "In this you can easily find partner of alwakalat in quater.";
    }
else if ($page == "arabicbrand_car.php")
    {
    $keywords = "rolls royce qatar,rolls royce doha,bmw qatar,bmw doha,range rover doha,range rover qatar,lexus qatar,lexus doha";
    $description = "In this you can easily find brand car .";
    }
else if ($page == "arabiccontact-us.php")
    {
    $keywords = "Qatar cars,Qatar car,doha cars,doha car,car qatar,cars qatar,car doha,cars doha";
    $description = "In this you can easily find car on alwakalat .";
    }
else if ($page == "arabicadvertise.php")
    {
    $keywords = "wakalat qatar,wakalat doha,alwakalat qatar,alwakalat doha";
    $description = "In this you can find advertise on alwakalat .";
    }
else if ($page == "arabicfaq.php")
    {
    $keywords = "car rental qatar,car rental doha,cars renatl qatar,cars rental doha";
    $description = "In this you can find advertise on alwakalat .";
    }
else
    {
    $keywords = "car rental qatar,car rental doha,cars renatl qatar,cars rental doha";
    $description = "In this you can find advertise on alwakalat .";
    }
?>

<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <title>Alwakalat</title>
        <meta name="keywords"
              content="<?php echo $keywords; ?>">
        <meta name="description"
              content="<?php echo $description; ?>">
        <meta name="author" content="alwakalat" />


        <!-- Bootstrap -->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/magic.css" rel="stylesheet">

        <link href="css/style.css" rel="stylesheet">

        <link href="css/owl.carousel.css" rel="stylesheet">

        <link href="css/datatable.css" rel="stylesheet"> 
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css?v=2.1.5" media="screen" />

        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />



        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

        <!--[if lt IE 9]>

              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

            <![endif]-->
        <script src='https://www.google.com/recaptcha/api.js'></script>

        <style>

            .error{color:red}

        </style>
        <!-----For google analytic----->
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

        <div id ="wait" style="position: fixed; padding: 2px;display:none; z-index: 9; top: 25%; width: 270px; left: 40%;"><img src="images/loading-1.gif"></div>

        <div class="main">

            <div class="header">

                <div class="header-top">

                    <div class="container">

                        <ul>

                            <li><a href="https://www.facebook.com/alwakalatsite?_rdr=p" target="_blank"><img title="" alt="" src="images/fb-icon.png"></a></li>

                            <li><a href="https://twitter.com/al_wakalat" target="_blank"><img title="" alt="" src="images/twiiter-icon.png"></a></li>



                            <li><a href="https://www.instagram.com/alwakalat/" target="_blank"><img title="" alt="" src="images/insta-icon.png"></a></li>

                            <li><a href="https://www.snapchat.com/add/alwakalat" target="_blank"><img title="" alt="" src="images/snap-chat.png"></a></li>



                        </ul>



                        <ul class="pull-right launguage text-right">
                            <?php
                            $url = $_SERVER['PHP_SELF'];
                            $url_new = str_replace("/arabic", "", $url);
                            ?>
                            <?php if(@$_SESSION['whitelist']){  ?><a href="http://www.alwakalat.com/arabic/wishlist.php"><img src="images/wishlist.png" alt="" title="" height="30px" width="auto"> </a> <?php } ?>
                            <a href="http://alwakalat.com<?php echo (@$_SERVER['PHP_SELF']) ? $url_new : ""; ?><?php echo (@$_SERVER['argv'][0]) ? '?' . $_SERVER['argv'][0] : ""; ?>"><img src="images/english.png" alt="" title="" height="25px" width="auto"> </a>

                        </ul>

                    </div>

                    <!--div class="container"> 

                      <ul>

                    <?php // foreach($social as $value){     ?>  

                              <li><a href="<?php // echo $value['address']         ?>"><img src="<?php // echo $value['full_path']         ?>"></a></li><?php // }          ?>

                      </ul>

                      <ul class="pull-right launguage">

                              <a href="http://alwakalat.com/"><img src="images/england.png" alt="" title=""> </a>

                      </ul>

                    </div-->

                </div>

                <div class="header-bottom arabic-nav">

                    <nav class="navbar navbar-default">

                        <div class="container-fluid container"> 

                            <div class="logo"><a href="index.php"><img src="../<?php echo $logo['full_path']; ?>" alt="" title=""></a></div>

                            <!-- Brand and toggle get grouped for better mobile display -->

                            <div class="navbar-header">

                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>

                            </div>



                            <!-- Collect the nav links, forms, and other content for toggling -->

                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                                <ul class="nav navbar-nav">

                                    <?php
                                    $full_name = $_SERVER['PHP_SELF'];

                                    $name_array = explode('/', $full_name);

                                    $count = count($name_array);

                                    $page_name = $name_array[$count - 1];
                                    ?>

                                    <li><a class="<?php echo ($page_name == 'index.php') ? 'active' : ''; ?>" href="index.php">الصفحة الرئيسية</a></li>

                                    <li><a class="<?php echo ($page_name == 'about.php') ? 'active' : ''; ?>" href="about.php">معلومات عنا</a></li>

                                    <li><a class="<?php echo ($page_name == 'partners.php') ? 'active' : ''; ?>" href="partners.php">شركاؤنا</a></li>

                                    <li><a class="<?php echo ($page_name == 'finance.php') ? 'active' : ''; ?>" href="finance.php">تمويل</a></li>

                                    <li><a class="<?php echo ($page_name == 'car_events.php') ? 'active' : ''; ?>" href="car_events.php">فعاليات</a></li>

                                    <li><a class="<?php echo ($page_name == 'comparison.php') ? 'active' : ''; ?>" href="comparison.php">مقارنة</a></li>

                                </ul>



                                <ul class="nav navbar-nav navbar-right">



                                    <li><a class="<?php echo ($page_name == 'guide-new-car.php') ? 'active' : ''; ?>" href="guide-new-car.php">بطاقة الملثم</a></li>



                                    <li><a class="<?php echo ($page_name == 'service_providers.php') ? 'active' : ''; ?>" href="service_providers.php">مقدم الخدمة</a></li>



                                    <li><a class="<?php echo ($page_name == 'car_reviewsall.php') ? 'active' : ''; ?>" href="car_reviewsall.php">استعراضات السيارات</a></li>



                                    <li><a class="<?php echo ($page_name == 'contact-us.php') ? 'active' : ''; ?>" href="contact-us.php">اتصل بنا</a>



                                        <ul class="sub_menu"> <li><a href="advertise.php">أعلن معنا</a></li>



                                            <li><a href="faq.php">أسئلة مكررة</a></li> </ul>

                                    </li>



                                </ul>



                            </div>

                            <!-- /.navbar-collapse -->

                        </div>

                        <!-- /.container-fluid --> 

                    </nav>

                </div>



                <?php
                // Supply a user id and an access token

                $userid = "1265122336";

                $accessToken = "1265122336.1677ed0.e2e75148d8ad47fc912cc209af23dfc4";

                // Gets our data

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

                // Pulls and parses data.

                $result = fetchData("https://api.instagram.com/v1/users/{$userid}/media/recent/?access_token={$accessToken}");

                $result = json_decode($result);
                ?>