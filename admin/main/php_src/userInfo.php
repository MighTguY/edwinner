<?php

include 'lib/util.php';

$request = array();


foreach ($_POST as $key => $value) {
	$request[$key] = $value;
}

echo update("/update/userInfo",$request);
header("Location: {$_SERVER["HTTP_REFERER"]}");

?>