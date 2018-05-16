<?php
include 'lib/util.php';
$name  = $_POST["mo-usr"];
$email = $_POST["mo-email"];
$tel   = $_POST["mo-mob"];
$opt = $_POST["mo-opt"];


$pieces = explode("|", $opt);
$type = $pieces[0];
$cost = $pieces[1];

  session_start();
$_SESSION["payment"]['amount'] = $cost;
$_SESSION["payment"]['email'] = $email;
$_SESSION["payment"]['phone'] = $tel;
$_SESSION["payment"]['productinfo'] = "Monthly Subscription for the Type ".$type;



$userId = register($name, $email, $tel, $type,"monthly");
if($userId==NULL) {
	 $newURL = "../index.php?code=2";
	  header('Location: ' . $newURL);
}
$_SESSION["payment"]['firstname'] = $userId;
sentConfirmation($userId, $email, $name,$message);

$newURL = "./lib/PaymentUtil.php";
        header('Location: ' . $newURL);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

