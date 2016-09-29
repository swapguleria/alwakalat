<?php
include("includes/header.php");
if (isset($_GET['id']))
    {
    $car_data = $get->get_single_result('car_data', 'id', $_GET["id"]);

    $slider_car = $get->get_all_data_active('car_slider', 'id', 'asc', 'car_id', $_GET["id"]);
    /* print_r($slider_car); */
    }
?>
<style>
    .left-inner input, .left-inner textarea {
        margin-top: 10px;
    }
</style>
<?php
if (isset($_POST['submit']))
    {
    $to = $contact_details['email'];
    /*  $to = "swap.dedarsingh@gmail.com"; */
    $subject = "Book a Test Drive";

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

                                                        <p><b>Name</b>: ' . $_POST["firstname"] . '  ' . $_POST["lastname"] . ' </p>
                                                        <p><b>Email</b>: ' . $_POST["email"] . ' </p>
                                                        <p><b>Phone Number</b>:  ' . $_POST["phone"] . '  </p>
                                                        <p><b>Message</b>:' . $_POST["content"] . '</p>
                                                        <p><b>Date of Birth</b>: ' . $_POST['DOB'] . '</p>
                                                        <p><b>Address</b>: ' . $_POST['address'] . '</p>
                                                        <p><b>ID Card Number</b>: ' . $_POST['id_card'] . '</p>                                                            Please.</br>

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
//    $message = "<b>Hello Alwakalat.</b>";
//    $message .= "<p><b>Name</b>: " . $_POST['firstname'] . " " . $_POST['lastname'] . "</p>";
//    $message .= "<p><b>Email</b>: " . $_POST['email'] . "</p>";
//    $message .= "<p><b>Date of Birth</b>: " . $_POST['DOB'] . "</p>";
//    $message .= "<p><b>Address</b>: " . $_POST['address'] . "</p>";
//    $message .= "<p><b>ID Card Number</b>: " . $_POST['id_card'] . "</p>";
//    $message .= "<p><b>Phone Number</b>: " . $_POST['phone'] . "</p>";

    $header = "From:" . $_POST['email'] . " \r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";

    $retval = mail($to, $subject, $message, $header);

    /* if( $retval == true ) {
      echo "<p style='color: green; font-weight: bold; font-size: 15px;'>Message sent successfully...</p>";
      }else {
      echo "<p style='color:Red; font-weight: bold; font-size: 15px;'>Message could not be sent...</p>";
      } */
    }
?>
<?php
if (isset($_POST['submit2']))
    {
    $to = $contact_details['email'];
    /*  $to = "swap.dedarsingh@gmail.com"; */
    $subject = "Owner Feedback";
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

                                                        <p><b>Name</b>: ' . $_POST["firstname"] . '  ' . $_POST["lastname"] . ' </p>
                                                        <p><b>Email</b>: ' . $_POST["email"] . ' </p>
                                                        <p><b>Feedback</b>:  ' . $_POST["feeds"] . '  </p>                                                     Please.</br>

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
//    $message = "<b>Hello Alwakalat.</b>";
//    $message .= "<p><b>Name</b>: " . $_POST['firstname'] . " " . $_POST['lastname'] . "</p>";
//    $message .= "<p><b>Phone Number</b>: " . $_POST['phone'] . "</p>";
//    $message .= "<p><b>Feedback </b>: " . $_POST['feeds'] . "</p>";

    $header = "From:" . $_POST['email'] . " \r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";

    $retval = mail($to, $subject, $message, $header);

    /* if( $retval == true ) {
      echo "<p style='color: green; font-weight: bold; font-size: 15px;'>Message sent successfully...</p>";
      }else {
      echo "<p style='color:Red; font-weight: bold; font-size: 15px;'>Message could not be sent...</p>";
      } */
    }
?>
<div class="col-sm-12 left-contact" id="test_drive" style="display:none;width:400px;">
    <div class="left-inner">
        <h1>Book a Test Drive</h1>
        <form action="" method="POST" id="guide" novalidate="novalidate">
            <input type="text" name="name" placeholder="Full Name *">
            <input type="text" name="email" placeholder="Email*">
            <input type="text" name="DOB" id="datepicker" placeholder="Date of Birth*" class="hasDatepicker">
            <input type="text" name="address" placeholder="Address*">
            <input type="text" name="id_card" placeholder=" ID Card Number*">
            <input type="text" name="phone" placeholder="Phone Number*">
            <div class="sumbit-offer-button">


                <input type="submit" name="submit" value="Submit">

            </div>

        </form>
    </div>
</div>
<div class="col-sm-12 left-contact" id="feedback" style="display:none;width:400px;">
    <div class="left-inner">
        <h1>Book a Test Drive</h1>
        <form action="" method="POST" id="guide" novalidate="novalidate">
            <input type="text" name="name" placeholder="Full Name *">
            <input type="text" name="email" placeholder="Email*">
            <input type="text" name="DOB" id="datepicker" placeholder="Date of Birth*" class="hasDatepicker">
            <input type="text" name="address" placeholder="Address*">
            <input type="text" name="id_card" placeholder=" ID Card Number*">
            <input type="text" name="phone" placeholder="Phone Number*">
            <div class="sumbit-offer-button">


                <input type="submit" name="submit2" value="Submit">

            </div>

        </form>
    </div>
</div>	
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
<div class="series-main">
    <div class="container">
        <div class="row">

            <div class=" col-lg-9 col-md-9 col-sm-9 slider-main brand_left">


                <div class="series-slider">


                    <div id="demo">
                        <div id="owl-demo-two" class="owl-carousel">
                            <?php
                            foreach ($slider_car as $car)
                                {
                                ?>
                                <div class="item"><a href="#"><img src="../<?php echo $car['full_path']; ?>" alt="" title=""></a></div>

                            <?php } ?>
                        </div>
                    </div>



                </div>


                <div class="brands-prices-bottom">

                    <table width="100%" border="1px">

                        <tr>
                            <td><img src="images/tag-price.png"><span><p>Price</p></span></td>
                            <td><img src="images/tag-price2.png"><span><p>Warranty</p></span></td>
                            <td><img src="images/tag-price3.png"><span><p>Acceleration 0-100</p></span></td>
                            <td><img src="images/tag-price4.png"><span><p>Engine Size</p></span></td>
                            <td><img src="images/tag-price5.png"><span><p>HorsePower</p></span></td>

                        </tr> 

                        <tr>
                            <td><h4>QAR <?php echo number_format($car_data['price']); ?></h4></td>
                            <td><h4><?php echo $car_data['Warranty']; ?></h4></td>
                            <td><h4><?php echo $car_data['acceleration']; ?></h4></td>
                            <td><h4><?php echo $car_data['engineSize']; ?>HP</h4></td>
                            <td><h4><?php echo $car_data['h_power']; ?></h4></td>

                        </tr>






                    </table>










                </div>



                <!--<div class="tabing-main">
                    
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Specifications</a></li>
                        <!--li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Safety</a></li>
                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Features</a></li>
                        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Colors</a></li>
                        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Al Wakalat package</a></li>
                    </ul>

                    
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">

                            <div class="safety-bottom">

                                <div class="five-main">    
                                    <div class="five-series-left">
                                        <h3><?php echo $get->get_single_field('model', 'model_name', 'model_id', $car_data['model']); ?> : <?php echo $get->get_single_field('sub_model', 'sub_model_name', 'sub_id', $car_data['sub_model']); ?></h3>
                                    </div>


                                    <div class="five-series-right">
                                        <h3>Starting price QAR <?php echo number_format($car_data['price']); ?></h3>
                                    </div>
                                </div>

                                <div class="wheel-main">

                                    <div class="wheel-text">
                                        <h3>Acceleration :</h3>
                                    </div>

                                    <div class="wheel-right">
                                        <h3><?php echo $car_data['acceleration']; ?></h3>
                                    </div>

                                </div>


                                <div class="wheel-main">

                                    <div class="wheel-text">
                                        <h3>Top Speed :</h3>
                                    </div>

                                    <div class="wheel-right">
                                        <h3><?php echo $car_data['top_speed']; ?></h3>
                                    </div>

                                </div>




                                <div class="wheel-main">

                                    <div class="wheel-text">
                                        <h3>Engine Size :</h3>
                                    </div>

                                    <div class="wheel-right">
                                        <h3><?php echo $car_data['engineSize']; ?></h3>
                                    </div>

                                </div>



                                <div class="wheel-main">

                                    <div class="wheel-text" style="width: 80%;">
                                        <h3>Driven Wheels :</h3>
                                    </div>

                                    <div class="wheel-right">
                                        <h3><?php echo $car_data['drivenWheels']; ?></h3>
                                    </div>

                                </div>
                                <div class="wheel-main">

                                    <div class="wheel-text">
                                        <h3>Clyinders :</h3>
                                    </div>

                                    <div class="wheel-right">
                                        <h3><?php echo $car_data['clyinders']; ?></h3>
                                    </div>

                                </div>










                            </div>



                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile">










                        </div>
                        <div role="tabpanel" class="tab-pane" id="messages">
                            <div class="safety-bottom">

                                <div class="five-main">    
                                    <div class="five-series-left">
                                        <h3><?php echo $get->get_single_field('model', 'model_name', 'model_id', $car_data['model']); ?> : <?php echo $get->get_single_field('sub_model', 'sub_model_name', 'sub_id', $car_data['sub_model']); ?></h3>
                                    </div>


                                    <div class="five-series-right">
                                        <h3>Starting price QAR <?php echo number_format($car_data['price']); ?></h3>
                                    </div>
                                </div>
                                <?php
                                $feature = explode(',', $car_data['specialFeatures']);
                                foreach ($feature as $cf)
                                    {
                                    ?>
                                    <div class="wheel-main">

                                        <div class="wheel-text">
                                            <h3><?php echo $cf; ?></h3>
                                        </div>

                                        <div class="wheel-right">
                                            <h3>Yes</h3>
                                        </div>

                                    </div><?php } ?>







                            </div>




                        </div>
                        <div role="tabpanel" class="tab-pane" id="settings"><div class="safety-bottom">

                                <div class="five-main">    
                                    <div class="five-series-left">
                                        <h3><?php echo $get->get_single_field('model', 'model_name', 'model_id', $car_data['model']); ?> : <?php echo $get->get_single_field('sub_model', 'sub_model_name', 'sub_id', $car_data['sub_model']); ?></h3>
                                    </div>


                                    <div class="five-series-right">
                                        <h3>Starting price QAR <?php echo number_format($car_data['price']); ?></h3>
                                    </div>
                                </div>

                                <div class="wheel-main">
                                    <div class="wheel-text">
                                        <h3><? echo $car_data['color'];?></h3>
                                    </div>

                                    <div class="wheel-right">
                                        <h3></h3>
                                    </div>

                                </div>








                            </div></div>
                    </div>





                </div>-->






            </div>



            <div class="col-lg-3 col-md-3 col-sm-3 slider-main brand_right">

                <div class="offer-main-new">

                    <div class="offer-image-main">
                        <div class="offer-image">
                            <a href="all_car.php"><img src="images/car-icno.png" alt=""></a>
                        </div>

                        <div class="alwalkat-button">
                            <a href="all_car.php">View All Cars</a>
                        </div>



                    </div>




                    <div class="offer-image-main-two offer-image-main-two-div">
                        <div class="offer-image">
                            <a href="#"><img src="images/offer-icon2.png" alt=""></a>
                        </div>

                        <div class="alwalkat-button">
                            <a href="#feedback" class="fancybox" >Owner  Feedback</a>
                        </div>



                    </div>

                    <?php
                    $reviews = $get->get_review('', '', $_GET['id']);
                    if (@$reviews)
                        {
                        ?>
                        <div class="offer-image-main-two offer-image-main-two-div">
                            <div class="offer-image">
                                <a href="#"><img src="images/offer-icon2.png" alt=""></a>
                            </div>

                            <div class="alwalkat-button">
                                <a href="car_reviews.php?id=<?php echo $_GET['id']; ?>" class="fancybox">Read our review on this car</a>
                            </div>
                        </div>

<?php } ?>





                    <div class="offer-image-main">
                        <div class="offer-image">
                            <a href="comparison.php"><img src="images/offer-icon3.png" alt=""></a>
                        </div>

                        <div class="alwalkat-button-two">
                            <a href="comparison.php?id=<?php echo $_GET['id']; ?>">Comparison</a>
                        </div>



                    </div>




                    <div class="offer-image-main-two">
                        <div class="offer-image">
                            <a href="finance.php"><img src="images/offer-icon4.png" alt=""></a>
                        </div>

                        <div class="alwalkat-button">
                            <a href="finance.php">Finance Option</a>
                        </div>



                    </div>






                    <div class="offer-image-main">
                        <div class="offer-image">
                            <a href="#"><img src="images/offer-icon5.png" alt=""></a>
                        </div>

                        <div class="alwalkat-button-two">
                            <a class="fancybox" href="#test_drive">Book a Test Drive</a>
                        </div>



                    </div>



                    <div class="complete-model">
                        <div class="completive-model-text">

                            <h2>Competitive Model</h2>

                            <div class="model-image">
                                <a href="#"><img src="images/model-car-image.png" alt=""></a>
                            </div>

                            <div class="model-bottom-text">
                                <h2>BMW X5 <span><a href="#">Price QAR350,000</a></span></h2>

                            </div>




                        </div>



                    </div>







                </div>




            </div>





        </div>
    </div>
</div>



















<?php include("includes/footer.php"); ?>