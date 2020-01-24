<?php


class viewpost_model extends model
{

    public function __construct(){
        parent::__construct();

    }

    public function GetAllArticles(){
        $query="SELECT post_id, topic FROM article";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetchAll();
        return $final;
    }

    public function GetAllPostByID($id){
        $query="SELECT COUNT(p.post_id),p.post_time,a.topic
                FROM post_counts p   
                INNER JOIN article a 
                ON p.post_id = a.post_id
                WHERE p.post_id = '{$id}'
                GROUP BY p.post_time";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetchAll();
        return $final;
    }

}