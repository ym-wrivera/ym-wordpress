<?php
/**
 * Genesis Columns shortcode for Genesis Shortcode Generator
 *
 * @since 2.0.0
 */

class GingerBeard_Columns {

	protected static $instance;

	public static function instance() {
		if ( empty( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function shortcode_build( $atts, $content = 'null' ) {
		extract( shortcode_atts( array(
        	'size' => '',
        	'position' => ''
        	),
    	$atts, 'genesis_column' ) );

    	$genesis_column_atts = $size;

    	if ( $position == 'first' ) {
    		$genesis_column_atts .= ' first';
    	}

    	$genesis_column = '<div class="'.$genesis_column_atts.'">'.do_shortcode($content).'</div>';

    	return $genesis_column;
	}

}