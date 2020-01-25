<?php


class allstudentclass_model extends model
{
    public $post_id = 0;

    public function __construct()
    {
        parent::__construct();

    }

    public function setClasses($batch, $class, $created_year, $std_ID)
    {

        if (true) {
            try {
                $query = "INSERT INTO setclasses (batch, class, created_year,std_ID) VALUES('{$batch}','{$class}','{$created_year}','{$std_ID}') ON DUPLICATE KEY UPDATE batch='{$batch}', class='{$class}',created_year='{$created_year}',std_ID='{$std_ID}' ";
                //$query = "INSERT INTO setclasses (batch, class, created_year,std_ID) VALUES('{$batch}','{$class}','{$created_year}','{$std_ID}')";
                $sth = $this->db->prepare($query);
                $sth->execute();
            } catch (Exception $e) {
                print_r($e);
            }
        }

    }

    public function getStudentIDAccordingtoBatch($batch)
    {
        $query = "SELECT `stid` FROM `student` WHERE `batch` = '{$batch}'";
        $sth = $this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final = $sth->fetchAll();
        return $final;
    }

    public function getClassStudent($batch, $class)
    {
//        $query="SELECT s.batch , s.class , st.fname
//                FROM setclasses s
//                INNER JOIN student st
//                ON s.std_ID = st.stid
//                WHERE s.batch='{$batch}' AND s.class={'$class'}";

        $query = "SELECT s.batch , s.class ,s.created_year , st.fname FROM setclasses s 
                INNER JOIN student st 
                ON s.std_ID = st.stid 
                WHERE s.batch='{$batch}' AND s.class='{$class}'";

        $sth = $this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final = $sth->fetchAll();
        return $final;

    }

    public function loadAllTeachers()
    {
        $query = "SELECT `tid`,`name` FROM `teacher` WHERE 1";
        $sth = $this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final = $sth->fetchAll();
        return $final;
    }

    public function setTeachers($teacherID,$class,$batch)
    {
        try {
            $currentYear = date('Y');
            $query = "INSERT INTO setteachers (	teacher_id, class, batch , current_year) VALUES('{$teacherID}','{$class}','{$batch}','{$currentYear}') ON DUPLICATE KEY UPDATE teacher_id='{$teacherID}', class='{$class}',batch='{$batch}',current_year='{$currentYear}'";
            //$query = "INSERT INTO setclasses (batch, class, created_year,std_ID) VALUES('{$batch}','{$class}','{$created_year}','{$std_ID}')";
            $sth = $this->db->prepare($query);
            $sth->execute();
        } catch (Exception $e) {

        }
    }




}