<?php
/**
 * Template part for displaying the page headers
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package yourmembership
 */

?>



<?php 
	$image = get_field('image');
	$title = get_field("title");
	$no_header = get_field("no_header")
?>


<?php if (empty($no_header)): ?>

	<?php if($image && $title): ?>
		<div class="image-header" style="background-image:url(<?php echo $image['url']; ?>);">
			<div class="image-header-inner container">
				<div class="title">
					<h1><?php echo $title; ?></h1>
				</div>
			</div>
		</div>
	<?php else: ?>
		<div class="image-header">
			<div class="image-header-inner container">
				<div class="title">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</div>
			</div>
		</div>	
	<?php endif; ?>

<?php endif; ?>


