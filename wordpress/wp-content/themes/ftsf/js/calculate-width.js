setInterval(calculatePageWidth,10);

function calculatePageWidth() {
    var homeWidth = parseInt(window.getComputedStyle(document.getElementsByClassName("home")[0], null).width);
    var gridWidth = parseInt(window.getComputedStyle(document.getElementsByClassName("grid-section")[0], null).width);
    var footerWidth = parseInt(window.getComputedStyle(document.getElementsByClassName("footer")[0], null).width);
    document.getElementsByClassName("main-container")[0].style.width = (homeWidth + gridWidth + footerWidth + 1) + "px";
}