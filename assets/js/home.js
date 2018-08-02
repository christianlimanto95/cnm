$(function() {
    var container = document.getElementsByClassName("container")[0];
    var logo = $(".logo");
    $(window).on('mousewheel DOMMouseScroll', function(event){
        if (event.originalEvent.wheelDelta > 0 || event.originalEvent.detail < 0) {
            container.scrollLeft -= 40;
        }
        else {
            container.scrollLeft += 40;
        }
    });

    container.addEventListener("scroll", function() {
        var scale = (vw - container.scrollLeft) / vw;

        if (scale >= 0.4) {
            var marginTop = (1 - scale) * 500;
            if (marginTop / vh >= 0.5) {
                marginTop = vh / 2;
            }

            var translateX = 50 + (1 - scale) * 100;
            logo.css({
                transform: "scale(" + scale + "," + scale + ") translate(-" + translateX + "%, -50%)",
                marginTop: marginTop * -1
            });
        }
    });
});