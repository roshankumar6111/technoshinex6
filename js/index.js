function JellyPanda() {
	var tlPanda = new TimelineLite({delay:.5});
		
		tlPanda
		
		// SET
		.set(".svg-container", { perspective: 200 })
		.set("#panda *, #btnP", {transformOrigin:"center center"})
		
		
		// JELLYPANDA MOTION
		.staggerTo("#panda *", 2, {scaleX:1.2, scaleY:.85, y:-18, rotationX: 15, rotationY: -15, rotationZ: 2, ease:Elastic.easeOut}, .015, 0.2)
		.staggerTo("#panda *", 2, {scaleX:1, scaleY:1, y:0, rotationY:0, rotationX: 0, rotationZ: 0, ease:Elastic.easeOut}, .015, 0.4)
	
		// FACE MOVING LEFT
		.to("#face", .6, {x:-20, rotationY:-20, ease:Expo.easeOut}, "b")
		.to("#head1", .6, {x:-14, rotationY:-20, ease:Expo.easeOut}, "b")
		.to("#head2", .6, {x:-6, rotationY:-15, ease:Expo.easeOut}, "b")
		.to("#ear1", .6, {y:5, rotationY:-20, ease:Expo.easeOut}, "b")
		.to("#ear2", .6, {y:5, rotationY:-20, ease:Expo.easeOut}, "b")
		
		// FACE MOVING RIGHT
		.to("#face", .6, {x:20, rotationY:20, ease:Expo.easeOut}, "c+=.1")
		.to("#head1", .6, {x:14, rotationY:25, ease:Expo.easeOut}, "c+=.1")
		.to("#head2", .6, {x:6, rotationY:15, ease:Expo.easeOut}, "c+=.1")
		.to("#ear1", .6, {y: 5, rotationY:20, ease:Expo.easeOut}, "c+=.1")
		.to("#ear2", .6, {y: 5, rotationY:20, ease:Expo.easeOut}, "c+=.1")
		
		// PANDA BACK POSITION

		.to("#panda *", 1.5, {x:0, y:0, rotationY:0}, "+=1")

		return tlPanda;
	}


var master = new TimelineMax({onComplete: onComplete});
tl = JellyPanda();
master.add(tl,0);

function onComplete() {
		tl.clear().add(JellyPanda());
		master.play(0);
	}

$(".BTNA")
	.on('mouseenter', function(){
	  
	    TweenMax.to("#btnP", .2, {scale:.9, stroke: "#FFF"},0)
	 })

	.on('mouseleave', function(){
	  	TweenMax.to("#btnP", .2, {scale:1, stroke: "#231F20"},0)
});

//
$(".BTNA").click(function(){
 	master.paused(!master.paused()); 
});