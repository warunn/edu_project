<?php //print_r($this);?>
<div id="main_area">
    <div class="post">

<a href="">Last question</a> &nbsp; &nbsp; &nbsp; &nbsp; <a href="">next question</a>

<table><?php  if(isset($this->qt1)): ?>
	<tr>
	 
		<td>1.</td><td colspan="2"><?php echo $this->qt1;  ?> </td>
	</tr>
	<?php endif ?>
	<?php  if(isset($this->qp1)): ?>
	<tr>
		<td colspan="3"> &nbsp; &nbsp; &nbsp; <?php echo "<img src='{$this->qp1}' style='max-width:700px' />"; ?></td>
	</tr>
	<?php endif ?>
	<?php  if(isset($this->qt2)): ?>
	<tr>
	 
		<td>1.</td><td colspan="2"><?php echo $this->qt2;  ?> </td>
	</tr>
	<?php endif ?>
	<?php  if(isset($this->qp2)): ?>
	<tr>
		<td colspan="3"> &nbsp; &nbsp; &nbsp; <?php echo "<img src='{$this->qp2}' style='max-width:700px' />"; ?></td>
	</tr>
	<?php endif ?>
</table>
<pre>
</pre>
<hr>
	answers
<pre>
</pre>	
<table> <form action="<?php echo URL; ?>mcq/result/<?php echo $this->qcode; ?>" method="post">
	<tr>
		<td <?php  if(isset($this->qp3)){echo 'rowspan="2"';}  ?> >A.</td><td>&nbsp; &nbsp; &nbsp;<?php  if(isset($this->opt1)){echo $this->opt1;}  ?></td><td <?php  if(isset($this->qp3)){echo 'rowspan="2"';}  ?>> <input type="radio" name="option" value="1"></td>
	</tr>
	<?php if(isset($this->qp3)): ?>
	<tr>
		<td> &nbsp; &nbsp; &nbsp; <?php  echo "<img src='{$this->qp3}' style='max-width:600px' />";  ?></td>
	</tr>
	<?php endif; ?>
	<tr>
		<td <?php  if(isset($this->qp4)){echo 'rowspan="2"';}  ?> >B.</td><td>&nbsp; &nbsp; &nbsp;<?php  if(isset($this->opt2)){echo $this->opt2;}  ?></td><td <?php  if(isset($this->qp4)){echo 'rowspan="2"';}  ?>  ><input type="radio" name="option" value="2"></td>
	</tr>
	<?php if(isset($this->qp3)): ?>
	<tr>
		<td> &nbsp; &nbsp; &nbsp; <?php  if(isset($this->qp4)){echo "<img src='{$this->qp4}' style='max-width:600px' />";}  ?></td>
	</tr>
	<?php endif; ?>
	<tr>
		<td <?php  if(isset($this->qp5)){echo 'rowspan="2"';}  ?> >C.</td><td>&nbsp; &nbsp; &nbsp;<?php  if(isset($this->opt3)){echo $this->opt3;}  ?></td><td <?php  if(isset($this->qp5)){echo 'rowspan="2"';}  ?> ><input type="radio" name="option" value="3"></td>
	</tr>
	<?php if(isset($this->qp3)): ?>
	<tr>
		<td> &nbsp; &nbsp; &nbsp; <?php  if(isset($this->qp5)){echo "<img src='{$this->qp5}' style='max-width:600px' />";}  ?></td>
	</tr>
	<?php endif; ?>
	<tr>
		<td <?php  if(isset($this->qp6)){echo 'rowspan="2"';}  ?> >D.</td><td>&nbsp; &nbsp; &nbsp;<?php  if(isset($this->opt4)){echo $this->opt4;}  ?></td><td <?php  if(isset($this->qp6)){echo 'rowspan="2"';}  ?> ><input type="radio" name="option" value="4"></td>
	</tr>
	<?php if(isset($this->qp3)): ?>
	<tr>
		<td> &nbsp; &nbsp; &nbsp; <?php  if(isset($this->qp6)){echo "<img src='{$this->qp6}' style='max-width:600px' />";}  ?></td>
	</tr>
	<?php endif; ?>
	<tr>
		<td <?php  if(isset($this->qp7)){echo 'rowspan="2"';}  ?> >E.</td><td>&nbsp; &nbsp; &nbsp;<?php  if(isset($this->opt5)){echo $this->opt5;}  ?></td><td <?php  if(isset($this->qp7)){echo 'rowspan="2"';}  ?> ><input type="radio" name="option" value="5"></td>
	</tr>
	<?php if(isset($this->qp3)): ?>
	<tr>
		<td> &nbsp; &nbsp; &nbsp; <?php  if(isset($this->qp7)){echo "<img src='{$this->qp7}' style='max-width:600px' />";}  ?></td>
	</tr>
	<?php endif; ?>
	<tr>
	 <td colspan="2"><input type="submit"/></td>
	</tr>
	</form>
		
</table>


<?php

?>
<a href="">Last question</a> &nbsp; &nbsp; &nbsp; &nbsp; <a href="">next question</a>

    </div>
</div>