<?php
/**
 * Clear shortcode for Genesis Shortcode Generator
 *
 * @since 2.0.1
 */

class GingerBeard_Clear {

	protected static $instance;

	public static function instance() {
		if ( empty( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function shortcode_build( $content = 'null' ) {

    	$gb_clear = '<div style="clear:both;"></div>';

    	return $gb_clear;
	}

}