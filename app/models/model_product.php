<?php

require_once "app/core/Database.php";

class Model_Product implements Model
{
    public function getBookById($id)
    {
        return Database::getRow("SELECT * FROM books WHERE bookId = :bookId", ["bookId" => $id]);
    }

    public function getUserByLogin($login)
    {
        $data = Database::getRow("SELECT * FROM users WHERE login = :login", ["login" => $login]);
        if (count($data) && $data["subscriptionId"] !== null) {
            return true;
        }
        return false;
    }

    public function getData()
    {
        if (isset($_GET["id"])) {
            $data = $this->getBookById($_GET["id"]);
            $obj = [
                "data" => $data,
                "access" => $this->getUserByLogin($_SESSION["currentUser"])
            ];
            return $obj;
        }
    }
}