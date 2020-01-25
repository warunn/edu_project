<?php


class allstudentclass_model extends model
{
    public $post_id=0;
    public function __construct(){
        parent::__construct();

    }

    public function setClasses($batch,$class,$created_year,$std_ID){

        if(true)
        {
            $query="INSERT INTO setclasses (batch, class, created_year) VALUES('{$batch}','{$class}','{$created_year}','{$std_ID}') ON DUPLICATE KEY UPDATE weight=160, desiredWeight=145 ";
            $sth=$this->db->prepare($query);
            $sth->execute();

        }

    }

    public function getStudentIDAccordingtoBatch($batch)
    {
        $query="SELECT `stid` FROM `student` WHERE `batch` = '{$batch}'";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetchAll();
        return $final;

    }



}