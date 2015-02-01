<?php if(get_field('include_cta')) : ?>
	<div class="cta">
		<div class="row">
			<span><?php echo the_field('button_pretext');?></span><a href="<?php echo the_field('button_link');?>" class="btn btn-white btn-big"><?php echo the_field('button_text');?></a>
		</div>
	</div>
<?php endif;?>