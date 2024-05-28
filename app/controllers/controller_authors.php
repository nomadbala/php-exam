<?php

class Controller_Authors extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Model_Author();
    }

    public function action_index()
    {
        $data = $this->model->getData();
        $this->view->noExtractGenerate("authors_view.php", "template_view.php", $data);
    }
}