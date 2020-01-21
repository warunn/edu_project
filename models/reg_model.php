<?php
class reg_model extends model{
   
    public function __construct(){
        parent::__construct();
        
    }
    public function stteledit($addno,$htel,$tel){
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
    public function selectocc($oid){
        $query="select ocnm from occupation where id={$oid}";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetch();
        $ans=$final["ocnm"];
        return $ans;
    }
    public function select_school(){
        $query="select DISTINCT id,school_name from schools";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetchall();
        return $final;   
    }
    public function parentins($fname,$occ,$fnic,$foff,$mg,$mname,$mocc,$mnic,$emg1){
        $query="insert into parents(fnm,focc,fnic,ftel,morg,mnm,mocc,mnic,emg1) values('{$fname}','{$occ}','{$fnic}','{$foff}','{$mg}','{$mname}','{$mocc}','{$mnic}','{$emg1}')";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $n1= $this->db->lastInsertId();
        return $n1;      
    }
    public function schname($schid){
        $query="select  school_name from schools where id={$schid}";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetch();
        return $final["school_name"];
    }
    public function g5($addno){
        $query="select  * from grade5 where addno={$addno}";
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
    public function selecttel($addno){
        $query="select  * from sttel where addno={$addno}";
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
    public function selectst($addno){
        $query="select * from student where stid={$addno}";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetch();
        return $final;
    }
    public function updatestudent($haddno,$addno,$addate,$nameint,$fullname,$dob,$ol,$mf,$address,$nic,$pid,$town){
        $query="update student set stid={$addno}, addate='{$addate}', nameint='{$nameint}',fname='{$fullname}', dob='{$dob}',ol_al={$ol},sex={$mf},address='{$address}',nic='{$nic}',town='{$town}'  where stid={$haddno} ";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        //echo "hello";
    }
    public function updatest($result,$addno){
        $query="update student set stid={$result} where stid={$addno} ";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
    }
    public function selectparent($addno){
        $query="select DISTINCT pid from student Where stid='{$addno}'";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetch();
        if(empty($final)){
            return null;
        }
        else{
            $query="select * from parents Where id='{$final["pid"]}'";
            $sth=$this->db->prepare($query);
            $sth->execute() or die(print_r($sth->errorInfo(), true));
            $final=$sth->fetch();
            return $final;
            
        }
        
    }
    public function selectpid($pid){
        $query="select * from parents Where id={$pid}";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetch();
        return $final;
    }
    public function newocc($occ){
        $query="insert into occupation(ocnm) values('{$occ}')";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $n1= $this->db->lastInsertId();
        return $n1;        
    }
    public function select_subjects($cat){
        $query="select DISTINCT subid,subname from subject Where Type='{$cat}'";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetchall();
        return $final;
    }
    public function parenupdate($pid,$fname,$occ,$fnic,$foff,$mg,$mname,$mocc,$mnic,$emg1){
        $query="update parents set fnm='{$fname}',focc={$occ},fnic='{$fnic}',ftel='{$foff}',morg={$mg},mnm='{$mname}',mocc={$mocc},mnic='{$mnic}',emg1='{$emg1}' where id={$pid}";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
    }
    public function sequery($query){
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetchall();
        return $final;
    }
    public function bros($addno,$bro){
        $query="insert into bro(bro,bro1) values({$addno},{$bro})";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
    }
    
    public  function selectp($bro){
        $query="select pid from student Where stid='{$bro}'";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $final=$sth->fetch();
        return $final;
    }
    public function student($addno,$adays,$nameint,$fullname,$dob,$ol,$mf,$address,$nic,$town){
        $query="insert into student(stid,addate,nameint,fname,dob,ol_al,sex,address,nic,town)
	values({$addno},'{$adays}','{$nameint}','{$fullname}','{$dob}',{$ol},{$mf},'{$address}','{$nic}','{$town}')";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
    }
    public function sttel($addno,$tel){
        $query="insert into sttel(addno,tel) values({$addno},'{$tel}')";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
    }
    public function grade5($addno,$g5ex,$g5year,$g5marks){
    $query="insert into grade5(addno,exam_no,year,marks) values({$addno},{$g5ex},{$g5year},{$g5marks})";
    $sth=$this->db->prepare($query);
    $sth->execute() or die(print_r($sth->errorInfo(), true));
    
    }
    public function updateg5($haddno,$addno,$g5ex,$g5year,$g5marks){
        $query="update grade5 set addno={$addno},exam_no={$g5ex},year='{$g5year}',marks={$g5marks} where addno={$haddno} ";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
    }
    public function deleteol($haddno,$holno){
        $query="delete from olex where addno={$haddno}";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
        $query="delete from ol where exno={$holno}";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
    }
    public function updateol($holno,$hsubid,$olno,$sub,$res){        
        $query="update ol set exno={$olno},subid={$sub},Result='{$res}' where exno={$holno} AND subid={$hsubid}";
        //echo $query;
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
    }
    public function insolex($exno,$addno,$olyear){
        $query="insert into olex(addno,exno,year) values({$addno},{$exno},'{$olyear}')";
        $sth=$this->db->prepare($query);
        $sth->execute() or die(print_r($sth->errorInfo(), true));
    }
    public function sch_update($new,$addno,$school,$syear,$eyear,$hsid,$haddno){
        if($hsid!=$school){
            if(!empty($sch1n)){
                $query="insert into schools(school_name) values('{$sch1n}')";
                $sth=$this->db->prepare($query);
                $sth->execute() or die(print_r($sth->errorInfo(), true));
                $n1= $this->db->lastInsertId();
                $query="update school_student set stid={$addno},schid={$n1},s_date='{$syear}',e_date='{$eyear}' where schid={$hsid} and stid={$haddno}";
                $sth=$this->db->prepare($query);
                $sth->execute() or die(print_r($sth->errorInfo(), true));
                return true;
            }
            else {
                $query="update school_student set stid={$addno},schid={$school},s_date='{$syear}',e_date='{$eyear}' where schid={$hsid} and stid={$haddno}";
                $sth=$this->db->prepare($query);
                $sth->execute() or die(print_r($sth->errorInfo(), true));
                return true;
            }
            
        }
    }
    public function schools1($sch1n,$addno,$sch1,$sch1b,$sch1e){
        if(!empty($sch1n)){
            $query="insert into schools(school_name) values('{$sch1n}')";
            $sth=$this->db->prepare($query);
            $sth->execute() or die(print_r($sth->errorInfo(), true));
            $n1= $this->db->lastInsertId();
            $query="insert into school_student(stid,schid,s_date,e_date) value({$addno},{$n1},'{$sch1b}','{$sch1e}')";
            $sth=$this->db->prepare($query);
            $sth->execute() or die(print_r($sth->errorInfo(), true));
            return true;
        }
        else{
            $query="insert into school_student(stid,schid,s_date,e_date) value({$addno},{$sch1},'{$sch1b}','{$sch1e}')";
            $sth=$this->db->prepare($query);
            $sth->execute() or die(print_r($sth->errorInfo(), true));
            return true;
        }
    }
    
}
?>