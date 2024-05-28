<?php

require_once "app/core/Database.php";

class Model_Aboutus implements Model
{
    public function getData()
    {
        return "BIG BOOKSHELF: Читай любые книги, когда угодно и где угодно
        <br><br>
        BIG BOOKSHELF - это онлайн сервис книг по подписке, который дает вам доступ к миллиону книг на любом устройстве. Мы делаем книги доступными для всех.";
    }
}
