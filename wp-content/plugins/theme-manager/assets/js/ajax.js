jQuery(document).ready( function($) {
    jQuery("#remove-modal").click( function() {
		tb_remove();
    });
	jQuery(".delete").click( function() {
		var slug = jQuery(this).data("slug");
		
		jQuery(this).text("Deleting...");
		
		var data = {
			action: 'thememanager_processor',
            theme: slug
		};

	 	jQuery.post(thememanager.ajaxurl, data, function(response) {
			jQuery("#thememanager-result").append(response);
			tb_remove();
			jQuery('[data-item="' + slug + '"]').hide();
	 	});
		
	 	return false;
	});
});