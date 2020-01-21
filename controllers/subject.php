<?php
class subject extends controller{
    //public $not='';
    public function __construct(){
        //echo "my god";
        parent::__construct();
    }
    public function index(){
        $this->loggedin("admin");
        $subset=Session::get("subset");
        if (!empty($subset)){
            $this->view->msg="Subject Entered Correctly ";
            Session::delete("subset");
        }
        $this->view->render("subject/index");
    }
    public function run(){
        //print_r($_POST);
        //print_r($_FILES);
        $this->loggedin("admin");
        $subname=$_POST["subname"];
        $mid=$_POST["mid"];
        $medium=$_POST["Medium"];
        $cat=$_POST["type"];
        $this->subid=$this->model->ins_sub($subname,$mid,$medium,$cat);
        Session::init();
        Session::set("subset",TRUE);
        header('location:'.URL.'subject');
    }
    
    
}


?>
