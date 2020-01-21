<?php
class paper_model extends model{
    public $post_id=0;
    public function __construct(){
        parent::__construct();
        
    }
    
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
    public function run(){
        //print_r($_POST);
        $pname=$_POST["pname"];
        $noq=$_POST["noq"];
        $type=$_POST["type"];
        $hours=$_POST["hours"];
        $minutes=$_POST["minutes"];
        $medium=$_POST["medium"];
        $grade=$_POST["grade"];
        $diff=$_POST["diff"];
        $subject=$_POST["subject"];
        $uid=Session::get("uid");
        $cdate=date("Y-m-d");
        $ctime=date("h:i:sa");
        $writer=1001;
        $medium=123;
        $time=date("h:i");
       
        $sth=$this->db->prepare("insert into qpaper(paper_name,grade,noq,medium,type,time,writer,cdate,ctime) values(:paper_name,:grade,:noq,:medium,:type,:time,:writer,:cdate,:ctime)");
        $sth->execute(array(':paper_name'=>$pname,
                            ':grade'=>$grade,
                            ':noq'=>$noq,
                            ':medium'=>$medium,
                            ':type'=>$type,
                            ':time'=>$time,
                            ':writer'=>$writer,
                            ':cdate'=>$cdate,
                            ':ctime'=>$ctime))or die(print_r($sth->errorInfo(), true));
        $this->post_id=$this->db->lastInsertId();
        return $this->post_id;
        
        /*$dirpath="pic/".$this->post_id;
        
        $sth=$this->db->prepare("insert into paragraph(post_id,text) values(:post_id,:text)");
        $sth->execute(array(':post_id'=>$this->post_id,
                            ':text'=>$para1));
        if(!empty($para2)){
        $sth->execute(array(':post_id'=>$this->post_id,
                            ':text'=>$para2));
        }*/
        //header("Location: ".URL."article");
        }
        
    public function read1($id){
        $sth=$this->db->prepare("select * from article where post_id=:id");
        $sth->execute(array(':id'=>$id));
        $result=$sth->fetch();
        return $result;
        
    }
    public function read2($id){
        $sth=$this->db->prepare("select text from paragraph where post_id=:id");
        $sth->execute(array(':id'=>$id));
        
        return $sth;
    }
    public function read3($id){
        $sth=$this->db->prepare("select * from pic where post_id=:id");
        $sth->execute(array(':id'=>$id));
        
        return $sth;
    }
    public function read4($id){
        $sth=$this->db->prepare("select uname from users where id=:id");
        $sth->execute(array(':id'=>$id));
        $result=$sth->fetch();
        return $result["uname"];
    }
    
}
?>