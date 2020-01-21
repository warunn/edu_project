<div id="main_area">
    <div class="post">
    <h1>Search Student</h1>
    <table>
    <tr>
    <th>Admission Number</th><th><form action="<?php echo URL;?>search/addnorun" method="post"><input type="text" name="addno"></th><th>&nbsp;</th><th><input type="submit" value="search"></form></th>
    </tr>
    <tr>
    <th>Full Name</th><th><form action="<?php echo URL;?>search/fullrun" method="post"><input type="text" name="fname"></th><th>&nbsp;</th><th><input type="submit" value="search"></form></th>
    </tr>
    <tr>
    <th>Name with Initials</th><th><form action="<?php echo URL;?>search/initialrun" method="post"><input type="text" name="intname"></th><th>&nbsp;</th><th><input type="submit" value="search"></form></th>
    </tr>
    <tr>
    <th>Town</th><th><form action="<?php echo URL;?>search/townrun" method="post"><input type="text" name="town"></th><th>&nbsp;</th><th><input type="submit" value="search"></form></th>
    </tr>
    <tr>
    <th>Address</th><th><form action="<?php echo URL;?>search/addressrun" method="post"><input type="text" name="town"></th><th>&nbsp;</th><th><input type="submit" value="search"></form></th>
    </tr>
    </table>
<?php

?>
</div>
</div>
