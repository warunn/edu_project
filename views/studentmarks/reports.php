<div id="main_area">
    <div class="post">
       <?php $result=$this->array; ?>

        <style>
            table {
                border-collapse: collapse;
            }

            table, th, td {
                border: 1px solid black;
            }
        </style>
        <table class="table table-sm">
            <thead>
            <tr>
                <th style="padding: 10px">STD_ID</th>
                <th style="padding: 10px">Subject</th>
                <th style="padding: 10px">Marks</th>
                <th style="padding: 10px">Term</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($result as $key => $value) {
                ?>
                <tr>
                    <td style="padding: 10px"><?php echo $value[0]?></td>
                    <?php  $subset=explode(',', $value[1]);
                        $markset=explode(',', $value[3]);


                    ?>
                    <td style="padding: 10px"><?php
                        for ($i=0;$i<sizeof($subset);$i++)
                        {
                            echo $subset[$i].'<br>';
                        }
                       ?> </td>
                    <td style="padding: 10px"><?php
                        for ($i=0;$i<sizeof($markset);$i++)
                        {
                            echo $markset[$i].'<br>';
                        }
                        ?> </td>
                    <td style="padding: 10px"><?php echo "Term ".$value[2] ?> </td>

                </tr>
            <?php } ?>
            </tbody>
        </table>







    </div>
</div>
