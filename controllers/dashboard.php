<?php
class dashboard extends controller{
	public function __construct(){
		parent::__construct();
		
		//print_r($_SESSION);
	}
	public function admin(){
	    Session::init();
	    if (Session::get('loggedin')==false or Session::get('role')!="admin"){
	        Session::destroy();
	        header('location:'.URL.'login');
	        exit;
	    }
	    //echo "hello";
		$this->view->render('dashboard/index');
	}
	public function webadmin(){
	    Session::init();
	    if (Session::get('loggedin')==false or Session::get('role')!="webadmin"){
	        Session::destroy();
	        header('location:'.URL.'login');
	        exit;
	    }
	    $this->view->render('dashboard/webadmin');
	}

	public function teacher(){
	    Session::init();
	    if (Session::get('loggedin')==false or Session::get('role')!="teacher"){
	        Session::destroy();
	        header('location:'.URL.'login');
	        exit;
	    }
	    $this->view->render('dashboard/teacher');
	}
	
}
?>