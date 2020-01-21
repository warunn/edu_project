<div id="main_area">
    <div class="post">
<?php
//print_r($this);
$ab=1;
$addno=$this->addno;
echo "<h2>Select Parent From Following Buttons </h2>";

while($ab<=5){
    if(!empty($this->{"pid".$ab})){
        $pid=$this->{"pid".$ab};
        echo '<div sytle="width:190px;float:left"><a href="#" onclick="return false" onmousedown="javascript:myfun('.$addno.','.$pid.')" ><div id="cbutton" style="margin:10px;font-family:impact;border:3px;border-radius:3px;color:#ffffff;background-color:#000000;font-size: 15px;text-align:center">parent '.$ab.'</div></a></div>'; 
    }
    $ab=$ab+1;
}


?>

<iframe id="content" src="about:blank" width="740px" height="1200px"></iframe>
<script type="text/javascript">
    	function myfun(a,p){
    $("#content").attr("src","http://localhost/edu_project/reg/pedit/"+a+"/"+p);
    	}
</script>
</div>
</div>