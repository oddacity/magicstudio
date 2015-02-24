<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package magicstudio
 */
?>

			</div><!-- #content -->

			<footer id="colophon" class="site-footer sticky" role="contentinfo">
				<div class="site-info container">
					<div class="row">
						<div class="col-md-12">
							<h3 class="alignleft">
								232 Carruthers Avenue, Ottawa, ON, Canada / 613.795.3545
							</h3>	
							<a href="/contact" class="btn btn-light alignright">Contact Us</a>
						</div>
					</div>
				</div><!-- .site-info -->
			</footer><!-- #colophon -->
		</div><!-- #page -->

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="/wp-content/themes/magicstudio/js/vendor/jquery-1.11.0.min.js"><\/script>')</script>

		<script src="<?php echo get_template_directory_uri();?>/js/vendor/polyfill.object-fit.core.js"></script>

		<script>
			$(document).ready(function(){
				objectFit.polyfill({
			        selector: 'img',
			        fittype: 'cover',
			        disableCrossDomain: 'true'
			    });
			});
		</script>

		<?php wp_footer(); ?>

	</div><!-- .animsition -->

</body>
</html>
