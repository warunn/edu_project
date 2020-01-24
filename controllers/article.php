<?php
class article extends controller{
	public $result1='';
	public $result2='';
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		Session::init();
		if (Session::get('loggedin')==false or !(Session::get('role')=="webadmin")){
			Session::destroy();
			header('location:'.URL.'login');
			exit;
		}
		$articles=Session::get("articles");
		if (!empty($articles)){
		    $this->view->msg1=1;
		    Session::delete("articles");
		}
		$this->view->render("article/index");
	}
	public function delete(){
		Session::init();
		if (Session::get('loggedin')==false or !(Session::get('role')=="webadmin")){
			Session::destroy();
			header('location:'.URL.'login');
			exit;
		}
		$articles=Session::get("artdelete");
		if (!empty($articles)){
		    $this->view->msg2=1;
		    Session::delete("artdelete");
		}
		$sth=$this->model->sarticle();
		$this->view->msg1=$sth;
		$this->view->render("article/delete");
		}
	public function scomment(){
		Session::init();
		if (Session::get('loggedin')==false or !(Session::get('role')=="webadmin")){
			Session::destroy();
			ob_start();
			header('location:'.URL.'login');
			exit;
		}
		$sth=$this->model->scomment1();
		$this->view->msgme=$sth;
		$this->view->render("article/comment");
		}
	public function runcomment(){
		Session::init();
		if (Session::get('loggedin')==false or !(Session::get('role')=="webadmin")){
			Session::destroy();
			header('location:'.URL.'login');
			exit;
		}
		$cid=$_POST["cid"];
		$submit=$_POST["submit"];
		if ($submit=="accept"){
		$sth=$this->model->accept_comment($cid);	
		}
		else{
		$sth=$this->model->delete_comment($cid);	
		}
		header("Location: ".URL."article/scomment");
	}
	public function rundelete(){
		Session::init();
		if (Session::get('loggedin')==false or !(Session::get('role')=="webadmin")){
			Session::destroy();
			header('location:'.URL.'login');
			exit;
		}
		$post_id=$_POST["post_id"];
		$sth=$this->model->delete($post_id);
		Session::init();
		Session::set("artdelete",TRUE);
		header("Location: ".URL."article/delete");
		}
	public function run(){
		Session::init();
		if (Session::get('loggedin')==false or !(Session::get('role')=="webadmin")){
			Session::destroy();
			header('location:'.URL.'login');
			exit;
		}
	$this->model->run();	
	
	
	}
	public function read($id){
		$this->result1=$this->model->read1($id);
		$this->view->msg=$this->result1;
		$this->result3=$this->model->read4($this->result1["writer"]);
		$this->view->msg3=$this->result3;
		$sth1=$this->model->read2($id);
		$this->view->msg1=$sth1;
		$sth=$this->model->read3($id);
		$this->view->msg2=$sth;
		//echo $this->result1;
		$this->view->heading1=$this->model->read1($id);
		$this->view->heading2=$this->model->read2($id);
		$this->view->heading2=$this->view->heading2->fetch();
		$this->view->heading3=$this->model->read3($id);
		$this->view->heading3=$this->view->heading3->fetch();
		$this->view->render("article/read",true);
		
		}
		
		public function edit(){
		    Session::init();
		    if (Session::get('loggedin')==false or !(Session::get('role')=="webadmin")){
		        Session::destroy();
		        header('location:'.URL.'login');
		        exit;
		    }
		    $sth=$this->model->sarticle();
		    $this->view->msg1=$sth;
		    $this->view->render("article/edit");
		}
		
		/*
		public function editrun($post_id=NULL){
		    $this->loggedin("webadmin");
		    if (isset($_POST["post_id"])){
		        $post_id=$_POST["post_id"];
		    }
		    if(!empty($post_id)){
		        $result=$this->model->read1($post_id);
		        //print_r($result);
		        foreach($result as $key=>$value)
		        {
		            //echo $value;
		            $this->view->$key=$value;//very important
		        }
		        $result1=$this->model->read2($post_id);
		        //print_r($result1);
		        $ab=1;
		        foreach ($result1 as $row){
		            $this->view->{"paragraph".$ab}=$row["text"];//very important
		            //print_r($this->view);
		            $ab=$ab+1;
		        }
		        
		        $result2=$this->model->read3($post_id);
		        //print_r($result1);
		        $ab=1;
		        foreach ($result2 as $row){
		            $this->view->{"pic".$ab}=$row["link"];//very important
		            //print_r($this->view);
		            $ab=$ab+1;
		        }
		        
		        
		        $result2=$this->model->selectsch($addno);
		        $ab=1;
		        foreach ($result2 as $row){
		            $schname=$this->model->schname($row["schid"]);
		            $this->view->{"sch".$ab}=$this->schools("school{$ab}","new{$ab}","schools",$ab,$row["schid"],$schname,$row["s_date"],$row["e_date"]);
		            $ab=$ab+1;
		        }
		        $result3=$this->model->g5($addno);
		        foreach($result3 as $key=>$value)
		        {
		            $this->view->$key=$value;
		        }
		        $this->view->subject6=$this->subjects(6,'R1');
		        $this->view->subject7=$this->subjects(7,'C1');
		        $this->view->subject8=$this->subjects(8,'C2');
		        $this->view->subject9=$this->subjects(9,'C3');
		        $this->view->olyear=$this->years("olyear");
		        //print_r($result);
		        $result6=$this->model->findbro($addno);
		        $ab=1;
		        foreach ($result6 as $row){
		            $this->view->{"bro".$ab}=$row["bro1"];
		            $ab=$ab+1;
		        }
		        if($result["ol_al"]==0){
		            //echo "this is al";
		            $result4=$this->model->selectol($addno);
		            $this->view->exno=$result4["exno"];
		            $this->view->olyear=$this->years("olyear",$result4["year"]);
		            $result5=$this->model->selectolsub($result4["exno"]);
		            $ab=1;
		            foreach ($result5 as $row){
		                //$this->view->{"olsub".$ab}=$row["subid"];
		                $subid=$row["subid"];
		                $this->view->{"res".$subid}=$row["Result"];
		                $this->view->{"myres".$ab}=$row["Result"];
		                $this->view->{"olsubid".$ab}=$row["subid"];
		                $out=$this->model->select_subname($row["subid"]);
		                $this->view->{"olsubname".$ab}=$out["subname"];
		                $this->view->{"olsubtype".$ab}=$out["type"];
		                $ab=$ab+1;
		                if ($out["type"]=="R1"){
		                    $this->view->subject6=$this->subjects(6,'R1',$row["subid"],$out["subname"],$row["Result"]);
		                }
		                if ($out["type"]=="C1"){
		                    $this->view->subject7=$this->subjects(7,'C1',$row["subid"],$out["subname"],$row["Result"]);
		                }
		                if ($out["type"]=="C2"){
		                    $this->view->subject8=$this->subjects(8,'C2',$row["subid"],$out["subname"],$row["Result"]);
		                }
		                if ($out["type"]=="C3"){
		                    $this->view->subject9=$this->subjects(9,'C3',$row["subid"],$out["subname"],$row["Result"]);
		                }
		                
		            }
		            
		            
		        }
		        $this->view->g5years=$this->years("g5year",$this->view->year);
		        $this->view->render("article/editme");
		    }
		    else {
		        echo "<h1>Admission Number Not Defined</h1>";
		    }
		    
		    
		}*/
}
?>