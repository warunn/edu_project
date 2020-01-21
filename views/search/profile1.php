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
function demoFromHTML() {
    var pdf = new jsPDF('p', 'pt', 'A4');
    // source can be HTML-formatted string, or a reference
    // to an actual DOM element from which the text will be scraped.
    source = $('#customers')[0];

    // we support special element handlers. Register them with jQuery-style 
    // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
    // There is no support for any other type of selectors 
    // (class, of compound) at this time.
    specialElementHandlers = {
        // element with id of "bypass" - jQuery style selector
        '#bypassme': function (element, renderer) {
            // true = "handled elsewhere, bypass text extraction"
            return true
        }
    };
    margins = {
        top: 80,
        bottom: 60,
        left: 10,
        width: 700
    };
    // all coords and widths are in jsPDF instance's declared units
    // 'inches' in this case
    pdf.fromHTML(
    source, // HTML string or DOM elem ref.
    margins.left, // x coord
    margins.top, { // y coord
        'width': margins.width, // max width of content on PDF
        'elementHandlers': specialElementHandlers
    },

    function (dispose) {
        // dispose: object with X, Y of the last line add to the PDF 
        //          this allow the insertion of new lines after html
        pdf.save('Test.pdf');
    }, margins);
}
</script>
<div id="main_area">
<div class="post">
<div id="customers">
	<div class="table-responsive">
	
    <h1>Student Profile</h1>
<table id="tbl" class="table table-hover"  border="1">
<tr>
<td rowspan="6"></td><td>Admission No</td><td><?php echo $this->stid;?></td></tr>
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
<tr>
    <th bgcolor="pink" colspan="3">Brother/Sisters</th>
    </tr>
<tr><td>Brother/Sister 1</td><td colspan="2"><?php if(isset($this->bro1)){ echo $this->bro1;}?></td></tr>
<tr><td>Brother/Sister 2</td><td colspan="2"><?php if(isset($this->bro2)){ echo $this->bro2;}?></td></tr>
<tr><td>Brother/Sister 3</td><td colspan="2"><?php if(isset($this->bro3)){ echo $this->bro3;}?></td></tr>
<tr><td>Brother/Sister 4</td><td colspan="2"><?php if(isset($this->bro4)){ echo $this->bro4;}?></td></tr>
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
    <tr><td>&nbsp;</td><td><?php if(isset($this->pid)){echo "<a href='".URL."search/showparent/".$this->pid."'><div id='cbutton' width='150' style='text-align:center;font-family:impact;height:100;clear:both;border:3px;border-radius:3px;color:#ffffff;background-color:#000000;font-size: 17px'>Show Parent</div></a>";} ?></td></tr>
       </table>
         </div>
</div>
<button onclick="javascript:demoFromHTML();">PDF</button>
</div>
</div>

