
/* onineevent1 */

(function() {
	var triggerBttn = document.getElementById( 'trigger-overlayonline1' ),
		overlayonline1 = document.querySelector( 'div.overlayonline1' ),
		closeBttn = overlayonline1.querySelector( 'button.overlayonline1-close' );
		transEndEventNames = {
			'WebkitTransition': 'webkitTransitionEnd',
			'MozTransition': 'transitionend',
			'OTransition': 'oTransitionEnd',
			'msTransition': 'MSTransitionEnd',
			'transition': 'transitionend'
		},
		transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
		support = { transitions : Modernizr.csstransitions };
		s = Snap( overlayonline1.querySelector( 'svg' ) ), 
		path = s.select( 'path' ),
		steps = overlayonline1.getAttribute( 'data-steps' ).split(';'),
		stepsTotal = steps.length;

	function toggleOverlayonline1() {
		if( classie.has( overlayonline1, 'open' ) ) {
			var pos = stepsTotal-1;
			classie.remove( overlayonline1, 'open' );
			classie.add( overlayonline1, 'close' );
			
			var onEndTransitionFn = function( ev ) {
					classie.remove( overlayonline1, 'close' );
				},
				nextStep = function( pos ) {
					pos--;
					if( pos < 0 ) return;
					path.animate( { 'path' : steps[pos] }, 60, mina.linear, function() { 
						if( pos === 0 ) {
							onEndTransitionFn();
						}
						nextStep(pos);
					} );
				};

			nextStep(pos);
		}
		else if( !classie.has( overlayonline1, 'close' ) ) {
			var pos = 0;
			classie.add( overlayonline1, 'open' );
			
			var nextStep = function( pos ) {
				pos++;
				if( pos > stepsTotal - 1 ) return;
				path.animate( { 'path' : steps[pos] }, 60, mina.linear, function() { nextStep(pos); } );
			};

			nextStep(pos);
		}
	}

	triggerBttn.addEventListener( 'click', toggleOverlayonline1 );
	closeBttn.addEventListener( 'click', toggleOverlayonline1 );
})();
/* onlineevent2 */
/* 
(function() {
	var triggerBttn = document.getElementById( 'trigger-overlayonline2' ),
		overlayonline2 = document.querySelector( 'div.overlayonline2' ),
		closeBttn = overlayonline2.querySelector( 'button.overlayonline2-close' );
		transEndEventNames = {
			'WebkitTransition': 'webkitTransitionEnd',
			'MozTransition': 'transitionend',
			'OTransition': 'oTransitionEnd',
			'msTransition': 'MSTransitionEnd',
			'transition': 'transitionend'
		},
		transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
		support = { transitions : Modernizr.csstransitions };
		s = Snap( overlayonline2.querySelector( 'svg' ) ), 
		path = s.select( 'path' ),
		steps = overlayonline2.getAttribute( 'data-steps' ).split(';'),
		stepsTotal = steps.length;

	function toggleOverlayonline2() {
		if( classie.has( overlayonline2, 'open' ) ) {
			var pos = stepsTotal-1;
			classie.remove( overlayonline2, 'open' );
			classie.add( overlayonline2, 'close' );
			
			var onEndTransitionFn = function( ev ) {
					classie.remove( overlayonline2, 'close' );
				},
				nextStep = function( pos ) {
					pos--;
					if( pos < 0 ) return;
					path.animate( { 'path' : steps[pos] }, 60, mina.linear, function() { 
						if( pos === 0 ) {
							onEndTransitionFn();
						}
						nextStep(pos);
					} );
				};

			nextStep(pos);
		}
		else if( !classie.has( overlayonline2, 'close' ) ) {
			var pos = 0;
			classie.add( overlayonline2, 'open' );
			
			var nextStep = function( pos ) {
				pos++;
				if( pos > stepsTotal - 1 ) return;
				path.animate( { 'path' : steps[pos] }, 60, mina.linear, function() { nextStep(pos); } );
			};

			nextStep(pos);
		}
	}

	triggerBttn.addEventListener( 'click', toggleOverlayonline2 );
	closeBttn.addEventListener( 'click', toggleOverlayonline2 );
})(); */