<?php
//24/1/20

class location extends controller
{
    public function __construct(){
        //echo "my god";
        parent::__construct();
    }


    public function index(){
        //$this->loggedin();
        $result = $this->model->getCityCount();

        if(!empty($result)){
            $this->view->array = $result;
            $this->view->render("location/index");
        }
        else {
            $this->view->error="Server Error";
        }
    }

    //use to info button in Location View
    public function getDataAccordingToLocation()
    {
        if(isset($_GET['location'])){
            $location = $_GET['location'];
            $result=$this->model->getDataAccordingToLocation($location);
            if(!empty($result)){
                $this->view->array = $result;
                header("Cache-Control: no cache");
                $this->view->render("location/location.info");
            }
            else {
                $this->view->error="Server Error";
            }
        }
        //$this->loggedin("principal","clerk","admin");

    }




}