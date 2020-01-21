<?php

class Login_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function run(){
		//print_r($_POST);
		/*if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])):
               // echo $_POST['recaptcha'];
                //echo "<br/><p>abc</p>";
                    //your site secret key
                    $secret = '6Lc1bjMUAAAAAKWxjxBBOMx3KFLBR0SEJYXYUuWl';
                    //get verify response data
                    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
                    $responseData = json_decode($verifyResponse);
                    //echo $verifyResponse;
                    //print_r($responseData);
                    if($responseData->success):*/
		$uname=$_POST['uname'];
		$pass=$_POST['password'];
		//$sth=$this->db->prepare('select * from users');
		$sth=$this->db->prepare('select id,role from users where login= :uname and password= MD5(:pass)');
		//print_r($_POST);
		$sth->execute(array(':uname'=> $uname,
				    ':pass'=> $pass));
		//print_r($sth);
		$data=$sth->fetch();
		//print_r($data);
		$count=$sth->rowCount();
		//echo $count;
		if ($count>0){
			Session::init();
			Session::set("loggedin",true);
			Session::set("uid",$data["id"]);
			Session::set("role",$data["role"]);
			$role=$data["role"];
			header('location:'.URL.'dashboard/'.$role);
		}
		else{
			header('location:'.URL.'login/error');
			
		}
		/*else:
		echo "option 1";
		header('location:'.URL.'login/error');
		endif;
		else:
		header('location:'.URL.'login/error');
		endif;*/
		
		
	}	
	
}