<?php
/**
 * The header for template-home.php
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Gateway
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

<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'gateway' ); ?></a>

	<div class="header-bg">
		<div class="site-branding">

			<?php
			if ( function_exists( 'jetpack_the_site_logo' ) && jetpack_has_site_logo() ) {
				jetpack_the_site_logo();
			} // endif function_exists( 'jetpack_the_site_logo' ) ?>

			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" alt="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>

		</div><!-- .site-branding -->

	</div><!-- .header-bg -->

	<header id="masthead" class="site-header" role="banner">

		<div class="stick">

			<nav id="site-navigation" class="main-navigation clear" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'gateway' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->

		</div><!-- .sticky -->

	</header><!-- .row #masthead -->

	<div id="content" class="site-content">
