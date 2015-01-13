<?php
/**
 *
 * Template Name: Services
 *
 */
get_header(); ?>

<?php 
	$args = array(
		'post_type'        => 'magicstudio_services',
		'post_status'      => 'publish',
		'suppress_filters' => true 
	);
	$posts = get_posts( $args ); 
?> 

<?php if( has_post_thumbnail() ) {
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
} ?>

<div id="background" class="fullscreen" style="background:url(<?php echo $thumb[0];?>) no-repeat center center;"></div>

<div id="template-services">
	<div class="container">
		<div class="row">
			<?php foreach ( $posts as $post ) : setup_postdata( $post ); ?>
				<div class="col-lg-4 col-md-4">
					<header class="service-title">
						<h2><?php the_title();?></h2>
					</header>	
				</div>
			<?php endforeach; 
			wp_reset_postdata();?>
		</div>
	</div>
</div>

<?php get_footer(); ?>