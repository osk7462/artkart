<?php
/* Database connection settings */
$host = 'localhost';
$user = 'osama_khan';
$pass = '';
$db = 'accounts';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
?>
