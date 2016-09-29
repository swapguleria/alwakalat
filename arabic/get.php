<?php 
session_start();


 $value = $_POST['current_id'];
 
 $data_get = $_POST['data_get'];
   
 $add_list = array($data_get => $value);

//$_SESSION[$value] = $value;

if(empty($_SESSION["whitelist"]))
{
   $_SESSION["whitelist"] = $add_list;
//print_r($_SESSION);
}
else
{
    print_r($add_list);
 
  $_SESSION["whitelist"] = array_merge($_SESSION["whitelist"],$add_list);
    
//print_r($_SESSION);
}
print_r($_SESSION["whitelist"]);
?>
