document.addEventListener('DOMContentLoaded', resizeImage);

function resizeImage(){
	
	setTimeout(function(){
		images = document.getElementsByClassName("image");

	for (var i=0; i<images.length; i++) {
		var imageWidth = images[i].offsetWidth;
		var imageHeight = images[i].offsetHeight;
		var imageRatio = imageWidth/imageHeight;

		var blockWidth = images[i].parentNode.offsetWidth;
		var blockHeight = images[i].parentNode.offsetHeight;
		var blockRatio = blockWidth/blockHeight;
	  
	 if(imageRatio > blockRatio){
	 	var ie10AndBelow = navigator.userAgent.indexOf('MSIE') != -1;
	 	var ie11AndAbove = navigator.userAgent.indexOf('Trident') != -1 && navigator.userAgent.indexOf('MSIE') == -1;
	 	
	 	if(ie10AndBelow||ie11AndAbove){
	 		images[i].style.height = 100/imageRatio + "%";//fix for IE, because flexbox is not supported
	 		images[i].style.width = "100%";

	 	} else {
	 		images[i].style.width = "100%";
	 	}

	 } else {
	 	images[i].style.height = "100%";
		}
	}},10);
}