<?php
include("includes/header.php");
$client_data = $get->get_single_result('clients', 'id', $_GET['id']);
?>   
<div class="partner-section-main">
    <div class="container">
        <div class="partner-logo">
            <img src="<?php echo $client_data['full_path']; ?>" alt="">
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 map-section-main clearfix">
                <h4>Service Center : <?php echo (@$client_data['s_title']) ? $client_data['s_title'] : ""; ?></h4>	
                <div class="location-main">
                    <div class="loctaion-address">
                        <ul>
                            <li><?php echo $client_data['s_address1']; ?></li>
                            <li><?php echo $client_data['s_address2']; ?></li>
                            <li>Working Hours<br>
                                <?php echo $client_data['s_address3']; ?> </li>
                        </ul>
                    </div>
                    <div class="contact-details">
                        <ul>
                            <li class="phone-partner"> <?php echo $client_data['s_mob']; ?></li>
                            <li class="email-partner"> <a href="mailto:<?php echo $client_data['s_email']; ?>"><?php echo $client_data['s_email']; ?></a></li>
                            <li class="address-partner"> <?php echo $client_data['s_name']; ?></li>
                        </ul>
                        <div class="website-button">
                            <a href="<?php echo "http://" . $client_data['website']; ?>" target="_blank">Website</a>
                        </div>
                    </div>
                </div>
                <div class="location-map">
                    <?php echo $client_data['s_map']; ?>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 map-section-main clearfix">
                <h4>Showroom : <?php echo (@$client_data['sr_title']) ? $client_data['sr_title'] : ""; ?></h4>	
                <div class="location-main">
                    <div class="loctaion-address">
                        <ul>
                            <li><?php echo $client_data['sr_address1']; ?></li>
                            <li><?php echo $client_data['sr_address2']; ?></li>
                            <li>Working Hours<br>
                                <?php echo $client_data['sr_address3']; ?> </li>
                        </ul>
                    </div>
                    <div class="contact-details">
                        <ul>
                            <li class="phone-partner"> <?php echo $client_data['sr_mob']; ?></li>
                            <li class="email-partner"> <a href="mailto:<?php echo $client_data['sr_email']; ?>"><?php echo $client_data['sr_email']; ?></a></li>
                            <li class="address-partner"> <?php echo $client_data['sr_name']; ?></li>
                        </ul>
                    </div></div>
                <div class="location-map">
                    <?php echo $client_data['sr_map']; ?>
                </div>
            </div>
        </div>
        <hr>   <?php
        if (@$client_data['s_name_2'] || $client_data['sr_name_2'])
            {
            ?>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 map-section-main clearfix">

                    <h4>Service Center :<?php echo (@$client_data['s_title_2']) ? $client_data['s_title_2'] : ""; ?></h4>	
                    <div class="location-main">
                        <div class="loctaion-address">
                            <ul>
                                <li><?php echo $client_data['s_address1_2']; ?></li>
                                <li><?php echo $client_data['s_address2_2']; ?></li>
                                <li>Working Hours<br><?php echo $client_data['s_address3_2']; ?> </li>
                            </ul>
                        </div>
                        <div class="contact-details">
                            <ul>
                                <li class="phone-partner"> <?php echo $client_data['s_mob_2']; ?></li>
                                <li class="email-partner"> <a href="mailto:<?php echo $client_data['s_email_2']; ?>"><?php echo $client_data['s_email_2']; ?></a></li>
                                <li class="address-partner"> <?php echo $client_data['s_name_2']; ?></li>
                            </ul>
                            <div class="website-button">
                                <a href="<?php echo "http://" . $client_data['website_2']; ?>" target="_blank">Website</a>
                            </div>
                        </div></div>
                    <div class="location-map">
                        <?php echo $client_data['s_map_2']; ?>
                    </div>


                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 map-section-main clearfix">
                    <h4>Showroom : <?php echo (@$client_data['sr_title_2']) ? $client_data['sr_title_2'] : ""; ?></h4>	
                    <div class="location-main">
                        <div class="loctaion-address">
                            <ul>
                                <li><?php echo $client_data['sr_address1_2']; ?></li>
                                <li><?php echo $client_data['sr_address2_2']; ?></li>
                                <li>Working Hours<br>
                                    <?php echo $client_data['sr_address3_2']; ?> </li>
                            </ul>
                        </div>
                        <div class="contact-details">
                            <ul>
                                <li class="phone-partner"> <?php echo $client_data['sr_mob_2']; ?></li>
                                <li class="email-partner"> <a href="mailto:<?php echo $client_data['sr_email_2']; ?>"><?php echo $client_data['sr_email_2']; ?></a></li>
                                <li class="address-partner"> <?php echo $client_data['sr_name_2']; ?></li>
                            </ul>
                        </div></div>
                    <div class="location-map">
                        <?php echo $client_data['sr_map_2']; ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div> 
</div> 
<div class="partner-location-form">
    <div class="container">
        <div class="location-form-main">
            <?php
            if (isset($_POST['submit']))
                {
                $to = $contact_details['email'];
//				$to = "Info@alwakalat.com"; 
                /*  $to = "swap.dedarsingh@gmail.com"; */
                $subject = "Feedback for Partner..";

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
<?php include("includes/footer.php"); ?>   