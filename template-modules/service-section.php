<?php foreach (get_terms('service-types') as $term): 

	$args = array(
		'posts_per_page'   => 4,
		'post_type'        => 'magicstudio_services',
		'post_status'      => 'publish',
		'suppress_filters' => true,
		'service-types' => $term->slug
	);
	$posts = get_posts( $args ); 
	$name = $term->name;
	$slug = $term->slug;
?> 

<div class="row">
	<div id="<?php echo $slug;?>" class="service-section">
		<h1><?php echo $name;?></h1>
		<?php foreach ( $posts as $post ) : setup_postdata( $post ); ?>
			<article class="col-lg-3 col-md-3">
				<header class="service-title">
					<h2><?php the_title();?></h2>
				</header>	
				<div class="service-summary">
					<?php echo the_field('service_summary');?>
				</div>
			</article>
		<?php endforeach; 
		wp_reset_postdata();?>
	</div>	
</div>

<?php endforeach;
wp_reset_postdata();?>