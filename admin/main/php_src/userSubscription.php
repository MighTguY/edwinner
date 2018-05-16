<?php

include 'lib/util.php';

$request = array();


foreach ($_POST as $key => $value) {
	$request[$key] = $value;
}

echo update("/update/userSubscription",$request);
header("Location: {$_SERVER["HTTP_REFERER"]}");

?>