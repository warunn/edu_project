<?php


class viewpost extends controller
{
    public function __construct()
    {
        //echo "my god";
        parent::__construct();
    }

    public function index()
    {
        //$this->loggedin();

        $result = $this->model->GetAllArticles();
        if (!empty($result)) {
            $this->view->array = $result;
            $this->view->render("viewpost/index");
        } else {
            $this->view->error = "Server Error";
        }
    }

    public function api()
    {
        if (isset($_POST['submit'])) {
            $id = $_POST['key'];
            $result = $this->model->GetAllPostByID($id);
            if (!empty($result)) {
                $this->view->api = $result;
                header("Cache-Control: no cache");
                $this->view->render("viewpost/index");
            } else {
                $this->view->error = "Server Error";
            }
        }


    }

}