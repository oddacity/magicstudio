<?php
/**
 *
 * Template Name: Team
 *
 */
get_header(); ?>

<?php if( has_post_thumbnail() ) {
	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
} ?>

<div id="background" class="fullscreen" style="background:url(<?php echo $thumb[0];?>) no-repeat center center;"></div>

<div id="template-team">
	<div class="container">
		<div class="row">

			<h1><?php echo the_title();?></h1>

			<div class="inner col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-1">
				<?php 
					$args = array(
						'posts_per_page'   => -1,
						'post_type'        => 'magicstudio_team',
						'post_status'      => 'publish',
						'suppress_filters' => true,
					);
					$posts = get_posts( $args ); 
				?>	

				<?php foreach ( $posts as $post ) : setup_postdata( $post );

					if( has_post_thumbnail() ) {
						$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
					} ?>

					<article class="team-member col-lg-12 col-md-12">
						<div class="row">
							<figure class="photo col-lg-2 col-md-2 col-sm-4 col-xs-12">
								<img class="lazy" data-original="<?php echo $thumb[0];?>" src="<?php echo $thumb[0];?>" alt="<?php echo the_title();?>"/>
								<figcaption>
									<h2 class="italic"><?php echo the_title();?></h2>
								</figcaption>
							</figure>
							<figure class="mobile-photo col-lg-2 col-md-2 col-sm-4 col-xs-12">
								<div class="wrap">
									<img class="lazy" data-original="<?php echo $thumb[0];?>" src="<?php echo $thumb[0];?>" alt="<?php echo the_title();?>"/>
								</div>
								<figcaption>
									<div class="wrap">
										<h2>
											<?php echo the_title();?>
											<span class="italic">
												<?php echo the_field('title');?>
											</span>
										</h2>
									</div>	
								</figcaption>
							</figure>
							<div class="push col-lg-1 col-md-1 col-sm-1 hidden-xs"></div>
							<div class="bio col-lg-9 col-md-9 col-sm-7 col-xs-12" id="<?php echo $post->ID;?>">
								<header>
									<h2><?php echo the_title();?></h2>
									<h3><?php echo the_field('title');?></h3>
								</header>
								<p><?php echo the_field('bio');?></p>
							</div>
						</div>
					</article>

				<?php endforeach;
				wp_reset_postdata();?>
			</div>	

		</div>	

	</div>
</div>

<?php get_footer(); ?>