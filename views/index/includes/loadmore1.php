<?php

require_once("post.php");
require_once("initial.php");
$post= new post();
$per_page=1;
$offset=$_POST["ab"];
//echo $offset;
print_r($post);
//print_r($_SESSION);
if($offset>=0){
$final= $post->paginate($per_page,$offset);
//echo $final["post_id"];
$text=$post->readtext($final["post_id"]);
$text=mb_substr($text,0,800);
$photos=$post->getphoto($final["post_id"]);
$writer=$post->getwriter($final["writer"]);
        echo '<div class="post"><br/>';
        echo '<a href="'.URL.'article/read/'.$final["post_id"].'" style="text-decoration:none;border-style:none;">';
        
        echo '<p class="title">'.$final["topic"]."</p><br/>";
        echo "<p>".$text." ..read more!</p><br/>";
        echo "<p style='clear:both;'>";
        $b=0;
        while ($b<3){
                ${"this->photo".$b}=$photos->fetch();
                echo '<div style="width:200px;height:100px;float:left;overflow:hidden">';
                echo '<img width="200" src="'.URL.${"this->photo".$b}["link"].'" id="photo1" ></div>';
                echo "<div bgcolor='#ffffff' style='float:left'> &nbsp; </div>";
                $b=$b+1;        
        }
        echo "</p>";
        echo "<p style='clear:both;'> &nbsp;</p><p style='clear:both;'> By :".$writer."</p>";

    
    
    echo "<br/></a></div>";
    
}



?>
