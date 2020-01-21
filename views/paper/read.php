<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	
<head>
   <?php $_SESSION["cpage"]='http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
   if(isset($_SESSION["com"])){
      if($_SESSION["com"]==true){
	 unset($_SESSION["com"]);
	 echo "<script type='text/javascript'>";
	 echo "alert('PLEASE TRY TO ADD COMMENT AGAIN !!!! ')";
	 echo "</script>";
      }
   }
   ?>
   <meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Official Web Site of Central College Piliyandala</title>
<!-- ==== Extra Metadata ===== -->
	<!-- Site Name -->
	<meta property="og:site_name" content="test686.tk" />
	<!-- og Title -->
	<meta property="og:title" content="<?php echo $this->heading1["topic"];  ?>" />
	<!-- og Description -->
	<meta property="og:description" content="<?php echo $this->heading2["text"];  ?>" />
	<!-- og Url -->
	
	<meta property="og:url" content="javascript:window.location.href=window.location.href"/>
	
	<!-- Type -->
	<meta property="og:type" content="article" />
	<!-- Facebook App ID -->
	<meta property="fb:app_id" content="392736247808676">
	<!-- Main Image -->
	<meta property="og:image" content="<?php echo URL.$this->heading3["link"];  ?>" />
	<!-- Schema -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<link rel="icon" href="<?php echo URL; ?>views/index/img/favicon.ico">
<script src="<?php echo URL; ?>public/js/jquery-1.8.3.js" type="text/javascript"></script>
<script src="<?php echo URL; ?>public/js/slider.js" type="text/javascript"></script>
<?php

//require_once("includes/initial.php");
?>
<script type="text/javascript">
$(document).ready(function(){
$(document).scrollTop(320);
});
</script>
<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>views/article/includes/light_box.css">  

      <script type="text/javascript">
      
	 function show_panel(pic,post){  
        $("#lightbox, #lightbox-panel").fadeIn(300);
	
	$("#pic_content").html('<img src="<?php echo URL; ?>views/article/img/loading.gif" width="80" height="30" alt="loader" >').show();
	var url="<?php echo URL; ?>views/article/pic_gal.php";

	$.post(url,{pic : pic,post : post},function(data){
		$("#pic_content").html(data).fadeIn();
		$(window).scrollTop(0);
		});
	
	
     };
     $(document).keyup(function(e){
      if (e.keyCode==27){
	 $("body").css("overflow", "auto");
         $("#lightbox, #lightbox-panel").fadeOut(300);
	 var url="<?php echo URL; ?>views/article/pic_gal.php";
	 $.post(url,{pic : 'c' , post : null});
      }
     });
      
    $(document).ready(function(){
      $("#lightbox").click(function(){
	$("body").css("overflow", "auto");
         $("#lightbox, #lightbox-panel").fadeOut(300);
	 var url="<?php echo URL; ?>views/article/pic_gal.php";
	 $.post(url,{pic : 'c' , post : null});
     });
    
     $("a#close-panel").click(function(){
	$("body").css("overflow", "auto");
         $("#lightbox, #lightbox-panel").fadeOut(300);
	 var url="<?php echo URL; ?>views/article/pic_gal.php";
	 $.post(url,{pic : 'c' , post : null});
     });
     
    });
    </script> 


<link href="<?php echo URL; ?>public/css/main.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
a { color: inherit; }
body {
	background-image: url(<?php echo URL; ?>views/index/img/back_banner.jpg);
	background-repeat: repeat-x;
	background-color: #ffffff;
}
-->
</style>
<style type="text/css">
	#gallery{
		white-space:nowrap;
		float:none;
		clear:both;
	}
	#frame{
		width:210px;
		height:110px;
		float:left;
		overflow:hidden;
	}
	#frame #picture{
		width:200px;
		height:100px;
		padding-top: 5px;
		padding-bottom: 5px;
		padding-left: 5px;
		padding-right: 5px;
		overflow:hidden;	
	}
	#frame #picture:hover{
		width:210px;
		height:110px;
		padding-top: 5px;
		padding-bottom: 5px;
		padding-left: 5px;
		padding-right: 5px;
		overflow:hidden;	
	}
	#frame #picture #pic1{
		width:200px;
		height:100px;
		overflow:hidden;	
	}
	#frame #picture #pic1:hover{
		width:210px;
		height:110px;
		overflow:hidden;	
	}
	#frame #picture #pic1 #photo1 {
	width:200px;
	}
	#frame #picture #pic1 #photo1:hover {
	width:210px;
	}
	a{
		text-decoration:none;
	}
	</style>

</head>

<body>
   <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=392736247808676";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	
	
<div id="lightbox-panel">
	  
             
          <a id="close-panel" href="#"><img src="<?php echo URL; ?>views/article/img/close.jpg"></a> 
        <div id="pic_content">
		 
	</div>
	 
         
    </div>
       
      
    <div id="lightbox"></div>
    
    
    
<div id="wrapper">
  <div id="main_banner"> <a href="<?php echo URL; ?>index"><img src="<?php echo URL; ?>views/index/img/new_side.jpg" name="new_side" id="new_side" /></a><img id="new_up" src="<?php echo URL; ?>views/index/img/new_up.jpg" />
    <div id="upper_buttons"><div class="spacer">|</div><a href="<?php echo URL;?>index"> <div class="upper_button">
      
    Home</div></a><div class="spacer">|</div>
    <a href="<?php echo URL;?>rotary"><div class="upper_button">  PCCS </div></a>
    <div class="spacer">|</div>
<a href="<?php echo URL;?>sasira"><div class="upper_button">  Sports </div></a>
    <div class="spacer">|</div>
    <div class="upper_button">  Societies </div>
    <div class="spacer">|</div>
    <a href="<?php echo URL;?>vidura"><div class="upper_button">  Past Pupils </div></a>


         <script>
  $(".upper_button").hover(function () {
    $(this).css("background-color","#6c220f")},function(){
	$(this).css("background-color","#963117");
	
  });
</script>

    </div>
  </div>
  
  
  
  <div class='main-slider'>
<?php
$site_info=array(
	array(URL."views/index/img/01.jpg"),
	array(URL."views/index/img/02.jpg"),
	array(URL."views/index/img/03.jpg"),
	array(URL."views/index/img/04.jpg"),
	array(URL."views/index/img/05.jpg"),
	array(URL."views/index/img/06.jpg"),
	array(URL."views/index/img/07.jpg"),
);

$slider_default_image= $site_info[0][0];
?>
<div class='slider-large-image'>
<?php
for($i=0;$i<7;$i++){
	
	$slide_image=$site_info[$i][0];
	echo "<div  class='large-image' id='slider-image-".$i."'>
	<img  src='".$slide_image."' alt='advanced level ict' height='230' width='1000'/>
	</div>";
}
?>

</div>

<script type="text/javascript">
setTimeout('slider_select_next()',5 * 1000);
//slider_select_next();
 
</script>

</div>
  

  
  <div id="side_bar">
	
    <a href="<?php echo URL;?>contact"><div class="side_button"> Principal's Message</div></a>

   <div class="side_button"> School Administration </div>
    <div class="side_button"> Results </div>
    <div class="side_button"> Wall Papers</div>
    <div class="side_button"> Old Photos</div>
    <div class="side_button"> Contact Us </div>
    <?php
    $logged = Session::get('loggedin');
    if ($logged==true): ?>
    <a href="<?php echo URL;?>dashboard"><div class="side_button"> Control Panel</div></a>
    <?php endif; ?>
    <?php
    $logged = Session::get('loggedin');
    if ($logged==false): ?>
    <a href="<?php echo URL;?>login"><div class="side_button"> login</div></a>
    <?php else: ?>
    <a href="<?php echo URL;?>dashboard/logout"><div class="side_button"> logout</div></a>
    <?php endif; ?>
    <div class="side_button"> R&D
        <script>
  $(".side_button").hover(function () {
    $(this).css("background-color","#6c220f")},function(){
	$(this).css("background-color","#963117");
	
  });
      </script>
      
    </div>
    
  </div>
    







<div id="main_area">
    <div class="post">
      <p class="title">
<?php
echo $this->msg["topic"];
?>
<div><div class="fb-share-button" data-href="" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share on Facebook</a></div></div>
      </p>
<p class="sub">By
<?php
echo $this->msg3;
echo " &nbsp; &nbsp; &nbsp; Date:".$this->msg["date"]." &nbsp; &nbsp; &nbsp; Time:".$this->msg["time"];
?></p>
<?php
		$this->result2=$this->msg1->fetch();
		
		echo "<div class=\"content\"><br/> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ".$this->result2["text"]."</div>";
		echo "<pre> </pre>";
		echo '<div id="gallery">';
		$a=1;
		while ($a<=10){
			${"this->photo".$a}=$this->msg2->fetch();
		
		$a=$a+1;
		}
		$a=1;
		while ($a<=3){
			if(isset(${"this->photo".$a}["no"])and ${"this->photo".$a}["no"]<=4){
			echo '<div id="frame"><div id="picture"><div id="pic1">';
			echo '<a href="#" onclick="return false" onmousedown="javascript:show_panel('.${"this->photo".$a}["id"].','.${"this->photo".$a}["post_id"].');">';
			echo '<img src="'.URL.${"this->photo".$a}["link"].'" id="photo1" >';
			echo '</a></div></div></div>';
			}
		$a=$a+1;
		}
		
		echo "</div>";
		
		$this->result2=$this->msg1->fetch();
		
		echo "<div class=\"content\"> <br/> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ".$this->result2["text"]."</div>";
		echo "<br/>";
		echo '<div id="gallery">';
		$a=1;
		
		while ($a<=10){
			if(isset(${"this->photo".$a}["no"])and ${"this->photo".$a}["no"]>3){
			echo '<div id="frame"><div id="picture"><div id="pic1">';
			echo '<a href="#" onclick="return false" onmousedown="javascript:show_panel('.${"this->photo".$a}["id"].','.${"this->photo".$a}["post_id"].');">';
			echo '<img src="'.URL.${"this->photo".$a}["link"].'" id="photo1" >';
			echo '</a></div></div></div>';
			}
		$a=$a+1;
		}
		echo "</div>";
?>
   
    </div>
</div>
  <div id="footer">

		<p align="center" class="title">Powered By P.C.C.S[Piliyandala Centralians Computer Society]</p>
</div>
</div>

</body>
</html>

