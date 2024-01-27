<?php
$dsn = 'mysql:host=localhost;dbname=michalc4_A';
$username = 'root';
$password = '';
$options = [];
try {
$connection = new PDO($dsn, $username, $password, $options);
} catch(PDOException $e) {

}