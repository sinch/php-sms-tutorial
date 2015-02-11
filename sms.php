<?php
$key = "your_app_key";
$secret = "your_app_secret";

$user = "application\\" . $key . ":" . $secret;
$message = array("message"=>"Test");
$data = json_encode($message);
$ch = curl_init('https://messagingapi.sinch.com/v1/sms/+16507141052');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_USERPWD,$user);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

$result = curl_exec($ch);

if(curl_errno($ch)) {
	echo 'Curl error: ' . curl_error($ch);
} else {
	echo $result;
}

curl_close($ch);

?>