<?php
session_start();

if (in_array($_POST['current_id'], $_SESSION["whitelist"]))
    {
    echo "Match found";
    }
else
    {

    $value = $_POST['current_id'];

    $data_get = $_POST['data_get'];

    $add_list = array($data_get => $value);

//$_SESSION[$value] = $value;

    if (empty($_SESSION["whitelist"]))
        {
        $_SESSION["whitelist"] = $add_list;
        }
    else
        {

        $_SESSION["whitelist"] = array_merge($_SESSION["whitelist"], $add_list);
        }
    }
//print_r($_SESSION["whitelist"]);
?>
