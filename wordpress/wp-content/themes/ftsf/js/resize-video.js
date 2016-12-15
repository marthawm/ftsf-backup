document.addEventListener('DOMContentLoaded', resizeVideo);

function resizeVideo(){
	videos = document.getElementsByClassName("block-video");

	for (var i=0; i<videos.length; i++) {
		var videoWidth = videos[i].offsetWidth;
		var videoHeight = videos[i].offsetHeight;
		var videoRatio = videoWidth/videoHeight;

		var blockWidth = videos[i].parentNode.offsetWidth;
		var blockHeight = videos[i].parentNode.offsetHeight;
		var blockRatio = blockWidth/blockHeight;
	  
		if(videoRatio < blockRatio){
			videos[i].style.width = "100%";
			videos[i].style.maxWidth = "none";

		} else {
			videos[i].style.height = "100%";
			videos[i].style.maxWidth = "none"
		}
	}
}

document.addEventListener('DOMContentLoaded', resizeVideoMobile);
function resizeVideoMobile(){
	videos = document.getElementsByClassName("block-video-mobile");
console.log("heelleuk");
	for (var i=0; i<videos.length; i++) {
		var videoWidth = videos[i].offsetWidth;
		var videoHeight = videos[i].offsetHeight;
		var videoRatio = videoWidth/videoHeight;

		var blockWidth = videos[i].parentNode.offsetWidth;
		var blockHeight = videos[i].parentNode.offsetHeight;
		var blockRatio = blockWidth/blockHeight;
	  
		if(videoRatio < blockRatio){
			videos[i].style.width = "100%";
			videos[i].style.maxWidth = "none";

		} else {
			videos[i].style.height = "100%";
			videos[i].style.maxWidth = "none"
		}
	}
}