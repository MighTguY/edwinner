<?php

function getUsers($role) {
  $url = "http://edwinner.com:8080/api/v1/get/roleUsers?role=".$role;
  $users = hitURL($url);
  return $users;
}

function getCheckPoints($checkPoint) {
  $checkPoint=$checkPoint++;
$url = "http://edwinner.com:8080/api/v1/get/word/".$checkPoint;
$words["word"] = hitURL($url);
$r_url = "http://edwinner.com:8080/api/v1/get/revisionWords/".$checkPoint;
$words["revision"] = hitURL($r_url);
return $words;
}

function getExtraData($role) {

}

function sendMail($htmlText,$userEmail="goku0910@gmail.com") {
    $to = $userEmail;

    $subject = 'EdWinner: Word of the Day';

    $headers = "From: admin@edwinner.com";
  //  $headers .= "Reply-To: goku0910@hotmail.com";
  //  $headers .= "CC: goku0910@hotmail.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";


    $message = $htmlText;


    $success = mail($to, $subject, $message, $headers);
    if (!$success) {
    $errorMessage = error_get_last()['message'];
    print_r($errorMessage);
}
echo "sent";
}

function generateMailerHtml($extraData, $word, $user) {
 $htmlText = file_get_contents('index.html');
 $wordOfTheDay = $word["word"]["word"];
 $meaning = $word["word"]["meaning"];
 $example = $word["word"]["example_basic"];


 $revisionWords ="";
 $lastRevisionWord = "";
 $lastRevisionMeaning = "";
  $lastRevisionExample = "";
 foreach ($word["revision"] as $key => $value) {
   $revisionWords .= "<li> ".$value["word"]."</li>";
   if($key==0) {
     $lastRevisionWord = $value["word"];
     $lastRevisionMeaning = $value["meaning"];
     $lastRevisionRevision= $value["example_revision"];
   }
 }

 $htmlText = str_replace("EDWINNER_WDAY",$wordOfTheDay,$htmlText);
$htmlText=  str_replace("EDWINNER_MEANING_WDAY",$meaning."<br>".$example,$htmlText);
$htmlText=   str_replace("EDWINNER_RLIST",$revisionWords,$htmlText);
$htmlText=    str_replace("EDWINNER_1L_WORD",$lastRevisionWord,$htmlText);
$htmlText=    str_replace("EDWINNER_2L_WORD_EXPLAIN",$lastRevisionMeaning."<br>".$lastRevisionRevision,$htmlText);

return $htmlText;
}

function sendData ($users) {
  foreach ($users as $user) {
    $checkpoint = $user["userData"]["checkPoint"];
    $word = getCheckPoints($checkpoint);
    //print_r($word);
    $extraData = getExtraData($user["userData"]["role"]);
    $htmlText = generateMailerHtml($extraData, $word, $user);
    echo $htmlText;
    sendMail($htmlText);
  }
}
function main() {

  $users_b = getUsers(0);
  $users_i = getUsers(1);
  $users_e = getUsers(2);
  sendData($users_b);
  sendData($users_i);
  sendData($users_e);
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
