window.onload = function(){
    var Q = jQuery.noConflict();
    Q(function() {
        Q("body").mousewheel(function(event, delta) {
            if(document.getElementsByTagName("body")[0].style.overflowX !== "hidden"){
                this.scrollLeft -= (delta * 20);
                event.preventDefault();
            }
        });
    });
};
