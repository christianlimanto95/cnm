$(function() {
    var container = document.getElementsByClassName("container")[0];
    $(window).on('mousewheel DOMMouseScroll', function(event){
        if (event.originalEvent.wheelDelta > 0 || event.originalEvent.detail < 0) {
            container.scrollLeft -= 40;
        }
        else {
            container.scrollLeft += 40;
        }
    });
});