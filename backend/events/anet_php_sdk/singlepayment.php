<?php
ob_start();
session_start();
error_reporting(E_ALL);
include('AuthorizeNet.php'); 
/* echo '<pre>';
print_R($_REQUEST);
echo '</pre>';
die; */
/* $cardNumber		 =  '4111111111111111';//$_REQUEST['x_card_num'];
$amount			 =  '20';//$_REQUEST['x_amount'];
$date			 =  //$_REQUEST['x_exp_date'];
$mm				=	03;//substr($date,0,2);
$year			=	16;//substr($date,2,4); */
//$invoice		=	$_REQUEST['item_number'];
//$item_name		=	$_REQUEST['item_name'];
//$array["item_number"] = $invoice;
//$array["item_name"] =$item_name;
$email	=	'kamal@vtaurus.com';//$_REQUEST['x_email'];
//$item_name	=	$_REQUEST['item_name'];
//$x_company	=	$_REQUEST['x_company'];
/*  define("AUTHORIZENET_API_LOGIN_ID", "8M82hrfrB3"); 
 define("AUTHORIZENET_TRANSACTION_KEY", "5rw5y63rCwX7nR6x");  */
 $subscription = new AuthorizeNet_Subscription;
        $subscription->name = "Short subscription";
        $subscription->intervalLength = "1";
        $subscription->intervalUnit = "months";
        $subscription->startDate = "2015-04-02";
        $subscription->totalOccurrences = "14";
        $subscription->amount = rand(1,100);
        $subscription->creditCardCardNumber = "6011000000000012";
        $subscription->creditCardExpirationDate = "2018-10";
        $subscription->creditCardCardCode = "123";
        $subscription->billToFirstName = "john";
        $subscription->billToLastName = "doe"; 
 //$subscription->orderDescription = "";
      //  $subscription->customerId = "12";
      //  $subscription->customerEmail = "kamal@vtaurus.com";
      //  $subscription->customerPhoneNumber = "3442";
        //$subscription->customerFaxNumber = "43441244";
       // $subscription->billToFirstName = "ewrr";
       // $subscription->billToLastName = "fer";
        /*$subscription->billToCompany = "fff";
        $subscription->billToAddress = "add";
        $subscription->billToCity = "city";
        $subscription->billToState = "state";
        $subscription->billToZip = "222";
        $subscription->billToCountry = "us";
        $subscription->shipToFirstName = "";
        $subscription->shipToLastName = "";
        $subscription->shipToCompany = "";
        $subscription->shipToAddress = "";
        $subscription->shipToCity = "";
        $subscription->shipToState = "";
        $subscription->shipToZip = "";
        $subscription->shipToCountry = ""; */
 $request = new AuthorizeNetARB('8M82hrfrB3','5rw5y63rCwX7nR6x'); 

  print_R($subscription);
  
  print_R($request);
 $response = $request->createSubscription($subscription);
 
 echo '<pre>';
	print_R($response);
	echo '</pre>';
	die;
 $subscription_id = $response->getSubscriptionId();
 $resultcode = $response->getResultCode();
	
echo $msg= $response->xml->messages->message->text;




echo $_SESSION['ERROR_single']	=	$msg;
//header('location:http://mytestserver.co.in/events/');
?>