<script type="text/javascript">
function validateForm() {
    var x = document.frmFile.qt1.value;
    var y = document.frmFile.qt2.value;
    var p = $("#qp1").val();
    var q = $("#qp2").val();
    if ((x == "") && (y == "") && (p=="") && (q=="")) {
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
    	if ((l == "") && (m == "")){
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

<div id="main_area">
    <div class="post">
<h1> Question <?php echo $this->cquestion;  ?></h1>
<?php
//print_r($this);
//$this->mcq->cquestion=$this->cquestion;
//$this->mcq->paper_id=$this->paper_id;onsubmit="return validateForm()"
?>
<form name="frmFile" id="frmFile" method="post" action="<?php echo URL;?>mcq/run" method="post"  onSubmit="return validateForm();" enctype="multipart/form-data">

	
<table class="qcell">
	<tr>
		<td>question text </td><td><textarea name="qt1" cols="80" rows="5" tabindex="1"></textarea></td></tr>
	<tr>
		<td>question pic </td><td><input type="file" name="qp1" id="qp1"></td></tr>
	
	<tr>
		<td>question text </td><td><textarea name="qt2" cols="80" rows="5" tabindex="2"></textarea></td></tr>
	<tr>
		<td>question pic </td><td><input type="file" name="qp2" id="qp2"></td></tr>
	
</table>


<h3>options</h3>
<table>
<tr>
<td class="cell">(1) <input type="checkbox" id="ans1" name="ans1" tabindex="4"></td><td class="ocell1"> option1 </td><td class="ocell1"><textarea name="op1" id="op1" cols="70" rows="4" tabindex="3"></textarea></td> </tr>
<tr>
<td class="cell"> &nbsp; </td><td class="ocell1">option1 pic</td> <td class="ocell1"><input type="file" name="qp3" id="qp3"></td>
</tr>
<tr>
<td class="cell">(2) <input type="checkbox" id="ans2" name="ans2" tabindex="6" ></td><td class="ocell2"> option2 </td><td class="ocell2"><textarea name="op2" id="op2" cols="70" rows="4" tabindex="5"></textarea></td> </tr>
<tr>
<td class="cell"> &nbsp; </td><td class="ocell2">option2 pic</td> <td class="ocell2"><input type="file" name="qp4" id="qp4"></td>
</tr>
<tr>
<td class="cell">(3) <input type="checkbox" id="ans3" name="ans3" tabindex="8"></td><td class="ocell3"> option3 </td><td class="ocell3"><textarea name="op3" id="op3"  cols="70" rows="4" tabindex="7"></textarea></td> </tr>
<tr>
<td class="cell"> &nbsp; </td><td class="ocell3">option3 pic</td> <td class="ocell3"><input type="file" name="qp5" id="qp5"></td>
</tr>
<tr>
<td class="cell">(4) <input type="checkbox" id="ans4" name="ans4"tabindex="10"></td><td class="ocell4"> option4 </td><td class="ocell4"><textarea name="op4" id="op4" cols="70" rows="4" tabindex="9"></textarea></td> </tr>
<tr>
<td class="cell"> &nbsp; </td><td class="ocell4">option4 pic</td> <td class="ocell4"><input type="file" name="qp6" id="qp6"></td>
</tr>
<tr>
<td class="cell">(5) <input type="checkbox" id="ans5" name="ans5" tabindex="12"></td><td class="ocell5"> option5 </td><td class="ocell5"><textarea name="op5" id="op5" cols="70" rows="4" tabindex="11"></textarea></td> </tr>
<tr>
<td class="cell"> &nbsp; </td><td class="ocell5">option5 pic</td> <td class="ocell5"><input type="file" name="qp7" id="qp7"></td>
</tr>
</table>
<table>
	<tr>
		<td>Difficulty Level</td><td><select name="diff" tabindex="13"><option value="vdifficult">Very Difficult</option>
								<option value="difficult">Difficult</option>
								<option value="normal">Normal</option>
								<option value="easy">Easy</option>
								</select></td>
	</tr>
	<tr>
		<td>Time Taken </td><td> <input type="text" name="time" value="2"></td>
	</tr>
	

</table>
<input type="submit" value="submit" tabindex="14">
</form>
    </div>
</div>

