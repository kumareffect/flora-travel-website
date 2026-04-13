<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
define("ROOT_PATH", realpath(dirname(__FILE__)));
define("BASE_URL", "http://localhost/travel");
