<?php
$username=$_POST["uname"];
$pass=$_POST["pass"];
if($username=="waruna" and $pass=="abc"){
    echo "<h1>welcome waruna</h1> ";
}
else{
    echo "incorrect data";
}

?>