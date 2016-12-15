/*
window.onload = init();

function toggleContactForm() {
    if (document.getElementsByClassName("sidenav")[0].style.width === "0px")
    {
        document.getElementsByClassName("sidenav")[0].style.width = "320px";
        document.getElementsByClassName("contact-content")[0].style.width = "90%";
        document.getElementsByClassName("sidenav")[0].style.overflow = "visible";
    }
    else
    {
        document.getElementsByClassName("sidenav")[0].style.width = "0px";
        document.getElementsByClassName("contact-content")[0].style.width = "0";
        document.getElementsByClassName("sidenav")[0].style.overflow = "hidden";
    }
}



function init(){
    document.getElementsByClassName("sidenav")[0].style.width = "0px";
    document.getElementsByClassName("contact-content")[0].style.width = "0%";
    document.getElementsByClassName("sidenav")[0].style.overflow = "hidden";
}
*/



function toggleContactForm() {
    var sideNav = document.getElementsByClassName("sidenav")[0];
    var contactContent = document.getElementsByClassName("contact-content")[0];
    if (sideNav.classList.contains("close")) {
        sideNav.classList.remove("close");
        sideNav.classList.add("open");
    } else if (sideNav.classList.contains("open")) {
        sideNav.classList.remove("open");
        sideNav.classList.add("close");
    }
}