<?php
@session_start();
ob_start();
define('site_url','http://localhost/QMC');
define('cur','$');
define('return_url','http://alwakalat.com/thanks.php');
define('cancel_url','http://alwakalat.com/cancel.php');
define('notify_url','http://alwakalat.com/notify_url.php');
define('business','omar-facilitator@cosettesolutions.com');
define('currency_code','USD');
define('cmd','_cart');
define('upload','1');
define('rm','2');
define('paypal_url','https://www.sandbox.paypal.com/cgi-binwebscr');
$connect	=	mysql_connect('localhost','spldqsxl_alwakal','alwakalat');
if(!$connect)
{
die('could not connect to database') or die(mysql_error());
}
mysql_select_db('spldqsxl_alwakalat',$connect);
include('model.php');
$get	=	new model();
?>