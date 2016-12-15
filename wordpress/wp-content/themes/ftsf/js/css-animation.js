document.addEventListener('DOMContentLoaded', function(){
	strike = document.getElementsByClassName("strike");

	for(var i=0; i < strike.length; i++){
		var blockBackground = strike[i].parentNode.parentNode.style.backgroundColor;
		strike[i].style.backgroundColor = blockBackground;
	}
	
}, false);
