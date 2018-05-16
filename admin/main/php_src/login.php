<?php
include 'lib/util.php';

$email = $_POST["email"];
$password = $_POST["password"];

$userId = validateUsr($email,$password,2);

if($userId != "-1" && $userId != NULL) {

	session_start();
	unset($_SESSION["home"]);
   $newURL = "../index.php";
   $_SESSION['home']['user'] = getUSER($userId);

}
else {
	print "here1";
	$newURL = "../login.html?error=2";
	unset($_SESSION["home"]);
	session_destroy();
}


  header('Location: ' . $newURL);
?>
