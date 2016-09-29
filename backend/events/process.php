<?php
	include 'inc/database.php'; 
	
	if(isset($_POST['action']) && $_POST['action']=='Registration')
	{
		$obj->student_registration();
	}
	
	if(isset($_POST['action']) && $_POST['action']=='Login')
	{
		$obj->login();
	}
	if(isset($_POST['action']) && $_POST['action']=='Change_password')
	{
		$obj->change_password();
	}
	if(isset($_POST['action']) && $_POST['action']=='Edit_add')
	{
		$obj->edit_address();
	}
	if(isset($_POST['action']) && $_POST['action']=='One_time_payment')
	{
		$obj->one_time_payment();
	}
	if(isset($_POST['action']) && $_POST['action']=='Reccuring_payment')
	{
		$obj->reccuring_payment();
	}
	if(isset($_POST['action']) && $_POST['action']=='Pay_at_studio')
	{
		$obj->pay_at_studio();
	}
	if(isset($_POST['action']) && $_POST['action']=='Contact')
	{
		$obj->contactus();
	}
	if(isset($_POST['action']) && $_POST['action']=='Add_student')
	{
		$obj->add_student();
	}
	if(isset($_POST['action']) && $_POST['action']=='Camp_student')
	{
		echo "hello";
		$obj->camp_student();
	}
	if(isset($_POST['action']) && $_POST['action']=='Class_student')
	{
		$obj->class_student();
	}
	if(isset($_POST['action']) && $_POST['action']=='User_payment')
	{
		$obj->user_payment();
	}
	
	
?>