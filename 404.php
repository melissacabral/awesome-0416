<?php get_header(); //include header.php ?>

<main id="content">
		<article class="hentry error-404">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/404.jpg">
			<h2 class="entry-title">The page you're looking for could not be found. </h2>
			<div class="entry-content">				
				<h3>Try a search to get you back on track</h3>
				<?php get_search_form(); ?>
			</div>					
		</article><!-- end post -->
</main><!-- end #content -->
<?php get_sidebar(); ?>
<?php get_footer(); //include footer.php ?>