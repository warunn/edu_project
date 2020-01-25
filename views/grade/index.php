<div id="main_area">
    <div class="post">
        <?php $result = $this->array;

        $count[] = array();
        $grade[] = array();
        $topic = "";
        $i = 0;
        foreach ($result as $key => $value) {
            $count[$i] = $value[0];
            $temp = "";
            switch ($value[1]) {
                case (date('Y') - 0):
                    $temp = 'Grade 6';
                    break;
                case (date('Y') - 1):
                    $temp = 'Grade 7';
                    break;
                case (date('Y') - 2):
                    $temp = 'Grade 8';
                    break;
                case (date('Y') - 3):
                    $temp = 'Grade 9';
                    break;
                case (date('Y') - 4):
                    $temp = 'Grade 10';
                    break;
                case (date('Y') - 5):
                    $temp = 'Grade 11';
                    break;
                case (date('Y') - 6):
                    $temp = 'Grade 12';
                    break;
                case (date('Y') - 7):
                    $temp = 'Grade 13';
                    break;
                default:
                    $temp = 'NO GRADES';

            }
            $grade[$i] = $temp;
            $i++;
        };


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
                    labels: <?php echo json_encode($grade)?>,
                    datasets: [{
                        label: 'Students According to Grades',
                        backgroundColor:'rgb(255, 99, 132)',
                        borderColor: 'rgb(255, 99, 132)',
                        data: <?php echo json_encode($count)?>
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                }
            });
            document.getElementById("myChart").onclick = function (evt) {
                var activePoints = myChart.getElementsAtEventForMode(evt, 'point', myChart.options);
                var firstPoint = activePoints[0];
                var label = myChart.data.labels[firstPoint._index];
                var value = myChart.data.datasets[firstPoint._datasetIndex].data[firstPoint._index];
                window.open('<?php echo URL;?>/grade/viewmore?lable='+label);
            };
        </script>


    </div>
</div>