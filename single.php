<?php get_header(); //include header.php ?>

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
				<?php 
				//if viewing a single post or page, show full content. otherwise, show the short content (excerpt)
				if( is_singular() ){
					the_content();
				}else{
					the_excerpt();
				}
				 ?>
			</div>
			
			<?php 
			//if the post has <!--nextpage--> breaks
			wp_link_pages( array(
					'before' => '<div class="pagination">Continue reading this post: ',
					'after' => '</div>',
					'next_or_number' => 'next',
				) );  ?>
			
			<div class="postmeta"> 
				<span class="author"> Posted by: <?php the_author(); ?></span>
				<span class="date"><a href="<?php the_permalink(); ?>"><?php the_date(); ?></a></span>
				<span class="num-comments"> <?php comments_number(); ?></span>
				<span class="categories"><?php the_category(); ?></span>
				<span class="tags"><?php the_tags(); ?></span> 
			</div><!-- end postmeta -->			
		</article><!-- end post -->


		<?php comments_template(); ?>

		<?php endwhile; ?>

		<?php awesome_pagination(); ?>

	<?php else: ?>

	<h2>Sorry, no posts found</h2>
	<p>Try using the search bar instead</p>

	<?php endif;  //end THE LOOP ?>

	<?php //show 3 posts in the same category as this post.
	//what category is this post in?
	$cats = wp_get_post_categories( $post->ID );

	$related_query = new WP_Query( array(
		'cat' 			 		=> $cats[0], //the first category of this post
		'post__not_in'			=> array( $post->ID ),  //omit THIS post
		'posts_per_page' 		=> 3,
		'ignore_sticky_posts' 	=> 1,
	) );
	if( $related_query->have_posts() ){
	?>

	<section class="related-posts">
		<h3>Other posts you might like:</h3>
		<ul>
		<?php while( $related_query->have_posts() ){
				$related_query->the_post(); ?>
			<li>
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'thumbnail' ); ?>
					<h4><?php the_title(); ?></h4>
				</a>
			</li>
			<?php }//end while ?>
		</ul>
	</section>
	<?php 
	} //end if
	wp_reset_postdata();
	//end of custom query for related posts ?>

</main><!-- end #content -->

<?php get_sidebar(); //include sidebar.php ?>
<?php get_footer(); //include footer.php ?>