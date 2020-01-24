<style type="text/css">
.ol{
<?php 
if($this->ol_al==1){
  echo "display:none;" ; 
}

?>

}
</style>

<script type="text/javascript">
	function printContent(el) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>

<div id="main_area">
<div class="post">

<div class="container" id="examples">

	
    <h1>Student Profile</h1>
    <table class="table table-dark">
<tr>
<td rowspan="6">
<?php 
//print_r($this->pic);
	$image=imagecreatefromstring($this->pic["data"]);
	ob_start();
	imagejpeg($image,null,80);
	$data=ob_get_contents();
	ob_end_clean();
	echo '<img src="data:image/jpg;base64,'.base64_encode($data).'" width="120px"  />';
	?>


</td><td>Admission No</td><td><?php echo $this->stid;?></td></tr>
    <tr><td>Admission Date</td><td><?php echo $this->addate;?></td></tr>
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
      <tr><td>Town</td><td><?php echo $this->town;?></td></tr>
      <tr><td>Date of Birth</td><td><?php echo $this->dob;?></td></tr>
     <tr><td>Name with Initials</td><td colspan="2"><?php echo $this->nameint;?></td></tr> 
     <tr><td>Full Name</td><td colspan="2"><?php echo $this->fname;?></td></tr> 
     <tr><td>Address</td><td colspan="2"><?php echo $this->address;?></td></tr>
<tr><td>Tel</td><td colspan="2"><?php if(isset($this->tel1)){ echo $this->tel1;}?> &nbsp;|&nbsp; <?php if(isset($this->tel2)){ echo $this->tel2;}?>&nbsp;|&nbsp;<?php if(isset($this->tel3)){ echo $this->tel3;}?></td></tr>
<tr><td>N.I.C No</td><td colspan="2"><?php if(isset($this->nic)){ echo $this->nic;}?></td></tr>
<tr><th colspan="3" bgcolor="pink" height="19"><b>Grade 5 Scholarship</b></th></tr>
<tr><td>Examination Number</td><td colspan="2"><?php if(isset($this->exam_no)){ echo $this->exam_no;}?></td></tr>
<tr><td>Year</td><td colspan="2"><?php if(isset($this->year)){echo $this->year;}?></td></tr>
<tr><td>Marks</td><td colspan="2"><?php if(isset($this->marks)){ echo $this->marks;}?></td></tr>
<?php if(isset($this->bro1) or isset($this->bro2) or isset($this->bro3) or isset($this->bro4)):?>
<tr>
    <th bgcolor="pink" colspan="3">Brother/Sisters</th>
    </tr>
    <?php endif;?>
<?php if(isset($this->bro1)):?><tr><td>Brother/Sister 1</td><td colspan="2"><?php echo $this->bro1;?></td></tr><?php endif;?>
<?php if(isset($this->bro2)):?><tr><td>Brother/Sister 2</td><td colspan="2"><?php  echo $this->bro2;?></td></tr><?php endif;?>
<?php if(isset($this->bro3)):?><tr><td>Brother/Sister 3</td><td colspan="2"><?php echo $this->bro3;?></td></tr><?php endif;?>
<?php if(isset($this->bro4)):?><tr><td>Brother/Sister 4</td><td colspan="2"><?php  echo $this->bro4;?></td></tr><?php endif;?>
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
<?php if(isset($this->exno)):?>
<tr class="ol">
    <th bgcolor="pink" colspan="3">O/L Result</th>
    </tr>
    <tr class="ol">
    <td> Examination NO </td><td colspan="2"><?php if(isset($this->exno)){echo $this->exno;}?></td>
    </tr>
    <tr class="ol">
    <td> Year </td><td colspan="2"><?php echo $this->olyear; ?></td>
    </tr>
    <?php $ab=1;
    while ($ab<10){
        if(isset($this->{"myres".$ab}) and isset($this->{"olsubname".$ab}))
        { 
            echo "<tr class=\"ol\"><td>".$this->{"olsubname".$ab}."</td><td colspan=\"2\">".$this->{"myres".$ab}."</td></tr>";
        }
        $ab=$ab+1;
    }
    ?>
    <?php endif; ?>
       </table>
         </div>
</div>
<table>
<tr>
<td width="200px">
<?php if(isset($this->pid) and !empty($this->pid)):?>
    <?php if(isset($this->pid)){echo "<a href='".URL."search/showparent/".$this->pid."'><div id='cbutton' width='300px' style='text-align:center;font-family:impact;width:200px;height:100;clear:both;border:3px;border-radius:3px;color:#ffffff;background-color:#000000;font-size: 17px'>Show Parent</div></a>";} ?>
    <?php endif;?>
</td>
<td width="200px">
<a href="#"  class="btn btn-warning" id="print" onclick="printContent('examples')"><div id='cbutton' style="float:left;text-align:center;font-family:impact;width:200px;height:100;border:3px;clear:both;border-radius:3px;color:#ffffff;background-color:#000000;font-size: 17px">Print Report</div></a>
</td>
</tr>
</table>
</div>


