<?php
include 'Constants.php';

$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$uid = $_POST["lastname"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$salt="yIEkykqEH3";

If (isset($_POST["additionalCharges"])) {
	$additionalCharges=$_POST["additionalCharges"];
	$retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

}
else {   

	$retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

}
$hash = hash("sha512", $retHashSeq);

if ($hash != $posted_hash) {
	echo "Invalid Transaction. Please try again";
}
else {

	echo "<h3>Your order status is ". $status .".</h3>";
	echo "<h4>Your transaction id for this transaction is ".$txnid.". You may try making the payment by clicking the link below.</h4>";

} 

$url = API."/payment_unsub/".$firstname;
$curl = curl_init();
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => $url,
			CURLOPT_USERAGENT => 'Codular Sample cURL Request'
			));
$newURL = "../../index.php?code=4";
// Send the request & save response to $resp
$resp = curl_exec($curl);
// Close request to clear up some resources
curl_close($curl);
header('Refresh: 5; url=' . $newURL);
?>
<!--Please enter your website homepagge URL -->
