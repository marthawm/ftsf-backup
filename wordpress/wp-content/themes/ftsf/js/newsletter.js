document.addEventListener("DOMContentLoaded", function(){
    var firstTime = document.cookie.search("first_time");
    if(firstTime) {
        document.cookie = "first_time=1";
        setTimeout(showNewsletter,2000);
    }
});

function showNewsletter() {
  document.getElementsByClassName("newsletter-block")[0].style.display = 'block';
}
function closeNewsletter() {
   document.getElementsByClassName("newsletter-block")[0].style.display = 'none';
}