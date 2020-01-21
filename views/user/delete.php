<style>
.buttons{
background-color:#963117;
color:white;
}
</style>
<div id="main_area">
    <div class="post">
<table border="0">
<tr>
<th> User Id</th><th>User Name</th><th>Role</th><th>Edit button</th><th>Delete Button</th></tr>
<?php
	foreach($this->userList as $key => $value) {
		echo '<tr>';
		echo '<td>' . $value['id'] . '</td>';
		echo '<td>' . $value['login'] . '</td>';
		echo '<td>' . $value['role'] . '</td>';
		echo '<td><div class="buttons">
				<a href="'.URL.'user/edit/'.$value['id'].'">Edit</a></div> </td><td><div class="buttons">
				<a href="'.URL.'user/delete/'.$value['id'].'">Delete</a></div></td>';
		echo '</tr>';
	}
?>
</table>
</div>
</div>
<script type="text/javascript">
 $(".buttons").hover(function () {
    $(this).css("background-color","#6c220f")},function(){
	$(this).css("background-color","#963117");
	
  });
</script>
