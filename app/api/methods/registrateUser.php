<?php

session_start();
require_once "../../core/Database.php";
header("Content-Type: application/json;Location: 'http://localhost:8080/itstep/exam/home'");

// $name = $_GET["name"] ?? null;
// $login = $_GET["login"] ?? null;
// $email = $_GET["email"] ?? null;
// $password = $_GET["password"] ?? null;

$object = json_decode(file_get_contents("php://input"));

$name = $object->name;
$login = $object->login;
$email = $object->email;
$password = $object->password;

if ($name !== null && $login !== null && $email !== null && $password !== null) {
    $data = Database::insert("INSERT INTO users(name, login, email, password) VALUES (:name, :login, :email, :password)", ["name" => $name, "login" => $login, "email" => $email, "password" => $password]);
    // $currentUser = [
    //     "name" => $name,
    //     "login" => $login,
    //     "email" => $email,
    //     "password" => $password
    // ];
    $_SESSION["currentUser"] = $login;
    // echo $_SESSION["currentUser"];
    echo '{"response": "OK"}';
    // exit();
} else {
    echo "{'response': 'ERROR'}";
}


?>