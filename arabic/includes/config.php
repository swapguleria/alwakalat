<?php
@session_start();
ob_start();
define('site_url','http://localhost/QMC');
$connect	=	mysql_connect('localhost','spldqsxl_alwakal','alwakalat');
if(!$connect)
{
die('could not connect to database') or die(mysql_error());
}
mysql_select_db('spldqsxl_alwakalat',$connect);
include('model.php');
$get	=	new model();
?>