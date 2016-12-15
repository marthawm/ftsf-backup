document.addEventListener('DOMContentLoaded', connectBlock);
var gridPattern = document.getElementById('gridManager');
var blocks = document.getElementsByClassName('block');
var select = document.getElementsByTagName('select');      
function connectBlock() {
	for(var i=0; i<blocks.length;i++){
		blocks[i].addEventListener('click', clickBlock);
	}
	if(select.length != 0){
		select[0].addEventListener('change', selectPage);
	}
	gridPattern.addEventListener('change', changePattern);
}

var lastTarget;
var column;
var bpid;
var pageid;
var changedBlocks = [];

checkDuplicateBlocks();

function clickBlock (event) {
	column = event.currentTarget.getAttribute('data-grid-column');
	bpid = event.currentTarget.getAttribute('data-grid-bpid');
	pageid = event.currentTarget.getAttribute('data-grid-page-id');
	
	if( lastTarget !== undefined){
		lastTarget.style.border = "";
	}

	if( lastTarget === event.currentTarget ){
		lastTarget = undefined;
		column = undefined;
		bpid = undefined;
		pageid = undefined;
		document.getElementsByClassName('select-page')[0].setAttribute('disabled', true);
	} else {
		event.currentTarget.style.border = '3px solid #DFFC00';
		document.getElementsByClassName('select-page')[0].removeAttribute('disabled');
		lastTarget = event.currentTarget;
		
		var htmlPages = document.getElementsByClassName("page-list");
		
		for(var i = 0; i < htmlPages.length; i++ ) {
			if(htmlPages[i].value === pageid){
				htmlPages[i].selected = "selected";
			}
		}
	}
}

function selectPage(event) {
		
		var htmlPages = document.getElementsByClassName("page-list");
		var htmlBlocks = document.getElementsByClassName("block");
		var selectedPageId = parseInt(htmlPages[event.target.selectedIndex].value);
		
		if(selectedPageId !== pageid) {
			var pages = JSON.parse(pagesData);	

			for(var i = 0; i < pages.length; i++) {
				if(pages[i].id === selectedPageId) {
					while (lastTarget.firstChild) {
						lastTarget.removeChild(lastTarget.firstChild);
					}
					lastTarget.style.backgroundColor = pages[i].color.hex;
					lastTarget.setAttribute("data-grid-page-id", pages[i].id);
					
					changedBlocks.push({
						column_id: parseInt(lastTarget.getAttribute('data-grid-column')),
						block_pattern_id: parseInt(lastTarget.getAttribute('data-grid-bpid')),
						meta_id: pages[i].meta_id
					});
					
					var src = pagesImages[pages[i].id];
					if(src !== ""){
						lastTarget.style.backgroundImage = "url(" + src + ")";
					}else{
						lastTarget.style.backgroundImage = "";
					}
					
					src = pagesVideos[pages[i].id];
					if(src !== ""){
						var videoSource = createBlockMetaElement("source",[],"");
						videoSource.setAttribute("src",src);
						var videoElement = createBlockMetaElement("video",['block-video'],videoSource);
						lastTarget.appendChild(videoElement);
						resizeVideo();
					}else{					
						if(pages[i].title !== "" && pages[i].hide_title === 0) {
							var el = createBlockMetaElement("h2", ["title", pages[i].font_style],pages[i].title);
							lastTarget.appendChild(el);
						}
						
						if(pages[i].quote !== "" && lastTarget.getElementsByClassName("quote").length === 0 && pages[i].hide_title === 1) {
							var el = createBlockMetaElement("h2", ["quote"],pages[i].quote);
							lastTarget.appendChild(el);
						}
						
						if(pages[i].subtitle !== "" && lastTarget.getElementsByTagName("span").length === 0 && pages[i].hide_title === 0) {
							var el = createBlockMetaElement("span", ["subtitle"],pages[i].subtitle);
							lastTarget.appendChild(el);
						}						
					}
					break;
				}
			}
			checkDuplicateBlocks();
			document.getElementsByClassName("hidden-div")[0].value = JSON.stringify(changedBlocks);
		}
			
}

function checkDuplicateBlocks(){
	var duplicate = false;
	var htmlBlocks = document.getElementsByClassName("block");
	var alertMessage = document.getElementsByClassName("alert-message")[0];
	for(var i = 0; i < htmlBlocks.length; i++) {
		for(var j = 0; j < htmlBlocks.length; j++) {
			if(htmlBlocks[i].getAttribute("data-grid-page-id") == htmlBlocks[j].getAttribute("data-grid-page-id") && i !== j && htmlBlocks[i].getAttribute("data-grid-page-id") != ''){					
				alertMessage.innerHTML = "There are duplicate pages on the grid!";
				duplicate = true;
				break;
			}
		}
		if(duplicate) {
			break;
		}
		
		if(i == htmlBlocks.length-1 ) {
			alertMessage.innerHTML = "";
		}
	}
}

function createBlockMetaElement(tagName, classes, content) {
	var newElement = document.createElement(tagName);
	
	if(!content.nodeName){
		content = document.createTextNode(content);
	}
	newElement.appendChild(content);
	
	for( var i=0; i<classes.length; i++ ){
		newElement.classList.add(classes[i]);
	}
	
	return newElement;
}

function changePattern(){

	var patternOption = this.value; // value of pattern from select drop down

	var gridWrap1 = document.getElementsByClassName('grid-wrap-1'),i;
	var gridWrap2 = document.getElementsByClassName('grid-wrap-2'),i;
	var gridWrap3 = document.getElementsByClassName('grid-wrap-3'),i;
	var gridWrap4 = document.getElementsByClassName('grid-wrap-4'),i;
	var gridWrap5 = document.getElementsByClassName('grid-wrap-5'),i;

	if(patternOption === '1'){ //hide pattern 2 and 3
		
		for(var i = 0; i < gridWrap1.length; i++){	
				gridWrap1[i].style.visibility = "visible";
			}
		for(var i = 0; i < gridWrap2.length; i++){	
				gridWrap2[i].style.visibility = "visible";
			}
		for(var i = 0; i < gridWrap3.length; i++){	
				gridWrap3[i].style.visibility = "hidden";
			}
		for(var i = 0; i < gridWrap4.length; i++){	
				gridWrap4[i].style.visibility = "hidden";
			}
		for(var i = 0; i < gridWrap5.length; i++){	
				gridWrap5[i].style.visibility = "hidden";
			}


	}else if(patternOption === '2'){//hide pattern 1 and 3

		for(var i = 0; i < gridWrap1.length; i++){	
				gridWrap1[i].style.visibility = "hidden";
			}
		for(var i = 0; i < gridWrap2.length; i++){	
				gridWrap2[i].style.visibility = "hidden";
			}
		for(var i = 0; i < gridWrap3.length; i++){	
				gridWrap3[i].style.visibility = "visible";
			}
		for(var i = 0; i < gridWrap4.length; i++){	
				gridWrap4[i].style.visibility = "hidden";
			}
		for(var i = 0; i < gridWrap5.length; i++){	
				gridWrap5[i].style.visibility = "hidden";
			}
		
	}else if(patternOption == '3'){ // hide pattern 1 and 2

		for(var i = 0; i < gridWrap1.length; i++){	
				gridWrap1[i].style.visibility = "hidden";
			}
		for(var i = 0; i < gridWrap2.length; i++){	
				gridWrap2[i].style.visibility = "hidden";
			}
		for(var i = 0; i < gridWrap3.length; i++){	
				gridWrap3[i].style.visibility = "hidden";
			}
		for(var i = 0; i < gridWrap4.length; i++){	
				gridWrap4[i].style.visibility = "visible";
			}
		for(var i = 0; i < gridWrap5.length; i++){	
				gridWrap5[i].style.visibility = "visible";
			}

		
	}else{// reload page and shows all patterns
		location.reload();
	}		

}


