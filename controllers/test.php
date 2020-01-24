<?php
class test extends controller{
    //public $not='';
    public function __construct(){
        //echo "my god";
        parent::__construct();
    }
    public function index(){
        $this->loggedin();
        $this->view->render("test/index");
    }
    public function run(){
        //print_r($_POST);
        //print_r($_FILES);
        $this->loggedin();
        $subname=$_POST["subname"];
        $mid=$_POST["mid"];
        $medium=$_POST["Medium"];
        $grade=$_POST["Grade"];
        $cat=$_POST["type"];
        $this->model->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->model->db->setAttribute(PDO::ATTR_AUTOCOMMIT,0);
        try{
            $this->model->db->beginTransaction();
        $this->subid=$this->model->ins_test($subname,$mid,$medium,$grade,$cat);
        $this->subid=$this->model->ins_test2($subname,$mid,$medium,$grade,$cat);
        $this->model->db->commit();
        }
        catch (PDOException $e){
            $this->model->db->rollBack();
            die($e->getMessage());
        }
    }
    public function loads(){
        echo "<h1>hello</h1>";
        echo "<h1>hello2</h1>";
    }
    
    
}


?>
