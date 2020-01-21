
alert("hello");
$("#sub").click(function(){
    var cbox= $("#cbox").val();
    $.post("catch.php",{cbox: cbox},function(data){
        if(data){
            alert(data);
        }
        else{
            alert("bad");}
        });
	$("#comment").hide("slow");
	setTimeout(function(){$("#message").show("slow");},100);
	setTimeout(function(){$("#message").hide("slow");},10000);
	setTimeout(function(){$("#cbutton").show("slow");},11000);
	
});



    
