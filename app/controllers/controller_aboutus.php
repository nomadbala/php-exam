<?php

class Controller_Aboutus extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Model_Aboutus();
    }

    public function action_index()
    {
        $data = $this->model->getData();
        $this->view->generate("aboutus_view.php", "template_view.php", $data);
    }
}