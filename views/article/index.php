 <script type="text/javascript">
 <?php
		 if(isset($this->msg1)): ?>
 alert("Article Created Successfully");
 <?php 
 unset($this->msg1);
 endif;?>
</script>
<style>
body{width:610;}
#frmFile {border-top:#F0F0F0 2px solid;background:#FAF8F8;padding:10px;}
.demoInputBox1<?php
$a=2;
while($a<=10){
	echo ",.demoInputBox{$a}";
	$a=$a+1;
}
?>{padding:10px; border:#F0F0F0 1px solid; border-radius:4px;background-color:#FFF;}
#file_error1
<?php
$a=2;
while($a<=10){
	echo ",#file_error{$a}";
	$a=$a+1;
}
?>
{color: #FF0000;}
#btnSubmit{background-color:#2FC332;border:0;padding:10px 40px; margin:15px 0px; color:#FFF;border:#F0F0F0 1px solid; border-radius:4px;}
</style>
<script src="jquery.js"></script>
<script>
$(document).ready(function(){
    $("#frmFile").submit(function(submitEvent){
        var a=1;
        while (a<=10){
        var filename=$("#file"+a).val();
        if (filename.length>0){
        
        var file_size = $('#file'+a)[0].files[0].size;
	if(file_size>2097152) {
		$("#file_error"+a).css("color","#FF0000");
		$("#file_error"+a).html("File size is greater than 2MB");
		$(".demoInputBox"+a).css("border-color","#FF0000");
		return false;
	}
	else{
	var extension=filename.replace(/^.*\./,'');
        switch (extension){
            case 'jpg':
            case 'JPG':
            case 'jpeg':
            case 'JPEG':
            case 'png':
            case 'PNG':
            case 'gif':
            case 'GIF':
		$("#file_error"+a).css("color","#00FF00");
	$("#file_error"+a).html("File is ready to upload");
            $(".demoInputBox"+a).css("border-color","#00FF00");
                break;
            default:
            submitEvent.preventDefault();
            $("#file_error"+a).css("color","#FF0000");
            $("#file_error"+a).html("File type is not valid select jpg,png or gif");
            $(".demoInputBox"+a).css("border-color","#FF0000");
        }
	}
        }
    a++;
    }return true;
    });
    });

</script>

	<h1> Article Builder</h1>
	<form name="frmFile" id="frmFile" method="post" action="<?php echo URL;?>article/run" method="post"  onSubmit="return validate();" enctype="multipart/form-data">

		<table>
			<tr>
				<td>
		
Topic <input type="text" name="topic" maxlength="90" size="80" required> <br/>
Paragraph <br/><textarea name="paragraph1"  cols="90" rows="10" required></textarea><br>

<div>Upload Photo <input type="file" name="file1" id="file1" class="demoInputBox1" required /> <span id="file_error1"></span></div>
<div>Upload Photo <input type="file" name="file2" id="file2" class="demoInputBox2" required /> <span id="file_error2"></span></div>
<div>Upload Photo <input type="file" name="file3" id="file3" class="demoInputBox3" required /> <span id="file_error3"></span></div>


Paragraph <br/><textarea name="paragraph2" cols="90" rows="10"></textarea><br>
<div>Upload Photo <input type="file" name="file4" id="file4" class="demoInputBox4" /> <span id="file_error4"></span></div>
<div>Upload Photo <input type="file" name="file5" id="file5" class="demoInputBox5" /> <span id="file_error5"></span></div>
<div>Upload Photo <input type="file" name="file6" id="file6" class="demoInputBox6" /> <span id="file_error6"></span></div>
<div>Upload Photo <input type="file" name="file7" id="file7" class="demoInputBox7" /> <span id="file_error7"></span></div>
<div>Upload Photo <input type="file" name="file8" id="file8" class="demoInputBox8" /> <span id="file_error8"></span></div>
<div>Upload Photo <input type="file" name="file9" id="file9" class="demoInputBox9" /> <span id="file_error9"></span></div>
<div>Upload Photo <input type="file" name="file10" id="file10" class="demoInputBox9" /> <span id="file_error10"></span></div>
<br/>
Youtube Video links <br/><textarea name="paragraph3"  cols="90" rows="10"></textarea><br>

<input type="submit" id="btnSubmit" value="Upload">
	</form>
				</td>
			</tr>
		</table>
		
<?php

?>

</body>
</html>
