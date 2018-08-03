var scrollContainer = $(".scroll-container");
$(function() {
    initializeDefault();

    $(".container").on("scroll", firstScroll);

    $(window).resize(function() {
        initializeDefault();
    });
});

function initializeDefault() {
    vw = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    vh = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
    if (vw < 1025) {
        isMobile = true;
        if (vw >= 768) {
            isTablet = true;
        } else {
            isTablet = false;
        }
    } else {
        isMobile = false;
    }
}

function firstScroll() {
    scrollContainer.addClass("hide");
    scrollContainer.one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(e) {
        scrollContainer.addClass("hidden");
    });
    $(".container").off("scroll", firstScroll);
}