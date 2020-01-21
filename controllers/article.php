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
		
		public function editrun($postid=null){
		    if (Session::get('loggedin')==false or !(Session::get('role')=="webadmin")){
		        Session::destroy();
		        header('location:'.URL.'login');
		        exit;
		        
		    }
		    if (null($postid) and isset($_POST["post_id"])){
		        $postid=$_POST["post_id"];
		    }
		    $result1=$this->model->read1($postid);
		    $this->view->result1=$result1;
		    $result2=$this->model->read2($postid);
		    $this->view->result2=$result2;
		    $result3=$this->model->read3($postid);
		    $this->view->result3=$result3;
		    $this->view->aid=$postid;
		    $this->view->render("article/edit");
		    
		}
}
?>