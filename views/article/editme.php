<style type="text/css">
.ol{
<?php 
if($this->ol_al==1){
  echo "display:none;" ; 
}

?>

}
</style>
    <?php //print_r($this);?>
    <h1>Edit Student</h1>
    
<form action="<?php echo URL;?>reg/steditrun" method="post">
 <input type="hidden" name="pid" value="<?php echo $this->pid;?>">
  <input type="hidden" name="haddno" value="<?php echo $this->addno;?>">
  <input type="hidden" name="hol_al" value="<?php echo $this->ol_al;?>">
  <input type="hidden" name="holno" value="<?php echo $this->exno;?>">
    <table border="0">
    <tr>
    <td rowspan="6"></td><td>Admission No</td><td><input type="text" name="addno" value="<?php echo $this->addno;?>" required></td></tr>
    <tr><td>Admission Date</td><td><input type="text" name="addate" value="<?php echo $this->addate;?>" required></td></tr>
    <tr><td>OL/AL</td><?php echo "<td><label>O/L 
        <input type=\"radio\" name=\"ol\" id=\"ol\" value=\"1\" ";
        if($this->ol_al==1){echo "checked=\"checked\"";}
        echo " onmousedown=\"javascript:col_form()\">  A/L
      <input type=\"radio\" name=\"ol\" id=\"ol\" value=\"0\" ";
        if($this->ol_al==0){echo "checked=\"checked\"";}
      echo" onmousedown=\"javascript:ol_form()\"> </label></td>";
      ?>
    </tr>
    <tr><td>Sex</td><?php echo "<td><label>Male 
        <input type=\"radio\" name=\"mf\" id=\"mf\" value=\"1\" ";
        if($this->sex==1){echo "checked=\"checked\"";}
        echo ">  Female
      <input type=\"radio\" name=\"mf\" id=\"mf\" value=\"0\" ";
        if($this->sex==0){echo "checked=\"checked\"";}
      echo"> </label></td>";
      ?></tr>
      <tr><td>Town</td><td><input type="text" name="town" id="town" value="<?php echo $this->town;?>"></td></tr>
      <tr><td>Date of Birth</td><td><input type="text" name="dob" value="<?php echo $this->dob;?>" required></td></tr>
     <tr><td>Name with Initials</td><td colspan="2"><input size="80" type="text" name="nameint" value="<?php echo $this->nameint;?>" required></td></tr> 
     <tr><td>Full Name</td><td colspan="2"><input size="80" type="text" name="fullname" value="<?php echo $this->fname;?>" required></td></tr> 
     <tr><td>Address</td><td colspan="2"><input size="80" type="text" name="address" value="<?php echo $this->address;?>" required></td></tr>
<tr><td>Tel</td><td colspan="2"><input type="text" name="tel1" value="<?php if(isset($this->tel1)){ echo $this->tel1;}?>" required><input type="text" name="tel2" value="<?php if(isset($this->tel2)){ echo $this->tel2;}?>">
<input type="text" name="tel3" value="<?php if(isset($this->tel3)){ echo $this->tel3;}?>" ></td></tr>
<?php
$ac=1;
while($ac<=3){
    if(isset($this->{"tel".$ac})){
        echo "<input type=\"hidden\" name=\"htel".$ac."\" value=\"".$this->{"tel".$ac}."\" >"; 
    }
    $ac=$ac+1;
}
?>

<tr><td>N.I.C No</td><td cospan="2"><input type="text" name="nic" value="<?php if(isset($this->nic)){ echo $this->nic;}?>" ></td></tr>
<tr><th colspan="3" bgcolor="pink" height="19"><b>Grade 5 Scholarship</b></th></tr>
<tr><td>Examination Number</td><td colspan="2"><input type="text" name="g5ex" value="<?php if(isset($this->exam_no)){ echo $this->exam_no;}?>" ></td></tr>
<tr><td>Year</td><td colspan="2"><?php echo $this->g5years;?></td></tr>
<tr><td>Marks</td><td colspan="2"><input type="text" name="g5marks" value="<?php if(isset($this->marks)){ echo $this->marks;}?>" ></td></tr>
<tr>
    <th bgcolor="pink" colspan="3">Brother/Sisters</th>
    </tr>
<tr><td>Brother/Sister 1</td><td colspan="2"><input type="text" name="bro1" value="<?php if(isset($this->bro1)){ echo $this->bro1;}?>" ></td></tr>
<tr><td>Brother/Sister 2</td><td colspan="2"><input type="text" name="bro2" value="<?php if(isset($this->bro2)){ echo $this->bro2;}?>" ></td></tr>
<tr><td>Brother/Sister 3</td><td colspan="2"><input type="text" name="bro3" value="<?php if(isset($this->bro3)){ echo $this->bro3;}?>" ></td></tr>
<tr><td>Brother/Sister 4</td><td colspan="2"><input type="text" name="bro4" value="<?php if(isset($this->bro4)){ echo $this->bro4;}?>" ></td></tr>
<tr>
    <th bgcolor="pink" colspan="3">Schools Attended</th>
    </tr>
<?php 
$count=1;
while ($count<10){
    if(isset($this->{"sch".$count})){
        echo '<tr><td>School'.$count.'</td><td colspan="2">'.$this->{"sch".$count}.'</td></tr>';
    }
    $count=$count+1;
}
?>
   <tr class="ol">
    <th bgcolor="pink" colspan="3">O/L Result</th>
    </tr>
    <tr class="ol">
    <td> Examination NO </td><td colspan="2"><input type="text" name="olno" value="<?php if(isset($this->exno)){echo $this->exno;}?>"></td>
    </tr>
    <tr class="ol">
    <td> Year </td><td colspan="2"><?php echo $this->olyear; ?></td>
    </tr>
    
    <tr class="ol">
    <td>Mathematics </td><td colspan="2"><input type="hidden" name="sub1" value="1"><input type="hidden" name="hsubid1" value="1"> <select name="res1"><?php if(isset($this->res3)){ echo "<option value=\"{$this->res3}\">{$this->res3}</option>"; }?><option value="A">A</option><option value="B">B</option><option value="C">C</option>
            <option value="S">S</option><option value="W">W</option><option value="ab">ab</option></select></td>
    </tr>
    <tr class="ol">
    <td>Science </td><td colspan="2"> <input type="hidden" name="sub2" value="2"><input type="hidden" name="hsubid2" value="2"> <select name="res2"><?php if(isset($this->res5)){ echo "<option value=\"{$this->res5}\">{$this->res5}</option>"; }?><option value="A">A</option><option value="B">B</option><option value="C">C</option>
            <option value="S">S</option><option value="W">W</option><option value="ab">ab</option></select></td>
    </tr>
    <tr class="ol">
    <td> History </td><td colspan="2"> <input type="hidden" name="sub3" value="6"><input type="hidden" name="hsubid3" value="6"> <select name="res3"><?php if(isset($this->res13)){ echo "<option value=\"{$this->res13}\">{$this->res13}</option>"; }?><option value="A">A</option><option value="B">B</option><option value="C">C</option>
            <option value="S">S</option><option value="W">W</option><option value="ab">ab</option></select></td>
    </tr>
    <tr class="ol">
    <td>English </td><td colspan="2"> <input type="hidden" name="sub4" value="3"><input type="hidden" name="hsubid4" value="3"><select name="res4">
    
    <?php if(isset($this->res11)){ echo "<option value=\"{$this->res11}\">{$this->res11}</option>"; }?>
    <option value="A">A</option><option value="B">B</option><option value="C">C</option>
            <option value="S">S</option><option value="W">W</option><option value="ab">ab</option></select></td>
    </tr>
    <tr class="ol">
    <td>
    <select name="sub5">
    <?php $ab=1;
    while ($ab<10){
        if(isset($this->{"olsubid".$ab}) and $this->{"olsubtype".$ab}=="L1" )
        { 
            echo "<option value=\"{$this->{"olsubid".$ab}}\">{$this->{"olsubname".$ab}}</option>";
            $this->lan=$ab;
            break;
        }
        $ab=$ab+1;
    }
    ?>
    <option value="4">Sinhala</option><option value="5">Tamil</option></select> </td><td colspan="2"> 
    <?php 
    if(isset($this->lan)){
        $id=$this->lan;
        
        echo "<input type=\"hidden\" name=\"hsubid5\" value=\"{$this->{"olsubid".$id}}\">";
    }
    ?>
    <select name="res5">
    <?php 
    if(isset($this->lan))
    {
        $lan=$this->lan;
        echo "<option value=\"{$this->{"myres".$lan}}\">{$this->{"myres".$lan}}</option>";
    }
    ?>
    <option value="A">A</option><option value="B">B</option><option value="C">C</option>
            <option value="S">S</option><option value="W">W</option><option value="ab">ab</option></select></td>
    </tr>
    <?php echo $this->subject6; 
        echo $this->subject7;
        echo $this->subject8;
        echo $this->subject9;
    ?>
    <tr>
      <td height="27">&nbsp;</td>
      <td colspan="2"><label>
        <input type="submit" name="submit" id="submit" value="Edit">
        <input type="reset" name="reset" id="reset" value="Cancel">
      </label></td>
    </tr>
       </table>
           <script type="text/javascript">
function ol_form(){
	    $(".ol").show("slow");		
	}
function col_form(){
    $(".ol").hide("slow");		
}
</script>
    