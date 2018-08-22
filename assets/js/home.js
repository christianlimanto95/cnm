var container = document.getElementsByClassName("container")[0];
var section2Left = vw / 2, section3Left = vw + vw / 2, section4Left = vw * 2 + vw / 2, section5Left = vw * 3 + vw / 2, section6Left = vw * 4 + vw / 2, section7Left = vw * 5 + vw / 2, section8Left = vw * 6 + vw / 2;
var scrollPosition = 0, isScrolling = false;
var faqInner, faqHasScrollbar, whatInner, whatHasScrollbar;

$(function() {
    var logo = $(".logo");
    if (!isMobile) {
        faqInner = $(".faq-inner")[0];
        faqHasScrollbar = faqInner.scrollHeight > faqInner.clientHeight;
        if (faqHasScrollbar) {
            var faq = $(".faq");
            faq.on("mousewheel DOMMouseScroll", function(e) {
                e.stopPropagation();
            });

            var faqHeight = faq.height();
            var faqScrollHeight = faq.prop("scrollHeight");
            faq.on("scroll", function() {
                if ($(this).scrollTop() + faqHeight >= faqScrollHeight) {
                    faq.off("mousewheel DOMMouseScroll");
                } else if ($(this).scrollTop() == 0) {
                    faq.off("mousewheel DOMMouseScroll");
                }
            });
        }

        whatInner = $(".what-we-do-inner")[0];
        whatHasScrollbar = whatInner.scrollHeight > whatInner.clientHeight;
        if (whatHasScrollbar) {
            var whatWeDo = $(".what-we-do-inner");
            whatWeDo.on("mousewheel DOMMouseScroll", function(e) {
                e.stopPropagation();
            });

            var whatHeight = whatWeDo.height();
            var whatScrollHeight = whatWeDo.prop("scrollHeight");
            whatWeDo.on("scroll", function() {
                if ($(this).scrollTop() + whatHeight >= whatScrollHeight) {
                    whatWeDo.off("mousewheel DOMMouseScroll");
                } else if ($(this).scrollTop() == 0) {
                    whatWeDo.off("mousewheel DOMMouseScroll");
                }
            });
        }

        $(window).on('mousewheel DOMMouseScroll', mouseWheelListener);
        $(window).on("keydown", keydownListener);
    }

    scrollContainer.one("click", function() {
        scrollPosition = 1;
        setScrollTo(1);
    });

    $(".logo-header").on("click", function() {
        scrollPosition = 0;
        setScrollTo(0);
        if (body.hasClass("menu-opened") || body.hasClass("menu-opening")) {
            closeMenuMobile();
        }
    });

    container.addEventListener("scroll", checkShowLogo);
    var subtitle1 = $(".subtitle[data-menu='0']"), subtitle2 = $(".subtitle[data-menu='1']"), subtitle3 = $(".subtitle[data-menu='2']"), subtitle4 = $(".subtitle[data-menu='3']"), subtitle5 = $(".subtitle[data-menu='4']"), subtitle6 = $(".subtitle[data-menu='5']"), subtitle7 = $(".subtitle[data-menu='6']"), subtitle8 = $(".subtitle[data-menu='7']");
    
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
        } else if (container.scrollLeft >= section5Left && container.scrollLeft < section6Left) {
            if (!subtitle5.hasClass("show")) {
                $(".subtitle.show").removeClass("show");
                subtitle5.addClass("show");
            }
        } else if (container.scrollLeft >= section6Left && container.scrollLeft < section7Left) {
            if (!subtitle6.hasClass("show")) {
                $(".subtitle.show").removeClass("show");
                subtitle6.addClass("show");
            }
        } else if (container.scrollLeft >= section7Left && container.scrollLeft < section8Left) {
            if (!subtitle7.hasClass("show")) {
                $(".subtitle.show").removeClass("show");
                subtitle7.addClass("show");
            }
        } else {
            if (!subtitle8.hasClass("show")) {
                $(".subtitle.show").removeClass("show");
                subtitle8.addClass("show");
            }
        }
    });

    $(".link").on("click", function(e) {
        e.stopPropagation();
        var menuName = $(this).attr("data-menu-name");
        var menu = $(".header-menu[data-menu-name='" + menuName + "']").attr("data-menu");
        scrollPosition = parseInt(menu);
        setScrollTo(scrollPosition);
    });

    $(".header-menu").on("click", function(e) {
        e.preventDefault();
        var menu = $(this).attr("data-menu");
        scrollPosition = parseInt(menu);
        setScrollTo(scrollPosition);
        closeMenuMobile();
    });

    $(".header-menu-container").on("click", function() {
        if (isMobile) {
            closeMenuMobile();
        }
    });

    $(window).on("resize", function() {
        if (!isMobile) {
            $(window).on('mousewheel DOMMouseScroll', mouseWheelListener);
        } else {
            $(window).off('mousewheel DOMMouseScroll', mouseWheelListener);
        }

        section2Left = vw / 2, section3Left = vw + vw / 2, section4Left = vw * 2 + vw / 2, section5Left = vw * 3 + vw / 2, section6Left = vw * 4 + vw / 2, section7Left = vw * 5 + vw / 2, section8Left = vw * 6 + vw / 2;
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
            if (scrollPosition < 7) {
                scrollPosition++;
            }
        }

        setScrollTo(scrollPosition);
    }
}

function keydownListener(e) {
    if (!isScrolling) {
        isScrolling = true;
        if (e.which == 37) {
            if (scrollPosition > 0) {
                scrollPosition--;
            }
        } else if (e.which == 39) {
            if (scrollPosition < 7) {
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

            if (faqHasScrollbar) {
                var faq = $(".faq");
                faq.on("mousewheel DOMMouseScroll", function(e) {
                    e.stopPropagation();
                });

                /*var faqHeight = faq.height();
                var faqScrollHeight = faq.prop("scrollHeight");
                if (faq.scrollTop() + faqHeight >= faqScrollHeight) {
                    faq.off("mousewheel DOMMouseScroll");
                } else if (faq.scrollTop() == 0) {
                    faq.off("mousewheel DOMMouseScroll");
                }*/
            }

            if (whatHasScrollbar) {
                var whatWeDo = $(".what-we-do-inner");
                whatWeDo.on("mousewheel DOMMouseScroll", function(e) {
                    e.stopPropagation();
                });

                /*var whatHeight = whatWeDo.height();
                var whatScrollHeight = whatWeDo.prop("scrollHeight");
                if (whatWeDo.scrollTop() + whatHeight >= whatScrollHeight) {
                    whatWeDo.off("mousewheel DOMMouseScroll");
                } else if (whatWeDo.scrollTop() == 0) {
                    whatWeDo.off("mousewheel DOMMouseScroll");
                }*/
            }
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