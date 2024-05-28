<?php

class Controller_Books extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Model_Books();
    }

    public function action_index()
    {
        $data = $this->model->getData();
        $this->view->generate("books_view.php", "template_view.php", $data);
    }
}