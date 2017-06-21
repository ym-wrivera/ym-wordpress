<?php
/**
 * Genesis User Profile Widget as shortcode for Genesis Shortcode Generator
 *
 * @since 2.0.0
 */

class GingerBeard_User_Profile {

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
		'title'          => '',
		'alignment'	     => 'left',
		'user'           => '',
		'size'           => '45',
		'author_info'    => '',
		'bio_text'       => '',
		'page'           => '',
		'page_link_text' => 'Read More &#x02026;',
		'posts_link'     => '',
	);

	public function shortcode_build( $atts, $content = 'null' ) {
		$this->args = shortcode_atts( $this->default_args, $atts, 'genesis_user_profile' );

		ob_start();
		the_widget( 'Genesis_User_Profile_Widget',  $this->args, $this->args );
		$user_profile = ob_get_clean();

		return $user_profile;

	}

}