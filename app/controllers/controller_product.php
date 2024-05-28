<?php

class Controller_Product extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new Model_Product();
    }

    public function action_index()
    {
        $data = $this->model->getData();
        $this->view->noExtractGenerate("product_view.php", "template_view.php", $data);
    }
}