<?php
/**
 * Template Name: Page
 */
?>

<?php get_template_part('parts/shared/html-header'); ?>
<?php get_header() ?> 
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
<?php get_footer() ?>
<?php get_template_part('parts/shared/html-footer'); ?>

