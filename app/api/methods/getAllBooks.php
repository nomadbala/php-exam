<?php

require_once "../../core/Database.php";
header("Content-type: application/json; charset=utf-8");

$data = Database::getAll("SELECT * FROM books", []);
echo json_encode($data);