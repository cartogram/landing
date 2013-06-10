<?php
/**
 * Template Name: Page
 */
?>

<?php get_template_part('parts/shared/html-header'); ?>
<?php get_header() ?> 
<section class="container">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<div class="row">
		
		</div>
		<?php endwhile; ?>
</section>
<?php get_footer() ?>
<?php get_template_part('parts/shared/html-footer'); ?>

