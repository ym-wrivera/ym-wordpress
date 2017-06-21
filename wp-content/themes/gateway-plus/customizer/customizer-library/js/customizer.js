/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

/*--------------------------------------------------------------
>>> TABLE OF CONTENTS:
----------------------------------------------------------------

1.0 Typography Global
	1.1 Typography: H1
	1.2 Typography: H2
	1.3 Typography: H3
	1.4 Typography: H4
	1.5 Typography: H5
	1.6 Typography: H6
	1.7 Typography: Site Title
	1.8 Typography: Site Tagline
	1.9 Typography: Navigation
	1.10 Typography: Sidebar Widget Titles
	1.11 Typography: Sidebar Widget Body
	1.12 Typography: Footer Widget Title
	1.13 Typography: Footer Widget Body
	1.14 Typography: Copyright

3.0 Colors Panel
	3.1 Colors: Sitewide
	3.2 Colors: Navigation
	3.3 Colors: Site Title & Tagline
	3.4 Colors: Inner Header
	3.5 Colors: Inner Sidebar
	3.6 Colors: Footer

4.0 Home
	4.1 Background Image
	4.2 Slider
	4.3 Featured Posts
5.0 Header
6.0 Blog
7.0 Footer

--------------------------------------------------------------*/

( function( $ ) {

/*--------------------------------------------------------------
1.0 Typography: Global
--------------------------------------------------------------*/
	// Font Family
	wp.customize( 'type-global-font-family', function( value ) {
		value.bind( function( to ) {
			$( 'body, p, button, .button' ).css( 'font-family', to );
		} );
	} );

	// Font Size
	wp.customize( 'type-global-font-size', function( value ) {
		value.bind( function( to ) {
			$( 'body, p, button, .button' ).css( 'font-size', to );
		} );
	} );

	// Font Weight
	wp.customize( 'type-global-font-weight', function( value ) {
		value.bind( function( to ) {
			$( 'body, p, button, .button' ).css( 'font-weight', to );
		} );
	} );

	// Font Style
	wp.customize( 'type-global-font-style', function( value ) {
		value.bind( function( to ) {
			$( 'body, p, button, .button' ).css( 'font-style', to );
		} );
	} );

	// Text Transform
	wp.customize( 'type-global-text-transform', function( value ) {
		value.bind( function( to ) {
			$( 'body, p, button, .button' ).css( 'text-transform', to );
		} );
	} );

	// Line Height
	wp.customize( 'type-global-line-height', function( value ) {
		value.bind( function( to ) {
			$( 'body, p, button, .button' ).css( 'line-height', to );
		} );
	} );

	// Letter Spacing
	wp.customize( 'type-global-letter-spacing', function( value ) {
		value.bind( function( to ) {
			$( 'body, p, button, .button' ).css( 'letter-spacing', to );
		} );
	} );

	// Word Spacing
	wp.customize( 'type-global-word-spacing', function( value ) {
		value.bind( function( to ) {
			$( 'body, p, button, .button' ).css( 'word-spacing', to );
		} );
	} );

	// Link Font Weight
	wp.customize( 'type-global-links-weight', function( value ) {
		value.bind( function( to ) {
			$( 'a' ).css( 'font-weight', to );
		} );
	} );

	// Link Underline
	wp.customize( 'type-global-links-underline', function( value ) {
		value.bind( function( to ) {
			$( 'a' ).css( 'text-decoration', to );
		} );
	} );

/*--------------------------------------------------------------
1.1 Typography: H1
--------------------------------------------------------------*/
	wp.customize( 'type-h1-font-family', function( value ) {
		value.bind( function( to ) {
			$( 'h1' ).css( 'font-family', to );
		} );
	} );

	// H1: Font Size
	wp.customize( 'type-h1-font-size', function( value ) {
		value.bind( function( to ) {
			$( 'h1' ).css( 'font-size', to );
		} );
	} );

	// H1: Font Weight
	wp.customize( 'type-h1-font-weight', function( value ) {
		value.bind( function( to ) {
			$( 'h1' ).css( 'font-weight', to );
		} );
	} );

	// H1: Font Style
	wp.customize( 'type-h1-font-style', function( value ) {
		value.bind( function( to ) {
			$( 'h1' ).css( 'font-style', to );
		} );
	} );

	// H1: Text Transform
	wp.customize( 'type-h1-text-transform', function( value ) {
		value.bind( function( to ) {
			$( 'h1' ).css( 'text-transform', to );
		} );
	} );

	// H1: Line Height
	wp.customize( 'type-h1-line-height', function( value ) {
		value.bind( function( to ) {
			$( 'h1' ).css( 'line-height', to );
		} );
	} );

	// H1: Letter Spacing
	wp.customize( 'type-h1-letter-spacing', function( value ) {
		value.bind( function( to ) {
			$( 'h1' ).css( 'letter-spacing', to );
		} );
	} );

	// H1: Word Spacing
	wp.customize( 'type-h1-word-spacing', function( value ) {
		value.bind( function( to ) {
			$( 'h1' ).css( 'word-spacing', to );
		} );
	} );

/*--------------------------------------------------------------
1.2 Typography: H2
--------------------------------------------------------------*/
	// H2: Font Family
	wp.customize( 'type-h2-font-family', function( value ) {
		value.bind( function( to ) {
			$( 'h2' ).css( 'font-family', to );
		} );
	} );

	// H2: Font Size
	wp.customize( 'type-h2-font-size', function( value ) {
		value.bind( function( to ) {
			$( 'h2' ).css( 'font-size', to );
		} );
	} );

	// H2: Font Weight
	wp.customize( 'type-h2-font-weight', function( value ) {
		value.bind( function( to ) {
			$( 'h2' ).css( 'font-weight', to );
		} );
	} );

	// H2: Font Style
	wp.customize( 'type-h2-font-style', function( value ) {
		value.bind( function( to ) {
			$( 'h2' ).css( 'font-style', to );
		} );
	} );

	// H2: Text Transform
	wp.customize( 'type-h2-text-transform', function( value ) {
		value.bind( function( to ) {
			$( 'h2' ).css( 'text-transform', to );
		} );
	} );

	// H2: Line Height
	wp.customize( 'type-h2-line-height', function( value ) {
		value.bind( function( to ) {
			$( 'h2' ).css( 'line-height', to );
		} );
	} );

	// H2: Letter Spacing
	wp.customize( 'type-h2-letter-spacing', function( value ) {
		value.bind( function( to ) {
			$( 'h2' ).css( 'letter-spacing', to );
		} );
	} );

	// H2: Word Spacing
	wp.customize( 'type-h2-word-spacing', function( value ) {
		value.bind( function( to ) {
			$( 'h2' ).css( 'word-spacing', to );
		} );
	} );

/*--------------------------------------------------------------
1.3 Typography: H3
--------------------------------------------------------------*/
	// h3: Font Family
	wp.customize( 'type-h3-font-family', function( value ) {
		value.bind( function( to ) {
			$( 'h3' ).css( 'font-family', to );
		} );
	} );

	// h3: Font Size
	wp.customize( 'type-h3-font-size', function( value ) {
		value.bind( function( to ) {
			$( 'h3' ).css( 'font-size', to );
		} );
	} );

	// h3: Font Weight
	wp.customize( 'type-h3-font-weight', function( value ) {
		value.bind( function( to ) {
			$( 'h3' ).css( 'font-weight', to );
		} );
	} );

	// h3: Font Style
	wp.customize( 'type-h3-font-style', function( value ) {
		value.bind( function( to ) {
			$( 'h3' ).css( 'font-style', to );
		} );
	} );

	// h3: Text Transform
	wp.customize( 'type-h3-text-transform', function( value ) {
		value.bind( function( to ) {
			$( 'h3' ).css( 'text-transform', to );
		} );
	} );

	// h3: Line Height
	wp.customize( 'type-h3-line-height', function( value ) {
		value.bind( function( to ) {
			$( 'h3' ).css( 'line-height', to );
		} );
	} );

	// h3: Letter Spacing
	wp.customize( 'type-h3-letter-spacing', function( value ) {
		value.bind( function( to ) {
			$( 'h3' ).css( 'letter-spacing', to );
		} );
	} );

	// h3: Word Spacing
	wp.customize( 'type-h3-word-spacing', function( value ) {
		value.bind( function( to ) {
			$( 'h3' ).css( 'word-spacing', to );
		} );
	} );

/*--------------------------------------------------------------
1.4 Typography: H4
--------------------------------------------------------------*/
	// h4: Font Family
	wp.customize( 'type-h4-font-family', function( value ) {
		value.bind( function( to ) {
			$( 'h4' ).css( 'font-family', to );
		} );
	} );

	// h4: Font Size
	wp.customize( 'type-h4-font-size', function( value ) {
		value.bind( function( to ) {
			$( 'h4' ).css( 'font-size', to );
		} );
	} );

	// h4: Font Weight
	wp.customize( 'type-h4-font-weight', function( value ) {
		value.bind( function( to ) {
			$( 'h4' ).css( 'font-weight', to );
		} );
	} );

	// h4: Font Style
	wp.customize( 'type-h4-font-style', function( value ) {
		value.bind( function( to ) {
			$( 'h4' ).css( 'font-style', to );
		} );
	} );

	// h4: Text Transform
	wp.customize( 'type-h4-text-transform', function( value ) {
		value.bind( function( to ) {
			$( 'h4' ).css( 'text-transform', to );
		} );
	} );

	// h4: Line Height
	wp.customize( 'type-h4-line-height', function( value ) {
		value.bind( function( to ) {
			$( 'h4' ).css( 'line-height', to );
		} );
	} );

	// h4: Letter Spacing
	wp.customize( 'type-h4-letter-spacing', function( value ) {
		value.bind( function( to ) {
			$( 'h4' ).css( 'letter-spacing', to );
		} );
	} );

	// h4: Word Spacing
	wp.customize( 'type-h4-word-spacing', function( value ) {
		value.bind( function( to ) {
			$( 'h4' ).css( 'word-spacing', to );
		} );
	} );

/*--------------------------------------------------------------
1.5 Typography: H5
--------------------------------------------------------------*/
	// h5: Font Family
	wp.customize( 'type-h5-font-family', function( value ) {
		value.bind( function( to ) {
			$( 'h5' ).css( 'font-family', to );
		} );
	} );

	// h5: Font Size
	wp.customize( 'type-h5-font-size', function( value ) {
		value.bind( function( to ) {
			$( 'h5' ).css( 'font-size', to );
		} );
	} );

	// h5: Font Weight
	wp.customize( 'type-h5-font-weight', function( value ) {
		value.bind( function( to ) {
			$( 'h5' ).css( 'font-weight', to );
		} );
	} );

	// h5: Font Style
	wp.customize( 'type-h5-font-style', function( value ) {
		value.bind( function( to ) {
			$( 'h5' ).css( 'font-style', to );
		} );
	} );

	// h5: Text Transform
	wp.customize( 'type-h5-text-transform', function( value ) {
		value.bind( function( to ) {
			$( 'h5' ).css( 'text-transform', to );
		} );
	} );

	// h5: Line Height
	wp.customize( 'type-h5-line-height', function( value ) {
		value.bind( function( to ) {
			$( 'h5' ).css( 'line-height', to );
		} );
	} );

	// h5: Letter Spacing
	wp.customize( 'type-h5-letter-spacing', function( value ) {
		value.bind( function( to ) {
			$( 'h5' ).css( 'letter-spacing', to );
		} );
	} );

	// h5: Word Spacing
	wp.customize( 'type-h5-word-spacing', function( value ) {
		value.bind( function( to ) {
			$( 'h5' ).css( 'word-spacing', to );
		} );
	} );

/*--------------------------------------------------------------
1.6 Typography: H6
--------------------------------------------------------------*/
	// Site Title: Font Family
	wp.customize( 'type-h6-font-family', function( value ) {
		value.bind( function( to ) {
			$( 'h6' ).css( 'font-family', to );
		} );
	} );

	// Site Title: Font Size
	wp.customize( 'type-h6-font-size', function( value ) {
		value.bind( function( to ) {
			$( 'h6' ).css( 'font-size', to );
		} );
	} );

	// Site Title: Font Weight
	wp.customize( 'type-h6-font-weight', function( value ) {
		value.bind( function( to ) {
			$( 'h6' ).css( 'font-weight', to );
		} );
	} );

	// Site Title: Font Style
	wp.customize( 'type-h6-font-style', function( value ) {
		value.bind( function( to ) {
			$( 'h6' ).css( 'font-style', to );
		} );
	} );

	// Site Title: Text Transform
	wp.customize( 'type-h6-text-transform', function( value ) {
		value.bind( function( to ) {
			$( 'h6' ).css( 'text-transform', to );
		} );
	} );

	// Site Title: Line Height
	wp.customize( 'type-h6-line-height', function( value ) {
		value.bind( function( to ) {
			$( 'h6' ).css( 'line-height', to );
		} );
	} );

	// Site Title: Letter Spacing
	wp.customize( 'type-h6-letter-spacing', function( value ) {
		value.bind( function( to ) {
			$( 'h6' ).css( 'letter-spacing', to );
		} );
	} );

	// h6: Word Spacing
	wp.customize( 'type-h6-word-spacing', function( value ) {
		value.bind( function( to ) {
			$( 'h6' ).css( 'word-spacing', to );
		} );
	} );

/*--------------------------------------------------------------
1.7 Typography: Site Title
--------------------------------------------------------------*/
	// Site Title: Font Family
	wp.customize( 'type-sitetitle-font-family', function( value ) {
		value.bind( function( to ) {
			$( '.bg-image-header .site-branding h1 a, .home-header-bg .site-branding h1 a' ).css( 'font-family', to );
		} );
	} );

	// Site Title: Font Size
	wp.customize( 'type-sitetitle-font-size', function( value ) {
		value.bind( function( to ) {
			$( '.bg-image-header .site-branding h1 a, .home-header-bg .site-branding h1 a' ).css( 'font-size', to );
		} );
	} );

	// Site Title: Font Weight
	wp.customize( 'type-sitetitle-font-weight', function( value ) {
		value.bind( function( to ) {
			$( '.bg-image-header .site-branding h1 a, .home-header-bg .site-branding h1 a' ).css( 'font-weight', to );
		} );
	} );

	// Site Title: Font Style
	wp.customize( 'type-sitetitle-font-style', function( value ) {
		value.bind( function( to ) {
			$( '.bg-image-header .site-branding h1 a, .home-header-bg .site-branding h1 a' ).css( 'font-style', to );
		} );
	} );

	// Site Title: Text Transform
	wp.customize( 'type-sitetitle-text-transform', function( value ) {
		value.bind( function( to ) {
			$( '.bg-image-header .site-branding h1 a, .home-header-bg .site-branding h1 a' ).css( 'text-transform', to );
		} );
	} );

	// Site Title: Line Height
	wp.customize( 'type-sitetitle-line-height', function( value ) {
		value.bind( function( to ) {
			$( '.bg-image-header .site-branding h1 a, .home-header-bg .site-branding h1 a' ).css( 'line-height', to );
		} );
	} );

	// Site Title: Letter Spacing
	wp.customize( 'type-sitetitle-letter-spacing', function( value ) {
		value.bind( function( to ) {
			$( '.bg-image-header .site-branding h1 a, .home-header-bg .site-branding h1 a' ).css( 'letter-spacing', to );
		} );
	} );

	// Site Title: Word Spacing
	wp.customize( 'type-sitetitle-word-spacing', function( value ) {
		value.bind( function( to ) {
			$( '.bg-image-header .site-branding h1 a, .home-header-bg .site-branding h1 a' ).css( 'word-spacing', to );
		} );
	} );

/*--------------------------------------------------------------
1.8 Typography: Site Tagline
--------------------------------------------------------------*/
	// Site Tagline: Font Family
	wp.customize( 'type-sitetagline-font-family', function( value ) {
		value.bind( function( to ) {
			$( '.bg-image-header .site-branding h2, .home-header-bg .site-branding h2' ).css( 'font-family', to );
		} );
	} );

	// Site Tagline: Font Size
	wp.customize( 'type-sitetagline-font-size', function( value ) {
		value.bind( function( to ) {
			$( '.bg-image-header .site-branding h2, .home-header-bg .site-branding h2' ).css( 'font-size', to );
		} );
	} );

	// Site Tagline: Font Weight
	wp.customize( 'type-sitetagline-font-weight', function( value ) {
		value.bind( function( to ) {
			$( '.bg-image-header .site-branding h2, .home-header-bg .site-branding h2' ).css( 'font-weight', to );
		} );
	} );

	// Site Tagline: Font Style
	wp.customize( 'type-sitetagline-font-style', function( value ) {
		value.bind( function( to ) {
			$( '.bg-image-header .site-branding h2, .home-header-bg .site-branding h2' ).css( 'font-style', to );
		} );
	} );

	// Site Tagline: Text Transform
	wp.customize( 'type-sitetagline-text-transform', function( value ) {
		value.bind( function( to ) {
			$( '.bg-image-header .site-branding h2, .home-header-bg .site-branding h2' ).css( 'text-transform', to );
		} );
	} );

	// Site Tagline: Line Height
	wp.customize( 'type-sitetagline-line-height', function( value ) {
		value.bind( function( to ) {
			$( '.bg-image-header .site-branding h2, .home-header-bg .site-branding h2' ).css( 'line-height', to );
		} );
	} );

	// Site Tagline: Letter Spacing
	wp.customize( 'type-sitetagline-letter-spacing', function( value ) {
		value.bind( function( to ) {
			$( '.bg-image-header .site-branding h2, .home-header-bg .site-branding h2' ).css( 'letter-spacing', to );
		} );
	} );

	// Site Tagline: Word Spacing
	wp.customize( 'type-sitetagline-word-spacing', function( value ) {
		value.bind( function( to ) {
			$( '.bg-image-header .site-branding h2, .home-header-bg .site-branding h2' ).css( 'word-spacing', to );
		} );
	} );

/*--------------------------------------------------------------
1.9 Typography: Navigation
--------------------------------------------------------------*/
/* TODO */

/*--------------------------------------------------------------
1.10 Typography: Sidebar Widget Titles
--------------------------------------------------------------*/
	// Sidebar Widget Titles: Font Family
	wp.customize( 'type-widget-title-font-family', function( value ) {
		value.bind( function( to ) {
			$( 'h1.widget-title' ).css( 'font-family', to );
		} );
	} );

	// Sidebar Widget Titles: Font Size
	wp.customize( 'type-widget-title-font-size', function( value ) {
		value.bind( function( to ) {
			$( 'h1.widget-title' ).css( 'font-size', to );
		} );
	} );

	// Sidebar Widget Titles: Font Weight
	wp.customize( 'type-widget-title-font-weight', function( value ) {
		value.bind( function( to ) {
			$( 'h1.widget-title' ).css( 'font-weight', to );
		} );
	} );

	// Sidebar Widget Titles: Font Style
	wp.customize( 'type-widget-title-font-style', function( value ) {
		value.bind( function( to ) {
			$( 'h1.widget-title' ).css( 'font-style', to );
		} );
	} );

	// Sidebar Widget Titles: Text Transform
	wp.customize( 'type-widget-title-text-transform', function( value ) {
		value.bind( function( to ) {
			$( 'h1.widget-title' ).css( 'text-transform', to );
		} );
	} );

	// Sidebar Widget Titles: Line Height
	wp.customize( 'type-widget-title-line-height', function( value ) {
		value.bind( function( to ) {
			$( 'h1.widget-title' ).css( 'line-height', to );
		} );
	} );

	// Sidebar Widget Titles: Letter Spacing
	wp.customize( 'type-widget-title-letter-spacing', function( value ) {
		value.bind( function( to ) {
			$( 'h1.widget-title' ).css( 'letter-spacing', to );
		} );
	} );

	// Sidebar Widget Titles: Word Spacing
	wp.customize( 'type-widget-title-word-spacing', function( value ) {
		value.bind( function( to ) {
			$( 'h1.widget-title' ).css( 'word-spacing', to );
		} );
	} );

/*--------------------------------------------------------------
1.11 Typography: Sidebar Widget Body
--------------------------------------------------------------*/
	// Sidebar Widget Title: Font Family
	wp.customize( 'type-widget-body-font-family', function( value ) {
		value.bind( function( to ) {
			$( '.widget-area aside' ).css( 'font-family', to );
		} );
	} );

	// Sidebar Widget Title: Font Size
	wp.customize( 'type-widget-body-font-size', function( value ) {
		value.bind( function( to ) {
			$( '.widget-area aside ul, .widget-area aside li, .widget-area aside p' ).css( 'font-size', to );
		} );
	} );

	// Sidebar Widget Title: Font Weight
	wp.customize( 'type-widget-body-font-weight', function( value ) {
		value.bind( function( to ) {
			$( '.widget-area aside ul, .widget-area aside li, .widget-area aside p' ).css( 'font-weight', to );
		} );
	} );

	// Sidebar Widget Title: Font Style
	wp.customize( 'type-widget-body-font-style', function( value ) {
		value.bind( function( to ) {
			$( '.widget-area aside' ).css( 'font-style', to );
		} );
	} );

	// Sidebar Widget Title: Text Transform
	wp.customize( 'type-widget-body-text-transform', function( value ) {
		value.bind( function( to ) {
			$( '.widget-area aside ul, .widget-area aside li, .widget-area aside p' ).css( 'text-transform', to );
		} );
	} );

	// Sidebar Widget Title: Line Height
	wp.customize( 'type-widget-body-line-height', function( value ) {
		value.bind( function( to ) {
			$( '.widget-area aside ul, .widget-area aside li, .widget-area aside p' ).css( 'line-height', to );
		} );
	} );

	// Sidebar Widget Title: Letter Spacing
	wp.customize( 'type-widget-body-letter-spacing', function( value ) {
		value.bind( function( to ) {
			$( '.widget-area aside ul, .widget-area aside li, .widget-area aside p' ).css( 'letter-spacing', to );
		} );
	} );

	// Sidebar Widget Title: Word Spacing
	wp.customize( 'type-widget-body-word-spacing', function( value ) {
		value.bind( function( to ) {
			$( '.widget-area aside ul, .widget-area aside li, .widget-area aside p' ).css( 'word-spacing', to );
		} );
	} );


/*--------------------------------------------------------------
1.12 Typography: Footer Widget Titles
--------------------------------------------------------------*/
	// Footer Widget Titles: Font Family
	wp.customize( 'type-footer-widget-title-font-family', function( value ) {
		value.bind( function( to ) {
			$( 'footer h1.widget-title' ).css( 'font-family', to );
		} );
	} );

	// Footer Widget Titles: Font Size
	wp.customize( 'type-footer-widget-title-font-size', function( value ) {
		value.bind( function( to ) {
			$( 'footer h1.widget-title' ).css( 'font-size', to );
		} );
	} );

	// Footer Widget Titles: Font Weight
	wp.customize( 'type-footer-widget-title-font-weight', function( value ) {
		value.bind( function( to ) {
			$( 'footer h1.widget-title' ).css( 'font-weight', to );
		} );
	} );

	// Footer Widget Titles: Font Style
	wp.customize( 'type-footer-widget-title-font-style', function( value ) {
		value.bind( function( to ) {
			$( 'footer h1.widget-title' ).css( 'font-style', to );
		} );
	} );

	// Footer Widget Titles: Text Transform
	wp.customize( 'type-footer-widget-title-text-transform', function( value ) {
		value.bind( function( to ) {
			$( 'footer h1.widget-title' ).css( 'text-transform', to );
		} );
	} );

	// Footer Widget Titles: Line Height
	wp.customize( 'type-footer-widget-title-line-height', function( value ) {
		value.bind( function( to ) {
			$( 'footer h1.widget-title' ).css( 'line-height', to );
		} );
	} );

	// Footer Widget Titles: Letter Spacing
	wp.customize( 'type-footer-widget-title-letter-spacing', function( value ) {
		value.bind( function( to ) {
			$( 'footer h1.widget-title' ).css( 'letter-spacing', to );
		} );
	} );

	// Footer Widget Titles: Word Spacing
	wp.customize( 'type-footer-widget-title-word-spacing', function( value ) {
		value.bind( function( to ) {
			$( 'footer h1.widget-title' ).css( 'word-spacing', to );
		} );
	} );

/*--------------------------------------------------------------
1.13 Typography: Footer Widget Body
--------------------------------------------------------------*/
	// Footer Widget Body: Font Family
	wp.customize( 'type-footer-widget-body-font-family', function( value ) {
		value.bind( function( to ) {
			$( '.site-footer aside' ).css( 'font-family', to );
		} );
	} );

	// Footer Widget Body: Font Size
	wp.customize( 'type-footer-widget-body-font-size', function( value ) {
		value.bind( function( to ) {
			$( '.site-footer aside ul, .site-footer aside li, .site-footer aside p' ).css( 'font-size', to );
		} );
	} );

	// Footer Widget Body: Font Weight
	wp.customize( 'type-footer-widget-body-font-weight', function( value ) {
		value.bind( function( to ) {
			$( '.site-footer aside, .site-footer aside ul, .site-footer aside li, .site-footer aside p' ).css( 'font-weight', to );
		} );
	} );

	// Footer Widget Body: Font Style
	wp.customize( 'type-footer-widget-body-font-style', function( value ) {
		value.bind( function( to ) {
			$( '.site-footer aside' ).css( 'font-style', to );
		} );
	} );

	// Footer Widget Body: Text Transform
	wp.customize( 'type-footer-widget-body-text-transform', function( value ) {
		value.bind( function( to ) {
			$( '.site-footer aside ul, .site-footer aside li, .site-footer aside p' ).css( 'text-transform', to );
		} );
	} );

	// Footer Widget Body: Line Height
	wp.customize( 'type-footer-widget-body-line-height', function( value ) {
		value.bind( function( to ) {
			$( '.site-footer aside ul, .site-footer aside li, .site-footer aside p' ).css( 'line-height', to );
		} );
	} );

	// Footer Widget Body: Letter Spacing
	wp.customize( 'type-footer-widget-body-letter-spacing', function( value ) {
		value.bind( function( to ) {
			$( '.site-footer aside ul, .site-footer aside li, .site-footer aside p' ).css( 'letter-spacing', to );
		} );
	} );

	// Footer Widget Body: Word Spacing
	wp.customize( 'type-footer-widget-body-word-spacing', function( value ) {
		value.bind( function( to ) {
			$( '.site-footer aside ul, .site-footer aside li, .site-footer aside p' ).css( 'word-spacing', to );
		} );
	} );

/*--------------------------------------------------------------
1.14 Typography: Copyright
--------------------------------------------------------------*/
	// Font Family
	wp.customize( 'type-copyright-font-family', function( value ) {
		value.bind( function( to ) {
			$( '.site-footer .site-info p, .site-footer .site-info a' ).css( 'font-family', to );
		} );
	} );

	// Font Size
	wp.customize( 'type-copyright-font-size', function( value ) {
		value.bind( function( to ) {
			$( '.site-footer .site-info p, .site-footer .site-info a' ).css( 'font-size', to );
		} );
	} );

	// Font Weight
	wp.customize( 'type-copyright-font-weight', function( value ) {
		value.bind( function( to ) {
			$( '.site-footer .site-info p, .site-footer .site-info a' ).css( 'font-weight', to );
		} );
	} );

	// Font Style
	wp.customize( 'type-copyright-font-style', function( value ) {
		value.bind( function( to ) {
			$( '.site-footer .site-info p, .site-footer .site-info a' ).css( 'font-style', to );
		} );
	} );

	// Text Transform
	wp.customize( 'type-copyright-text-transform', function( value ) {
		value.bind( function( to ) {
			$( '.site-footer .site-info p, .site-footer .site-info a' ).css( 'text-transform', to );
		} );
	} );

	// Line Height
	wp.customize( 'type-copyright-line-height', function( value ) {
		value.bind( function( to ) {
			$( '.site-footer .site-info p, .site-footer .site-info a' ).css( 'line-height', to );
		} );
	} );

	// Letter Spacing
	wp.customize( 'type-copyright-letter-spacing', function( value ) {
		value.bind( function( to ) {
			$( '.site-footer .site-info p, .site-footer .site-info a' ).css( 'letter-spacing', to );
		} );
	} );

	// Word Spacing
	wp.customize( 'type-copyright-word-spacing', function( value ) {
		value.bind( function( to ) {
			$( '.site-footer .site-info p, .site-footer .site-info a' ).css( 'word-spacing', to );
		} );
	} );

/*--------------------------------------------------------------
3.0 Colors 
--------------------------------------------------------------*/

/*--------------------------------------------------------------
3.1 Colors: Sitewide
--------------------------------------------------------------*/
	// Main sitewide accent color
	wp.customize( 'main_color', function( value ) {
		value.bind( function( to ) {
			$( 'button, .button, .widget_tag_cloud a' ).css( 'background-color', to );
		} );
	} );

	// Blockquote Border Color
	wp.customize( 'main_color', function( value ) {
		value.bind( function( to ) {
			$( 'blockquote' ).css( 'border-left-color', to );
		} );
	} );

	// Body Background color
	wp.customize( 'color_body_bg', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).css( 'background-color', to );
		} );
	} );

	// Content background color
	wp.customize( 'color_content_bg', function( value ) {
		value.bind( function( to ) {
			$( '.content-area .columns, .featured-posts .columns' ).css( 'background-color', to );
		} );
	} );

	// Content Font Color
	wp.customize( 'color_content_font', function( value ) {
		value.bind( function( to ) {
			$( '.entry-content, .entry-meta, .comment_content, .entry-header .entry-date, .home-content-right' ).css( 'color', to );
		} );
	} );

/*--------------------------------------------------------------
3.2 Colors: Navigation
--------------------------------------------------------------*/
	// Content Font Color
	wp.customize( 'color_nav_text', function( value ) {
		value.bind( function( to ) {
			$( '.top-bar ul li a' ).css( 'color', to );
		} );
	} );

/*--------------------------------------------------------------
3.3 Colors: Site Title & Tagline
--------------------------------------------------------------*/
	// Site Title
	wp.customize( 'color_site_title', function( value ) {
		value.bind( function( to ) {
			$( '.bg-image-header .site-branding h1 a, .home-header-bg .site-branding h1 a' ).css( 'color', to );
		} );
	} );

	// Site Tagline
	wp.customize( 'color_site_tagline', function( value ) {
		value.bind( function( to ) {
			$( '.bg-image-header .site-branding h2, .home-header-bg .site-branding h2' ).css( 'color', to );
		} );
	} );

/*--------------------------------------------------------------
3.4 Colors: Inner Header
--------------------------------------------------------------*/
	// Inner Header
	wp.customize( 'color_inner_header', function( value ) {
		value.bind( function( to ) {
			$( '.bg-image-header' ).css( 'background-color', to );
		} );
	} );

/*--------------------------------------------------------------
3.5 Colors: Inner Sidebar
--------------------------------------------------------------*/
	// Widget Title
	wp.customize( 'color_sidebar_titles', function( value ) {
		value.bind( function( to ) {
			$( 'h1.widget-title' ).css( 'color', to );
		} );
	} );

	// Widget Content
	wp.customize( 'color_sidebar_content', function( value ) {
		value.bind( function( to ) {
			$( '.widget-area aside ul, .widget-area aside li, .widget-area aside p' ).css( 'color', to );
		} );
	} );


/*--------------------------------------------------------------
3.6 Colors: Footer
--------------------------------------------------------------*/
	// Footer Background
	wp.customize( 'color_footer_bg', function( value ) {
		value.bind( function( to ) {
			$( '.footer-wrap' ).css( 'background-color', to );
		} );
	} );

	// Footer Widget Titles
	wp.customize( 'color_footer_widget_titles', function( value ) {
		value.bind( function( to ) {
			$( 'footer .widget-title' ).css( 'color', to );
		} );
	} );

	// Footer Widget Content
	wp.customize( 'color_footer_widget_content', function( value ) {
		value.bind( function( to ) {
			$( '.site-footer aside ul, .site-footer aside li, .site-footer aside p' ).css( 'color', to );
		} );
	} );

	// Footer Copyright Text
	wp.customize( 'color_footer_copyright', function( value ) {
		value.bind( function( to ) {
			$( 'footer .site-info' ).css( 'color', to );
		} );
	} );


/**
 * TBD
 *
 */
	// Site title
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );

	// Site Description
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Inner pages header background color
	wp.customize( 'header_color', function( value ) {
		value.bind( function( to ) {
			$( '.bg-image-header' ).css( 'background', to );
		} );
	} );

	// Home Hero background color
	wp.customize( 'home_hero_bg_color', function( value ) {
		value.bind( function( to ) {
			$( '.home-header-bg' ).css( 'background-color', to );
		} );
	} );

	// Home featured posts section title
	wp.customize( 'home_posts_title', function( value ) {
		value.bind( function( to ) {
			$( '.home_posts_titles h2' ).text( to );
		} );
	} );

	// Home featured posts section subtitle
	wp.customize( 'home_posts_subtitle', function( value ) {
		value.bind( function( to ) {
			$( '.home_posts_titles h3' ).text( to );
		} );
	} );

	// Blog page title
	wp.customize( 'blog_title', function( value ) {
		value.bind( function( to ) {
			$( '.blog_page_titles h2' ).text( to );
		} );
	} );

	// Blog page subtitle
	wp.customize( 'blog_subtitle', function( value ) {
		value.bind( function( to ) {
			$( '.blog_page_titles h3' ).text( to );
		} );
	} );

	// Footer Copyright Text
	wp.customize( 'footer_copyright', function( value ) {
		value.bind( function( to ) {
			$( '.site-info p' ).text( to );
		} );
	} );


} )( jQuery );
