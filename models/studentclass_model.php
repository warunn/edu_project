<?php
class studentclass_model extends model{
   
   public function __construct()
    {
        parent::__construct();
        Session::init();
        if (Session::get('loggedin')==false or !(Session::get('role')=="admin")){
            Session::destroy();
            header('location:'.URL.'login');
            exit;
        }
    }

    public function teacherList()
    {
        $sth = $this->db->prepare('SELECT * FROM teacher');
        $sth->execute();
        return $sth->fetchAll();
    }

    public function insert_new_class($name,$year,$no_of_student,$medium,$class_teacher_id)
    {
        $sth=$this->db->prepare("insert into class(name,year,no_of_student,medium,class_teacher_id) values(:name,:year,:no_of_student,:medium,:class_teacher_id)");
        $sth->execute(array(':name'=>$name,
            ':year'=>$year,
            ':no_of_student'=>$no_of_student,
            ':medium'=>$medium,
            ':class_teacher_id'=>$class_teacher_id))or die(print_r($sth->errorInfo(), true)); 
        return  $this->db->lastInsertId();

    }

    public function get_class_details($class_id){
        $sth = $this->db->prepare("SELECT * FROM class WHERE class_id=$class_id");
        $sth->execute();
        return $sth->fetchAll();
    }

    public function get_all_classess($class_id,$year){
        $sth = $this->db->prepare("SELECT * FROM class WHERE class_id!=$class_id AND year!=$year");
        $sth->execute();
        return $sth->fetchAll();
    }

    public function get_all_students($year){
        $sth = $this->db->prepare("SELECT * FROM student");
        $sth->execute();
        return $sth->fetchAll();
    }

    public function getassignstudent($stuid,$year){
        $sth = $this->db->prepare("SELECT * FROM studentt_classes WHERE stuid=$stuid AND year=$year");
        $sth->execute();
        return $sth->fetchAll();
    }

    public function assign_student_to_new_class($stuid,$class_id,$year){

        $sth=$this->db->prepare("insert into studentt_classes(stuid,classid,year) values(:stuid,:classid,:year)");
        $sth->execute(array(':stuid'=>$stuid,
            ':classid'=>$class_id,
            ':year'=>$year))or die(print_r($sth->errorInfo(), true)); 
        return  $this->db->lastInsertId();

    }


    public function getstudentvalid($stuid){

        $sth = $this->db->prepare("SELECT * FROM student WHERE stid=$stuid");
        $sth->execute();
        return $sth->fetchAll();
    }


    public function getnoofassignstudent($class_id, $year){
        $sth = $this->db->prepare("SELECT * FROM studentt_classes WHERE classid=$class_id AND year=$year");
        $sth->execute();
        return $sth->fetchAll();
    }

    public function getstudentsofclass($class_id){

        $sth = $this->db->prepare("SELECT * FROM studentt_classes WHERE classid=$class_id");
        $sth->execute();
        return $sth->fetchAll();

    }


       
}
?>