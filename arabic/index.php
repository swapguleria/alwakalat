<?php
include("includes/header.php");
$slider = $get->get_all_data_active('slider', 'slider_id', 'desc', 'slider_active', 'yes');
$content = $get->get_all_data_active('home_content_image', 'id', 'asc', 'show', 'yes');
$searches = $get->get_all_data_active('searches', 'order', 'asc', 'show', 'yes');
$clients = $get->get_all_data_active('clients', 'id', 'asc', 'show', 'yes');
$makers = $get->get_all_data('maker', 'id', 'desc');
$video = $get->get_all_data('video_links', 'id', 'desc');
?>
<div class="col-sm-12 left-contact" id="find_car" style="display:none;width:400px;">
    <div class="find_car_form">
        <h1>إبحث عن سيارتك</h1>
        <form action="search_result.php" method="POST" id="feedback" novalidate="novalidate">
            <select name="maker" id="maker_">
                <option value="">--إختر المُصنع--</option>
                <?php
                foreach ($makers as $maker)
                    {
                    ?>

                    <option value="<?php echo $maker['id']; ?>"><?php echo ucwords(strtolower($maker['name'])); ?></option>
                    <?}?>
                </select>
                <!--select name="model" id="model_sel">
                        <option selected="selected">Select Maker First</option>
                </select>
                <select name="sub_model" id="sub_model_sel">
                        <option selected="selected">Select Model First</option>
                </select-->
                <select id="filter_bodytype" name="bodyType" ><option value="">--إختر الطراز--</option>
                    <option value="Sedan">Sedan</option>
                    <option value="Coupe">Coupe</option>
                    <option value="Saloon">Saloon</option>
                    <option value="SUV">SUV</option>
                    <option value="Hatchback">Hatchback</option>
                </select>
                <select id="filter_price" name="price" required="required"><option value="" >--إختر السعر--</option>
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
                <!--a href="javascript:void(0);" id="find_car_btn" >Find Car</a-->
                <input type="submit" name="submit" value="إبحث">
            </form>
            <div class="result"></div>
        </div>
    </div>
    <div class="banner">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
            <!-- Indicators --> 
            <!-- <ol class="carousel-indicators">
              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-example-generic" data-slide-to="1"></li>
              <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>--> 

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <?php
                foreach ($slider as $result)
                    {
                    ?>
                    <div class="item background-1"> <img src="../<?php
                        if (isset($result['slider_full_path']))
                            {
                            echo $result['slider_full_path'];
                            }
                        ?>" alt="">
                        <div class="carousel-caption">
                            <div class="banner-text">
                                <h1>موقع الوكالات هو أول معرض سيارات على الإنترنت</h1>
                                <h2>يستضيف وكلاء سيارات في قطر، وقريباً في الشرق الأوسط.</h2>
                                <a class="compaison" href="comparison.php">مقارنة</a> <a class="find fancybox" href="#find_car">إبحث عن سياراتك</a> </div> 
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
                            <div class="promotion-img">  <a href="<?php echo $data['link']; ?>"><img src="../<?php echo $data['full_path']; ?>" alt="" title=""> </div>
                                    <div class="promotion-text"> <a href="<?php echo $data['link']; ?>"><?php echo $data['text_arabic']; ?> <img src="images/double-arrow.png" alt="" title="" ></a> </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
        <div class="searches">
            <div class="container inner-container">
                <h1><span> أعلى </span> بحوث   
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
        <div class="car_event">
            <div class="container inner-container">
                <h1>لا يوجد حالياً أي فعاليات أو مناسبات</h1>
                <!--<div class="car-allevent">
                <?php
                foreach ($events1 as $event)
                    {
                    ?>
                                       
                                            
                                            <div class="client-text">
                                              <h2><a href="event_detail.php?id=<?php echo $event['id']; ?>"><?php echo $event['title_arabic']; ?></a></h2>
                                            </div>
                                            <div class="owl-wrapper1">
                                             <div id="owl-demo-<?php echo $event['id']; ?>" class="owl-carousel">
                                           <div><img src="../<?php echo $event['thumb']; ?>" alt="" title=""></div>
                    <?php
                    $event_images = $get->get_all_event_imgs('event_images', 'id', 'asc', $event['id']);
                    foreach ($event_images as $images)
                        {
                        ?>
                                                                                          <div><img src="../<?php echo $images['thumb_path']; ?>" alt="" title=""></div>
                    <?php } ?>
                                           
                                            </div>
                                            <div class="customNavigation eventNavs">
                                      <a class="btn prev"><</a>
                                      <a class="btn next">></a>
                                    </div>
                                            </div>
                                        
                <?php } ?>
                        </div>-->
            </div></div>


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
                <h1>العملاء </h1>
                <div class="clients-main row">
                    <?php
                    foreach ($clients as $client)
                        {
                        ?>
                        <div class="col-sm-4 clients">
                            <div class="client-inner">
                                <div class="client-img"><a href="partner-detail.php?id=<?php echo $client['id']; ?>"><img src="../<?php echo $client['full_path']; ?>" alt="" title=""></a></div>
                                <div class="client-text">
                                    <h2><a href="partner-detail.php?id=<?php echo $client['id']; ?>"><?php echo $client['client_name']; ?></a></h2>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="col-sm-4 clients coming-soon">
                        <div class="client-inner">
                            <div class="coming">قريبا!</div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include("includes/footer.php") ?>