<?php

session_start();
require_once "../../core/Database.php";
header("Content-Type: application/json;Location: 'http://localhost:8080/itstep/exam/home'");

$object = json_decode(file_get_contents("php://input"));

$login = $_SESSION["currentUser"];

$user = Database::getRow("SELECT * FROM users WHERE login = :login", ["login" => $login]);

$author = Database::getRow("SELECT * FROM authors WHERE name = :name", ["name" => $object->author]);

$book = Database::getRow("SELECT * FROM Books WHERE title = :title", ["title" => $object->booktitle]);

$insert = Database::insert("INSERT INTO favorites(userId, bookId, authorId) VALUES (?, ?, ?)", [$user["userId"], $book["bookId"], $author["authorId"]]);

echo '{"response": "OK"}';