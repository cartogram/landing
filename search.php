<?php
/**
 * Template Name: Search
 */
?>
<?php get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div class="row ">
	<div class="columns twelve">
		<?php if ( have_posts() ): ?>
		<h2>Search Results for '<?php echo get_search_query(); ?>'</h2>	
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part('parts/content/content', get_post_format() ); ?>	
			<?php endwhile; ?>
		<?php else: ?>
			<h2>No results found for '<?php echo get_search_query(); ?>'</h2>
		<?php endif; ?>
	</div>	
</div>	
<?php get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>