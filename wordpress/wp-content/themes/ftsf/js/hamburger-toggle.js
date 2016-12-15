window.onload = init();

/*
document.addEventListener( 'DOMContentLoaded', function () {
    init();
}, false );
*/

function init(){
  document.getElementsByClassName("menu-toggle")[0].onclick = toggleContactHamburger;
  // console.log("click");
}

function show(){
  nav = document.getElementsByClassName('menu')[0];
  if( !nav.classList.contains('active') ){
    nav.classList.add("active");
  }
  else {
    nav.classList.remove('active');
  }
}


/*
function toggleContactHamburger(){
  var contactOpen = false;
  if (document.getElementById("mySidenav").style.width === "320px"){
    toggleContactForm();
    contactOpen = true;
  }
  if(document.getElementsByClassName("project-sidenav")[0].style.width === "320px"){
      var registerOpen = true;
  }
  if(contactOpen === true){
    setTimeout(function(){show();},600);
  }else if(contactOpen === false){
    show();
  }

  if(registerOpen === true){
    setTimeout(function(){show();},600);
  } else if(registerOpen === false){
    show();
  }
  
}
*/

function toggleContactHamburger(){
    var sideNav = document.getElementsByClassName("sidenav")[0];
    var contactContent = document.getElementsByClassName("contact-content")[0];
    var projectSideNav = document.getElementsByClassName("project-sidenav")[0];

    if (sideNav.classList.contains("open")) {
      toggleContactForm();
      setTimeout(function(){show();},600);
    }

    else if (projectSideNav.classList.contains("open")) {
      toggleRegisterProject();
      setTimeout(function(){show();},600);
    } 
    
    else {
        show();
    }

}

