<?php

include 'lib/util.php';

$request = array();


foreach ($_POST as $key => $value) {
	$request[$key] = $value;
}

$request = array_map(utf8_encode, $request);


echo update("/update/extraword",$request);

header("Location: {$_SERVER["HTTP_REFERER"]}");

?>
