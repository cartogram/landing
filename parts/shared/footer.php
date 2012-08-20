<section class="container">
	<footer class="row">
		<?php $footernav = array(
				'theme_location'  => 'footer',
				'container'       => 'nav', 
				'container_class' => 'columns six', 
				'menu_class'      => 'link-list', 
				'menu_id'         => 'footer',
				'echo'            => true,
				'fallback_cb'     => '',
				'walker' => new foundation_nav
			); 
				wp_nav_menu( $footernav ); 
			?>
		<div class="columns six">
			<p>&copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</p>
		</div>	
	</footer>
</section>