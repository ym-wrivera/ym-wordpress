=== Multisite Custom CSS ===
Contributors: celloexpressions
Tags: Custom CSS, Customizer, Custom Design, CSS
Requires at least: 4.7
Tested up to: 4.7
Stable tag: 1.0
Description: Allow multisite site admins to access custom CSS by trusting them with unfiltered CSS.
License: GPLv2

== Description ==
WordPress core provides custom CSS functionality in the customizer that's specific to the current theme; you can switch themes freely with each theme's additional CSS remaining in place. This is particularly useful on multisite networks, where it's often impractical to use child themes to save customizations for each site. Unfortunately, custom CSS is not visible to site admins on multisite networks by default because they are not trusted with unfiltered CSS.

This plugin gives site admins access to the core custom CSS feature by mapping the `edit_css` capability to `edit_theme_options`, thereby trusting site admins with unfiltered CSS.

== Frequently Asked Questions ==
= Why is the plugin necessary? =
Core can't guarantee that CSS is properly sanitized when saving it in the database, and the associated capabilities for managing CSS are equivalent to those for posting unfiltered html. Site admins do not have this capability, so they can't manage CSS as a result. However, in most cases this is an acceptable tradeoff for providing custom CSS to site admins, particularly on trusted networks (open networks are encouraged to take greater precautions and consider other solutions besides this plugin). Note that super admins can access custom CSS for any site on the network without this plugin.

Because this plugin only provides access to a core feature for more users, all feature requests and non-capability-related support questions apply to WordPress core and not this plugin.

== Installation ==
1. Take the easy route and install through the WordPress plugin installer, OR,
1. Download the .zip file and upload the unzipped folder to the `/wp-content/plugins/` directory
1. Network Activate the plugin through the 'Plugins' menu in the network admin
1. (Non-super) Admins can now manage their own CSS for the customizer for their site

== Changelog ==
= 1.0 =
* First publicly available version of the plugin.
* Requires WordPress 4.7+.

== Upgrade Notice ==
= 1.0 =
* Initial Public Release