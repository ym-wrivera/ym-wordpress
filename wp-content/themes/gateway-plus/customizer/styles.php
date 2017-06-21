<?php
/**
 * Implements styles set in the theme customizer
 *
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

if ( ! function_exists( 'customizer_library_gateway_plus_build_styles' ) && class_exists( 'Customizer_Library_Styles' ) ) :
/**
 * Process user options to generate CSS needed to implement the choices.
 *
 * @since  1.0.0.
 *
 * @return void
 */
function customizer_library_gateway_plus_build_styles() {


/*--------------------------------------------------------------
1.0 Typography: Global
--------------------------------------------------------------*/
	// Font Family
	$setting = 'type-global-font-family';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	$stack = customizer_library_get_font_stack( $mod );

	if ( $mod != customizer_library_get_default( $setting ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'body, p, button, .button'
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );

	}

	// Font Size
	$setting = 'type-global-font-size';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'body, p, button, .button'
			),
			'declarations' => array(
				'font-size' => $text
			)
		) );
	}

	// Font Weight
	$setting = 'type-global-font-weight';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'body, p, button, .button'
			),
			'declarations' => array(
				'font-weight' => $text
			)
		) );
	}

	// Font Style
	$setting = 'type-global-font-style';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'body, p, button, .button'
			),
			'declarations' => array(
				'font-style' => $text
			)
		) );
	}

	// Text Transform
	$setting = 'type-global-text-transform';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'body, p, button, .button'
			),
			'declarations' => array(
				'text-transform' => $text
			)
		) );
	}

	// Line Height
	$setting = 'type-global-line-height';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'body, p, button, .button'
			),
			'declarations' => array(
				'line-height' => $text
			)
		) );
	}

	// Letter Spacing
	$setting = 'type-global-letter-spacing';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'body, p, button, .button'
			),
			'declarations' => array(
				'letter-spacing' => $text
			)
		) );
	}

	// Word Spacing
	$setting = 'type-global-word-spacing';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'body, p, button, .button'
			),
			'declarations' => array(
				'word-spacing' => $text
			)
		) );
	}

	// Link Font Weight
	$setting = 'type-global-links-weight';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'a'
			),
			'declarations' => array(
				'font-weight' => $text
			)
		) );
	}

	// Link Underline
	$setting = 'type-global-links-underline';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'a'
			),
			'declarations' => array(
				'text-decoration' => $text
			)
		) );
	}


/*--------------------------------------------------------------
1.1 Typography: H1
--------------------------------------------------------------*/
	// Font Family
	$setting = 'type-h1-font-family';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	$stack = customizer_library_get_font_stack( $mod );

	if ( $mod != customizer_library_get_default( $setting ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h1'
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );

	}

	// Font Size
	$setting = 'type-h1-font-size';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h1'
			),
			'declarations' => array(
				'font-size' => $text
			)
		) );
	}

	// Font Weight
	$setting = 'type-h1-font-weight';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h1'
			),
			'declarations' => array(
				'font-weight' => $text
			)
		) );
	}

	// Font Style
	$setting = 'type-h1-font-style';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h1'
			),
			'declarations' => array(
				'font-style' => $text
			)
		) );
	}

	// Text Transform
	$setting = 'type-h1-text-transform';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h1'
			),
			'declarations' => array(
				'text-transform' => $text
			)
		) );
	}

	// Line Height
	$setting = 'type-h1-line-height';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h1'
			),
			'declarations' => array(
				'line-height' => $text
			)
		) );
	}

	// Letter Spacing
	$setting = 'type-h1-letter-spacing';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h1'
			),
			'declarations' => array(
				'letter-spacing' => $text
			)
		) );
	}

	// Word Spacing
	$setting = 'type-h1-word-spacing';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h1'
			),
			'declarations' => array(
				'word-spacing' => $text
			)
		) );
	}

/*--------------------------------------------------------------
1.2 Typography: H2
--------------------------------------------------------------*/
	// Font Family
	$setting = 'type-h2-font-family';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	$stack = customizer_library_get_font_stack( $mod );

	if ( $mod != customizer_library_get_default( $setting ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h2'
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );

	}

	// Font Size
	$setting = 'type-h2-font-size';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h2'
			),
			'declarations' => array(
				'font-size' => $text
			)
		) );
	}

	// Font Weight
	$setting = 'type-h2-font-weight';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h2'
			),
			'declarations' => array(
				'font-weight' => $text
			)
		) );
	}

	// Font Style
	$setting = 'type-h2-font-style';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h2'
			),
			'declarations' => array(
				'font-style' => $text
			)
		) );
	}

	// Text Transform
	$setting = 'type-h2-text-transform';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h2'
			),
			'declarations' => array(
				'text-transform' => $text
			)
		) );
	}

	// Line Height
	$setting = 'type-h2-line-height';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h2'
			),
			'declarations' => array(
				'line-height' => $text
			)
		) );
	}

	// Letter Spacing
	$setting = 'type-h2-letter-spacing';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h2'
			),
			'declarations' => array(
				'letter-spacing' => $text
			)
		) );
	}

	// Word Spacing
	$setting = 'type-h2-word-spacing';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h2'
			),
			'declarations' => array(
				'word-spacing' => $text
			)
		) );
	}

/*--------------------------------------------------------------
1.3 Typography: H3
--------------------------------------------------------------*/
	// Font Family
	$setting = 'type-h3-font-family';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	$stack = customizer_library_get_font_stack( $mod );

	if ( $mod != customizer_library_get_default( $setting ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h3'
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );

	}

	// Font Size
	$setting = 'type-h3-font-size';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h3'
			),
			'declarations' => array(
				'font-size' => $text
			)
		) );
	}

	// Font Weight
	$setting = 'type-h3-font-weight';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h3'
			),
			'declarations' => array(
				'font-weight' => $text
			)
		) );
	}

	// Font Style
	$setting = 'type-h3-font-style';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h3'
			),
			'declarations' => array(
				'font-style' => $text
			)
		) );
	}

	// Text Transform
	$setting = 'type-h3-text-transform';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h3'
			),
			'declarations' => array(
				'text-transform' => $text
			)
		) );
	}

	// Line Height
	$setting = 'type-h3-line-height';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h3'
			),
			'declarations' => array(
				'line-height' => $text
			)
		) );
	}

	// Letter Spacing
	$setting = 'type-h3-letter-spacing';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h3'
			),
			'declarations' => array(
				'letter-spacing' => $text
			)
		) );
	}

	// Word Spacing
	$setting = 'type-h3-word-spacing';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h3'
			),
			'declarations' => array(
				'word-spacing' => $text
			)
		) );
	}

/*--------------------------------------------------------------
1.4 Typography: H4
--------------------------------------------------------------*/
	// Font Family
	$setting = 'type-h4-font-family';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	$stack = customizer_library_get_font_stack( $mod );

	if ( $mod != customizer_library_get_default( $setting ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h4'
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );

	}

	// Font Size
	$setting = 'type-h4-font-size';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h4'
			),
			'declarations' => array(
				'font-size' => $text
			)
		) );
	}

	// Font Weight
	$setting = 'type-h4-font-weight';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h4'
			),
			'declarations' => array(
				'font-weight' => $text
			)
		) );
	}

	// Font Style
	$setting = 'type-h4-font-style';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h4'
			),
			'declarations' => array(
				'font-style' => $text
			)
		) );
	}

	// Text Transform
	$setting = 'type-h4-text-transform';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h4'
			),
			'declarations' => array(
				'text-transform' => $text
			)
		) );
	}

	// Line Height
	$setting = 'type-h4-line-height';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h4'
			),
			'declarations' => array(
				'line-height' => $text
			)
		) );
	}

	// Letter Spacing
	$setting = 'type-h4-letter-spacing';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h4'
			),
			'declarations' => array(
				'letter-spacing' => $text
			)
		) );
	}

	// Word Spacing
	$setting = 'type-h4-word-spacing';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h4'
			),
			'declarations' => array(
				'word-spacing' => $text
			)
		) );
	}

/*--------------------------------------------------------------
1.5 Typography: H5
--------------------------------------------------------------*/
	// Font Family
	$setting = 'type-h5-font-family';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	$stack = customizer_library_get_font_stack( $mod );

	if ( $mod != customizer_library_get_default( $setting ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h5'
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );

	}

	// Font Size
	$setting = 'type-h5-font-size';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h5'
			),
			'declarations' => array(
				'font-size' => $text
			)
		) );
	}

	// Font Weight
	$setting = 'type-h5-font-weight';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h5'
			),
			'declarations' => array(
				'font-weight' => $text
			)
		) );
	}

	// Font Style
	$setting = 'type-h5-font-style';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h5'
			),
			'declarations' => array(
				'font-style' => $text
			)
		) );
	}

	// Text Transform
	$setting = 'type-h5-text-transform';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h5'
			),
			'declarations' => array(
				'text-transform' => $text
			)
		) );
	}

	// Line Height
	$setting = 'type-h5-line-height';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h5'
			),
			'declarations' => array(
				'line-height' => $text
			)
		) );
	}

	// Letter Spacing
	$setting = 'type-h5-letter-spacing';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h5'
			),
			'declarations' => array(
				'letter-spacing' => $text
			)
		) );
	}

	// Word Spacing
	$setting = 'type-h5-word-spacing';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h5'
			),
			'declarations' => array(
				'word-spacing' => $text
			)
		) );
	}

/*--------------------------------------------------------------
1.6 Typography: H6
--------------------------------------------------------------*/
	// Font Family
	$setting = 'type-h6-font-family';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	$stack = customizer_library_get_font_stack( $mod );

	if ( $mod != customizer_library_get_default( $setting ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h6'
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );

	}

	// Font Size
	$setting = 'type-h6-font-size';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h6'
			),
			'declarations' => array(
				'font-size' => $text
			)
		) );
	}

	// Font Weight
	$setting = 'type-h6-font-weight';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h6'
			),
			'declarations' => array(
				'font-weight' => $text
			)
		) );
	}

	// Font Style
	$setting = 'type-h6-font-style';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h6'
			),
			'declarations' => array(
				'font-style' => $text
			)
		) );
	}

	// Text Transform
	$setting = 'type-h6-text-transform';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h6'
			),
			'declarations' => array(
				'text-transform' => $text
			)
		) );
	}

	// Line Height
	$setting = 'type-h6-line-height';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h6'
			),
			'declarations' => array(
				'line-height' => $text
			)
		) );
	}

	// Letter Spacing
	$setting = 'type-h6-letter-spacing';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h6'
			),
			'declarations' => array(
				'letter-spacing' => $text
			)
		) );
	}

	// Word Spacing
	$setting = 'type-h6-word-spacing';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h6'
			),
			'declarations' => array(
				'word-spacing' => $text
			)
		) );
	}

/*--------------------------------------------------------------
1.7 Typography: Site Title
--------------------------------------------------------------*/
	// Font Family
	$setting = 'type-sitetitle-font-family';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	$stack = customizer_library_get_font_stack( $mod );

	if ( $mod != customizer_library_get_default( $setting ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.bg-image-header .site-branding h1 a, .home-header-bg .site-branding h1 a'
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );

	}

	// Font Size
	$setting = 'type-sitetitle-font-size';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.bg-image-header .site-branding h1 a, .home-header-bg .site-branding h1 a'
			),
			'declarations' => array(
				'font-size' => $text
			)
		) );
	}

	// Font Weight
	$setting = 'type-sitetitle-font-weight';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.bg-image-header .site-branding h1 a, .home-header-bg .site-branding h1 a'
			),
			'declarations' => array(
				'font-weight' => $text
			)
		) );
	}

	// Font Style
	$setting = 'type-sitetitle-font-style';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.bg-image-header .site-branding h1 a, .home-header-bg .site-branding h1 a'
			),
			'declarations' => array(
				'font-style' => $text
			)
		) );
	}

	// Text Transform
	$setting = 'type-sitetitle-text-transform';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.bg-image-header .site-branding h1 a, .home-header-bg .site-branding h1 a'
			),
			'declarations' => array(
				'text-transform' => $text
			)
		) );
	}

	// Line Height
	$setting = 'type-sitetitle-line-height';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.bg-image-header .site-branding h1 a, .home-header-bg .site-branding h1 a'
			),
			'declarations' => array(
				'line-height' => $text
			)
		) );
	}

	// Letter Spacing
	$setting = 'type-sitetitle-letter-spacing';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.bg-image-header .site-branding h1 a, .home-header-bg .site-branding h1 a'
			),
			'declarations' => array(
				'letter-spacing' => $text
			)
		) );
	}

	// Word Spacing
	$setting = 'type-sitetitle-word-spacing';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.bg-image-header .site-branding h1 a, .home-header-bg .site-branding h1 a'
			),
			'declarations' => array(
				'word-spacing' => $text
			)
		) );
	}

/*--------------------------------------------------------------
1.8 Typography: Site Tagline
--------------------------------------------------------------*/
	// Font Family
	$setting = 'type-sitetagline-font-family';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	$stack = customizer_library_get_font_stack( $mod );

	if ( $mod != customizer_library_get_default( $setting ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.bg-image-header .site-branding h2, .home-header-bg .site-branding h2'
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );

	}

	// Font Size
	$setting = 'type-sitetagline-font-size';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.bg-image-header .site-branding h2, .home-header-bg .site-branding h2'
			),
			'declarations' => array(
				'font-size' => $text
			)
		) );
	}

	// Font Weight
	$setting = 'type-sitetagline-font-weight';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.bg-image-header .site-branding h2, .home-header-bg .site-branding h2'
			),
			'declarations' => array(
				'font-weight' => $text
			)
		) );
	}

	// Font Style
	$setting = 'type-sitetagline-font-style';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.bg-image-header .site-branding h2, .home-header-bg .site-branding h2'
			),
			'declarations' => array(
				'font-style' => $text
			)
		) );
	}

	// Text Transform
	$setting = 'type-sitetagline-text-transform';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.bg-image-header .site-branding h2, .home-header-bg .site-branding h2'
			),
			'declarations' => array(
				'text-transform' => $text
			)
		) );
	}

	// Line Height
	$setting = 'type-sitetagline-line-height';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.bg-image-header .site-branding h2, .home-header-bg .site-branding h2'
			),
			'declarations' => array(
				'line-height' => $text
			)
		) );
	}

	// Letter Spacing
	$setting = 'type-sitetagline-letter-spacing';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.bg-image-header .site-branding h2, .home-header-bg .site-branding h2'
			),
			'declarations' => array(
				'letter-spacing' => $text
			)
		) );
	}

	// Word Spacing
	$setting = 'type-sitetagline-word-spacing';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.bg-image-header .site-branding h2, .home-header-bg .site-branding h2'
			),
			'declarations' => array(
				'word-spacing' => $text
			)
		) );
	}

/*--------------------------------------------------------------
1.9 Typography: Navigation
--------------------------------------------------------------*/
	// Font Family
	$setting = 'type-main-menu-font-family';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	$stack = customizer_library_get_font_stack( $mod );

	if ( $mod != customizer_library_get_default( $setting ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'section.top-bar-section ul li > a'
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );

	}

	// Font Size
	$setting = 'type-main-menu-font-size';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'section.top-bar-section ul li > a'
			),
			'declarations' => array(
				'font-size' => $text
			)
		) );
	}

	// Font Weight
	$setting = 'type-main-menu-font-weight';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'section.top-bar-section li:not(.has-form) a:not(.button)'
			),
			'declarations' => array(
				'font-weight' => $text
			)
		) );
	}

	// Font Style
	$setting = 'type-main-menu-font-style';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'section.top-bar-section ul li > a'
			),
			'declarations' => array(
				'font-style' => $text
			)
		) );
	}

	// Text Transform
	$setting = 'type-main-menu-text-transform';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'section.top-bar-section ul li > a'
			),
			'declarations' => array(
				'text-transform' => $text
			)
		) );
	}

	// Line Height
	$setting = 'type-main-menu-line-height';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'section.top-bar-section .dropdown li:not(.has-form):not(.active) > a:not(.button)'
			),
			'declarations' => array(
				'line-height' => $text
			)
		) );
	}

	// Letter Spacing
	$setting = 'type-main-menu-letter-spacing';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'section.top-bar-section ul li > a'
			),
			'declarations' => array(
				'letter-spacing' => $text
			)
		) );
	}

	// Word Spacing
	$setting = 'type-main-menu-word-spacing';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'section.top-bar-section ul li > a'
			),
			'declarations' => array(
				'word-spacing' => $text
			)
		) );
	}


/*--------------------------------------------------------------
1.10 Typography: Sidebar Widget Titles
--------------------------------------------------------------*/
	// Font Family
	$setting = 'type-widget-title-font-family';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	$stack = customizer_library_get_font_stack( $mod );

	if ( $mod != customizer_library_get_default( $setting ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h1.widget-title'
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );

	}

	// Font Size
	$setting = 'type-widget-title-font-size';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h1.widget-title'
			),
			'declarations' => array(
				'font-size' => $text
			)
		) );
	}

	// Font Weight
	$setting = 'type-widget-title-font-weight';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h1.widget-title'
			),
			'declarations' => array(
				'font-weight' => $text
			)
		) );
	}

	// Font Style
	$setting = 'type-widget-title-font-style';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h1.widget-title'
			),
			'declarations' => array(
				'font-style' => $text
			)
		) );
	}

	// Text Transform
	$setting = 'type-widget-title-text-transform';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h1.widget-title'
			),
			'declarations' => array(
				'text-transform' => $text
			)
		) );
	}

	// Line Height
	$setting = 'type-widget-title-line-height';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h1.widget-title'
			),
			'declarations' => array(
				'line-height' => $text
			)
		) );
	}

	// Letter Spacing
	$setting = 'type-widget-title-letter-spacing';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h1.widget-title'
			),
			'declarations' => array(
				'letter-spacing' => $text
			)
		) );
	}

	// Word Spacing
	$setting = 'type-widget-title-word-spacing';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h1.widget-title'
			),
			'declarations' => array(
				'word-spacing' => $text
			)
		) );
	}

/*--------------------------------------------------------------
1.11 Typography: Sidebar Widget Body
--------------------------------------------------------------*/
	// Font Family
	$setting = 'type-widget-body-font-family';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	$stack = customizer_library_get_font_stack( $mod );

	if ( $mod != customizer_library_get_default( $setting ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.widget-area aside'
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );

	}

	// Font Size
	$setting = 'type-widget-body-font-size';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.widget-area aside ul, .widget-area aside li, .widget-area aside p'
			),
			'declarations' => array(
				'font-size' => $text
			)
		) );
	}

	// Font Weight
	$setting = 'type-widget-body-font-weight';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.widget-area aside'
			),
			'declarations' => array(
				'font-weight' => $text
			)
		) );
	}

	// Font Style
	$setting = 'type-widget-body-font-style';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.widget-area aside'
			),
			'declarations' => array(
				'font-style' => $text
			)
		) );
	}

	// Text Transform
	$setting = 'type-widget-body-text-transform';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.widget-area aside'
			),
			'declarations' => array(
				'text-transform' => $text
			)
		) );
	}

	// Line Height
	$setting = 'type-widget-body-line-height';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.widget-area aside'
			),
			'declarations' => array(
				'line-height' => $text
			)
		) );
	}

	// Letter Spacing
	$setting = 'type-widget-body-letter-spacing';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.widget-area aside'
			),
			'declarations' => array(
				'letter-spacing' => $text
			)
		) );
	}

	// Word Spacing
	$setting = 'type-widget-body-word-spacing';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.widget-area aside'
			),
			'declarations' => array(
				'word-spacing' => $text
			)
		) );
	}

/*--------------------------------------------------------------
1.12 Typography: Footer Widget Title
--------------------------------------------------------------*/
	// Font Family
	$setting = 'type-footer-widget-title-font-family';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	$stack = customizer_library_get_font_stack( $mod );

	if ( $mod != customizer_library_get_default( $setting ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'footer h1.widget-title'
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );

	}

	// Font Size
	$setting = 'type-footer-widget-title-font-size';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'footer h1.widget-title'
			),
			'declarations' => array(
				'font-size' => $text
			)
		) );
	}

	// Font Weight
	$setting = 'type-footer-widget-title-font-weight';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'footer h1.widget-title'
			),
			'declarations' => array(
				'font-weight' => $text
			)
		) );
	}

	// Font Style
	$setting = 'type-footer-widget-title-font-style';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'footer h1.widget-title'
			),
			'declarations' => array(
				'font-style' => $text
			)
		) );
	}

	// Text Transform
	$setting = 'type-footer-widget-title-text-transform';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'footer h1.widget-title'
			),
			'declarations' => array(
				'text-transform' => $text
			)
		) );
	}

	// Line Height
	$setting = 'type-footer-widget-title-line-height';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'footer h1.widget-title'
			),
			'declarations' => array(
				'line-height' => $text
			)
		) );
	}

	// Letter Spacing
	$setting = 'type-footer-widget-title-letter-spacing';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'footer h1.widget-title'
			),
			'declarations' => array(
				'letter-spacing' => $text
			)
		) );
	}

	// Word Spacing
	$setting = 'type-footer-widget-title-word-spacing';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'footer h1.widget-title'
			),
			'declarations' => array(
				'word-spacing' => $text
			)
		) );
	}

/*--------------------------------------------------------------
1.13 Typography: Footer Widget Body
--------------------------------------------------------------*/
	// Font Family
	$setting = 'type-footer-widget-body-font-family';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	$stack = customizer_library_get_font_stack( $mod );

	if ( $mod != customizer_library_get_default( $setting ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer aside'
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );

	}

	// Font Size
	$setting = 'type-footer-widget-body-font-size';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer aside ul, .site-footer aside li, .site-footer aside p'
			),
			'declarations' => array(
				'font-size' => $text
			)
		) );
	}

	// Font Weight
	$setting = 'type-footer-widget-body-font-weight';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer aside ul, .site-footer aside li, .site-footer aside p'
			),
			'declarations' => array(
				'font-weight' => $text
			)
		) );
	}

	// Font Style
	$setting = 'type-footer-widget-body-font-style';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.widget-area aside'
			),
			'declarations' => array(
				'font-style' => $text
			)
		) );
	}

	// Text Transform
	$setting = 'type-footer-widget-body-text-transform';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer aside ul, .site-footer aside li, .site-footer aside p'
			),
			'declarations' => array(
				'text-transform' => $text
			)
		) );
	}

	// Line Height
	$setting = 'type-footer-widget-body-line-height';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer aside ul, .site-footer aside li, .site-footer aside p'
			),
			'declarations' => array(
				'line-height' => $text
			)
		) );
	}

	// Letter Spacing
	$setting = 'type-footer-widget-body-letter-spacing';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer aside ul, .site-footer aside li, .site-footer aside p'
			),
			'declarations' => array(
				'letter-spacing' => $text
			)
		) );
	}

	// Word Spacing
	$setting = 'type-footer-widget-body-word-spacing';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer aside ul, .site-footer aside li, .site-footer aside p'
			),
			'declarations' => array(
				'word-spacing' => $text
			)
		) );
	}

/*--------------------------------------------------------------
1.14 Typography: Copyright
--------------------------------------------------------------*/
	// Font Family
	$setting = 'type-copyright-font-family';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	$stack = customizer_library_get_font_stack( $mod );

	if ( $mod != customizer_library_get_default( $setting ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer .site-info p, .site-footer .site-info a'
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );

	}

	// Font Size
	$setting = 'type-copyright-font-size';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer .site-info p, .site-footer .site-info a'
			),
			'declarations' => array(
				'font-size' => $text
			)
		) );
	}

	// Font Weight
	$setting = 'type-copyright-font-weight';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer .site-info p, .site-footer .site-info a'
			),
			'declarations' => array(
				'font-weight' => $text
			)
		) );
	}

	// Font Style
	$setting = 'type-copyright-font-style';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer .site-info p, .site-footer .site-info a'
			),
			'declarations' => array(
				'font-style' => $text
			)
		) );
	}

	// Text Transform
	$setting = 'type-copyright-text-transform';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer .site-info p, .site-footer .site-info a'
			),
			'declarations' => array(
				'text-transform' => $text
			)
		) );
	}

	// Line Height
	$setting = 'type-copyright-line-height';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer .site-info p, .site-footer .site-info a'
			),
			'declarations' => array(
				'line-height' => $text
			)
		) );
	}

	// Letter Spacing
	$setting = 'type-copyright-letter-spacing';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer .site-info p, .site-footer .site-info a'
			),
			'declarations' => array(
				'letter-spacing' => $text
			)
		) );
	}

	// Word Spacing
	$setting = 'type-copyright-word-spacing';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$text = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer .site-info p, .site-footer .site-info a'
			),
			'declarations' => array(
				'word-spacing' => $text
			)
		) );
	}

/*--------------------------------------------------------------
3.0 Colors Panel
--------------------------------------------------------------*/

/*--------------------------------------------------------------
3.1 Colors: Sitewide
--------------------------------------------------------------*/
	// Main Button color
	$setting = 'main_color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'button, .button, .widget_tag_cloud a, html input[type="button"], input[type="reset"], input[type="submit"]'
			),
			'declarations' => array(
				'background-color' => $color
			)
		) );
	}

	// Blockquote Border Color
	$setting = 'main_color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'blockquote'
			),
			'declarations' => array(
				'border-left-color' => $color
			)
		) );
	}

	// Main Button Hover color
	$setting = 'main_color_hover';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'button:hover, button:focus, .button:hover, .button:focus, .button.radius:hover, .widget_tag_cloud a:hover'
			),
			'declarations' => array(
				'background-color' => $color
			)
		) );
	}

	// Main link color
	$setting = 'anchor_color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'a, .top-bar-section li.active:not(.has-form) a:not(.button), article .entry-footer .left i:hover, footer .textwidget a:hover i, #infinite-footer .blog-info a:hover'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Main link hover color
	$setting = 'anchor_color_hover';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'a:hover, .top-bar-section li.active:hover:not(.has-form) a:hover:not(.button), article .entry-footer .left i:hover, footer .textwidget a:hover i, #infinite-footer .blog-info a:hover, .top-bar-section li:not(.has-form) a:hover:not(.button), .top-bar-section .dropdown li:hover:not(.has-form):not(.active) > a:not(.button)'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Body background color
	$setting = 'color_body_bg';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-content'
			),
			'declarations' => array(
				'background-color' => $color
			)
		) );
	}

	// Content background color
	$setting = 'color_content_bg';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.content-area .columns, .page-template-template-home-php .featured-posts .columns'
			),
			'declarations' => array(
				'background-color' => $color
			)
		) );
	}

	// Content Font Color
	$setting = 'color_content_font';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.entry-content, .entry-meta, .comment_content, .entry-header .entry-date, .home-content-right, .home-content'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

/*--------------------------------------------------------------
3.2 Colors: Navigation
--------------------------------------------------------------*/
	// Navigation background color
	$setting = 'color_nav_bg';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.top-bar, .top-bar-section ul li, .top-bar-section .dropdown li:not(.has-form):not(.active) > a:not(.button), .top-bar-section li.active:not(.has-form) a:not(.button), .top-bar-section li:not(.has-form) a:not(.button)'
			),
			'declarations' => array(
				'background' => $color
			)
		) );
	}

	// Navigation background hover color
	$setting = 'color_nav_hover_bg';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'section.top-bar-section li:not(.has-form) a:hover:not(.button), section.top-bar-section .dropdown li:hover:not(.has-form):not(.active) > a:not(.button), section.top-bar-section li.active:not(.has-form) a:hover:not(.button), section.top-bar-section #menu-header > li:hover > a'
			),
			'declarations' => array(
				'background' => $color
			)
		) );
	}

	// Navigation Default Links
	$setting = 'color_nav_text';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.top-bar ul li a, .top-bar-section .dropdown li:not(.has-form):not(.active) > a:not(.button)'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Navigation Active Link
	$setting = 'color_nav_active_link';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.top-bar-section li.active:not(.has-form) a:not(.button)'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Navigation Link Hover
	$setting = 'color_nav_link_hover';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'section.top-bar-section li:not(.has-form) a:hover:not(.button), section.top-bar-section .dropdown li:hover:not(.has-form):not(.active) > a:not(.button), section.top-bar-section li.active:not(.has-form) a:hover:not(.button), section.top-bar-section #menu-header > li:hover > a'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Navigation Dropdown Border
	$setting = 'color_nav_dropdown_border';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'nav.top-bar .dropdown'
			),
			'declarations' => array(
				'border-left-color' => $color,
				'border-right-color' => $color,
				'border-bottom-color' => $color
			)
		) );
	}

	// Navigation Dropdown Border
	$setting = 'color_nav_dropdown_border';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'nav.top-bar .sub-menu'
			),
			'declarations' => array(
				'border-top-color' => $color
			)
		) );
	}

/*--------------------------------------------------------------
3.3 Colors: Site Title & Tagline
--------------------------------------------------------------*/
	// Site Title
	$setting = 'color_site_title';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.bg-image-header .site-branding h1 a, .home-header-bg .site-branding h1 a'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Site Tagline
	$setting = 'color_site_tagline';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.bg-image-header .site-branding h2, .home-header-bg .site-branding h2'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}


/*--------------------------------------------------------------
3.4 Colors: Inner Header
--------------------------------------------------------------*/

	// Inner Header
	$setting = 'color_inner_header';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.bg-image-header'
			),
			'declarations' => array(
				'background-color' => $color
			)
		) );
	}


/*--------------------------------------------------------------
3.5 Colors: Inner Sidebar
--------------------------------------------------------------*/

	// Widget Title
	$setting = 'color_sidebar_titles';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h1.widget-title'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Widget Content
	$setting = 'color_sidebar_content';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.widget-area aside ul, .widget-area aside li, .widget-area aside p'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

/*--------------------------------------------------------------
3.6 Colors: Footer
--------------------------------------------------------------*/
	// Footer Background
	$setting = 'color_footer_bg';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.footer-wrap'
			),
			'declarations' => array(
				'background-color' => $color
			)
		) );
	}

	// Footer Widget Titles
	$setting = 'color_footer_widget_titles';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'footer .widget-title'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Footer Widget Content
	$setting = 'color_footer_widget_content';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.site-footer aside ul, .site-footer aside li, .site-footer aside p'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Footer Copyright Text
	$setting = 'color_footer_copyright';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'footer .site-info'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

/*--------------------------------------------------------------
4.0 Home
--------------------------------------------------------------*/

/*--------------------------------------------------------------
4.1 Background Image
--------------------------------------------------------------*/

/*--------------------------------------------------------------
4.2 Slider
--------------------------------------------------------------*/

	// Home Overlay Color
	$setting = 'home_bg_color';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$color = sanitize_hex_color( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.backstretch:before'
			),
			'declarations' => array(
				'background-color' => $color
			)
		) );
	}


	// Home Opacity Level
	$setting = 'home_opacity';
	$mod = get_theme_mod( $setting, customizer_library_get_default( $setting ) );

	if ( $mod !== customizer_library_get_default( $setting ) ) {

		$numeral = customizer_library_sanitize_text( $mod );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'.backstretch:before'
			),
			'declarations' => array(
				'opacity' => $numeral
			)
		) );
	}


/*--------------------------------------------------------------
4.3 Featured Posts
--------------------------------------------------------------*/


}
endif;

add_action( 'customizer_library_styles', 'customizer_library_gateway_plus_build_styles' );

if ( ! function_exists( 'customizer_library_gateway_plus_styles' ) ) :
/**
 * Generates the style tag and CSS needed for the theme options.
 *
 * By using the "Customizer_Library_Styles" filter, different components can print CSS in the header.
 * It is organized this way to ensure there is only one "style" tag.
 *
 * @since  1.0.0.
 *
 * @return void
 */
function customizer_library_gateway_plus_styles() {

	do_action( 'customizer_library_styles' );

	// Echo the rules
	$css = Customizer_Library_Styles()->build();

	echo "\n<!-- Begin Custom CSS -->\n<style type=\"text/css\" id=\"gateway_plus_custom_css\">\n";

	if ( ! get_theme_mod( 'home_slider_checkbox' ) ) {

	// Get the home static bg image variables
	$home_hero_bg = get_theme_mod( 'home_hero_bg', customizer_library_get_default( 'home_hero_bg' ) );
	$home_hero_bg_color = get_theme_mod( 'home_hero_bg_color', customizer_library_get_default( 'home_hero_bg_color' ) );
	$bg_image_behavior = get_theme_mod( 'bg_image_behavior' , customizer_library_get_default( 'bg_image_behavior' ) ); ?>

	.home-header-bg {
		background:url( '<?php echo esc_url( $home_hero_bg ) ?>' ) <?php echo esc_attr( $home_hero_bg_color ) ?> no-repeat center center <?php echo esc_attr( $bg_image_behavior ) ?>;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	}

   /* For background-size:cover replacement on iOS devices */
	@media only screen and (orientation: portrait) and (device-width: 320px), (device-width: 768px) {
	    .home-header-bg {
	      -webkit-background-size: auto 150%;
	      background-attachment: scroll;
	    }
	}
	@media only screen and (orientation: landscape) and (device-width: 320px), (device-width: 768px) {
	    .home-header-bg {
	      -webkit-background-size: 150% auto;
	      background-attachment: scroll;
	    }
	}

	<?php } // End home_slider_checkbox

 	// Get the inner pages header image variables
	$header_bg = get_theme_mod( 'header_bg' , customizer_library_get_default( 'header_bg' ) );
	$color_inner_header = get_theme_mod( 'color_inner_header' , customizer_library_get_default( 'color_inner_header' ) ); ?>

	.bg-image-header {
		background:url( '<?php echo esc_url( $header_bg ) ?>' ) center bottom <?php echo esc_attr( $color_inner_header ) ?>;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		height: 100%;
	}

	.bg-center-center {
		background-position: center center;
	}

	.site-branding {
		margin: 0 auto;
		display: table;
		padding-top: 2em;
	}

	<?php
		// Fixed slider images
		if ( get_theme_mod( 'home_slider_fixed' ) ) {
	?>

	.backstretch img {
		position: fixed!important;
	}
	.site-content {
		position: relative;
	}
	.footer-wrap {
		position: relative;
	}
	.stick {
		padding-bottom: none;
	}
	.site-header hr {
		position: relative;
	}

	<?php } // end slider_fixed

	if ( get_theme_mod( 'header_logo_width' ) ) {
	$header_logo_width = get_theme_mod( 'header_logo_width' );
		?>
		.site-branding img { width: <?php echo esc_attr($header_logo_width); ?> ; }
	<?php } //end header_logo_width

	if ( get_theme_mod( 'header_logo_height' ) ) {
	$header_logo_height = get_theme_mod( 'header_logo_height' );
		?>
		.site-branding img { height: <?php echo esc_attr($header_logo_height); ?> ; }
	<?php } //end header_logo_width

	if ( ! empty( $css ) ) {
		echo $css;
	}

	echo "\n</style>\n<!-- End Custom CSS -->\n";

}
endif;

add_action( 'wp_head', 'customizer_library_gateway_plus_styles', 11 );
