<?php


class test01_model extends model
{
    public $post_id=0;
    public function __construct(){
        parent::__construct();

    }

    public function findname($tname){
        $query="SELECT  * FROM teacher WHERE   MATCH(name) AGAINST ('K.V. Mahinda' IN BOOLEAN MODE)";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetch();
        return $final;
    }
}