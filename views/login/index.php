<h1>Login</h1>
<?php
if (!empty($this->msg)){
	echo "<h3 style=color:red>".$this->msg."</h3>";
}
?>
<form action="<?php echo URL;?>login/run" method="post">
	<table>
		<tr>
			<th align="left"><label>Login</label></th><th><input type="text" name="uname" /></th>
		</tr>
		<tr>
			<th align="left"><label>Password</label></th><th><input type="password" name="password" /></th>
		</tr>
		<tr>
			<!--<td colspan="2"><div class="g-recaptcha" data-sitekey="6Lc1bjMUAAAAAOqpq3VpsdwfF7nHDKq-5Kog-WTE"></div>
	<script src='https://www.google.com/recaptcha/api.js'></script></td> -->
			
		</tr>
		<tr>
			<th colspan="2" align="left"><input type="submit"  value="login"/></th>
		</tr>
	</table>
</form>