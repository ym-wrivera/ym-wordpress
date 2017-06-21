=== Genesis Shortcode Generator ===
Contributors: joshlimecuda
Donate link: http://joshmallard.com
Tags: shortcodes, genesis
Requires at least: 3.5.1
Tested up to: 4.5.1
Stable tag: 2.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

The Genesis Shortcode Generator plugin allows you to quickly add any default Genesis shortcodes, columns, and widgets to your content via an added button to your WordPress WYSIWYG
== Description ==

Quickly add dynamic elements to the content on your Genesis websites.

This plugin adds a button to any WYSIWYG on your site and allows you to quickly add:

* Columns
* The default [Genesis Shortcodes](http://my.studiopress.com/docs/shortcode-reference/)
* The default Genesis Widgets

to your site content.

== Installation ==

= Using The WordPress Dashboard =

1. Navigate to the 'Add New' in the plugins dashboard
2. Search for ‘genesis shortcode generator’
3. Click 'Install Now'
4. Activate the plugin on the Plugin dashboard

= Uploading in WordPress Dashboard =

1. Navigate to the 'Add New' in the plugins dashboard
2. Navigate to the 'Upload' area
3. Select `genesis-shortcodes.zip` from your computer
4. Click 'Install Now'
5. Activate the plugin in the Plugin dashboard

= Using FTP =

1. Download `genesis-shortcodes.zip`
2. Extract the `genesis-shortcode-generator` directory to your computer
3. Upload the `genesis-shortcode-generator` directory to the `/wp-content/plugins/` directory
4. Activate the plugin in the Plugin dashboard


== Screenshots ==

1. Button added to the WYSIWYG


== Changelog ==

= 2.0.1 =
* Add back the "gb_clear" shortcode
* Update descriptions

= 2.0.0 =
* Moved shortcode functions to their own classes (transition for simpler customization and extension)
* Addition of default Genesis Widgets available as shortcodes

= 1.2.0 =
* Added [clear] shortcode

= 1.1.1 =
* Fix missing $content parameter

= 1.1.0 =
* Filter to remove unwanted empty <p></p> tags within shortcodes

= 1.0.1 =
* Updated for WordPress 3.9 tinyMCE upgrade
* Removed unneeded “fifths” from column options

= 1.0.0 =
* Initial Commit


== Upgrade Notice ==

= 1.0.0 =
* Because this plugin is awesome and you love the Genesis Framework
