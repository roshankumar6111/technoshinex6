var anim;

var colors = ["#1976D2", "#8BC34A", "#2196F3", "#757575", "#FBC02D", "#F44336"];//"#212121", "#FFEB3B"
//var colors = ["#0D47A1", "#2196F3"];

function animation() {
    this.init();

    this.black = true;
    this.frames = 0;
    this.fps = 40;

    this.shapes = [];
    this.newCircle(1.5);
    this.newCircle(1);
    this.newCircle(0.5);
    this.newCircle(0);

    this.animate = true;

};
animation.prototype.init = function () {
    var canvas = document.getElementById("slide1bg");
    this.canvas = canvas;

    //this.canvas.width = window.innerWidth;
    //this.canvas.height = window.innerHeight;
};
animation.prototype.update = function () {
    if (!this.animate)
        return;

    this.shapes.forEach(function (shape, index, array) {
        if (!shape.update()) {
            array.splice(index, 1);
            //console.log(shape.div.offsetWidth,window.innerWidth);
            this.canvas.removeChild(shape.div);
        }
    }, this);

    //spawn new circles per fps
    this.frames += 1;
    if (this.frames > this.fps) {
        this.frames -= this.fps;

        this.newCircle();
    }
};
animation.prototype.newCircle = function (size) {
    size=size||0;
    
    this.black = !this.black;
    var color = this.black ? "black" : colors[rangeint(colors.length, 0)];

    var c = new Circle(color, size);
    this.shapes.push(c);
    this.canvas.appendChild(c.div);
};
animation.prototype.draw = function () {

};

function range(max, min) {
    return Math.random() * (max - min) + min;
}

function rangeint(max, min) {
    return Math.floor(Math.random() * (max - min)) + min;
}

function Circle(color, size) {
    this.div = document.createElement('div');
    this.div.classList.add("bgcircle");
    this.div.style.backgroundColor = color;

    this.size = size;
    this.sizev = 0.01;
};
Circle.prototype.update = function () {
    //console.log(this.div.offsetWidth);
    //console.log(window.innerWidth);*
    //if (this.div.offsetWidth > 2*window.innerWidth)
    this.size += this.sizev;
    if (this.size > 2)
        return false;

    var diameter = this.size * Math.max(window.innerWidth, window.innerHeight);

    //console.log(this.div.style.width);
    this.div.style.width = diameter + "px";
    this.div.style.height = diameter + "px";

    return true;
};
Circle.prototype.draw = function (canvas) {};

function MainLoop() {
    anim.update();
    anim.draw();
    requestAnimFrame(MainLoop);
}

window.requestAnimFrame = (function () {
    return window.requestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        function (callback) {
            window.setTimeout(callback, 1000 / 60);
        };
})();

anim = new animation();
//window.addEventListener("resize", anim.init, true);

MainLoop();