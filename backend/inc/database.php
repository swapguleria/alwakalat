<?php 
error_reporting(0);
session_start();
ob_start();
define('DB_HOSTNAME','localhost');
define('DB_USERNAME','spldqsxl_alwakal');
define('DB_PASSWORD','alwakalat');
define('DB_DATABASENAME','spldqsxl_alwakalat');
define('SITEURL','http://alwakalat.com/backend/');
define('FRONTSITEURL','http://alwakalat.com/');
$connect	=	mysql_connect(DB_HOSTNAME,DB_USERNAME,DB_PASSWORD);
if(!$connect)
{
	die('Could Not Connect to Database') or die(mysql_error());
}
mysql_select_db(DB_DATABASENAME,$connect);
include('classes.php');
$obj	=	new model();
?>