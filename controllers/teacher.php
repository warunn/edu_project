<?php
class teacher extends controller{

    public function __construct(){
        //echo "hello";
        parent::__construct();
    }
    public function index($send=null){
        $this->loggedin("principal","clerk","admin");
        $reg=Session::get("regteacher");
        //print_r($_SESSION);
        if (!empty($reg)){
            $this->view->msg=1;
            Session::delete("regteacher");
        }
        $this->view->render("teacher/index"); 
        }
   public function findteacher(){
            $this->view->render("reg/findteacher");
        }
  
     public function register(){
            $this->loggedin("principal","clerk","admin");
            
            foreach($_POST as $key=>$value)
            {
                ${$key}=$value;
            }
            $this->model->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->model->db->setAttribute(PDO::ATTR_AUTOCOMMIT,0);
            try{
                $this->model->db->beginTransaction();
                $this->id=$this->model->regteacher($name,$nic,$address,$gender,$uname,$pass,$mobile_tel,$land_tel,$training,$app_sub,$app_date,$sch_date);
                echo $this->id;
                print_r($_FILES);
                
               if(!empty($_FILES["pic"]["name"])){
                   $this->model->insertmedia($this->id);
                }
                
                
                $this->model->db->commit();
                Session::init();
                Session::set("regteacher",TRUE);
                header('Window-target: _top');
                header('location:'.URL.'teacher');
                
            }
            catch (PDOException $e){
                $this->model->db->rollBack();
                die($e->getMessage());
                
            }
        }
        public function find(){
            $this->loggedin("principal","clerk","admin");
            $this->view->render("teacher/find");
        }
        public function findname(){
            $this->loggedin("principal","clerk","admin");
            $name=$_POST["name"];
            $result=$this->model->findname($name);
            $ans=$this->matrix($result);
            $this->view->teacher=$ans;
            header("Cache-Control: no cache");
            $this->view->render("teacher/grid");
        }
        public function findnic(){
            $this->loggedin("principal","clerk","admin");
            $nic=$_POST["nic"];
            $result=$this->model->findnic($nic);
            $ans=$this->matrix($result);
            $this->view->teacher=$ans;
            header("Cache-Control: no cache");
            $this->view->render("teacher/grid");
        }
        public function findadd(){
            $this->loggedin("principal","clerk","admin");
            $add=$_POST["address"];
            $result=$this->model->findadd($add);
            $ans=$this->matrix($result);
            $this->view->teacher=$ans;
            header("Cache-Control: no cache");
            $this->view->render("teacher/grid");
        }
        public function findtid($tid=NULL){
            $this->loggedin("principal","clerk","admin");
            if(isset($_POST["tid"])){
                $tid=$_POST["tid"];
            }
            if(empty($tid)){
                $this->view->error=" Teacher ID is empty please Check the ID again";
            }
            //call the model---
            $result=$this->model->showtid($tid);
            if(!empty($result)){
                foreach($result as $key=>$value){
                    $this->view->$key=$value;
                }
                $this->view->render("teacher/report");
            }
            else {
                    $this->view->error="Invalid Teacher ID please Check the ID again";
            }
        }
        
        public function matrix($result){
            $ab=1;
            $reset=true;
            $data=array();
            $ans="<table  style='font-size:13px;table-layout: fixed;'>";
            foreach ($result as $row){
                $fname=$row;
                array_push($data,$fname);
                $reset=true;
                if($ab%2==0){   //addnorun($ano)
                    $ans.="<tr>";
                    foreach ($data as $mdata){
                        $tid=$mdata["tid"];
                        $name=$mdata["name"];
                        $ans.="<td style='vertical-align: text-bottom;'>Name :</td><td width='300px' height='50px' style='word-wrap:break-word;vertical-align: text-bottom;border-right: 6px solid red;'><a href='".URL."teacher/findtid/".$tid."'>{$name}</a></td>";
                    } //.URL."search/showparent/".$this->pid.
                    $ans.="</tr>";
                    $reset=false;
                    unset($data);
                    $data = array();
                }
                //$this->view->{"myres".$ab}=$row["Result"];
                $ab=$ab+1;
            }
            if($reset==TRUE){
                foreach ($data as $mdata){
                    $name=$mdata["name"];
                    $tid=$mdata["tid"];
                    $ans.="<td style='vertical-align: text-bottom;'> Name : </td><td width='300px' height='50px' style='word-wrap:break-word;vertical-align: text-bottom;border-right: 6px solid red;'><a href='".URL."teacher/findtid/".$tid."'>{$name}</a></td>";
                }
            }
            $ans.="</table>";
            return ($ans);
        }
      
      /*  public function run(){
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
    }*/
        
    }