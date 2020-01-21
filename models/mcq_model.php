<?php
class mcq_model extends model{
    public $post_id=0;
    public function __construct(){
        parent::__construct();
        
    }
    public  function  cquestion($cq,$pid){
        $sth=$this->db->prepare("update qpaper set cqid=:cq where paperid=:pid");
        $sth->execute(array(':cq'=>$cq,
            ':pid'=>$pid)) or die(print_r($sth->errorInfo(), true));;
            
    }
    /*
public function scomment1(){
    $sql="select * from pic_comment where visible=0 order by date desc";
    $sth=$this->db->prepare($sql);
    $sth->execute();
    return $sth;
    }    
public function delete_comment($cid){
    $sql="delete from pic_comment where cid={$cid}";
    $sth=$this->db->prepare($sql);
    $sth->execute();
}
public function accept_comment($cid){
    $sql="update pic_comment set visible=1 where cid={$cid}";
    $sth=$this->db->prepare($sql);
    $sth->execute();
    
}
public function smcq(){
    $sql="select * from mcq order by date desc";
    $sth=$this->db->prepare($sql);
    $sth->execute();
    return $sth;
    }    
public function delete($aid){
    $sql="delete from mcq where post_id={$aid}";
    $sth=$this->db->prepare($sql);
    $sth->execute();
    $sql="delete from pic_comment where post_id={$aid}";
    $sth=$this->db->prepare($sql);
    $sth->execute();
    $sql="delete from pic where post_id={$aid}";
    $sth=$this->db->prepare($sql);
    $sth->execute();
    $sql="delete from paragraph where post_id={$aid}";
    $sth=$this->db->prepare($sql);
    $sth->execute();
    $dirpath="pic/".$aid;
    array_map('unlink',glob("$dirpath/*.*"));
    rmdir($dirpath);
    return "success";
    
}
                                     */
    public function run(){
        //print_r($_POST);
        $question1=$_POST["qt1"];
        $question2=$_POST["qt2"];
        $difficult=$_POST["diff"];
        $time=$_POST["time"];
        $cdate=date("Y-m-d");
        $ctime=date("h:i:sa");
        while(true){
                $index=bin2hex(random_bytes(64));
                $sth=$this->db->prepare("select * from question where qcode=:index");
                $sth->execute(array(':index'=>$index));
                $result=$sth->fetch();
                if(empty($result)){
                    break;
                }
                }
        
        $sth=$this->db->prepare("insert into question(qcode,difficulty,time,cdate,ctime) values(:qcode,:difficulty,:time,:cdate,:ctime)");
        $sth->execute(array(':qcode'=>$index,
                            ':difficulty'=>$difficult,
                            ':time'=>$time,
                            ':cdate'=>$cdate,
                            ':ctime'=>$ctime))or die(print_r($sth->errorInfo(), true));
        $this->qid=$this->db->lastInsertId();
        //echo $this->qid;
        $this->paper_id=Session::get('paper_id');
        $sth=$this->db->prepare("insert into question_paper(qid,pid) values(:qid,:pid)");
        $sth->execute(array(':qid'=>$this->qid,
            ':pid'=>$this->paper_id)) or die(print_r($sth->errorInfo(), true));
        
        $p=1;
        $s=0;
        $pageno=1;
        while ($p<=7){
        ${"temp".$p}=$_FILES["qp{$p}"]["tmp_name"];
        if (!empty(${"temp".$p})){
            $dirpath="i462/".$index;
            /*if($s==0){
                
                
                $sth=$this->db->prepare("update question set folder=:index where qid=:qid");
                $sth->execute(array(':index'=>$index,
                                    ':qid'=>$this->qid)); 
                $s=1;
            }*/
            ${"fname".$p}=$_FILES["qp{$p}"]["name"];
            ${"fsize".$p}=$_FILES["qp{$p}"]["size"];
            $temp=explode(".", ${"fname".$p});
            $ext = end($temp);
            
            if (!file_exists($dirpath)) {
                mkdir($dirpath,0777,true);
            }
            $filepath=$dirpath."/".$p.".".$ext;
            move_uploaded_file(${"temp".$p},$filepath);
            $filename="/".$p.".".$ext;
            $sth=$this->db->prepare("insert into qpic(qid,picno,pic,type,size) values(:qid,:picno,:pic,:type,:size)");
            $sth->execute(array(':qid'=>$this->qid,
                            ':picno'=>$p,
                            ':pic'=>$filename,
                            ':type'=>$ext,
                            ':size'=>${"fsize".$p}));
            
        }
        
        $p=$p+1;  
        }
        
        if (!empty($question1)){
            
            $sth=$this->db->prepare("insert into qtext(qid,tno,text) values(:qid,:tno,:text)");
            //print_r($sth);
            $sth->execute(array(':qid'=>$this->qid,
                            ':tno'=>1,
                            ':text'=>$question1))or die(print_r($sth->errorInfo(), true)); 
        }
        
        if (!empty($question2)){
            //echo $question2;
            $sth=$this->db->prepare("insert into qtext(qid,tno,text) values(:qid,:tno,:text)");
            //echo $sth;
            $sth->execute(array(':qid'=>$this->qid,
                            ':tno'=>2,
                            ':text'=>$question2))or die(print_r($sth->errorInfo(), true));
            
        }
        
        //${"fname".$p}  $_FILES["file{$p}"] $sth=$this->db->prepare($sql);
        
        $a=0;
        while($a<5){
            
                $b=$a+1;
            if(isset($_POST["ans{$b}"])){
                $ans=true;                
            }
            else{
                $ans=false;
            }
                   
                    $sth=$this->db->prepare("insert into optext(qid,optionno,opans) values(:qid,:opno,:opans)");
                    $sth->execute(array(':qid'=>$this->qid,
                            ':opno'=>$b,
                            ':opans'=>$ans))or die(print_r($sth->errorInfo(), true));
                    if(!empty($_POST["op{$b}"])){
                        $sth=$this->db->prepare("insert into optiontext(qid,optionno,optext) values(:qid,:opno,:optext)");
                        $sth->execute(array(':qid'=>$this->qid,
                            ':opno'=>$b,
                            ':optext'=>$_POST["op{$b}"]))or die(print_r($sth->errorInfo(), true));
                    }
             $a=$a+1;
            }
            return $index;
        } 
        public function deletetext($table,$qid,$tno){
            
             $sth=$this->db->prepare("delete from ".$table." where qid=".$qid." and tno=".$tno."");
             
             $sth->execute()or die(print_r($sth->errorInfo(), true));;
             
        }
        public function updateqt($qid,$tno,$data){
             $sth=$this->db->prepare("update qtext set text=:text where qid=:qid and tno=:tno");
             $sth->execute(array(':qid'=>$qid,
                            ':tno'=>$tno,
                            ':text'=>$data))or die(print_r($sth->errorInfo(), true));
        }
        public function insertqt($qid,$tno,$data){
            $sth=$this->db->prepare("insert into qtext(qid,tno,text) values(:qid,:tno,:text)");
            $sth->execute(array(':qid'=>$qid,
                            ':tno'=>$tno,
                            ':text'=>$data))or die(print_r($sth->errorInfo(), true)); 
        }
        public function deleteop($qid,$tno){
             $sth=$this->db->prepare("delete from optiontext where qid=:qid and optionno=:tno");
             $sth->execute(array(':qid'=>$qid,
                            ':tno'=>$tno))or die(print_r($sth->errorInfo(), true));
        }
        public function updateop($qid,$tno,$data){
             $sth=$this->db->prepare("update optiontext set optext=:text where qid=:qid and optionno=:tno");
             $sth->execute(array(':qid'=>$qid,
                            ':tno'=>$tno,
                            ':text'=>$data))or die(print_r($sth->errorInfo(), true));
        }
        public function insertop($qid,$tno,$data){
            $sth=$this->db->prepare("insert into optiontext(qid,optionno,optext) values(:qid,:tno,:text)");
            $sth->execute(array(':qid'=>$qid,
                            ':tno'=>$tno,
                            ':text'=>$data))or die(print_r($sth->errorInfo(), true)); 
        }
        public function updateans($qid,$tno,$data){
             $sth=$this->db->prepare("update optext set opans=:text where qid=:qid and optionno=:tno");
             $sth->execute(array(':qid'=>$qid,
                            ':tno'=>$tno,
                            ':text'=>$data))or die(print_r($sth->errorInfo(), true));
        }
        public function updateqp($qcode,$qid,$p){
            ${"temp".$p}=$_FILES["qp{$p}"]["tmp_name"];
            //echo ${"temp".$p};
            if (!empty(${"temp".$p})){
            $dirpath="i462/".$qcode;
            ${"fname".$p}=$_FILES["qp{$p}"]["name"];
            ${"fsize".$p}=$_FILES["qp{$p}"]["size"];
            $temp=explode(".", ${"fname".$p});
            $ext = end($temp);
             if (!file_exists($dirpath)) {
                mkdir($dirpath,0777,true);
            }
            $filepath=$dirpath."/".$p.".".$ext;
            move_uploaded_file(${"temp".$p},$filepath);
            }
        }
        
         public function insertqp($qcode,$qid,$p){
            //echo "hello";
            //echo $qcode." ".$qid." ".$p;
            
            ${"temp".$p}=$_FILES["qp{$p}"]["tmp_name"];
            //echo $_FILES["qp{$p}"]["name"];
            //echo ${"temp".$p};
            //if (!empty(${"temp".$p})){
            $dirpath="i462/".$qcode;
            ${"fname".$p}=$_FILES["qp{$p}"]["name"];
            ${"fsize".$p}=$_FILES["qp{$p}"]["size"];
            $temp=explode(".", ${"fname".$p});
            $ext = end($temp);
             if (!file_exists($dirpath)) {
                mkdir($dirpath,0777,true);
            }
            $filepath=$dirpath."/".$p.".".$ext;
            move_uploaded_file(${"temp".$p},$filepath);
            $filename="/".$p.".".$ext;
            $sth=$this->db->prepare("insert into qpic(qid,picno,pic,type,size) values(:qid,:picno,:pic,:type,:size)");
            $sth->execute(array(':qid'=>$qid,
                            ':picno'=>$p,
                            ':pic'=>$filename,
                            ':type'=>$ext,
                            ':size'=>${"fsize".$p}));
        //}
         }
        public function deleteqp($qcode,$qid,$p){
            
            $dirpath="i462/".$qcode;
            $sth=$this->db->prepare("select * from qpic where qid=:id and picno=:picno");
            $sth->execute(array(':id'=>$qid,
                                ':picno'=>$p));
            $tresult=$sth->fetch();
            $pic=$tresult["pic"];
            $file=$dirpath."/".$pic;
            //fclose($file); 
            if(!unlink($file)){
               // echo "error";
            }
            else{
               // echo "done";
            }
            $sth=$this->db->prepare("delete from qpic where qid=:qid and picno=:picno");
             $sth->execute(array(':qid'=>$qid,
                            ':picno'=>$p))or die(print_r($sth->errorInfo(), true));
            
        }
         
       
        /*
         
        ':optext'=>$_POST["op{$b}"],
        if (!empty($option1)){
            $sth=$this->prepare("insert into optext(qid,optionno,optext,opans) values(:qid,:opno,:optext,:opans");
            $sth->execute(array(':qid'=>$qid,
                            ':opno'=>1,
                            ':optext'=>$option1,
                            ':opans'=>$opans))or die(print_r($sth->errorInfo(), true)); 
        }
        */
        
        
/*
        $uid=Session::get("uid");
        $date=date("Y-m-d");
        $time=date("h:i:sa");
        $sth=$this->db->prepare("insert into mcq(topic,writer,date,time) values(:topic,:writer,:date,:time)");
        $sth->execute(array(':topic'=>$topic,
                            ':writer'=>$uid,
                            ':date'=>$date,
                            ':time'=>$time));
        $this->post_id=$this->db->lastInsertId();
        $dirpath="pic/".$this->post_id;
        $p=1;
        $pageno=1;
        while ($p<=10){
        ${"temp".$p}=$_FILES["file{$p}"]["tmp_name"];
        if (!empty(${"temp".$p})){
            ${"fname".$p}=$_FILES["file{$p}"]["name"];
            ${"fsize".$p}=$_FILES["file{$p}"]["size"];
            $temp=explode(".", ${"fname".$p});
            $ext = end($temp);
            
            if (!file_exists($dirpath)) {
                mkdir($dirpath,0777,true);
            }
            $filepath=$dirpath."/".$p.".".$ext;
            move_uploaded_file(${"temp".$p},$filepath);
            
            $sth=$this->db->prepare("insert into pic(id,post_id,link,type,size,no) values(:id,:post_id,:link,:type,:size,:no)");
            $sth->execute(array(':id'=>$pageno,
                            ':post_id'=>$this->post_id,
                            ':link'=>$filepath,
                            ':type'=>$ext,
                            ':size'=>${"fsize".$p},
                            ':no'=>$p));
            $pageno=$pageno+1;
        }
        
        $p=$p+1;  
        }
        
       $sth=$this->db->prepare("insert into paragraph(post_id,text) values(:post_id,:text)");
        $sth->execute(array(':post_id'=>$this->post_id,
                            ':text'=>$para1));
        if(!empty($para2)){
        $sth->execute(array(':post_id'=>$this->post_id,
                            ':text'=>$para2));
        }
        header("Location: ".URL."mcq");
        }
        */
    public function read1($qcode){
        $sth=$this->db->prepare("select * from question where qid=:qcode");
        $sth->execute(array(':qcode'=>$qcode));
        $this->result=$sth->fetch();
        return $this->result;
        
    }
    public function read2(){
        $this->mqid=$this->result["qid"];
        $sth=$this->db->prepare("select * from qtext where qid=:id");
        $sth->execute(array(':id'=>$this->mqid));
        
        return $sth;
    }
    public function read3(){
        $sth=$this->db->prepare("select * from qpic where qid=:id");
        $sth->execute(array(':id'=>$this->mqid));
        
        return $sth;
    }
    public function read4(){
        $sth=$this->db->prepare("select * from optext where qid=:id");
        $sth->execute(array(':id'=>$this->mqid));
        //$result=$sth->fetch();
        return $sth;
    }
    public function read5(){
        $sth=$this->db->prepare("select * from optiontext where qid=:id");
        $sth->execute(array(':id'=>$this->mqid));
        //$result=$sth->fetch();
        return $sth;
    }
    public function result($qcode){
        $sth=$this->db->prepare("select * from question where qid=:qcode");
        $sth->execute(array(':qcode'=>$qcode));
        $this->result=$sth->fetch();
        $qid=$this->result["qid"];
        $sth=$this->db->prepare("select * from optext where qid=:qid");
        $sth->execute(array(':qid'=>$qid));
        return $sth;
    }
    
                                     
}
?>