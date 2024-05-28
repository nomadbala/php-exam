<?php

class Controller_Authorize extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Model_Authorize();
    }

    public function action_index()
    {
        $data = $this->model->getData();
        $this->view->generate("authorization_view.php", "template_view.php", $data);
    }
}