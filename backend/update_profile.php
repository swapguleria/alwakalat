<?php 
include 'inc/config.php'; 
$email = trim($_POST['user-settings-email']);
$password = trim(md5($_POST['user-settings-password']));
$user_id = trim($_POST['user_id']);

$result = mysql_query("update admin SET `email`='".$email."',`password`='".$password."' where `id`='".$user_id."'");

echo $result;










?>
