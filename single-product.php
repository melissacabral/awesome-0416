<?php get_header(); //include header.php ?>

<main id="content">

	<a href="<?php echo get_post_type_archive_link( 'product' ); ?>" class="button">
	&larr; Back to Shop
	</a>
	<?php //THE LOOP
		if( have_posts() ): ?>
		<?php while( have_posts() ): the_post(); ?>

		<article id="post-<?php the_ID(); ?>" 
		<?php post_class('cf clearfix'); ?>>
			<h2 class="entry-title"> 
				<?php the_title(); ?> 
			</h2>

			<?php the_terms( $post->ID, 'brand', '<h3>Brand: ', ', ' , '</h3>' ); ?>

			<?php the_post_thumbnail('large', array( 'class' => 'product-image' )); ?>
			<div class="entry-content">
				<?php the_meta(); //list of all custom fields (price & size) ?>

				<?php the_content(); ?>
				<?php the_terms( $post->ID, 'feature', '<h3>Delicious Features:<ul><li> ', '</li><li> ' , '</li></ul>' ); ?>
			</div>
			
			<?php 
			//if the post has <!--nextpage--> breaks
			wp_link_pages( array(
					'before' => '<div class="pagination">Continue reading this post: ',
					'after' => '</div>',
					'next_or_number' => 'next',
				) );  ?>			
				
		</article><!-- end post -->


		<?php endwhile; ?>

		

	<?php else: ?>

	<h2>Sorry, no posts found</h2>
	<p>Try using the search bar instead</p>

	<?php endif;  //end THE LOOP ?>

</main><!-- end #content -->


<?php get_footer(); //include footer.php ?>