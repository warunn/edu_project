
    <h1>parent form</h1>
    <?php// print_r($this);?>
    <div>
    <form action="<?php echo URL;?>reg/parentrun" method="post">
    <?php echo '<input type="hidden" name="addno" value="'.$this->addno.'">'; ?>

	<table>
  <?php echo "<tr><td width=\"108\" height=\"24\">Father Name</td><td colspan=\"2\"><label>";
      echo "<input name=\"fname\" type=\"text\" id=\"fnameint\" size=\"40\" maxlength=\"32\">
      </label></td>
    </tr>";
    echo "<tr>
      <td height=\"24\">Father's Occupation</td>
      <td colspan=\"2\"><label>";
    echo $this->occupation; 
	echo "</label></td>
    </tr>";
    echo "
    <tr>
      <td height=\"19\">Nic</td>
      <td colspan=\"2\"><label>
        <input type=\"text\" name=\"fnic\" id=\"fnic\">
      </label></td>
    </tr>
    <tr>
      <td height=\"19\">Father's Office Tel.No</td>
      <td colspan=\"2\"><label>
        <input type=\"text\" name=\"foff\" id=\"foff\">
      </label></td>
    </tr>
    <tr>
      <td height=\"19\">&nbsp;</td>
      <td colspan=\"2\"><label>Mother 
        <input type=\"radio\" name=\"mg\" id=\"mg\" value=\"1\">
      Gardian
      <input type=\"radio\" name=\"mg\" id=\"mg2\" value=\"0\">
      </label></td>
    </tr>
    ";
    echo"<tr>
      <td height=\"19\">Name</td>
      <td colspan=\"2\"><label>
        <input name=\"mname\" type=\"text\" id=\"mname\" size=\"40\" maxlength=\"32\">
      </label></td>
    </tr>
    <tr>
      <td height=\"19\">Mother's Occupation</td>
      <td colspan=\"2\">
        <div>";
    echo $this->moccupation;	
	echo"</div>  
      </td>
    </tr>";
    echo "<tr>
      <td height=\"19\">Nic</td>
      <td colspan=\"2\"><label>
        <input name=\"mnic\" type=\"text\" id=\"mnic\" maxlength=\"10\">
      </label></td>
    </tr>";
    echo "<tr>
      <td height=\"19\">Office No</td>
      <td colspan=\"2\"><label>
        <input type=\"text\" name=\"moff\" id=\"moff\">
      </label></td>
    </tr>";
    echo "<tr>
      <td height=\"19\">Emergency Tel</td>
      <td colspan=\"2\"><label>
        <input name=\"emg1\" type=\"text\" id=\"emg1\" maxlength=\"10\">
      </label></td>
    </tr>";
	
	echo "<tr><td>&nbsp;</td><td><input type=\"submit\" name=\"submit\" id=\"submit\" value=\"Submit\">
        <input type=\"reset\" name=\"reset\" id=\"reset\" value=\"reset\"></td></tr>  ";
	?>
 </table> 
</form>			

</div>
    