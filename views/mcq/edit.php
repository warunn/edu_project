<script type="text/javascript">
function validateForm() {
    var x = document.frmFile.qt1.value;
    var y = document.frmFile.qt2.value;
    var p = $("#qp1").val();
    var q = $("#qp2").val();
    var lm = $("#p1").val();
    //alert(lm);
    
    var op = $("#p2").val();
    if ((x == "") && (y == "") && (p=="") && (q=="") && (typeof lm=="undefined" || lm=="1") && (typeof op=="undefined" || op=="1")) {
        alert("One of the Question Fields must be Filled! ");
        $(".qcell").css("background-color","#78c0A8");
        return false;
    }
    else{
    	$(".qcell").css("background-color","#ffffff");
    }
    var p= document.getElementById("ans1").checked;
    var q= document.getElementById("ans2").checked;
    var r= document.getElementById("ans3").checked;
    var s= document.getElementById("ans4").checked;
    var t= document.getElementById("ans5").checked;
    if (!(p || q || r || s || t)) {
    	$(".cell").css("background-color","#fcebb6");
    	alert("Mark the correct Answer ! ");
        return false;
    }
    else{
    	$(".cell").css("background-color","#ffffff");
    }

    
    var i=1;
    while (i<=5){
        var k=i+2;
    	var l = $("#op"+i).val();
    	var m = $("#qp"+k).val();
    	var xy= $("#p"+k).val();
    	//alert(xy);
    	if ((l == "") && (m == "") && (typeof xy=="undefined" || xy=="1")){
    		$(".ocell"+i).css("background-color","#f07818");
            alert("answer Field"+i+" must be Filled! ");
            return false;
        }
    	else{
    		$(".ocell"+i).css("background-color","#ffffff");
        	}
	i++;
    }

    
    
}
</script>


<?php //print_r($this); ?>
<div id="main_area">
    <div class="post">
<h1> Question 1</h1>
<form name="frmFile" id="frmFile" method="post" action="<?php echo URL;?>mcq/runedit/<?php echo $this->code;?>" method="post"  onSubmit="return validateForm();" enctype="multipart/form-data">

	
<table width="900px" class="qcell">
	<tr>
		<td>question text </td><td><textarea id="qt1" name="qt1" cols="80" rows="5" tabindex="1"><?php if(isset($this->qt1)){ echo $this->qt1;} ?></textarea><?php if(isset($this->qt1)){ echo '<input type="hidden" name="question1" value="question1">';} ?> </td></tr>
	
	<tr>
            <td>question pic </td><td><div id='add1' <?php if(isset($this->qp1)){echo 'style="display:none"';} ?>>IF you Want you can add a  picture <input type="file" name="qp1" id="qp1"></div><div id="pic1" <?php if(!isset($this->qp1)){echo 'style="display:none"';} ?>><?php if(isset($this->qp1)): ?><img src="<?php echo $this->qp1; ?>" style="max-width:650px" /><?php endif ?><p align="center"><input type="button" id="btn1" name="btn1" value="Remove above Picture" onmousedown="javascript:comment_form1('#add1','#pic1','#p1')"></p></div><?php if(isset($this->qp1)){ echo '<input type="hidden" id="p1" name="pic1" value="pic1">';} ?></td></tr>
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr>
		<td>question text </td><td><textarea name="qt2" cols="80" rows="5" tabindex="2"><?php if(isset($this->qt2)){ echo $this->qt2;} ?></textarea><?php if(isset($this->qt2)){ echo '<input type="hidden" name="question2" value="question2">';} ?></td></tr>
	
	<tr>
		<td>question pic </td><td><div id='add2'  <?php if(isset($this->qp2)){echo 'style="display:none"';} ?>>IF you Want you can add a  picture <input type="file" name="qp2" id="qp2"></div><div id="pic2" <?php if(!isset($this->qp2)){echo 'style="display:none"';} ?>><?php if(isset($this->qp2)): ?><img src="<?php echo $this->qp2; ?>" style="max-width:650px" /><?php endif ?><p align="center"><input type="button" id="btn2" name="btn2" value="Remove above Picture" onmousedown="javascript:comment_form1('#add2','#pic2','#p2')"></p></div><?php if(isset($this->qp2)){ echo '<input type="hidden" id="p2" name="pic2" value="pic2">';} ?></td></tr>
  	<tr><td colspan="2">&nbsp;</td></tr>
	
</table>
<h3>options</h3>
<hr/>
<table width="900px">
<tr>
<td class="cell">(1) <input tabindex="4" type="checkbox" name="ans1" id="ans1" <?php if(isset($this->option1) and $this->option1==true){ echo "checked";} ?>></td><td class="ocell1"> option1 </td><td class="ocell1"><textarea tabindex="3" name="op1" id="op1" cols="70" rows="4"><?php if(isset($this->opt1)){ echo $this->opt1;} ?></textarea><?php if(isset($this->opt1)){ echo '<input type="hidden" name="option1" value="option1">';} ?></td> </tr>
<tr>
    <td>option1 pic</td><td class="ocell1" colspan="2"> <div id='add3' style="width:450pt;<?php if(isset($this->qp3)){echo 'display:none';} ?>">IF you Want you can add a  picture <input type="file" name="qp3" id="qp3"></div><div id="pic3" style="float:left<?php if(!isset($this->qp3)){echo 'display:none';} ?>"><?php if(isset($this->qp3)): ?>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <img src="<?php echo $this->qp3; ?>"  style="max-width:650px;" /><?php endif ?><p align="center"><input type="button" name="btn3" value="Remove above Picture" onmousedown="javascript:comment_form1('#add3','#pic3','#p3')"></p></div><?php if(isset($this->qp3)){ echo '<input type="hidden" id="p3" name="pic3" value="pic3">';} ?></td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr>
<td class="cell">(2) <input tabindex="6" type="checkbox" name="ans2" id="ans2" <?php if(isset($this->option2) and $this->option2==true){ echo "checked";} ?>></td><td class="ocell2"> option2 </td><td class="ocell2"><textarea tabindex="5" name="op2" id="op2" cols="70" rows="4"><?php if(isset($this->opt2)){ echo $this->opt2;} ?></textarea><?php if(isset($this->opt2)){ echo '<input type="hidden" name="option2" value="option2">';} ?></td> </tr>
<tr>
    <td>option2 pic </td><td colspan="2"  class="ocell2"><div id='add4' style="width:450pt;<?php if(isset($this->qp4)){echo 'display:none';} ?>">IF you Want you can add a  picture <input type="file" name="qp4" id="qp4"></div><div id="pic4" <?php if(!isset($this->qp4)){echo 'style="display:none"';} ?>><?php if(isset($this->qp4)): ?><img src="<?php echo $this->qp4; ?>" style="max-width:650px" /><?php endif ?><p align="center"><input type="button" name="btn4" value="Remove above Picture" onmousedown="javascript:comment_form1('#add4','#pic4','#p4')"></p></div><?php if(isset($this->qp4)){ echo '<input type="hidden" id="p4" name="pic4" value="pic4">';} ?></td></tr>
<tr><td colspan="2" >&nbsp;</td></tr>
<tr>
<td class="cell">(3) <input tabindex="8" type="checkbox" name="ans3" id="ans3" <?php if(isset($this->option3) and $this->option3==true){ echo "checked";} ?>></td><td class="ocell3"> option3 </td><td class="ocell3"><textarea tabindex="7" name="op3" id="op3" cols="70" rows="4"><?php if(isset($this->opt3)){ echo $this->opt3;} ?></textarea><?php if(isset($this->opt3)){ echo '<input type="hidden" name="option3" value="option3">';} ?></td> </tr>
<tr>
    <td>option3 pic </td><td colspan="2" class="ocell3"><div id='add5' style="width:450pt;<?php if(isset($this->qp5)){echo 'display:none';} ?>">IF you Want you can add a  picture <input type="file" name="qp5" id="qp5"></div><div id="pic5" <?php if(!isset($this->qp5)){echo 'style="display:none"';} ?>><?php if(isset($this->qp5)): ?><img src="<?php echo $this->qp5; ?>" style="max-width:650px" /><?php endif ?><p align="center"><input type="button" name="btn5" value="Remove above Picture" onmousedown="javascript:comment_form1('#add5','#pic5','#p5')"></p></div><?php if(isset($this->qp5)){ echo '<input type="hidden" id="p5" name="pic5" value="pic5">';} ?></td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr>
<td class="cell">(4) <input tabindex="10" type="checkbox" name="ans4" id="ans4" <?php if(isset($this->option4) and $this->option4==true){ echo "checked";} ?>></td><td class="ocell4"> option4 </td><td class="ocell4"><textarea tabindex="9" name="op4" id="op4" cols="70" rows="4"><?php if(isset($this->opt4)){ echo $this->opt4;} ?></textarea><?php if(isset($this->opt4)){ echo '<input type="hidden" name="option4" value="option4">';} ?></td> </tr>
<tr>
    <td>option4 pic </td><td colspan="2" class="ocell4"><div id='add6' style="width:450pt;<?php if(isset($this->qp6)){echo 'display:none';} ?>">IF you Want you can add a  picture <input type="file" name="qp6" id="qp6"></div><div id="pic6" <?php if(!isset($this->qp6)){echo 'style="display:none"';} ?>><?php if(isset($this->qp6)): ?><img src="<?php echo $this->qp6; ?>" style="max-width:650px" /><?php endif ?><p align="center"><input type="button" name="btn6" value="Remove above Picture" onmousedown="javascript:comment_form1('#add6','#pic6','#p6')"></p></div><?php if(isset($this->qp6)){ echo '<input type="hidden" id="p6" name="pic6" value="pic6">';} ?></td></tr>
<tr><td colspan="2">&nbsp;</td></tr>

<tr>
<td class="cell">(5) <input tabindex="12" type="checkbox" name="ans5" id="ans5" <?php if(isset($this->option5) and $this->option5==true){ echo "checked";} ?>></td><td class="ocell5"> option5 </td><td class="ocell5"><textarea tabindex="11" name="op5" id="op5" cols="70" rows="4"><?php if(isset($this->opt5)){ echo $this->opt5;} ?></textarea><?php if(isset($this->opt5)){ echo '<input type="hidden" name="option5" value="option5">';} ?></td> </tr>
<tr>
    <td>option5 pic </td><td colspan="2" class="ocell5"><div id='add7' style="width:450pt;<?php if(isset($this->qp7)){echo 'display:none';} ?>">IF you Want you can add a  picture <input type="file" name="qp7" id="qp7"></div><div id="pic7" <?php if(!isset($this->qp7)){echo 'style="display:none"';} ?>><?php if(isset($this->qp7)): ?><img src="<?php echo $this->qp7; ?>" style="max-width:650px" /><?php endif ?><p align="center"><input type="button" name="btn7" value="Remove above Picture" onmousedown="javascript:comment_form1('#add7','#pic7','#p7')"></p></div><?php if(isset($this->qp7)){ echo '<input type="hidden" id="p7" name="pic7" value="pic7">';} ?></td></tr>


</table>
<table>
	<tr>
		<td>Difficulty Level</td><td><select tabindex="13" name="diff"><option value="vdifficult">Very Difficult</option>
								<option value="difficult">Difficult</option>
								<option value="normal">Normal</option>
								<option value="easy">Easy</option>
								</select></td>
	</tr>
	<tr>
		<td>Time Taken </td><td> <input type="text" name="time" value="2"></td>
	</tr>
	<script type="text/javascript">

    function comment_form1(b,a,c){
        $(a).hide("slow");
        $(b).show("slow");
        $(c).val("1");
    }


</script>
       

</table>
<input type="submit" value="submit" tabindex="14">
</form>

    </div>
</div>
<?php

?>