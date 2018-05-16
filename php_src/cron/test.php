<?php
include '../lib/MailUtil.php';
include '../lib/Constants.php';

function getUsers($role) {
    $url = API."/get/roleUsers?role=".$role;
    $users = hitURL($url);
    return $users;
}

function getCheckPoints($checkPoint,$role) {
    $checkPoint=$checkPoint++;
    $url = API."/get/word/checkpoint/".$checkPoint."?role=".$role;
    $words["word"] = hitURL($url);
    $r_url = API."/get/revisionWords/".$checkPoint."?role=".$role;
    $words["revision"] = hitURL($r_url);
  
    return $words;
}

function getExtraData($role) {

}

//function sendMail($htmlText,$userEmail="goku0910@gmail.com") {
//    $to = $userEmail;
//
//    $subject = 'EdWinner: Word of the Day';
//
//    $headers = "From: admin@edwinner.com";
//  //  $headers .= "Reply-To: goku0910@hotmail.com";
//  //  $headers .= "CC: goku0910@hotmail.com\r\n";
//    $headers .= "MIME-Version: 1.0\r\n";
//    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
//
//
//    $message = $htmlText;
//
//
//    $success = mail($to, $subject, $message, $headers);
//    if (!$success) {
//    $errorMessage = error_get_last()['message'];
//    print_r($errorMessage);
//}
//echo "sent";
//}
//
function getAsList($str) {
    $str = "<ul><li>".str_replace("<br>","</li><li>",$str)."</li></ul>";
    return str_replace("<li></li>","",$str);
}


function generateMailerHtml($extraData, $word, $user) {
    $htmlText = file_get_contents('data.html');
    $lwords = file_get_contents('lword.html');
    $lword = file_get_contents('lword.html');
    $rwords = file_get_contents('rwords.html');
    $rword = file_get_contents('rword.html');

    $wordOfTheDay = $word["word"]["word"];
    $meaning = $word["word"]["meaning"];
    $example = $word["word"]["example_basic"];

    $arrayData = array();
    $arrayData["[WORD]"] = $word["word"]["word"];
    $arrayData["[WORD_MEANING]"] = getAsList($word["word"]["meaning"]);
    $arrayData["[WORD_USAGE]"] =   getAsList($word["word"]["example_basic"]);

    $revisionWords ="";
    $lastRevisionWord = "";
    $lastRevisionMeaning = "";
    $lastRevisionExample = "";
    $arrayData["[L_WORDS]"] =   "";
    $arrayData["[R_WORDS]"] =   "";
    if(count($word["revision"])>0) {
        $rwordFile="";
        foreach ($word["revision"] as $key => $value) {
            $tempData["[R_WORD]"]  =   $value["word"];
            $tempData["[R_USAGE]"] =  $value["example_revision"];
            $rwordFile .= $rword;
            foreach ($tempData as $key => $value) {
                $rwordFile = str_replace($key,$value,$rwordFile);
            }
        }
        #		$arrayData["[L_WORDS]"] =   $lwords;
        $rwords = str_replace("[R_WORD_HTML]",$rwordFile, $rwords);
        $arrayData["[R_WORDS]"] =   $rwords;
    }
    //	foreach ($word["revision"] as $key => $value) {
    //		$revisionWords .= "<li> ".$value["word"]."</li>";
    //		if($key==0) {
    //			$lastRevisionWord = $value["word"];
    //			$lastRevisionMeaning = $value["meaning"];
    //			$lastRevisionRevision= $value["example_revision"];
    //		}
    //	}
    //
    foreach ($arrayData as $key => $value) {
        $htmlText = str_replace($key,$value,$htmlText);
    }
    return $htmlText;
}

function postProcess($id, $userId) {
    $url = API."/updateCheckpoint/".$userId."?cpoint=".$id;
    hitURL($url);
}


function sendData ($users,$role) {
    foreach ($users as $user) {
        $checkpoint = $user["userData"]["checkPoint"];
        $email = $user["userInfo"]["email"];
        $word = getCheckPoints($checkpoint,$role);
        if($word["word"] != NULL ) {
            $extraData = getExtraData($user["userData"]["role"]);
            $htmlText = generateMailerHtml($extraData, $word, $user);
            echo $email;
            sendMail($email, "EDWINNER: Word of the Day ", $htmlText);
            postProcess($word["word"]["id"],$user["userData"]["userId"]);
        }
    }
}
function main() {

    $users_b = getUsers(1);
    $users_i = getUsers(2);
    $users_e = getUsers(3);
    sendData($users_b,1);
    sendData($users_i,2);
    sendData($users_e,3);
}

function hitURL($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);

    curl_close($ch);
    return json_decode($result,true);
}
main();
//sendMail("hello logan alakazam");
?>
