<?php

require_once("initial.php");
class post{
    public $topic;
    public $writer;
    public $post_id;
    public $date;
    public $time;
    public $dbCon;
    public static $table= " article ";
    public function __construct(){
        try {
        $this->dbCon = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
         $this->dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $ex) {
       echo $ex->getMessage();
       die();
        }   
    }
    public function paginate($per_page=1,$offset=0){
        $sql="select * from ".static::$table." ";
        $sql.="limit  {$per_page} ";
        $sql.="offset  {$offset}";
        $sth=$this->dbCon->prepare($sql);
        $sth->execute();
        
        //echo $sql;
        $object_array=$sth->fetch();
        //print_r($object_array);
        return $object_array;
    }
    public function readtext($post_id){
        $sql="select text from paragraph where post_id={$post_id}";
        $sth=$this->dbCon->prepare($sql);
        $sth->execute();
        //echo $sql;
        $object_array=$sth->fetch();
        //print_r($object_array);
        $obj=array_shift($object_array);
        return($obj);    
    }
    public function getphoto($post_id){
        $sth=$this->dbCon->prepare("select * from pics where post_id=:id");
        $sth->execute(array(':id'=>$post_id));
        return $sth;
    }
    public function getwriter($writer){
        $sql="select uname from users where id={$writer}";
        $sth=$this->dbCon->prepare($sql);
        $sth->execute();
        //echo $sql;
        $object_array=$sth->fetch();
        //print_r($object_array);
        $obj=array_shift($object_array);
        return($obj); 
    }
    
}
?>