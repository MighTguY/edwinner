<?php
include 'lib/util.php';
print_r($_POST);
$name  = $_POST["yr-usr"];
$email = $_POST["yr-email"];
$tel   = $_POST["yr-mob"];
$type = $_POST["yr-opt"];


$userId = register($name, $email, $tel, $type,"yearly");
echo $userId;
sentConfirmation($userId, $email, $name,$message);
  $newURL = "../index.php?code=3";
        header('Location: ' . $newURL);

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

