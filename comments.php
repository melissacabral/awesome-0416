<?php 
/*
The file that displays the list of comments and the comment form. 
This file is included when we call comments_template()
it is used on single.php and page.php
*/ 

//hide this file if the post is password protected
if( post_password_required() ){
	echo 'Enter the password to see the comments';
	return; //end this file 
}

//get the count of comments vs trackabacks
$comments_by_type = separate_comments( $comments );
$comment_count = count($comments_by_type['comment']);
$pings_count = count($comments_by_type['pings']);
?>

<section id="comments" class="cf clearfix">

	<h3 class="comments-title"><?php echo $comment_count; ?> Comments | <a href="#respond">Leave a Comment</a></h3>

	<ul class="commentlist">
		<?php wp_list_comments( array(
			'type' => 'comment', //exclude pingbacks & trackbacks
			'avatar_size' => 50, //px square
		) ); ?>
	</ul>

	<div class="pagination">
		<?php previous_comments_link(); ?>
		<?php next_comments_link(); ?>
	</div>

</section>

<?php comment_form(); ?>

<?php if( $pings_count >= 1 ){ ?>
<section class="trackbacks cf clearfix">
	<h3 class="comments-title"><?php echo $pings_count; ?> sites mentioned this post:</h3>
	<ul>
		<?php wp_list_comments( array(
			'type' => 'pings', //just pingbacks & trackbacks
		) ); ?>
	</ul>
</section>
<?php } //end if there are pings ?>
