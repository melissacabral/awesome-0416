<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ); ?>/styles/reset.css" />
	<?php 
	//Necessary in <head> for JS and plugins to work. 
	//I like it before style.css loads so the theme stylesheet is more specific than all others.
	wp_head();  ?>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
</head>
<body <?php body_class(); ?>>	
	<div id="wrapper">
	<header role="banner">

		<?php 
		//Custom Logo Display.
		//this is a new feature, so check if it is available first
		if( function_exists('the_custom_logo') ){
			the_custom_logo(); //don't forget to add theme support 
		}?>

		<div class="top-bar clearfix">
			<h1 class="site-name">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'name' ) ?>" rel="home"> 
					<?php bloginfo('name'); ?> 
				</a>
			</h1>
			<h2 class="site-description"> <?php bloginfo('description'); ?> </h2>
			<nav>
				<ul class="nav">
					<?php wp_list_pages( array(
						'depth' => 1,
						'title_li' => '',
						) ); ?>
					</ul>
				</nav>
		</div><!-- end .top-bar -->
		
		<ul class="utilities">
			<li><a href="/contact-us/">Contact Us</a></li>
			<li><a href="/location/">Location</a></li>
		</ul>
		<?php get_search_form(); //includes searchform.php if it exists, if not, this outputs the default search bar ?>	
	</header>
