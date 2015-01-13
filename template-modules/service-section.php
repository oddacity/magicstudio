<?php foreach (get_terms('departments') as $term): 

	$args = array(
		'post_type'        => 'magicstudio_services',
		'post_status'      => 'publish',
		'suppress_filters' => true,
		'service-types' => $term->slug
	);
	$posts = get_posts( $args ); 
?> 

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