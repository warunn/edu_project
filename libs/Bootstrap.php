<?php

class Bootstrap {

	function __construct() {

		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url, '/');
		$url = explode('/', $url);

		//print_r($url);
		Session::init();
		if (empty($url[0])) {
			require 'controllers/index.php';
			$controller = new Index();
			$controller->index();
			return false;
		}
//check the controller
		$file = 'controllers/' . $url[0] . '.php';
		if (file_exists($file)) {
			require $file;//load the controller
		} else {
			$this->error();
		}
		
		$controller = new $url[0];//make controller array
		$controller->loadModel($url[0]);//name new model (DB connection)--------

		// this is the edit begin
		if (isset($url[3])){
		    if (method_exists($controller, $url[1])) {
		        $controller->{$url[1]}($url[2],$url[3]);
		    } else {
		        $this->error();
		    }
		}
		//this is the edit end
		else if (isset($url[2])) {
			if (method_exists($controller, $url[1])) {
				$controller->{$url[1]}($url[2]);
			} else {
				$this->error();
			}
		} else {
			if (isset($url[1])) {
				if (method_exists($controller, $url[1])) {
					$controller->{$url[1]}();
				} else {
					$this->error();
				}
			} else {
				$controller->index();
			}
		}
		
		
	}
	
	function error() {
		require 'controllers/error.php';
		$controller = new Error();
		$controller->index();
		return false;
	}

}