<?php
/**
 * Functions that modify the appearance of the
 * wp-admin dashboard
 */

namespace DevDesigns\YM;

/**
 * Force Yoast SEO metabox to the bottom of the edit screen
 */
add_filter( 'wpseo_metabox_prio', function () {
	return 'low';
} );



/**
 * Load flexible content rows closed as opposed to the
 * default state of open
 */
add_action( 'admin_print_footer_scripts', function () {
	?>

	<script type="text/javascript">
        (function () {
          var layout = document.querySelectorAll('.layout');

          if (layout) {
            var addCssClassToLayoutEl = Array.prototype.map.call(layout, function (obj) {
              return obj.classList.add('-collapsed');
            });
          }

        })();
	</script>

	<?php
}, 99 );



