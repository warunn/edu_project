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
	
	public function read($id,$edit=NULL){
	    
	    if($edit==TRUE){
	        //print_r($_POST);
	        //echo "hello";
	        $id=$_POST["post_id"];
	    }
	    else if($id==null and !isset($_POST["post_id"])){
	        //echo "hello";
	        //print_r($_POST);
	        header('location:'.URL);
	    } 
	  //echo $id;
		$this->result1=$this->model->read1($id);
		$this->view->msg=$this->result1;
		$this->result3=$this->model->read4($this->result1["writer"]);
		$this->view->msg5=$this->result1["writer"];
		$this->view->msg3=$this->result3;
		$sth1=$this->model->read2($id);
		$this->view->msg1=$sth1;
		$sth=$this->model->read3($id);
		$this->view->msg2=$sth;
		$this->view->post_id=$id;
		//echo $this->result1;
		$this->view->heading1=$this->model->read1($id);
		$this->view->heading2=$this->model->read2($id);
		$this->view->heading2=$this->view->heading2->fetch();
		$this->view->heading3=$this->model->read3($id);
		$this->view->heading3=$this->view->heading3->fetch();
		$this->view->post_id=$id;
		if (!empty($edit)){
		    //print_r($this->view);
		    $this->view->render("article/editme");
		}
		else {
		    //print_r($this->view);
		$this->view->render("article/read",true);
		}
		
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
		    if (empty($postid) and isset($_POST["post_id"])){
		        $postid=$_POST["post_id"];
		    }
		    //echo $postid;
		    //print_r($_POST);
		    
		        //$this->loggedin();
		       
		        //print_r($_POST);
		      
		        //print_r($_FILES);
		    if(isset($_POST["topic"])){
		        $this->model->updatear($postid,$_POST["topic"],$_POST["writer"],$_POST["writerno"]);
		    }
		    
		        $e=1;
		        while($e<=3){
		            if(isset($_POST["phara{$e}"]) and empty($_POST["p{$e}"])){
		                $this->model->deletetext("paragraph",$postid,$_POST["phara{$e}"]);
		            }
		            elseif(isset($_POST["phara{$e}"]) and !empty($_POST["p{$e}"])){
		                $this->model->updatep($postid,$_POST["phara{$e}"],$_POST["p{$e}"]);
		            }
		            elseif(!isset($_POST["phara{$e}"]) and !empty($_POST["p{$e}"])){
		                $this->model->insertp($postid,$_POST["p{$e}"]);
		            }
		            
		            $e=$e+1;
		        }
		       // print_r($_FILES);
		        
		        $e=1;
		        while($e<=15){
		            //echo $_FILES["npic{$e}"];
		            if(isset($_POST["pic{$e}"]) and empty($_FILES["npic{$e}"]) and $_POST["pi{$e}"]=="1" and $e>3){
		                //echo "delete ".$e."<br/>";
		                $this->model->deletepic($postid,$_POST["pic{$e}"],$e);
		            }
		            elseif(isset($_POST["pic{$e}"]) and !empty($_FILES["npic{$e}"])){
		                //echo "update ".$e."<br/>";
		                $this->model->updatepic($postid,$_POST["pic{$e}"],$e);
		            }
		            elseif(!isset($_POST["pic{$e}"]) and !empty($_FILES["npic{$e}"])){
		                //echo "insert ".$e."<br/>";
		                //print_r($_FILES);
		                $this->model->insertpic($postid,$_POST["pic{$e}"],$e);
		            }
		            $e=$e+1;
		        }
		        
		        
		        Session::init();
		        Session::set("artedit",TRUE);
		        header("Location: ".URL."article/edit");
		     
		        
		        //$this->preview($qcode);
		    
		    
		    
		} 
}
?>