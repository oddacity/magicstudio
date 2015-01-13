<?php
/**
 *
 * Template Name: Services
 *
 */
get_header(); ?>

<?php if( has_post_thumbnail() ) {
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
} ?>

<div id="background" class="fullscreen" style="background:url(<?php echo $thumb[0];?>) no-repeat center center;"></div>

<div id="template-services">
	<div class="container">

		<?php get_template_part('/template-modules/service-section');?>

	</div>
</div>

<?php get_footer(); ?>