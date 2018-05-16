<?php
include 'lib/RegisterUser.php';

$name  = $_POST["yr-usr"];
$email = $_POST["yr-email"];
$tel   = $_POST["yr-mob"];
$opt = $_POST["yr-opt"];

$pieces = explode("|", $opt);
$type = $pieces[0];
$cost = $pieces[1];
$id = $pieces[2];

if(name!=NULL) {
    registerFromMain($name,$email,$cost,$tel,$id,"Yearly");
} else {
     $newURL = "../index.php?code=1";
            header('Location: ' . $newURL);
}


#  $newURL = "../index.php?code=3";
#        header('Location: ' . $newURL);
#
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

