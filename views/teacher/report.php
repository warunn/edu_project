<div id="main_area">
<div class="post">
<h1>Teacher Report</h1>
<table>
<tr>

</tr>
<tr>
<td>Teacher id</td><td><?php echo $this->tid;?></td><td rowspan="9" align="center"><img src="<?php echo URL.$this->pic; ?>" width="100px"></td>
</tr>
<tr>
<td>Name</td><td><?php echo $this->name;?></td>
</tr>
<tr>
<td>Teacher Nic</td><td><?php echo $this->nic;?></td>
</tr>
<tr>
<td>Address</td><td><?php echo $this->address;?></td>
</tr>
<tr>
<td>Gender</td><td><?php if($this->gender==0){echo "Female";}else {echo "Male";};?></td>
</tr>
<tr>
<td>Mobile No</td><td><?php echo $this->mobile_tel;?></td>
</tr>
<tr>
<td>Landline Tel No</td><td><?php echo $this->land_tel;?></td>
</tr>
<tr>
<td>Training</td><td><?php echo $this->training;?></td>
</tr>
<tr>
<td>Appointment date</td><td><?php echo $this->app_date;?></td>
</tr>
<tr>
<td>Appointment subject</td><td><?php echo $this->app_sub;?></td>
</tr>
<tr>
<td>School Start date</td><td><?php echo $this->sch_date;?></td>
</tr>
</table>
<br/><br/><br/>
</div>
</div>