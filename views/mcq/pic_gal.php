<?php
require("includes/initial.php");
//session_start();
//echo $_SESSION["page"]." <br/> ";
//echo $_POST["post"]." <br/> ";
//echo $_POST["pic"]." <br/> ";


$post_id=$_POST["post"];
$page=$_POST["pic"];
//echo $post_id." <br/> ";;
//echo $page." <br/> ";
$per_page=1;
$total_count= pic::count_by_post($post_id);
$pagination= new n_page($page,$per_page,$total_count);
//echo $pagination->offset()." <br/> ";
//print_r($pagination);

    
    
    $pic_obj= pic::select_by_post($post_id,$per_page,$pagination->offset());
    //print_r($pic_obj);
    $title= pic::select_title($post_id);
    echo "<div id=\"upper\"><h2>";
    echo $title;
    echo "</h2></div>";
    //echo URL.$pic_obj["link"];
    echo "<div id='pics'> <img src=".URL.$pic_obj["link"]." width='150' height='50'/>&nbsp;</div>";
    
    echo "<div id='comment'> <div id='next'>";
    if($pagination->has_previous_page()){
        $npage=$_POST["pic"]-1;
        echo "<div class='navi' width='150' style='text-align: center;width: 45%;border-radius:3px;float:left;color:#ffffff;background-color:#963117'><b><a href='#' onclick='return false' onmousedown=\"javascript:show_panel({$npage},{$post_id});\" style=\"font-size: 20px\">&lt;&lt; Last photo </a></b></div> <div bgcolor='#ffffff' style='float:left'> &nbsp; </div> ";
    }
     if($pagination->has_next_page()){
        $ppage=$_POST["pic"]+1;
        echo "<div class='navi' width='150' style='text-align: center;width: 45%;border-radius:3px;float:left;color:#ffffff;background-color:#963117'><b><a href='#' onclick='return false' onmousedown=\"javascript:show_panel({$ppage},{$post_id});\" style=\"font-size: 20px\"> Next photo &gt;&gt; </a></b></div> ";
    }
    ?>
    <script>
  $(".navi").hover(function () {
    $(this).css("background-color","#6c220f")},function(){
	$(this).css("background-color","#963117");
	
  });
</script>
    <div style="clear:both"> &nbsp; </div>
  <div id="comment1" style="display:none">
    <?php if(isset($_SESSION['FBID'])): ?>
    <?php
    $fbid=$_SESSION['FBID'];
    echo"<div style='float:left'><img src='".URL."pic/fb/".$fbid.".jpg' width='50'></div><div style='float:left'> &nbsp; ".$_SESSION['FULLNAME']."</div>"; ?>
    <br/>&nbsp; <a href="<?php echo URL."views/article/includes/logout.php";?>" style="color:blue;text-decoration:underline">Logout From FB</a>
	<div style="clear:both;"> Comment &nbsp; </div> <textarea id="cbox" cols="30" rows="5"></textarea><br/>
	<div class="g-recaptcha" data-sitekey="6Lc1bjMUAAAAAOqpq3VpsdwfF7nHDKq-5Kog-WTE"></div>
	<script src='https://www.google.com/recaptcha/api.js'></script>
<input type="submit" id="sub" value="submit comment">
    <?php else: ?>
     <a href="<?php echo URL."views/article/includes/fbconfig.php";?>"><img src="<?php echo URL."views/article/includes/fb-button.png";?>" width="250" ></a>
     <?php endif ?>
</div>
<div id="message" style="display:none">
<center><b style="color:#4fc5aa">  </b></center>
</div>


<center><a href="#" onclick="return false" onmousedown="javascript:comment_form()"><div id='cbutton' width='150' style='font-family:impact;height:100;min-width:160;clear:both;border:3px;border-radius:3px;color:#ffffff;background-color:#000000;font-size: 27px'>Add Comment</div></a></center>
<script type="text/javascript">
function comment_form(){
		//alert("hello");
		$("#comment1").show("slow");
		$("#cbutton").hide("slow");		
	}
	

    $("#sub").click(function(){
	var url= "<?php echo URL."views/article/includes/catch.php" ?>" ;
	
    var cbox= $("#cbox").val();
    if (cbox==0){
	alert("Please Enter a Comment");
    }else{
	var response = grecaptcha.getResponse();
	//alert(response);
    $.post(url,{cbox: cbox, pic_id : <?php echo $pic_obj["id"]; ?>, id: <?php echo $pic_obj["post_id"]; ?>, recaptcha: response },function(data){
        if(data){
            //alert(data);
	    
		$('#message').html(data);
        }
        else{
            alert("bad");}
        });
	$("#comment1").hide("slow");
	setTimeout(function(){$("#message").show("slow");},100);
	setTimeout(function(){$("#message").hide("slow");},10000);
	setTimeout(function(){$("#cbutton").show("slow");},11000);
    }
});
</script>
    <?php
    //print_r($pic_obj);
    echo "<div id='show_comments'>";
    $comment_set=pic_comment::find_by_pic($pic_obj["id"],$pic_obj["post_id"]);
    //print_r($comment_set);
    foreach ($comment_set as $comment){
	echo "<br/>";
        //echo $comment['writer'];
	//print_r($comment);
	echo "<div style=\"clear:both\">";
        $writer=pic_comment::find_writer($comment['writer']);
	//print_r($writer);
	$writerid=$writer["fbid"];
	echo "<img src='".URL."pic/fb/".$writerid.".jpg' width='50' height='50' align='left'> &nbsp; &nbsp;";
        echo "<b><u>{$writer["fbfullname"]} </u></b> &nbsp;:&nbsp;<br/> &nbsp; &nbsp;<font color=\"black\" size=\"4\"><b>{$comment['comment']}</b> </font><br/> &nbsp; &nbsp;Date : {$comment['date']}<br/><hr/>";
	echo "</div>";
    }
    
    echo "</div>";
    
    echo "</div>";
  ?>   

