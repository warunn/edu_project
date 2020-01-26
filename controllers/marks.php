<?php


class marks extends controller
{


    public function __construct(){
        parent::__construct();
    }

    public function index()
    {

        $result = $this->model->loadAllTeachers();
        if (!empty($result))
        {
            $this->view->array = $result;
            $this->view->render("marks/index");
        }


    }
    public  function  getStudentsFromClassTable()
    {
        if (isset($_POST['submit-teacher']))
        {
            $result = $this->model->getStudentsFromClassTable($_POST['teacher']);
                $this->view->array = $result;
                $this->view->render("marks/viewstd");

        }


    }


}