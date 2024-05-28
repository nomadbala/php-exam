<?php

class Controller_Payment extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Model_Payment();
    }

    public function action_index()
    {
        $data = $this->model->getData();
        $this->view->generate("payment_view.php", "template_view.php", $data);
    }
}