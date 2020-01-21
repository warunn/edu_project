<div id="main_area">
    <div class="post">
        <table>
        <tr><td colspan="2" bgcolor="yellow"><img src="<?php echo URL; ?>pic/warning.gif" width="100px"/>  Please Note Once you Click the Delete button There will not be any going back</td></tr>
<?php
$a=1;
echo "<ol>";
$ans=$this->msg1->fetch();
		while ($ans){
			echo "<tr><td><form action='".URL."article/rundelete' method='post'>";
                        echo "<input type='hidden' name='post_id' value='".$ans["post_id"]."'/>";
                        echo "<div style='float:left;'><h3><li>".$ans["topic"]." </li></h3></div> &nbsp; &nbsp;</td><td> ";
                        echo "<input type='submit' id='sub' value='Delete Article'>";
                        echo "</form></td></tr>";
                        $ans=$this->msg1->fetch();
		$a=$a+1;
		}
echo "</ol>";
?>      </table>
    </div>
</div>