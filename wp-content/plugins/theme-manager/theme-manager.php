<?php
/*
 * Plugin Name: Theme Manager
 * Description: Theme Manager allows you to sync themes from the YM Google Cloud Storage bucket.
 * Version: 1.2.3
 * Author: Will Rivera
 *
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! defined( 'TMANAGER_FILE' ) ) { define( 'TMANAGER_FILE', __FILE__ ); }

if ( ! defined( 'TMANAGER_V' ) ) { define( 'TMANAGER_V', '1.2.3' ); }

add_action( 'admin_menu', function() {
	add_submenu_page( 'themes.php', 'Theme Manager', 'Theme Manager', 'theme_manager', 'manager', 'theme_manager');
});

add_action( 'admin_enqueue_scripts', function() {
	if(isset($_GET['page']) && $_GET['page'] == 'manager') {
		wp_register_style( 'theme-manager', plugins_url( 'theme-manager.css', TMANAGER_FILE ), false, '1.2.3' );
		wp_enqueue_style( 'theme-manager' );
		wp_register_script( 'theme-manager', plugins_url( 'theme-manager.js', TMANAGER_FILE ), false, '1.2.3' );
		wp_enqueue_script( 'theme-manager' );
	}
});

function theme_manager() {
	$count_themes = wp_get_themes();
	?>
<div class="wrap theme-manager">

	<h1>
		<?php _e('Theme Manager'); ?>
		<span class="title-count theme-count"><?php echo count($count_themes); ?></span>
	</h1>

	<?php if ( current_user_can('theme_manager') && $list_themes = wp_get_themes() ) { ?>
	
	<p><?php _e( 'There are ' . count($count_themes) . ' themes installed. ' . wp_get_theme() . ' is currently activated.'); ?></p>

	<?php
	$can_delete = current_user_can( 'delete_themes' );
	$can_install = current_user_can( 'install_themes' );
	?>
<h1>Enable Themes</h1>
Before a theme can be activated, it needs to be enabled in the Network Admin section. By default WP Admins don't have access to this section of WordPress. But via this plugin you'll be able to enable network themes.<BR>To enable themes across the network, visit the <a href="https://wp.ymem.net/wp-admin/network/themes.php">Network Themes Page</a>.
	<h1>Synchronize Themes</h1>
	Theme files that are updated in WP-Admin will be periodically synced to the other WordPress nodes.<BR>
	However new themes that are added in the Google Cloud Storage will need to be synced in to WPAdmin. We intentionally don't do this automatically.
	<BR><BR>
	Click the "Pull from GCS" button to pull down any themes from GCS.<BR>
	Click the "Push to GCS" button to synchronize any changed or updated themes to Google cloud Storage, and all of the other Wordpress nodes.<BR>
	
	<input type='submit' onClick="gcssync('pull')" id='SyncFromGCSbutton' value='Pull from GCS'> 
	<input type='submit' onClick="gcssync('push')" id='SyncToGCSbutton' value='Push to GCS'>
	<div id='gcs_sync_results' style='position:relative; top:0px; left:0px; width:300px; height:200px; overflow:auto; display:none;'>
	</div>
	<h1>Current Themes</h1>
	<table>
		<tr>
			<th><?php _ex('Theme', 'theme name'); ?></th>
			<th><?php _e('Author'); ?></th>
			<th><?php _e('Version'); ?></th>
			<th></th>
			<?php if ( $can_delete ) { ?>
				<td></td>
			<?php } ?>
			<?php if ( current_user_can('theme_manager') ) { ?>
				<td></td>
			<?php } ?>
		</tr>
		<?php
		foreach ( $list_themes as $list_theme ) :
		?>
			<tr>
				<td><?php echo $list_theme->get( 'Name' ) ? $list_theme->display( 'Name' ) : $list_theme->get_stylesheet(); ?></td>
				<td><?php echo $list_theme->get( 'Author' ) ? $list_theme->display( 'Author' ) : $list_theme->get_stylesheet(); ?></td>
				<td><?php echo $list_theme->get( 'Version' ) ? $list_theme->display( 'Version' ) : $list_theme->get_stylesheet(); ?></td>
				<?php
				if ( $can_delete ) {

					$stylesheet = $list_theme->get_stylesheet();
					$delete_url = add_query_arg( array(
						'action'     => 'delete',
						'stylesheet' => urlencode( $stylesheet ),
					), admin_url( 'themes.php' ) );
					$delete_url = wp_nonce_url( $delete_url, 'delete-theme_' . $stylesheet );
					$name = $list_theme->get( 'Name' ) ? $list_theme->display( 'Name' ) : $list_theme->get_stylesheet();


					if(get_option('stylesheet') == $list_theme->get_stylesheet()) {
					?>
					<td><a href="javascript:;" class="button button-secondary" onclick="activated('<?php echo $name; ?>')" disabled><?php _e( 'Delete' ); ?></a></td>
					<?php
					} else {
					?>
					<td><a href="<?php echo esc_url( $delete_url ); ?>" class="button button-secondary delete-theme" onclick="return confirm('<?php _e("Are you sure you want to delete $name and its data?"); ?>');"><?php _e( 'Delete' ); ?></a></td>
					<?php
					}
				}
				?>
				
			</tr>
		<?php endforeach; ?>
	</table>
	</div>
	<?php
	} else {
		if( ! current_user_can('edit_themes') ) {
			?>
			<p><?php _e( 'You do not have permissions to access this page.' ); ?></p>
			<?php
		}  else {
			?>
			<p><?php _e( 'There are no themes installed.' ); ?></p>
			<?php
		}
	?>
	<?php
	}
	?>
</div>
	<?php
}
