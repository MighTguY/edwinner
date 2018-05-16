<?php
include 'lib/util.php';
$id = $_POST["id"];
$password = $_POST["pass"];

print_r(changePassword($id,$password));
$newURL = "../changepassword.php";
  header('Location: ' . $newURL);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

