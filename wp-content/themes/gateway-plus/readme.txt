=== Gateway Plus WordPress Theme ===
Contributors: rescuethemes
Donate link: https://rescuethemes.com
Tags: light, white, gray, orange, three-columns, responsive-layout, featured-images, theme-options, custom-colors, threaded-comments, translation-ready, right-sidebar
Requires at least: 4.1
Tested up to: 4.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Gateway Plus incorporates elegant style with user friendly customizer options making it perfectly suited for a variety of WordPress users. With rock solid development and flexible integration, the Gateway Plus theme is sure to be a favorite for first time WordPress users and experienced developers alike.

== Description ==

Gateway Plus incorporates elegant style with user friendly setup options making it perfectly suited for a variety of WordPress users. With rock solid development and flexible integration with the Foundation Framework, the Gateway Plus theme is sure to be a favorite for first time WordPress users and experienced developers alike.

You can customize the theme with the native WordPress Customize feature allowing changes to appear instantly while editing. Full support for contact form, infinite scrolling, post sharing, and gallery displays with the Jetpack plugin. Gateway Plus can be used out of the box, or, treated as a starter theme for developers.

== Installation ==

1. Upload the theme zip file from Appearance > Themes
2. Activate the theme.
3. Create a new page called "Home".
4. In the "Home" page editing area, assign the Home template in the Page Attributes area.
5. Create a new page called "Blog".
5. Navigate to "Settings > Reading" and assign Front page as "Home" and Posts page as "Blog".
6. Add content to your website and enjoy!

== Local Sass Installation ==

sass --watch scss/style.scss:style.css

== Home Page ==

To use the home page template, create a new page and assign it the "Home" template under the Page Attributes settings.

Then navigate to "Settings > Reading" and assign Front page as "Home" and Posts page as "Blog".

The home page consists of several sections:

1. A widgetized top "Home Hero" area. Add a background image and background color in "Appearance > Customize > Theme Options > Home".
2. The latest blog posts section. Select your post category in "Appearance > Customize > Theme Options > Home".
3. Home page content section. This area will display any content you add to the "Home" page's content.
4. The demo is using a text widget in the "Home Hero" widget area with the following content with "Automatically add paragraphs" checked:

https://gist.github.com/RescueThemes/3ef92ff82e189e6034db

== Theme Customization ==

All theme customization options are located at "Appearance > Customize".

== Navigation ==

This theme supports a primary navigation menu. You can edit this menu in WordPress at "Appearance > Menus".

== Widgets ==

This theme supports several different widgetized areas: Home Hero, Inner Sidebar, and Footer. You can add widgets to these areas in "Appearance > Widgets".

== Recommended Plugin ==

= Rescue Shortcodes =

When activated, this plugin will add a button to the WordPress text editor to easily insert shortcodes to your posts or pages. The following shortcodes will become available:

* Buttons
* Content Toggle
* Tabbed Content
* Font Awesome Icons
* Animations
* Google Map
* Notification Box
* Text Highlight
* Columns
* Spacing

= Jetpack Plugin =

The Gateway Plus theme supports several Jetpack features. Jetpack is a free toolkit plugin that adds extra features to your WordPress installation. Installing it is as easy as navigating to "Plugins > Add New" and searching for "Jetpack". The following features will be available with the Gateway Plus theme once Jetpack is installed and activated:

* Carousel
* Contact Form
* Infinite Scroll
* Sharing
* Shortcode Embeds
* Tiled Galleries

== Child Theme ==

Child themes allow you to modify or add to the functionality of the Gateway Plus theme. A child theme is the best, safest, and easiest way to modify an existing theme, whether you want to make a few tiny changes or extensive changes. Instead of modifying the Gateway Plus theme files directly, create a child theme and override within.

To create a child theme:

1. Create a new directory name "gateway-plus-child" in /wp-content/themes/.
2. Create a file called "style.css" in the "gateway-plus-child" directory.
3. Add the following information to the top of style.css:

`/*
 Theme Name:   Gateway Plus Child
 Theme URI:    https://rescuethemes.com
 Description:  Gateway Plus Child Theme
 Author:       Rescue Themes
 Author URI:   https://rescuethemes.com
 Template:     gateway-plus
 Version:      1.0
 Tags: 		   responsive-layout, featured-images, theme-options, custom-colors, threaded-comments, translation-ready, right-sidebar, left-sidebar
 Text Domain:  gateway-plus-child
*/`

4. Create a file called "functions.php" in the "gateway-plus-child" directory.
5. Add the following function to functions.php.

`
<?php

function gateway_plus_enqueue_parent_theme_style() {
    wp_enqueue_style( 'gateway-plus-parent-style', get_template_directory_uri().'/style.css' );
    wp_dequeue_style( 'gateway-plus-style' );
    wp_enqueue_style( 'gateway-plus-child-style', get_stylesheet_directory_uri().'/style.css' );
}
add_action( 'wp_enqueue_scripts', 'gateway_plus_enqueue_parent_theme_style', 99 );
`

6. Activate the child theme from your WordPress admin area.

== License Info ==

Foundation Framework - ​http://foundation.zurb.com/
License: GPL-2.0+ - http://www.gnu.org/licenses/gpl-2.0.html
Copyright: @ZURB

Underscores - ​http://underscores.me/
License: MIT License - http://foundation.zurb.com/learn/faq.html#question-3
Copyright: @automattic

Customizer Library - https://github.com/devinsays/customizer-library
License: GPL-2.0+ - http://www.gnu.org/licenses/gpl-2.0.html
Copyright: @devinsays

Quattrocento, Fanwood  - https://www.google.com/fonts
License: SIL OFL 1.1 - https://www.google.com/fonts/attribution

Font Awesome - ​http://fontawesome.io
Fonts: SIL OFL 1.1, CSS: MIT License - http://fontawesome.io/license
Copyright: @davegandy

Images - Crow the Stone
http://crowthestone.com/image/96712415511
License: CC0 1.0 Universal (CC0 1.0) - http://creativecommons.org/publicdomain/zero/1.0/

Logo Image - http://demo.rescuethemes.com/gateway/wp-content/uploads/sites/8/2014/11/logo.png
License: CC0 1.0 Universal (CC0 1.0) - http://creativecommons.org/publicdomain/zero/1.0/
Copyright: @jamigibbs


== Changelog ==

*** Gateway Plus Changelog ***

= 1.4.8, Dec 8, 2016 =

* Correct hero widget h1

= 1.4.7, Dec 7, 2016 =

* Correct text domains
* Change h1s to h3s sidebars

= 1.4.5, Oct 10, 2016 =
* Added support for WPGLOBUS

= 1.4.4, Aug 11, 2016 =
* Fix font family not updating in customizer preview
* Added hook for child theme customizer options

= 1.4.3, Aug 3, 2016 =
* Add Jetpack Infinite Scroll compatibility 

= 1.4.2, Jul 15, 2016 =
* Added ability to change the position of the sidebar on inner pages 

= 1.4.1, Jun 30, 2016 =
* Tested for WooCommerce v2.6.1 compatibility


= 1.4, Apr 21, 2015 =
* Removed default widgets from the inner sidebar
* Added sass files
* Updated to Font Awesome v4.6.1
* Fixed dropdown color setting in customizer

= 1.3, Nov 23, 2015 =
* Improved theme info dashboard layout
* Fixed "Post Comment" button color
* Tested for WooCommerce v2.4.10 compatibility

= 1.2, Aug 4, 2015 =
* Fixed Google Fonts customizer settings
* Updated sticky nav for desktop
* Improved mobile navigation display

= 1.1.1, July 23, 2015 =
* Fixed false positive theme update notice
* Fixed Rescue Shortcodes plugin notice on theme info page

= 1.1, July 15, 2015 =
* Added option to display slider images as fixed
* Added logo image height and width option
* Corrected background image behavior for iOS devices
* Improved post and comments display in mobile
* Updated .pot translation file

= 1.0, Jul 6, 2015 =
* Initial release
