<?php
class mcq extends controller{
	public $noq='';
	public $cquestion='';
	public $paper_id='';
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		////$this->loggedin();
		if (!empty(Session::get('cquestion'))){
		$this->noq=Session::get('noq');
		$this->cquestion=Session::get('cquestion');
		
		//print_r($this);
		//Session::delete('cquestion');
			$this->paper_id=Session::get('paper_id');
		}
		if(isset($_POST["next"])){
		    if ($this->noq>$this->cquestion){
		    $this->cquestion=$this->cquestion+1;
		    Session::set('cquestion', $this->cquestion);
		    $this->model->cquestion($this->cquestion,$this->paper_id);
		    }
		    else {
		        $this->view->render("mcq/final");
		    }
		    
		}
			$this->view->paper_id=$this->paper_id;
			$this->view->cquestion=$this->cquestion;
			$this->view->render("mcq/index");	
		
		
		
	}
	/*
	public function delete(){
		Session::init();
		if (Session::get('loggedin')==false or !(Session::get('role')=="programmer")){
			Session::destroy();
			header('location:'.URL.'login');
			exit;
		}
		$sth=$this->model->smcq();
		$this->view->msg1=$sth;
		$this->view->render("mcq/delete");
		}
	public function scomment(){
		Session::init();
		if (Session::get('loggedin')==false or !(Session::get('role')=="programmer")){
			Session::destroy();
			ob_start();
			header('location:'.URL.'login');
			exit;
		}
		$sth=$this->model->scomment1();
		$this->view->msgme=$sth;
		$this->view->render("mcq/comment");
		}
	public function runcomment(){
		Session::init();
		if (Session::get('loggedin')==false or !(Session::get('role')=="programmer")){
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
		header("Location: ".URL."mcq/scomment");
	}
	public function rundelete(){
		Session::init();
		if (Session::get('loggedin')==false or !(Session::get('role')=="programmer")){
			Session::destroy();
			header('location:'.URL.'login');
			exit;
		}
		$post_id=$_POST["post_id"];
		$sth=$this->model->delete($post_id);
		header("Location: ".URL."mcq/delete");
		} */
	public function run(){
	    //print_r($_POST);
	    //print_r($_FILES);
	//$this->loggedin();
	$this->qcode=$this->model->run();
	$this->preview($this->qcode);
	}
	public function preview($qcode){
	//$this->loggedin();
	$qid=$this->read($qcode,$form=false);
	$this->view->cquestion=$this->cquestion;
	$this->view->paper_id=$this->paper_id;
	$this->view->render("mcq/preview");
	}
	public function runedit($qcode){
		//$this->loggedin();
		$qid=$this->model->read1($qcode);
		//print_r($_POST);
		$qid=$qid["qid"];
		//print_r($_FILES);
	$e=1;
	while($e<=7){
		if(isset($_POST["pic{$e}"]) and empty($_FILES["qp{$e}"]["name"]) and $_POST["pic{$e}"]=="1"){
			//echo "delete ".$e."<br/>";
			$this->model->deleteqp($qcode,$qid,$e);
		}
		elseif(isset($_POST["pic{$e}"]) and !empty($_FILES["qp{$e}"]["name"])){
			//echo "update ".$e."<br/>";
			$this->model->updateqp($qcode,$qid,$e);
		}
		elseif(!isset($_POST["pic{$e}"]) and !empty($_FILES["qp{$e}"]["name"])){
			//echo "insert ".$e."<br/>";
			//print_r($_FILES);
			$this->model->insertqp($qcode,$qid,$e);
		}
		$e=$e+1;
	}
	
		
	$e=1;
	while($e<=2){
		if(isset($_POST["question{$e}"]) and empty($_POST["qt{$e}"])){
			$this->model->deletetext("qtext",$qid,$e);
		}
		elseif(isset($_POST["question{$e}"]) and !empty($_POST["qt{$e}"])){
			$this->model->updateqt($qid,$e,$_POST["qt{$e}"]);
		}
		elseif(!isset($_POST["question{$e}"]) and !empty($_POST["qt{$e}"])){
			$this->model->insertqt($qid,$e,$_POST["qt{$e}"]);
		}
		
		$e=$e+1;
	}
	
		
	$e=1;
	while($e<=5){
		if(isset($_POST["option{$e}"]) and empty($_POST["op{$e}"])){
			$this->model->deleteop($qid,$e);
		}
		elseif(isset($_POST["option{$e}"]) and !empty($_POST["op{$e}"])){
			$this->model->updateop($qid,$e,$_POST["op{$e}"]);
		}
		elseif(!isset($_POST["option{$e}"]) and !empty($_POST["op{$e}"])){
			$this->model->insertop($qid,$e,$_POST["op{$e}"]);
		}
		$e=$e+1;
	}
	$e=1;
	while($e<=5){
		if(isset($_POST["ans{$e}"])){
		$this->model->updateans($qid,$e,true);	
		}
		else{
		$this->model->updateans($qid,$e,false);
		}
		$e=$e+1;
	}
	$this->preview($qcode);
	}
	
	public function result($qcode){
		//print_r($_POST);
		if(isset($_POST["option"])){
			
		$this->view->fresult=0;
		$ans=$_POST["option"];
		$this->oresult=$this->model->result($qcode);
		while ($tresult=$this->oresult->fetch()){
			$no=$tresult["optionno"];
			$opans=$tresult["opans"];
			
			
			if($no==$ans and $opans==true){
				$this->view->fresult=1;
			}
			
			if($opans==true){
				$this->view->{"myopt".$no}=1;
			}
			
		}
		$this->read($qcode,$form=false);
		}
		$this->view->render("mcq/result");
	}
	public function mcqedit($qcode){
		//$this->loggedin();
		$this->read($qcode,$form=false);
		//print_r($this->view);
		$this->view->code=$qcode;
		$this->view->render("mcq/edit");
	}
	public function read($qcode,$form=true){
		$this->view->qcode=$qcode;
		$this->result1=$this->model->read1($qcode);
		$this->view->msg=$this->result1;
		$this->result2=$this->model->read2();
		//$this->view->msg3=$this->result3;
		$this->result3=$this->model->read3();
		//$this->view->msg1=$sth1;
		$this->result4=$this->model->read4();
		$this->result5=$this->model->read5(); 
		
		//$this->view->msg2=$sth;
		//echo $this->result1;
		while ($tresult=$this->result2->fetch()){
			$x=$tresult["tno"];
			//echo $x;
			$this->view->{"qt".$x}=$tresult["text"];
			//echo $this->view->qt1;
		}
		while ($tresult=$this->result5->fetch()){
			$x=$tresult["optionno"];
			$this->view->{"opt".$x}=$tresult["optext"];
			
		}
		while ($tresult=$this->result4->fetch()){
			$x=$tresult["optionno"];
			$this->view->{"option".$x}=$tresult["opans"];
			
		}
		while ($tresult=$this->result3->fetch()){
			$x=$tresult["picno"];
			$this->view->{"qp".$x}=URL."i462/".$qcode.$tresult["pic"];
		}
		//print_r($this->view->qt1);
		/*$this->view->heading2=$this->view->heading2->fetch();
		$this->view->heading3=$this->model->read3();
		$this->view->heading3=$this->view->heading3->fetch(); */
		if($form==true){
		$this->view->render("mcq/read");
		}
		} 
}
?>