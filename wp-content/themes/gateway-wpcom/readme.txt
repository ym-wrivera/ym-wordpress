=== Gateway WordPress Theme ===
Contributors: Rescue Themes, Automattic
Donate link:
Tags: art, artwork, blog, business, design, conservative, elegant, professional, traditional, site-logo, infinite-scroll, light, white, two-columns, right-sidebar, responsive-layout, featured-images, theme-options, flexible-header, custom-menu, custom-colors, threaded-comments, translation-ready, rtl-language-support, full-width-template, sticky-post, custom-header, custom-background, featured-content-with-pages
Requires at least: 4.1
Tested up to: 4.1
Stable tag: 1.1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

Gateway is the perfect mix of class and elegance, a traditional yet customizable home for your content. Reinforce your brand with a site logo, add a bold header image and call to action, and showcase your best posts or a video with a special Homepage template.

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Jetpack ==

Gateway supports multiple Jetpack features, including Infinite Scroll, Featured Content, and Site Logos. Download at http://jetpack.me/

== Theme Options ==

All theme customization options are located at "Appearance > Customize > Theme Options".

* General: Choose the display of your site's Custom Header (fixed or scroll)
* Homepage: Configure your site's Homepage template.

== Homepage Template ==

Use the Homepage template (seen in action on the Gateway demo site at http://gatewaydemo.wordpress.com/) to show off your best work with a bold headline, a call to action, Featured Content, or a video. Here's how to set it up:

* Create a new Page, and assign it the Homepage template under Page Attributes. The title and content of this page will be displayed beneath the header.
* Assign the page a Featured Image to appear as a background to the header. If no Featured Image is assigned, your Custom Header will be used instead.
* Publish the page.
* Navigate to the Customizer.
* If you want to feature specific Posts or Pages, give them a specific tag, then enter that tag in the Featured Content area of the Customizer. If no tag is added, the Homepage template will display your last three posts, excluding Sticky posts:
* Go to Theme Options → Homepage.
* Set your site's Hero Title and Content in the provided fields. These will appear in the header area beneath your site branding:
* If you want, add the URL to a video – either one you've uploaded to your site, or from a supported service, like YouTube – and some additional content. These appear beneath the three featured posts, like this:
* Click Save Changes.
* Set the Page created in step 1 as a Static Home Page.

== Navigation ==

This theme supports one navigation menu in the header. You can edit this menu in WordPress at "Appearance > Menus".

== Widgets ==

This theme supports several widget areas, one in the sidebar and three in the footer. You can add widgets to these areas in "Appearance > Widgets".

== Buttons ==

Adding buttons to post content requires that you add content to your post in "Text" mode (rather than visual). Once in text mode, enter the following to display a button:

`<a class="button" href="#">Get In Touch</a>`

== Licenses ==

Underscores - ​http://underscores.me/
License: MIT License - http://foundation.zurb.com/learn/faq.html#question-3
Copyright: @automattic

Quattrocento, Fanwood  - https://www.google.com/fonts
License: SIL OFL 1.1 - https://www.google.com/fonts/attribution

Font Awesome - ​http://fontawesome.io
Fonts: SIL OFL 1.1, CSS: MIT License - http://fontawesome.io/license
Copyright: @davegandy

Default header image - Crow the Stone
http://crowthestone.com/image/96712415511
License: CC0 1.0 Universal (CC0 1.0) - http://creativecommons.org/publicdomain/zero/1.0/

== Changelog ==

= 24 May 2016 =
* Default header images function doesn't recognize the variable placeholder %s; use get_template_directory_uri() instead.

= 12 May 2016 =
* Add new classic-menu tag.

= 5 May 2016 =
* Move annotations into the `inc` directory.

= 4 May 2016 =
* Move existing annotations into their respective theme directories.

= 22 April 2016 =
* Add featured-content-with-pages tag to style.css and readme.txt.

= 15 April 2016 =
* Fix customizer preview for hero title and content. Closes #3800

= 11 March 2016 =
* Clarify General Theme Options Wording.

= 25 February 2016 =
* Add blog-excerpts tag.

= 19 January 2016 =
* Allow users to add their own videos (mp4, m4v etc...) to the homepage via the Video URL Homepage Template theme option.

= 11 November 2015 =
* add Page excerpt support since Featured Content is enabled for pages and uses `the_excerpt()` in the template files.

= 5 November 2015 =
* Adding check in JS to make sure browser window is tall enough before actually making masthead sticky.

= 10 August 2015 =
* updating screenshot to match main image in showcase and the demo site.
* Horizontaly center header image

= 31 July 2015 =
* Allow tablets to access submenu items in the site navigation.
* Remove `.screen-reader-text:hover` and `.screen-reader-text:active` style rules.
* Remove unprintable character from the theme description.

= 16 July 2015 =
* Always use https when loading Google Fonts. See #3221;

= 2 July 2015 =
* Allow site logo to be 100% width on small screens

= 29 June 2015 =
* Update version number and readme for download generation
* Add `min-height` to header background div
* Break long words in sub menus on large screens to prevent text overflowing containers

= 25 June 2015 =
* Remove a word "Primary" from mobile navigation. It's awkward and the theme only has one theme location anyway.

= 11 June 2015 =
* Attempting to fix issues with background image height when background position is set to fixed;
* Improvements to custom header background image implementation aimed to fix pixelated image issue when backgrund attachement is set to fixed; Related to #3193;
* Fixed sanitization function for header position, which prevented setting from being saved; Fixes #3195;

= 2 June 2015 =
* fix `sprintf` placeholder.

= 1 June 2015 =
* Update style.css description
* Only allow fixed positioning of the background image on larger screens; background-size: cover won't work with fixed background positioning, and this is mostly apparent on small devices
* Oops; display excerpt instead of the content on blog page content.php template
* Trying to figure out background-size property for header area; add some space below the Older Posts button
* Remove unnecessary WP.com-specific styles; make sure background covers the available width on small devices
* Ensure sharing links don't appear in theme options content areas; simplify.
* Make sure translation escaping doesn't output raw HTML in read more links
* Updates to commnts title sizing; escaping translations
* Escaping translations; add fallback text for comment links and permalinks on home and default content templates
* Add archive title and description fallback functions; escaping for translations; minor cleanup
* More updates to readme
* begin updating Readme.txt; update description in style.css
* Fix missed text domain

= 29 May 2015 =
* Update language to use proper Homepage instead of Home Page

= 28 May 2015 =
* New Screenshot.png
* Style Blogroll widget to match other widget lists
* Style captions; style blockquotes to match the original theme
* Don't set fixed height on textareas
* Additional improvements to comment styles; fix mobile relative positioning on the body tag
* Improvements for comments on mobile, particularly nested comments
* Remove customizations from comment_form()
* Fix for next month link on calendar widget
* Register default header image and add thumbnail; tweak name of Header Image Adjustment theme option; don't prefix gradient CSS for home page header

= 27 May 2015 =
* Adjust content width for different templates
* Adjustments to featured image sizes for different screen sizes
* Adjust position of featured image within Sticky posts; add gradient to Home page header image
* Clean up RTL.css
* Adjustments to RTL styles
* Begin adding RTL styles; fix background color for tables in the footer
* Account for the admin bar when the sticky header is active by localizing is_admin_bar_showing
* Adjust sticky header positioning for logged in/logged out users
* Make sure sticky header stays above the content
* Add sticky header for large screens
* Fix for non-IS posts navigation styles
* Remove Home Hero sidebar registration;

= 26 May 2015 =
* Ensure video/aside columns look great even if only one is available. add tags to style.css

= 25 May 2015 =
* Consolidate theme options into their own panel and break into meaningful sections
* Additional improvements to Customizer JS for theme options fields; styling for video area on home page template
* Capitalize Home Page template name properly in Customizer strings; style video section of home page template
* Major changes to theme options, reconfiguring of home page template to remove widget area in the header, replacing instead with theme mods in the Customizer; now the home page can be configured from less panels at once. Added a field for a video in the secondary content area beneath the featured posts, and moved the_content() below the title, which is more intuitive.
* Improved styles for comments and pingbacks
* Improved spacing for mobile devices for the home page
* Clean up social icons widget to better match theme appearance; adjust media queries
* Better styles for mobile menu
* Styles for comment author name
* Tweaks to font sizes for mobile view.
* Set smaller bottom margin on site title
* Make sure infinite footer always appears above slideshow images
* Clean up alignments, blockquotes, minor CSS cleanup

= 23 May 2015 =
* Lots of margin/padding/font size updates to make font sizes easier for human comprehension/memory, make full-page template full width
* Style 404 page
* Lots of minor style updates for vertical rhythm, spacing, style social media icons widget further, add HR divider on home page template
* Put Edit links with permalinks/comments link in post meta on blog index/archives/home page template; style social links for WP.com; add postMessage support to home subtitle; remove commented-out comments link in entry-footer function
* Fix styles for featured images on blog index/archives; add styles for wordpress.com widget tag cloud
* only display featured-image div if a featured image is present.
* Improvements to margins/padding on mobile devices; update footer credit to reflect author
* Remove modernizr; add navigation.js script to fix mobile toggle menu; begin styling toggle menu; fix Customizer bug with changing site title/description color
* Clean up styles, removing unnecessary prefixed transition rules, reorder theme options
* Adjust nested list styles; add ability to change background attachment of custom header

= 22 May 2015 =
* Give nested comments a bit more breathing room
* Additional adjustments for comment meta styles
* Styles for comment navigation and pingback/trackback edit links
* Additional styles for menu
* Remove unused logo file
* Make featured image on home page template display in place of the custom header
* Add proper title argument for theme options section in Customizer; use correct escaping function around subtitle on home page template
* Begin re-adding theme options from original, where necessary; style footer widgets area
* Make post navigation look like original theme
* Style menu to look like the original
* Update home page query to pull back latest three posts rather than featured posts if no posts are featured
* Add back default header image; begin cleaning up and styling home page template
* Simplify comment styles and match original theme using updated HTML5 markup
* Fix Infinite Scroll by defining a custom render loop, pointing to the template-parts directory
* Moving from /dev/ to /pub/
