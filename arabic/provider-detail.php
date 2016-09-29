<?php
include("includes/header.php");

if (@$_GET['id'])
    {

    $id = $_GET['id'];
    }

$provider_data = $get->get_single_result('providers', 'id', $_GET['id']);
?>   



<div class="inner-banner">

    <div id="demo">

        <!--      <div id="owl-demo" class="owl-carousel">
        
        <?php // foreach ($result->data as $post):  ?>
        
                         Renders images. @Options (thumbnail,low_resoulution, high_resolution) 
        
                        <div class="item"><a  class="fancybox" data-fancybox-group="gallery" href="<?php // echo $post->images->standard_resolution->url   ?>"><img src="<?php // echo $post->images->thumbnail->url   ?>" alt="" title=""></a></div>
        
                        
        
        <?php // endforeach  ?>
        
                  
        
        -->

    </div>

</div>

</div>

<div class="partner-section-main">


    <div class="container">
            <div class="detail-main">
                <div class="container">
                    <div class="detailer-pro">
                        <img src="../<?php echo $provider_data['full_path']; ?>" alt="">
                    </div><!--detailer-pro-->
                    <div class="social-detl">
                        <ul>
                            <li><a href="<?php echo '//' . $provider_data['social_link1']; ?>" target="_blank"><img src="../images/fb.png" alt=""></a></li>
                            <!--<li><a href="<?php echo '//' . $provider_data['social_link3']; ?>" target="_blank"><img src="../images/snap.png" alt=""></a></li>-->
                            <li><a href="<?php echo '//' . $provider_data['social_link4']; ?>" target="_blank"><img src="../images/insta-gram.png" alt=""></a></li>
                            <li><a href="<?php echo '//' . $provider_data['website']; ?>" target="_blank"><img src="images/web-icon.png" alt=""></a></li>
                        </ul>
                        <!--                            <ul>
                        
                                                        <li><a href="https://www.facebook.com/detailercc" target="_blank"><img src="../images/fb.png" alt=""></a></li>
                        
                                                        <li><a href="#"><img src="../images/snap.png" alt=""></a></li>
                        
                                                        <li><a href="https://www.instagram.com/detailer_cc/" target="_blank"><img src="../images/insta-gram.png" alt=""></a></li>
                        
                        
                        
                                                    </ul>-->

                    </div><!--social-detl-->
                </div><!--container-->
            </div><!--detail-main-->

            <div class="details">

                <div class="container">

                    <div class="row">

                        <div class="col-sm-12 detail-txt">
                            <?php echo $provider_data['content']; ?>
                            <!--                        <div class="col-sm-6 detail-txt">
                            
                                                        <h4>At Detailer car care, we offer the finest experience for your car's interior, exterior and wheels. With over the edge leading technology and the premium products; precision is guaranteed ..</h4>
                            
                                                        <h2>Why us ?</h2>
                            
                                                        <p>By using innovative techniques and the right scientific understanding of all products and methods, Detailer Car Care team is able to provide you the ultimate care and offers the best results in polishing and protection. Due to the development of science everything became possible in this sector. We, Detailer Car Care, promise to bring back the gloss and beauty to your car to regain its glory and brilliance.</p>
                            
                                                        <div class="detailer-car">
                            
                                                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            
                            
                            
                                                                <h4 class="panel-title">   Interior</h4>
                            
                            
                            
                                                                <div class="panel-body">
                            
                                                                    We rely on using the safest cleaning materials that remove accumulations of dust as well as body oils.
                            
                                                                </div>                                    
                            
                                                            </div>
                            
                            
                            
                                                        </div>end of detailer
                            
                                                    </div>
                            
                            
                            
                                                    <div class="col-sm-6 detail-txt">
                            
                                                        <div class="detailer-car">
                            
                                                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            
                            
                            
                                                                <h4 class="panel-title">      Wheels
                            
                            
                            
                                                                </h4>
                            
                                                                <div class="panel-body">
                            
                                                                    Car tires are always exposed to  accumulation caused by the brakes giving them a dull appearance. Our role is to target what regular washes are unable to reach. With our specialized cleaning materials, brilliance and radiance is guaranteed.
                            
                                                                </div>
                            
                            
                            
                                                                <h4 class="panel-title">     Paint
                            
                            
                            
                                                                </h4>
                            
                                                                <div class="panel-body">
                            
                                                                    At Detailer Car Care we clean and examine the car's paint with leading technology to ensure precision before starting to wax or correct any problems. When doing so, we rely on several stages until we get the paint of your car to reach its best conditions.
                            
                                                                </div>
                            
                            
                            
                            
                            
                                                                <h4 class="panel-title">          Franchies
                            
                                                                </h4>
                            
                                                                <div class="panel-body">
                            
                                                                    We rely on using the safest cleaning materials that remove accumulations of dust as well as body oils.
                            
                                                                </div>
                            
                                                            </div>
                            
                            
                            
                                                        </div>end of detailer
                            
                            
                            
                                                    </div>-->
                        </div>


                        <!--<div id="menu2">-->



                        <div class="series-slider">

                            <div id="demo">

                                <div id="owl-demo-two" class="owl-carousel">

                                    <?php
                                    $slider_car = $get->get_all_data_active('provider_gallery', 'id', 'asc', 'provider_id', $id);
                                    if (@$slider_car)
                                        {
                                        foreach ($slider_car as $car)
                                            {
                                            ?>

                                            <div class="item"><a href="#"><img src="../<?php echo $car['full_path']; ?>" alt="" title=""></a></div>

                                            <?php
                                            }
                                        }
                                    else
                                        {
                                        ?>
                                        <div class="alert alert-danger">
                                            <strong>No Images in Provider Gallery</strong> .
                                        </div><?php
                                        }
                                    ?>


                                </div>

                            </div>

                        </div>



                        <!--</div>-->



                    </div>

                </div>

            </div>







            <div class="contact-detail">

                <div class="container">

                    <div class="cntct-txt"><h3>Contact Details:</h3></div>

                    <div class="cntct-ad">

                        <div class="ad-icon"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></div>

                        <div class="ad-txt">

                            <h4>Address</h4><p> <?php echo $provider_data['s_address1']; ?><br>

                                <?php echo $provider_data['s_address2']; ?></p>

                        </div>

                    </div>

                    <div class="cntct-work">

                        <div class="ad-icon"><span class="glyphicon glyphicon-time" aria-hidden="true"></span></div>

                        <div class="ad-txt">

                            <h4>Working Hours</h4><p> <?php echo $provider_data['s_address3']; ?></p>

                        </div>

                    </div>

                    <div class="cntct-ph">

                        <div class="ad-icon"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span></div>

                        <div class="ad-txt">

                            <h4>Phone</h4><p><?php echo $provider_data['s_mob']; ?></p>

                        </div>

                    </div>
                    <div class="company-profile">
                        <div class="ad-icon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
                        <div class="ad-txt">
                            <h4>Company Profile</h4><p>
                                <?php if ($provider_data['pdf_english'] != '')
                                    {
                                    ?>
                                    <a href="http://alwakalat.com/pdf/<?php echo $provider_data['pdf_english']; ?>"target="_blank">Click for pdf </a>

<?php } ?>
                            </p>
                        </div>
                    </div><!--company-profile-->

                </div>

            </div>

            <div class="lociatin-pro">

                <div class="row">

                    <div class="col-sm-6 loc-pro">

                        <div class="location-form-main">

                            <div class="location-map">

<?php echo $provider_data['s_map']; ?>

                            </div>

                        </div>

                    </div>



                    <div class="col-sm-6 form-pro">

                        <div class="location-form-main">

                            <?php
                            if (isset($_POST['submit']))
                                {

                                $to = $contact_details['email'];

//				$to = "Info@alwakalat.com"; 

                                /*  $to = "swap.dedarsingh@gmail.com"; */

                                $subject = "Feedback for Provider";



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



                                                        <p><b>Name</b>: ' . $_POST["name"] . ' </p>

                                                        <p><b>Email</b>: ' . $_POST["email"] . ' </p>

                                                        <p><b>Message</b>:  ' . $_POST["message"] . '  </p>                                                     Please.</br>



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

//                                $message = "<b>Hello Alwakalat.</b>";
//				 $message .= "<p><b>Name</b>: ".$_POST['name']."</p>";
//				 $message .= "<p><b>Email</b>: ".$_POST['email']."</p>";
//				 $message .= "<p><b>Message</b>:".$_POST['message'].".</p>";



                                $header = "From:" . $_POST['email'] . " \r\n";

                                $header .= "MIME-Version: 1.0\r\n";

                                $header .= "Content-type: text/html\r\n";



                                $retval = mail($to, $subject, $message, $header);



                                if ($retval == true)
                                    {

                                    echo "<p style='color: green; font-weight: bold; font-size: 15px;'>Thankyou For Your Feedback ...</p>";
                                    }
                                }
                            ?>

                            <h3>Your Feed back here</h3>

                            <form action="" method="POST" id="feedback">

                                <input type="text" name="name" placeholder="Name*">



                                <input type="text" name="email" placeholder="Email*">



                                <textarea placeholder="Message*" name="message"></textarea>



                                <p></p>





                                <div class="note-form-text">



                                    <p>Your email will not be published</p>

                                </div>





                                <div class="add-feedback-button">



                                    <input type="submit" name="submit" value="ADD YOUR FEEDBACK">



                                </div>

                            </form>



                            <div class="package-icon">

                                <img src="images/package-icon.png" alt="">

                            </div>

                        </div>

                    </div>





                </div>

            </div>












    </div> 





    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->







<?php include("includes/footer.php"); ?>   