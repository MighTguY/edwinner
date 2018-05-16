<?php
include 'lib/util.php';
print_r($_POST);
$name  = $_POST["yr-usr"];
$email = $_POST["yr-email"];
$tel   = $_POST["yr-mob"];
$opt = $_POST["yr-opt"];

$pieces = explode("|", $opt);
$type = $pieces[0];
$cost = $pieces[1];



  session_start();
$_SESSION["payment"]['amount'] = $cost;
$_SESSION["payment"]['firstname'] = $name;
$_SESSION["payment"]['email'] = $email;
$_SESSION["payment"]['phone'] = $tel;
$_SESSION["payment"]['productinfo'] = "Yearly Subscription for the Type ".$type;


$user = register($name, $email, $tel, $type,"yearly");
$userId = $user["userData"]["userId"];
$_SESSION["payment"]['firstname'] = $userId;
if($user==NULL) {
	 $newURL = "../index.php?code=2";
	  header('Location: ' . $newURL);
}
sentConfirmation($userId, $email, $name,$message);
$newURL = "./lib/PaymentUtil.php";
        header('Location: ' . $newURL);
#  $newURL = "../index.php?code=3";
#        header('Location: ' . $newURL);
#
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

