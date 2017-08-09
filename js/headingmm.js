$.fn.isOnScreen = function (x, y) {

    if (x == null || typeof x == 'undefined') x = 1;
    if (y == null || typeof y == 'undefined') y = 1;

    var win = $(window);

    var viewport = {
        top: win.scrollTop(),
        left: win.scrollLeft()
    };
    viewport.right = viewport.left + win.width();
    viewport.bottom = viewport.top + win.height();

    var height = this.outerHeight();
    var width = this.outerWidth();

    if (!width || !height) {
        return false;
    }

    var bounds = this.offset();
    bounds.right = bounds.left + width;
    bounds.bottom = bounds.top + height;

    var visible = (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));

    if (!visible) {
        return false;
    }

    var deltas = {
        top: Math.min(1, (bounds.bottom - viewport.top) / height),
        bottom: Math.min(1, (viewport.bottom - bounds.top) / height),
        left: Math.min(1, (bounds.right - viewport.left) / width),
        right: Math.min(1, (viewport.right - bounds.left) / width)
    };

    //console.log(deltas);

    return (deltas.left * deltas.right) >= x && (deltas.top * deltas.bottom) >= y;

};

function getTransform(el) {
    var style = getComputedStyle(el);
    var transform = style.transform || style.webkitTransform || style.mozTransform;
    transform = (transform == "none" ? "" : transform);

    return transform;
}

var robjs = null;
window.onload = function () {
    var els = document.querySelectorAll('.rotatexy');
    if (els.length) {
        robjs = [];
        for (var i = 0; i < els.length; i++) {
            //els.forEach(function (el) {
            var el = els[i];
            robjs.push({
                el: el,
                jqel: $(el),
                visible: $(el).isOnScreen(0.5, 0.5),
                transform: getTransform(el)
            });
            //});
        }

        window.onmousemove = function (ev) {
            if (robjs == null || robjs.length == 0) {
                return;
            }

            var x = ev.clientX,
                y = ev.clientY,
                width = window.innerWidth,
                height = window.innerHeight;

            var midx = width / 2,
                midy = height / 2;

            var xdeg = 30,
                ydeg = 30;

            var rotatex = ((x - midx) / midx) * xdeg,
                rotatey = -((y - midy) / midy) * ydeg;

            for (var i = 0; i < robjs.length; i++) {
                var robj = robjs[i];
                //robjs.forEach(function (robj) {
                if (robj.visible) {
                    robj.el.style.transform = robj.transform +
                        " rotateY(" + rotatex + "deg)" +
                        " rotateX(" + rotatey + "deg)";
                    robj.el.style.mozTransform = robj.transform +
                        " rotateY(" + rotatex + "deg)" +
                        " rotateX(" + rotatey + "deg)";
                } else if (robj.jqel.isOnScreen(0.5, 0.5)) {
                    robj.transform = getTransform(robj.el);
                    robj.visible = true;
                }
                //});
            }
        }
    }
}