<div id="main_area">
    <div class="post">
    <?php //print_r($this);?>
    <h1>Edit Article</h1>
    <?php //print_r($this); ?>
<form action="<?php echo URL;?>article/editrun" method="post" enctype="multipart/form-data">
 <input type="hidden" name="post_id" value="<?php echo $this->post_id;?>">
    <table border="0">
    <tr><td>Topic </td><td><input type="text" name="topic" size="70" value="<?php echo $this->msg["topic"];?>" required></td></tr>
    <tr><td>Writer </td><td><input type="text" name="writer" value="<?php echo $this->msg3;?>" required><input type="hidden" name="writerno" value="<?php echo $this->msg5;?>"> </td></tr>
    <tr>
    <?php $this->result2=$this->msg1->fetch();
     //print_r($this->result2);
    ?>
    <td>paragraph1 </td><td><textarea name="p1" cols="90" rows="7"  required><?php  echo $this->result2["text"];?></textarea><?php if(isset($this->result2["text"])){ echo '<input type="hidden" name="phara1" value="'.$this->result2["pid"].'">';} ?></td></tr>
    <?php $this->result2=$this->msg1->fetch();?>
    <tr><td>paragraph2 </td><td><textarea name="p2" cols="90" rows="7"><?php if(isset($this->result2["text"])){ echo $this->result2["text"];}?></textarea><?php if(isset($this->result2["text"])){ echo '<input type="hidden" name="phara2" value="'.$this->result2["pid"].'">';} ?></td></tr>
    <?php $this->result2=$this->msg1->fetch();?>
    <tr><td>Links </td><td><textarea name="p3" cols="90" rows="7"  ><?php if(isset($this->result2["text"])){ echo $this->result2["text"];}?></textarea><?php if(isset($this->result2["text"])){ echo '<input type="hidden" name="phara3" value="'.$this->result2["pid"].'">';} ?></td></tr>
  </table>
  <table>
   <?php 
   $a=1;
   while ($a<=10){
       ${"this->photo".$a}=$this->msg2->fetch();
       
       $a=$a+1;
   }
   $a=1;
   while ($a<=15){
       if(isset(${"this->photo".$a}["no"])and ${"this->photo".$a}["no"]<=15): 
       //echo '<img src="'.URL.${"this->photo".$a}["link"].'" id="photo1" width="200px" >';?>
           <tr>
           <td>picture <?php echo $a;?> </td><td><div id='<?php echo "add".$a;?>'  <?php if(isset(${"this->photo".$a}["link"])){echo 'style="display:none"';} ?>>IF you Want you can add a  picture <input type="file" name="<?php echo "npic".$a;?>" id="<?php echo "npic".$a;?>"></div><div id="<?php echo "pic".$a;?>" <?php if(!isset(${"this->photo".$a}["link"])){echo 'style="display:none"';} ?>><?php if(isset(${"this->photo".$a}["link"])): ?><img src="<?php echo URL.${"this->photo".$a}["link"]; ?>" style="max-width:200px" /><?php endif ?><br/><input type="button" id="<?php echo "btn".$a;?>" name="<?php echo "btn".$a;?>" value="Remove above Picture" onmousedown="javascript:comment_form1('#<?php echo "add".$a;?>','#<?php echo "pic".$a;?>','#<?php echo "pi".$a;?>')"></div><?php if(isset(${"this->photo".$a}["link"])){ echo '<input type="hidden" id="'."p".$a.'" name="'."pic".$a.'" value="'.${"this->photo".$a}["id"].'">';
           echo '<input type="hidden" id="'."pi".$a.'" name="'."pi".$a.'" value="0">';
           } ?></td></tr>
        <?php 
        endif;
        $a=$a+1;
   } 
   
        ?>   
       
     
  
  <tr>
  <td>&nbsp;</td><td><input type="submit" value="submit" tabindex="14"></td>
  </tr>
  </table>
   <script type="text/javascript">

    function comment_form1(b,a,c){
        $(a).hide("slow");
        $(b).show("slow");
        $(c).val("1");
    }


</script>
       
   </form>
   </div>
   </div>