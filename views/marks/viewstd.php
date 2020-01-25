<div id="main_area">
    <div class="post">
        <style>
            table {
                border-collapse: collapse;
            }

            table, th, td {
                border: 1px solid black;
            }
        </style>
        <?php $result = $this->array;
            if(empty($result))
            {
                echo "No Data Found !!!!!!!!";
            }
            else {
                echo '<table class="table table-sm">
            <thead>
            <tr>
                <th style="padding: 10px">Student ID</th>
                <th style="padding: 10px">Student Name</th>
                 <th style="padding: 10px">Grade</th>
                  <th style="padding: 10px">Class</th>
                  <th style="padding: 10px">Teacher ID</th>
            </tr>
            </thead>
            <tbody>';
                foreach ($result as $key => $value) {
                    ?>
                    <tr>
                        <td style="padding: 10px"><?php echo $value[0] ?></td>
                        <td style="padding: 10px"><?php echo $value[2] ?> </td>
                        <td style="padding: 10px"><?php echo HeadergetGradeFromYear($value[3]) ?></td>
                        <td style="padding: 10px"><?php echo $Student_classes[$value[4]] ?></td>
                        <td style="padding: 10px"><?php echo $value[5] ?></td>
                        <td style="padding: 10px">
                            <form action="<?php echo URL; ?>location/getDataAccordingToLocation?location=<?php echo $value[1] ?>&count=<?php echo $value[0] ?>"
                                  method="post" enctype="multipart/form-data">
                                <input type="submit" class="btn btn-info" value="info" name="<?php echo $value[1] ?>"/>
                            </form>
                        </td>
                    </tr>
                <?php }

            }?>
        </tbody>
        </table>

    </div>
</div>

