document.addEventListener("DOMContentLoaded",function() {
	if(document.getElementById("font-weight-dropdown") !== null) {
		document.getElementById("font-weight-dropdown").addEventListener("change",fontChanged);
		document.getElementById("color-dropdown").addEventListener("change",colorChanged);
	}

});

document.addEventListener("DOMContentLoaded", checkboxTitle);

function fontChanged() {
	fontName = document.getElementById("font-weight-dropdown").value;
	var fonts = editPageData.fontStyles;
	for (i=0;i<=fonts.length;i++) {
		lastFont = fonts[i].toLowerCase().split(" ").join("-");
		if( lastFont == fontName ) {
			for(i=0;i<=fonts.length;i++) {
				if(document.getElementById("example-text").className.match(fonts[i]) ) {
					document.getElementById("example-text").className.replace (fonts[i] ,"");
					document.getElementById("example-text").className=lastFont;
				}
			}
		}
	}	
}

function colorChanged(){
	colorId = document.getElementById("color-dropdown").value;
	var colors = editPageData.colors; 
	for (i=0;i<colors.length;i++) {
		if(colors[i].id === colorId ) {
			document.getElementsByClassName("example-box")[0].style = "background-color:"+colors[i].hex;
		}
	}	
}

function checkboxTitle(){
	var titleCheckbox = document.getElementById('checkbox-title');
	var animationCheckbox = document.getElementById("css-animation");

	window.addEventListener("load", function(){
		
		if(titleCheckbox.checked){
			animationCheckbox.checked=false;
			animationCheckbox.disabled=true;
		} else {
			animationCheckbox.disabled=false;
		}
	})
	
	titleCheckbox.addEventListener("click", function(){
		
		if(this.checked){
			animationCheckbox.checked=false;
			animationCheckbox.disabled=true;
		} else {
			animationCheckbox.disabled=false;
		}
	})
}