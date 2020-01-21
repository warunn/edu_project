<?php

class Controller {

	function __construct() {
		//echo 'Main controller<br />';
		//$this->controller= new Controller;
		$this->view = new View();
	}
	
	public function loadModel($name) {
		
		$path = 'models/'.$name.'_model.php';
		
		if (file_exists($path)) {
			require 'models/'.$name.'_model.php';
			
			$modelName = $name . '_Model';
			$this->model = new $modelName();
		}		
	}
	public function loggedin($role1=NULL,$role2=NULL,$role3=Null){
		Session::init();
		if(isset($role3)){
		    if (!( Session::get('loggedin')==TRUE and (Session::get('role')==$role1 or Session::get('role')==$role2 or Session::get('role')==$role3 ))){
		        Session::destroy();
		        header('location:'.URL.'login');
		        exit;
		    }
		    
		}
		elseif (isset($role2)){
		    if (!( Session::get('loggedin')==TRUE and (Session::get('role')==$role1 or Session::get('role')==$role2 ))){
		        Session::destroy();
		        header('location:'.URL.'login');
		        exit;
		    }
		}
		elseif (isset($role1)){
		    if (!( Session::get('loggedin')==TRUE and Session::get('role')==$role1 )){
		        Session::destroy();
		        header('location:'.URL.'login');
		        exit;
		    }
		}
		else {
		    Session::destroy();
		    header('location:'.URL.'login');
		    exit;
		}
	}
	

}