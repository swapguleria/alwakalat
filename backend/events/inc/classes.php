<?php
class model{

	function escape_string($value)
	{
		return trim(mysql_real_escape_String(stripslashes($value)));
	}
	function setdate($date)
	{
		return date('m-d-y',strtotime($date));
	}
	function delete_data($table,$field,$id,$page)
	{
		$delete	=	"delete from ".Suffix."$table where $field='".$id."'";
		$query	=	$this->Executequery($delete);
		if($query)
		{
			$this->locate(''.$page.'');
		}
	}
	
	function Executequery($query)
	{
		$result	=	mysql_query($query) or die(mysql_error());
		return $result;
	}
		
	function locate($url)
	{
		header('location:'.$url.'');
		exit;
	}
	function get_sub_menu_num_rows($page)
	{
		$select	=	"select * from ".Suffix."pages where `pages_parent`='".$page."' ";
		$query	=	$this->Executequery($select);
		$rows	=	mysql_num_rows($query);
		return $rows;
	}
	function get_num_row($email)
	{
		$select	=	"select * from ".Suffix."register where `student_parent_email`='".$email."' ";
		$query	=	$this->Executequery($select);
		$rows	=	mysql_num_rows($query);
		return $rows;
	}
	function login()
	{
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$select	=	"select * from ".Suffix."register where `student_parent_email`='".$username."' and `register_password`='".$password."' ";
		$query	=	$this->Executequery($select);
		$rows	=	mysql_num_rows($query);
		if($rows>0)
		{
			$results	=	mysql_fetch_Assoc($query);
			$_SESSION['login'] = $results['register_id'];
			$this->locate('myaccount');
		}
		else
		{
			$_SESSION['error'] = "Invalid Email/Password.";
			$this->locate('login');
		}  
	}
	function logout()
	{
			unset($_SESSION['login']);
			$this->locate('login');
	}
	
	function change_password()
	{
		$register_id = $_SESSION['login'];
		$old_pass= md5($_POST['old_pass']);
		$new_pass= md5($_POST['new_pass']);
		$retype_pass= $_POST['retype_pass'];		
		
		$select	=	"select * from ".Suffix."register where `register_password`='".$old_pass."' and `register_id`='".$register_id."'  ";
		$query	=	$this->Executequery($select);
		$rows	=	mysql_num_rows($query);
		if($rows>0)
		{
			$results	=	mysql_fetch_Assoc($query);
			$update	=	"UPDATE ".Suffix."register SET `register_password`='".$new_pass."' where `register_id`='".$register_id."' ";
			$query	=	$this->Executequery($update);
			$this->locate('myaccount');
		}
		else
		{
			$_SESSION['error'] = "Invalid Old Password.";
			$this->locate('change_password');
		}
	}
	function edit_address()
	{
		$register_id = $_SESSION['login'];
		$register_address= $_POST['register_address'];
		$register_phone= $_POST['register_phone'];
		$register_city= $_POST['register_city'];		
		$register_state= $_POST['register_state'];		
		$register_zip= $_POST['register_zip'];			
		
			
			$update	=	"UPDATE ".Suffix."register SET `register_address`='".$register_address."',`register_phone`='".$register_phone."',`register_city`='".$register_city."',`register_state`='".$register_state."',`register_zip`='".$register_zip."' where `register_id`='".$register_id."' ";
			$query	=	$this->Executequery($update);
			$this->locate('myaccount');
	}
	function get_all_data($table,$field,$sorting)
	{
		$select	=	"select * from ".Suffix."$table order by $field $sorting ";
		$query	=	$this->Executequery($select);
		$rows	=	mysql_num_rows($query);
		if($rows>0)
		{
			while($results	=	mysql_fetch_Assoc($query))
			{
				$abc[]	=	$results;
			}
			return $abc;
		}
	}
	function get_select_class_data($table,$sorting)
	{
		
		/* $select	=	"select * from ".Suffix."$table WHERE (`class_agefrom` <= '".$fieldvalue."' and `class_ageto` >= '".$fieldvalue."') or (`class_agefrom` = '0' or `class_ageto` = '0') and ($field='".$value."' or  $field='Both')  order by class_id $sorting "; */
		$select	=	"select * from ".Suffix."$table order by class_id $sorting ";
		$query	=	$this->Executequery($select);
		$rows	=	mysql_num_rows($query);
		if($rows>0)
		{
			while($results	=	mysql_fetch_Assoc($query))
			{
				$abc[]	=	$results;
			}
			return $abc;
		}
	}
	function get_select_camp_data($table,$sorting)
	{
		$select	=	"select * from ".Suffix."$table order by camp_id $sorting ";
		$query	=	$this->Executequery($select);
		$rows	=	mysql_num_rows($query);
		if($rows>0)
		{
			while($results	=	mysql_fetch_Assoc($query))
			{
				$abc[]	=	$results;
			}
			return $abc;
		}
	}
	
	function get_all_data_active($table,$field,$sorting,$active,$value)
	{
		$select	=	"select * from ".Suffix."$table where $active='".$value."' order by $field $sorting ";
		$query	=	$this->Executequery($select);
		$rows	=	mysql_num_rows($query);
		if($rows>0)
		{
			while($results	=	mysql_fetch_Assoc($query))
			{
				$abc[]	=	$results;
			}
			return $abc;
		}
	}
	function get_all_data_active_new($table,$field,$sorting,$active,$value)
	{
		$select	=	"select * from ".Suffix."$table where $active='".$value."' and new_date >= now() order by $field $sorting ";
		$query	=	$this->Executequery($select);
		$rows	=	mysql_num_rows($query);
		if($rows>0)
		{
			while($results	=	mysql_fetch_Assoc($query))
			{
				$abc[]	=	$results;
			}
			return $abc;
		}
	}
	function get_all_data_active_video($table,$field,$sorting,$active,$value)
	{
		$select	=	"select * from ".Suffix."$table where $active='".$value."' order by $field $sorting LIMIT 2 " ;
		$query	=	$this->Executequery($select);
		$rows	=	mysql_num_rows($query);
		if($rows>0)
		{
			while($results	=	mysql_fetch_Assoc($query))
			{
				$abc[]	=	$results;
			}
			return $abc;
		}
	}
	function get_all_data_active_events($table,$field,$sorting,$active,$value)
	{
		$select	=	"select * from ".Suffix."$table where $active='".$value."' and events_end_date >= now() order by $field $sorting LIMIT 3";
		$query	=	$this->Executequery($select);
		$rows	=	mysql_num_rows($query);
		if($rows>0)
		{
			while($results	=	mysql_fetch_Assoc($query))
			{
				$abc[]	=	$results;
			}
			return $abc;
		}
	}
	function get_all_data_active_faculty($table,$field,$sorting,$active,$value,$proffession)
	{
		$select	=	"select * from ".Suffix."$table Where $active='".$value."' order by $field $sorting ";
		$query	=	$this->Executequery($select);
		$rows	=	mysql_num_rows($query);
		if($rows>0)
		{
			while($results	=	mysql_fetch_Assoc($query))
			{
				$prof = explode(',',$results['teacher_page']);
				if(in_array($proffession,$prof))
				{			
					$abc[]	=	$results;
				}
			}
			return $abc;
		}
	}
	function get_all_data_user($table,$field,$value)
	{
		$select	=	"select * from ".Suffix."$table where $field='".$value."' ";
		$query	=	$this->Executequery($select);
		$rows	=	mysql_num_rows($query);
		if($rows>0)
		{
			while($results	=	mysql_fetch_Assoc($query))
			{
				$abc[]	=	$results;
			}
			return $abc;
		}
	}
	function get_all_payments($table,$field,$value,$fieldsort,$sorting)
	{
		$select	=	"select * from ".Suffix."$table where $field='".$value."' order BY $fieldsort $sorting ";
		$query	=	$this->Executequery($select);
		$rows	=	mysql_num_rows($query);
		if($rows>0)
		{
			while($results	=	mysql_fetch_Assoc($query))
			{
				$abc[]	=	$results;
			}
			return $abc;
		}
	}
	function get_field_dual_field_check($table,$field,$field1,$value1,$field2,$value2)
	{
		$select	=	"select $field from ".Suffix."$table where $field1='".$value1."' and $field2='".$value2."'";
		$query	=	$this->Executequery($select);
		$result	=	mysql_fetch_Assoc($query);
		return $result[$field];
	}
	
	function get_all_data_active_from_field($table,$field,$sorting,$active,$value,$fields,$fielsvalue)
	{
		$select	=	"select * from ".Suffix."$table where $active='".$value."' and $fields='".$fielsvalue."' order by $field $sorting ";
		$query	=	$this->Executequery($select);
		$rows	=	mysql_num_rows($query);
		if($rows>0)
		{
			while($results	=	mysql_fetch_Assoc($query))
			{
				$abc[]	=	$results;
			}
			return $abc;
		}
	}
	function get_all_data_active_from_teacher($table,$field,$sorting,$active,$value,$fields,$fieldsvalue)
	{	
		$select	=	"select * from ".Suffix."$table as t,".Suffix."teacher_proffession as p where t.$active='".$value."' and t.teacher_id=p.teacher_id and p.$fields='".$fieldsvalue."' order by t.$field $sorting "; 
		$query	=	$this->Executequery($select);
		$rows	=	mysql_num_rows($query);
		if($rows>0)
		{
			while($results	=	mysql_fetch_Assoc($query))
			{
				$abc[]	=	$results;
			}
			return $abc;
		}
	}
	function get_all_data_active_home($table,$field,$sorting,$active,$value)
	{
		$select	=	"select * from ".Suffix."$table where $active='".$value."' AND `pages_slug`!='home' AND `pages_parent`='' order by $field $sorting ";
		$query	=	$this->Executequery($select);
		$rows	=	mysql_num_rows($query);
		if($rows>0)
		{
			while($results	=	mysql_fetch_Assoc($query))
			{
				$abc[]	=	$results;
			}
			return $abc;
		}
	}
	
	function get_all_data_active_page($table,$field,$sorting,$active,$value,$field1,$value1)
	{
		$select	=	"select * from ".Suffix."$table where $active='".$value."' AND `pages_slug`!='home' AND $field1='".$value1."'  order by $field $sorting ";
		$query	=	$this->Executequery($select);
		$rows	=	mysql_num_rows($query);
		if($rows>0)
		{
			while($results	=	mysql_fetch_Assoc($query))
			{
				$abc[]	=	$results;
			}
			return $abc;
		}
	}
	
	function get_single_field($table,$field,$fieldvalue,$id)
	{
		$select	=	"select $field from ".Suffix."$table where $fieldvalue='".$id."' LIMIT 1";
		$query	=	$this->Executequery($select);
		$result	=	mysql_fetch_Assoc($query);
		return $result[$field];
	}
	
	function get_single_result($table,$field,$id)
	{
		$select	=	"select * from ".Suffix."$table where $field='".$id."'";
		$query	=	$this->Executequery($select);
		$result	=	mysql_fetch_Assoc($query);
		return $result;
	}
	
	function get_my_data($table,$id)
	{
	
		if($id == '' )
		{
			$select	=	"select * from ".Suffix."$table where register_id='".$_SESSION['login']."'";
		}
		else 
		{		
			$select	=	"select * from ".Suffix."$table where register_id='".$_SESSION['login']."' and student_id= '".$id."'";
		}
		$query	=	$this->Executequery($select);
		$rows	=	mysql_num_rows($query);
		if($rows>0)
		{
			while($results	=	mysql_fetch_Assoc($query))
			{
				$abc[]	=	$results;
			}
			return $abc;
		}
		
	}
	
	function camp_student()
	{
		
		$register_id	=	$_SESSION['login'];
		$student_id	=	$this->escape_string($_POST['student_id']);
		if($student_id == '0'){ $this->locate('mycamps') ;}
		else { $this->locate('mycamp/student/'.$student_id.'');}
	}
	function class_student()
	{
		
		$register_id	=	$_SESSION['login'];
		$student_id	=	$this->escape_string($_POST['student_id']);
		if($student_id == '0'){ $this->locate('myclasses') ;}
		else { $this->locate('myclass/student/'.$student_id.'');}
	}
	
	
	function make_thumb($src, $dest, $desired_width,$type) {
	/* read the source image */  
	if($type=='jpg' || $type=='jpeg'){	$source_image = imagecreatefromjpeg($src);		}
	else if($type=='png'){		$source_image = imagecreatefrompng($src);		}  $width = imagesx($source_image);  $height = imagesy($source_image);    /* find the "desired height" of this thumbnail, relative to the desired width  */  $desired_height = 188;    /* create a new, "virtual" image */  $virtual_image = imagecreatetruecolor($desired_width, $desired_height);    /* copy source image at a resized size */  imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);    /* create the physical thumbnail image to its destination */  
	if($type=='jpg' || $type=='jpeg'){	$source_image = imagejpeg($virtual_image, $dest);		}
	else if
	($type=='png'){		$source_image = imagepng($virtual_image, $dest);}
	}
	
	function add_student()
	{
		$register_id	=	$this->escape_string($_POST['register_id']);
		$student_name	=	$this->escape_string($_POST['student_name']);
		$student_gender	=	$this->escape_string($_POST['student_gender']);
		$student_age	=	$this->escape_string($_POST['student_age']);
		$bmonth	=	$this->escape_string($_POST['bmonth']);
		$bdate	=	$this->escape_string($_POST['bdate']);
		$byear	=	$this->escape_string($_POST['byear']);
		
		$time1 =$byear.'-'.$bmonth.'-'.$bdate;		
		$student_birthdate	=	date('Y-m-d',strtotime($time1));
		
		$insert1 = "Insert INTO ".Suffix."student SET `register_id`='".$register_id."',`student_name`='".$student_name."',`student_gender`='".$student_gender."',`student_age`='".$student_age."',`student_birthdate`='".$student_birthdate."' ";
			$query_personal			=	mysql_query($insert1) or die(mysql_error());
		if($query_personal)
		{
			$_SESSION['success']="Student Added";
		}
		else
		{
			$_SESSION['error']="Student not added";
		}
		$this->locate('mystudent.php'); 
	}
	
	function student_registration()
	{
		$payment = $this->get_single_field('enroll_fee','fee','enroll_id','1');
		$student_firstname	=	$this->escape_string($_POST['student_firstname']);
		$student_gender	=	$this->escape_string($_POST['student_gender']);
		$student_parent_name	=	$this->escape_string($_POST['student_parent_name']);
		$register_phone		=	$this->escape_string($_POST['register_phone']);
		$student_parent_email		=	$this->escape_string($_POST['student_parent_email']);
		$student_mother_employment	=	$this->escape_string($_POST['student_mother_employment']);
		$student_mother_cellno	=	$this->escape_string($_POST['student_mother_cellno']);
		$student_father_employment	=	$this->escape_string($_POST['student_father_employment']);
		$student_father_cellno		=	$this->escape_string($_POST['student_father_cellno']);
		$student_age		=	$this->escape_string($_POST['student_age']);
		$student_tshirt_size		=	$this->escape_string($_POST['student_tshirt_size']);
		$bmonth	=	$this->escape_string($_POST['bmonth']);
		$bdate	=	$this->escape_string($_POST['bdate']);
		$byear	=	$this->escape_string($_POST['byear']);
		
		$time1 =$byear.'-'.$bmonth.'-'.$bdate;		
	 	$student_birth	=	date('Y-m-d',strtotime($time1));
	
		$register_address=	$this->escape_string($_POST['register_address']);
		$student_mother_workno	=	$this->escape_string($_POST['student_mother_workno']);
		$register_city		=	$this->escape_string($_POST['register_city']);
		$register_state		=	$this->escape_string($_POST['register_state']);
		$register_zip		=	$this->escape_string($_POST['register_zip']);
		$student_father_workno		=	$this->escape_string($_POST['student_father_workno']);	
		$register_gaurdain	=	$this->escape_string($_POST['register_gaurdain']);		
		$register_authorize	=	$this->escape_string($_POST['register_authorize_phone']);		
		$register_authorize_phone	=	$this->escape_string($_POST['register_authorize_phone']);		
		$register_parents_signature	=	$this->escape_string($_POST['register_parents_signature']);		
		$register_date	=	$this->escape_string($_POST['register_date']);	
		$time = explode('-',$register_date);
		$time1 =$time[2].'-'.$time[0].'-'.$time[1];		
		$register_date	=	date('Y-m-d',strtotime($time1));
		
		$register_before_val	=	$this->escape_string($_POST['register_before']);		
		$register_findus	=	$this->escape_string($_POST['register_findus']);		
		$register_findus_quote	=	$this->escape_string($_POST['register_findus_quote']);	
		if($register_before_val == 'on'){$register_before = 'yes';}
		else {$register_before = 'no';}
		$spn = explode(' ',$student_parent_name);
		
	 	$insert_personal	=	"INSERT INTO ".Suffix."register SET
					`student_firstname`='".$student_firstname."',
					`student_gender`='".$student_gender."',
					`student_parent_name`='".$student_parent_name."',
					`register_phone`='".$register_phone."',
					`student_parent_email`='".$student_parent_email."',
					`student_mother_employment`='".$student_mother_employment."',
					`student_mother_cellno`='".$student_mother_cellno."',
					`student_father_employment`='".$student_father_employment."',
					`student_father_cellno`='".$student_father_cellno."',
					`student_age`='".$student_age."',
					`student_tshirt_size`='".$student_tshirt_size."',
					`student_birth`='".$student_birth."',
					`register_address`='".$register_address."',
					`student_mother_workno`='".$student_mother_workno."',
					`register_city`='".$register_city."',
					`register_state`='".$register_state."',
					`register_zip`='".$register_zip."',
					`student_father_workno`='".$student_father_workno."',
					`register_gaurdain`='".$register_gaurdain."',
					`register_authorize`='".$register_authorize."',
					`register_authorize_phone`='".$register_authorize_phone."',
					`register_parents_signature`='".$register_parents_signature."',
					`register_date`='".$register_date."',
					`register_before`='".$register_before."',
					`register_findus`='".$register_findus."',
					`register_findus_quote`='".$register_findus_quote."',
					`registeration_date`=now()";
	
		$query_personal			=	mysql_query($insert_personal) or die(mysql_error()); 
		$register_id	=	mysql_insert_id();
        $_SESSION['register_id'] = $register_id;		
		$username = $spn[0].$register_id.rand(100, 999);
		$password =$register_id.rand(100000, 999999);
		$update = "UPDATE ".Suffix."register SET `register_username`='".$username."',`register_password`='".md5($password)."' WHERE `register_id`='".$register_id."'";
		$query_personal1			=	mysql_query($update) or die(mysql_error()); 
		
		
			$headers 		= "MIME-Version: 1.0" . "\r\n";
			$headers 		.= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers 		.= 'From: <no-reply@mytestserver.co.in>' . "\r\n";
			$subject	=	'Username and password for the student parents';
			$_SESSION['message']	=	"You are registerd for our academy<br>You Email is ".$student_parent_email."<br> and password is ".$password;
			//mail($student_parent_email,$subject,$message,$headers);
		
		
		$insert_student_info	=	"INSERT INTO ".Suffix."student SET
							`student_birthdate`='".$student_birth."',
							`student_age`='".$student_age."',
							`student_name`='".$student_firstname."',
							`student_gender`='".$student_gender."',
							`register_id`='".$register_id."'";	
				
				$query_student_info	=	mysql_query($insert_student_info) or die(mysql_error()); 	
		$student_id	=	mysql_insert_id();	
			
		$student_class_1	=	$this->escape_string($_POST['student_class_1']);
		$student_class_2	=      	$this->escape_string($_POST['student_class_2']);
		$student_class_3	=	$this->escape_string($_POST['student_class_3']);
		$student_class_4	=	$this->escape_string($_POST['student_class_4']);
		$student_class_5	=	$this->escape_string($_POST['student_class_5']);
		$student_class_6	=	$this->escape_string($_POST['student_class_6']);
		$student_class_7	=	$this->escape_string($_POST['student_class_7']);
		$student_class_8	=	$this->escape_string($_POST['student_class_8']);
		$student_class_9	=	$this->escape_string($_POST['student_class_9']);
		$student_class_id_1	=	$this->escape_string($_POST['student_class_id_1']);
		$student_class_id_2	=	$this->escape_string($_POST['student_class_id_2']);
		$student_class_id_3	=	$this->escape_string($_POST['student_class_id_3']);
		$student_class_id_4	=	$this->escape_string($_POST['student_class_id_4']);
		$student_class_id_5	=	$this->escape_string($_POST['student_class_id_5']);
		$student_class_id_6	=	$this->escape_string($_POST['student_class_id_6']);
		$student_class_id_7	=	$this->escape_string($_POST['student_class_id_7']);
		$student_class_id_8	=	$this->escape_string($_POST['student_class_id_8']);
		$student_class_id_9	=	$this->escape_string($_POST['student_class_id_9']);
		$student_class_name_1	=	$this->escape_string($_POST['student_class_name_1']);
		$student_class_name_2	=	$this->escape_string($_POST['student_class_name_2']);
		$student_class_name_3	=	$this->escape_string($_POST['student_class_name_3']);
		$student_class_name_4	=	$this->escape_string($_POST['student_class_name_4']);
		$student_class_name_5	=	$this->escape_string($_POST['student_class_name_5']);
		$student_class_name_6	=	$this->escape_string($_POST['student_class_name_6']);
		$student_class_name_7	=	$this->escape_string($_POST['student_class_name_7']);
		$student_class_name_8	=	$this->escape_string($_POST['student_class_name_8']);
		$student_class_name_9	=	$this->escape_string($_POST['student_class_name_9']);
		//$class_unlimited	=	$this->escape_string($_POST['class_unlimited']);
		
			for($i=1;$i<10;$i++)
			{
				if($this->escape_string($_POST['student_class_'.$i]) != "")
				{
					if($this->escape_string($_POST['student_class_name_'.$i]) == "class"){
						$sclass[]=$this->escape_string($_POST['student_class_'.$i]);
						$sclassid[]=$this->escape_string($_POST['student_class_id_'.$i]);
					}
					if($this->escape_string($_POST['student_class_name_'.$i]) == "camp"){
						$scamp[]=$this->escape_string($_POST['student_class_'.$i]);
						$scampid[]=$this->escape_string($_POST['student_class_id_'.$i]);
					}
				}		
			}
			
				$j=0;$extrafee = 0;
			if(is_array($sclass)) {
				foreach ($sclass as $stduent_class){
				$open = $this->get_single_field('class','class_open','class_id',$sclassid[$j]);
				if($open == 0)
				{
					$_SESSION['error']= 'Some classes seats are full that you are selected. Please try again or call in the studio';
					$delete	=	"Delete from ".Suffix."register Where `register_id`='".$register_id."'";					
					$query_delete	=	mysql_query($delete) or die(mysql_error());
					
					$delete	=	"Delete from ".Suffix."student Where `register_id`='".$register_id."'";					
					$query_delete	=	mysql_query($delete) or die(mysql_error());
					$select	=	"Select * from ".Suffix."student_class Where `register_id`='".$register_id."'";		
					$select = mysql_query($select);
					while($result = mysql_fetch_array($select))
					{
						$class_id = $result['student_class_id'];
						$opens = $this->get_single_field('class','class_open','class_id',$class_id);
						$opens= $opens + 1;
						$update = "UPDATE ".Suffix."class SET `class_open`='".$opens."' WHERE `class_id`='".$class_id."'";
						$query_update			=	mysql_query($update) or die(mysql_error());
					}
					$delete	=	"Delete from ".Suffix."student_class Where `register_id`='".$register_id."'";					
					$query_delete	=	mysql_query($delete) or die(mysql_error());
					$this->locate('register.php'); 
				}				
				$class_extrafee = $this->get_single_field('class','class_extrafee','class_id',$sclassid[$j]);
				$class_name = $this->get_single_field('class','class_name','class_id',$sclassid[$j]);
				$class_start_time = $this->get_single_field('class','class_start_time','class_id',$sclassid[$j]);
				$class_end_time = $this->get_single_field('class','class_end_time','class_id',$sclassid[$j]);
				if($class_extrafee > 0 && $class_extrafee > $extrafee )  {  $extrafee = $class_extrafee; }
				/* if(($type == "music" || $type == "voice") && !isset($mat))  {  $mat = 10; } */
			 	$insert_student_class	=	"INSERT INTO ".Suffix."student_class SET
							`student_id`='".$student_id."',
							`student_class_id`='".$sclassid[$j]."',
							`student_class`='".$stduent_class."',
							`class_name`='".$class_name."',
							`class_start_time`='".$class_start_time."',
							`class_end_time`='".$class_end_time."',
							`student_name`='".$student_firstname."',
							`date`=now(),
							`register_id`='".$register_id."'";	
				
				$query_student_class	=	mysql_query($insert_student_class) or die(mysql_error());
				$class_open = $this->get_single_field('class','class_open','class_id',$sclassid[$j]);
				$class_open = $class_open - 1 ;
				$update = "UPDATE ".Suffix."class SET `class_open`='".$class_open."' WHERE `class_id`='".$sclassid[$j]."'";
				$query_update			=	mysql_query($update) or die(mysql_error());
				$j++;
				}
				
				$price =$this->get_single_field('price','price','price_id',$j);
				$payment = $payment + $price;
				if($extrafee > 0){ $payment = $payment + $extrafee; }
				//if(isset($mat)){ $payment = $payment + $mat; }
			}
			$k=0;$c=0;$ps=0;$psprice=0;$cprice=0;
			if(is_array($scamp)) {
				foreach ($scamp as $stduent_camp){
				$open = $this->get_single_field('camp','camp_seat','camp_id',$scampid[$k]);
				if($open == 0)
				{
					$_SESSION['error'] = 'Some camps seats are full that you are selected. Please try again or call in the studio';
					$delete	=	"Delete from ".Suffix."register Where `register_id`='".$register_id."'";					
					$query_delete	=	mysql_query($delete) or die(mysql_error());
					
					$delete	=	"Delete from ".Suffix."student Where `register_id`='".$register_id."'";					
					$query_delete	=	mysql_query($delete) or die(mysql_error());
					$select	=	"Select * from ".Suffix."student_camp Where `register_id`='".$register_id."'";		
					$select = mysql_query($select);
					while($result = mysql_fetch_array($select))
					{
						$camp_id = $result['student_camp_id'];
						$opens = $this->get_single_field('camp','camp_seat','camp_id',$camp_id);
						$opens= $opens + 1;
						$update = "UPDATE ".Suffix."camp SET `camp_seat`='".$opens."' WHERE `camp_id`='".$camp_id."'";
						$query_update			=	mysql_query($update) or die(mysql_error());
					}
					$delete	=	"Delete from ".Suffix."student_camp Where `register_id`='".$register_id."'";					
					$query_delete	=	mysql_query($delete) or die(mysql_error());
					$this->locate('register.php'); 
				}
				//$fee = $this->get_single_field('class','class_fee','class_id',$sclassid[$j]);
				$ctype = $this->get_single_field('camp','camp_preschool','camp_id',$scampid[$k]);
				$camp_name = $this->get_single_field('camp','camp_name','camp_id',$scampid[$k]);
				$camp_start_date = $this->get_single_field('camp','camp_start_date','camp_id',$scampid[$k]);
				$camp_end_date = $this->get_single_field('camp','camp_end_date','camp_id',$scampid[$k]);
				$camp_preschool = $this->get_single_field('camp','camp_preschool','camp_id',$scampid[$k]);
				
				if($ctype == "yes" ) {  $camptype = 'preschool';$ps++; }
				if($ctype == "no" ) {  $camptype = 'camp'; $c++;}
				
				$insert_student_class	=	"INSERT INTO ".Suffix."student_camp SET
							`student_id`='".$student_id."',
							`student_camp_id`='".$scampid[$k]."',
							`student_camp`='".$stduent_camp."',
							`camp_name`='".$camp_name."',
							`camp_start_date`='".$camp_start_date."',
							`camp_end_date`='".$camp_end_date."',
							`camp_preschool`='".$camp_preschool."',
							`student_name`='".$student_firstname."',
							`register_id`='".$register_id."'";	
				
				$query_student_class	=	mysql_query($insert_student_class) or die(mysql_error());
				$camp_open = $this->get_single_field('camp','camp_seat','camp_id',$scampid[$k]);
				$camp_open = $camp_open - 1 ;
				$update = "UPDATE ".Suffix."camp SET `camp_seat`='".$camp_open."' WHERE `camp_id`='".$scampid[$k]."'"; 
				$query_update			=	mysql_query($update) or die(mysql_error());
				
				$k++;
				}
				
				 $price =$this->get_field_dual_field_check('camp_price','price','camp_name','camp','active','yes');
				$psprice = $ps * $this->get_field_dual_field_check('camp_price','price','camp_name','preschool','active','yes');
				if($c == 1){ $cprice = $price;}
				else if($c > 1 ) { 
				$cp =((($c - 1)*$price)*10)/100;
				$cprice =  $c * $price - $cp;
				}
				
				$payment = $payment + $cprice + $psprice;
			
			}
		/**** INSERT PRIVAT ELESSON ***********/
		$privatet = $this->get_all_data('private_class_price','private_class_name','asc');
			  
			foreach($privatet as $value) {
				if($this->escape_string($_POST['register_teacher_'.$this->get_single_field('type','type_use_name','type_id',$value['private_class_name']).'']) != "")			
				{
					$teacher_id = $this->escape_string($_POST['register_teacher_'.$this->get_single_field('type','type_use_name','type_id',$value['private_class_name']).'']);
					$insert_student_lesson	=	"INSERT INTO ".Suffix."student_private_lesson SET
					`student_id`='".$student_id."',
					`lesson_name`='".$this->get_single_field('type','type_use_name','type_id',$value['private_class_name'])."',	
					`lesson_price`='".$value['private_class_price']."',	
					`lesson_id`='".$value['private_class_name']."',				
					`teacher_name`='".$teacher_id."',
					`student_name`='".$student_firstname."',
					`register_id`='".$register_id."'";	
				
				$query_student_lesson	=	mysql_query($insert_student_lesson) or die(mysql_error());
				$payment = $payment + $value['private_class_price'] + $value['private_class_extra_price'];
				
				}			
			}
		
		$update1 = "UPDATE ".Suffix."register SET `total_payment`='".$payment."',`register_payment`='Not Paid' WHERE `register_id`='".$register_id."'";
		$query_personal2			=	mysql_query($update1) or die(mysql_error());
		if($query_personal)
		{
			$this->locate('register_payment'); 
		}
	}
	function contactus()
	{
		$name	=	$this->escape_string($_POST['name']);
		$phone	=	$this->escape_string($_POST['phone']);
		$email	=	$this->escape_string($_POST['email']);
		$message		=	$this->escape_string($_POST['message']);
		
		$insert1 = "Insert INTO ".Suffix."contact SET `contact_name`='".$name."',`contact_phone`='".$phone."',`contact_email`='".$email."',`contact_message`='".$message."' ";
	
		$query_personal			=	mysql_query($insert1) or die(mysql_error());
		$subject1 = "Contact from <".$email.">";
		$headers1 	= "MIME-Version: 1.0" . "\r\n";
		$headers1 	.= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers1 	.= 'From: <no-reply@mytestserver.co.in>' . "\r\n";
		$msg	="<p>This person contact us from our site.Reply them as soon as possible.</p>";  
		$msg	.="<p>Name: ".$name."</p>";
		$msg	.="<p>phone: ".$phone."</p>";
		$msg	.="<p>Email: ".$email."</p>";
		$msg	.="<p>Message: ".$message."</p>";
	
		mail('info@theatreartstulsa.com',$subject1,$msg,$headers1);

		
		$subject = "Thank you for Contact us";
		$headers 		= "MIME-Version: 1.0" . "\r\n";
		$headers 		.= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers 		.= 'From: <no-reply@mytestserver.co.in>' . "\r\n";
		$reply	=	"Thank You to Contact us.We will reply you shortly.";
		
		//$admin_mail	=	$message;
		
		if(mail($email,$subject,$reply,$headers))
		{
			$_SESSION['feedback'] = "Feedback send Seccessfully";
			$this->locate('contact'); 
		}
	}
	
	function one_time_payment()
	{
		$register_id=$_POST['register_id'];
		$data=$this->get_single_result('register','register_id',$register_id) ;
		// By default, this sample code is designed to post to our test server for
		// developer accounts: https://test.authorize.net/gateway/transact.dll
		// for real accounts (even in test mode), please make sure that you are
		// posting to: https://secure.authorize.net/gateway/transact.dll

		$post_url = "https://secure.authorize.net/gateway/transact.dll";

		 //$post_url = "https://test.authorize.net/gateway/transact.dll";

		$post_values = array(
			
			// the API Login ID and Transaction Key must be replaced with valid values
			  "x_login"			=> "5g3mAjVyDa49",
			"x_tran_key"		=> "67938M28Qf6wdLFy",   
			
			/* "x_login"			=> "7euF7zw6gjLq",
			"x_tran_key"		=> "7u533qMkZ7Uwg6j5", */
		 
		 
			"x_version"			=> "3.1",
			"x_delim_data"		=> "TRUE",
			"x_delim_char"		=> "|",
			"x_relay_response"	=> "FALSE",

			"x_type"			=> "AUTH_CAPTURE",
			"x_method"			=> "CC",
			"x_card_num"		=> $_POST['ccnum'],
			"x_exp_date"		=> $_POST['expm']."/".$_POST['expy'],
			"x_card_code"		=> $_POST['cvv'],

			"x_amount"			=> $data['total_payment'],
			"x_description"		=> "Payment",

			"x_first_name"		=> $_POST['bfname'],
			"x_last_name"		=> $_POST['blname'],	
			"x_zip"				=> $_POST['zipcode'],
			"x_address"				=> $_POST['address'],
			"x_state"				=> $_POST['pay_state'],
			"x_city"				=> $_POST['pay_city']		
			 
			// Additional fields can be added here as outlined in the AIM integration
			// guide at: http://developer.authorize.net
		);

		// This section takes the input fields and converts them to the proper format
		// for an http post.  For example: "x_login=username&x_tran_key=a1B2c3D4"
		$post_string = "";
		foreach( $post_values as $key => $value )
			{ $post_string .= "$key=" . urlencode( $value ) . "&"; }
		$post_string = rtrim( $post_string, "& " );



		// This sample code uses the CURL library for php to establish a connection,
		// submit the post, and record the response.
		// If you receive an error, you may want to ensure that you have the curl
		// library enabled in your php configuration
		$request = curl_init($post_url); // initiate curl object
			curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
			curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
			curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
			curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
			$post_response = curl_exec($request); // execute curl post and store results in $post_response
			// additional options may be required depending upon your server configuration
			// you can find documentation on curl options at http://www.php.net/curl_setopt
		curl_close ($request); // close curl object

		// This line takes the response and breaks it into an array using the specified delimiting character
		$response_array = explode($post_values["x_delim_char"],$post_response);

		

		$cctrim=substr($_POST['ccnum'],-4);

		if($response_array[0]=="1"){
			$user_subject	=	'Receipt for payment(Confirmation:'.$response_array[4].')';
			$admin_subject	=	'Student payment paid'; 
			$user_message	=	'<p>Thank you for partnering with us.Your payment is greatly appreciated </p><br/>' ;
			$message		=	'<p>This transaction has been approved.</p>';
			$message		.=	'<p><b>Transaction Detail</b></p><p>Authorization Code:'.$response_array[4].'</p>';
			$message		.=	'<p>Transaction ID:'.$response_array[6].'</p>';		
			$message		.=	'<p><b>Information</b></p><p>Parent Name:'.$data['student_parent_name'].'</p>';
			$message		.=	'<p>Email: '.$data['student_parent_email'].'</p>';		
			$message		.=	'<p><b>Billing Information</b></p><p>Firstname:'.$_POST['bfname'].'</p>';
			$message		.=	'<p>Lastname:'.$_POST['blname'].'</p>';
			$message		.=	'<p>Address:'.$_POST['address'].'</p>';
			$message		.=	'<p>State:'.$_POST['pay_state'].'</p>';
			$message		.=	'<p>City:'.$_POST['pay_city'].'</p>';
			$message		.=	'<p>Zipcode:'.$_POST['zipcode'].'</p>';
			$message		.=	'<p>Amount:$'.$data['total_payment'].'</p>';
			$headers 		= "MIME-Version: 1.0" . "\r\n";
			$headers 		.= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers 		.= 'From: <no-reply@mytestserver.co.in>' . "\r\n";
			$user_mail	=	$user_message.''.$message;
			$admin_mail	=	$message;
			mail('info@theatreartstulsa.com',$admin_subject,$admin_mail,$headers);
			mail($data['student_parent_email'],$user_subject,$user_mail,$headers);
			
			$insert1 = "Insert INTO ".Suffix."onetime_payment SET `user_register_id`='".$register_id."',`firstname`='".$_POST['bfname']."',`lastname`='".$_POST['blname']."',`email`='".$data['student_parent_email']."',`amount`='".$data['total_payment']."',`transaction_id`='".$response_array[6]."',`address`='".$_POST['address']."',`state`='".$_POST['pay_state']."',`city`='".$_POST['pay_city']."',`zip`='".$_POST['zipcode']."',date=now() ";
			$query_personal			=	mysql_query($insert1) or die(mysql_error());
			$tid = mysql_insert_id();
			$now = time();
			$date = date('Y-m-d',$now);
			$exp_date = date('Y-m-d', strtotime("+1 month", $now));
			$insert1 = "Insert INTO ".Suffix."allpayments SET `user_register_id`='".$register_id."',`table_id`='".$tid."',`payment_type`='One Time Payment',`payment`='".$data['total_payment']."',`date`='".$date."',`expiry_date`='".$exp_date."' ";
			$query_personal			=	mysql_query($insert1) or die(mysql_error());
				
			$update1 = "UPDATE ".Suffix."register SET `register_payment`='paid',`payment_type`='One Time Payment' WHERE `register_id`='".$register_id."'";
			$query_personal2			=	mysql_query($update1) or die(mysql_error());
			$headers 		= "MIME-Version: 1.0" . "\r\n";
			$headers 		.= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers 		.= 'From: <no-reply@mytestserver.co.in>' . "\r\n";
			$subject	=	'Username and password for the student parents';
			$message = $_SESSION['message']	;
			
			mail($data['student_parent_email'],$subject,$message,$headers);
			unset($_SESSION['register_id']);
			$this->locate('thank-you'); 
			
		 }
		 
		else {
				$_SESSION['error']='PAYMENT FAIL. '.$response_array[3];
				$this->locate('register_payment');
			
		} 	 				
	}
	
	
	function reccuring_payment()
	{
		$register_id=$_POST['register_id'];
		$data=$this->get_single_result('register','register_id',$register_id) ;
		$payment_method = $this->get_single_result('payment','payment_id','1') ;
		$aa = $payment_method['payment_occurrence'].'months'; 
		
		include ("php_arb_xml/data.php");
		include ("php_arb_xml/authnetfunction.php");
		$content =
        "<?xml version=\"1.0\" encoding=\"utf-8\"?>" .
        "<ARBCreateSubscriptionRequest xmlns=\"AnetApi/xml/v1/schema/AnetApiSchema.xsd\">" .
        "<merchantAuthentication>".
        "<name>" . $loginname . "</name>".
        "<transactionKey>" . $transactionkey . "</transactionKey>".
        "</merchantAuthentication>".
		"<refId></refId>".
        "<subscription>".
        "<name> Attend classes </name>".
        "<paymentSchedule>".
        "<interval>".
        "<length>". $payment_method['payment_length'] ."</length>".
        "<unit>". $payment_method['payment_unit'] ."</unit>".
        "</interval>".
        "<startDate>" . date('Y-m-d') . "</startDate>".
        "<totalOccurrences>". $payment_method['payment_occurrence'] . "</totalOccurrences>".        
        "</paymentSchedule>".
        "<amount>". $data['total_payment'] ."</amount>".       
        "<payment>".
        "<creditCard>".
        "<cardNumber>" . $_POST['ccnum'] . "</cardNumber>".
        "<expirationDate>" . $_POST['expy'].'-'.$_POST['expm'] . "</expirationDate>".
        "<cardCode>" . $_POST['cvv'] . "</cardCode>".
        "</creditCard>".
        "</payment>".
        "<billTo>".
        "<firstName>". $_POST['bfname'] . "</firstName>".
        "<lastName>" . $_POST['blname'] . "</lastName>".
        "<address>" . $_POST['address'] . "</address>".
		 "<city>" . $_POST['pay_city'] . "</city>".
        "<state>" . $_POST['pay_state'] . "</state>".
		 "<zip>" . $_POST['zipcode'] . "</zip>".              
        "</billTo>".
        "</subscription>".
        "</ARBCreateSubscriptionRequest>";

		//send the xml via curl
		$response = send_request_via_curl($host,$path,$content);
		//if curl is unavilable you can try using fsockopen
		/*
		$response = send_request_via_fsockopen($host,$path,$content);
		*/


		//if the connection and send worked $response holds the return from Authorize.net
		if ($response)
		{	
			
				/*
			a number of xml functions exist to parse xml results, but they may or may not be avilable on your system
			please explore using SimpleXML in php 5 or xml parsing functions using the expat library
			in php 4
			parse_return is a function that shows how you can parse though the xml return if these other options are not avilable to you
			*/
			list ($refId, $resultCode, $code, $text, $subscriptionId) =parse_return($response);
			if($resultCode=='Ok'){
				$user_subject	=	'Receipt for payment(subscription:'.$subscriptionId.')';
				$admin_subject	=	'Student payment paid'; 
				$user_message	=	'<p>Thank you for partnering with us.Your payment is greatly appreciated </p><br/>' ;
				$message		=	'<p>This transaction has been approved.</p>';
				$message		.=	'<p><b>Transaction Detail</b></p>';
				$message		.=	'<p>Subscription ID:'.$subscriptionId.'</p>';		
				//$message		.=	'<p>Student Name:'.$_POST['student_name'].'</p>';
				//$message		.=	'<p>Grade next year:'.$_POST['grade'].'</p>';
				$message		.=	'<p><b>Information</b></p><p>Parent Name:'.$data['student_parent_name'].'</p>';
				$message		.=	'<p>Email: '.$data['student_parent_email'].'</p>';		
				$message		.=	'<p><b>Billing Information</b></p><p>Firstname:'.$_POST['bfname'].'</p>';
				$message		.=	'<p>Lastname:'.$_POST['blname'].'</p>';
				$message		.=	'<p>Address:'.$_POST['address'].'</p>';
				$message		.=	'<p>State:'.$_POST['pay_state'].'</p>';
				$message		.=	'<p>City:'.$_POST['pay_city'].'</p>';
				$message		.=	'<p>Zipcode:'.$_POST['zipcode'].'</p>';
				$message		.=	'<p>Amount:$'.$data['total_payment'].'</p>';
				$headers 		= "MIME-Version: 1.0" . "\r\n";
				$headers 		.= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers 		.= 'From: <no-reply@mytestserver.co.in>' . "\r\n";
				$user_mail	=	$user_message.''.$message;
				$admin_mail	=	$message;
				mail('info@theatreartstulsa.com',$admin_subject,$admin_mail,$headers);
				mail($data['student_parent_email'],$user_subject,$user_mail,$headers);
				
				$insert1 = "Insert INTO ".Suffix."reccuring_payment SET `user_register_id`='".$register_id."',`firstname`='".$_POST['bfname']."',`lastname`='".$_POST['blname']."',`email`='".$data['student_parent_email']."',`amount`='".$data['total_payment']."',`subscription_id`='".$subscriptionId."',`address`='".$_POST['address']."',`state`='".$_POST['pay_state']."',`city`='".$_POST['pay_city']."',`zip`='".$_POST['zipcode']."',date=now() ";
				$query_personal			=	mysql_query($insert1) or die(mysql_error());
				$tid = mysql_insert_id();
				$now = time();
				$date = date('Y-m-d',$now);
				$exp_date = date('Y-m-d', strtotime("+".$aa."", $now));
				$insert1 = "Insert INTO ".Suffix."allpayments SET `user_register_id`='".$register_id."',`table_id`='".$tid."',`payment_type`='Reoccurring Payment',`payment`='".$data['total_payment']."',`date`='".$date."',`expiry_date`='".$exp_date."' ";
				$query_personal			=	mysql_query($insert1) or die(mysql_error());
				
				$update1 = "UPDATE ".Suffix."register SET `register_payment`='paid',`payment_type`='Reoccurring Payment' WHERE `register_id`='".$register_id."'";
				$query_personal2			=	mysql_query($update1) or die(mysql_error());
				$headers 		= "MIME-Version: 1.0" . "\r\n";
				$headers 		.= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers 		.= 'From: <no-reply@mytestserver.co.in>' . "\r\n";
				$subject	=	'Username and password for the student parents';
				$message = $_SESSION['message']	;
				
				mail($data['student_parent_email'],$subject,$message,$headers);
				unset($_SESSION['register_id']);
				$this->locate('thank-you');
				
				
			}
			else {
				$_SESSION['error']='PAYMENT FAIL.Error : ('.$code.')'.$text;
				$this->locate('register_payment'); 
				
			}
		}
		else{
			$_SESSION['error']='Transaction FAILED. '.$text;
			$this->locate('register_payment'); 
		}
		
	}
	function pay_at_studio()
	{
		$register_id=$_POST['register_id'];
		$update1 = "UPDATE ".Suffix."register SET `payment_type`='Pay At Studio' WHERE `register_id`='".$register_id."'";
		$query_personal2	=	mysql_query($update1) or die(mysql_error());
			$headers 		= "MIME-Version: 1.0" . "\r\n";
			$headers 		.= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers 		.= 'From: <no-reply@mytestserver.co.in>' . "\r\n";
			$subject	=	'Username and password for the student parents';
			$message = $_SESSION['message']	;
			$data=$this->get_single_result('register','register_id',$register_id) ;
			mail($data['student_parent_email'],$subject,$message,$headers);
		if($query_personal2)
		{
			unset($_SESSION['register_id']);
			$this->locate('thank-you'); 
		}
	}
	function user_payment()
	{
		$register_id=$_POST['register_id'];
		$data=$this->get_single_result('register','register_id',$register_id) ;

		 $post_url = "https://secure.authorize.net/gateway/transact.dll";

		 //$post_url = "https://test.authorize.net/gateway/transact.dll";

		$post_values = array(
			
			// the API Login ID and Transaction Key must be replaced with valid values
			  "x_login"			=> "5g3mAjVyDa49",
			"x_tran_key"		=> "67938M28Qf6wdLFy",   
			
			/* "x_login"			=> "7euF7zw6gjLq",
			"x_tran_key"		=> "7u533qMkZ7Uwg6j5", */
		 
		 
			"x_version"			=> "3.1",
			"x_delim_data"		=> "TRUE",
			"x_delim_char"		=> "|",
			"x_relay_response"	=> "FALSE",

			"x_type"			=> "AUTH_CAPTURE",
			"x_method"			=> "CC",
			"x_card_num"		=> $_POST['ccnum'],
			"x_exp_date"		=> $_POST['expm']."/".$_POST['expy'],
			"x_card_code"		=> $_POST['cvv'],

			"x_amount"			=> $data['total_payment'],
			"x_description"		=> "Payment",

			"x_first_name"		=> $_POST['bfname'],
			"x_last_name"		=> $_POST['blname'],	
			"x_zip"				=> $_POST['zipcode'],
			"x_address"				=> $_POST['address'],
			"x_state"				=> $_POST['pay_state'],
			"x_city"				=> $_POST['pay_city']		
			 
			// Additional fields can be added here as outlined in the AIM integration
			// guide at: http://developer.authorize.net
		);

		// This section takes the input fields and converts them to the proper format
		// for an http post.  For example: "x_login=username&x_tran_key=a1B2c3D4"
		$post_string = "";
		foreach( $post_values as $key => $value )
			{ $post_string .= "$key=" . urlencode( $value ) . "&"; }
		$post_string = rtrim( $post_string, "& " );



		// This sample code uses the CURL library for php to establish a connection,
		// submit the post, and record the response.
		// If you receive an error, you may want to ensure that you have the curl
		// library enabled in your php configuration
		$request = curl_init($post_url); // initiate curl object
			curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
			curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
			curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
			curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
			$post_response = curl_exec($request); // execute curl post and store results in $post_response
			// additional options may be required depending upon your server configuration
			// you can find documentation on curl options at http://www.php.net/curl_setopt
		curl_close ($request); // close curl object

		// This line takes the response and breaks it into an array using the specified delimiting character
		$response_array = explode($post_values["x_delim_char"],$post_response);

		

		$cctrim=substr($_POST['ccnum'],-4); 

		if($response_array[0]=="1"){
			$user_subject	=	'Receipt for payment(Confirmation:'.$response_array[4].')';
			$admin_subject	=	'Student payment paid for next month'; 
			$user_message	=	'<p>Thank you for partnering with us.Your payment is paid for next month </p><br/>' ;
			$message		=	'<p>This transaction has been approved.</p>';
			$message		.=	'<p><b>Transaction Detail</b></p><p>Authorization Code:'.$response_array[4].'</p>';
			$message		.=	'<p>Transaction ID:'.$response_array[6].'</p>';		
			$message		.=	'<p><b>Information</b></p><p>Parent Name:'.$data['student_parent_name'].'</p>';
			$message		.=	'<p>Email: '.$data['student_parent_email'].'</p>';		
			$message		.=	'<p><b>Billing Information</b></p><p>Firstname:'.$_POST['bfname'].'</p>';
			$message		.=	'<p>Lastname:'.$_POST['blname'].'</p>';
			$message		.=	'<p>Address:'.$_POST['address'].'</p>';
			$message		.=	'<p>State:'.$_POST['pay_state'].'</p>';
			$message		.=	'<p>City:'.$_POST['pay_city'].'</p>';
			$message		.=	'<p>Zipcode:'.$_POST['zipcode'].'</p>';
			$message		.=	'<p>Amount:$'.$data['total_payment'].'</p>';
			$headers 		= "MIME-Version: 1.0" . "\r\n";
			$headers 		.= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers 		.= 'From: <no-reply@mytestserver.co.in>' . "\r\n";
			$user_mail	=	$user_message.''.$message;
			$admin_mail	=	$message;
			mail('info@theatreartstulsa.com',$admin_subject,$admin_mail,$headers);
			mail($data['student_parent_email'],$user_subject,$user_mail,$headers);
			
			$insert1 = "Insert INTO ".Suffix."onetime_payment SET `user_register_id`='".$register_id."',`firstname`='".$_POST['bfname']."',`lastname`='".$_POST['blname']."',`email`='".$data['student_parent_email']."',`amount`='".$data['total_payment']."',`transaction_id`='".$response_array[6]."',`address`='".$_POST['address']."',`state`='".$_POST['pay_state']."',`city`='".$_POST['pay_city']."',`zip`='".$_POST['zipcode']."',date=now() ";
			$query_personal			=	mysql_query($insert1) or die(mysql_error());
			$tid = mysql_insert_id();
			$now = time();
			$date = date('Y-m-d',$now);
			$exdate = $this->get_single_field('allpayments','MAX(expiry_date)','user_register_id',$_SESSION['login']);
			$exp_date =  strtotime("+1 month",strtotime($exdate));

			$exp_date =  date("Y-m-d",$exp_date);
			/* echo $exp_date =  date('Y-m-d',strtotime("+1month",$exdate)); */
			$insert1 = "Insert INTO ".Suffix."allpayments SET `user_register_id`='".$register_id."',`table_id`='".$tid."',`payment_type`='One Time Payment',`payment`='".$data['total_payment']."',`date`='".$date."',`expiry_date`='".$exp_date."' ";
			$query_personal			=	mysql_query($insert1) or die(mysql_error());
				
			 $update1 = "UPDATE ".Suffix."register SET `register_payment`='paid',`payment_type`='One Time Payment' WHERE `register_id`='".$register_id."'";
			$query_personal2			=	mysql_query($update1) or die(mysql_error()); 
			/* $headers 		= "MIME-Version: 1.0" . "\r\n";
			$headers 		.= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers 		.= 'From: <no-reply@mytestserver.co.in>' . "\r\n";
			$subject	=	'Username and password for the student parents';
			$message = $_SESSION['message']	;
			
			mail($data['student_parent_email'],$subject,$message,$headers); */
			$_SESSION['success'] = "Thank You for your payment";
			$this->locate('payment'); 
			
		 }
		 
		else {
				$_SESSION['error']='PAYMENT FAIL. '.$response_array[3];
				$this->locate('payment');
			
		} 
	}
	
}

?>