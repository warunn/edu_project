<?php
class teacher_model extends model{
   
    public function __construct(){
        parent::__construct();
        
    }
    public function findname($tname){
        $query="SELECT  * FROM teacher WHERE   MATCH(name) AGAINST ('{$tname}' IN BOOLEAN MODE)";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetchall();
        return $final;   
    }
    public function findadd($add){
        $query="SELECT  * FROM teacher WHERE   MATCH(address) AGAINST ('{$add}' IN BOOLEAN MODE)";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetchall();
        return $final;
    }
    public function findnic($nic){
        $query="SELECT  * FROM teacher WHERE   nic= '{$nic}' ";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetchall();
        return $final;
    }
    public function regteacher($name,$nic,$address,$gender,$uname,$pass,$mobile_tel,$land_tel,$training,$app_sub,$app_date,$sch_date){
        $password=md5($pass);
        $query1="insert into users(role,login,password,uname) values('teacher','{$uname}','{$password}','{$name}')";
        $sth=$this->db->prepare($query1);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $n1= $this->db->lastInsertId();
        $query="insert into teacher(tid,name,nic,address,gender,uname,pass,mobile_tel,land_tel,training,app_sub,app_date,sch_date) values('{$n1}','{$name}','{$nic}','{$address}','{$gender}','{$uname}','{$password}','{$mobile_tel}','{$land_tel}','{$training}','{$app_sub}','{$app_date}','{$sch_date}')";
        //echo $query;
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        //$n1= $this->db->lastInsertId();
        return $n1;
    }
    public function insertmedia($cid){
        $temp=$_FILES["pic"]["tmp_name"];
        $fname=$_FILES["pic"]["name"];
        $tempfile=explode(".", $fname);
        $ext = end($tempfile);
        $dirpath="it455/".$cid;
        if (!file_exists($dirpath)) {
            mkdir($dirpath,0777,true);
        }
        $filepath=$dirpath."/t.".$ext;
        move_uploaded_file($temp,$filepath);
        $sth=$this->db->prepare("update teacher set pic=:file where tid=:tid");
        $sth->execute(array(':file'=>$filepath,
            ':tid'=>$cid));
    }
    public function showtid($tid){
        $query="select * from teacher where tid={$tid}";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetch();
        return $final;
    }
   /* public function stteledit($addno,$htel,$tel){
        if(empty($tel)){
            $query="delete from sttel where addno={$addno} and tel={$htel}";
            $sth=$this->db->prepare($query);
            $sth->execute() or die(print_r($sth->errorInfo(), true));
        }
        else{
            $query="update sttel set tel={$tel} where addno={$addno} and tel={$htel}";
            $sth=$this->db->prepare($query);
            $sth->execute() or die(print_r($sth->errorInfo(), true));
        }
    }
    public function findbro($addno){
        $query="select * from bro where bro={$addno}";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetchall();
        return $final;
    }
    public function  occupations(){
        $quary="select DISTINCT id,name from occupation";
        $sth=$this->db->prepare($quary);
        $ans=$sth->execute() or die(print_r($sth->errorInfo(), true)); 
        return $ans;
    } 
    public function sequery($query){
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetchall();
        return $final;
    }
   
    public function deleteol($haddno,$holno){
        $query="delete from olex where addno={$haddno}";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $query="delete from ol where exno={$holno}";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
    }
    
    public function updateolex($haddno,$holno,$addno,$olno,$olyear){
        $query="update olex set exno={$olno},addno={$addno},year='{$olyear}' where exno={$holno}";
        //echo $query;
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
    }
    public function insol($exno,$sub,$res){
        $query="insert into ol(exno,subid,Result) values({$exno},{$sub},'{$res}')";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
    }*/
   
    
}
?>