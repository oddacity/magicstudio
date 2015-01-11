<?php
/**
 *
 * Template Name: Home
 *
 */
get_header(); ?>

<?php if( has_post_thumbnail() ) {
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
} ?>

<div id="background" class="fullscreen" style="background:url(<?php echo $thumb[0];?>) no-repeat center center;"></div>

<div id="template-home">
	<div class="container">
		<div class="row">
			
		</div>
	</div>
</div>

<?php get_footer(); ?>