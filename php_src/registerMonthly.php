<?php
include 'lib/RegisterUser.php';
$name  = $_POST["mo-usr"];
$email = $_POST["mo-email"];
$tel   = $_POST["mo-mob"];
$opt = $_POST["mo-opt"];


$pieces = explode("|", $opt);
$type = $pieces[0];
$cost = $pieces[1];
$id = $pieces[2];

if(name!=NULL) {
   registerFromMain($name,$email,$cost,$tel,$id,"Monthly");
} else {
     $newURL = "../index.php?code=1";
            header('Location: ' . $newURL);
}
 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

