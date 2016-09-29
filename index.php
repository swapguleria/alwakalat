<?php
ob_start("ob_gzhandler");

include("includes/header.php");
$slider = $get->get_all_data_active('slider', 'slider_id', 'desc', 'slider_active', 'yes');
$content = $get->get_all_data_active('home_content_image', 'id', 'asc', 'show', 'yes');
$searches = $get->get_all_data_active('searches', 'order', 'asc', 'show', 'yes');
$clients = $get->get_all_data_active('clients', 'id', 'asc', 'show', 'yes');
$makers = $get->get_all_data('maker', 'id', 'desc');
$video = $get->get_all_data('video_links', 'id', 'desc');
?>

<!--<meta name="keywords"
      content="Qatar cars,Qatar car,doha cars,doha car,car qatar,cars qatar,car doha,cars doha">
<meta name="description"
      content=" you can easily find car in Qatar">
<meta name="author" content="Alwakalat" />-->
<div class="col-sm-12 left-contact" id="find_car" style="display:none;width:400px;">
    <div class="find_car_form">
        <h1>Find Your Car</h1>
        <form action="search_result.php" method="POST" id="feedback" novalidate="novalidate">
            <select name="maker" id="maker_">
                <option value="">--Select Maker--</option>
                <?php
                foreach ($makers as $maker)
                    {
                    ?>
                    <option value="<?php echo $maker['id']; ?>"><?php echo ucwords(strtolower($maker['name'])); ?></option>
                <?php } ?>
            </select>

            <select id="filter_bodytype" name="bodyType" ><option value="">--Select BodyType--</option>
                <option value="Sedan">Sedan</option>
                <option value="Coupe">Coupe</option>
                <option value="Saloon">Saloon</option>
                <option value="SUV">SUV</option>
                <option value="Hatchback">Hatchback</option>
            </select>
            <select id="filter_price" name="price" required="required" ><option value="">--Select Price--</option>
                <option value="<=65000">Below QR 65,000</option>
                <option value="<=100000">Below QR 100,000</option>
                <option value="<=125000">Below QR 125,000</option>
                <option value="<=150000">Below QR 150,000</option>
                <option value="<=200000">Below QR 200,000</option>
                <option value="<=250000">Below QR 250,000</option>
                <option value="<=350000">Below QR 350,000</option>
                <option value="<=500000">Below QR 500,000</option>
                <option value=">=500000">More than QR 500,000</option>
            </select>

            <input type="submit" name="submit" value="Find Car">
        </form>
        <div class="result"></div>
    </div>
</div>
<div class="banner">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 

        <div class="carousel-inner" role="listbox">
            <?php
            foreach ($slider as $result)
                {
                ?>
                <div class="item background-1"> <img src="<?php
                    if (isset($result['slider_full_path']))
                        {
                        echo $result['slider_full_path'];
                        }
                    ?>" alt="" style="height:1024;width:480">
                    <div class="carousel-caption"> 
                        <div class="banner-text">
                            <h1>Al Wakalat is the first online showroom</h1>
                            <h2>to host automobile dealerships in Qatar and soon, the region.</h2>
                            <a class="compaison" href="comparison.php">Comparison</a> <a class="find fancybox" href="#find_car">find your car</a> </div> 
                    </div>
                </div>
            <?php } ?>
        </div>

        <!-- Controls --> 
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"><span></span> </a> <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"><span></span></a> </div>
</div>
<div class="promotion-main">
    <div class="container">
        <div class="row">
            <?php
            foreach ($content as $data)
                {
                ?>  
                <div class="col-sm-4 promotion-div">
                    <div class="promotion-inner">
                        <div class="promotion-img"> <a href="<?php echo $data['link']; ?>"> <img src="<?php echo $data['full_path']; ?>" alt="" title=""></a> </div>
                        <div class="promotion-text"> <a href="<?php echo $data['link']; ?>"><?php echo $data['text']; ?> <img src="images/double-arrow.png" style="height:14;width:8" alt="" title="" ></a> </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<div class="searches">
    <div class="container inner-container">
        <h1>Top  <span>Searches</span>
        </h1>
        <div class="search-products clearfix">
            <?php
            foreach ($searches as $search)
                {
                ?>
                <div class="search-main-product">
                    <div class="search-product-img"> <a href="brand_car.php?id=<?php echo $search['maker_id']; ?>">
                            <img src="http://alwakalat.com/timthumb/timthumb.php?w=117&h=115&src=http://alwakalat.com/<?php echo $search['full_path']; ?>" >
                            <!--<img src="<?php echo $search['full_path']; ?>" alt="" title="">-->
                        </a> </div>
                    <div class="search-product-text">
                        <h2><a href="brand_car.php?id=<?php echo $search['maker_id']; ?>">
                                <?php echo strtoupper($get->get_single_field('maker', 'name', 'id', $search['maker_id'])); ?>
                                <?php // echo $search['search_name']; ?></a></h2>
                    </div>
                </div><?php } ?>

        </div>
    </div>
</div>

<!---------------------------events--------------------------------->

<div class="car_event">
    <div class="container inner-container">
        <h1>There are currently no upcoming events</h1>
        <!--<div class="car-allevent">
        <?php
        foreach ($events as $event)
            {
            ?>  
                                                                        <div class="client-text">
                                                                            <h2><a href="event_detail.php?id=<?php echo $event['id']; ?>"><?php echo $event['event_title']; ?></a></h2>
                                                                        </div>
                                                                        <div class="owl-wrapper1">
                                                                            <div id="owl-demo-<?php echo $event['id']; ?>" class="owl-carousel">
                                                                                <div>

                                                                                        <img src="<?php echo $event['thumb']; ?>" alt="" title="">  
                                                                                </div>
            <?php
            $event_images = $get->get_all_event_imgs('event_images', 'id', 'asc', $event['id']);
            foreach ($event_images as $images)
                {
                ?>
                                                                                                                                            <div>
                                                                                                                                                <img src="<?php echo $images['thumb_path']; ?>" alt="" title=""> 
                                                                                                                                            </div>
            <?php } ?>
                                                                            </div>
                                                                            <div class="customNavigation eventNavs">
                                                                                <a class="btn prev"><</a>
                                                                                <a class="btn next">></a>
                                                                            </div>
                                                                        </div>
        <?php } ?>
        </div>-->
    </div>
</div>
<!------------------------------------------------------------------->

<div class="client-videos">
    <div class="container inner-container">
        <div id="page">
            <div class="yt_holder">
                <div id="ytvideo2">
                </div>

                <?php
                if (is_array($video))
                    {
                    ?>
                    <ul class="demo2">

                        <?php
                        $ct = 0;
                        foreach ($video as $value)
                            {
                            ?>
                            <li class="<?php
                            if ($ct == 0)
                                {
                                ?>currentvideo <?php } ?>">
                                <a href="<?php echo $value['address']; ?>"></a>
                                <p><?php echo $value['title']; ?>Duration<?php echo $value['duration']; ?></p>
                            </li>

                            <?php
                            $ct++;
                            }
                        }
                    ?>
                </ul>

            </div>
        </div>
    </div>
</div>
<!------------------------------------------------------------------->
<div class="clients-supports">
    <div class="container inner-container">
        <h1>Clients and Supporters</h1>
        <div class="clients-main row">
            <?php
            foreach ($clients as $client)
                {
                ?>
                <div class="col-sm-4 clients">
                    <div class="client-inner">
                        <div class="client-img"><a href="partner-detail.php?id=<?php echo $client['id']; ?>"><img src="<?php echo $client['full_path']; ?>" alt="" title=""></a></div>
                        <div class="client-text">
                            <h2><a href="partner-detail.php?id=<?php echo $client['id']; ?>"><?php echo $client['client_name']; ?></a></h2>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <div class="col-sm-4 clients coming-soon"> 
                <div class="client-inner">
                    <div class="coming">Coming soon!</div>
                </div>
            </div>
        </div>
    </div>
    <?php include("includes/footer.php"); ?>