<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Gateway
 */
?>

	</div><!-- #content -->

	<div class="footer-wrap clear">

		<footer id="colophon" class="site-footer" role="contentinfo">

			<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) : ?>

				<div class="footer-widgets">

					<div class="widget-area">

						<?php if ( is_active_sidebar( 'footer-1' ) ) { ?>

							<?php dynamic_sidebar( 'footer-1' ); ?>

						<?php } ?>

					</div><!-- .widget-area -->

					<div class="widget-area">

						<?php if ( is_active_sidebar( 'footer-2' ) ) { ?>

							<?php dynamic_sidebar( 'footer-2' ); ?>

						<?php } ?>

					</div><!-- .widget-area -->

					<div class="widget-area">

						<?php if ( is_active_sidebar( 'footer-3' ) ) { ?>

							<?php dynamic_sidebar( 'footer-3' ); ?>

						<?php } ?>

					</div><!-- .widget-area -->

				</div><!-- .footer-widgets -->

			<?php endif; ?>

			<div class="site-info">
				<a href="<?php echo esc_url( esc_html__( 'http://wordpress.org/', 'gateway' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'gateway' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'gateway' ), 'Gateway', '<a href="http://rescuethemes.com/" rel="designer">Rescue Themes</a>' ); ?>
			</div><!-- .site-info -->

		</footer><!-- #colophon -->

	</div><!-- .footer-wrap -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
