<?php
include('config.php');
$logo = $get->get_single_result('logo', 'id', '1');
$social = $get->get_all_data('social_links', 'id', 'desc');
$slider_o = $get->get_all_data_active('o_slider', 'slider_id', 'desc', 'slider_active', 'yes');
$clients = $get->get_all_data_active('clients', 'id', 'asc', 'show', 'yes');
$events = $get->get_all_event_data('events', 'id', 'desc', 'status', 'active');
$eventsAll = $get->get_all_data_active('events', 'id', 'desc', 'status', 'active');
$service_providers = $get->get_all_data_active('providers', 'id', 'desc', 'show', 'yes');
?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Alwakalat</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/magic.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/owl.carousel.css" rel="stylesheet">
        <link href="css/datatable.css" rel="stylesheet"> 
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
                        <ul class="pull-right launguage">
                            <a href="http://development.dexterousteam.com/alwakalat/arabic"><img src="images/mq1.jpg" alt="" title="" height="26px" width="23px"> </a>
                        </ul>
                    </div>
                </div>
                <div class="header-bottom">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid container"> 
                            <div class="logo"><a href="index.php"><img src="<?php echo $logo['full_path']; ?>" alt="" title=""></a></div>
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">	<ul class="nav navbar-nav">	<?php
                                    $full_name = $_SERVER['PHP_SELF'];
                                    $name_array = explode('/', $full_name);
                                    $count = count($name_array);
                                    $page_name = $name_array[$count - 1];
                                    ?><li><a class="<?php echo ($page_name == 'index.php') ? 'active' : ''; ?>" href="index.php">Home</a></li>							<li><a class="<?php echo ($page_name == 'about.php') ? 'active' : ''; ?>" href="about.php">About us</a></li>							<li><a class="<?php echo ($page_name == 'partners.php') ? 'active' : ''; ?>" href="partners.php">Partners</a></li>							<li><a class="<?php echo ($page_name == 'finance.php') ? 'active' : ''; ?>" href="finance.php">Finance</a></li>							<li><a class="<?php echo ($page_name == 'car_events.php') ? 'active' : ''; ?>" href="car_events.php">Events</a></li>							<li><a class="<?php echo ($page_name == 'comparison.php') ? 'active' : ''; ?>" href="comparison.php">Comparison</a></li>						</ul>                                <!--ul class="nav navbar-nav">                                    <li><a href="index.php" class="active">Home</a></li>                                    <li><a href="about.php">About us</a></li>                                    <li><a href="partners.php">Partners</a></li>									<li><a href="finance.php">Finance</a></li>									<li><a href="car_events.php">Events</a></li>									<li><a href="comparison.php">Comparison</a></li>                                </ul-->                                <ul class="nav navbar-nav navbar-right">									<li><a class="<?php echo ($page_name == 'guide-new-car.php') ? 'active' : ''; ?>" href="guide-new-car.php">Al Molatham card</a></li>									
                                    <!--li><a href="guide-new-car.php">Al Molatham card</a></li-->
                                    <li><a class="<?php echo ($page_name == 'service_providers.php') ? 'active' : ''; ?>" href="service_providers.php">Service Provider</a></li>
                                    <li><a class="<?php echo ($page_name == 'car_reviewsall.php') ? 'active' : ''; ?>" href="car_reviewsall.php">Car Reviews</a></li>																		<li><a class="<?php echo ($page_name == 'contact-us.php') ? 'active' : ''; ?>" href="contact-us.php">Contact Us</a>									

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
            $result = fetchData("https://api.instagram.com/v1/users/{$userid}/media/recent/?access_token={$accessToken}&count=100");
            $result = json_decode($result);
			
            ?>