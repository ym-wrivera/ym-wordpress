<?php

/*

* Plugin Name: Super-Admin Menu-Manager

* Description: Manage menu visibility network wide or on each sub-site individually.

* Version: 1.2

* Author: Victor Noyes

* Author URI: http://victornoyes.com/

* Network: true

*/

//Add Super-Admin Page Permissions//

function samm_menu_manager_admin_menu() {
	if( !is_super_admin() ) {
		$hidden = samm_menu_manager_get_hidden();
		foreach( $hidden as $menu => $items ) {
			if( !empty( $items[0] ) )
				remove_menu_page( $menu );
			else {
				foreach( array_keys( $items ) as $sub )
					remove_submenu_page( $menu, $sub );
			}
		}
	} else
		add_management_page( __( 'Manage Menus', '' ), __( 'Manage Menus', '' ), 'manage_network_options', 'sa-menu-manager', 'samm_menu_manager_page' );
}

add_action( 'admin_menu', 'samm_menu_manager_admin_menu', 1000 );

//Add CSS//
function samm_menu_manager_css() {	
		wp_enqueue_style( 'sa-menu-manager', plugin_dir_url( __FILE__ ) . 'css/menu-manager.css' );
}
add_action( 'admin_init', 'samm_menu_manager_css' );

function samm_menu_manager_page() {
	global $menu, $submenu;
	echo "<div id='sa-menu-manager' class='wrap'>";
	if( !empty( $_POST['menu_manager'] ) ) {
		samm_menu_manager_update( stripslashes_deep( $_POST['menu_manager'] ) );
		echo '<div class="updated">' . __( 'Menus Updated', 'premium-manager' ) . '</div>';
	} elseif( !empty( $_POST ) ) {
		samm_menu_manager_update( array() );
		echo '<div class="updated">' . __( 'Menus Cleared', 'premium-manager' ) . '</div>';
	}
	$hidden = samm_menu_manager_get_hidden();

	echo '<h2>' . __( 'Manage Menus', 'premium-manager' ) . "</h2>\n";
	echo '<em>' . __( 'Checked Menus are not shown to Site Admins', 'premium-manager' ) . "</em><form method='post'>\n";
	wp_nonce_field( 'sa_menu_manager' );
	echo "<p><input type='submit' class='button-secondary' value='" . __( 'Update', 'premium-manager' ) . "' />";
	echo '&nbsp;<label><input type="checkbox" name="menu-reset" value="1" />&nbsp;<strong>' . sprintf( __( 'Reset Default Menus for %s', 'premium-manager' ), is_main_site() ? 'Network' : 'Site' ) . "</strong></label>\n";
	if( !is_main_site() )
		echo '&nbsp;<label><input type="checkbox" name="menu-exclude" value="1" ' . checked( true, empty( $hidden ), false ) . ' />&nbsp;<strong>' . __( 'Show all menus on this site', 'premium-manager' ) . "</strong></label>\n";
	echo "</p><ul>\n";
	foreach( $menu as $m ) {
		if( empty( $m[0] ) )
			continue;
			$hidden[$m[2]] = isset( $hidden[$m[2]] ) ? $hidden[$m[2]] : array();
                        $hidden[$m[2]][0] = isset( $hidden[$m[2]][0] ) ? $hidden[$m[2]][0] : '';
		printf( '<li><label><input type="checkbox" name="menu_manager[%1$s][0]" id="menu_manager-%1$s" value="1" %2$s/>&nbsp;%3$s</label>', $m[2], checked( $hidden[$m[2]][0], 1, false ), $m[0] );
		if( !empty( $submenu[$m[2]] ) ) {
			echo "<ul>\n";
			foreach( $submenu[$m[2]] as $s ){
                            $hidden[$m[2]] = isset( $hidden[$m[2]] ) ? $hidden[$m[2]] : array();
                            $hidden[$m[2]][$s[2]] = isset( $hidden[$m[2]][$s[2]] ) ? $hidden[$m[2]][$s[2]] : '';
                            printf( '<li><label><input type="checkbox" name="menu_manager[%1$s][%2$s]" id="menu_manager-%1$s-%2$s" value="1" %3$s/>&nbsp;%4$s</label></li>', $m[2], $s[2], checked( $hidden[$m[2]][$s[2]], 1, false ), $s[0] );
                        }
			echo "</ul>\n";
		}
		echo "<div style='clear: left;'>&nbsp;</div></li>\n";
	}
	echo "</ul></form></div>\n";
}

//Page Updates//
function samm_menu_manager_update( $hidden ) {
	check_admin_referer( 'sa_menu_manager' );
	if( !empty( $_POST['menu-reset'] ) && '1' == $_POST['menu-reset'] )
		$hidden = array();

	if( !is_multisite() || is_main_site() )
		update_site_option( 'sa_hidden_menus', $hidden );
	else {
		if( !empty( $_POST['menu-exclude'] ) && '1' == $_POST['menu-exclude'] )
			update_option( 'sa_hidden_menus', array() );
		elseif( empty( $hidden ) )
			delete_option( 'sa_hidden_menus' );
		else
			update_option( 'sa_hidden_menus', $hidden );
	}
}
function samm_menu_manager_get_hidden() {
	if( !is_multisite() || is_main_site() || ( $hidden = get_option( 'sa_hidden_menus' ) ) === false )
		$hidden = get_site_option( 'sa_hidden_menus', array() );

	return $hidden;
}