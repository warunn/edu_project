<?php

class Login extends Controller {

	function __construct() {
		parent::__construct();	
	}
	
	function index() 
	{	
		$this->view->render('login/index');
	}
	
	function run()
	{
		$this->model->run();
	}
	function error(){
		$this->view->msg="Incorrect User Name or Password";
		$this->view->render('login/index');
	}
	public function logout(){
	    Session::destroy();
	    header('location:'.URL.'login');
	    exit;
	}

}