<?php
class Studentmarks extends controller{
    
    public function __construct(){
        //echo "hello";
        parent::__construct();
    }

    public function index($send=null){

        $this->loggedin("teacher");
        // print_r($this->view->classList);die();

        $this->view->render("studentmarks/index"); 
    }
    public function marks($send=null){

        $this->loggedin("teacher");
        // print_r($this->view->classList);die();

        $this->view->render("studentmarks/marks");
    }
    public function postMarksTODB()
    {
        $std_id = $_POST['std_id'];
        $term = $_POST['term'];
        $batch = $_POST['batch'];
        $class = $_POST['class'];
        $Created_year = date('Y').'O/L';
        $subSet =['Mathematics','Science','English','Sinhala','Buddhism','History',$_POST['section01'],$_POST['section02'],$_POST['section03']];
        $marksSet =[$_POST['Mathematics'],$_POST['Science'],$_POST['English'],$_POST['Sinhala'],$_POST['Buddhism'],$_POST['History'],$_POST['section01-sub'],$_POST['section02-sub'],$_POST['section03-sub']];
        $result = $this->model->postMarksTODB($std_id,implode( ",",$subSet),$term,implode( ",",$marksSet),$batch,$class,$Created_year);
        $this->view->msg='Data sis added';
        $this->view->render("marks/index");
    }


}



?>