<?php
/**
 * The single product page template file
 *
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package YM
 * @since   1.0
 * @version 1.0
 */


/**
 * Move breadcrumbs
 */
//remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );


/**
 * Output CPT Heading with Icon
 */
add_action( 'genesis_before_entry', function () {
	$icon = '/wp-content/themes/ym/dist/images/press-release-icon.svg';

	echo '<div class="cpt-header"><h2><img src="' . $icon . '"> Press Releases</h2></div>';
});



/**
 * Reposition Date before Entry Title
 */
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
add_action( 'genesis_before_entry', 'genesis_post_info', 11 );


remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
/**
 * Output ACF Intro custom field
 */
add_action( 'genesis_entry_content', function () {
	$intro = get_field( 'intro' );
	$content = get_field( 'press_release_body' );

	if ( ! $intro && ! $content ) {
		return;
	}

	echo '<div class="entry-content" itemprop="text">';

	if ( null !== $intro ) {
		echo '<div class="post-intro-box">' . $intro . '</div>';
	}

	if ( null !== $content ) {
		echo $content;
	}

	echo '</div>';

}, 9 );





add_action( 'genesis_after_entry', __NAMESPACE__ . '\add_after_entry_sidebar_news', 5 );
/**
 *  Hook after post widget after posts
 */
function add_after_entry_sidebar_news() {
	if ( ! is_singular( 'news' ) ) {
		return;
	}

	genesis_widget_area( 'news-after-entry-sidebar', [
		'before' => '<section class="news-after-entry-sidebar widget-area">',
		'after'  => '</section>',
	] );
}


add_action( 'genesis_after_entry', __NAMESPACE__ . '\add_about_other_company_section', 10 );
/**
 *  About other company
 */
function add_about_other_company_section() {
	if ( get_field( 'about_other_company' ) || get_field_object( 'about_other_company_headingWysiwyg' ) ) : ?>
		<section class="about-other-company">
			<header><?php the_field( 'about_other_company_heading' ) ?></header>
			<div class="info"><?php the_field( 'about_other_company' ) ?></div>
		</section>
	<?php endif;
}



remove_action( 'genesis_sidebar', 'genesis_do_sidebar' );
add_action( 'genesis_sidebar', __NAMESPACE__ . '\add_single_sidebar_news' );
/**
 *  Hook single sidebar widget area to the sidebar
 */
function add_single_sidebar_news() {
	if ( ! is_singular( 'news' ) ) {
		return;
	}

	genesis_widget_area( 'news-single-sidebar', [
		'before' => '<div class="news-single-sidebar widget-area">',
		'after'  => '</div>',
	] );
}



genesis();
