<?php //new edit ?>
<div id="main_area">
    <div class="post">
        <table border="0">
        <tr><td colspan="3" bgcolor="yellow"><img src="<?php echo URL; ?>pic/warning.gif" width="100px"/>  Please Note Once you Click the Delete button There will not be any going back</td></tr>
                
<?php
echo "<ol>";
$ans=$this->msgme->fetch();
		while ($ans){
			echo "<tr><td><form action='".URL."article/runcomment' method='post'>";
                        echo "<img src='".URL."pic/fb/".$ans["writer"].".jpg' width='80' ></td><td>";
                        echo "<input type='hidden' name='cid' value='".$ans["cid"]."'/>";
                        echo "<div style='float:left;'><h3><li>".$ans["comment"]." </li></h3></div> &nbsp; &nbsp;</td><td> ";
                        echo "<input type='submit' name='submit' value='accept'>";
                        echo "<input type='submit' name='submit' value='delete'>";
                        echo "</form></td></tr>";
                        $ans=$this->msgme->fetch();
		}
echo "</ol>";

?>
        </table>
    </div>
</div>
