<?php
/**
 * Template Name: Single
 */
?>
<?php get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<section class="container">
	<div class="row">
		<div class="columns twelve">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>	

				<?php get_template_part('parts/content/content', get_post_format() ); ?>	
	
				<?php if ( get_the_author_meta( 'description' ) ) : ?>
					<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
					<h3>About <?php echo get_the_author() ; ?></h3>
					<?php the_author_meta( 'description' ); ?>
				<?php endif; ?>

				<?php comments_template( '', true ); ?>

			<?php endwhile; ?>
		</div>
	</div>	
</section>
<?php get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>