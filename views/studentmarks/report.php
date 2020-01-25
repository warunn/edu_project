<?php 
$stu_id = $_GET['stuid'];
$class_id = $_GET['claas_id'];


?>

<div id="main_area">
    <div class="post"> 
    <h1 align="center">Students Marks </h1>

    <table >
        <tr>
            <td>Addmission No - </td>
            <td><?php echo $stu_id; ?></td>
        </tr>
        <tr>
            <td>Student Name - </td>
            <td><?php echo $this->student_details[0]['nameint'];; ?></td>
        </tr>   
    </table>

    <h3 align="">Term 01 </h3>
    <table style=" border: 1px solid black;">
        <tr>
            <td>Total Mark - </td>
            <td><?php echo $this->total1[0]['total']; ?></td>
        </tr>
        <tr>
            <td>Avarage Mark - </td>
            <td><?php echo $this->avg1[0]['avg']; ?></td>
        </tr>

    </table>
    <h3 align="">Term 02 </h3>
    <table style=" border: 1px solid black;">
        <tr>
            <td>Total Mark - </td>
            <td><?php echo $this->total2[0]['total']; ?></td>
        </tr>
        <tr>
            <td>Avarage Mark - </td>
            <td><?php echo $this->avg2[0]['avg']; ?></td>
        </tr>
          
    </table>
    <h3 align="">Term 03 </h3>
    <table style=" border: 1px solid black;">
        <tr>
            <td>Total Mark - </td>
            <td><?php echo $this->total3[0]['total']; ?></td>
        </tr>
        <tr>
            <td>Avarage Mark - </td>
            <td><?php echo $this->avg3[0]['avg']; ?></td>
        </tr>
          
    </table>

    <?php
    $avg1=0;
    $avg2=0;
    $avg3 =0;

    if ($this->avg1[0]['avg'] != NULL) {
        $avg1 = $this->avg1[0]['avg'];
    }
    if ($this->avg2[0]['avg'] != NULL) {
        $avg2 = $this->avg2[0]['avg'];
    }
    if ($this->avg3[0]['avg'] != NULL) {
        $avg3 = $this->avg3[0]['avg'];
    }
 
$dataPoints = array( 
    array("y" => $avg1, "label" => "Term 01" ),
    array("y" => $avg2, "label" => "Term 02" ),
    array("y" => $avg3, "label" => "Term 03" ),
    
);
 
?>

<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    theme: "light2",
    title:{
        text: "Student Growth"
    },
    axisY: {
        title: "Student Marks"
    },
    data: [{
        type: "column",
        yValueFormatString: "#,##0.## tonnes",
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    }]
});
chart.render();
 
}
</script>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</div>

</div>