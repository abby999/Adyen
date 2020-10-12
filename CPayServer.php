<?php
session_start();
$billingToken = 	$_POST['paymentID'];
	$data = '{
  "amount":{
    "currency":"USD",
    "value":100000
  },
  "reference":"1",
  "paymentMethod":' .  $billingToken . ',
  "returnUrl":"www.apple.com",
  "merchantAccount":"PayPal496ECOM"
}'; 
$ch = curl_init("https://checkout-test.adyen.com/v64/payments");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	"Content-Type: application/json",  
	"Authorization: AQEkhmfuXNWTK0Qc+iSAk30IpujPEd1xnb5HPIwXwd4lOw9pdYbbEMFdWw2+5HzctViMSCJMYAc=-mSbKYlqWHqGH+EDxmmxbwGxP2mT1xDwz009TC44niDE=-k]b7vGgnVIEVJa(G",
  "Content-length: ".strlen($data))
);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
//curl_setopt($ch,CURLOPT_USERPWD, "PN02918_949804a73f9e:LxiYUzdcejs4n8VS");
$response1 = curl_exec($ch);
curl_close($ch);
$op = json_decode($response1,true);
echo($response1);
//echo($billingToken);
?>
