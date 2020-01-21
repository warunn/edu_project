<?php
//NEEDS TO BE UPLOAD
require_once("initial.php");
//require_once("db_details.php");
class pic_comment{
    public $id;
    public $pic_id;
    public $writer;
    public $comment;
    public $visible;
    public $date;
    public $like;
    public static function find_by_pic($pic_id,$post_id){
        $dbCon = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $sql="select * from pic_comment where pic_id={$pic_id} and id={$post_id} and visible=1 order by date DESC";
        //echo $sql;
        $sth=$dbCon->prepare($sql);
        $sth->execute();
        $obj_array=array();
        $obj_array=$sth->fetchAll();
        //print_r($obj_array);
        return $obj_array;
    }
    public static function find_writer($writer){
        $dbCon = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $sql="select * from fbuser where fbid={$writer}";
        //echo $sql."<br>";
        $sth=$dbCon->prepare($sql);
        $sth->execute();
        $obj_array=array();
        $obj_array=$sth->fetch();
        
        return $obj_array;
    }
}
?>