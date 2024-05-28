<?php

session_start();
require_once "../../core/Database.php";
header("Content-Type: application/json;Location: 'http://localhost:8080/itstep/exam/home'");

$object = json_decode(file_get_contents("php://input"));

if (isset($_SESSION[$object->name])) {
    unset($_SESSION[$object->name]);
    echo '{"response": "OK"}';
} else {
    echo "{'response': 'ERROR'}";
}