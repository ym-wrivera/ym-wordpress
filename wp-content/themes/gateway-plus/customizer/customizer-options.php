<?php
/**
 * Defines customizer options
 *
 */
/*--------------------------------------------------------------
	
>>> TABLE OF CONTENTS:
----------------------------------------------------------------

1.0 Layouts
2.0 Typography Panel
	2.1 Typography: Global
	2.2 Typography: Text Headers > H1 - H2
	2.3 Typography: Site Title & Tagline
	2.4 Typography: Navigation
	2.5 Typography: Sidebar
	2.6 Typography: Footer
	2.7 Typography: Copyright
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

function customizer_library_gateway_plus_options() {

	// Defaults
	$primary_color = '#e8554e';
	$primary_hover_color = '#db251d';
	$white = '#ffffff';
	$gainsboro = '#DDDDDD';
	$iron = '#CCCCCC';
	$charcoal = '#555555';
	$steel = '#666666';
	$body_content = '#888888';
	$metagray = '#bebebe';
	$darkknight = '#303030';

	// Get Categories
	$options_cats = array();
	$options_cats_obj = get_categories( 'type=post');
	$options_cats[''] = 'Select a Category:';
	foreach ($options_cats_obj as $cat) {
		$options_cats[$cat->term_id] = $cat->cat_name;
	}

	// Image path defaults
	$imagepath =  get_template_directory_uri() . '/img/';

	// Background Image Behavior Options
	$bg_attachment = array(
	    'fixed' 	=> 'Fixed',
	    'scroll' 	=> 'Scroll',
	);

	// Font Weight
	$font_weight = array(
	    'normal' 	=> 'Normal',
	    'bold' 		=> 'Bold',
	);

	// Font Style
	$font_style = array(
	    'normal' 	=> 'Normal',
	    'italic' 	=> 'Italic',
	);

	// Text Transform
	$text_transform = array(
	    'none' 		=> 'None',
	    'uppercase' => 'Uppercase',
	    'lowercase' => 'Lowercase'
	);

	// Text Transform
	$links_underline = array(
	    'underline' => 'Always',
	    'none'		=> 'Never'
	);

	// Sidebar Layout Choices
	$sidebar_layouts = array(
		'left-sidebar'  => array(
			'url' => $imagepath .'2cl.png',
			'label' => 'Left'
		),
		'right-sidebar' => array(
			'url' => $imagepath .'2cr.png',
			'label' => 'Right'
		),
	);

	$font_choices = customizer_library_get_font_choices();

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Stores all the panels to be added
	$panels = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;
	
	$section = 'layout-section';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Layout', 'gateway-plus' ),
		'priority' => '1'
	);
	
	$options['sidebar_layout'] = array(
		'id' => 'sidebar_layout',
		'label'   => __( 'Sidebar Position', 'gateway-plus' ),
		'section' => $section,
		'type'    => 'radio-image',
		'choices' => $sidebar_layouts,
		'default' => 'right-sidebar',
		'description' 	=> __( 'The position of the sidebar on inner pages', 'gateway-plus' )
	);

/*--------------------------------------------------------------
2.0 Typography Panel
--------------------------------------------------------------*/

	$panel = 'Typography';

	$panels[] = array(
	    'id' => $panel,
	    'title' => __( 'Typography', 'gateway-plus' ),
	    'priority' => '5'
	);

/*--------------------------------------------------------------
2.1 Typography: Global
--------------------------------------------------------------*/
	$section = 'typography-global';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Global', 'gateway-plus' ),
		'priority' => '10',
		'panel' => $panel
	);

	$options['type-global-general-header'] = array(
		'id' => 'type-global-general-header',
        'section' => $section,
        'label'    => __( 'General', 'gateway-plus' ),
        'type'     => 'helptext',
		'description' 	=> __( 'These are the base typographic settings.', 'gateway-plus' )
	);

	$options['type-global-font-family'] = array(
		'id' => 'type-global-font-family',
		'label'   => __( 'Font Family', 'gateway-plus' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $font_choices,
		'default' => 'Fanwood Text',
	);

	$options['type-global-font-size'] = array(
	    'id' => 'type-global-font-size',
	    'label'   => __( 'Font Size (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '18px',
	    'transport'	=> 'postMessage'
	);

	$options['type-global-font-weight'] = array(
	    'id' 		=> 'type-global-font-weight',
	    'label'   	=> __( 'Font Weight', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $font_weight,
	    'default' 	=> 'normal',
	  'transport'	=> 'postMessage'
	);

	$options['type-global-font-style'] = array(
	    'id' 		=> 'type-global-font-style',
	    'label'   	=> __( 'Font Style', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $font_style,
	    'default' 	=> 'normal',
	    'transport'	=> 'postMessage'
	);

	$options['type-global-text-transform'] = array(
	    'id' 		=> 'type-global-text-transform',
	    'label'   	=> __( 'Text Transform', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $text_transform,
	    'default' 	=> 'none',
	    'transport'	=> 'postMessage'
	);

	$options['type-global-line-height'] = array(
	    'id' => 'type-global-line-height',
	    'label'   => __( 'Line Height', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '1.8',
	    'transport'	=> 'postMessage'
	);

	$options['type-global-letter-spacing'] = array(
	    'id' => 'type-global-letter-spacing',
	    'label'   => __( 'Letter Spacing (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '0.01em',
	    'transport'	=> 'postMessage'
	);

	$options['type-global-word-spacing'] = array(
	    'id' => 'type-global-word-spacing',
	    'label'   => __( 'Word Spacing (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '0px',
	    'transport'	=> 'postMessage'
	);

	$options['type-global-links-header'] = array(
		'id' => 'type-global-links-header',
        'section' => $section,
        'label'    => __( 'Links', 'gateway-plus' ),
        'type'     => 'helptext',
		'description' 	=> __( 'These are the base link settings.', 'gateway-plus' )
	);

	$options['type-global-links-weight'] = array(
	    'id' 		=> 'type-global-links-weight',
	    'label'   	=> __( 'Link Font Weight', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $font_weight,
	    'default' 	=> 'normal',
	    'transport'	=> 'postMessage'
	);

	$options['type-global-links-underline'] = array(
	    'id' 		=> 'type-global-links-underline',
	    'label'   	=> __( 'Link Underline', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $links_underline,
	    'default' 	=> 'none',
	    'transport'	=> 'postMessage'
	);

/*--------------------------------------------------------------
2.2 Typography: Text Headers > H1 - H2
--------------------------------------------------------------*/
	$section = 'typography-headers';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Text Headers', 'gateway-plus' ),
		'priority' => '10',
		'panel' => $panel
	);
/**
 * Text Headers > H1
 *
 */
	$options['type-text-h1-header'] = array(
		'id' => 'type-h1-headers-header',
        'section' => $section,
        'label'    => __( 'H1', 'gateway-plus' ),
        'type'     => 'helptext',
		'description' 	=> __( 'Settings for the H1 tag', 'gateway-plus' )
	);

	$options['type-h1-font-family'] = array(
		'id' => 'type-h1-font-family',
		'label'   => __( 'Font Family', 'gateway-plus' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $font_choices,
		'default' => 'Fanwood Text',
	);

	$options['type-h1-font-size'] = array(
	    'id' => 'type-h1-font-size',
	    'label'   => __( 'Font Size (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '2.75em',
	    'transport'	=> 'postMessage'
	);

	$options['type-h1-font-weight'] = array(
	    'id' 		=> 'type-h1-font-weight',
	    'label'   	=> __( 'Font Weight', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $font_weight,
	    'default' 	=> 'bold',
	    'transport'	=> 'postMessage'
	);

	$options['type-h1-font-style'] = array(
	    'id' 		=> 'type-h1-font-style',
	    'label'   	=> __( 'Font Style', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $font_style,
	    'default' 	=> 'normal',
	    'transport'	=> 'postMessage'
	);

	$options['type-h1-text-transform'] = array(
	    'id' 		=> 'type-h1-text-transform',
	    'label'   	=> __( 'Text Transform', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $text_transform,
	    'default' 	=> 'none',
	    'transport'	=> 'postMessage'
	);

	$options['type-h1-line-height'] = array(
	    'id' => 'type-h1-line-height',
	    'label'   => __( 'Line Height', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '1.4',
	    'transport'	=> 'postMessage'
	);

	$options['type-h1-letter-spacing'] = array(
	    'id' => 'type-h1-letter-spacing',
	    'label'   => __( 'Letter Spacing (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '0.01em',
	    'transport'	=> 'postMessage'
	);

	$options['type-h1-word-spacing'] = array(
	    'id' => 'type-h1-word-spacing',
	    'label'   => __( 'Word Spacing (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '0px',
	    'transport'	=> 'postMessage'
	);

/**
 * Text Headers > H2
 *
 */
	$options['type-text-h2-header'] = array(
		'id' => 'type-text-h2-header',
        'section' => $section,
        'label'    => __( 'H2', 'gateway-plus' ),
        'type'     => 'helptext',
		'description' 	=> __( 'Settings for the H2 tag', 'gateway-plus' )
	);

	$options['type-h2-font-family'] = array(
		'id' => 'type-h2-font-family',
		'label'   => __( 'Font Family', 'gateway-plus' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $font_choices,
		'default' => 'Fanwood Text',
	);

	$options['type-h2-font-size'] = array(
	    'id' => 'type-h2-font-size',
	    'label'   => __( 'Font Size (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '2.75em',
	    'transport'	=> 'postMessage'
	);

	$options['type-h2-font-weight'] = array(
	    'id' 		=> 'type-h2-font-weight',
	    'label'   	=> __( 'Font Weight', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $font_weight,
	    'default' 	=> 'bold',
	    'transport'	=> 'postMessage'
	);

	$options['type-h2-font-style'] = array(
	    'id' 		=> 'type-h2-font-style',
	    'label'   	=> __( 'Font Style', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $font_style,
	    'default' 	=> 'normal',
	    'transport'	=> 'postMessage'
	);

	$options['type-h2-text-transform'] = array(
	    'id' 		=> 'type-h2-text-transform',
	    'label'   	=> __( 'Text Transform', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $text_transform,
	    'default' 	=> 'none',
	    'transport'	=> 'postMessage'
	);

	$options['type-h2-line-height'] = array(
	    'id' => 'type-h2-line-height',
	    'label'   => __( 'Line Height', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '1.4',
	    'transport'	=> 'postMessage'
	);

	$options['type-h2-letter-spacing'] = array(
	    'id' => 'type-h2-letter-spacing',
	    'label'   => __( 'Letter Spacing (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '0.01em',
	    'transport'	=> 'postMessage'
	);

	$options['type-h2-word-spacing'] = array(
	    'id' => 'type-h2-word-spacing',
	    'label'   => __( 'Word Spacing (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '0px',
	    'transport'	=> 'postMessage'
	);

/**
 * Text Headers > H3
 *
 */
	$options['type-text-h3-header'] = array(
		'id' => 'type-text-h3-header',
        'section' => $section,
        'label'    => __( 'H3', 'gateway-plus' ),
        'type'     => 'helptext',
		'description' 	=> __( 'Settings for the H3 tag', 'gateway-plus' )
	);

	$options['type-h3-font-family'] = array(
		'id' => 'type-h3-font-family',
		'label'   => __( 'Font Family', 'gateway-plus' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $font_choices,
		'default' => 'Fanwood Text',
	);

	$options['type-h3-font-size'] = array(
	    'id' => 'type-h3-font-size',
	    'label'   => __( 'Font Size (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '1.375em',
	    'transport'	=> 'postMessage'
	);

	$options['type-h3-font-weight'] = array(
	    'id' 		=> 'type-h3-font-weight',
	    'label'   	=> __( 'Font Weight', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $font_weight,
	    'default' 	=> 'bold',
	    'transport'	=> 'postMessage'
	);

	$options['type-h3-font-style'] = array(
	    'id' 		=> 'type-h3-font-style',
	    'label'   	=> __( 'Font Style', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $font_style,
	    'default' 	=> 'normal',
	    'transport'	=> 'postMessage'
	);

	$options['type-h3-text-transform'] = array(
	    'id' 		=> 'type-h3-text-transform',
	    'label'   	=> __( 'Text Transform', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $text_transform,
	    'default' 	=> 'none',
	    'transport'	=> 'postMessage'
	);

	$options['type-h3-line-height'] = array(
	    'id' => 'type-h3-line-height',
	    'label'   => __( 'Line Height', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '1.4',
	    'transport'	=> 'postMessage'
	);

	$options['type-h3-letter-spacing'] = array(
	    'id' => 'type-h3-letter-spacing',
	    'label'   => __( 'Letter Spacing (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '0.01em',
	    'transport'	=> 'postMessage'
	);

	$options['type-h3-word-spacing'] = array(
	    'id' => 'type-h3-word-spacing',
	    'label'   => __( 'Word Spacing (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '0px',
	    'transport'	=> 'postMessage'
	);

/**
 * Text Headers > H4
 *
 */
	$options['type-text-h4-header'] = array(
		'id' => 'type-text-h4-header',
        'section' => $section,
        'label'    => __( 'H4', 'gateway-plus' ),
        'type'     => 'helptext',
		'description' 	=> __( 'Settings for the H4 tag', 'gateway-plus' )
	);

	$options['type-h4-font-family'] = array(
		'id' => 'type-h4-font-family',
		'label'   => __( 'Font Family', 'gateway-plus' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $font_choices,
		'default' => 'Fanwood Text',
	);

	$options['type-h4-font-size'] = array(
	    'id' => 'type-h4-font-size',
	    'label'   => __( 'Font Size (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '1.4375em',
	    'transport'	=> 'postMessage'
	);

	$options['type-h4-font-weight'] = array(
	    'id' 		=> 'type-h4-font-weight',
	    'label'   	=> __( 'Font Weight', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $font_weight,
	    'default' 	=> 'bold',
	    'transport'	=> 'postMessage'
	);

	$options['type-h4-font-style'] = array(
	    'id' 		=> 'type-h4-font-style',
	    'label'   	=> __( 'Font Style', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $font_style,
	    'default' 	=> 'normal',
	    'transport'	=> 'postMessage'
	);

	$options['type-h4-text-transform'] = array(
	    'id' 		=> 'type-h4-text-transform',
	    'label'   	=> __( 'Text Transform', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $text_transform,
	    'default' 	=> 'none',
	    'transport'	=> 'postMessage'
	);

	$options['type-h4-line-height'] = array(
	    'id' => 'type-h4-line-height',
	    'label'   => __( 'Line Height', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '1.4',
	    'transport'	=> 'postMessage'
	);

	$options['type-h4-letter-spacing'] = array(
	    'id' => 'type-h4-letter-spacing',
	    'label'   => __( 'Letter Spacing (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '0.01em',
	    'transport'	=> 'postMessage'
	);

	$options['type-h4-word-spacing'] = array(
	    'id' => 'type-h4-word-spacing',
	    'label'   => __( 'Word Spacing (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '0px',
	    'transport'	=> 'postMessage'
	);

/**
 * Text Headers > H5
 *
 */
	$options['type-text-h5-header'] = array(
		'id' => 'type-text-h5-header',
        'section' => $section,
        'label'    => __( 'H5', 'gateway-plus' ),
        'type'     => 'helptext',
		'description' 	=> __( 'Settings for the H5 tag', 'gateway-plus' )
	);

	$options['type-h5-font-family'] = array(
		'id' => 'type-h5-font-family',
		'label'   => __( 'Font Family', 'gateway-plus' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $font_choices,
		'default' => 'Fanwood Text',
	);

	$options['type-h5-font-size'] = array(
	    'id' => 'type-h5-font-size',
	    'label'   => __( 'Font Size (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '1.4375em',
	    'transport'	=> 'postMessage'
	);

	$options['type-h5-font-weight'] = array(
	    'id' 		=> 'type-h5-font-weight',
	    'label'   	=> __( 'Font Weight', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $font_weight,
	    'default' 	=> 'bold',
	    'transport'	=> 'postMessage'
	);

	$options['type-h5-font-style'] = array(
	    'id' 		=> 'type-h5-font-style',
	    'label'   	=> __( 'Font Style', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $font_style,
	    'default' 	=> 'normal',
	    'transport'	=> 'postMessage'
	);

	$options['type-h5-text-transform'] = array(
	    'id' 		=> 'type-h5-text-transform',
	    'label'   	=> __( 'Text Transform', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $text_transform,
	    'default' 	=> 'none',
	    'transport'	=> 'postMessage'
	);

	$options['type-h5-line-height'] = array(
	    'id' => 'type-h5-line-height',
	    'label'   => __( 'Line Height', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '1.4',
	    'transport'	=> 'postMessage'
	);

	$options['type-h5-letter-spacing'] = array(
	    'id' => 'type-h5-letter-spacing',
	    'label'   => __( 'Letter Spacing (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '0.01em',
	    'transport'	=> 'postMessage'
	);

	$options['type-h5-word-spacing'] = array(
	    'id' => 'type-h5-word-spacing',
	    'label'   => __( 'Word Spacing (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '0px',
	    'transport'	=> 'postMessage'
	);

/**
 * Text Headers > H6
 *
 */
	$options['type-text-h6-header'] = array(
		'id' => 'type-text-h6-header',
        'section' => $section,
        'label'    => __( 'H6', 'gateway-plus' ),
        'type'     => 'helptext',
		'description' 	=> __( 'Settings for the H6 tag', 'gateway-plus' )
	);

	$options['type-h6-font-family'] = array(
		'id' => 'type-h6-font-family',
		'label'   => __( 'Font Family', 'gateway-plus' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $font_choices,
		'default' => 'Fanwood Text',
	);

	$options['type-h6-font-size'] = array(
	    'id' => 'type-h6-font-size',
	    'label'   => __( 'Font Size (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '1em',
	    'transport'	=> 'postMessage'
	);

	$options['type-h6-font-weight'] = array(
	    'id' 		=> 'type-h6-font-weight',
	    'label'   	=> __( 'Font Weight', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $font_weight,
	    'default' 	=> 'bold',
	    'transport'	=> 'postMessage'
	);

	$options['type-h6-font-style'] = array(
	    'id' 		=> 'type-h6-font-style',
	    'label'   	=> __( 'Font Style', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $font_style,
	    'default' 	=> 'normal',
	    'transport'	=> 'postMessage'
	);

	$options['type-h6-text-transform'] = array(
	    'id' 		=> 'type-h6-text-transform',
	    'label'   	=> __( 'Text Transform', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $text_transform,
	    'default' 	=> 'none',
	    'transport'	=> 'postMessage'
	);

	$options['type-h6-line-height'] = array(
	    'id' => 'type-h6-line-height',
	    'label'   => __( 'Line Height', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '1.4',
	    'transport'	=> 'postMessage'
	);

	$options['type-h6-letter-spacing'] = array(
	    'id' => 'type-h6-letter-spacing',
	    'label'   => __( 'Letter Spacing (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '0.01em',
	    'transport'	=> 'postMessage'
	);

	$options['type-h6-word-spacing'] = array(
	    'id' => 'type-h6-word-spacing',
	    'label'   => __( 'Word Spacing (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '0px',
	    'transport'	=> 'postMessage'
	);

/*--------------------------------------------------------------
2.3 Typography: Site Title & Tagline
--------------------------------------------------------------*/
	$section = 'typography-sitetitle-tagline';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Site Title & Tagline', 'gateway-plus' ),
		'priority' => '15',
		'panel' => $panel
	);

/**
 * Typography: Site Title
 *
 */
	$options['type-sitetitle'] = array(
		'id' => 'type-sitetitle',
        'section' => $section,
        'label'    => __( 'Site Title', 'gateway-plus' ),
        'type'     => 'helptext',
		'description' 	=> __( 'The Site Title will display if no logo image is uploaded into the header.', 'gateway-plus' )
	);

	$options['type-sitetitle-font-family'] = array(
		'id' => 'type-sitetitle-font-family',
		'label'   => __( 'Font Family', 'gateway-plus' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $font_choices,
		'default' => 'Fanwood Text',
	);

	$options['type-sitetitle-font-size'] = array(
	    'id' => 'type-sitetitle-font-size',
	    'label'   => __( 'Font Size (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '2.75rem',
	    'transport'	=> 'postMessage'
	);

	$options['type-sitetitle-font-weight'] = array(
	    'id' 		=> 'type-sitetitle-font-weight',
	    'label'   	=> __( 'Font Weight', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $font_weight,
	    'default' 	=> 'bold',
	    'transport'	=> 'postMessage'
	);

	$options['type-sitetitle-font-style'] = array(
	    'id' 		=> 'type-sitetitle-font-style',
	    'label'   	=> __( 'Font Style', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $font_style,
	    'default' 	=> 'normal',
	    'transport'	=> 'postMessage'
	);

	$options['type-sitetitle-text-transform'] = array(
	    'id' 		=> 'type-sitetitle-text-transform',
	    'label'   	=> __( 'Text Transform', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $text_transform,
	    'default' 	=> 'none',
	    'transport'	=> 'postMessage'
	);

	$options['type-sitetitle-line-height'] = array(
	    'id' => 'type-sitetitle-line-height',
	    'label'   => __( 'Line Height', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '1.4',
	    'transport'	=> 'postMessage'
	);

	$options['type-sitetitle-letter-spacing'] = array(
	    'id' => 'type-sitetitle-letter-spacing',
	    'label'   => __( 'Letter Spacing (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '0.01em',
	    'transport'	=> 'postMessage'
	);

	$options['type-sitetitle-word-spacing'] = array(
	    'id' => 'type-sitetitle-word-spacing',
	    'label'   => __( 'Word Spacing (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '0px',
	    'transport'	=> 'postMessage'
	);

/**
 * Typography: Site Tagline
 *
 */
	$options['type-sitetagline'] = array(
		'id' => 'type-sitetagline',
        'section' => $section,
        'label'    => __( 'Site Tagline', 'gateway-plus' ),
        'type'     => 'helptext',
		'description' 	=> __( 'The Site Tagline will display if no logo image is uploaded into the header.', 'gateway-plus' )
	);

	$options['type-sitetagline-font-family'] = array(
		'id' => 'type-sitetagline-font-family',
		'label'   => __( 'Font Family', 'gateway-plus' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $font_choices,
		'default' => 'Fanwood Text',
	);

	$options['type-sitetagline-font-size'] = array(
	    'id' => 'type-sitetagline-font-size',
	    'label'   => __( 'Font Size (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '1em',
	    'transport'	=> 'postMessage'
	);

	$options['type-sitetagline-font-weight'] = array(
	    'id' 		=> 'type-sitetagline-font-weight',
	    'label'   	=> __( 'Font Weight', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $font_weight,
	    'default' 	=> 'bold',
	    'transport'	=> 'postMessage'
	);

	$options['type-sitetagline-font-style'] = array(
	    'id' 		=> 'type-sitetagline-font-style',
	    'label'   	=> __( 'Font Style', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $font_style,
	    'default' 	=> 'normal',
	    'transport'	=> 'postMessage'
	);

	$options['type-sitetagline-text-transform'] = array(
	    'id' 		=> 'type-sitetagline-text-transform',
	    'label'   	=> __( 'Text Transform', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $text_transform,
	    'default' 	=> 'none',
	    'transport'	=> 'postMessage'
	);

	$options['type-sitetagline-line-height'] = array(
	    'id' => 'type-sitetagline-line-height',
	    'label'   => __( 'Line Height', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '1.4',
	    'transport'	=> 'postMessage'
	);

	$options['type-sitetagline-letter-spacing'] = array(
	    'id' => 'type-sitetagline-letter-spacing',
	    'label'   => __( 'Letter Spacing (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '0.01em',
	    'transport'	=> 'postMessage'
	);

	$options['type-sitetagline-word-spacing'] = array(
	    'id' => 'type-sitetagline-word-spacing',
	    'label'   => __( 'Word Spacing (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '0px',
	    'transport'	=> 'postMessage'
	);

/*--------------------------------------------------------------
2.4 Typography: Navigation
--------------------------------------------------------------*/
	$section = 'type-navigation';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Navigation', 'gateway-plus' ),
		'priority' => '20',
		'panel' => $panel
	);

	// Main Menu
	$options['type-main-menu'] = array(
		'id' => 'type-main-menu',
        'section' => $section,
        'label'    => __( 'Main Menu', 'gateway-plus' ),
        'type'     => 'helptext',
		'description' 	=> __( 'Font settings for the main site menu.', 'gateway-plus' )
	);

	$options['type-main-menu-font-family'] = array(
		'id' => 'type-main-menu-font-family',
		'label'   => __( 'Font Family', 'gateway-plus' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $font_choices,
		'default' => 'Fanwood Text'
	);

	$options['type-main-menu-font-size'] = array(
	    'id' => 'type-main-menu-font-size',
	    'label'   => __( 'Font Size (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '0.875rem'
	);

	$options['type-main-menu-font-weight'] = array(
	    'id' 		=> 'type-main-menu-font-weight',
	    'label'   	=> __( 'Font Weight', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $font_weight,
	    'default' 	=> 'normal'
	);

	$options['type-main-menu-font-style'] = array(
	    'id' 		=> 'type-main-menu-font-style',
	    'label'   	=> __( 'Font Style', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $font_style,
	    'default' 	=> 'normal'
	);

	$options['type-main-menu-text-transform'] = array(
	    'id' 		=> 'type-main-menu-text-transform',
	    'label'   	=> __( 'Text Transform', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $text_transform,
	    'default' 	=> 'none'
	);

	$options['type-main-menu-line-height'] = array(
	    'id' => 'type-main-menu-line-height',
	    'label'   => __( 'Dropdown Line Height', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '45px'
	);

	$options['type-main-menu-letter-spacing'] = array(
	    'id' => 'type-main-menu-letter-spacing',
	    'label'   => __( 'Letter Spacing (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '0.01em'
	);

	$options['type-main-menu-word-spacing'] = array(
	    'id' => 'type-main-menu-word-spacing',
	    'label'   => __( 'Word Spacing (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '0px'
	);

/*--------------------------------------------------------------
2.5 Typography: Sidebar
--------------------------------------------------------------*/
	$section = 'type-sidebar';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Sidebar', 'gateway-plus' ),
		'priority' => '25',
		'panel' => $panel
	);

/**
 * Widget Title
 *
 */
	$options['type-widget-title'] = array(
		'id' => 'type-widget-title',
        'section' => $section,
        'label'    => __( 'Widget Titles', 'gateway-plus' ),
        'type'     => 'helptext',
		'description' 	=> __( 'Font settings for the sidebar widget titles.', 'gateway-plus' )
	);

	$options['type-widget-title-font-family'] = array(
		'id' => 'type-widget-title-font-family',
		'label'   => __( 'Font Family', 'gateway-plus' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $font_choices,
		'default' => 'Fanwood Text',
	);

	$options['type-widget-title-font-size'] = array(
	    'id' => 'type-widget-title-font-size',
	    'label'   => __( 'Font Size (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '1em',
	    'transport'	=> 'postMessage'
	);

	$options['type-widget-title-font-weight'] = array(
	    'id' 		=> 'type-widget-title-font-weight',
	    'label'   	=> __( 'Font Weight', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $font_weight,
	    'default' 	=> 'bold',
	    'transport'	=> 'postMessage'
	);

	$options['type-widget-title-font-style'] = array(
	    'id' 		=> 'type-widget-title-font-style',
	    'label'   	=> __( 'Font Style', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $font_style,
	    'default' 	=> 'normal',
	    'transport'	=> 'postMessage'
	);

	$options['type-widget-title-text-transform'] = array(
	    'id' 		=> 'type-widget-title-text-transform',
	    'label'   	=> __( 'Text Transform', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $text_transform,
	    'default' 	=> 'none',
	    'transport'	=> 'postMessage'
	);

	$options['type-widget-title-line-height'] = array(
	    'id' => 'type-widget-title-line-height',
	    'label'   => __( 'Dropdown Line Height', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '1.4',
	    'transport'	=> 'postMessage'
	);

	$options['type-widget-title-letter-spacing'] = array(
	    'id' => 'type-widget-title-letter-spacing',
	    'label'   => __( 'Letter Spacing (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '0.01em',
	    'transport'	=> 'postMessage'
	);

	$options['type-widget-title-word-spacing'] = array(
	    'id' => 'type-widget-title-word-spacing',
	    'label'   => __( 'Word Spacing (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '0px',
	    'transport'	=> 'postMessage'
	);

/**
 * Widget Body
 *
 */
	$options['type-widget-body'] = array(
		'id' => 'type-widget-body',
        'section' => $section,
        'label'    => __( 'Widget Body', 'gateway-plus' ),
        'type'     => 'helptext',
		'description' 	=> __( 'Font settings for the sidebar widget body content.', 'gateway-plus' )
	);

	$options['type-widget-body-font-family'] = array(
		'id' => 'type-widget-body-font-family',
		'label'   => __( 'Font Family', 'gateway-plus' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $font_choices,
		'default' => 'Fanwood Text',
	);

	$options['type-widget-body-font-size'] = array(
	    'id' => 'type-widget-body-font-size',
	    'label'   => __( 'Font Size (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '18px',
	    'transport'	=> 'postMessage'
	);

	$options['type-widget-body-font-weight'] = array(
	    'id' 		=> 'type-widget-body-font-weight',
	    'label'   	=> __( 'Font Weight', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $font_weight,
	    'default' 	=> 'normal',
	    'transport'	=> 'postMessage'
	);

	$options['type-widget-body-font-style'] = array(
	    'id' 		=> 'type-widget-body-font-style',
	    'label'   	=> __( 'Font Style', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $font_style,
	    'default' 	=> 'normal',
	    'transport'	=> 'postMessage'
	);

	$options['type-widget-body-text-transform'] = array(
	    'id' 		=> 'type-widget-body-text-transform',
	    'label'   	=> __( 'Text Transform', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $text_transform,
	    'default' 	=> 'none',
	    'transport'	=> 'postMessage'
	);

	$options['type-widget-body-line-height'] = array(
	    'id' => 'type-widget-body-line-height',
	    'label'   => __( 'Line Height', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '1.4',
	    'transport'	=> 'postMessage'
	);

	$options['type-widget-body-letter-spacing'] = array(
	    'id' => 'type-widget-body-letter-spacing',
	    'label'   => __( 'Letter Spacing (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '0.01em',
	    'transport'	=> 'postMessage'
	);

	$options['type-widget-body-word-spacing'] = array(
	    'id' => 'type-widget-body-word-spacing',
	    'label'   => __( 'Word Spacing (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '0px',
	    'transport'	=> 'postMessage'
	);


/*--------------------------------------------------------------
2.6 Typography: Footer
--------------------------------------------------------------*/
	$section = 'type-footer';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Footer', 'gateway-plus' ),
		'priority' => '30',
		'panel' => $panel
	);

/**
 * Widget Title
 *
 */
	$options['type-footer-widget-title'] = array(
		'id' => 'type-footer-widget-title',
        'section' => $section,
        'label'    => __( 'Widget Titles', 'gateway-plus' ),
        'type'     => 'helptext',
		'description' 	=> __( 'Font settings for the footer widget titles.', 'gateway-plus' )
	);

	$options['type-footer-widget-title-font-family'] = array(
		'id' => 'type-footer-widget-title-font-family',
		'label'   => __( 'Font Family', 'gateway-plus' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $font_choices,
		'default' => 'Fanwood Text',
	);

	$options['type-footer-widget-title-font-size'] = array(
	    'id' => 'type-footer-widget-title-font-size',
	    'label'   => __( 'Font Size (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '1em',
	    'transport'	=> 'postMessage'
	);

	$options['type-footer-widget-title-font-weight'] = array(
	    'id' 		=> 'type-footer-widget-title-font-weight',
	    'label'   	=> __( 'Font Weight', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $font_weight,
	    'default' 	=> 'bold',
	    'transport'	=> 'postMessage'
	);

	$options['type-footer-widget-title-font-style'] = array(
	    'id' 		=> 'type-footer-widget-title-font-style',
	    'label'   	=> __( 'Font Style', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $font_style,
	    'default' 	=> 'normal',
	    'transport'	=> 'postMessage'
	);

	$options['type-footer-widget-title-text-transform'] = array(
	    'id' 		=> 'type-footer-widget-title-text-transform',
	    'label'   	=> __( 'Text Transform', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $text_transform,
	    'default' 	=> 'none',
	    'transport'	=> 'postMessage'
	);

	$options['type-footer-widget-title-line-height'] = array(
	    'id' => 'type-footer-widget-title-line-height',
	    'label'   => __( 'Dropdown Line Height', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '1.4',
	    'transport'	=> 'postMessage'
	);

	$options['type-footer-widget-title-letter-spacing'] = array(
	    'id' => 'type-footer-widget-title-letter-spacing',
	    'label'   => __( 'Letter Spacing (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '0.01em',
	    'transport'	=> 'postMessage'
	);

	$options['type-footer-widget-title-word-spacing'] = array(
	    'id' => 'type-footer-widget-title-word-spacing',
	    'label'   => __( 'Word Spacing (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '0px',
	    'transport'	=> 'postMessage'
	);

/**
 * Widget Body
 *
 */
	$options['type-footer-widget-body'] = array(
		'id' => 'type-footer-widget-body',
        'section' => $section,
        'label'    => __( 'Widget Body', 'gateway-plus' ),
        'type'     => 'helptext',
		'description' 	=> __( 'Font settings for the sidebar widget body content.', 'gateway-plus' )
	);

	$options['type-footer-widget-body-font-family'] = array(
		'id' => 'type-footer-widget-body-font-family',
		'label'   => __( 'Font Family', 'gateway-plus' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $font_choices,
		'default' => 'Fanwood Text',
	);

	$options['type-footer-widget-body-font-size'] = array(
	    'id' => 'type-footer-widget-body-font-size',
	    'label'   => __( 'Font Size (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '18px',
	    'transport'	=> 'postMessage'
	);

	$options['type-footer-widget-body-font-weight'] = array(
	    'id' 		=> 'type-footer-widget-body-font-weight',
	    'label'   	=> __( 'Font Weight', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $font_weight,
	    'default' 	=> 'normal',
	    'transport'	=> 'postMessage'
	);

	$options['type-footer-widget-body-font-style'] = array(
	    'id' 		=> 'type-footer-widget-body-font-style',
	    'label'   	=> __( 'Font Style', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $font_style,
	    'default' 	=> 'normal',
	    'transport'	=> 'postMessage'
	);

	$options['type-footer-widget-body-text-transform'] = array(
	    'id' 		=> 'type-footer-widget-body-text-transform',
	    'label'   	=> __( 'Text Transform', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $text_transform,
	    'default' 	=> 'none',
	    'transport'	=> 'postMessage'
	);

	$options['type-footer-widget-body-line-height'] = array(
	    'id' => 'type-footer-widget-body-line-height',
	    'label'   => __( 'Line Height', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '1.4',
	    'transport'	=> 'postMessage'
	);

	$options['type-footer-widget-body-letter-spacing'] = array(
	    'id' => 'type-footer-widget-body-letter-spacing',
	    'label'   => __( 'Letter Spacing (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '0.01em',
	    'transport'	=> 'postMessage'
	);

	$options['type-footer-widget-body-word-spacing'] = array(
	    'id' => 'type-footer-widget-body-word-spacing',
	    'label'   => __( 'Word Spacing (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '0px',
	    'transport'	=> 'postMessage'
	);


/*--------------------------------------------------------------
2.7 Typography: Copyright
--------------------------------------------------------------*/
	$section = 'type-copyright';

	$sections[] = array(
		'id' => $section,
		'title' => __( 'Copyright', 'gateway-plus' ),
		'priority' => '35',
		'panel' => $panel
	);

/**
 * Copyright Text
 *
 */
	$options['type-copyright'] = array(
		'id' => 'type-copyright',
        'section' => $section,
        'label'    => '',
        'type'     => 'helptext',
		'description' 	=> __( 'Font settings for the copyright text', 'gateway-plus' )
	);

	$options['type-copyright-font-family'] = array(
		'id' => 'type-copyright-font-family',
		'label'   => __( 'Font Family', 'gateway-plus' ),
		'section' => $section,
		'type'    => 'select',
		'choices' => $font_choices,
		'default' => 'Fanwood Text',
	);

	$options['type-copyright-font-size'] = array(
	    'id' => 'type-copyright-font-size',
	    'label'   => __( 'Font Size (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '1em',
	    'transport'	=> 'postMessage'
	);

	$options['type-copyright-font-weight'] = array(
	    'id' 		=> 'type-copyright-font-weight',
	    'label'   	=> __( 'Font Weight', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $font_weight,
	    'default' 	=> 'normal',
	    'transport'	=> 'postMessage'
	);

	$options['type-copyright-font-style'] = array(
	    'id' 		=> 'type-copyright-font-style',
	    'label'   	=> __( 'Font Style', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $font_style,
	    'default' 	=> 'normal',
	    'transport'	=> 'postMessage'
	);

	$options['type-copyright-text-transform'] = array(
	    'id' 		=> 'type-copyright-text-transform',
	    'label'   	=> __( 'Text Transform', 'gateway-plus' ),
	    'section' 	=> $section,
	    'type'    	=> 'select',
	    'choices' 	=> $text_transform,
	    'default' 	=> 'none',
	    'transport'	=> 'postMessage'
	);

	$options['type-copyright-height'] = array(
	    'id' => 'type-copyright-height',
	    'label'   => __( 'Line Height', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '1.4',
	    'transport'	=> 'postMessage'
	);

	$options['type-copyright-letter-spacing'] = array(
	    'id' => 'type-copyright-letter-spacing',
	    'label'   => __( 'Letter Spacing (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '0.01em',
	    'transport'	=> 'postMessage'
	);

	$options['type-copyright-word-spacing'] = array(
	    'id' => 'type-copyright-word-spacing',
	    'label'   => __( 'Word Spacing (px or em)', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'text',
	    'default' => '0px',
	    'transport'	=> 'postMessage'
	);


/*--------------------------------------------------------------
3.0 Colors Panel
--------------------------------------------------------------*/
	$panel = 'Colors';

	$panels[] = array(
	    'id' => $panel,
	    'title' => __( 'Colors', 'gateway-plus' ),
	    'priority' => '10'
	);

/*--------------------------------------------------------------
3.1 Colors: Sitewide
--------------------------------------------------------------*/

	$section = 'colors-sitewide';

	$sections[] = array(
		'id' 			=> $section,
		'title' 		=> __( 'Sitewide', 'gateway-plus' ),
		'priority' 		=> '50',
		'description' 	=> __( 'The primary sitewide accent color.', 'gateway-plus' ),
		'panel' => $panel
	);

	$options['main_color'] = array(
		'id' 			=> 'main_color',
		'label'   		=> __( 'Main accent color', 'gateway-plus' ),
		'description' 	=> __( 'Applied to sitewide buttons and blockquotes.', 'gateway-plus' ),
		'section' 		=> $section,
		'type'    		=> 'color',
		'default' 		=> $primary_color,
		'transport'		=> 'postMessage'
	);

	$options['main_color_hover'] = array(
		'id' 		=> 'main_color_hover',
		'label'   	=> __( 'Main accent hover color.', 'gateway-plus' ),
		'description'   	=> __( 'Hover color for sitewide buttons.', 'gateway-plus' ),
		'section' 	=> $section,
		'type'    	=> 'color',
		'default' 	=> $primary_hover_color
	);

	$options['colors-anchor-header'] = array(
		'id' => 'colors-anchor-header',
        'section' => $section,
        'label'    => __( 'Links', 'gateway-plus' ),
        'type'     => 'helptext',
		'description' 	=> __( 'Set the color links', 'gateway-plus' )
	);

	$options['anchor_color'] = array(
		'id' 			=> 'anchor_color',
		'label'   		=> __( 'Link color', 'gateway-plus' ),
		'section' 		=> $section,
		'type'    		=> 'color',
		'default' 		=> $primary_color
	);

	$options['anchor_color_hover'] = array(
		'id' 			=> 'anchor_color_hover',
		'label'   		=> __( 'Set the link hover color', 'gateway-plus' ),
		'section' 		=> $section,
		'type'    		=> 'color',
		'default' 		=> $primary_hover_color
	);

	$options['colors-bg-header'] = array(
		'id' => 'colors-bg-header',
        'section' => $section,
        'label'    => __( 'Backgrounds', 'gateway-plus' ),
        'type'     => 'helptext',
		'description' 	=> __( 'Set the color for the sitewide background color', 'gateway-plus' )
	);

	$options['color_body_bg'] = array(
		'id' 			=> 'color_body_bg',
		'label'   		=> __( 'Main Background Color', 'gateway-plus' ),
		'section' 		=> $section,
		'type'    		=> 'color',
		'default' 		=> $white,
		'transport'		=> 'postMessage'
	);

	$options['color_content_bg'] = array(
		'id' 			=> 'color_content_bg',
		'label'   		=> __( 'Content Background Color', 'gateway-plus' ),
		'description'	=> __( 'The background color for posts and page content', 'gateway-plus' ),
		'section' 		=> $section,
		'type'    		=> 'color',
		'default' 		=> $white,
		'transport'		=> 'postMessage'
	);

	$options['color_content_font'] = array(
		'id' 			=> 'color_content_font',
		'label'   		=> __( 'Content Font Color', 'gateway-plus' ),
		'section' 		=> $section,
		'type'    		=> 'color',
		'default' 		=> $body_content,
		'transport'		=> 'postMessage'
	);


/*--------------------------------------------------------------
3.2 Colors: Navigation
--------------------------------------------------------------*/
	$section = 'colors-nav';

	$sections[] = array(
		'id' 			=> $section,
		'title' 		=> __( 'Navigation Colors', 'gateway-plus' ),
		'priority' 		=> '50',
		'description' 	=> __( 'Set the colors for the navigation bar', 'gateway-plus' ),
		'panel' => $panel
	);

	$options['color_nav_bg'] = array(
		'id' 			=> 'color_nav_bg',
		'label'   		=> __( 'Navigation background', 'gateway-plus' ),
		'section' 		=> $section,
		'type'    		=> 'color',
		'default' 		=> $white
	);

	$options['color_nav_hover_bg'] = array(
		'id' 			=> 'color_nav_hover_bg',
		'label'   		=> __( 'Navigation background hover', 'gateway-plus' ),
		'section' 		=> $section,
		'type'    		=> 'color',
		'default' 		=> $white
	);

	$options['color_nav_text'] = array(
		'id' 			=> 'color_nav_text',
		'label'   		=> __( 'Default Links', 'gateway-plus' ),
		'section' 		=> $section,
		'type'    		=> 'color',
		'default' 		=> $body_content,
		'transport'		=> 'postMessage'
	);

	$options['color_nav_active_link'] = array(
		'id' 			=> 'color_nav_active_link',
		'label'   		=> __( 'Active Link', 'gateway-plus' ),
		'section' 		=> $section,
		'type'    		=> 'color',
		'default' 		=> $primary_color
	);

	$options['color_nav_link_hover'] = array(
		'id' 			=> 'color_nav_link_hover',
		'label'   		=> __( 'Link Hover', 'gateway-plus' ),
		'section' 		=> $section,
		'type'    		=> 'color',
		'default' 		=> $primary_color
	);

	$options['color_nav_dropdown_border'] = array(
		'id' 			=> 'color_nav_dropdown_border',
		'label'   		=> __( 'Dropdown Border', 'gateway-plus' ),
		'section' 		=> $section,
		'type'    		=> 'color',
		'default' 		=> $gainsboro
	);

/*--------------------------------------------------------------
3.3 Colors: Site Title & Tagline
--------------------------------------------------------------*/
	$section = 'color_title_tagline';

	$sections[] = array(
		'id' 			=> $section,
		'title' 		=> __( 'Title &amp; Tagline', 'gateway-plus' ),
		'priority' 		=> '50',
		'description' 	=> __( 'The Site Title and Tagline text will display if no logo image is uploaded into the header', 'gateway-plus' ),
		'panel' => $panel
	);

	$options['color_site_title'] = array(
		'id' 			=> 'color_site_title',
		'label'   		=> __( 'Site Title', 'gateway-plus' ),
		'section' 		=> $section,
		'type'    		=> 'color',
		'default' 		=> $white,
		'transport'		=> 'postMessage'
	);

	$options['color_site_tagline'] = array(
		'id' 			=> 'color_site_tagline',
		'label'   		=> __( 'Site Tagline', 'gateway-plus' ),
		'section' 		=> $section,
		'type'    		=> 'color',
		'default' 		=> $white,
		'transport'		=> 'postMessage'
	);


/*--------------------------------------------------------------
3.4 Colors: Inner Header
--------------------------------------------------------------*/
	$section = 'color_inner_header';

	$sections[] = array(
		'id' 			=> $section,
		'title' 		=> __( 'Inner Header', 'gateway-plus' ),
		'priority' 		=> '50',
		'description' 	=> __( 'The background color for the inner header. If using a background image, the background color will not be visible.', 'gateway-plus' ),
		'panel' => $panel
	);

	$options['color_inner_header'] = array(
		'id' 			=> 'color_inner_header',
		'label'   		=> __( 'Inner Header', 'gateway-plus' ),
		'section' 		=> $section,
		'type'    		=> 'color',
		'default' 		=> $primary_color,
		'transport'		=> 'postMessage'
	);


/*--------------------------------------------------------------
3.5 Colors: Inner Sidebar
--------------------------------------------------------------*/
	$section = 'color_inner_sidebar';

	$sections[] = array(
		'id' 			=> $section,
		'title' 		=> __( 'Inner Sidebar', 'gateway-plus' ),
		'priority' 		=> '50',
		'description' 	=> __( 'Set colors for the sidebar area', 'gateway-plus' ),
		'panel' => $panel
	);

	$options['color_sidebar_titles'] = array(
		'id' 			=> 'color_sidebar_titles',
		'label'   		=> __( 'Widget Title', 'gateway-plus' ),
		'section' 		=> $section,
		'type'    		=> 'color',
		'default' 		=> $steel,
		'transport'		=> 'postMessage'
	);

	$options['color_sidebar_content'] = array(
		'id' 			=> 'color_sidebar_content',
		'label'   		=> __( 'Widget Content', 'gateway-plus' ),
		'section' 		=> $section,
		'type'    		=> 'color',
		'default' 		=> $metagray,
		'transport'		=> 'postMessage'
	);


/*--------------------------------------------------------------
3.6 Colors: Footer
--------------------------------------------------------------*/
	$section = 'color_footer_sidebar';

	$sections[] = array(
		'id' 			=> $section,
		'title' 		=> __( 'Footer', 'gateway-plus' ),
		'priority' 		=> '50',
		'description' 	=> __( 'Set colors for the footer section', 'gateway-plus' ),
		'panel' => $panel
	);

	$options['color_footer_bg'] = array(
		'id' 			=> 'color_footer_bg',
		'label'   		=> __( 'Background', 'gateway-plus' ),
		'section' 		=> $section,
		'type'    		=> 'color',
		'default' 		=> $darkknight,
		'transport'		=> 'postMessage'
	);

	$options['color_footer_widget_titles'] = array(
		'id' 			=> 'color_footer_widget_titles',
		'label'   		=> __( 'Widget Title', 'gateway-plus' ),
		'section' 		=> $section,
		'type'    		=> 'color',
		'default' 		=> $white,
		'transport'		=> 'postMessage'
	);

	$options['color_footer_widget_content'] = array(
		'id' 			=> 'color_footer_widget_content',
		'label'   		=> __( 'Widget Content', 'gateway-plus' ),
		'section' 		=> $section,
		'type'    		=> 'color',
		'default' 		=> $iron,
		'transport'		=> 'postMessage'
	);

	$options['color_footer_copyright'] = array(
		'id' 			=> 'color_footer_copyright',
		'label'   		=> __( 'Copyright Text', 'gateway-plus' ),
		'section' 		=> $section,
		'type'    		=> 'color',
		'default' 		=> $charcoal,
		'transport'		=> 'postMessage'
	);



/*--------------------------------------------------------------
4.0 Home
--------------------------------------------------------------*/

	$panel = 'Home';

	$panels[] = array(
	    'id' => $panel,
	    'title' => __( 'Home', 'gateway-plus' ),
	    'priority' => '10'
	);

/*--------------------------------------------------------------
4.1 Background Image
--------------------------------------------------------------*/
	$section = 'home-bg-image';

	$sections[] = array(
		'id' 			=> $section,
		'title' 		=> __( 'Static Hero Image', 'gateway-plus' ),
		'priority' 		=> '20',
		'description' 	=> '',
		'panel' => $panel
	);

	$options['home-image-content-help'] = array(
		'id' => 'home-image-content-help',
        'section' => $section,
        'label'    => 'Content',
        'type'     => 'helptext',
		'description' 	=> __( 'The content area is widgetized. To add content (text, buttons, etc.), add a widget at Widgets > Home Hero', 'gateway-plus' )
	);

	$options['home_hero_bg'] = array(
		'id' 				=> 'home_hero_bg',
		'label'   			=> __( 'Image', 'gateway-plus' ),
		'section' 			=> $section,
		'type'    			=> 'image',
		'default' 			=> $imagepath . 'hero-bg.jpg'
	);

	$options['bg_image_behavior'] = array(
	    'id' 				=> 'bg_image_behavior',
	    'label'   			=> __( 'Image Behavior', 'gateway-plus' ),
	    'description'		=> __( 'Select the behavior of the background image', 'gateway-plus' ),
	    'section' 			=> $section,
	    'type'    			=> 'select',
	    'choices' 			=> $bg_attachment,
	    'default' 			=> 'fixed'
	);

	$options['home_hero_bg_color'] = array(
		'id' 				=> 'home_hero_bg_color',
		'label'   			=> __( 'Background Color', 'gateway-plus' ),
		'section' 			=> $section,
		'type'    			=> 'color',
		'default' 			=> $primary_color,
		'description' 	=> __( 'Will display if no image is being used', 'gateway-plus' ),
		'transport'			=> 'postMessage'
	);

/*--------------------------------------------------------------
4.2 Slider
--------------------------------------------------------------*/

/**
 * Section named 'header_image' so that
 * add_theme_support( 'custom-header' ) will display in
 * this section.
 *
 * @see gateway_plus_backstretch_setup()
 */
	$section = 'header_image';

	$sections[] = array(
		'id' 			=> $section,
		'title' 		=> __( 'Hero Slider', 'gateway-plus' ),
		'priority' 		=> '20',
		'description' 	=> __( 'Settings for the home slider.', 'gateway-plus' ),
		'panel' => $panel
	);

	$options['home-slider-content-help'] = array(
		'id' => 'home-slider-content-help',
        'section' => $section,
        'label'    => 'Content',
        'type'     => 'helptext',
		'description' 	=> __( 'The content area is widgetized. To add content (text, buttons, etc.), add a widget at Widgets > Home Hero', 'gateway-plus' )
	);

	$options['home_slider_checkbox'] = array(
	    'id' => 'home_slider_checkbox',
	    'label'   => __( 'Select to display the home hero slider', 'gateway-plus' ),
	    'description' 	=> __( 'When activated, the Hero Image settings will not apply.', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'checkbox',
	    'default' => 0,
	);

	$options['home_slider_fixed'] = array(
	    'id' => 'home_slider_fixed',
	    'label'   => __( 'Fixed Images', 'gateway-plus' ),
	    'description' 	=> __( 'Select to display images as fixed when scrolling.', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'checkbox',
	    'default' => 0,
	);

	$options['home_duration'] = array(
	    'id' => 'home_duration',
	    'label'   => __( 'Images Duration', 'brewery' ),
	    'section' => $section,
	    'type'    => 'range',
	    'description' => __( 'Duration time for each background image.', 'brewery' ),
	    'default' => 4000,
	    'input_attrs' => array(
	        'min'   => 100,
	        'max'   => 10000,
	        'step'  => 100,
	    )
	);

	$options['home_fade'] = array(
	    'id' => 'home_fade',
	    'label'   => __( 'Image Fade In', 'brewery' ),
	    'section' => $section,
	    'type'    => 'range',
	    'description' => __( 'Fade in duration for each background image.', 'brewery' ),
	    'default' => 1000,
	    'input_attrs' => array(
	        'min'   => 100,
	        'max'   => 3000,
	        'step'  => 100,
	    )
	);

	$options['home_bg_color'] = array(
		'id' => 'home_bg_color',
		'label'   => __( 'Overlay Color', 'merch' ),
		'description' => __( 'Color overlayed on the home page images.', 'merch' ),
		'section' => $section,
		'type'    => 'color',
		'default' => $white,
	);

	$options['home_opacity'] = array(
		'id' => 'home_opacity',
		'label'   => __( 'Opacity level', 'merch' ),
		'section' => $section,
		'type'    => 'range',
		'description' => __( 'Adjust the opacity for the overlay color.', 'merch' ),
		'default' => '0.6',
	    'input_attrs' => array(
	        'min'   => 0,
	        'max'   => 1,
	        'step'  => 0.1
	    ),
	);


/*--------------------------------------------------------------
4.3 Featured Posts
--------------------------------------------------------------*/
	$section = 'home-posts';

	$sections[] = array(
		'id' 			=> $section,
		'title' 		=> __( 'Featured Posts', 'gateway-plus' ),
		'priority' 		=> '20',
		'description' 	=> __( 'Settings for the home page featured posts section.', 'gateway-plus' ),
		'panel' => $panel
	);

	$options['home_featured_posts_checkbox'] = array(
	    'id' => 'home_featured_posts_checkbox',
	    'label'   => __( 'Display Featured Posts', 'gateway-plus' ),
	    'section' => $section,
	    'type'    => 'checkbox',
	    'default' => 0
	);

	$options['home_posts_title'] = array(
		'id' 				=> 'home_posts_title',
		'label'   			=> __( 'Enter the home featured posts section title', 'gateway-plus' ),
		'section' 			=> $section,
		'type'    			=> 'text',
		'default' 			=> 'Featured Posts',
		'transport'			=> 'postMessage'
	);

	$options['home_posts_subtitle'] = array(
		'id' 				=> 'home_posts_subtitle',
		'label'   			=> __( 'Enter the home featured posts section subtitle', 'gateway-plus' ),
		'section' 			=> $section,
		'type'    			=> 'text',
		'default' 			=> 'Occaecati curabitur autem mollit! Vestibulum veritatis. Aliquam orci cumque curabitur.',
		'transport'			=> 'postMessage'
	);

	$options['home_posts_cat'] = array(
		'id' 				=> 'home_posts_cat',
		'label'   			=> __( 'Home Posts Category', 'gateway-plus' ),
		'section' 			=> $section,
		'type'    			=> 'select',
		'choices' 			=> $options_cats,
		'default' 			=> ''
	);


/*--------------------------------------------------------------
5.0 Header
--------------------------------------------------------------*/
	// Header
	$section = 'header';

	$sections[] = array(
		'id' 			=> $section,
		'title' 		=> __( 'Header', 'gateway-plus' ),
		'priority'	 	=> '10',
		'description' 	=> __( 'Image will display in the header.', 'gateway-plus' ),
	);

	$options['header_logo'] = array(
		'id' 		=> 'header_logo',
		'label'   	=> __( 'Logo', 'gateway-plus' ),
		'section' 	=> $section,
		'type'    	=> 'image',
		'default' 	=> $imagepath . 'logo.png'
	);

	$options['header_logo_width'] = array(
		'id' 				=> 'header_logo_width',
		'label'   			=> __( 'Logo Width', 'gateway-plus' ),
		'section' 			=> $section,
		'type'    			=> 'text'
	);

	$options['header_logo_height'] = array(
		'id' 				=> 'header_logo_height',
		'label'   			=> __( 'Logo Height', 'gateway-plus' ),
		'section' 			=> $section,
		'type'    			=> 'text'
	);

	$options['header_bg'] = array(
		'id' 		=> 'header_bg',
		'label'   	=>  __( 'Inner pages header background', 'gateway-plus' ),
		'section' 	=> $section,
		'type'    	=> 'image',
		'default' 	=> $imagepath . 'hero-bg.jpg'
	);

/*--------------------------------------------------------------
6.0 Blog
--------------------------------------------------------------*/
	$section = 'blog';

	$sections[] = array(
		'id' 			=> $section,
		'title' 		=> __( 'Blog', 'gateway-plus' ),
		'priority' 		=> '30',
		'description' 	=> __( 'Blog Page Options', 'gateway-plus' ),
	);

	$options['blog_title'] = array(
		'id' 				=> 'blog_title',
		'label'   			=> __( 'Enter the blog page title', 'gateway-plus' ),
		'section' 			=> $section,
		'type'    			=> 'text',
		'default' 			=> 'Blog Page',
		'transport'			=> 'postMessage'
	);

	$options['blog_subtitle'] = array(
		'id' 				=> 'blog_subtitle',
		'label'   			=> __( 'Enter the blog page subtitle', 'gateway-plus' ),
		'section' 			=> $section,
		'type'    			=> 'text',
		'default' 			=> 'Occaecati curabitur autem mollit. Vestibulum veritatis orci.',
		'transport'			=> 'postMessage'
	);

/*--------------------------------------------------------------
7.0 Footer
--------------------------------------------------------------*/
	$section = 'footer';

	$sections[] = array(
		'id' 			=> $section,
		'title' 		=> __( 'Footer', 'gateway-plus' ),
		'priority' 		=> '40',
		'description' 	=> __( 'Footer options. The following HTML are allowed: a, bold', 'gateway-plus' ),
	);

	$options['footer_copyright'] = array(
		'id' 			=> 'footer_copyright',
		'label'   		=> __( 'Copyright Text', 'gateway-plus' ),
		'section' 		=> $section,
		'type'    		=> 'textarea',
		'default' 		=> __( 'Copyright 2015 <a href="https://rescuethemes.com">Rescue Themes</a>. All Rights Reserved.', 'rescue'),
		'transport'		=> 'postMessage'
	);


	// Adds the sections panels to the $options array
	$options['sections'] = $sections;
	$options['panels'] = $panels;
	
	// Hook to add the custom customizer in child theme.
	$options= apply_filters( 'gateway_plus_add_customizer_child_options' , $options );
	
	$customizer_library = Customizer_Library::Instance();
	
	$customizer_library->add_options( $options );
	
	// To delete custom mods use: customizer_library_remove_theme_mods();

}
add_action( 'init', 'customizer_library_gateway_plus_options' );
