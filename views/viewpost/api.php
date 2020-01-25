<?php
//$result = $this->array);
print_r(md5("82e0b633e74221d0d7d986f272036b55"));




//$this->view->render("viewpost/index");
//echo 'akalanka Nayanajith';
//echo  $this->msg;
?>
<canvas id="myChart" width="400" height="400"></canvas>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');


    $.ajax({
        url: "http://localhost/edu_project/viewpost/api",
        type: "GET",
        success: function (data) {
            console.log(data);


            var post_data = {
                count: [],
                TeamB: []
            };

        },
        error: function (data) {
            console.log('error');
        }
    });


    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'My First dataset',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [0, 10, 5, 2, 20, 30, 45]
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

