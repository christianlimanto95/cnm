var container = document.getElementsByClassName("container")[0];
$(function() {
    var logo = $(".logo");
    $(window).on('mousewheel DOMMouseScroll', function(event){
        if (event.originalEvent.wheelDelta > 0 || event.originalEvent.detail < 0) {
            container.scrollLeft -= 40;
        }
        else {
            container.scrollLeft += 40;
        }
    });

    /*container.addEventListener("scroll", function() {
        var scale = (vw - container.scrollLeft) / vw;

        if (scale >= 0.4) {
            var marginTop = (1 - scale) * 500;
            if (marginTop / vh >= 0.8) {
                marginTop = vh * 4 / 5;
            }

            var translateX = 50 + (1 - scale) * 100;
            logo.css({
                transform: "scale(" + scale + "," + scale + ") translate(-" + translateX + "%, -50%)",
                marginTop: marginTop * -1
            });
        }
    });*/

    container.addEventListener("scroll", checkShowLogo);

    $(".header-menu").on("click", function(e) {
        e.preventDefault();
        var menu = $(this).attr("data-menu");
        $(".section[data-menu='" + menu + "']").velocity("scroll", {
            duration: 500,
            axis: "x",
            container: container
        });
    });
});

function checkShowLogo() {
    if (container.scrollLeft >= vw / 2) {
        $(".logo-header").addClass("show");
        container.removeEventListener("scroll", checkShowLogo);
        container.addEventListener("scroll", checkHideLogo);
    }
}

function checkHideLogo() {
    if (container.scrollLeft < vw / 2) {
        $(".logo-header").removeClass("show");
        container.removeEventListener("scroll", checkHideLogo);
        container.addEventListener("scroll", checkShowLogo);
    }
}