
var slider_seconds=7;
var slider_current=0;

function slider_select(slide){
	
	
		$("#slider-image-"+slider_current).slideUp(1000);
		$("#slider-image-"+slide).slideDown(1000);
		
		slider_current=slide;
	
}

function slider_select_next(){
	if (slider_current == 6){
		slider_select(0);
	}
	else {
		slider_select(slider_current+1);
	}
		setTimeout('slider_select_next()',slider_seconds * 1000);
	}
					   