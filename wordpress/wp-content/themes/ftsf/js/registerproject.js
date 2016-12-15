/*
window.onload = init();

function toggleRegisterProject() {
    if (document.getElementsByClassName("project-sidenav")[0].style.width === "0px")
    {
        document.getElementsByClassName("project-sidenav")[0].style.width = "320px";
        document.getElementsByClassName("project-sidenav")[0].style.overflow = "visible";
    }
    else
    {
        document.getElementsByClassName("project-sidenav")[0].style.width = "0px";
        document.getElementsByClassName("project-sidenav")[0].style.overflow = "hidden";
    }
}

function init(){
    document.getElementsByClassName("project-sidenav")[0].style.width = "0px";
    document.getElementsByClassName("project-sidenav")[0].style.overflow = "hidden";
}
*/

function toggleRegisterProject() {
    var projectSideNav = document.getElementsByClassName("project-sidenav")[0];
    if (projectSideNav.classList.contains("close")) {
        projectSideNav.classList.remove("close");
        projectSideNav.classList.add("open");
    } else if (projectSideNav.classList.contains("open")) {
        projectSideNav.classList.remove("open");
        projectSideNav.classList.add("close");
    }
};