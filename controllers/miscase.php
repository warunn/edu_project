<?php
class miscase extends controller{
    
    public function __construct(){
        //echo "hello";
        parent::__construct();
    }
    public function index(){
        $this->loggedin("principal","admin");
        $this->view->render("miscase/index"); 
    }
    public function find(){
        $this->loggedin("principal","clerk","admin");
        $this->view->render("miscase/find");
    }
    public function report($caseid=NULL){
        if(isset($_POST["caseid"])){
            $caseid=$_POST["caseid"];
        }
        if(empty($caseid)){
            $this->view->error="Invalid Report ID please Check the ID again";
        }
    $result=$this->model->showreport($caseid);
    if(!empty($result)){   
    $result1=$this->model->mediareport($caseid);
    $result2=$this->model->pstreport($caseid);
   
    foreach($result as $key=>$value)
    {
        
        $this->view->$key=$value;
    }
   
    $ab=1;
    foreach ($result1 as $row){
        $this->view->{"media".$ab}=$row["mid"];//very important
        $this->view->{"link".$ab}=$row["link"];
        $this->view->{"type".$ab}=$row["type"];
        $ab=$ab+1;
    }
    $ab=1;
    //print_r($result2);
    foreach ($result2 as $row){
        $this->view->{"adno".$ab}=$row["addno"];//very important
        $this->view->{"details".$ab}=$row["details"];
        $this->view->{"stname".$ab}=$this->model->showname($row["addno"]);
        $ab=$ab+1;
    }
   
    }
    else{
        $this->view->error="Invalid Report please Check the Details again";
    }
    header("Cache-Control: no cache");
    //session_cache_limiter("private_no_expire");
    $this->view->render("miscase/report");
   
    }
    public function run(){
        $this->loggedin("principal","admin");
        foreach($_POST as $key=>$value)
        {
            ${$key}=$value;
        }
        //print_r($_POST);
        $this->model->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->model->db->setAttribute(PDO::ATTR_AUTOCOMMIT,0);
        try{
            $this->model->db->beginTransaction();
            $this->id=$this->model->insertcase($title,$Date,$details,$location,$type);
            $a=1;
           while ($a<=50){
                if(empty(${"addno".$a}) or !isset(${"addno".$a})){
                    break;
                }
                $this->model->insertpst($this->id,${"addno".$a},${"detail".$a});
                $a=$a+1;
            }
            $a=1;
           // print_r($_FILES);
            while ($a<=5){
                if(empty($_FILES["media{$a}"]["name"])){
                    
                    break;
                }
                $this->model->insertmedia($this->id,$a);
                $a=$a+1;
            } 
            
            $this->model->db->commit();
            header('Window-target: _top');
            header('location:'.URL.'miscase/report/'.$this->id);
        }
        catch (PDOException $e){
            $this->model->db->rollBack();
            die($e->getMessage());
        }
    }
    public function casereport(){
        
    }
}
?>