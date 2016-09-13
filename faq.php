    <?php include("includes/header.php");
	 $faq	=	$get->get_all_data_active('faq','id','asc','show','yes'); ?>   
  
  <div class="contact-page faq">
    <div class="container">
      <div class="row">
        <div class="col-sm-7 left-contact">
          <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			<?php $i=0; foreach($faq as $value){ $i++;?>
            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title"> 
				<a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $i;?>" aria-expanded="false" aria-controls="<?php echo $i;?>"><?php echo $value['question'];?></a> </h4>
              </div>
              <div id="<?php echo $i;?>" class="panel-collapse collapse <?php if($i==1){ echo "in";}?>" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body"> <?php echo $value['answer'];?></div>
              </div>
            </div>
           <?php } ?>
          </div>
        </div>
        <div class="col-sm-5 right-contact">
          <h2>Feel free to ask question!</h2>
          <?php
                    if (isset($_POST['submit']))
                        {
				$to = $contact_details['email']; 
                                //print_r($to);
                       //$to = "swap.amitkumar@gmail.com";
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
                       else
                       {
 
                        $subject = "Contact Us Request";

                        $message =' 
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
                        //                        print_r($message);
                        //                        die();
                        $retval = mail($to, $subject, $message, $header);
                        //				 print_r($retval);
                        //                                 die("ASD");
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
          <div class="left-inner"><form class="clearfix" id="advertise" action="" method="POST">
            <span>
            <input type="text" name="firstname" value="<?php if(isset($_POST['firstname'])) echo $_POST['firstname'];?>" placeholder="First Name ">
            </span> <span>
            <input type="text" name="lastname" value="<?php if(isset($_POST['lastname'])) echo $_POST['lastname'];?>" placeholder="Last Name">
            </span> <span>
            <input type="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" placeholder="E-mail Address ">
            </span> <span>
            <input type="text"  name="phone" value="<?php if(isset($_POST['phone'])) echo $_POST['phone'];?>" placeholder="Phone No">
            </span> <span>
            <textarea name="content"><?php if(isset($_POST['content'])) echo $_POST['content'];?></textarea>
             <input type="submit" value="Send Message"name="submit">
           </span>
           
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
     <?php include("includes/footer.php")?>   