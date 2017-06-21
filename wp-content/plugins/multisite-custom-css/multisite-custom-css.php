<?php
/**
 * Plugin Name: Multisite Custom CSS
 * Plugin URI: http://celloexpressions.com/plugins/multisite-custom-css
 * Description: Allow multisite site admins to access custom CSS by trusting them with unfiltered CSS.
 * Version: 1.0
 * Author: Nick Halsey
 * Author URI: http://nick.halsey.co/
 * Tags: CSS, Custom CSS, Customizer, Multisite
 * License: GPL

=====================================================================================
Copyright (C) 2016 Nick Halsey

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with WordPress; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
=====================================================================================
*/

add_filter( 'map_meta_cap', 'multisite_custom_css_map_meta_cap', 20, 2 );
function multisite_custom_css_map_meta_cap( $caps, $cap ) {
	if ( 'edit_css' === $cap && is_multisite() ) {
		$caps = array( 'edit_theme_options' );
	}
	return $caps;
}
