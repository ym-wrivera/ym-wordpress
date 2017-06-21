<?php
/**
 * Genesis Featured Page Widget as shortcode for Genesis Shortcode Generator
 *
 * @since 2.0.0
 */

class GingerBeard_Featured_Page {

	protected static $instance;

	protected $args = array();

	public static function instance() {
		if ( empty( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Widget args also used for shortcode attributes
	 *
	 * @since 2.0.0
	 * @var array
	 */
	protected $default_args = array(
		'title'           => '',
		'page_id'         => '',
		'show_image'      => true,
		'image_alignment' => '',
		'image_size'      => '',
		'show_title'      => true,
		'show_content'    => true,
		'content_limit'   => '',
		'more_text'       => ''
	);

	public function shortcode_build( $atts, $content = 'null' ) {
		$this->args = shortcode_atts( $this->default_args, $atts, 'genesis_featured_page' );

		ob_start();
		the_widget( 'Genesis_Featured_Page',  $this->args, $this->args );
		$featured_page = ob_get_clean();

		return $featured_page;

	}

}