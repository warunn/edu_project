<?php
class article_model extends model{
    public $post_id=0;
    public function __construct(){
        parent::__construct();
        
    }
public function scomment1(){
    $sql="select * from pics_comment where visible=0 order by date desc";
    $sth=$this->db->prepare($sql);
    $sth->execute();
    return $sth;
    }    
public function delete_comment($cid){
    $sql="delete from pics_comment where cid={$cid}";
    $sth=$this->db->prepare($sql);
    $sth->execute();
}
public function accept_comment($cid){
    $sql="update pics_comment set visible=1 where cid={$cid}";
    $sth=$this->db->prepare($sql);
    $sth->execute();
    
}
public function sarticle(){
    $sql="select * from article order by date desc";
    $sth=$this->db->prepare($sql);
    $sth->execute();
    return $sth;
    }    
public function delete($aid){
    $sql="delete from article where post_id={$aid}";
    $sth=$this->db->prepare($sql);
    $sth->execute();
    $sql="delete from pics_comment where id={$aid}";
    $sth=$this->db->prepare($sql);
    $sth->execute();
    $sql="delete from pics where post_id={$aid}";
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
    public function run(){
        $topic=$_POST["topic"];
        $para1=$_POST["paragraph1"];
        $para2=$_POST["paragraph2"];
        $para3=$_POST["paragraph3"];
        //print_r($_POST);
        $uid=Session::get("uid");
        $date=date("Y-m-d");
        $time=date("h:i:s");
        $sth=$this->db->prepare("insert into `article`(`post_id`,`topic`,`writer`,`date`,`time`) values(:post_id,:topic,:writer,:date,:time)");
        $sth->execute(array(':post_id'=>NULL,
                            ':topic'=>$topic,
                            ':writer'=>$uid,
                            ':date'=>$date,
                            ':time'=>$time))or die(print_r($sth->errorInfo(), true));
        //print_r($sth);
        $this->post_id=$this->db->lastInsertId();
       // echo $this->post_id;
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
            
            $sth=$this->db->prepare("insert into pics(id,post_id,link,type,size,no) values(:id,:post_id,:link,:type,:size,:no)");
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
        if(!empty($para1)){
            echo $this->post_id;
            $query1="insert into paragraph(post_id,text) values('{$this->post_id}','{$para1}')";
            $sth=$this->db->prepare($query1);
            $sth->execute() or die(print_r($sth->errorInfo(), true));
            
      
        }
        if(!empty($para2)){
        $sth->execute(array(':post_id'=>$this->post_id,
                            ':text'=>$para2))or die(print_r($sth->errorInfo(), true));
        }
        if(!empty($para3)){
        $sth->execute(array(':post_id'=>$this->post_id,
                            ':text'=>$para3));
        }
        Session::init();
        Session::set("articles",TRUE);
        header("Location: ".URL."article");
        }
        
    public function read1($id){
        $sth=$this->db->prepare("select * from article where post_id=:id");
        $sth->execute(array(':id'=>$id));
        $result=$sth->fetch();

        try {

            $query1 = "insert into post_counts(post_id) values('{$id}')";
            $sth=$this->db->prepare($query1);
            $sth->execute();
        } catch (Exception $e) {
            print_r($e);
        }

        return $result;
        
    }
    public function read2($id){
        $sth=$this->db->prepare("select * from paragraph where post_id=:id");
        $sth->execute(array(':id'=>$id));
        
        return $sth;
    }
    public function read3($id){
        $sth=$this->db->prepare("select * from pics where post_id=:id");
        $sth->execute(array(':id'=>$id));
        
        return $sth;
    }
    public function read4($id){
        $sth=$this->db->prepare("select uname from users where id=:id");
        $sth->execute(array(':id'=>$id));
        $result=$sth->fetch();
        return $result["uname"];
    }
    public function deletetext($table,$post_id,$pid){
        
        $sth=$this->db->prepare("delete from ".$table." where post_id=".$post_id." and pid=".$pid."");
        
        $sth->execute()or die(print_r($sth->errorInfo(), true));;
        
    }
    public function updatep($post_id,$pid,$data){
        $sth=$this->db->prepare("update paragraph set text=:text where post_id=:post_id and pid=:pid");
        $sth->execute(array(':post_id'=>$post_id,
            ':pid'=>$pid,
            ':text'=>$data))or die(print_r($sth->errorInfo(), true));
    }
    public function insertp($post_id,$data){
        $sth=$this->db->prepare("insert into paragraph(post_id,text) values(:post_id,:text)");
        $sth->execute(array(':post_id'=>$post_id,
            ':text'=>$data))or die(print_r($sth->errorInfo(), true));
    }
    public function updatear($post_id,$topic,$writer,$writerno){
        $sth=$this->db->prepare("update article set topic=:topic where post_id=:post_id");
        $sth->execute(array(':post_id'=>$post_id,
            ':topic'=>$topic))or die(print_r($sth->errorInfo(), true));
        $sth=$this->db->prepare("update users set uname=:uname where id=:writerno");
        $sth->execute(array(':uname'=>$writer,
            ':writerno'=>$writerno))or die(print_r($sth->errorInfo(), true));
    }
    public function updatepic($post_id,$pid,$p){
        ${"temp".$p}=$_FILES["npic{$p}"]["tmp_name"];
        //echo ${"temp".$p};
        if (!empty(${"temp".$p})){
            $dirpath="pic/".$post_id;
            ${"fname".$p}=$_FILES["npic{$p}"]["name"];
            ${"fsize".$p}=$_FILES["npic{$p}"]["size"];
            $temp=explode(".", ${"fname".$p});
            $ext = end($temp);
            
            if (!file_exists($dirpath)) {
                mkdir($dirpath,0777,true);
            }
            $filepath=$dirpath."/".$p.".".$ext;
            //echo $filepath;
            move_uploaded_file(${"temp".$p},$filepath);
        }
    }
    
    public function insertpic($post_id,$pid,$p){
        //echo "hello";
        //echo $qcode." ".$qid." ".$p;
        
        ${"temp".$p}=$_FILES["npic{$p}"]["tmp_name"];
        //echo $_FILES["qp{$p}"]["name"];
        //echo ${"temp".$p};
        //if (!empty(${"temp".$p})){
        $dirpath="pic/".$qcode;
        ${"fname".$p}=$_FILES["npic{$p}"]["name"];
        ${"fsize".$p}=$_FILES["npic{$p}"]["size"];
        $temp=explode(".", ${"fname".$p});
        $ext = end($temp);
        if (!file_exists($dirpath)) {
            mkdir($dirpath,0777,true);
        }
        $filepath=$dirpath."/".$p.".".$ext;
        move_uploaded_file(${"temp".$p},$filepath);
        $filename="/".$p.".".$ext;
        $sth=$this->db->prepare("insert into pics(post_id,id,link,type,size) values(:post_id,:pid,:pic,:type,:size)");
        $sth->execute(array(':post_id'=>$post_id,
            ':id'=>$pid,
            ':link'=>$filename,
            ':type'=>$ext,
            ':size'=>${"fsize".$p}));
        //}
    }
    public function deletepic($post_id,$pid,$p){
       // echo $post_id;
        $dirpath="pic/".$post_id;
        $sth=$this->db->prepare("select * from pics where post_id=:post_id and id=:pid");
        
        $sth->execute(array(':post_id'=>$post_id,
            ':pid'=>$pid))or die(print_r($sth->errorInfo(), true));;
        $tresult=$sth->fetch();
        //print_r($tresult);
        $pic=$tresult["link"];
        $file=$pic;
        //fclose($file);
        echo $file;
        if(file_exists($file)){
            chmod($file,0777);
        }
        if(!unlink($file)){
            // echo "error";
        }
        else{
            // echo "done";
        }
        $sth=$this->db->prepare("delete from pics where post_id=:post_id and id=:id");
        $sth->execute(array(':post_id'=>$post_id,
           ':id'=>$p))or die(print_r($sth->errorInfo(), true));
        
    } 
    
}
?>