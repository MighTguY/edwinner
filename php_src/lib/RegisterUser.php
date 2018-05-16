<?php

include 'lib/util.php';

function registerFromMain($name, $email, $cost, $tel, $type, $subType) {


    $info = $subType . " Subscription for the Type " . $type;
    $user = register($name, $email, $tel, $type, $subType);

    if ($user == NULL) {
        $newURL = "../index.php?code=1";
        header('Location: ' . $newURL);
    }
    $userId = $user["userData"]["userId"];
 
    
    if ($user["REGISTERED"] == 1) {
        if ($user["userSubscription"]["paymentConfirmation"] == 0) {
            makePayment($name, $email, $cost, $tel, $info, $userId);
        } else {
            $newURL = "../index.php?code=2";
            header('Location: ' . $newURL);
        }
    } else {
        makePayment($name, $email, $cost, $tel, $info, $userId);
        sentConfirmation($userId, $email, $name, $message);
    }

    
}

function makePayment($name, $email, $cost, $tel, $info, $userId) {
    session_start();
    $_SESSION["payment"]['amount'] = $cost;
    $_SESSION["payment"]['firstname'] = $name;
    $_SESSION["payment"]['email'] = $email;
    $_SESSION["payment"]['phone'] = $tel;
    $_SESSION["payment"]['productinfo'] = $info;
    $_SESSION["payment"]['firstname'] = $userId;
    $newURL = "./lib/PaymentUtil.php";
    header('Location: ' . $newURL);
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

