<?php

class Controller_Home extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Model_Home();
    }

    public function action_index()
    {
        $data = $this->model->getData();
        $this->view->noExtractGenerate("home_view.php", "template_view.php", $data);
    }
}