<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'travel';

$conn = new MySQLi($host, $user, $pass, $db_name, $db_port);

if ($conn->connect_error) {
    die('Database connection error: ' . $conn->connect_error);
}