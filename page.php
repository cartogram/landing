<?php
/**
 * Template Name: Page
 */
?>
<?php get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<section class="container">
	<div class="row">
		<div class="columns twelve">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<?php get_template_part('parts/content/content', get_post_format() ); ?>	
				<?php comments_template( '', true ); ?>
			<?php endwhile; ?>
		</div>
	</div>	
</section>
<?php get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>