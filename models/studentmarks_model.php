<?php
class studentmarks_model extends model{
   
   public function __construct()
    {
        parent::__construct();
        Session::init();
        if (Session::get('loggedin')==false or !(Session::get('role')=="teacher")){
            Session::destroy();
            header('location:'.URL.'login');
            exit;
        }
    }
    public function postMarksTODB($std_id,$subjects,$term,$marks,$batch,$class,$Created_year)
    {
        try {
            $sth = $this->db->prepare("INSERT INTO `marks`(`std_id`, `subjects`, `term`, `marks`, `batch`, `class`, `Created_year`)
                VALUES ('{$std_id}','{$subjects}','{$term}','{$marks}','{$batch}','{$class}','{$Created_year}')");
            $sth->execute();
        } catch (Exception $e) {
        }

    }


    public function classList($uid){

        $sth = $this->db->prepare("SELECT * FROM class WHERE class_teacher_id=$uid");
        $sth->execute();
        return $sth->fetchAll();

    }


    public function studentList($class_id){
        $sth = $this->db->prepare("SELECT * FROM studentt_classes WHERE classid=$class_id");
        $sth->execute();
        return $sth->fetchAll();
    }


    public function studentbyid($stu_id){
        $sth = $this->db->prepare("SELECT * FROM student WHERE stid=$stu_id");
        $sth->execute();
        return $sth->fetchAll();
    }

    public function getsubjectMain(){
        $sth = $this->db->prepare('SELECT * FROM subject WHERE type="Main"');
        $sth->execute();
        return $sth->fetchAll();
    }

    public function getsubjectC1(){
        $sth = $this->db->prepare('SELECT * FROM subject WHERE type="C1"');
        $sth->execute();
        return $sth->fetchAll();
    }

    public function getsubjectC2(){
        $sth = $this->db->prepare('SELECT * FROM subject WHERE type="C2"');
        $sth->execute();
        return $sth->fetchAll();
    }

    public function getsubjectC3(){
        $sth = $this->db->prepare('SELECT * FROM subject WHERE type="C3"');
        $sth->execute();
        return $sth->fetchAll();
    }

    public function getsubjectL1(){
        $sth = $this->db->prepare('SELECT * FROM subject WHERE type="L1"');
        $sth->execute();
        return $sth->fetchAll();
    }

    public function getsubjectR1(){
        $sth = $this->db->prepare('SELECT * FROM subject WHERE type="R1"');
        $sth->execute();
        return $sth->fetchAll();
    }

    public function getstudentmark($stuid,$class_id,$subid,$term){
        $sth = $this->db->prepare("SELECT * FROM student_marks WHERE stuid=$stuid AND subid=$subid AND classid=$class_id AND termid=$term");
        $sth->execute();
        return $sth->fetchAll();
    }

    public function addmarktosub($stuid,$class_id,$subid,$term,$mark){
        $sth=$this->db->prepare("insert into student_marks(stuid,subid,classid,termid,mark) values(:stuid,:subid,:classid,:termid,:mark)");
        $sth->execute(array(':stuid'=>$stuid,
            ':subid'=>$subid,
            ':classid'=>$class_id,
            ':termid'=>$term,
            ':mark'=>$mark))or die(print_r($sth->errorInfo(), true)); 
        return  $this->db->lastInsertId();
    }

    public function getTotalmarksTerm1($stu_id,$class_id){
        $sth = $this->db->prepare("SELECT SUM(mark) AS total FROM student_marks WHERE stuid=$stu_id AND classid=$class_id AND termid=1");
        $sth->execute();
        return $sth->fetchAll();   
    }

    public function getTotalmarksTerm2($stu_id,$class_id){
        $sth = $this->db->prepare("SELECT SUM(mark) AS total FROM student_marks WHERE stuid=$stu_id AND classid=$class_id AND termid=2");
        $sth->execute();
        return $sth->fetchAll(); 
    }

    public function getTotalmarksTerm3($stu_id,$class_id){
        $sth = $this->db->prepare("SELECT SUM(mark) AS total FROM student_marks WHERE stuid=$stu_id AND classid=$class_id AND termid=3");
        $sth->execute();
        return $sth->fetchAll(); 
    }

    public function getAvgmarksTerm1($stu_id,$class_id){
        $sth = $this->db->prepare("SELECT AVG(mark) AS avg FROM student_marks WHERE stuid=$stu_id AND classid=$class_id AND termid=1");
        $sth->execute();
        return $sth->fetchAll(); 
    }

    public function getAvgmarksTerm2($stu_id,$class_id){
        $sth = $this->db->prepare("SELECT AVG(mark) AS avg FROM student_marks WHERE stuid=$stu_id AND classid=$class_id AND termid=2");
        $sth->execute();
        return $sth->fetchAll(); 
    }
    public function getAvgmarksTerm3($stu_id,$class_id){
        $sth = $this->db->prepare("SELECT AVG(mark) AS avg FROM student_marks WHERE stuid=$stu_id AND classid=$class_id AND termid=3");
        $sth->execute();
        return $sth->fetchAll(); 
    }

          
}
?>