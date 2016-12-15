var videos;
var videoSiblings;
document.addEventListener('DOMContentLoaded', function(){
	videos = document.getElementsByClassName("block-video");

	for(var i=0; i<videos.length;i++){
		videos[i].addEventListener('mouseenter',videoMouseOver,false);
	}
	
	for(var i=0; i<videos.length;i++){
		videos[i].addEventListener('click',openLightBox,false);		
	}

	var blackOverlay = document.getElementsByClassName("black-overlay");
	for(var i=0; i<blackOverlay.length;i++){
		blackOverlay[i].addEventListener('click',closeLightBox,false);
	}
}, false);

function videoMouseOver(event)
{
    event.target.play();
    
    var videoParent = event.target.parentNode;
    var videoSiblings = videoParent.childNodes;

    for (var i=0; i < videoSiblings.length; i++){
    	if (videoSiblings[i].nodeName !== "#text" && videoSiblings[i].classList.contains('play-icon')){
    		
    			videoSiblings[i].style.display = "none"
    	}
    }

    this.addEventListener('mouseout',videoMouseExit,false);
}

function videoMouseExit(event)
{		
        event.target.pause();

        var videoParent = event.target.parentNode;
    	var videoSiblings = videoParent.childNodes;

	    for (var i=0; i < videoSiblings.length; i++){
	    	if (videoSiblings[i].nodeName !== "#text" && videoSiblings[i].classList.contains('play-icon')){
	    		
	    			videoSiblings[i].style.display = "block"
	    	}
	    }
}

function openLightBox(event){
	var light = document.createElement("video");
	var lightSource = document.createElement("source");
	var divOverlay  = document.createElement("div");
	
	light.setAttribute("id","light");
	light.setAttribute("class","click-video");
	light.setAttribute("controls","");
	light.addEventListener("click",videoToggle);
	
	lightSource.setAttribute("src",event.target.childNodes[1].src);
	lightSource.setAttribute("type","video/mp4");

	divOverlay.setAttribute("id", "fade");
	divOverlay.setAttribute("class", "black-overlay");
	divOverlay.addEventListener("click",closeLightBox)
	
	light.appendChild(lightSource);
	
	event.target.parentNode.appendChild(light);
	event.target.parentNode.appendChild(divOverlay);
}

function closeLightBox(event){
	var light = document.getElementById('light');
	var divOverlay = document.getElementById('fade');
	light.parentNode.removeChild(light);
	divOverlay.parentNode.removeChild(divOverlay);
}

function videoToggle(event){
	event.preventDefault();
	if( event.target.paused ){
		event.target.play();
	} else {
		event.target.pause();
	}
	
}