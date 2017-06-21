<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package yourmembership
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-MZMRHW"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MZMRHW');</script>
<!-- End Google Tag Manager -->

<div id="request-demo">
	<div id="demo-tab">
		<img src="<?php echo get_template_directory_uri(); ?>/images/demo-tab.png">
	</div>
	<div id="demo-form">
		<a id="close" class="demo-close" href="javascript:void(0);">
			<img src="<?php echo get_template_directory_uri(); ?>/images/close.png">
		</a>
		<?php //echo do_shortcode( '[gravityform id="1" title="false" description="false" ajax="true"]' ); ?>
		<?php the_field('request_a_demo_form', 'option'); ?>
	</div>
</div>

<header class="header">
	<div class="navbar navbar-inverse navbar-fixed-top">
		<?php if ( get_field('announcement_bar', 'option') ): ?> 
			<div class="announce-bar">
				<div class="container">
					<?php the_field('announcement_bar', 'option'); ?>
				</div>
			</div>
		<?php endif; ?>
		<div class="container">
			<div class="navbar-header">
				<a class="nav-toggle">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="menu-text">Menu</span>
				</a>
				<a class="navbar-brand" href="/">yourmembership.com</a>
			</div>
			<div class="nav-main">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'primary-menu') ); ?>
				<ul class="toolbar">
					<li class="contact"><a href="/contact">Contact</a></li>
					<li class="blog"><a href="/resource-library/blog">Blog</a></li>
					<li class="careers"><a href="http://www.recruitingsite.com/csbsites/yourmembership/index.asp">Careers</a></li>
				</ul>				
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</header>


<div id="content" class="site-content">
