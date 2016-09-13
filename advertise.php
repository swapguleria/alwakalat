<?php
include("includes/header.php");
$results = $get->get_single_result('page', 'id', '2');
$contact_details = $get->get_single_result('contact_details', 'id', '1');
?>   
<!--<div class="inner-banner">
    <div id="demo">
        <div id="owl-demo" class="owl-carousel">
            <?php // foreach ($result->data as $post): ?>
                 Renders images. @Options (thumbnail,low_resoulution, high_resolution) 
                <div class="item">
                    <a class="fancybox" data-fancybox-group="gallery" href="<?php // echo $post->images->standard_resolution->url ?>">
                        <img src="<?php // echo $post->images->thumbnail->url ?>" alt="" title="">
                    </a>
                </div>

            <?php // endforeach ?>
        </div>
    </div>
</div>-->
<div class="contact-page advertise">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 left-contact">
                <div class="left-inner">
                    <h1><?php echo $results['page_title']; ?></h1>
                    <?php echo $results['content']; ?>
                    <?php
                    if (isset($_POST['submit']))
                        {
                        $to = $contact_details['email'];
                        $emails = $_POST["email"];
                        $phones = $_POST["phone"];
                       
                       $mob="/^[1-9][0-9]*$/";
                       if( $emails == "" || filter_var($emails, FILTER_VALIDATE_EMAIL) === false)
                       {
                          echo "<p style='color:Red; font-weight: bold; font-size: 15px;'>Please enter valid email id...</p>";
                       }
                       else if(isset($phones) && !empty($phones) && !preg_match($mob, $phones))
                           {
                           echo "<p style='color:Red; font-weight: bold; font-size: 15px;'>Please enter valid phone number...</p>";
                       }
                      else {
                        $subject = "Advertise Request";
                     
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

                                                        <p>
                                                            <b>Name</b>: ' . $_POST["firstname"] . '  ' . $_POST["lastname"] . ' </p>
                                                        <p><b>Email</b>: ' . $_POST["email"] . ' </p>
                                                        <p><b>Phone Number</b>:  ' . $_POST["phone"] . '  </p>
                                                        <p><b>Message</b>:' . $_POST["content"] . '
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
                        }
                    ?>
                    <form class="clearfix" id="advertise" action="" method="POST">
                        <span>
                            <input type="text" name="firstname" value="<?php if(isset($_POST['firstname'])) echo $_POST['firstname'];?>" placeholder="First Name ">
                        </span> <span>
                            <input type="text" name="lastname" value="<?php if(isset($_POST['lastname'])) echo $_POST['lastname'];?>" placeholder="Last Name">
                        </span> <span>
                            <input type="email" name="email"value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" placeholder="E-mail Address ">
                        </span> <span>
                            <input type="text"  name="phone" value="<?php if(isset($_POST['phone'])) echo $_POST['phone'];?>"placeholder="Phone No">
                        </span> <span>
                            <textarea name="content"><?php if(isset($_POST['content'])) echo $_POST['content'];?></textarea>
                            <input type="submit" name="submit" value="Send Message">
                        </span>

                    </form>
                </div>
            </div>
            <div class="col-sm-4 right-contact">
                <h1>Contact Us</h1>
                <div class="address">
                    <!--p><i class="fa fa-home"></i><?php // echo $contact_details['contact_name'];  ?></p-->
                    <p><i class="fa fa-phone"></i><?php echo $contact_details['phone']; ?></p>
                    <p><i class="fa fa-envelope-o"></i> <a href="mailto:<?php echo $contact_details['email']; ?>"><?php echo $contact_details['email']; ?></a></p>
                </div>

                <div class="social-icon social">
                    <ul>
                        <li><a target="_blank" href="https://www.facebook.com/alwakalatsite?_rdr=p"><img src="images/fb-icon.png" alt="" title="" /></a></li>
                        <li><a target="_blank" href="https://twitter.com/al_wakalat"><img src="images/twiiter-icon.png" alt="" title="" /></a></li>

                        <li><a target="_blank" href="https://www.instagram.com/alwakalat/"><img src="images/insta-icon.png" alt="" title="" /></a></li>
                        <li><a target="_blank" href="https://www.snapchat.com/add/alwakalat"><img src="images/snap-chat.png" alt="" title="" /></a></li>

                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php") ?>   