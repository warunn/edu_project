<script type="text/javascript">
 <?php
		 if(isset($this->msg)): ?>
 alert("Teacher Registered Successfully");
 <?php endif;?>
</script>
 <div id="main_area">
    <div class="post"> 
    <h1 align="center">Register New Teacher</h1>
<form action="<?php echo URL;?>teacher/register" method="post"  enctype="multipart/form-data">
<table>
<tr>
<td>Full name</td><td><input type="text" name="name" size="60"></td>
</tr>
<tr>
<td>NIC No</td><td><input type="text" name="nic" size="60"></td>
</tr>
<tr>
<td>Address</td><td><input type="text" name="address" size="60"></td>
</tr>
<tr>
<td>Uname</td><td><input type="text" name="uname" size="60"></td>
</tr>
<tr>
<td>Password</td><td><input type="password" name="pass" size="60"></td>
</tr>
<tr>
<td>Mobile No</td><td><input type="text" name="mobile_tel" size="60"></td>
</tr>
<tr>
<td>Land No</td><td><input type="text" name="land_tel" size="60"></td>
</tr>
<tr>
<td>Training</td><td><input type="text" name="training" size="60"></td>
</tr>
<tr>
<td>Appointment Subject</td><td><input type="text" name="app_sub" size="60"></td>
</tr>
<tr>
<td>Appointment date</td><td><input type="text" name="app_date" size="60"></td>
</tr>
<tr>
<td>Date Started in School</td><td><input type="text" name="sch_date" size="60"></td>
</tr>
<tr>
<td>Gender</td><td>Male &nbsp; <input type="radio" name="gender" value="1"> &nbsp; Female &nbsp; <input type="radio" name="gender" value="0"></td>
</tr>
<tr>
<td>Pic</td><td><input type="file" name="pic"></td>
</tr>
<tr>
<td>&nbsp;</td><td><input type="submit" value="register"></td>
</tr>
</table>
</form>
<br/><br/><br/><br/><br/><br/><br/>
</div>
</div>