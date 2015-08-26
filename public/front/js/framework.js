// use this file for handy functions
function empty(mixed_var) {
    var undef, key, i, len;
    var emptyValues = [undef, null, false, 0, '', '0'];

    for (i = 0, len = emptyValues.length; i < len; i++) {
        if (mixed_var === emptyValues[i]) {
            return true;
        }
    }
    if (typeof mixed_var === 'object') {
        for (key in mixed_var) {
            return false;
        }
        return true;
    }
    return false;
}

function handleSmoothScroll(notForMobile, offset) {
    if (empty(notForMobile)) {
        notForMobile = true;
    }
    if (empty(offset)) {
        offset = 0;
    }

    // no smooth scroll for mobile devices
    if (notForMobile == true) {
        if (is_xs() == true || is_sm() == true) {
            return false;
        }
    }

    $('a[href*=#]:not([href=#])').on("click", function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
            || location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: (target.offset().top) - offset
                }, 1000);
                return false;
            }
        }
    });
}

// responsive check
function get_responsive_check_width() {
    return $('#responsive_check').width();
}
function is_xs() {
    if (get_responsive_check_width() == 0) {
        // Extra small devices (small to normal phones, less than 768px)
        return true;
    }
    return false;
}
function is_sm() {
    if (get_responsive_check_width() == 768) {
        // Small devices (big phones, tablets portrait, 768px and up)
        return true;
    }
    return false;
}
function is_md() {
    if (get_responsive_check_width() == 992) {
        // Medium devices (desktops, tablets landscape, 992px and up)
        return true;
    }
    return false;
}

function is_lg() {
    if (get_responsive_check_width() == 1200) {
        // Large devices (large desktops, 1200px and up)
        return true;
    }
    return false;
}