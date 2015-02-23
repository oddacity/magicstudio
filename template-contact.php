<?php
/**
 *
 * Template Name: Contact
 *
 */
get_header(); 
the_post(); ?>

<?php if( has_post_thumbnail() ) {
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
} ?>

<div id="background" class="fullscreen" style="background:url(<?php echo $thumb[0];?>) no-repeat center center;"></div>

<div id="template-contact">
	<div class="container">
		<div class="row">

			<h1><?php echo the_title();?></h1>

			<div class="inner col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-1">
				
				<?php if(get_field('intro')) : ?>
					<header class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<h2 class="text-aligncenter"><?php echo the_field('intro');?></h2>
						</div>
					</header>
				<?php endif;?>
					
				<div class="row">
					<div class="contact-form col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<?php if( function_exists( 'ninja_forms_display_form' ) ){ ninja_forms_display_form( 1 ); } ?>
					</div>
					<div class="contact-info col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-12 col-xs-12">
						<h3><?php echo the_field('information');?></h3>
					</div>
				</div>
				
			</div>	

		</div>	
	</div>
</div>

<?php get_footer(); ?>