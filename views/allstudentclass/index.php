<div id="main_area">
    <div class="post">
        <?php $result = $this->array?>
        <table>
            <tr>
                <td>
                    <h3 style="margin-bottom: 10px">Add Students to Classes</h3>
                    <form action="<?php echo URL; ?>allstudentclass/setClasses" method="post"
                          enctype="multipart/form-data" >
                        Class Count:<br>
                        <input type="text" name="count" required>
                        <br>
                        Grade: <br>
                        <select id="exampleFormControlSelect1" name="batch" required>
                            <option value="" selected disabled> Select a Batch</option>
                            <option value="<?php echo(date('Y') - 0) ?>">Grade 6</option>
                            <option value="<?php echo(date('Y') - 1) ?>">Grade 7</option>
                            <option value="<?php echo(date('Y') - 2) ?>">Grade 8</option>
                            <option value="<?php echo(date('Y') - 3) ?>">Grade 9</option>
                            <option value="<?php echo(date('Y') - 4) ?>">Grade 10</option>
                            <option value="<?php echo(date('Y') - 5) ?>">Grade 11</option>
                            <option value="<?php echo(date('Y') - 6) ?>">Grade 12</option>
                            <option value="<?php echo(date('Y') - 7) ?>">Grade 13</option>
                        </select>
                        <br>
                        <br>

                        <input type="submit" name="submit" value="Submit">

                    </form>
                </td>
                <td style="padding-left:150px">
                    <h3 style="margin-bottom: 10px">View Students Classes</h3>
                    <form action="<?php echo URL; ?>allstudentclass/getClassStudent" method="post"
                          enctype="multipart/form-data">
                        Select a Class:<br>
                        <select id="exampleFormControlSelect1" name="class" required>
                            <option value="" selected disabled> Select a Class</option>
                            <?php for($i=0; $i < count($Student_classes); $i++)
                            {  ?>

                                <option value="<?php echo $i ?>"><?php echo $Student_classes[$i]?></option>

                           <?php } ?>
                        </select>
                        <br>
                        Grade: <br>
                        <select id="exampleFormControlSelect1" name="batch" required>
                            <option value="" selected disabled> Select a Batch</option>
                            <option value="<?php echo(date('Y') - 0) ?>">Grade 6</option>
                            <option value="<?php echo(date('Y') - 1) ?>">Grade 7</option>
                            <option value="<?php echo(date('Y') - 2) ?>">Grade 8</option>
                            <option value="<?php echo(date('Y') - 3) ?>">Grade 9</option>
                            <option value="<?php echo(date('Y') - 4) ?>">Grade 10</option>
                            <option value="<?php echo(date('Y') - 5) ?>">Grade 11</option>
                            <option value="<?php echo(date('Y') - 6) ?>">Grade 12</option>
                            <option value="<?php echo(date('Y') - 7) ?>">Grade 13</option>
                        </select>
                        <br>
                        <br>

                        <input type="submit" name="submit-search" value="Submit">

                    </form>
                </td>
            </tr>

        </table>


        <table style="margin-top: 30px">
            <tr>

                <td>
                    <h3 style="margin-bottom: 10px">Add Teachers to Classes</h3>
                    <form action="<?php echo URL; ?>allstudentclass/setTeachers" method="post"
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
                        Select a Class:<br>
                        <select id="exampleFormControlSelect1" name="class" required>
                            <option value="" selected disabled> Select a Class</option>
                            <?php for($i=0; $i < count($Student_classes); $i++)
                            {  ?>

                                <option value="<?php echo $i ?>"><?php echo $Student_classes[$i]?></option>

                            <?php } ?>
                        </select>
                        <br>
                        Grade: <br>
                        <select id="exampleFormControlSelect1" name="batch" required>
                            <option value="" selected disabled> Select a Batch</option>
                            <option value="<?php echo(date('Y') - 0) ?>">Grade 6</option>
                            <option value="<?php echo(date('Y') - 1) ?>">Grade 7</option>
                            <option value="<?php echo(date('Y') - 2) ?>">Grade 8</option>
                            <option value="<?php echo(date('Y') - 3) ?>">Grade 9</option>
                            <option value="<?php echo(date('Y') - 4) ?>">Grade 10</option>
                            <option value="<?php echo(date('Y') - 5) ?>">Grade 11</option>
                            <option value="<?php echo(date('Y') - 6) ?>">Grade 12</option>
                            <option value="<?php echo(date('Y') - 7) ?>">Grade 13</option>
                        </select>
                        <br>
                        <br>

                        <input type="submit" name="submit-teacher" value="Submit">

                        <button type="button" class="btn btn-warning" onclick="goBack()">Go Back</button>

                    </form>
                </td>
                <td style="padding: 100px">

                    <?php
                    if ($this->msg) {
                        echo 'Added Successfully !';
                    }
                    ?>
                </td>

            </tr>



        </table>

            <br>
            <br>
            <br>


<script type="text/javascript">
    function goBack() {
        window.history.back();
    }
</script>

    </div>
</div>

