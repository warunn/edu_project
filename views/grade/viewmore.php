<div id="main_area">
    <div class="post">
        <?php $result = $this->array; ?>

        <table class="table table-sm">
            <thead>
            <tr>
                <th scope="col">Batch NO</th>
                <th scope="col">Student Name</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($result as $key => $value) {
                ?>
                <tr>
                    <td><?php echo $value[3] ?></td>
                    <td><?php echo $value[1] ?> </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>


    </div>
</div>
