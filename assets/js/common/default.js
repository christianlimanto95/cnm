var scrollContainer = $(".scroll-container");
$(function() {
    initializeDefault();

    var scrollbarWidth = getScrollbarWidth();
    $(".container").css({
        height: "+=" + scrollbarWidth + "px"
    });
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

function getScrollbarWidth() {
    var outer = document.createElement("div");
    outer.style.visibility = "hidden";
    outer.style.width = "100px";
    outer.style.msOverflowStyle = "scrollbar"; // needed for WinJS apps

    document.body.appendChild(outer);

    var widthNoScroll = outer.offsetWidth;
    // force scrollbars
    outer.style.overflow = "scroll";

    // add innerdiv
    var inner = document.createElement("div");
    inner.style.width = "100%";
    outer.appendChild(inner);        

    var widthWithScroll = inner.offsetWidth;

    // remove divs
    outer.parentNode.removeChild(outer);

    return widthNoScroll - widthWithScroll;
}