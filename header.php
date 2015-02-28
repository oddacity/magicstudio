<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package magicstudio
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri();?>/ico/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri();?>/ico/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri();?>/ico/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri();?>/ico/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri();?>/ico/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri();?>/ico/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri();?>/ico/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri();?>/ico/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri();?>/ico/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri();?>/ico/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri();?>/ico/android-chrome-192x192.png" sizes="192x192">
<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri();?>/ico/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri();?>/ico/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="<?php echo get_template_directory_uri();?>/ico/manifest.json">
<link rel="shortcut icon" href="<?php echo get_template_directory_uri();?>/ico/favicon.ico">
<meta name="msapplication-TileColor" content="#666666">
<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri();?>/ico/mstile-144x144.png">
<meta name="msapplication-config" content="<?php echo get_template_directory_uri();?>/ico/browserconfig.xml">
<meta name="theme-color" content="#ffffff">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div class="animsition">

		<div id="page" class="hfeed site">
			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'magicstudio' ); ?></a>

			<header id="masthead" class="site-header container" role="banner">
				<div class="row">
					<?php get_template_part('/template-modules/branding');?>
					<?php get_template_part('/template-modules/nav');?>
					<?php get_template_part('/template-modules/social');?>
				</div>
			</header><!-- #masthead -->

			<div id="content" class="site-content">
