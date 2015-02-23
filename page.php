<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package magicstudio
 */

get_header(); ?>

<?php if( has_post_thumbnail() ) {
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
} ?>

<div id="background" class="fullscreen" style="background:url(<?php echo $thumb[0];?>) no-repeat center center;"></div>

	<div id="template-primary" class="content-area">
		<main id="main" class="site-main container" role="main">
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
					
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<?php echo the_content();?>
							</div>	
						</div>	
					<?php endwhile; // end of the loop. ?>
				</div>	
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
