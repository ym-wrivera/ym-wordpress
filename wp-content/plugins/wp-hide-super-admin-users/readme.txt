=== Hide Super Admin Users ===
Contributors: josheby
Tags: network, multisite, super admin
Requires at least: 4.0
Tested up to: 4.6.1
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Hides super admin users from non-super admin users within the dashboard of a WordPress multisite install.

== Description ==

Are you running a multisite installation and wish to hide the super admin users from the individual site administrators?
This plugin will hide super admin users from all users that are not a super admin themselves.

Note: This plugin will have no effect on a non-multisite install.

== Installation ==

1. Upload `wp-hide-super-admin-users` folder to the `/wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.

== Frequently Asked Questions ==

= What happens if I active this plugin on a non-multisite install? =

Nothing.  The plugin verifies that it is a multisite install before adding it's actions and filters.
If it is activated on a non-multisite install, an admin notice will be displayed on the plugin page.

= Does this prevent super admins from seeing other super admin users? =

No.  The plugin only hides super admin users from non-super admin users.

== Changelog ==

= 1.0 =
* Initial Release
