<?php

session_start();
require_once "../../core/Database.php";
header("Content-Type: application/json;Location: 'http://localhost:8080/itstep/exam/home'");

$login = $_SESSION["currentUser"];

$author = isset($_GET["author"]) ? $_GET["author"] : null;

$bookTitle = isset($_GET["booktitle"]) ? $_GET["booktitle"] : null;

$user = Database::getRow("SELECT * FROM users WHERE login = :login", ["login" => $login]);

$sql = "UPDATE users SET subscriptionId = ? WHERE userId = ?";

$data = Database::insert($sql, [$user["userId"], $user["userId"]]);

$data2 = Database::insert("INSERT INTO subscriptions(userId) VALUES (?)", [$user["userId"]]);

echo '{"response": "OK"}';