( function () {
	'use strict';

	document.querySelectorAll( '.wpds-prices__category-nav a' ).forEach( function ( link ) {
		link.addEventListener( 'click', function () {
			var target = document.querySelector( link.getAttribute( 'href' ) );

			if ( target && 'DETAILS' === target.tagName ) {
				target.open = true;
			}
		} );
	} );
}() );
