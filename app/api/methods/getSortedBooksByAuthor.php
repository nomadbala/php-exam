<?php

require_once "../../core/Database.php";
header("Content-type: application/json; charset=utf-8");

$author = isset($_GET["author"]) ? $_GET["author"] : null;

$data = [];

if ($author !== null) {
    $data = Database::getAll("SELECT * FROM books WHERE author =:author", ["author" => $author]);
}

echo json_encode($data, JSON_UNESCAPED_UNICODE);