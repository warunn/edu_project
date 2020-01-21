<?php
class test_model extends model{
    public $post_id=0;
    public function __construct(){
        parent::__construct();
        
    }
    public  function  ins_test($subname,$mid,$medium,$grade,$cat){
        $sth=$this->db->prepare("insert into test(subname,ministryid,smedium,grade,type) values(:subname,:mid,:medium,:grade,:cat)");
        $sth->execute(array(':subname'=>$subname,
            ':mid'=>$mid,
            ':medium'=>$medium,
            ':grade'=>$grade,
            ':cat'=>$cat))or die(print_r($sth->errorInfo(), true)); 
        return  $this->db->lastInsertId();
    }
    public  function  ins_test2($subname,$mid,$medium,$grade,$cat){
        $sth=$this->db->prepare("insert into test(subname,ministryid,smedium,grade,type) values(:subname,:mid,:medium,:grade,:cat)");
        $sth->execute(array(':subname'=>$subname,
            ':mid'=>$mid,
            ':medium'=>$medium,
            ':grade'=>$grade,
            ':cat'=>$cat))or die(print_r($sth->errorInfo(), true));
        return  $this->db->lastInsertId();
    }
    
    
}

?>