<?php
class search_model extends model{
    public function __construct(){
        parent::__construct();    
    }
    public function addnorun($addno){
        $query="select * from student where stid={$addno}";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetchall();
        return $final;
    }
    public function selecttel($addno){
        $query="select  * from sttel where addno={$addno}";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetchall();
        return $final;
    }
    public function g5($addno){
        $query="select  * from grade5 where addno={$addno}";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetch();
        return $final;
    }
    public function findbro($addno){
        $query="select * from bro where bro={$addno}";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetchall();
        return $final;
    }
    public function selectsch($addno){
        $query="select  * from school_student where stid={$addno}";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetchall();
        return $final;
    }
    public function schname($schid){
        $query="select  school_name from schools where id={$schid}";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetch();
        return $final["school_name"];
    }
    public function selectolsub($exno){
        $query="select * from ol where exno={$exno}";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetchall();
        return $final;
    }
    public function selectol($addno){
        $query="select * from olex where addno={$addno}";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetch();
        return $final;
    }
    public function selectpic($addno){
        $query = "SELECT data FROM pic WHERE id={$addno}";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetch();
        return $final;
 
    }
    public function select_subname($mysub){
        $query="select subname,type from subject where subid={$mysub}";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetch();
        return $final;
    }
    public function selectpid($pid){
        $query="select * from parents Where id={$pid}";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetch();
        return $final;
    }
    public function createindex(){
        $query="select FULLTEXT INDEX fx_name from student";
        $sth=$this->db->prepare($query);
        $result=$sth->execute() or die(print_r($sth->errorInfo(), true));
        if(empty($result)){
            $query="CREATE FULLTEXT INDEX fx_name ON student (fname)";
            $sth=$this->db->prepare($query);
            $sth->execute() or die(print_r($sth->errorInfo(), true));
        }
        
    }
    public function findtown($town){
        $query="SELECT  * FROM    student WHERE   MATCH(town) AGAINST ('{$town}' IN BOOLEAN MODE)";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetchall();
        //echo "hello";
        return $final;
        
    }
    public function findintname($intname){
        $query="SELECT  * FROM    student WHERE   MATCH(nameint) AGAINST ('{$intname}' IN BOOLEAN MODE)";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetchall();
        //echo "hello";
        return $final;
        
    }
    public function findfullname($fullname){
        $query="SELECT  * FROM    student WHERE   MATCH(fname) AGAINST ('{$fullname}' IN BOOLEAN MODE)";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetchall();
        //echo "hello";
        return $final;
       
    }
    public function findocc($occ){
        $query="select ocnm from occupation where id={$occ}";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetch();
        return $final["ocnm"];
    }
}
?>