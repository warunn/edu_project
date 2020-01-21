<div id="main_area">
    <div class="post">
<h1>Create New Admin User</h1>

<form method="post" action="<?php echo URL;?>user/create">
<table>
<tr>
<td><label>User Name</label></td><td><input type="text" name="login" /></td></tr>
<tr><td><label>Password</label></td><td><input type="text" name="password" /></td></tr>
<tr><td><label>Role</label></td><td>
		<select name="role">
			<option value="webadmin">Webadmin</option>
			<option value="admin">Admin</option>
		</select></td></tr>
		<tr><td>
	<label>&nbsp;</label></td><td><input type="submit" /></td></tr>
	</table>
</form>

<hr />
</div>
</div>
