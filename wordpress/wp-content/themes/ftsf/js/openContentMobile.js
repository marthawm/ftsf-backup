// Sets event on window loading

window.onload = init();

var alreadyRunning = false,
	lastOpenedBlock = undefined;

// Function that is fired when the window is getting loaded
function init(){
	if(!isInWPAdmin()){ //check line 165
		var gridMobileBlocks = getAllMobileGridBlocks(),
			contentMobileBlocks = getAllMobileContentBlocks();

			

		//When the window get's resized, this event will be fired.
		window.addEventListener("resize", function() {
			if(lastOpenedBlock !== undefined){
				setTimeout(function(){scrollToElement(lastOpenedBlock);},300);
			}
		}, false);

		
		//Sets all contentBlocks on width: 0px on website load
		for(var i = 0; i < contentMobileBlocks.length; i++){
			contentMobileBlocks[i].style.width = "0px";
		}

		//Sets a event on the grid blocks
		for(var i = 0; i < gridMobileBlocks.length; i++){
			if(gridMobileBlocks[i].getAttribute("data-grid-bpid")){
				gridMobileBlocks[i].onclick = eventWhenClickedGridBlock;
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

function openContentBlock(contentBlock){

		//jquery function to manupulate divs in mobile view
	
	(function($){

		$(document).on('click','.mobile-grid-item', function(event){
			event.preventDefault();	

			window.block_url = $(this).find('a:first').attr('href').toLowerCase().split(" ").join("-");
			history.pushState({}, '', window.block_url);
		})

		$(".mobile-grid-container").hide();
	
 		var mobilePageContent = $(contentBlock).html();
 		$(".mobile-grid-container-new").html(mobilePageContent);

 		$(document).on('click','.close', function(event){
 			event.preventDefault();	

			$(".mobile-grid-container-new").html('');
			$(".mobile-grid-container").show();	
			history.pushState({}, null, "/ftsf.eu/wordpress/");
		})
		

				
 	})(jQuery);


}
function getCorrespondingContentBlock(gridBlock){
	contentMobileBlocks = getAllMobileContentBlocks();
	var accordingContentBlock = undefined;
	for(var i = 0; i < contentMobileBlocks.length; i++){
		if(contentMobileBlocks[i].getAttribute("data-grid-bpid") === gridBlock.getAttribute("data-grid-bpid") && contentMobileBlocks[i].getAttribute("data-grid-column") === gridBlock.getAttribute("data-grid-column")){
			accordingContentBlock = contentMobileBlocks[i];
		}
	}
	return accordingContentBlock;
}



function getAllMobileGridBlocks(){
	return document.getElementsByClassName("mobile-grid-item");
}

function getAllMobileContentBlocks(){
    return document.getElementsByClassName("content-block");
}

// in "/wp-admin" there is no footer present, so when viewing this in the grid plugin, functions will not be fired when clicking/selecting blocks.
function isInWPAdmin(){
	if(document.getElementsByClassName("footer")[0]){
	  	return false;
	  }
	  else{
		return false;
	}
}

