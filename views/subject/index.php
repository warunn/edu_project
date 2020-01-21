 <script type="text/javascript">
 <?php
		 if(isset($this->msg)): ?>
 alert("Subject Entered Correctly");
 <?php endif;?>
</script>
<form name="frmFile" id="frmFile" method="post" action="<?php echo URL;?>subject/run" method="post"  onSubmit="return validateForm();" enctype="multipart/form-data">

	
<table class="qcell">
	<tr>
		<td>Subject Name </td><td><input type="text" name="subname" size="80"  tabindex="1"></td></tr>
	<tr>
		<td>Ministry Subject ID </td><td><input type="text" name="mid" size="10" maxlength="8" tabindex="2"></td></tr>
	
	<tr>
		<td>Medium  </td><td><select name="Medium"><option value="0">සිංහල</option>
													<option value="1">English</option>
		</select></td></tr>
		
	<tr>
		<td>Type </td><td><select name="type"><option value="Main">Main</option>
												<option value="L1">Language</option>
												<option value="R1">Religion</option>
													<option value="C1">Category 1</option>
													<option value="C2">Category 2</option>
													<option value="C3">Category 3</option>
		</select></td></tr>
		<tr><td><input type="submit" value="Create Subject"> </td><td><input type="reset" value="Cancel"></td></tr> 
	
</table>
    <?php

	?>

</form>
