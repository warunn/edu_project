<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Make question</title>
</head>

<body>
<h1> Question 1</h1>
<form action="process.php">
	
<table>
	<tr>
		<td>question text </td><td><textarea name="qt1" cols="100" rows="5"></textarea></td></tr>
	<tr>
		<td>question pic </td><td><input type="file" name="qp1"></td></tr>
	
	<tr>
		<td>question text </td><td><textarea name="qt2" cols="100" rows="5"></textarea></td></tr>
	<tr>
		<td>question pic </td><td><input type="file" name="qp2"></td></tr>
	
</table>
<h3>options</h3>
(1) <input type="checkbox" name="ans1"> option1 <input type="text" name="op1"> option1 pic <input type="file" name="oppic1"><br/>
(2) <input type="checkbox" name="ans2"> option2 <input type="text" name="op2"> option2 pic <input type="file" name="oppic2"><br/>
(3) <input type="checkbox" name="ans3"> option3 <input type="text" name="op3"> option3 pic <input type="file" name="oppic3"><br/>
(4) <input type="checkbox" name="ans4"> option4 <input type="text" name="op4"> option4 pic <input type="file" name="oppic4"><br/>
(5) <input type="checkbox" name="ans5"> option5 <input type="text" name="op5"> option5 pic <input type="file" name="oppic5"><br/>
<table>
	<tr>
		<td>Difficulty Level</td><td><select name="diff"><option value="vdifficult">Very Difficult</option>
								<option value="difficult">Difficult</option>
								<option value="normal">Normal</option>
								<option value="easy">Easy</option>
								</select></td>
	</tr>
	<tr>
		<td>Time Taken </td><td> <input type="text" name="time" value="2"></td>
	</tr>
	

</table>
<input type="submit" value="submit">
</form>
<?php

?>

</body>
</html>
