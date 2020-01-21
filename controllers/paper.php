<?php
class paper extends controller{
	public $result1='';
	public $result2='';
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		//$this->loggedin();
		$this->view->render("paper/index");
	}
	public function delete(){
		Session::init();
		
		$sth=$this->model->sarticle();
		$this->view->msg1=$sth;
		$this->view->render("paper/delete");
		}
	public function scomment(){
	    //$this->loggedin();
		$sth=$this->model->scomment1();
		$this->view->msgme=$sth;
		$this->view->render("paper/comment");
		}
	public function runcomment(){
	    //$this->loggedin();
		$cid=$_POST["cid"];
		$submit=$_POST["submit"];
		if ($submit=="accept"){
		$sth=$this->model->accept_comment($cid);	
		}
		else{
		$sth=$this->model->delete_comment($cid);	
		}
		header("Location: ".URL."paper/scomment");
	}
	public function rundelete(){
	    //$this->loggedin();
		$post_id=$_POST["post_id"];
		$sth=$this->model->delete($post_id);
		header("Location: ".URL."paper/delete");
		}
	public function run(){
		//$this->loggedin();		
	Session::set("noq",$_POST["noq"]);
	$paper_id=$this->model->run();
	Session::set("paper_id",$paper_id);
	Session::set("cquestion",1);
	$path = 'controllers/mcq.php';
	if (file_exists($path)) {
	    require 'controllers/mcq.php';
	    $this->mcq = new mcq();
	}	
	$this->mcq->index();
	//header('location:'.URL.'mcq'); 
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
		$this->view->render("paper/read",true);
		}

	}
?>