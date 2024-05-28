<?php

class Controller_Login extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Model_Login();
    }

    public function action_index()
    {
        $data = $this->model->getData();
        $this->view->generate("login_view.php", "template_view.php", $data);
    }
}