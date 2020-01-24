
 <div id="main_area">
    <div class="post"> 
    <h1 align="center">Register New Class</h1>

<form action="<?php echo URL;?>studentclass/create" method="post"  enctype="multipart/form-data">
	<table>
<tr>
<td>Class Name</td><td><input type="text" name="name" size="60"></td>
</tr>
<tr>
<td>Year</td><td><input type="text" name="year"></td>
</tr>
<tr>
<td>No of students</td><td><input type="number" name="no_of_student"></td>
</tr>

<tr>
<td>Medium</td><td>
	<select name="medium">
	    <option value="sinhala">Sinhala</option>
	    <option value="english">English</option>
	    <option value="tamil">Tamil</option>
	  </select>
</td>
</tr>

<tr>
<td>Assign class teacher</td><td>

	<select name="class_teacher_id">
		<?php
			foreach($this->teacherList as $key => $value) { ?>

				<option value="<?php echo $value['tid'] ?>"><?php echo $value['name'] ?></option>
				
			<?php }
		?>

	    	   
	</select>

</td>
</tr>

<tr>
<td>&nbsp;</td><td><input type="submit" value="create"></td>
</tr>
</table>

</form>

</div>
</div>