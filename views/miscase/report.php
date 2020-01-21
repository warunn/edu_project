<script type="text/javascript">
	function printContent(el) {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>
<div id="main_area">
<div class="post">
<?php if (isset($this->error)):?>
<h1><?php echo $this->error;?></h1>
<br><br><br><br><br><br><br><br><br><br>
<?php else:?>
<div class="container" id="examples">
<?php //print_r($this);?>
	
    <h1>Misbehavior Report</h1>
    <table class="table table-dark">
<tr>
<td width="100px">Case Id </td><td><?php echo $this->misid; ?></td>
</tr>
<tr>
<td>Case Title </td><td><?php echo $this->title; ?></td>
</tr>
<tr>
<td>Case Date </td><td><?php echo $this->date; ?></td>
</tr>
<tr>
<td>Case Details </td><td><?php echo $this->details; ?></td>
</tr>
<tr>
<td>Location </td><td><?php echo $this->location; ?></td>
</tr>
<tr>
<td>Case Type </td><td><?php echo $this->type; ?></td>
</tr>
<tr><td colspan="2">Media Evidance</td> </tr>
<?php 
$count=1;
while ($count<=5){
    if(isset($this->{"media".$count})){
        echo '<tr><td align="top">Media'.$count.'</td>';
        if($this->{"type".$count}=="jpg" or $this->{"type".$count}=="JPG" or $this->{"type".$count}=="png" or $this->{"type".$count}=="gif"){
            
            echo '<td><a href="'.URL.$this->{"link".$count}.'"><img src="'.URL.$this->{"link".$count}.'" width="200px"></a></td>';
        }
        elseif ($this->{"type".$count}=="mp4" or $this->{"type".$count}=="mp3"  or $this->{"type".$count}=="wmv"  or $this->{"type".$count}=="mpeg"  or $this->{"type".$count}=="avi"){
            
            //echo '<td><embed src="'.URL.$this->{"link".$count}.'" width="200px" autostart="true" type="audio/mpeg"></td>';
            echo '<td><video width="320" height="240" controls>
            <source src="'.URL.$this->{"link".$count}.'" type="video/mp4">
            </video></td>';
        }
       echo '</tr>';
    }
    $count=$count+1;
}
?>
<tr><td colspan="2">Participated Students</td> </tr>
<?php 
$count=1;
while ($count<10){
    if(isset($this->{"adno".$count})){
        echo '<tr><td><a href="'.URL.'search/addnorun/'.$this->{"adno".$count}.'">'.$this->{"adno".$count}.'</a></td>';
        echo '<td><a href="'.URL.'search/addnorun/'.$this->{"adno".$count}.'">'.$this->{"stname".$count}.'</a></td>';
       
       echo '</tr>';
    }
    $count=$count+1;
}
?>

</table>
</div>
<?php endif;?>
<a href="#" class="btn btn-warning" id="print" onclick="printContent('examples')"><div id='cbutton' width='150' style='text-align:center;font-family:impact;max-width:200px;height:100;clear:both;border:3px;border-radius:3px;color:#ffffff;background-color:#000000;font-size: 17px'>Print Record</div></a>

</div>
</div>