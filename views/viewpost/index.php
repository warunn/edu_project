<div id="main_area">
    <div class="post">
        <?php $result = $this->array; ?>
        <form method="post" action="<?php echo URL;?>viewpost/api">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Example select</label>
                <select class="form-control" id="exampleFormControlSelect1" name="key">
                    <option value="0" disabled selected>Select a Post</option>
                    <?php foreach ($result as $key => $value) {
                        ?>
                        <option value="<?php echo $value[0];?>"><?php echo $value[1]?></option>
                    <?php } ?>
                </select>
            </div>
            <input type="submit" class="btn btn-success" value="Submit" name="submit"/>
            <button type="button" class="btn btn-warning" onclick="goBack()">Go Back</button>
        </form>


        <?php $php_var = $this->api ;
        $day[]= array();
        $hits[] = array();
        $topic = "";
        $i = 0;
        foreach ($php_var as $key => $value)
        {
            $hits[$i] = $value[0];
            $day[$i] = $value[1];
            $topic = $value[2];
            $i++;
        }

        ?>

        <canvas id="myChart" width="400" height="400"></canvas>



        <script type="text/javascript">

            function goBack() {
                window.history.back();
            }

            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($day)?>,
                    datasets: [{
                        label: '<?php echo json_encode($topic)?>',
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: <?php echo json_encode($hits)?>
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>


    </div>
</div>
