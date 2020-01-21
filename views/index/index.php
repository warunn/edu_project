<?php

//require_once("includes/initial.php");
$dbCon = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
$sql="select count(*) from article";

$sth=$dbCon->prepare($sql);
        $sth->execute();
        $obj_array=$sth->fetch();
	$acount=array_shift($obj_array);
	//echo($acount);
$_SESSION["off"]=$acount-1;        
//print_r($_SESSION);

?>
<script type="text/javascript">
      var ab=<?php echo $acount-1; ?>;
	//alert(ab);
        
      $(document).ready(function(){
        loading=false;
        setTimeout(function(){loadme(ab)},1000);
        setTimeout(function(){ab--;},1000);
        setTimeout(function(){loadme(ab)},2000);
        setTimeout(function(){ab--;},2000);
        setTimeout(function(){loadme(ab)},3000);
        setTimeout(function(){ab--;},3000);
        setTimeout(function(){loadme(ab)},4000);
        setTimeout(function(){ab--;},4000);
        setTimeout(function(){loadme(ab)},4500);
        setTimeout(function(){ab--;},4500);
    $(window).scroll(function() {
	
    if (!loading &&  ($(window).scrollTop() >  $(document).height() - $(window).height()- 100)) {
	//ab--;
	//alert(ab);
        loadme(ab);
        ab--;
    };
});
 
 
 function loadme(ab){
    if(ab>=0){
    loading= true;
        $("#loading").show();
	var url="views/index/includes/loadmore1.php";
	//alert(url);
	$.post(url,{'ab':ab},function(data){
		//alert("hello");
		//alert(data);
		$(data).appendTo($('#post'));
                //alert('hello');
		//$("#post").html(data).append();
		//ab--;
                $("#loading").hide();
		loading= false;
		});
	}
	else
	{
                $("#loading").show();
		$('#loading').html('<center>No more posts to show.</center>');
                
            }
 }
        }); 
        </script>

  
  <div id="main_area">
<div id="post"></div>
 
    </div>
     

<div id="loading" style="display:none"> <center><img width="100" src="<?php echo URL; ?>pic/loading.gif"> </center></div>
