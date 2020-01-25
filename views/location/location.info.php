<div id="main_area">
    <div class="post">
        <style>
            table {
                border-collapse: collapse;
            }

            table, th, td {
                border: 1px solid black;
            }
        </style>
        <?php $result = $this->array; ?>
        <div class="container-fluid" style="margin-top: 5px">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mapouter"><div class="gmap_canvas"><iframe width="730" height="300" id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo $_GET['location']?>&t=&z=11&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                            <a href="https://www.thevpncoupons.com"></a></div><style>.mapouter{position:relative;text-align:right;height:300px;width:730px;}.gmap_canvas {overflow:hidden;background:none!important;height:300px;width:730px;}</style>
                    </div>
                </div>

                <div class="col-sm-4" style="margin-top: 100px">

                </div>

            </div>

        </div>

        <h2 class="my-md-5">Total Count <span class="badge badge-success"><?php echo $_GET['count']?></span></h2>

        <table class="table table-sm table-bordered">
            <thead>
            <tr>
                <th style="padding: 10px">ID</th>
                <th style="padding: 10px">Full Name</th>
                <th style="padding: 10px">Address</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($result as $key => $value) {
                ?>
                <tr>
                    <td style="padding: 10px"><?php echo $value[0] ?></td>
                    <td style="padding: 10px"><?php echo $value[1] ?></td>
                    <td style="padding: 10px"><?php echo $value[2] ?></td>

                </tr>
            <?php } ?>
            </tbody>
        </table>



    </div>
</div>
