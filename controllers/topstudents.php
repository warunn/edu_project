<?php


class topstudents extends Controller
{

    /**
     * topstudents constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        //$this->loggedin();

        $this->view->render("topstudent/index");

    }
}