<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function sendMail($to,  $subject, $message)

{
    $headers = "From: edwinner.com\r\n";
    $headers .= "Reply-To: edwinner.com \r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    if (mail($to, $subject, $message, $headers)) {
        echo 'Your message has been sent.';
    } else {
        echo 'There was a problem sending the email.';
    }
}

