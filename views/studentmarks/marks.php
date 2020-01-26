<?php
$stu_id = $_GET['stuid'];
$std_batch = $_GET['batch'];
$std_class = $_GET['class'];


?>

<div id="main_area">
    <div class="post">
        <h1 align="center">Students Marks </h1>
        <br>
        <tr>
            <td>Student Name -</td>
            <td><?php echo $std_batch ?></td>
        </tr>
        <br>
        <br>

        <form action="<?php echo URL; ?>studentmarks/postMarksTODB" method="post">
            Addmission No:<?php echo $stu_id; ?><br>
            <input type="text" name="std_id" value="<?php echo $stu_id; ?>" hidden>
            <br>
            Batch:<?php echo $std_batch; ?><br>
            <input type="text" name="batch" value="<?php echo $std_batch; ?>" hidden>
            <br>
            <input type="text" name="class" value="<?php echo $std_class; ?>" hidden>

            Term<br>
            <select name="term" name="term">
                <option value="1">Term 01</option>
                <option value="2">Term 02</option>
                <option value="3">Term 03</option>
            </select>
            <br>
            <br>

            Mathematics<br>
            <input type="text" name="Mathematics" required>
            <br>
            Science<br>
            <input type="text" name="Science" required>
            <br>
            English<br>
            <input type="text" name="English" required>
            <br>
            Sinhala<br>
            <input type="text" name="Sinhala" required>
            <br>
            Buddhism<br>
            <input type="text" name="Buddhism" required>
            <br>
            History<br>
            <input type="text" name="History" required>
            <br>
            <br>
            Section 01<br>
            <select name="section01" required>
                <option value="Entrepreneurship_EDU">Entrepreneurship EDU</option>
                <option value="commerce">Commerce</option>
                <option value="geography">Geography</option>
            </select>
            <input type="text" name="section01-sub" required>
            <br>

            Section 02<br>
            <select name="section02" required>
                <option value="music">Music</option>
                <option value="dancing">artancing</option>
                <option value="ART">ART</option>
            </select>
            <input type="text" name="section02-sub" required>
            <br>
            Section 03<br>

            <select name="section03" required>
                <option value="ICT">ICT</option>
                <option value="health">health and physical education</option>
            </select>
            <input type="text" name="section03-sub" required>
            <br>
            <br>
            <input type="submit" name="marks" required>
        </form>

    </div>
</div>