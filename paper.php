<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Paper create</title>
</head>

<body>
<h2>Paper Create</h2>
<form action="process.php">
	<table>
		<tr>
			<td>Paper Name</td><td> <input type="text" name="pname"></td>
		</tr>
		<tr>
			<td>paper Time</td> <td> <input type="text" name="ptime"></td>
		</tr>
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

</body>
</html>
