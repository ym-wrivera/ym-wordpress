/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );

				$( '.site-title a' ).css( {
					'color': to,
				} );
			}
		} );
	} );

	//Video Aside
	wp.customize( 'home_video_aside', function( value ) {
		if ( '' === $( '.home-video' ).children( '.home-video-aside' ) ) {
			$( '.home-video' ).append( '<div class="home-video-aside"></div>' );
		}
		value.bind( function( to ) {
			$( '.home-video-aside' ).text( to );
		} );
	} );

	//Home Hero Title
	wp.customize( 'home_hero_title', function( value ) {
		if ( '' === $( '.hero-section' ).children( '.hero-title' ) ) {
			$( '.hero-section' ).prepend( '<h3 class="hero-title"></h3>' );
		}
		value.bind( function( to ) {
			$( '.hero-title' ).text( to );
		} );
	} );

	//Home Hero Content
	wp.customize( 'home_hero_content', function( value ) {
		if ( '' === $( '.hero-section' ).children( '.hero-content' ) ) {
			$( '.hero-section' ).append( '<div class="hero-content"></div>' );
		}
		value.bind( function( to ) {
			$( '.hero-content' ).text( to );
		} );
	} );

	// Header position.
	wp.customize( 'header_position', function( value ) {
		value.bind( function( to ) {
			if ( 'scroll' === to ) {
				$( '.header-bg' ).css( {
					'background-attachment': 'scroll',
					'background-size'	   : 'cover',
				} );
			} else {
				$( '.header-bg' ).css( {
					'background-attachment': 'fixed',
					'background-size'	   : '100%',
					'background-position'  : 'top center',
				} );
			}
		} );
	} );
} )( jQuery );
