<script type="text/javascript">
 <?php
 $this->final=Session::get("artedit");
		 if(isset($this->final)): ?>
 alert("Article Edited Successfully");
 <?php
 Session::delete("artedit");
 endif;?>
</script>
<div id="main_area">
    <div class="post">
        <table>
        
<?php
$a=1;
echo "<ol>";
$ans=$this->msg1->fetch();
		while ($ans){
			echo "<tr><td><form action='".URL."article/read/null/true' method='post'>";
                        echo "<input type='hidden' name='post_id' value='".$ans["post_id"]."'/>";
                        echo "<div style='float:left;'><h3><li>".$ans["topic"]." </li></h3></div> &nbsp; &nbsp;</td><td> ";
                        echo "<input type='submit' id='sub' value='Edit Article'>";
                        echo "</form></td></tr>";
                        $ans=$this->msg1->fetch();
		$a=$a+1;
		}
echo "</ol>";
?>      </table>
    </div>
</div>