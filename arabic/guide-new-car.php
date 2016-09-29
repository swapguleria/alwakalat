<?php
include("includes/header.php");
$results = $get->get_single_result('page', 'id', '5');
$searches = $get->get_all_data_active('searches', 'order', 'asc', 'show', 'yes');
?>
<!--<div class="inner-banner">
    <div id="demo">
        <div id="owl-demo" class="owl-carousel">
            <?php // foreach ($result->data as $post): ?>
                 Renders images. @Options (thumbnail,low_resoulution, high_resolution) 
                <div class="item"><a class="fancybox" data-fancybox-group="gallery" href="<?php // echo $post->images->standard_resolution->url ?>"><img src="<?php // echo $post->images->thumbnail->url ?>" alt="" title=""></a></div>

            <?php // endforeach ?>
        </div>
    </div>
</div>-->


<div class="offer-main">


    <div class="container">

        <div class="row">

            <div class="col-lg-4 col-md-4 col-sm-4 offer-image">    


                <img src="<?php echo $results['full_path']; ?>" alt="">


            </div>


            <div class="col-lg-8 col-md-8 col-sm-8 offer-text">    
                <?php echo $results['content_arabic']; ?>

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
                        { ?>
                        <div><img src="../<?php echo $search['full_path']; ?>" alt="" title=""></div>
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

                <p>يمكنك العثور على العرض المحدد ستحصل على السيارات الخاصة بك المقبل عن طريق �?حص آل Wakalat عرض التبويب</p>


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
//                         $message = "<b>Hello Alwakalat.</b>";
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
                        }
                    ?>
                    <form action="" method="POST" id="guide">
                    	<div class="guide-form">
                            <input type="text" name="name" placeholder="الاسم الكامل">
                            <input type="text" name="email" placeholder="بريد الالكتروني">
                            <input type="text" name="DOB" id="datepicker" placeholder="تاريخ الميلاد">
                            <input type="text" name="address" placeholder="العنوان">
                        </div><!--guide-form-->
                        <div class="guide-form">
                            <input type="text" name="id_card" placeholder="ID رقم البطاقة">
                            <input type="text" name="phone" placeholder="رقم الهات�?">
                            <input type="text" name="availability" placeholder="تو�?ر">
                            <input type="text" name="o_number" placeholder="عدد آخرين">
						</div><!--guide-form-->

                        <div class="sumbit-offer-button">


                            <input type="submit" name="submit" value="عرض">

                        </div>

                    </form>


                </div>


            </div>






            <div class="col-lg-2 col-md-2 col-sm-2 offer-empty"> 
            </div>











        </div>
    </div>

</div>







<?php include('includes/footer.php') ?>