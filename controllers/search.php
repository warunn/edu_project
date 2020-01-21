<?php
class search extends controller{
public function __construct(){
        parent::__construct();
    }
    public function index($send=null){
        $this->loggedin("principal","clerk","admin");
        //$this->model->createindex();
        $this->view->render("search/index");
    }
    public function addnorun($ano=NULL){
        $this->loggedin("principal","clerk","admin");
        if(isset($ano)){
            $addno=$ano;
        }
        elseif (isset($_POST["addno"])){
            $addno=$_POST["addno"];
        }
        $this->view->pic=$this->model->selectpic($addno);
        $result=$this->model->addnorun($addno);
        //print_r($result);
        foreach($result[0] as $key=>$value)
        {
            //echo $value;
            $this->view->$key=$value;//very important
        }
        $result1=$this->model->selecttel($addno);
        $ab=1;
        foreach ($result1 as $row){
            $this->view->{"tel".$ab}=$row["tel"];//very important
            //print_r($this->view);
            $ab=$ab+1;
        }
        $result3=$this->model->g5($addno);
        foreach($result3 as $key=>$value)
        {
            $this->view->$key=$value;
        }
        $result6=$this->model->findbro($addno);
        $ab=1;
        foreach ($result6 as $row){
            $this->view->{"bro".$ab}=$row["bro1"];
            $ab=$ab+1;
        }
        $result2=$this->model->selectsch($addno);
        $ab=1;
        foreach ($result2 as $row){
            $schname=$this->model->schname($row["schid"]);
            $this->view->{"sch".$ab}=$this->schools($ab,$row["schid"],$schname,$row["s_date"],$row["e_date"]);
            $ab=$ab+1;
        }
        
        if($this->view->ol_al==0){
            //echo "this is al";
            $result4=$this->model->selectol($addno);
            $this->view->exno=$result4["exno"];
            $this->view->olyear=$result4["year"];
            $result5=$this->model->selectolsub($result4["exno"]);
            $ab=1;
            foreach ($result5 as $row){
                //$this->view->{"olsub".$ab}=$row["subid"];
                $subid=$row["subid"];
                $this->view->{"myres".$ab}=$row["Result"];
                $this->view->{"olsubid".$ab}=$row["subid"];
                $out=$this->model->select_subname($row["subid"]);
                $this->view->{"olsubname".$ab}=$out["subname"];
                $this->view->{"olsubtype".$ab}=$out["type"];
                $ab=$ab+1;
                
                
            }
            
            
        }
        header("Cache-Control: no cache");
        $this->view->render("search/profile");
        
    }
    public function initialrun(){
        $this->loggedin("principal","clerk","admin");
        $intname=$_POST["intname"];
        $result=$this->model->findintname($intname);
        $ans=$this->matrix($result);
        $this->view->student=$ans;
        header("Cache-Control: no cache");
        $this->view->render("search/grid");
        
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
                    $stid=$mdata["stid"];
                    $fullname=$mdata["fname"];
                    $ans.="<td style='vertical-align: text-bottom;'> Name :</td><td width='300px' height='50px' style='word-wrap:break-word;vertical-align: text-bottom;border-right: 6px solid red;'><a href='".URL."search/addnorun/".$stid."'>{$fullname}</a></td>";
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
                $fullname=$mdata["fname"];
                $stid=$mdata["stid"];
                $ans.="<td style='vertical-align: text-bottom;'> Name : </td><td width='300px' height='50px' style='word-wrap:break-word;vertical-align: text-bottom;border-right: 6px solid red;'><a href='".URL."search/addnorun/".$stid."'> {$fullname}</a></td>";
            }
        }
        $ans.="</table>";
        return ($ans);
    }
    public function townrun(){
        $this->loggedin("principal","clerk","admin");
        $town=$_POST["town"];
        $result=$this->model->findtown($town);
        $ans=$this->matrix($result);
        $this->view->student=$ans;
        header("Cache-Control: no cache");
        $this->view->render("search/grid");
        
    }
    public function fullrun(){
        $this->loggedin("principal","clerk","admin");
        //print_r($_POST);
        $fullname=$_POST["fname"];
        $result=$this->model->findfullname($fullname);
        $ans=$this->matrix($result);
        $this->view->student=$ans;
        header("Cache-Control: no cache");
        $this->view->render("search/grid");
    }
    public function schools($no,$sid=Null,$sname=Null,$syear=Null,$Eyear=Null){
        
        $end= "<div name=\"school{$no}\"> ";
        
        if(isset($sid) and !empty($sid)){
            $end.="School Name : {$sname} <br/>";
        }
        if(isset($syear) and !empty($syear)){
            $end.="Started Year : {$syear} <br/>";
            }
            if(isset($Eyear) and !empty($Eyear)){
                $end.="End Year :{$Eyear} </div>";
            }
            return $end;
    }
    public function showparent($pid){
        $this->loggedin("principal","clerk","admin");
        $this->view->pid=$pid;
        $result=$this->model->selectpid($pid);
        $this->view->focc=$this->model->findocc($result["focc"]);
        $this->view->mocc=$this->model->findocc($result["mocc"]);
        $this->view->result=$result;
        $this->view->render("search/showparent");
    }
    
}
?>