<?php

$db_parametr = 'mysql:host=localhost; dbname=michalc4_A; charset=utf8'; array(PDO::ATTR_EMULATE_PREPARES => false,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
$user = 'root';
$pass = '';
$db = new PDO($db_parametr, $user, $pass);

?>

	<head>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	</head>