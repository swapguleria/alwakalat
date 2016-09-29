<?php
    include_once("database.php");
    $email = $obj->escape_string($_POST['student_parent_email']);
	$num = $obj->get_num_row($email);
    if($num == 0){
        echo "true";
    } else {
        echo "false";
    }
    mysql_close($connect);
?>