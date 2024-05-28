<?php

require_once "app/core/Database.php";

class Model_Profile implements Model
{
    public function getUserByLogin($login)
    {
        return Database::getRow("SELECT * FROM users WHERE login = :login", ["login" => $login]);
    }

    public function getData()
    {
        if (isset($_SESSION["currentUser"])) {
            $data = $this->getUserByLogin($_SESSION["currentUser"]);
            return $data;
        }
    }
}