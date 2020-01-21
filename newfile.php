<html>
<head>
<title>login</title>
</head>
<body>
<?php 
echo md5("kaluputha123");
echo "<br/>";
?>
<form action="process.php" method="post">
username <input type="text" name="uname">
password <input type="password" name="pass">
<input type="submit" value="login">
</form>
</body>
</html>