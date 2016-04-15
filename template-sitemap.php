<?php 
/*
Template Name: Automagic sitemap

This is a custom page template. 
You apply it to any page in the admin panel by choosing it from the dropdown

This will generate a complete sitemap of all posts, pages, and categories
*/

get_header(); //include header.php ?>

<main id="content">
	<?php //THE LOOP
		if( have_posts() ): ?>
		<?php while( have_posts() ): the_post(); ?>

		<article id="post-<?php the_ID(); ?>" 
		<?php post_class('cf clearfix'); ?>>
			<h2 class="entry-title"> 
				<a href="<?php the_permalink(); ?>"> 
					<?php the_title(); ?> 
				</a>
			</h2>
			<?php the_post_thumbnail('large'); //don't forget to activate in functions ?>
			<div class="entry-content">
				<?php the_content(); ?>
				<section class="onethird">
					<h3>Pages:</h3>
					<ul>
						<?php wp_list_pages(array(
							'title_li' => '',
							'sort_column' => 'post_title',
						)); ?>
					</ul>
				</section>
				<section class="onethird">
					<h3>Categories:</h3>
					<ul>
						<?php wp_list_categories(array(
							'title_li' => '',
							'show_count' => true,
							'feed' => 'rss',
						)); ?>
					</ul>
				</section>
				<section class="onethird">
					<h3>Posts:</h3>
					<ul>
						<?php wp_get_archives( array(
							'type' => 'alpha',  //each post, alphabetically by title
						) ); ?>
					</ul>
				</section>
			</div>
					
		</article><!-- end post -->

		<?php endwhile; ?>
	<?php else: ?>

	<h2>Sorry, no posts found</h2>
	<p>Try using the search bar instead</p>

	<?php endif;  //end THE LOOP ?>

</main><!-- end #content -->

<?php get_footer(); //include footer.php ?>