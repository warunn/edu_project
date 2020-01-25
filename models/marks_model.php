<?php


class marks_model  extends model
{
    public $post_id=0;
    public function __construct(){
        parent::__construct();

    }

    public function loadAllTeachers()
    {
        $query = "SELECT `tid`,`name` FROM `teacher` WHERE 1";
        $sth = $this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final = $sth->fetchAll();
        return $final;
    }

    public function getStudentsFromClassTable($teacherID)
    {
        $currentY= date('Y');
        $query = "SELECT s.std_ID,s.created_year, st.fname, s.batch ,s.class ,t.teacher_id
                    FROM setclasses s
                    INNER JOIN student st
                    ON s.std_ID = st.stid
                    INNER JOIN setteachers t
                    ON s.batch=t.batch AND s.class = t.class
                    WHERE t.teacher_id ='{$teacherID}' AND s.created_year = '{$currentY}'";
        $sth = $this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final = $sth->fetchAll();
        return $final;
    }

}

