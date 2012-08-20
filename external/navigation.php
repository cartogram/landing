<?php
	/* ========================================================================================================================
	
	Cartogram Navigation v.1.0
	
	======================================================================================================================== */

	add_theme_support('menus');

	/**
	 * Button Shortcode
	 *
	 */
	function cartogram_button($a) {
		extract(shortcode_atts(array(
			'label' 	=> 'Button Text',
			'id' 	=> '1',
			'url'	=> '',
			'target' => '_parent',		
			'size'	=> '',
			'ptag'	=> false
		), $a));
		
		$link = $url ? $url : get_permalink($id);	
		
		if($ptag) :
			return  wpautop('<a href="'.$link.'" target="'.$target.'" class="button '.$size.'">'.$label.'</a>');
		else :
			return '<a href="'.$link.'" target="'.$target.'" class="button '.$size.'">'.$label.'</a>';
		endif;
	
	}

	/**
	 * Foundation Navigation Walker
	 *
	 */
	class foundation_nav extends Walker_Nav_Menu{
		function start_lvl(&$output, $depth) {
		    $indent = str_repeat("\t", $depth);
		    $output .= "\n$indent<ul class=\"flyout\">\n";
		  }
		
		function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {

			if ( !$element )
				return;

			$id_field = $this->db_fields['id'];

			//display this element
			if ( is_array( $args[0] ) )
				$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );

			//Adds the 'parent' class to the current item if it has children
			if( ! empty( $children_elements[$element->$id_field] ) )
				array_push($element->classes,'has-flyout');

			$cb_args = array_merge( array(&$output, $element, $depth), $args);

			call_user_func_array(array(&$this, 'start_el'), $cb_args);

			$id = $element->$id_field;

			// descend only when the depth is right and there are childrens for this element
			if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

				foreach( $children_elements[ $id ] as $child ){

					if ( !isset($newlevel) ) {
						$newlevel = true;
						//start the child delimiter
						$cb_args = array_merge( array(&$output, $depth), $args);
						call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
					}
					$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
				}
				unset( $children_elements[ $id ] );
			}

			if ( isset($newlevel) && $newlevel ){
				//end the child delimiter
				$cb_args = array_merge( array(&$output, $depth), $args);
				call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
			}

			//end this element
			$cb_args = array_merge( array(&$output, $element, $depth), $args);
			call_user_func_array(array(&$this, 'end_el'), $cb_args);
		}
	}

	add_filter('nav_menu_css_class','add_parent_css',10,2);

	function  add_parent_css($classes, $item){
	     global  $dd_depth, $dd_children;
	     $classes[] = 'depth'.$dd_depth;
	     if($dd_children)
	         $classes[] = 'has-flyout';
	    return $classes;
	}
?>