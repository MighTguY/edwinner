<?php
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$salt="qpEK3Buvdq";

If (isset($_POST["additionalCharges"])) {
	$additionalCharges=$_POST["additionalCharges"];
	$retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

}
else {   

	$retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

}
$hash = hash("sha512", $retHashSeq);

if ($hash != $posted_hash) {
	echo "Invalid Transaction. Please contact admin at goku0910@gmail.com";
	$newURL = "../index.php?code=2";
}
else {

	echo "<h3>Thank You. Your order status is ". $status .".</h3>";
	echo "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>";
	echo "<h4>We have received a payment of Rs. " . $amount . ". Your order will soon be shipped.</h4>";
	$newURL = "../../index.php?code=3";

}         
$url = "http://edwinner.com:8080/api/v1/payment_sub/".$firstname;
$curl = curl_init();
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => $url,
			CURLOPT_USERAGENT => 'Codular Sample cURL Request'
			));
// Send the request & save response to $resp
$resp = curl_exec($curl);
// Close request to clear up some resources
curl_close($curl);
header('Refresh: 1; url=' . $newURL);
?>
