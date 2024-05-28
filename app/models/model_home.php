<?php

require_once "app/core/Database.php";

class Model_Home implements Model
{
    public function getAllBooks()
    {
        $sql = "SELECT * FROM books";
        return Database::getAll($sql, []);
    }

    public function getData()
    {
        $books = $this->getAllBooks();
        $booksArray = [];

        if ($books !== null && count($books) > 0) {
            foreach ($books as $book) {
                $booksArray[] = [
                    "bookId" => $book["bookId"],
                    "title" => $book["title"],
                    "story" => $book["story"],
                    "author" => $book["author"],
                    "authorId" => $book["authorId"],
                    "coverUrl" => $book["coverUrl"],
                    "releaseDate" => $book["releaseDate"]
                ];
            }
        }

        return $booksArray;
    }
}