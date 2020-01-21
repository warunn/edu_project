<?php
require_once("initial.php");
//require_once("db_details.php");
    
class pic {
    
    public static $table= " pics ";
    public $id;
    public $post_id;
    public $link;
    public $thumb_nail;
    public $like;
    
    
    //public $dbCon;
    public function __construct() {
		
		
	}
    public static function select_title($post){
	try {
        $dbCon = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
         $dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $ex) {
       echo $ex->getMessage();
       die();
        }
	$sql="select topic from article where post_id = {$post} ";
	
	$sth=$dbCon->prepare($sql);
	$sth->execute();
	$obj_array=array();
	$obj_array=$sth->fetch();
	//print_r($obj_array["topic"]);
	return $obj_array["topic"];
    }
    public static function select_by_post($post,$per_page=1,$offset=0){
    $dbCon = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    $sql="select * from ".static::$table." where post_id ={$post} ";
    $sql.="limit {$per_page} ";
    $sql.="offset {$offset} ";
    //echo $sql;
    $sth=$dbCon->prepare($sql);
    $sth->execute();
    $obj_array=array();
    $obj_array=$sth->fetch();
    
    return ($obj_array);
    }
    public static function count_by_post($post_id){
        try {
        $dbCon = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
         $dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $ex) {
       echo $ex->getMessage();
       die();
        }
	
        $sql="select count(*) from ".static::$table." where post_id= {$post_id}";
	//echo $sql;
        $sth=$dbCon->prepare($sql);
        $sth->execute();
        
	$obj_array=array();
        $obj_array=$sth->fetch();
        return array_shift($obj_array);
    }
}
?>