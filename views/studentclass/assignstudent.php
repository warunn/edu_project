<?php

$class_id = $this->class_detail[0]['class_id'];
$class_name = $this->class_detail[0]['name'];
$class_year = $this->class_detail[0]['year'];
$class_no_of_student = $this->class_detail[0]['no_of_student'];
$no_of_assigned_student = sizeof($this->noofassignstudent);
$assign_student = $this->noofassignstudent;
$existing_class= $this->exsiting_classes;

 ?>
 
 <div id="main_area">
    <div class="post"> 
    <h1 align="center">Assign Student to <?php echo $class_name; ?> - <?php echo $class_year; ?>  Class</h1>

    <div id="existingclass">
    	<table>
    		<tr>
				<td>Assign Existing Class</td><td>

					<select name="existingclassselect" id="existingclassselect">
						<option value="0">Select</option>
						<?php
							foreach($existing_class as $key => $value) { ?>

								<option value="<?php echo $value['class_id'] ?>"><?php echo $value['name'] ?> | <?php echo $value['year'] ?> | <?php echo $value['medium'] ?></option>
								
							<?php }
						?>

					    	   
					</select>

				</td>
				<td><button onclick="viewClass();" id="assignclass">Assign Class</button></td>
				<td><span id="success" style="color:green"></span></td>
			</tr>
    	</table>

    	<table id="records_table" border='1'>
		   
		</table>

    	

    </div>


    <div id="add_new_student">
    

	<table>
		<?php 
			for($i=1; $i <= $no_of_assigned_student  ; $i++){
				echo '<tr>';
	    	   	echo '<td>';
	    	   		echo '<label>Seat '.$i.'</label>';
	    	   	echo '</td>';

	    	   	echo '<td>';
	    	   	echo '<input type="text" name="admission_no'.$i.'" id="admission_no'.$i.'" value="'.$assign_student[$i-1]['stuid'].'" disabled/>';
	    	   	echo '</td>'; 

	    	   	echo '<td>';
	    	   		echo '<button disabled="disabled">Assign</button>';
	    	   	echo '</td>';

	    	   	echo '<td>';
	    	   		echo '<span id="spanadmission_no'.$i.'" style="color:green">Already Booked</span>';
	    	   	echo '</td>';

	    	   	echo '</tr>';
			}

    	   	for($i=$no_of_assigned_student+1; $i <= $class_no_of_student  ; $i++) {
    	   		
    	   	echo '<tr>';
    	   	echo '<td>';
    	   		echo '<label>Seat '.$i.'</label>';
    	   	echo '</td>';

    	   	echo '<td>';
    	   	echo '<input type="text" name="admission_no'.$i.'" id="admission_no'.$i.'"/>';
    	   	echo '</td>'; 

    	   	echo '<td>';
    	   		echo '<button onclick="assignStudent('.$i.')">Assign</button>';
    	   	echo '</td>';

    	   	echo '<td>';
    	   		echo '<span id="spanadmission_no'.$i.'" style="color:green"></span>';
    	   	echo '</td>';

    	   	echo '</tr>';

    	    }
		
    	?>	


</table>
</div>


<script type="text/javascript">
	
	function assignStudent($rowid) {
		var rowid = $rowid;
		var url = '<?php echo URL; ?>studentclass/assignstudenttoclass';
		var stid = document.getElementById("admission_no"+rowid).value;
		var class_id = '<?php echo $class_id; ?>';
		var class_year = '<?php echo $class_year?>';
             $.ajax({
                 type: "POST",
                 url : url,
                 data: "stuid="+stid+"&class_id="+class_id+"&year="+class_year,
                 success: function(res)
                 {
                  if($.trim(res)==200){

                  	document.getElementById('spanadmission_no'+rowid).innerHTML="Successfully Assigned";

                  	var m=document.getElementById('admission_no'+rowid);

					m.setAttribute("disabled","disabled"); 

                  	// $("#admission_no"+rowid).attr("disabled", disable);
                 

                    console.log('Successfully......!!');
                    
                  }else if ($.trim(res)==300) {
                    alert('already assign');
                    console.log('You Cant......!!');
                  }else if ($.trim(res)==400) {
                  	alert('check addmission no');
                  }
                 }

               });
	}
</script>

<script type="text/javascript">

	function viewClass(){

		var existing_class_id = document.getElementById("existingclassselect").value;
		var class_id = '<?php echo $class_id ?>';
		var year = '<?php echo $class_year ?>';
		var url = '<?php echo URL; ?>studentclass/getexistingclassstudent';



		$.ajax({
                 type: "POST",
                 url : url,
                 data: "class_id="+class_id+"&existing_class_id="+existing_class_id+"&year="+year,
                 success: function(res)
                 {
                 	var x=document.getElementById('existingclassselect');
					x.setAttribute("disabled","disabled");

					var y=document.getElementById('assignclass');
					y.setAttribute("disabled","disabled");

					document.getElementById('success').innerHTML="Successfully Assigned";
                   $("#add_new_student").hide();



                 }

               });

		// alert(x);
	}

</script>


</div>
</div>