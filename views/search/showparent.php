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

<div class="container" id="examples">

   
<?php
//print_r($this->result);
    echo "<h1>Show Parent</h1>";
    echo "<h3>Parent id : {$this->pid}</h3>";
    echo ' <table class="table table-dark">';
   // echo "<div>";
    echo "<tr><td width=\"180\" height=\"24\">Father Name</td><td colspan=\"2\"><label>";
    echo $this->result["fnm"]."</label></td></tr>";
    echo "<tr><td height=\"24\">Father's Occupation</td><td colspan=\"2\"><label>";
    echo $this->focc;
    echo "</label></td></tr>";
    echo "<tr>
      <td height=\"19\">Nic</td>
      <td colspan=\"2\"><label>".$this->result["fnic"]."</label></td>
    </tr>
    <tr>
      <td height=\"19\">Father's Office Tel.No</td>
      <td colspan=\"2\"><label>{$this->result["fnic"]}
      </label></td>
    </tr>";
    
    if($this->result["morg"]==1){$name="Mother";}
    elseif($this->result["morg"]==0){$name="Gardian";}
    echo"<tr>
      <td height=\"19\">{$name}'s Name</td>
      <td colspan=\"2\"><label>{$this->result["mnm"]}</label></td></tr>
    <tr>
      <td height=\"19\">{$name}'s Occupation</td>
      <td colspan=\"2\"> <div>";
    echo $this->mocc;
    echo"</div>
      </td>
    </tr>";
    echo "<tr>
      <td height=\"19\">{$name}'s Nic</td>
      <td colspan=\"2\"><label>{$this->result["mnic"]}</label></td></tr>";
    echo "<tr><td height=\"19\">Emergency Tel</td><td colspan=\"2\"><label>{$this->result["emg1"]}</label></td></tr></table>";

?>
</div>
</div>
<a href="#"  class="btn btn-warning" id="print" onclick="printContent('examples')"><div id='cbutton' style="float:left;text-align:center;font-family:impact;width:200px;height:100;border:3px;clear:both;border-radius:3px;color:#ffffff;background-color:#000000;font-size: 17px">Print Report</div></a>

</div>
