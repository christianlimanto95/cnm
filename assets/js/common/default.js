$(function() {
    initializeDefault();

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