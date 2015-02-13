<?php foreach (get_terms('service-types') as $term): 
	$name = $term->name;
	$slug = $term->slug;
	$description = $term->description;
	$count = 1;
?> 

<div id="<?php echo $slug;?>" class="service-section">
	<h1><?php echo $name;?></h1>
	<h3 class="callout"><?php echo the_field('rates',$term);?></h3>
	
	<p><?php echo $description;?></p>
	<?php 
		$top = array(
			'posts_per_page'   => 4,
			'post_type'        => 'magicstudio_services',
			'post_status'      => 'publish',
			'suppress_filters' => true,
			'service-types'    => $term->slug
		);
		$posts_top = get_posts( $top ); 
		$excludePosts = array();
	?>	
	
	<div class="row">
		<?php foreach ( $posts_top as $post ) : setup_postdata( $post ); 

			array_push($excludePosts, $post->ID); 

			if( has_post_thumbnail() ) {
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
			} ?>

			<article class="service col-lg-3 col-md-3">
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
						<a href="#" data-toggle="modal" data-target="#<?php echo $slug . '-modal-' . $count;?>">
							<span>
								<img src="<?php echo get_template_directory_uri();?>/img/plus.png" alt="Learn More"/>
							</span>
						</a>
					</h3>
				</footer>

				<div class="modal fade" id="<?php echo $slug . '-modal-' . $count;?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $slug . '-modal-' . $count;?>" aria-hidden="true">
			        <div class="modal-content">
			        	<a href="#" class="modal-close"></a>
			            <div class="modal-content-inner container">
			            	<h1><?php echo the_title();?></h1>
			            	<p><?php echo the_field('service_description');?></p>
			            	
			            	<?php 
							$images = get_field('photo_gallery');

							if( $images ): ?>
						        <div class="modal-gallery">
						        	<div class="row">
								        <?php foreach( $images as $image ): ?>
								        	<div class="modal-img col-md-2">
								        		<img class="lazy" data-original="<?php echo $image['sizes']['medium'];?>" src="<?php echo $image['sizes']['medium'];?>"/>
								        	</div>
								        <?php endforeach; ?>
								    </div>
							    </div>
							<?php endif; ?>

							<?php get_template_part('template-modules/modal-cta');?>
			            </div>	
			    	</div>
				</div>
			</article>

		<?php 
			$count++;
			endforeach; 
			wp_reset_postdata();
			$comma = implode(',',$excludePosts); 
		?>
	</div>

	<?php 
		$bottom = array(
			'posts_per_page'   => 4,
			'post_type'        => 'magicstudio_services',
			'post_status'      => 'publish',
			'suppress_filters' => true,
			'service-types'    => $term->slug,
			'exclude'		   => $comma
		);
		$posts_bottom = get_posts( $bottom ); 
	?>	

	<div class="row">
		<?php foreach ( $posts_bottom as $post ) : setup_postdata( $post ); 

			if( has_post_thumbnail() ) {
				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
			} ?>

			<article class="service col-lg-3 col-md-3">
				<header class="service-title">
					<h2 class="italic">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#<?php echo $slug . '-' . $count;?>" href="#<?php echo $slug . '-' . $count;?>">
							<?php the_title();?>
						</a>
					</h2>
				</header>	
				<div id="<?php echo $slug . '-' . $count;?>" class="collapse out">
					<div class="service-summary">
						<p><?php echo the_field('service_summary');?></p>
					</div>
					<footer class="service-cta">
						<h3>
							<a href="#" data-toggle="modal" data-target="#<?php echo $slug . '-modal-' . $count;?>">
								<span>
									<img src="<?php echo get_template_directory_uri();?>/img/plus.png" alt="Learn More"/>
								</span>
							</a>
						</h3>
					</footer>
				</div>	

				<div class="modal fade" id="<?php echo $slug . '-modal-' . $count;?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $slug . '-modal-' . $count;?>" aria-hidden="true">
			        <div class="modal-content">
			        	<a href="#" class="modal-close"></a>
			            <div class="modal-content-inner container">
			            	<h1><?php echo the_title();?></h1>
			            	<p><?php echo the_field('service_description');?></p>
			            	
			            	<?php 
							$images = get_field('photo_gallery');

							if( $images ): ?>
						        <div class="modal-gallery">
						        	<div class="row">
								        <?php foreach( $images as $image ): ?>
								        	<div class="modal-img col-md-2">
								        		<img class="lazy" data-original="<?php echo $image['sizes']['medium'];?>" src="<?php echo $image['sizes']['medium'];?>"/>
								        	</div>
								        <?php endforeach; ?>
								    </div>
							    </div>
							<?php endif; ?>

							<?php get_template_part('template-modules/modal-cta');?>
			            </div>	
			    	</div>
				</div>
			</article>

		<?php 
			$count++;
			endforeach; 
			wp_reset_postdata();
		?>
	</div>

</div>

<?php endforeach;
wp_reset_postdata();?>