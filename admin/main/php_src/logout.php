<?php
session_destroy();
$newURL = "../login.html";
  header('Location: ' . $newURL);
?>