<?php
class miscase_model extends model{
    
    public function __construct(){
        parent::__construct();    
    }
    public function insertcase($title,$date,$details,$location,$type){
        $query="insert into miscase(title,date,details,location,type) values('{$title}','{$date}','{$details}','{$location}','{$type}')";
        //echo $query;
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $n1= $this->db->lastInsertId();
        return $n1;
    }
    public function insertpst($id,$addno,$detail){
        $query="insert into pstudent(caseid,addno,details) values({$id},{$addno},'{$detail}')";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
    }
    public function showreport($caseid){
        $query="select * from miscase where misid={$caseid}";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetch();
        return $final;
    }
    public function mediareport($caseid){
        $query="select * from media where caseid={$caseid}";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetchall();
        return $final;
    }
    public function showname($addno){
        $query="select nameint from student where stid={$addno}";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetch();
        return $final["nameint"];
    }
    public function pstreport($caseid){
        $query="select * from pstudent where caseid={$caseid}";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetchall();
        return $final;
    }
    public function insertmedia($cid,$mid){
        ${"temp".$mid}=$_FILES["media{$mid}"]["tmp_name"];
        //echo ${"temp".$mid};
        $dirpath="i466/".$cid;
        ${"fname".$mid}=$_FILES["media{$mid}"]["name"];
        $temp=explode(".", ${"fname".$mid});
        $ext = end($temp);
        if (!file_exists($dirpath)) {
            mkdir($dirpath,0777,true);
        }
        $filepath=$dirpath."/".$mid.".".$ext;
        move_uploaded_file(${"temp".$mid},$filepath);
        $sth=$this->db->prepare("insert into media(caseid,mid,link,type) values(:caseid,:mid,:link,:type)");
        $sth->execute(array(':caseid'=>$cid,
            ':mid'=>$mid,
            ':link'=>$filepath,
            ':type'=>$ext));
        
    }
}