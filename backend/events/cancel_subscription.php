<?php include 'inc/index_header.php';
if(!isset($_SESSION['login']))
			{
				$obj->locate('login');			
			}
	$register_id = $_SESSION['login'];
		$result =$obj->get_single_result('register','register_id',$register_id);
		$result1 =$obj->get_single_result('reccuring_payment','user_register_id',$register_id);
		
		$insert1 = "Insert INTO ".Suffix."cancel_subscription SET `user_register_id`='".$register_id."',`user_email`='".$result['student_parent_email']."',`subscription_id`='".$result1['subscription_id']."',date=now() ";
			$query_personal			=	mysql_query($insert1) or die(mysql_error());
		$headers 		= "MIME-Version: 1.0" . "\r\n";
			$headers 		.= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers 		.= 'From: <no-reply@mytestserver.co.in>' . "\r\n";
			$subject	=	'Cancel subscription of the customer for reoccurring payment<from : '.$result['student_parent_email'].'>';
			$message = '<p>Hello admin,</p>'	;
			$message .= '<p>My email is '.$result['student_parent_email'].'</p>'	;
			$message .= '<p>Please cancel my reoccurring payment subscription</p>'	;
			$message .= '<p>My subscription id is '.$result1['subscription_id'].'</p>'	;
			
			
			if(mail('kamal@vtaurus.com',$subject,$message,$headers))
{
		$_SESSION['success'] = "Your Request is in process.We will inform you via email when your request is completed.";
		$obj->locate('payment');	
}			



?>