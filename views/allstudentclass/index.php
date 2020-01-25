<div id="main_area">
    <div class="post">

        <form action="<?php echo URL;?>allstudentclass/setClasses" method="post" enctype="multipart/form-data">
            Class Count:<br>
            <input type="text" name="count">
            <br>
            Grade: <br>
            <select id="exampleFormControlSelect1" name="batch" required>
                <option value="" selected disabled> Select a Batch</option>
                <option value="<?php echo (date('Y')-0)?>">Grade 6</option>
                <option value="<?php echo (date('Y')-1)?>">Grade 7</option>
                <option value="<?php echo (date('Y')-2)?>">Grade 8</option>
                <option value="<?php echo (date('Y')-3)?>">Grade 9</option>
                <option value="<?php echo (date('Y')-4)?>">Grade 10</option>
                <option value="<?php echo (date('Y')-5)?>">Grade 11</option>
                <option value="<?php echo (date('Y')-6)?>">Grade 12</option>
                <option value="<?php echo (date('Y')-7)?>">Grade 13</option>
            </select>
            <br>
            <br>
            <br><br>
            <input type="submit" name="submit" value="Submit">
        </form>

        <?php
            if($this->msg)
            {
                echo 'Student Added Successfully !';
            }
        ?>


    </div>
</div>

