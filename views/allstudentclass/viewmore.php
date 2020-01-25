<div id="main_area">
    <div class="post">
        <?php $result = $this->array;

            if (empty($result))
            {
                echo 'No Data Founded!!!!<br>  
                Invalid Class or Batch';
                echo '<br> ------Try Again-----';
            }
        ?>
        <style>
            table {
                border-collapse: collapse;
            }

            table, th, td {
                border: 1px solid black;
            }
        </style>
        <table style="margin: 30px">
            <thead>
            <tr>
                <th style="padding: 10px">Batch</th>
                <th style="padding: 10px">Grade</th>
                <th style="padding: 10px">Class</th>
                <th style="padding: 10px">Created Year</th>
                <th style="padding: 10px">Student Name</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($result as $key => $value) {
                ?>
                <tr>
                    <td style="padding: 10px"><?php echo $value[0]?></td>
                    <td style="padding: 10px"><?php echo HeadergetGradeFromYear($value[0]) ?> </td>
                    <td style="padding: 10px"><?php echo $Student_classes[$value[1]] ?> </td>
                    <td style="padding: 10px"><?php echo $value[2] ?> </td>
                    <td style="padding: 10px"><?php echo $value[3] ?> </td>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>




    </div>
</div>
