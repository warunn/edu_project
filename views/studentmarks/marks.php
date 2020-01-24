<?php 
$stu_id = $_GET['stuid'];
$class_id = $_GET['claas_id'];

?>

<div id="main_area">
    <div class="post"> 
    <h1 align="center">Students Marks </h1>

    <table>
        <tr>
            <td>Addmission No - </td>
            <td><?php echo $stu_id; ?></td>
        </tr>
        <tr>
            <td>Student Name - </td>
            <td><?php echo $this->student_details[0]['nameint'];; ?></td>
        </tr>

        <tr>
            <td>Select Term</td>
            <td>
                <select name="term" id="term">
                    <option value="1">Term 01</option>
                    <option value="2">Term 02</option>
                    <option value="3">Term 03</option>
                </select>
            </td>

         </tr>
        
    </table>

    
<table>

 <?php
    foreach ($this->subject as $key => $value) {

            echo '<tr>';
            echo '<td>';
            echo '<label> '.$value['subname'].'</label>';
            echo '</td>';

            echo '<td>';
            echo '<input type="text" name="'.$value['subid'].'" id="'.$value['subid'].'"/>';
            echo '</td>'; 

            echo '<td>';
                echo '<button onclick="addmark('.$value['subid'].')">Add</button>';
            echo '</td>';

            echo '<td>';
                echo '<span id="span'.$value['subid'].'" style="color:green"></span>';
            echo '</td>';

            echo '</tr>';



    }


  ?>

            <td>Select Subject</td><tr><td>

                    <select name="existingclassselect" id="existingclassselect">
                        <option value="0">Select</option>
                        <?php
                            foreach($this->subjectc1 as $key => $value) { ?>

                                <option value="<?php echo $value['subid'] ?>"><?php echo $value['subname'] ?> </option>
                                
                            <?php }
                        ?>

                               
                    </select>
                    </td><td><input type="text" name="c1" id="c1"/></td>
                    <td><button onclick="addmark(<?php echo $value['subid'] ?>)">Add</button></td>
                    <td><span id="span<?php echo $value['subid'] ?>" style="color:green"></span></td>
                </tr>


                <td>Select Subject</td><tr><td>

                    <select name="existingclassselect" id="existingclassselect">
                        <option value="0">Select</option>
                        <?php
                            foreach($this->subjectc2 as $key => $value) { ?>

                                <option value="<?php echo $value['subid'] ?>"><?php echo $value['subname'] ?> </option>
                                
                            <?php }
                        ?>

                               
                    </select>
                    </td><td><input type="text" name="c2" id="c2"/></td>
                    <td><button onclick="addmark(<?php echo $value['subid'] ?>)">Add</button></td>
                    <td><span id="span<?php echo $value['subid'] ?>" style="color:green"></span></td>
                </tr>

                <td>Select Subject</td><tr><td>

                    <select name="existingclassselect" id="existingclassselect">
                        <option value="0">Select</option>
                        <?php
                            foreach($this->subjectc3 as $key => $value) { ?>

                                <option value="<?php echo $value['subid'] ?>"><?php echo $value['subname'] ?> </option>
                                
                            <?php }
                        ?>

                               
                    </select>
                    </td><td><input type="text" name="c3" id="c3"/></td>
                    <td><button onclick="addmark(<?php echo $value['subid'] ?>)">Add</button></td>
                    <td><span id="span<?php echo $value['subid'] ?>" style="color:green"></span></td>
                </tr>

                

                <td>Select Subject</td><tr><td>

                    <select name="existingclassselect" id="existingclassselect">
                        <option value="0">Select</option>
                        <?php
                            foreach($this->subjectl1 as $key => $value) { ?>

                                <option value="<?php echo $value['subid'] ?>"><?php echo $value['subname'] ?> </option>
                                
                            <?php }
                        ?>

                               
                    </select>
                    </td><td><input type="text" name="l1" id="l1"/></td>
                    <td><button onclick="addmark(<?php echo $value['subid'] ?>)">Add</button></td>
                    <td><span id="span<?php echo $value['subid'] ?>" style="color:green"></span></td>
                </tr>

                <td>Select Subject</td><tr><td>

                    <select name="existingclassselect" id="existingclassselect">
                        <option value="0">Select</option>
                        <?php
                            foreach($this->subjectr1 as $key => $value) { ?>

                                <option value="<?php echo $value['subid'] ?>"><?php echo $value['subname'] ?> </option>
                                
                            <?php }
                        ?>

                               
                    </select>
                    </td><td><input type="text" name="r1" id="r1"/></td>
                    <td><button onclick="addmark(<?php echo $value['subid'] ?>)">Add</button></td>
                    <td><span id="span<?php echo $value['subid'] ?>" style="color:green"></span></td>
                </tr>


<!-- <tr>
<td>&nbsp;</td><td><input type="submit" value="create"></td>
</tr> -->
</table>





</div>

<script type="text/javascript">
    
    function addmark($sub_id) {
        var sub_id = $sub_id;
        var url = '<?php echo URL; ?>studentmarks/addmarktostudent';

        var term = document.getElementById("term").value;
        var mark = document.getElementById(sub_id).value;

        var class_id = '<?php echo $class_id; ?>';
        var stuid = '<?php echo $stu_id?>';

             $.ajax({
                 type: "POST",
                 url : url,
                 data: "stuid="+stuid+"&class_id="+class_id+"&subid="+sub_id+"&term="+term+"&mark="+mark,
                 success: function(res)
                 {
                  if($.trim(res)==200){

                    document.getElementById("span"+sub_id).innerHTML="Successfully Marked";
                    
                    // $("#admission_no"+rowid).attr("disabled", disable);
                 
                    console.log('Successfully......!!');
                    
                  }
                 }

               });
    }
</script>

</div>