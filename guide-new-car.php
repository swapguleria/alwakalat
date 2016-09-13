<?php

include("includes/header.php");

$results = $get->get_single_result('page', 'id', '5');

$searches = $get->get_all_data_active('searches', 'order', 'asc', 'show', 'yes');

?>











<br>

<div class="offer-main">



    <div class="container">



        <div class="row">



            <div class="col-lg-4 col-md-4 col-sm-4 offer-image">    



                <img src="<?php echo $results['full_path']; ?>" alt="">



            </div>



            <div class="col-lg-8 col-md-8 col-sm-8 offer-text">    

                <?php echo $results['content']; ?>

            </div>

        </div>

    </div>

</div>



<!---Slider for car's logo-->

<div class="car_event">

    <div class="container inner-container">

        <div class="car-allevent">

            <div class="owl-wrapper1">

                <div id="owl-demo-<?php echo $search['maker_id']; ?>" class="owl-carousel">

                    <?php // $event_images = $get->get_all_event_imgs('event_images','id','asc',$event['id']); ?>

                    <?php foreach ($searches as $search)

                        {

                        ?>

                        <div><img src="<?php echo $search['full_path']; ?>" alt="" title=""></div>

                    <?php }

                    ?>

                </div>

                <div class="customNavigation eventNavs">

                    <a class="btn prev"><</a>

                    <a class="btn next">></a>

                </div>

            </div>

        </div>

    </div>

</div>





<div class="offer-form-section">



    <div class="container">



        <div class="row">



            <div class="col-lg-10 col-md-10 col-sm-10 offer-form-main"> 



                <p>You can find the specified offer you will get on your next automobiles by checking Al Molatham Card tab..</p>



                <div class="form-offer">

                    <?php

                    if (isset($_POST['submit']))

                        {

                        $to = $contact_details['email'];

                        /*  $to = "swap.dedarsingh@gmail.com"; */

                        $subject = "Guide New Car Page Mail";



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

                                                        <p><b>Date of Birth</b>: ' . $_POST['DOB'] . '</p>

                                                        <p><b>Address</b>: ' . $_POST['address'] . '</p>

                                                        <p><b>ID Card Number</b>: ' . $_POST['id_card'] . '</p>                                          

                                                        <p><b>Availability</b>: ' . $_POST['availability'] . '</p>

                                                        <p><b>Other Number</b>:' . $_POST['o_number'] . '.</p>

                            Please.</br>



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

//                        $message = "<b>Hello Alwakalat.</b>";

//                        $message .= "<p><b>Name</b>: " . $_POST['firstname'] . " " . $_POST['lastname'] . "</p>";

//                        $message .= "<p><b>Email</b>: " . $_POST['email'] . "</p>";

//                        $message .= "<p><b>Date of Birth</b>: " . $_POST['DOB'] . "</p>";

//                        $message .= "<p><b>Address</b>: " . $_POST['address'] . "</p>";

//                        $message .= "<p><b>ID Card Number</b>: " . $_POST['id_card'] . "</p>";

//                        $message .= "<p><b>Phone Number</b>: " . $_POST['phone'] . "</p>";

//                        $message .= "<p><b>Availability</b>: " . $_POST['availability'] . "</p>";

//                        $message .= "<p><b>Other Number</b>:" . $_POST['o_number'] . ".</p>";



                        $header = "From:" . $_POST['email'] . " \r\n";

                        $header .= "MIME-Version: 1.0\r\n";

                        $header .= "Content-type: text/html\r\n";



                        $retval = mail($to, $subject, $message, $header);



                        if ($retval == true)

                            {

                            echo "<p style='color: green; font-weight: bold; font-size: 15px;'>Message sent successfully...</p>";

                            }

                        else

                            {

                            echo "<p style='color:Red; font-weight: bold; font-size: 15px;'>Message could not be sent...</p>";

                            }

                        //  To redirect form on a particular page

                        //echo("<script>location.href = 'http://$$$.com/connecttopaypal';</script>");

                        }

                    if (isset($_POST['submit']))

                        {

                        ?><div class="paypal"> <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">

                                <input type="hidden" name="cmd" value="_s-xclick">

                                <input type="hidden" name="hosted_button_id" value="QTR 350">

                                <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">

                                <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">

                            </form></div>  <?php

                        }

                    else

                        {

                        ?>

                        <!--<form id="guide" rel="external" target="_blank" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">-->

                        <form action="" method="POST" id="guide">
							<div class="guide-form">
                            <input type="text" name="name" placeholder="Full Name *">

                            <input type="text" name="email" placeholder="Email*">

                            <input type="text" name="DOB" id="datepicker" placeholder="Date of Birth*">

                            <input type="text" name="address" placeholder="Address*">
							</div><!--guide-form-->  
                            <div class="guide-form"> 
                            <input type="text" name="id_card" placeholder=" ID Card Number*">

                            <input type="text" name="phone" placeholder="Phone Number*">

                            <input type="text" name="availability" placeholder="Availability*">

                            <input type="text" name="o_number" placeholder="Other Number*">
							</div><!--guide-form-->


                            <div class="sumbit-offer-button">



                                <input type="submit" name="submit" value="Submit">



                            </div>



                        </form>

<?php } ?>

                </div>



            </div>



            <div class="col-lg-2 col-md-2 col-sm-2 offer-empty"> 

            </div>



        </div>





    </div>



</div>







<!--<div class="inner-banner">

    <div id="demo">

        <div id="owl-demo" class="owl-carousel">

<?php //  foreach ($searches as $search) {    ?>

                 Renders images. @Options (thumbnail,low_resoulution, high_resolution) 

                <div class="item1">

                    <a class="fancybox" data-fancybox-group="gallery" href="brand_car.php?id=<?php // echo $search['maker_id'];   ?>">

                        <img src="<?php // echo $search['full_path'];  ?>" alt="" title=""></a></div>



<?php //  }    ?>

        </div>

    </div>

</div>-->





<?php include('includes/footer.php') ?>