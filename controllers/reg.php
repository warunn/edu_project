<?php
class reg extends controller{

    public function __construct(){
        //echo "hello";
        parent::__construct();
    }
    public function index($send=null){
        $this->loggedin("principal","clerk","admin");
        if (isset($send) and !empty($send)){
          $this->view->send=True;  
        }
        $this->view->olyear= $this->years("olyear");
        $this->view->Eyear= $this->years("g5year");
        $this->view->aday=$this->dates("addy", "addm", "addd", "aday");
        $this->view->bdate= $this->dates("Byear","Bmonth","bday","dob");
        $this->view->school1=$this->schools("school1","new1","schools","1");
        $this->view->school2=$this->schools("school2","new2","schools","2");
        $this->view->school3=$this->schools("school3","new3","schools","3");
        $this->view->school4=$this->schools("school4","new4","schools",4);
        $this->view->school5=$this->schools("school5","new5","schools",5);
        $this->view->school6=$this->schools("school6","new6","schools",6);
        $this->view->school7=$this->schools("school7","new7","schools",7);
        $this->view->school8=$this->schools("school8","new8","schools",8);
        $this->view->school9=$this->schools("school9","new9","schools",9);
        $this->view->school10=$this->schools("school10","new10","schools",10);
        $this->view->subject6=$this->subjects(6,'R1');
        $this->view->subject7=$this->subjects(7,'C1');
        $this->view->subject8=$this->subjects(8,'C2');
        $this->view->subject9=$this->subjects(9,'C3');
        //echo "hello";
        $this->view->render("reg/index"); 
        }
        public  function run(){
            $this->loggedin("principal","clerk","admin");
            //print_r($_POST);
            $addy= isset($_POST["addy"])?$_POST["addy"]:null;
            
            
            $addm= $_POST["addm"];
            $addd= $_POST["addd"];
            $addno= $_POST["addno"];//
            $ol= $_POST["ol"];
            $nameint= $_POST["nameint"];
            $fullname= $_POST["fullname"];
            $byear= $_POST["Byear"];
            $bmonth= $_POST["Bmonth"];//
            $bdate= $_POST["bday"];//
            $mf= $_POST["mf"];
            $address= $_POST["address"];
            $nic= $_POST["nic"];
            $town=$_POST["town"];
            $exno=$_POST["olno"];
            $olyear=$_POST["olyear"];
            $g5ex= $_POST["g5ex"];//
            $g5year= $_POST["g5year"];
            $g5marks= $_POST["g5marks"];//
            /*$bro1= $_POST["bro1"];//
             $bro2= $_POST["bro2"];//
             $bro3= $_POST["bro3"];//
             $bro4= $_POST["bro4"];*/
            $submit= $_POST["submit"];
            if(!empty($tel) and !ctype_digit($tel)){
                $errors[]="telephone number";
            }
            if(!empty($g5ex) and !ctype_digit($g5ex)){
                $errors[]="grade 5 examination number";
            }
            if(!empty($g5marks) and !ctype_digit($g5marks)){
                $errors[]="grade 5 examination marks";
            }
            if(!checkdate($addm,$addd,$addy)){
                $errors[]="addmission date";
            }
            
            if(!checkdate($bmonth,$bdate,$byear)){
                $errors[]="birth day";
            }
            if(!empty($errors)){
                foreach($errors as $error){
                    echo "Go back check ".$error."<br/>";
                    
                }
            }
            else{
                $addate=$addy."-".$addm."-".$addd;
                $dob=$byear."-".$bmonth."-".$bdate;
                
                
                $this->model->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->model->db->setAttribute(PDO::ATTR_AUTOCOMMIT,0);
                
                try{
                    $this->model->db->beginTransaction();
                    $this->model->student($addno,$addate,$nameint,$fullname,$dob,$ol,$mf,$address,$nic,$town);
                    $this->model->grade5($addno,$g5ex,$g5year,$g5marks);
                    $pq=1;
                    while($pq<=3){
                        if(!empty($_POST["tel{$pq}"])){
                            $this->model->sttel($addno,$_POST["tel{$pq}"]);
                        }
                        $pq=$pq+1;
                    }
                    $ab=1;
                    while($ab<=10){
                        if(!empty($_POST["school{$ab}"]) or !empty($_POST["new{$ab}"])){
                            //echo "good";
                            $this->model->schools1($_POST["new{$ab}"],$addno,$_POST["school{$ab}"],$_POST["syear{$ab}"],$_POST["eyear{$ab}"]);
                        }
                        $ab=$ab+1;
                    }
                    if($_POST["ol"]==0){
                        $cd=1;
                        $this->model->insolex($exno,$addno,$olyear);
                        while($cd<=9){
                            if(!empty($_POST["sub{$cd}"]) and !empty($_POST["res{$cd}"])){
                                //echo "good";
                                
                                $this->model->insol($exno,$_POST["sub{$cd}"],$_POST["res{$cd}"]);
                                
                            }
                            $cd=$cd+1;
                        }
                        
                    }
                    $ab=1;
                    while($ab<5){
                        if(!empty($_POST["bro{$ab}"])){
                            //echo "good";
                            $this->model->bros($addno,$_POST["bro{$ab}"]);
                        }
                        $ab=$ab+1;
                    }
                    if(empty($_POST["bro1"]) and empty($_POST["bro2"]) and empty($_POST["bro3"]) and empty($_POST["bro4"]) ){
                        //Session::init();
                        //Session::set("addno",$addno);
                        header('location:'.URL.'reg/parentform/'.$addno);
                        //$this->parentform($addno);
                    }
                    else{
                        $ab=1;
                        $parents=array();
                        while($ab<=4){
                            if(!empty($_POST["bro{$ab}"])){
                                //echo "good";
                                ${"parent".$ab}=$this->model->selectp($_POST["bro{$ab}"]);
                                array_push($parents,${"parent".$ab});
                            }
                            $ab=$ab+1;
                        }
                        if(empty($parent1) and empty($parent2) and empty($parent3) and empty($parent4)){
                            $this->parentform($addno);
                        }
                        else{
                            
                            $parents = array_filter($parents);
                            
                            $parents = array_unique(array_map(function ($i) { return $i['pid']; }, $parents));
                            //$parents=array_unique($parents);
                           
                            //header('location:'.URL.'reg/parentedit/'.$addno);
                            $this->parentedit($parents,$addno);
                        }
                    }
                    //$this->subid=$this->model->ins_test2($subname,$mid,$medium,$grade,$cat);
                    $this->model->db->commit();
                }
                catch (PDOException $e){
                    $this->model->db->rollBack();
                    die($e->getMessage());
                }
                
            }
        }
        public function occupation($name,$newname,$oid=null){
            
            $query="select * from occupation";
            $result=$this->model->sequery($query);
            $end="<select name=\"{$name}\">";
            if(isset($oid)){
                $result1=$this->model->selectocc($oid);
                $end.="<option value=\"{$oid}\">{$result1}</option>";
            }else{
                $end.="<option value=\"\"></option>";
            }
            
            foreach ($result as $row){
                $id=$row["id"];
                $nm=$row["ocnm"];
                $end.="<option value=\"{$id}\">{$nm}</option>";
            }
            $end.="</select>";
            $end.=" New Occupation <input name=\"{$newname}\" type=\"text\" maxlength=\"22\">";
            return $end;
        }
        public function parentrun(){
            $this->loggedin("principal","clerk","admin");
            print_r($_POST);
            $addno= $_POST["addno"];
            $fname= $_POST["fname"];
            $occ= $_POST["occ"];
            $occn= $_POST["occn"];
            $fnic= $_POST["fnic"];
            $foff= $_POST["foff"];
            $mg= $_POST["mg"];
            $mname= $_POST["mname"];
            $mocc= $_POST["mocc"];
            $moccn= $_POST["moccn"];
            $mnic= $_POST["mnic"];
            $emg1= $_POST["emg1"];
            if(!empty($occn)){
                $occ=$this->model->newocc($occn);
            }
            if(!empty($moccn)){
                $mocc=$this->model->newocc($moccn);
            }
            $result=$this->model->parentins($fname,$occ,$fnic,$foff,$mg,$mname,$mocc,$mnic,$emg1);
            $this->model->updatest($result,$addno);
            header('location:'.URL.'reg/index/123');
        }
        public function stedit($addno=NULL){
            $this->loggedin("principal","clerk","admin");
            if (isset($_POST["addno"])){
                $addno=$_POST["addno"];
            }
            if(!empty($addno)){
            $result=$this->model->selectst($addno);
            //print_r($result);
            foreach($result as $key=>$value)
            {
                //echo $value;
                $this->view->$key=$value;//very important
            }
            $result1=$this->model->selecttel($addno);
            //print_r($result1);
            $ab=1;
            foreach ($result1 as $row){
                $this->view->{"tel".$ab}=$row["tel"];//very important
                 //print_r($this->view);
                $ab=$ab+1;                
            }
            $result2=$this->model->selectsch($addno);
            $ab=1;
            foreach ($result2 as $row){
                $schname=$this->model->schname($row["schid"]);
                $this->view->{"sch".$ab}=$this->schools("school{$ab}","new{$ab}","schools",$ab,$row["schid"],$schname,$row["s_date"],$row["e_date"]);
                $ab=$ab+1;
            }
            $result3=$this->model->g5($addno);
            foreach($result3 as $key=>$value)
            {
                $this->view->$key=$value;
            }
            $this->view->subject6=$this->subjects(6,'R1');
            $this->view->subject7=$this->subjects(7,'C1');
            $this->view->subject8=$this->subjects(8,'C2');
            $this->view->subject9=$this->subjects(9,'C3');
            $this->view->olyear=$this->years("olyear");
            //print_r($result);
            $result6=$this->model->findbro($addno);
            $ab=1;
            foreach ($result6 as $row){
                $this->view->{"bro".$ab}=$row["bro1"];
                $ab=$ab+1;
            }
            if($result["ol_al"]==0){
                //echo "this is al";
                $result4=$this->model->selectol($addno);
                $this->view->exno=$result4["exno"];
                $this->view->olyear=$this->years("olyear",$result4["year"]);
                $result5=$this->model->selectolsub($result4["exno"]);
                $ab=1;
                foreach ($result5 as $row){
                    //$this->view->{"olsub".$ab}=$row["subid"];
                    $subid=$row["subid"];
                    $this->view->{"res".$subid}=$row["Result"];
                    $this->view->{"myres".$ab}=$row["Result"];
                    $this->view->{"olsubid".$ab}=$row["subid"];
                    $out=$this->model->select_subname($row["subid"]);
                    $this->view->{"olsubname".$ab}=$out["subname"];
                    $this->view->{"olsubtype".$ab}=$out["type"];
                    $ab=$ab+1;
                    if ($out["type"]=="R1"){
                        $this->view->subject6=$this->subjects(6,'R1',$row["subid"],$out["subname"],$row["Result"]);
                    }
                    if ($out["type"]=="C1"){
                        $this->view->subject7=$this->subjects(7,'C1',$row["subid"],$out["subname"],$row["Result"]);
                    }
                    if ($out["type"]=="C2"){
                        $this->view->subject8=$this->subjects(8,'C2',$row["subid"],$out["subname"],$row["Result"]);
                    }
                    if ($out["type"]=="C3"){
                        $this->view->subject9=$this->subjects(9,'C3',$row["subid"],$out["subname"],$row["Result"]);
                    }
                    
                }
                
                
            }
            $this->view->g5years=$this->years("g5year",$this->view->year);
            $this->view->render("reg/stedit");
            }
            else {
                echo "<h1>Admission Number Not Defined</h1>";
            }
            
            
        }
        public function newparent(){
            $this->view->render("reg/newparent");
        }
        public function parentform($addno=NULL){
            $this->loggedin("principal","clerk","admin");
            //Session::init();Session::get("addno");
            if (isset($_POST["addno"])){
                $addno=$_POST["addno"];
            }
            if (!empty($addno)){
                $addno=$_POST["addno"];
            
            $this->view->addno=$addno;
            $this->view->occupation=$this->occupation("occ","occn");
            $this->view->moccupation=$this->occupation("mocc","moccn");
            $this->view->render("reg/formp");
            }
            else{
                echo "<H1>Admission Number is Not Defined</H1>";
            }
        }
        public function findst(){
            $this->view->render("reg/findst");
        }
        public function steditrun(){
            $this->loggedin("principal","clerk","admin");
            //print_r($_POST);
            foreach($_POST as $key=>$value)
            {
                ${$key}=$value;
            }
            
            $this->model->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->model->db->setAttribute(PDO::ATTR_AUTOCOMMIT,0);
            
            try{
                $this->model->db->beginTransaction();
               $this->model->updatestudent($haddno,$addno,$addate,$nameint,$fullname,$dob,$ol,$mf,$address,$nic,$pid,$town);
                $this->model->updateg5($haddno,$addno,$g5ex,$g5year,$g5marks);
                $pq=1;
                while($pq<=3){
                    if(isset(${"htel".$pq})){
                        $this->model->stteledit($addno,${"htel".$pq},${"tel".$pq});
                    }
                    $pq=$pq+1;
                }                  
                if($hol_al==0 and $ol==1){
                    $this->model->deleteol($haddno,$holno);
                }
                elseif($hol_al==1 and $ol==0){
                    $cd=1;
                    $this->model->insolex($olno,$addno,$olyear);
                    while($cd<=9){
                        if(!empty(${"sub".$cd}) and !empty(${"res".$cd})){
                            $this->model->insol($olno,${"sub".$cd},${"res".$cd});
                        }
                        $cd=$cd+1;
                    }
                }
                elseif ($hol_al==0 and $ol==0){
                    
                    $this->model->updateolex($haddno,$holno,$addno,$olno,$olyear);
                    
                    $cd=1;
                     while($cd<=9){
                         
                     if(!empty(${"sub".$cd}) and !empty(${"res".$cd})){
                         $this->model->updateol($holno,${"hsubid".$cd},$olno,${"sub".$cd},${"res".$cd});
                     }
                     $cd=$cd+1;
                     } 
                }  
                
                $ab=1;
                while($ab<=10){
                    if(!empty(${"school".$ab}) or !empty(${"new".$ab})){
                        $this->model->sch_update(${"new".$ab},$addno,${"school".$ab},${"syear".$ab},${"eyear".$ab},${"hsid".$ab},$haddno);
                    }
                    $ab=$ab+1;
                    
                }
                $ab=1;
                $parents=array();
                while($ab<=4){
                    if(!empty(${"bro".$ab})){
                        ${"parent".$ab}=$this->model->selectp(${"bro".$ab});
                        array_push($parents,${"parent".$ab});
                    }
                    $ab=$ab+1;
                }
                if(empty($parent1) and empty($parent2) and empty($parent3) and empty($parent4) and empty($pid)){
                    $this->parentform($addno);
                    
                }
                else{
                    if(isset($pid) and !empty($pid)){
                        $h=array("pid"=>$pid);
                        array_push($parents,$h);
                    }
                    $parents = array_filter($parents);
                    //print_r($parents);
                    $parents = array_unique(array_map(function ($i) { return $i['pid']; }, $parents));
                    //$parents=array_unique($parents);
                    //header('location:'.URL.'reg/parentedit/'.$addno);
                    $this->parentedit($parents,$addno);
                }
                $this->model->db->commit();
            }
            catch (PDOException $e){
                $this->model->db->rollBack();
                die($e->getMessage());
            }
        }
        public function pedittrun(){
            $this->loggedin("principal","clerk","admin");
            //print_r($_POST);
            foreach($_POST as $key=>$value)
            {
                ${$key}=$value;
            }
            if(!empty($occn)){
                $occ=$this->model->newocc($occn);
            }
            if(!empty($moccn)){
                $mocc=$this->model->newocc($moccn);
            }
            $this->model->parenupdate($pid,$fname,$occ,$fnic,$foff,$mg,$mname,$mocc,$mnic,$emg1);
            $query="update student set pid={$pid} where stid={$addno}";
            $result=$this->model->sequery($query);
            header('Window-target: _top');
            header('location:'.URL.'reg/index/123');
            
            
         
        }
        
        public function pedit($addno){
            $this->loggedin("principal","clerk","admin");
            echo "<h1>Select Parent</h1>";
            echo "<h3>Parent id : {$pid}</h3>";
            $result=$this->model->selectpid($pid);
            echo "<div>";
            echo '<form action="'.URL.'reg/pedittrun" method="post" target="_top">';
           echo '<input type="hidden" name="addno" value="'.$addno.'">'; 
           echo '<input type="hidden" name="pid" value="'.$pid.'">'; 

	
 echo "<table><tr><td width=\"108\" height=\"24\">Father Name</td><td colspan=\"2\"><label>";
      echo "<input name=\"fname\" type=\"text\" value=\"{$result["fnm"]}\" id=\"fnameint\" size=\"40\" maxlength=\"32\"></label></td></tr>";
    echo "<tr><td height=\"24\">Father's Occupation</td><td colspan=\"2\"><label>";
    echo $this->occupation("occ","occn",$result["focc"]); 
	echo "</label></td></tr>";
    echo "<tr>
      <td height=\"19\">Nic</td>
      <td colspan=\"2\"><label>
        <input type=\"text\" name=\"fnic\" value=\"{$result["fnic"]}\" id=\"fnic\">
      </label></td>
    </tr>
    <tr>
      <td height=\"19\">Father's Office Tel.No</td>
      <td colspan=\"2\"><label>
        <input type=\"text\" name=\"foff\" value=\"{$result["fnic"]}\" id=\"foff\">
      </label></td>
    </tr>
    <tr>
      <td height=\"19\">&nbsp;</td>
      <td colspan=\"2\"><label>Mother 
        <input type=\"radio\" name=\"mg\" id=\"mg\" value=\"1\" ";
        if($result["morg"]==1){echo "checked=\"checked\"";}
        echo ">  Gardian
      <input type=\"radio\" name=\"mg\" id=\"mg2\" value=\"0\" ";
        if($result["morg"]==0){echo "checked=\"checked\"";}
      echo"> </label></td>
    </tr>
    ";
    $mnm=$result["mnm"];
    echo"<tr>
      <td height=\"19\">Name</td>
      <td colspan=\"2\"><label>
        <input name=\"mname\" type=\"text\" value=\"{$mnm}\" id=\"mname\" size=\"40\" maxlength=\"32\">
      </label></td>
    </tr>
    <tr>
      <td height=\"19\">Mother's Occupation</td>
      <td colspan=\"2\"> <div>";
    echo $this->occupation("mocc","moccn",$result["mocc"]); 
	echo"</div>  
      </td>
    </tr>";
    echo "<tr>
      <td height=\"19\">Nic</td>
      <td colspan=\"2\"><label>
        <input name=\"mnic\" type=\"text\" value=\"{$result["mnic"]}\"id=\"mnic\" maxlength=\"10\">
      </label></td>
    </tr>";
    echo "<tr>
      <td height=\"19\">Emergency Tel</td>
      <td colspan=\"2\"><label>
        <input name=\"emg1\" type=\"text\" value=\"{$result["emg1"]}\" id=\"emg1\" maxlength=\"10\">
      </label></td>
    </tr>";
	
	echo "<tr><td>&nbsp;</td><td><input type=\"submit\" name=\"submit\" id=\"submit\" value=\"Select\">  ";
        }
        public function processparent(){
            if(isset($_POST["addno"])){
                $addno=$_POST["addno"];
                $result=$this->model->selectparent($addno);
                if(!empty($result)){
                    $pid=$result["id"];
                    $this->parentedit($pid, $addno);
                }
                else{
                    $this->parentform($addno);
                }
            }
            elseif (isset($_POST["pid"])){
                $parent=$this->model->selectpid($pid);
                if(!empty($parent)){
                    $pid=$parent["id"];
                    $this->parentedit($pid, $addno);
                }
                else {
                    echo "<h1>No parent found</h1>";
                }
                
                
            }
        }
        public function parentedit($parents,$addno){
            $this->loggedin("principal","clerk","admin");
            $ab=1;
            foreach($parents as $pid) {
                $this->view->{"pid".$ab}=$pid;
                $ab=$ab+1;
            }
            $this->view->addno=$addno;
            $this->view->render("reg/formedit");            
        }
        
        public function years($yy,$myyear=Null){
            $str_year= "20".date("y",time());
            $end_year=intval($str_year)+1;
            
            $end="<select name=\"{$yy}\">";
            if(isset($myyear)){
                $end.="<option value=\"{$myyear}\">{$myyear}</option>";
            }
            else{
                $end.="<option value=\"\"></option>";}
            for($a=1980;$a<$end_year;$a++){
                $end.="<option value=\"{$a}\">{$a}</option>";
                
            }
            $end.="</select>";
            return $end;
        }
        public function dates($yy,$mm,$dd,$error){
            $str_year= "20".date("y",time());
            $end_year=intval($str_year)+1;
            $end="<div name=\"{$error}\">year ";
            $end.="<select name=\"{$yy}\">";
            $end.="<option value=\"\"></option>";
            for($a=1980;$a<$end_year;$a++){
                $end.="<option value=\"{$a}\">{$a}</option>";
                
            }
            $end.="</select>";
            $end.="month <select name=\"{$mm}\">";
            $end.="<option value=\"\"></option>";
            for($a=1;$a<13;$a++){
                $end.="<option value=\"{$a}\">{$a}</option>";
            }
            $end.="</select>";
            $end.=" day <select name=\"{$dd}\">";
            $end.="<option value=\"\"></option>";
            for($a=1;$a<32;$a++){
                $end.="<option value=\"{$a}\">{$a}</option>";
            }
            $end.="</select></div>";
            return $end;
        }
        public function schools($sch,$schn,$error,$no,$sid=Null,$sname=Null,$syear=Null,$Eyear=Null){
            
            $end= "<div name=\"{$error}\"> ";
            if(isset($sid) and !empty($sid)){
                $end.="<input type=\"hidden\" name=\"hsid{$no}\" value=\"{$sid}\"> ";
            }
            $end.="<select name=\"{$sch}\">";
            if(isset($sid) and !empty($sid)){
                $end.="<option value=\"{$sid}\">{$sname}</option>";
            }
            else{
                $end.="<option value=\"\"></option>";}
            $result=$this->model->select_school();
            foreach ($result as $row){
                $id=$row["id"];
                $name=$row["school_name"];
                $end.="<option value=\"{$id}\">{$name}</option>";
            }
            $end.="</select><br/>Begin year ";
            if(isset($syear) and !empty($syear)){
            $end.=$this->years("syear{$no}",$syear);
            }else{
                $end.=$this->years("syear{$no}");
            }
            $end.=" End year ";
            if(isset($Eyear) and !empty($Eyear)){
                $end.=$this->years("eyear{$no}",$Eyear);
            }else{
                $end.=$this->years("eyear{$no}");
            }
            //$end.=$this->years("eyear{$no}");
            $end.="<br/> New school ";
            $end.="<input type=\"text\" name=\"{$schn}\" size=\"60\" maxlength=\"50\" />";
            return $end;   
        }
        
        public function subjects($sub,$cat,$mysub=Null,$mysubname=Null,$myresult=Null){
            
            $end="";
            $end.= "<tr class=\"ol\"><td>";
            if(isset($mysub)){
                $end.="<input type=\"hidden\" name=\"hsubid{$sub}\" value=\"{$mysub}\">";
            }
            $end.="<select name=\"sub{$sub}\">";
            if(isset($mysub)){
                //$subname=$this->model->select_subname($mysub);
                $end.="<option value=\"{$mysub}\">{$mysubname}</option>";
            }
            $result=$this->model->select_subjects($cat);
            foreach ($result as $row){
                $id=$row["subid"];
                $name=$row["subname"];
                $end.="<option value=\"{$id}\">{$name}</option>";
            }
            $end.="</select></td><td  colspan=\"2\">";
            
            $end.="<select name=\"res{$sub}\"><option value=\"{$myresult}\">{$myresult}</option><option value=\"A\">A</option><option value=\"B\">B</option><option value=\"C\">C</option>";
            $end.="<option value=\"S\">S</option><option value=\"W\">W</option><option value=\"ab\">ab</option></select></td></tr>";
            
            return $end;
            
            
        }
        
    }