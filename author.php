<?php
/**
 * Template Name: Author
 *
 */
?>
<?php get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div class="row ">
	<div class="columns twelve">
		<?php if ( have_posts() ): the_post(); ?>
			<h2>Author Archives: <?php echo get_the_author() ; ?></h2>

			<?php if ( get_the_author_meta( 'description' ) ) : ?>
				<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
				<h3>About <?php echo get_the_author() ; ?></h3>
				<?php the_author_meta( 'description' ); ?>
			<?php endif; ?>

			<?php rewind_posts(); while ( have_posts() ) : the_post(); ?>
				<?php get_template_part('parts/content/content', get_post_format() ); ?>	
			<?php endwhile; ?>

		<?php else: ?>
			<h2>No posts to display for <?php echo get_the_author() ; ?></h2>	
		<?php endif; ?>
	<div>
</div>		

<?php get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>