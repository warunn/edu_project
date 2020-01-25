
 <div id="main_area">
    <div class="post"> 
    <h1 align="center">Students Marks</h1>

    <?php

    	foreach ($this->classList as $key => $value) { ?>
    		
    		<button style="padding: 15px 32px;" onclick="subjectMark(<?php echo $value['class_id']; ?>)"><?php echo $value['name']; ?> | <?php echo $value['year']; ?> | <?php echo $value['medium']; ?></button> 

    	<?php }

    ?>

    <div id="student_subject">
    	<table id="content">
    		
    	</table>
    </div>

<table>


<!-- <tr>
<td>&nbsp;</td><td><input type="submit" value="create"></td>
</tr> -->
</table>


<script type="text/javascript">
	function subjectMark($class_id){

		var class_id = $class_id;
		
		var url = '<?php echo URL; ?>studentmarks/getstudents';



		$.ajax({
                 type: "POST",
                 url : url,
                 data: "class_id="+class_id,
                 success: function(res)
                 {
                 	var obj = jQuery.parseJSON(res);
                  	console.log(obj);
                  	$('#content').html(obj.table);

                 }

               });
	}

</script>


</div>

</div>