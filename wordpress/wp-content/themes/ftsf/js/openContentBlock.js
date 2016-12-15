// Sets event on window loading
window.onload = init();

var alreadyRunning = false,
	lastOpenedBlock = undefined;

// Function that is fired when the window is getting loaded
function init(){
	if(!isInWPAdmin()){ //check line 165
		var gridBlocks = getAllGridBlocks(),
			contentBlocks = getAllContentBlocks(),
			contentBlocksAElement = document.getElementsByClassName("close");

	

		//Sets scrolling on the horizontal side
		document.getElementsByTagName("body")[0].style.overflowY = "hidden";
		document.getElementsByTagName("body")[0].style.overflowX = "scroll";

		//When the window get's resized, this event will be fired.
		window.addEventListener("resize", function() {
			if(lastOpenedBlock !== undefined){
				setTimeout(function(){scrollToElement(lastOpenedBlock);},300);
			}
		}, false);

		//Sets a close event on the crosses within the content blocks
		for(var i = 0; i < contentBlocksAElement.length; i++){
			contentBlocksAElement[i].onclick = eventWhenClickExitContentBlock;
		}

		//Sets all contentBlocks on width: 0px on website load
		for(var i = 0; i < contentBlocks.length; i++){
			contentBlocks[i].style.width = "0px";
		}

		//Sets a event on the grid blocks
		for(var i = 0; i < gridBlocks.length; i++){
			if(gridBlocks[i].getAttribute("data-grid-bpid")){
				gridBlocks[i].onclick = eventWhenClickedGridBlock;
			}
		}
	}
}

//Function that gets fired when the user clicks a Grid block
function eventWhenClickedGridBlock(event){
	var correspondingContentBlock,
		clickedBlock = event.currentTarget;

	if(!clickedBlock.getElementsByTagName("video")[0]) {
		correspondingContentBlock = getCorrespondingContentBlock(clickedBlock);
		if (correspondingContentBlock !== undefined){
			if (correspondingContentBlock.style.width === "80vw") {
				closeContentBlock(correspondingContentBlock);				
			}
			else if (correspondingContentBlock.style.width === "0px") {
				openContentBlock(correspondingContentBlock);				
			}
		}
	}
}

//Function that gets fired when you click on the close button in a content block
function eventWhenClickExitContentBlock(event){
	var clickedElement = event.target;
	closeContentBlock(clickedElement.parentElement);
	history.pushState({}, null, "/ftsf.eu/wordpress/");

}


//Function that handles the closing of a content block
function closeContentBlock(contentBlock){
	if(alreadyRunning !== true){ //prevents user from executing a event when one instance is already running
		alreadyRunning = true;
		contentBlock.style.visibilty = "hidden";
		contentBlock.style.width = "0px";
		contentBlock.style.overflowY = "hidden";
		document.getElementsByTagName("body")[0].style.overflowX = "scroll";
	}
	setTimeout(function(){alreadyRunning = false; contentBlock.style.display = "none";},2000); //when transition is done (2s), you can run an other instance of the function again
	lastOpenedBlock = "";
	history.pushState({}, null, "/ftsf.eu/wordpress/");
}

function openContentBlock(contentBlock){
	if(alreadyRunning !== true){ //Same as line 68
		contentBlock.style.display = "block";
		setTimeout(function(){
			alreadyRunning = true;
			var contentBlocks = getAllContentBlocks(),
				timeoutNeeded = false;
			for(var i = 0; i < contentBlocks.length; i++){
				if(contentBlocks[i].style.width === "80vw"){
					alreadyRunning = false;
					closeContentBlock(contentBlocks[i]);
					alreadyRunning = true;
					timeoutNeeded = true;
				}
			}
			if(timeoutNeeded){ //when another block is opened, it will first close the block. When the other block is closed, new one will open
				setTimeout(function(){
					contentBlock.style.visibilty = "visible";
					contentBlock.style.width = "80vw";
					contentBlock.style.overflowY = "scroll";
					document.getElementsByTagName("body")[0].style.overflowX = "hidden";
					setTimeout(function(){scrollToElement(contentBlock);},900);
				}, 2000);
			}
			else{ // if other blocks aren't open
				contentBlock.style.visibilty = "visible";
				contentBlock.style.width = "80vw";
				contentBlock.style.overflowY = "scroll";
				document.getElementsByTagName("body")[0].style.overflowX = "hidden";
				setTimeout(function(){scrollToElement(contentBlock);},900);
			}
			lastOpenedBlock = contentBlock; //used for scrolling when resizing, otherwise the script doesn't know where to scroll to
		}, 100);
	}
	setTimeout(function(){alreadyRunning = false; },2000);
}

function scrollToElement(element){
	var	viewWidth = document.getElementsByClassName("menu")[0].clientWidth/100*80/8,//calculates the vw of the blocks divided by 8, so that it will scroll to the middle.
		elementDistance = element.offsetLeft-viewWidth,
		stopLoop = false,
		interval;
	interval = setInterval(function(){
		var scrolledDistance = document.getElementsByTagName("body")[0].scrollLeft; //for chrome
		if (scrolledDistance === 0){ //some browsers work with the body tag, others with html. if it doesn't support body, scrolledDistance will be 0
			scrolledDistance = document.getElementsByTagName("html")[0].scrollLeft; //for firefox, ie9
		}
		if(scrolledDistance < elementDistance) {
			window.scrollTo(scrolledDistance + 5, 0);
		}
		else if(scrolledDistance > elementDistance){
			window.scrollTo(scrolledDistance - 5, 0);
		}
		if(scrolledDistance.between(elementDistance-5, elementDistance+5)){ //when the element is in range, it will stop the loop and thus stop the scrolling
			stopLoop = true;
		}
		if(stopLoop){ //when stopLoop is true, it will stop the function running in an interval
			clearInterval(interval);
		}
	}, 1);
}

Number.prototype.between = function (min, max) {
	return this > min && this < max;
};

// returns the contentBlock that belongs to the given gridBlock
function getCorrespondingContentBlock(gridBlock){
	contentBlocks = getAllContentBlocks();
	var accordingContentBlock = undefined;
	for(var i = 0; i < contentBlocks.length; i++){
		if(contentBlocks[i].getAttribute("data-grid-bpid") === gridBlock.getAttribute("data-grid-bpid") && contentBlocks[i].getAttribute("data-grid-column") === gridBlock.getAttribute("data-grid-column")){
			accordingContentBlock = contentBlocks[i];
		}
	}
	return accordingContentBlock;
}

function getAllGridBlocks(){
	return document.getElementsByClassName("block");
}

function getAllContentBlocks(){
    return document.getElementsByClassName("content-block");
}

// in "/wp-admin" there is no footer present, so when viewing this in the grid plugin, functions will not be fired when clicking/selecting blocks.
function isInWPAdmin(){
	if(document.getElementsByClassName("footer")[0]){
		return false;
	}
	else{
		return true;
	}
}
function sw(){
	console.log("wert6y7u8i");
}