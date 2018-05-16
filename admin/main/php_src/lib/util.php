<?php
include 'DbUtil.php';

function register($name, $email, $tel, $type,$sub) {
    $conn = getDBConnection();
    if(checkUserExist($email, $conn)) {
     $newURL = "../index.php?code=2";
     header('Location: '.$newURL);
 }
 $sql = "INSERT INTO USER (NAME, EMAIL, TEL, TYPE, Subscription) values ('" . $name . "', '" . $email . "', '" . $tel . "', '" . $type . "','".$sub."')";
 if ($conn->query($sql) === TRUE) {
    $userId = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $userId;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
return $userId;
}

function checkUserExist($email,$conn) {
    $sql = "SELCT count(*) from USER where EMAIL='".$email."'";
    if ($result = $conn->query($sql)) {

        /* determine number of rows result set */
        $row_cnt = $result->num_rows;



        /* close result set */
        $result->close();
        return true;
    }
    return false;
}
function sentConfirmation($userId, $email, $name,$message) {
 
}

function getMessage($errorCode) {
    if($errorCode == "2") {
        return "Email Id Already Registered!  Please drop us mail at goku0910@gmail.com for the support";
    }
    
    if($errorCode == "1") {
        return "Internal Error! Please drop us mail at goku0910@gmail.com for the support";
    }
    
    if($errorCode == "3") {
        return "You are subscribed! Will verify your payment and let you know on your contact EMAIL";
    }
}

function getCostArray() {
   $conn = getDBConnection();
   $sql = "select NAME, COST, COST_DO from PACKAGE_INFO where TYPE='monthly'"; 
   $sql1 = "select NAME, COST,COST_DO from PACKAGE_INFO where TYPE='yearly'";
   $return=array();
   if ($resultObj = $conn->query($sql)) {
    while ($result = $resultObj->fetch_array(MYSQLI_ASSOC)) {
        $name = $result["NAME"];
        $cost = $result["COST"];
        $costDo = $result["COST_DO"];
        $return["monthly"][$name] = array("double"=>$costDo,"str"=>$cost); 
    }
}

if ($resultObj = $conn->query($sql1)) {
    while($result = $resultObj->fetch_array(MYSQLI_ASSOC)) {
        $name = $result["NAME"];
        $cost = $result["COST"];
        $costDo = $result["COST_DO"];
        $return["yearly"][$name] = array("double"=>$costDo,"str"=>$cost); 
    }
}

return $return;


}


function validateUsr($user, $password,$role) {
    $conn = getDBConnection();
    $sql = "select id From user_info where email='".$user."' and password = '".$password."' and role=".$role." and isValid=1"; 
   //echo $sql; die;
    $id = -1;
    if ($resultObj = $conn->query($sql)) {
        $result = $resultObj->fetch_array(MYSQLI_ASSOC);
        $id = $result["id"];
        
    }
    return $id;

}

function getUSER($userId) {
    //$server = parse_ini_file("../../config/server.ini");
    $server["api"] = "http://edwinner.com:8080/api/v1";
    $user = json_decode(file_get_contents($server["api"]."/get/user/".$userId),true);
    return $user;
}

function getUSERS() {
    //$server = parse_ini_file("../../config/server.ini");
    $server["api"] = "http://edwinner.com:8080/api/v1";
    $user = json_decode(file_get_contents($server["api"]."/get/users"),true);

    return $user;
}

function getStats() {
    //$server = parse_ini_file("../../config/server.ini");
    $server["api"] = "http://edwinner.com:8080/api/v1";
    $stats = json_decode(file_get_contents($server["api"]."/stats"),true);

    return $stats;
}


function update($handle,$data) {
    $server["api"] = "http://edwinner.com:8080/api/v1";
    $url = $server["api"]."/".$handle;
    $jsonData = json_encode($data);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    $result = curl_exec($ch);
    return $result;
}

function getWords() {
    $server["api"] = "http://edwinner.com:8080/api/v1";
    $words = json_decode(file_get_contents($server["api"]."/get/words"),true);

    return $words;
}

function getExtraWords() {
        $server["api"] = "http://edwinner.com:8080/api/v1";
    $words = json_decode(file_get_contents($server["api"]."/get/extrawords"),true);

    return $words;
}

function getWord($wordId) {
 $server["api"] = "http://edwinner.com:8080/api/v1";
 $word = json_decode(file_get_contents($server["api"]."/get/word/".$wordId),true);
 return $word;
}

function getExWord($wordId) {
 $server["api"] = "http://edwinner.com:8080/api/v1";
 $word = json_decode(file_get_contents($server["api"]."/get/extraword/".$wordId),true);
 return $word;
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

