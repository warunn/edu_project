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
	
<div id="main_area">
    <div class="post">
    <h1>Wall Papers</h1>
    <br/>
<div id="gallery">
		<?php $a=1;
		while ($a<=21) :
		?>
			<div id="frame"><div id="picture"><div id="pic1">
			<a href="<?php echo URL."views/spage/img/old/old".$a;?>.jpg">
			<img id="photo1" src="<?php echo URL."views/spage/img/old/old".$a;?>.jpg" width="140px">
			</a></div></div></div>
			<?php if($a%3==0){echo "<br><br>";}?>
			<?php 
			$a=$a+1;
			endwhile; ?>
			
			
		
		</div>
		</div>
		</div>
		