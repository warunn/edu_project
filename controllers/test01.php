<?php


class test01 extends controller
{

    public $ak = array();
    public function __construct(){
        //echo "my god";
        parent::__construct();
    }

    public function index(){
        //$this->loggedin();

        $this->view->render("test01/index");

    }
    public function abc()
    {
        $result = $this->model->findname('abc');
        $this->ak = $result;
        $this->view->akalanka = $this->ak;
        $this->view->render("test01/abc");
    }

}