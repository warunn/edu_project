<?php 
if(isset($this->send)){
    echo '<script type="text/javascript"> alert("Student Data Successfully Entered"); </script>';
}
?>
<style type="text/css">
.ol{
display:none;
}
</style>
<div id="main_area">
    <div class="post">
<h1 style="text-align: center">Central College Piliyandala</h1>
<form action="<?php echo URL;?>reg/run" method="post">
  <table>
    <tr>
      <td height="24">Addmission number</td>
      <td colspan="2" class="addno"><label>
      <input name="addno" type="text" id="nameint" maxlength="30" required>
      </label></td>
    </tr>
    <tr>
     
      <td height="24">Date</td><td class="addmission" colspan="2">
            
		<?php
		echo $this->aday;
		
		?>
		
	    </td>
      
    </tr>
    <!--
    <tr>
      <td height="19">Class</td>
      <td colspan="2"><label>
        <select name="class" id="class">
        </select>
      </label></td>
    </tr>
    -->
    <tr>
      <td height="19">OL/AL</td>
      <td colspan="2"><label>
        O/L
            <input type="radio" checked="checked" name="ol" id="ol" value="1"  onmousedown="javascript:col_form()">
            A/L
            <input type="radio" name="ol" id="ol" value="0" onmousedown="javascript:ol_form()">
      </label></td>
    </tr>
    <tr>
      <td height="19">Name with Initials</td>
      <td colspan="2"><label>
        <input name="nameint" type="text" id="nameint" size="32"  required>
      </label></td>
    </tr>
    <tr>
      <td height="19">Full Name</td>
      <td colspan="2"><label>
        <input name="fullname" type="text" id="fullname" size="80" required>
      </label></td>
    </tr>
    <tr>
      <td height="19">Date Of Birth</td>
      <td colspan="2" class="dob">
       <?php
       echo $this->bdate;
      ?>
      </td>
    </tr>
    <tr>
      <td height="19">Sex</td>
      <td colspan="2"><label>
 Male
     <input type="radio" name="mf" id="male" checked="checked" value="1">
      Female
      <input type="radio" name="mf" id="female" value="0">
      </label></td>
    </tr>
      <tr>
          <td>
            <label for="exampleFormControlSelect1">Batch</label>
          </td>
          <td>
          <select id="exampleFormControlSelect1" name="batch" required>
              <option value="" selected disabled> Select a Batch</option>
              <option value="<?php echo (date('Y')-0)?>">Grade 6</option>
              <option value="<?php echo (date('Y')-1)?>">Grade 7</option>
              <option value="<?php echo (date('Y')-2)?>">Grade 8</option>
              <option value="<?php echo (date('Y')-3)?>">Grade 9</option>
              <option value="<?php echo (date('Y')-4)?>">Grade 10</option>
              <option value="<?php echo (date('Y')-5)?>">Grade 11</option>
              <option value="<?php echo (date('Y')-6)?>">Grade 12</option>
              <option value="<?php echo (date('Y')-7)?>">Grade 13</option>
          </select>
          </td>
      </tr>
    <tr>
      <td height="19">Address</td>
      <td colspan="2"><label>
        <input name="address" type="text" id="address" size="80" required>
      </label></td>
    </tr>
    <tr>
      <td height="19">Town</td>
      <td colspan="2"><label>
        <input name="town" type="text" id="town" size="40" required>
      </label></td>
    </tr>
    <tr>
      <td height="19" >Tel</td>
      <td colspan="2" class="tel"><label>
        <input name="tel1" type="text" id="tel" maxlength="15" required>
        <input name="tel2" type="text" id="tel" maxlength="15">
        <input name="tel3" type="text" id="tel" maxlength="15">
      </label></td>
    </tr>
    <tr>
      <td height="19">N.I.C. No</td>
      <td colspan="2"><label>
        <input name="nic" type="text" id="Nic" maxlength="10">
      </label></td>
    </tr>
    <tr>
      <th colspan="3" bgcolor="pink" height="19" class="school"><h4><u>School Attended</u></h4></th>
      
    </tr>
    <tr>
      <td height="19">School 1</td>
      <td colspan="2">
       
      <?php
      echo $this->school1;
      ?>
      </td>
    </tr>
    <tr id="sch1" style="display:none;">
      <td height="19">School 2</td>
      <td colspan="2">
      <?php
      echo $this->school2;
      ?>
       
      </td>
    </tr>
    <tr id="sch2" style="display:none">
      <td height="19">School 3</td>
      <td colspan="2">
      <?php
      echo $this->school3;
      ?>
      </td>
    </tr>
    <tr id="sch3" style="display:none">
      <td height="19">School 4</td>
      <td colspan="2">
       <?php
       echo $this->school4;
      ?>
      
       
      </td>
    </tr>
    <tr id="sch4" style="display:none">
      <td height="19">School 5</td>
      <td colspan="2">
       <?php
       echo $this->school5;
      ?>
      </td>
    </tr>
    <tr id="sch5" style="display:none">
      <td height="19">School 6</td>
      <td colspan="2">
       <?php
       echo $this->school6;
      ?>
      </td>
    </tr>
    <tr id="sch6" style="display:none">
      <td height="19">School 7</td>
      <td colspan="2">
       <?php
       echo $this->school7;
      ?>
      </td>
    </tr>
    <tr id="sch7" style="display:none">
      <td height="19">School 8</td>
      <td colspan="2">
       <?php
       echo $this->school8;
      ?>
      </td>
    </tr>
    <tr id="sch8" style="display:none">
      <td height="19">School 9</td>
      <td colspan="2">
       <?php
       echo $this->school9;
      ?>
      </td>
    </tr>
    <tr id="sch9" style="display:none;border-bottom-color: #F3C0B4;">
      <td height="19">School 10</td>
      <td colspan="2">
       <?php
       echo $this->school10;
      ?>
      </td>
    </tr>
    
    <tr>
    <td colspan="3" align="center">
    <input type="hidden" id="#inc" value="1">
    <a href="#" onclick="return false" onmousedown="javascript:comment_form()"><div id='cbutton' width='150' style='font-family:impact;height:100;min-width:160;clear:both;border:3px;border-radius:3px;color:#ffffff;background-color:#000000;font-size: 17px'>Add School</div></a>
<script type="text/javascript">
function comment_form(){
	    var counter = document.getElementById('#inc').value;
	    $("#sch"+counter).show("slow");
	    counter++;
	    document.getElementById('#inc').value=counter ;
			
	}
</script>
	</td>
	</tr>
    <tr>
      <th colspan="3" bgcolor="pink" height="19"><b>Grade 5 Scholarship</b></th>
    </tr>
    <tr>
      <td height="19">Examination No</td>
      <td colspan="2" class="g5ex"><label>
        <input name="g5ex" type="text" id="g5ex" maxlength="8">
      </label></td>
    </tr>
    <tr>
      <td height="19">Year</td>
      <td colspan="2">
       <?php
		echo $this->Eyear;
		?>
		</td>
    </tr>
    <tr>
      <td height="19" >Marks</td>
      <td colspan="2" class="g5marks"><input name="g5marks" type="text" id="g5marks" maxlength="3" required></td>
    </tr>
    <tr>
      <th colspan="3" bgcolor="pink" height="19"><b>Brothers/Sisters</b></th>
    </tr>
    <tr>
      <td height="19">Brother/Sister 1</td>
      <td colspan="2">Add No
        <label></label> <label>
        <input name="bro1" type="text" id="bro1" maxlength="9">
      </label></td>
    </tr>
    <tr>
      <td height="19">Brother/Sister 2</td>
      <td colspan="2">Add No<label>
        <input name="bro2" type="text" id="bro2" maxlength="9">
      </label></td>
    </tr>
    <tr>
      <td height="19">Brother/Sister 3</td>
      <td colspan="2">Add No<label>
        <input name="bro3" type="text" id="bro3" maxlength="9">
      </label></td>
    </tr>
    <tr>
      <td height="19">Brother/Sister 4</td>
      <td colspan="2">Add No<label>
        <input name="bro4" type="text" id="bro4" maxlength="9">
      </label></td>
    </tr>
    <tr class="ol">
    <th bgcolor="pink" colspan="3">O/L Result</th>
    </tr>
    <tr class="ol">
    <td> Examination NO </td><td colspan="2"><input type="text" name="olno"></td>
    </tr>
    <tr class="ol">
    <td> Year </td><td colspan="2"><?php echo $this->olyear; ?></td>
    </tr>
    
    <tr class="ol">
    <td>Mathematics </td><td colspan="2"><input type="hidden" name="sub1" value="1"> <select name="res1"><option value="A">A</option><option value="B">B</option><option value="C">C</option>
            <option value="S">S</option><option value="W">W</option><option value="ab">ab</option></select></td>
    </tr>
    <tr class="ol">
    <td>Science </td><td colspan="2"> <input type="hidden" name="sub2" value="2"> <select name="res2"><option value="A">A</option><option value="B">B</option><option value="C">C</option>
            <option value="S">S</option><option value="W">W</option><option value="ab">ab</option></select></td>
    </tr>
    <tr class="ol">
    <td> History </td><td colspan="2"> <input type="hidden" name="sub3" value="6"> <select name="res3"><option value="A">A</option><option value="B">B</option><option value="C">C</option>
            <option value="S">S</option><option value="W">W</option><option value="ab">ab</option></select></td>
    </tr>
    <tr class="ol">
    <td>English </td><td colspan="2"> <input type="hidden" name="sub4" value="3"><select name="res4"><option value="A">A</option><option value="B">B</option><option value="C">C</option>
            <option value="S">S</option><option value="W">W</option><option value="ab">ab</option></select></td>
    </tr>
    <tr class="ol">
    <td><select name="sub5"><option value="4">Sinhala</option><option value="5">Tamil</option></select> </td><td colspan="2"> <select name="res5"><option value="A">A</option><option value="B">B</option><option value="C">C</option>
            <option value="S">S</option><option value="W">W</option><option value="ab">ab</option></select></td>
    </tr>
    <?php echo $this->subject6; 
        echo $this->subject7;
        echo $this->subject8;
        echo $this->subject9;
    ?>
    
    <script type="text/javascript">
function ol_form(){
	    $(".ol").show("slow");		
	}
function col_form(){
    $(".ol").hide("slow");		
}
</script>
    <tr>
      <td height="27">&nbsp;</td>
      <td colspan="2"><label>
        <input type="submit" name="submit" id="submit" value="Submit" style="margin-right: 10px">
        <input type="reset" name="reset" id="reset" value="reset"
      </label></td>
    </tr>
  </table>
</form>			
</div>
</div>
