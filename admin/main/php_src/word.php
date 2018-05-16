<?php

include 'lib/util.php';

$request = array();


foreach ($_POST as $key => $value) {
	$request[$key] = $value;
}

print_r( update("/update/word",$request));
header("Location: {$_SERVER["HTTP_REFERER"]}");


?>
