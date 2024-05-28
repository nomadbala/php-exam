<?php

session_start();
require_once "../../core/Database.php";
header("Content-Type: application/json;Location: 'http://localhost:8080/itstep/exam/home'");

$object = json_decode(file_get_contents("php://input"));

$login = $object->login;
$password = $object->password;

if ($login !== null && $password !== null) {
    $data = Database::getRow("SELECT * FROM users WHERE password = _hash(salt, $password) ", []);

    if (count($data) > 0) {
        $_SESSION["currentUser"] = $login;
        echo '{"response": "OK"}';
    }
} else {
    echo "{'response': 'ERROR'}";
}
