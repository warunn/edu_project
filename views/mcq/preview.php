<?php

?><div id="main_area">
    <div class="post">
<table border="0">
	<?php  if(isset($this->qt1)):?><tr>
	 <td><?php echo Session::get('cquestion')." ) ";  ?></td><td colspan="2"><?php echo $this->qt1;?></td>
	</tr>
	<?php endif?>
	<?php  if(isset($this->qp1)):?><tr>
		<td colspan="3"> &nbsp; &nbsp; &nbsp;<?php echo "<img src='{$this->qp1}' style='max-width:700px' />";?></td>
	</tr>
	<?php endif?>
	<?php  if(isset($this->qt2)):?>
	<tr>
	 
		<td>&nbsp;</td><td colspan="2"><?php echo $this->qt2;?> </td>
	</tr>
	<?php endif?>
	<?php  if(isset($this->qp2)):?>
	<tr>
		<td colspan="3"> &nbsp; &nbsp; &nbsp;<?php echo "<img src='{$this->qp2}' style='max-width:700px' />";?></td>
	</tr>
	<?php endif?></table>
<pre>
</pre>
<hr>
<?php
if (isset($this->fresult) and $this->fresult==true){
	echo "<img src='".URL."i462/1.gif' width='70px'> <b> CORRECT !</b>";
}
else if (isset($this->fresult) and $this->fresult==false) {
	echo "<img src='".URL."i462/2.gif' width='70px'> <b> WRONG !</b>";
}
?>
<pre>
</pre>	
<table border="0">
	<tr>
		<td<?php  if(isset($this->qp3)){echo ' rowspan="2"';}?>>A.</td><td>&nbsp; &nbsp; &nbsp;<?php  if(isset($this->opt1)){echo $this->opt1;}  ?></td><td<?php  if(isset($this->qp3)){echo ' rowspan="2"';}  ?>> &nbsp; &nbsp; &nbsp; &nbsp;<?php if($this->option1){ echo "<b  style='color:green'>correct answer</b>";} ?></td>
	</tr>
	<?php if(isset($this->qp3)): ?>
	<tr>
		<td> &nbsp; &nbsp; &nbsp;<?php  echo "<img src='{$this->qp3}' style='max-width:600px' />";  ?></td>
	</tr>
	<?php endif; ?>
	<tr>
		<td<?php  if(isset($this->qp4)){echo ' rowspan="2"';}  ?>>B.</td><td>&nbsp; &nbsp; &nbsp;<?php  if(isset($this->opt2)){echo $this->opt2;}  ?></td><td<?php  if(isset($this->qp4)){echo ' rowspan="2"';}  ?>> &nbsp; &nbsp; &nbsp; &nbsp;<?php if($this->option2){ echo "<b style='color:green'>correct answer</b>";} ?></td>
	</tr>
	<?php if(isset($this->qp3)): ?>
	<tr>
		<td> &nbsp; &nbsp; &nbsp;<?php  if(isset($this->qp4)){echo "<img src='{$this->qp4}' style='max-width:600px' />";}  ?></td>
	</tr>
	<?php endif; ?>
	<tr>
		<td<?php  if(isset($this->qp5)){echo ' rowspan="2"';}  ?>>C.</td><td>&nbsp; &nbsp; &nbsp;<?php  if(isset($this->opt3)){echo $this->opt3;}  ?></td><td<?php  if(isset($this->qp5)){echo ' rowspan="2"';}  ?>> &nbsp; &nbsp; &nbsp; &nbsp;<?php if($this->option3){ echo "<b  style='color:green'>correct answer</b>";} ?></td>
	</tr>
	<?php if(isset($this->qp3)): ?>
	<tr>
		<td> &nbsp; &nbsp; &nbsp;<?php  if(isset($this->qp5)){echo "<img src='{$this->qp5}' style='max-width:600px' />";}  ?></td>
	</tr>
	<?php endif; ?>
	<tr>
		<td<?php  if(isset($this->qp6)){echo ' rowspan="2"';}  ?>>D.</td><td>&nbsp; &nbsp; &nbsp;<?php  if(isset($this->opt4)){echo $this->opt4;}  ?></td><td<?php  if(isset($this->qp6)){echo ' rowspan="2"';}  ?>> &nbsp; &nbsp; &nbsp; &nbsp;<?php if($this->option4){ echo "<b  style='color:green'>correct answer</b>";} ?></td>
	</tr>
	<?php if(isset($this->qp3)): ?>
	<tr>
		<td> &nbsp; &nbsp; &nbsp;<?php  if(isset($this->qp6)){echo "<img src='{$this->qp6}' style='max-width:600px' />";}  ?></td>
	</tr>
	<?php endif; ?>
	<tr>
		<td<?php  if(isset($this->qp7)){echo ' rowspan="2"';}  ?>>E.</td><td>&nbsp; &nbsp; &nbsp;<?php  if(isset($this->opt5)){echo $this->opt5;}  ?></td><td<?php  if(isset($this->qp7)){echo ' rowspan="2"';}  ?>> &nbsp; &nbsp; &nbsp; &nbsp;<?php if($this->option5){ echo "<b  style='color:green'>correct answer</b>";} ?></td>
	</tr>
	<?php if(isset($this->qp3)): ?>
	<tr>
		<td> &nbsp; &nbsp; &nbsp;<?php  if(isset($this->qp7)){echo "<img src='{$this->qp7}' style='max-width:600px' />";}  ?></td>
	</tr>
	<?php endif; ?>
	</table>
	<div style="float: left">
<form name="frmFile" id="frmFile" method="post" action="<?php echo URL;?>mcq/mcqedit/<?php echo $this->qcode;?>" method="post"  onSubmit="return validate();" enctype="multipart/form-data">
<input type="submit" value="Edit This Question" tabindex="2">
</form>
</div>
<div style="float: left">
<form name="frmFile" id="frmFile" method="post" action="<?php echo URL;?>mcq/index" method="post"  onSubmit="return validate();" enctype="multipart/form-data">
<input type="hidden" name="next" value="next"> 
<input type="submit" value="Go to Next Question" tabindex="1">
</form>
</div>
</div>
</div>