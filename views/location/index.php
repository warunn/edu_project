<div id="main_area">
    <div class="post">
        <?php $result = $this->array; ?>
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
                <th style="padding: 10px">Location</th>
                <th style="padding: 10px">Count</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($result as $key => $value) {
                ?>
                <tr>
                    <td style="padding: 10px"><?php echo ($value[1]=="")?"No Location Given":$value[1] ?></td>
                    <td style="padding: 10px"><?php echo $value[0] ?> </td>
                    <td style="padding: 10px">
                        <form action="<?php echo URL;?>location/getDataAccordingToLocation?location=<?php echo  $value[1] ?>&count=<?php echo  $value[0] ?>" method="post"  enctype="multipart/form-data">
                            <input type="submit" class="btn btn-info" value="info" name="<?php echo  $value[1] ?>"/>
                        </form>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>


    </div>
</div>
