<?php

require_once "app/core/Database.php";

class Model_Author implements Model
{
    public function getAllAuthors()
    {
        $sql = "SELECT * FROM authors";
        return Database::getAll($sql, []);
    }

    public function getData()
    {
        $authors = $this->getAllAuthors();
        $authorsArray = [];

        if ($authors !== null && count($authors) > 0) {
            foreach ($authors as $author) {
                $authorsArray[] = [
                    "authorId" => $author["authorId"],
                    "name" => $author["name"],
                    "photo" => $author["photo"],
                    "bio" => $author["bio"]
                ];
            }
        }

        return $authorsArray;
    }
}