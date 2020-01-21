<?php
class lesson_model extends model{
    public $post_id=0;
    public function __construct(){
        parent::__construct();
    }
    public  function  ins_lesson($subid,$lessonid,$difficulty,$topic){
        $sth=$this->db->prepare("insert into lesson(subid,lessonid,topic,difficulty) values(:subid,:lessonid,:topic,:difficulty)");
        $sth->execute(array(':subid'=>$subid,
            ':lessonid'=>$lessonid,
            ':topic'=>$topic,
            ':difficulty'=>$difficulty))or die(print_r($sth->errorInfo(), true));
    }
    public function insertcom($lid,$stopicno,$comlevel,$difficulty,$nop){
        //echo "<b><u>{$difficulty}</u></b>";
        $sth=$this->db->prepare("insert into subtopic(lessonid,subtopicno,subtopic,nop,difficult) values(:lessonid,:stopicno,:topic,:noh,:difficult)");
        $sth->execute(array(':lessonid'=>$lid,
            ':stopicno'=>$stopicno,
            ':topic'=>$comlevel,
            ':noh'=>$nop,
            ':difficult'=>$difficulty))or die(print_r($sth->errorInfo(), true));
    }
    
    
}

?>