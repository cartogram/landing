<?php
/**
 * Template Name: Category
 */
?>
<?php get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<section class="container">
	<div class="row">
		<div class="columns twelve">
			<?php if ( have_posts() ): ?>
			<h2>Category Archive: <?php echo single_cat_title( '', false ); ?></h2>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part('parts/content/content', get_post_format() ); ?>	
			<?php endwhile; ?>
			<?php else: ?>
			<h2>No posts to display in <?php echo single_cat_title( '', false ); ?></h2>
			<?php endif; ?>
		</div>
	</div>	
</section>
<?php get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>