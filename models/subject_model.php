<?php
class subject_model extends model{
    public $post_id=0;
    public function __construct(){
        parent::__construct();
        
    }
    public  function  ins_sub($subname,$mid,$medium,$cat){
        $sth=$this->db->prepare("insert into subject(subname,ministryid,medium,type) values(:subname,:mid,:medium,:cat)");
        $sth->execute(array(':subname'=>$subname,
            ':mid'=>$mid,
            ':medium'=>$medium,
            ':cat'=>$cat))or die(print_r($sth->errorInfo(), true)); 
        return  $this->db->lastInsertId();
    }
    
    
}

?>