<?php 
/*
use this file to activate or create any functionality 
that is related to look & feel. 
WordPress will automatically load it before all template files
 */

//activate "sleeping features"
add_theme_support('post-thumbnails');

/**
 * special image size for the front page banner
 *	don't forget to use the plugin "force regenerate thumbnails"
 *	after creating or changing image sizes. 
 *
 *					name 		w 	h 	 crop?
 */
add_image_size( 'big-banner', 1050, 300, true );

//no close PHP