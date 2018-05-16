<?php

include 'DbUtil.php';
include 'MailUtil.php';
include 'Constants.php';

function register($name, $email, $tel, $type, $sub) {
    $server["api"] = API;
    $data = checkUserExist($email);
    if ($data != NULL) {
        $data["REGISTERED"]=1;
        return $data;
    }
    $days = $sub == "monthly" ? 30 : 365;

    $user = getUserArray();

    $user["userInfo"]["id"] = "";
    $user["userInfo"]["role"] = $type;
    $user["userInfo"]["isValid"] = 1;
    $user["userInfo"]["name"] = $name;
    $user["userInfo"]["email"] = $email;
    $user["userInfo"]["mobile"] = $tel;
    $user["userInfo"]["password"] = "qwerty";
    $user["userInfo"]["createdDate"] = date("Y-m-d");

    $user["userSubscription"]["id"] = "";
    $user["userSubscription"]["emailConfirmation"] = 0;
    $user["userSubscription"]["paymentConfirmation"] = 0;
    $user["userSubscription"]["active"] = 0;
    $user["userSubscription"]["userId"] = "";


    $user["userData"]["id"] = "";
    $user["userData"]["userId"] = "";
    $user["userData"]["role"] = $type;
    $user["userData"]["checkPoint"] = 0;
    $user["userData"]["subscriptionType"] = $sub;
    $user["userData"]["startDate"] = date(Y - m - d);
    $user["userData"]["endDate"] = $sub == "monthly" ? date('Y-m-d', strtotime("+30 days")) : date('Y-m-d', strtotime("+365 days"));
    $user["userData"]["daysToSend"] = $days;
    $user["userData"]["daysLeft"] = 0;


    $addUser = update("/add/user", $user);
    $addUser = json_decode($addUser, true);
    $addUser["REGISTERED"]=0;
    //    return $addUser["userData"]["userId"];
    return $addUser;
}

function checkUserExist($email) {
    $handle = "/get/user?email=".$email;
    $user = getData($handle);
    return $user;
}

function sentConfirmation($userId, $email, $name, $message) {

    $server["api"] = API;
    $unSubURL = $server["api"] . "/unsub/" . $userId;
    $hash = sha1($userId);
    $subURL = $server["api"] . "/sub/" . $userId . "?hash=" . $hash;
    $conn = getDBConnection();
    $sql = "INSERT INTO MAIL_CONFIRM  values ('" . $userId . "', '" . $hash . "')";
    if ($conn->query($sql) === TRUE) {
        $userId = $conn->insert_id;
        echo "New record created successfully. Last inserted ID is: " . $userId;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $mail = file_get_contents("verify-email.html");
    $mail = str_replace("[USER]", $name, $mail);
    $mail = str_replace("[USER_SUB_URL]", $subURL, $mail);
    $mail = str_replace("[WEB_URL]", "www.edwinner.com", $mail);
    $mail = str_replace("[USER_UNSUB_URL]", $unSubURL, $mail);


    sendMail($email, "EDWINNER: Email Confirmation", $mail);
}

function getMessage($errorCode) {
    if ($errorCode == "2") {
        return "Email Id Already Registered!  Please drop us mail at goku0910@gmail.com for the support";
    }

    if ($errorCode == "1") {
        return "Internal Error! Please drop us mail at goku0910@gmail.com for the support";
    }

    if ($errorCode == "3") {
        return "You are subscribed! Will verify your payment and let you know on your contact EMAIL";
    }
    
    if ($errorCode == "4") {
        return "Payment error, please contact admin, goku0910@gmail.com";
    }
}

function getCostArray() {
    $conn = getDBConnection();
    $sql = "select NAME, COST, COST_DO, VID from PACKAGE_INFO where TYPE='monthly'";
    $sql1 = "select NAME, COST,COST_DO, VID from PACKAGE_INFO where TYPE='yearly'";
    $return = array();
    if ($resultObj = $conn->query($sql)) {
        while ($result = $resultObj->fetch_array(MYSQLI_ASSOC)) {
            $name = $result["NAME"];
            $cost = $result["COST"];
            $costDo = $result["COST_DO"];
            $id = $result["VID"];
            $return["monthly"][$name] = array("double" => $costDo, "str" => $cost,"id"=>$id);
        }
    }

    if ($resultObj = $conn->query($sql1)) {
        while ($result = $resultObj->fetch_array(MYSQLI_ASSOC)) {
            $name = $result["NAME"];
            $cost = $result["COST"];
            $costDo = $result["COST_DO"];
            $id = $result["VID"];
            $return["yearly"][$name] = array("double" => $costDo, "str" => $cost,"id"=>$id);
        }
    }

    return $return;
}

function getUserArray() {
    $str = "{\"userData\":{\"id\":15,\"userId\":14,\"role\":1,\"checkPoint\":0,\"subscriptionType\":\"monthly\",\"endDate\":\"2018-10-09T00:00:00.000+0000\",\"startDate\":\"2018-10-09T00:00:00.000+0000\",\"daysToSend\":1,\"daysLeft\":12},\"userInfo\":{\"id\":14,\"role\":2,\"isValid\":1,\"name\":\"Lucky Sharma\",\"email\":\"goku0910@gmail.com\",\"mobile\":\"1970-04-24T16:12:39.000+0000\",\"password\":\"goku0910\",\"createdDate\":\"2017-10-01T00:00:00.000+0000\"},\"userSubscription\":{\"id\":4,\"emailConfirmation\":1,\"paymentConfirmation\":1,\"active\":1,\"userId\":14}}";
    $user = json_decode($str, true);
    return $user;
}

function update($handle, $data) {
    $server["api"] = API;
    $url = $server["api"] . "/" . $handle;
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

function getData($handle) {
    $server["api"] = API;
    $data = json_decode(file_get_contents($server["api"] . $handle), true);
    return $data;
}

//print_r(getData("/get/user?email=goku0910@gmail.com1"));
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

