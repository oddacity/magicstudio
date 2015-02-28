<?php foreach (get_terms('service-types') as $term): 
	$name = $term->name;
	$slug = $term->slug;
	$description = $term->description;
	$count = 1;
?> 

<div id="<?php echo $slug;?>" class="service-section col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-12 col-sm-offset-0 col-xs-10 col-xs-offset-1">
	<h1><?php echo $name;?></h1>
	<h3 class="callout"><?php echo the_field('rates',$term);?></h3>
	
	<p><?php echo $description;?></p>
	<?php 
		$args = array(
			'posts_per_page'   => -1,
			'post_type'        => 'magicstudio_services',
			'post_status'      => 'publish',
			'suppress_filters' => true,
			'service-types'    => $term->slug
		);
		$posts = get_posts( $args ); 
		$excludePosts = array();
	?>	
	
	<div class="row">
		<?php foreach ( $posts as $post ) : setup_postdata( $post ); 

			if( has_post_thumbnail() ) {
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
			} ?>

			<article class="service col-lg-4 col-lg-offset-0 col-md-6 col-md-offset-0 col-sm-6 col-sm-offset-0 col-xs-12 col-xs-offset-0">
				<header class="service-title">
					<h2 class="italic">
						<a class="accordion-toggle service-toggle" data-toggle="collapse" data-parent="#<?php echo $slug . '-' . $count;?>" href="#<?php echo $slug . '-' . $count;?>">
							<?php the_title();?>
						</a>	
					</h2>
				</header>
				<div id="<?php echo $slug . '-' . $count;?>" class="collapse out">	
					<div class="service-summary">
						<p><?php echo the_field('service_summary');?></p>
					</div>	
				</div>	
				<footer class="service-cta">
					<h3>
						<a class="modal-trigger" href="#/" data-url="type=<?php echo $post->post_name;?>" data-toggle="modal" data-target="#<?php echo $slug . '-modal-' . $count;?>">
							<span>
								<img src="<?php echo get_template_directory_uri();?>/img/plus.png" alt="Learn More"/>
							</span>
						</a>
					</h3>
				</footer>

				<div class="modal fade" data-url="type=<?php echo $post->post_name;?>" id="<?php echo $slug . '-modal-' . $count;?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $slug . '-modal-' . $count;?>" aria-hidden="true">
			        <div class="modal-content">
			        	<a href="#/" class="modal-close"></a>
			            <div class="modal-content-inner">
			            	<h1><?php echo the_title();?></h1>
			            	
			            	<?php 
								$images = get_field('photo_gallery');

								if( $images ): ?>
					            	<div class="row">
					            		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									        <div class="modal-gallery">
										        <?php foreach( $images as $image ): ?>
										        	<div class="modal-img">
										        		<img class="lazy" data-original="<?php echo $image['sizes']['medium'];?>" src="<?php echo $image['sizes']['medium'];?>"/>
										        	</div>
										        <?php endforeach; ?>
										    </div>
					            		</div>
					            		<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
					            			<p><?php echo the_field('service_description');?></p>
					            		</div>
					            	</div>
					        <?php else: ?>
					        	<div class="row">
				            		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				            			<p><?php echo the_field('service_description');?></p>
				            		</div>
				            	</div>
					        <?php endif; ?> 

			            	<div class="row">
			            		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			            			<?php get_template_part('template-modules/modal-cta');?>
			            		</div>
			            	</div>

			            </div>	
			    	</div>
				</div>

			</article>

		<?php 
			$count++;
			endforeach; 
		?>
	</div>

</div>

<?php endforeach;
wp_reset_postdata();?>