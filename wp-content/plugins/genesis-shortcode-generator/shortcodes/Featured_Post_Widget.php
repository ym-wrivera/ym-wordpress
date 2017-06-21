<?php
/**
 * Genesis Featured Post Widget as shortcode for Genesis Shortcode Generator
 *
 * @since 2.0.0
 */

class GingerBeard_Featured_Post {

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
		'title'                   => '',
		'posts_cat'               => '',
		'posts_num'               => 1,
		'posts_offset'            => 0,
		'orderby'                 => '',
		'order'                   => '',
		'exclude_displayed'       => 0,
		'exclude_sticky'          => 0,
		'show_image'              => 1,
		'image_alignment'         => '',
		'image_size'              => '',
		'show_gravatar'           => 0,
		'gravatar_alignment'      => '',
		'gravatar_size'           => '',
		'show_title'              => 1,
		'show_byline'             => 0,
		'post_info'               => '[post_date] By [post_author_posts_link] [post_comments]',
		'show_content'            => 'excerpt',
		'content_limit'           => '',
		'more_text'               => '[Read More...]',
		'extra_num'               => '',
		'extra_title'             => '',
		'more_from_category'      => '',
		'more_from_category_text' => 'More Posts from this Category',
	);

	public function shortcode_build( $atts, $content = 'null' ) {
		$this->args = shortcode_atts( $this->default_args, $atts, 'genesis_featured_post' );

		ob_start();
		the_widget( 'Genesis_Featured_Post',  $this->args, $this->args );
		$featured_post = ob_get_clean();

		return $featured_post;

	}

}