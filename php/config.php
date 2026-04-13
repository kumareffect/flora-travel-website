<?php

define('DB_SERVER', 'localhost'); 
define('DB_USERNAME', 'root'); 
define('DB_PASSWORD', '');
define('DB_NAME', 'travel');
define('DB_PORT', 3306); 

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);


if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


echo "Connected successfully to the database.";
