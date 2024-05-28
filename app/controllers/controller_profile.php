<?php

class Controller_Profile extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new Model_Profile();
    }

    public function action_index()
    {
        $data = $this->model->getData();
        $this->view->noExtractGenerate("profile_view.php", "template_view.php", $data);
    }
}