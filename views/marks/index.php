<div id="main_area">
    <div class="post">
        <?php $result = $this->array ?>
        <table style="margin-top: 30px">
            <tr>

                <td>
                    <h3 style="margin-bottom: 10px">Select a Teacher To Add Marks</h3>
                    <form action="<?php echo URL; ?>marks/getStudentsFromClassTable" method="post"
                          enctype="multipart/form-data">
                        Select a Teacher:<br>
                        <select id="exampleFormControlSelect1" name="teacher" required>
                            <option value="" selected disabled> Select a Class</option>
                            <?php
                            foreach ($result as $key => $value) { ?>

                                <option value="<?php echo $value[0] ?>"><?php echo $value[1]?></option>

                            <?php } ?>
                        </select>
                        <br>
                        <br>
                        <input type="submit" name="submit-teacher" value="Submit">
                        <button type="button" class="btn btn-warning" onclick="goBack()">Go Back</button>
                    </form>
                </td>
                <td style="padding: 100px">
                    <?php if(!empty($this->msg)){
                        echo $this->msg;
                    }?>
                </td>
            </tr>
        </table>
        <?php $result2 = $this->array2;
            if(empty($result2))

        ?>
    </div>
</div>
