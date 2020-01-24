<div id="main_area">
    <div class="post">
        <?php $result = $this->array; ?>

        <table class="table table-sm">
            <thead>
            <tr>
                <th scope="col">Location</th>
                <th scope="col">Count</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($result as $key => $value) {
                ?>
                <tr>
                    <td><?php echo ($value[1]=="")?"No Location Given":$value[1] ?></td>
                    <td><?php echo $value[0] ?> </td>
                    <td>
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
