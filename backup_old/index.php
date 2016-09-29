<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>alWakalat</title>
</head>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="font/webfontkit-20151124-061631/stylesheet.css" />
<script src="js/jquery.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/my.js"></script>
<!-- Facebook Conversion Code for Omar coming soon -->
<script>(function() {
  var _fbq = window._fbq || (window._fbq = []);
  if (!_fbq.loaded) {
    var fbds = document.createElement('script');
    fbds.async = true;
    fbds.src = '//connect.facebook.net/en_US/fbds.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(fbds, s);
    _fbq.loaded = true;
  }
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', '6039315930063', {'value':'0.00','currency':'USD'}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6039315930063&amp;cd[value]=0.00&amp;cd[currency]=USD&amp;noscript=1" /></noscript>
<body>
<div class="outer-div">
  <div class="banner-top clearfix"><img src="image/banner-top.png" alt="" title=""/></div>
  <div class="coming-outer">
    <div class="comming-soon-main">
      <div class="logo"> <a href="http://www.alwakalat.com/"><img src="image/logo.png" alt="" title="" /></a> </div>
      <div class="coming"> <img src="image/coming-text-image.png" alt="" title="" /> </div>
      <?php
		if(isset($_POST['submit'])){
         $to = "oshamiye@gmail.com";
         $subject = "New Subscription!";
         
         $message = "<b>Hello.</b>";
         $message .= "<p>Name : ".$_POST['name']."</p><p>Email : ".$_POST['email']."</p>";
         
         $header = "From:info@alwakalat.com/ \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true )
         {
			 echo"<div class='overlay'><div class='msg'>Message sent successfully...<a href='' class='close'>X</a></div></div>";

         }
         /* else
         {
			
            echo "Message could not be sent...";
         } */
		}
      ?>
      <div class="online">
        <h1>The First Dealerships <span>Online Showroom</span></h1>
        <form action="" id="subscribe" method="POST">
          <div class="form">
            <span><input type="text" name="name" placeholder="Name*" /></span>
            <span><input type="text" name="email" placeholder="E-mail*" /></span>
          </div>
          <div >
            <input class="subcribe-button" type="submit" name="submit" value="Subscribe">
          </div>
        </form>
        <div class="social-icon">
          <ul>
            <li><a target="_blank" href="https://www.facebook.com/alwakalatsite?_rdr=p"><img src="image/fb-icon.png" alt="" title="" /></a></li>
            <li><a target="_blank" href="https://twitter.com/al_wakalat"><img src="image/twiiter-icon.png" alt="" title="" /></a></li>
            
            <li><a target="_blank" href="https://www.instagram.com/alwakalat/"><img src="image/insta-icon.png" alt="" title="" /></a></li>
            <li><a target="_blank"><img src="image/snap-chat.png" alt="" title="" /></a></li>
  
          </ul>
        </div>
        <div class="awkalat"> <a href="http://www.alwakalat.com/">www.alwakalat.com</a> </div>
      </div>
    </div>
  </div>
  <div class="banner-bottom"> <img src="image/banner-bottom.png" alt="" title="" /> </div>
</div>
</body>
</html>
