<?php
/*
Plugin Name: WP Hide Super Admin Users
Plugin URI: https://github.com/josheby/wp-hide-super-admin-users
Version: 1.0
Description: Hides super admin users from non-super admin users within the dashboard of a WordPress multisite install.
Network: True
Author: Josh Eby
Author URI: http://josheby.com/
Text Domain: wp-hide-super-admin-users
Domain Path: /languages
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

function wphsau_setup() {
    if ( is_multisite() ) {
        if ( ! is_super_admin() ) {
            add_action( 'pre_user_query', 'wphsau_pre_user_query' );
            add_filter( 'views_users', 'wphsau_views_users' );
        }
    } else {
        add_action( 'admin_notices', 'wphsau_admin_notices' );
    }
}
add_action( 'admin_init', 'wphsau_setup' );

function wphsau_admin_notices() {
    global $pagenow;
    if ( $pagenow == 'plugins.php') {
        $class = "error notice";
    	$message = "WP Hide Super Admin Users only works with a WordPress multisite install.  As this is not a multisite install, it will have no effect.";
        echo"<div class=\"$class\"><p>$message</p></div>"; 
    }
}

function wphsau_pre_user_query( $user_search ) {
    global $wpdb;
    $super_admins = get_super_admins();
    $super_admin_list = "'" . implode( "','", $super_admins ) . "'";
    $user_search->query_where = str_replace('WHERE 1=1', "WHERE 1=1 AND {$wpdb->users}.user_login NOT IN ({$super_admin_list})", $user_search->query_where);
}

function wphsau_views_users( $views ) {
    foreach ($views as $key => $view) {
        if ('all' == $key || 'administrator' == $key) {
            $views[$key] = preg_replace_callback('/\(([^()]*)\)/', function ($matches) {
                $super_admins = get_super_admins();
                $super_admin_count = count($super_admins);
                return '(' . (intval($matches[1]) - $super_admin_count) . ')';
            }, $view);
        }
    }
    return $views;
}
