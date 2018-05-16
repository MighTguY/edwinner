<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function getDBConnection() {
$db = parse_ini_file("config/database.ini");
#$db["host"] = "localhost";
#$db["user"] = "root";
#$db["pass"] = "root";
#$db["dbname"] = "edwinner";


$type="local";
$conn  =  mysqli_connect($db["host"],$db["user"] , $db["pass"], $db["dbname"]);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
return $conn;
}




