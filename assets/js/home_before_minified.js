var container = document.getElementsByClassName("container")[0];
var section2Left = vw / 2, section3Left = vw + vw / 2, section4Left = vw * 2 + vw / 2, section5Left = vw * 3 + vw / 2;
var scrollPosition = 0, isScrolling = false;

$(function() {
    var logo = $(".logo");
    if (!isMobile) {
        $(window).on('mousewheel DOMMouseScroll', mouseWheelListener);
    }

    scrollContainer.one("click", function() {
        scrollPosition = 1;
        setScrollTo(1);
    });

    $(".logo-header").on("click", function() {
        scrollPosition = 0;
        setScrollTo(0);
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
    var subtitle1 = $(".subtitle[data-menu='0']"), subtitle2 = $(".subtitle[data-menu='1']"), subtitle3 = $(".subtitle[data-menu='2']"), subtitle4 = $(".subtitle[data-menu='3']"), subtitle5 = $(".subtitle[data-menu='4']");
    
    container.addEventListener("scroll", function() {
        if (container.scrollLeft >= 0 && container.scrollLeft < section2Left) {
            if (!subtitle1.hasClass("show")) {
                $(".subtitle.show").removeClass("show");
                subtitle1.addClass("show");
            }
        } else if (container.scrollLeft >= section2Left && container.scrollLeft < section3Left) {
            if (!subtitle2.hasClass("show")) {
                $(".subtitle.show").removeClass("show");
                subtitle2.addClass("show");
            }
        } else if (container.scrollLeft >= section3Left && container.scrollLeft < section4Left) {
            if (!subtitle3.hasClass("show")) {
                $(".subtitle.show").removeClass("show");
                subtitle3.addClass("show");
            }
        } else if (container.scrollLeft >= section4Left && container.scrollLeft < section5Left) {
            if (!subtitle4.hasClass("show")) {
                $(".subtitle.show").removeClass("show");
                subtitle4.addClass("show");
            }
        } else {
            if (!subtitle5.hasClass("show")) {
                $(".subtitle.show").removeClass("show");
                subtitle5.addClass("show");
            }
        }
    });

    $(".header-menu").on("click", function(e) {
        e.preventDefault();
        var menu = $(this).attr("data-menu");
        scrollPosition = parseInt(menu);
        setScrollTo(scrollPosition);
    });

    $(window).on("resize", function() {
        if (!isMobile) {
            $(window).on('mousewheel DOMMouseScroll', mouseWheelListener);
        } else {
            $(window).off('mousewheel DOMMouseScroll', mouseWheelListener);
        }

        section2Left = vw / 2, section3Left = vw + vw / 2, section4Left = vw * 2 + vw / 2, section5Left = vw * 3 + vw / 2;
    });
});

function mouseWheelListener(event) {
    if (!isScrolling) {
        isScrolling = true;
        if (event.originalEvent.wheelDelta > 0 || event.originalEvent.detail < 0) {
            if (scrollPosition > 0) {
                scrollPosition--;
            }
        }
        else {
            if (scrollPosition < 4) {
                scrollPosition++;
            }
        }

        setScrollTo(scrollPosition);
    }
}

function setScrollTo(number) {
    isScrolling = true;
    $(".section[data-menu='" + number + "']").velocity("scroll", {
        duration: 500,
        axis: "x",
        container: container,
        complete: function() {
            isScrolling = false;
        }
    });
}

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