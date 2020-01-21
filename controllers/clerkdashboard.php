<?php
class clerkdashboard extends controller{
	public function __construct(){
		parent::__construct();
		Session::init();
		if (Session::get('loggedin')==false or Session::get('role')!="clerk"){
			Session::destroy();
			header('location:'.URL.'login');
			exit;
		}
		//print_r($_SESSION);
	}
	public function index(){
		$this->view->render('clerkdashboard/index');
	}
	
}
?>