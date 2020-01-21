
<div id="main_area">
<div class="post">
<form action="<?php echo URL;?>miscase/run" method="post" enctype="multipart/form-data">
<table id="tbl" class="table table-hover">
<tr><td>Title</td><td colspan="2"><input name="title" type="text" size="60"></td></tr>
    <tr><td>Date</td><td colspan="2"><input name="Date" type="text" size="60"></td></tr>
    <tr><td>Details</td><td colspan="2"><textarea name="details" cols="60" rows="7"></textarea></td></tr>
    <tr><td>Location</td><td colspan="2"><input name="location" type="text" size="60"></td></tr>
    <tr><td>Misbehavior Type</td><td colspan="2"><select name="type"><option value="3">High</option><option value="2">Medium</option><option value="1">Low</option></select></td></tr>
    <tr><th colspan="3">Media Evidance</th></tr>
    <tr><td>Media Evidence 1</td><td colspan="2"><input type="file" name="media1"></td></tr>
    <tr><td>Media Evidence 2</td><td colspan="2"><input type="file" name="media2"></td></tr>
    <tr><td>Media Evidence 3</td><td colspan="2"><input type="file" name="media3"></td></tr>
    <tr><td>Media Evidence 4</td><td colspan="2"><input type="file" name="media4"></td></tr>
    <tr><td>Media Evidence 5</td><td colspan="2"><input type="file" name="media5"></td></tr>
    <tr><th colspan="3">Participated Students</th></tr>
    <tr><td>Student</td><td>Admission Number</td><td>Details</td></tr>
    <tr><td>Student 1</td><td><input type="text" name="addno1"></td><td><input name="detail1" type="text" size="60"></td></tr>
    <tr><td>Student 2</td><td><input type="text" name="addno2"></td><td><input name="detail2" type="text" size="60"></td></tr>
    <tr><td>Student 3</td><td><input type="text" name="addno3"></td><td><input name="detail3" type="text" size="60"></td></tr>
    <tr><td>Student 4</td><td><input type="text" name="addno4"></td><td><input name="detail4" type="text" size="60"></td></tr>
    <tr><td>&nbsp;</td><td><input type="submit" value="Report Misbehavior"></td>
    </table>
</form>
    </div>
    </div>
    