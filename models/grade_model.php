<?php


class grade_model extends model
{
    public function __construct(){
        parent::__construct();

    }

    public function getMostNewStudentGrades(){
        $query="SELECT COUNT(`stid`),`batch` 
                from student 
                GROUP BY `batch` DESC
                LIMIT 7";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetchAll();
        return $final;
    }


    public function getDataAccordingToBatch($grade)
    {
        $query="SELECT stid , fname , address , batch FROM student WHERE batch = '{$grade}'";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetchAll();
        return $final;
    }
}