
<h2>Paper Create</h2>

<form name="frmFile" id="frmFile" method="post" action="<?php echo URL;?>paper/run" method="post"  onSubmit="return validate();" enctype="multipart/form-data">

	<table>
		<tr>
			<td>Paper Name</td><td> <input type="text" name="pname"></td>
		</tr>
		<tr>
			<td>Number Of Questions </td><td> <input type="text" name="noq"></td>
		</tr>
		<td>Paper Type</td><td><select name="type"><option value="1">MCQ With 5 Options</option>
								<option value="2">MCQ with 4 options</option>
								<option value="3">Structured</option>
								<option value="4">Essay</option>
								</select></td>
		</tr>
		<tr>
			<td>paper Time</td> <td>Hours <select name="hours"><option value="7">7</option>
								<option value="6">6</option>
								<option value="5">5</option>
								<option value="4">4</option>
								<option value="3">3</option>
								<option value="2">2</option>
								<option value="1">1</option>
								<option value="0">0</option>
								</select>
						Minutes <select name="minutes"><option value="7">7</option>
								<option value="6">6</option>
								<option value="5">5</option>
								<option value="4">4</option>
								<option value="3">3</option>
								<option value="2">2</option>
								<option value="1">1</option>
								<option value="0">0</option>
								</select> </td>
		</tr>
		<tr>
		<td>Medium</td><td><select name="medium"><option value="sinhala">Sinhala</option>
								<option value="tamil">Tamil</option>
								<option value="English">English</option>
								<option value="Arabic">Arabic</option>
								</select></td>
		</tr>
		<tr>
		<td>grade</td><td><select name="grade"><option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								</select></td>
		</tr>
		<tr>
		<td>Difficulty Level</td><td><select name="diff"><option value="vdifficult">Very Difficult</option>
								<option value="difficult">Difficult</option>
								<option value="normal">Normal</option>
								<option value="easy">Easy</option>
								</select></td>
		</tr>
		<tr>
			<td>Subject Name </td><td> <select name="subject">
								<option value=""></option>
								<option value="1001">Sinhala</option>
								<option value="1002">Maths</option>
								<option value="1003">Science</option>
								<option value="1004">Econ</option>
								</select></td>
		</tr>
		
	</table>
<input type="submit">
</form>
<?php

?>
