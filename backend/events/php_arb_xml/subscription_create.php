<?php

/****NOTE***
Please download the PHP SDK available at https://developer.authorize.net/downloads/ for more current code.
*/

/*
D I S C L A I M E R                                                                                          
WARNING: ANY USE BY YOU OF THE SAMPLE CODE PROVIDED IS AT YOUR OWN RISK.                                                                                   
Authorize.Net provides this code "as is" without warranty of any kind, either express or implied, including but not limited to the implied warranties of merchantability and/or fitness for a particular purpose.   
Authorize.Net owns and retains all right, title and interest in and to the Automated Recurring Billing intellectual property.
*/

include ("data.php");
include ("authnetfunction.php");

//define variables to send
$amount = rand(1,100);
$name = 'tets';
$length = '1';
$unit = 'months';
$startDate = "2015-05-05";
$totalOccurrences = '3';
$ccv = "123";
$cardNumber = "6011000000000012";
$expirationDate =  "2018-10";
$firstName =  "johxxn";
$lastName =  "doexx";


echo "Results <br><br>";

//build xml to post
$content =
        "<?xml version=\"1.0\" encoding=\"utf-8\"?>" .
        "<ARBCreateSubscriptionRequest xmlns=\"AnetApi/xml/v1/schema/AnetApiSchema.xsd\">" .
        "<merchantAuthentication>".
        "<name>" . $loginname . "</name>".
        "<transactionKey>" . $transactionkey . "</transactionKey>".
        "</merchantAuthentication>".
		"<refId>" . $refId . "</refId>".
        "<subscription>".
        "<name>" . $name . "</name>".
        "<paymentSchedule>".
        "<interval>".
        "<length>". $length ."</length>".
        "<unit>". $unit ."</unit>".
        "</interval>".
        "<startDate>" . $startDate . "</startDate>".
        "<totalOccurrences>". $totalOccurrences . "</totalOccurrences>".        
        "</paymentSchedule>".
        "<amount>". $amount ."</amount>".       
        "<payment>".
        "<creditCard>".
        "<cardNumber>" . $cardNumber . "</cardNumber>".
        "<expirationDate>" . $expirationDate . "</expirationDate>".
        "<cardCode>" . $ccv . "</cardCode>".
        "</creditCard>".
        "</payment>".
        "<billTo>".
        "<firstName>". $firstName . "</firstName>".
        "<lastName>" . $lastName . "</lastName>".
        "<address>address</address>".
		 "<city>zip</city>".
        "<state>state</state>".
		 "<zip>34423</zip>".
        "<country>country</country>".       
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

	
	echo " Response Code: $resultCode <br>";
	echo " Response Reason Code: $code<br>";
	echo " Response Text: $text<br>";
	echo " Reference Id: $refId<br>";
	echo " Subscription Id: $subscriptionId <br><br>";
	echo " Data has been written to data.log<br><br>";
	echo $loginname;
	echo "<br />";
	echo $transactionkey;
	echo "<br />";
  
  echo "amount:";
  echo $amount;
  echo "<br \>";
  
  echo "refId:";
  echo $refId;
  echo "<br \>";
  
  echo "name:";
  echo $name;
  echo "<br \>";
  
  echo "amount: ";
  echo $HTTP_POST_VARS[amount];
  echo "<br \>";
  echo "<br \>";
  echo $content;
  echo "<br \>";
  echo "<br \>";
	
$fp = fopen('data.log', "a");
fwrite($fp, "$refId\r\n");
fwrite($fp, "$subscriptionId\r\n");
fwrite($fp, "$amount\r\n");
fclose($fp);

	
}
else
{
	echo "Transaction Failed. <br>";
}
?>

