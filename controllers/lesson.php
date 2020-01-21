<?php
class lesson extends controller{

    public $subid=0;
    public $not=0;
    public function __construct(){
        parent::__construct();
        //echo "hello";
    }
    public function index(){
        $this->loggedin();
        $subid=Session::get("subid");
        if(!isset($subid)){
            header('location:'.URL.'subject');
        }else{
            $this->view->render("lesson/index"); 
        }
              
    }
    public function run(){
        $this->loggedin();
        //echo "wow wow";
       // print_r($_POST);
        $this->subid=Session::get("subid");
        $this->lid=Session::get("lid");
        //print_r($_SESSION);
        //$this->not=Session::get("not");
        $diff=$_POST["difficult"];
        $topic=$_POST["competency"];
        $this->model->ins_lesson($this->subid,$this->lid,$diff,$topic);
        $count=1;
        while (!empty($_POST["comlevel{$count}"])){
            $comlevel=$_POST["comlevel{$count}"];
            $difficulty=$_POST["difficulty{$count}"];
            $nop=$_POST["nop{$count}"];
            $this->model->insertcom($this->lid,$count,$comlevel,$difficulty,$nop);
            $count=$count+1;
        }
        //$this->model->ins_lesson($subname,$mid,$medium,$grade,$cat);
        $this->lid=$this->lid+1;
        Session::set("lid", $this->lid);
        header('location:'.URL.'lesson');
    }
    
}
?>