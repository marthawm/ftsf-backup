document.addEventListener('DOMContentLoaded', addPlayIcon());

function addPlayIcon(){

	var videos = document.getElementsByTagName('video');
	var videosLength = videos.length;
	
	for ( var i = 0; i < videosLength; i++){
		var videoParent = videos[i].parentNode;
		var playIcon = document.createElement('div');
		playIcon.classList.add('play-icon');
		videoParent.appendChild(playIcon);
		videoParent.style.position = "relative";
	}
}