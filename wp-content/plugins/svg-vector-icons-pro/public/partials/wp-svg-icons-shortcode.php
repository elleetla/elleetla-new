<?php

/**
 * Function to process our shortcode and render our WP SVG Icon
 * 
 * @link       http://www.evan-herman.com/wordpress-plugin/wp-svg-icons/
 * @since      3.0.0
 *
 * @package    WP_SVG_Icons
 * @subpackage WP_SVG_Icons/public
 *
 */

// Add [wp-svg-icons] Shortcode
function generate_wp_svg_icon( $atts ) {

	// Extract our shortcode attributes
	extract( shortcode_atts(
		array(
			'icon' => '',		// icon class from the default icon pack
			'wrap' => '',		// element to wrap the icon in ( i, p, b, span, div etc. )
			'class' => '',		// additional classes to add to the icon
			'size' => '',		// alter the size of the icon, ( em, px, rem, % etc. )
			'custom_icon' => '',			// icon class from a custom icon pack
			'link' => '',		// set this icon as a link
			'new_tab' => '',	// open the icon link in a new tab 1 = 'yes'
			'color' => '', 	// alter the icons color #xxxxxx
			'repeat' => '',	// repeat the icon x times
			'rotate' => '', 	// rotate the icon x degrees
			'animation' => '', // animate the icon
			'animate_on' => '', // when to animate the icon (load, hover, in view)
			'stagger' => '', // stagger the animation (in seconds)
		), $atts, 'wp-svg-icons-icon-atts' )
	);
	
	static $i = 0;
	$i++;
		
	// empty array for our parameters
	$icon_data_attr_array = array();
	$classes = array();
		
	// if icon and custom icon is left blank
	if( empty( $icon ) ) {
		if( empty( $custom_icon ) ) {
			return __( 'Whoops! It looks like you forgot to specify an icon.' , 'wp-svg-icons' );
		}
	}
	
	// if the user forgot to set a wrap
	if( empty( $wrap ) ) {
		return __( 'Whoops! It looks like you forgot to specify your html tag.' , 'wp-svg-icons' ); 
	}
	
	// if the icon has an animation parameter, lets enqueue 
	// animate.css (required for animations)
	if( !empty( $animation ) ) {
		// load front end animation scripts
		// @since v1.1.3
		wp_enqueue_script( 'waypoint.js' , 'https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.0/jquery.waypoints.min.js', array( 'jquery' ), 'all', true );
		wp_enqueue_script( 'wp-svg-icon-front-end-script' , plugin_dir_url( __FILE__ ) . '../js/wp-svg-icons-frontend.min.js' , array( 'jquery', 'waypoint.js' ) , '1.1.3' , true ); 
		
		// animate.css 
		// @since v1.1.3
		wp_enqueue_style( 'animate.css' , '//cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css' );
		
		$classes[] = 'animated-icon';
		
		// waypoint.js - used for scroll animations
		// @since v1.1.3	
		if( $animate_on == 'scroll' ) {
			$icon_data_attr_array[] = 'data-animate-on="scroll"';
		} else if ( $animate_on == 'load' ) {
			if( empty( $stagger ) )	{
				$classes[] = $animation;
			}
			$icon_data_attr_array[] = 'data-animate-on="'.$animate_on.'"';
		} else {
			$icon_data_attr_array[] = 'data-animate-on="'.$animate_on.'"';
		}
		
		// stagger (offset start of animation)
		if( !empty( $stagger ) ) {
			// convert seconds to ms for the js script
			$icon_data_attr_array[] = 'data-animation-stagger="'.intval( $stagger * 1000 ).'"';
		} else {
			$icon_data_attr_array[] = 'data-animation-stagger="0"';
		}
		
		$icon_data_attr_array[] = 'data-animation="'.$animation.'"';
		
	}
	
	// if the user has set extra classes for the element
	if( !empty( $class ) ) {
		$classes[] = esc_attr( str_replace( 'hidden' , '' , $class ) );
		// if 'hidden' class is set
		// we need to specify something more specific to our plugin
		if ( strpos( $class , 'hidden' ) !== false) {
			$classes[] = 'wp-svg-icon-hidden';
		}
	}
	
	// if the user has set a custom icon
	if( !empty( $custom_icon ) ) { // display a custom icon
		// append icon class to the beginning of our parameter array
		$classes[] = esc_attr( 'wp-svg-custom-' . $custom_icon . ' ' . $custom_icon . '-' . $i . ' ' . $custom_icon );
		$icon_4_css = esc_attr( $custom_icon . '-' . $i );
	} else { // display our default icon
		// append icon class to the beginning of our parameter array
		$classes[] = esc_attr( 'wp-svg-' . $icon . ' ' . $icon . '-' . $i . ' ' . $icon );
		$icon_4_css = esc_attr( $icon . '-' . $i );
	}
						
	// create an array to populate with some styles
	// TO DO -
	// 		figure out a way to get this up to the head
	// 		and not in the content body...
	$styles_array = array();
	
	// if the user has a set a custom icon size, set up our variable
	if( !empty( $size ) ) {
		$icon_size = 'font-size:' . esc_attr( $size ) . ';';
		$styles_array[0] = $icon_size;
	} else {
		$icon_size = '';
	}
	
	// if the user has a set a custom icon color, set up our variable
	if( !empty( $color ) ) {
		$icon_color = 'color:' . esc_attr( $color ) . ';';
		$styles_array[1] = $icon_color;
	} else {
		$icon_color = '';
	}
	
	// build up an array of styles,
	// to pass to our element
	if( !empty( $styles_array ) ) {
		$styles = 'style="' . esc_attr( implode( '' , $styles_array ) ) . '"';
	} else {
		$styles = '';
	}
	
	
	// check if this icon should be set as a link
	if( !empty( $link ) ) {	
		// wrap our element in an anchor tag, for the link
		// don't forget to esc_url
		if( $new_tab == '1' ) {
			$icon = '<a href="' . esc_url( $link ) . '" target="_blank"><' . esc_attr( $wrap ) . ' class="'.implode( ' ' , $classes ). '" ' . $styles . ' ' . implode( ' ' , $icon_data_attr_array ) . '></' . esc_attr( $wrap ) . '></a>';
		} else {
			$icon = '<a href="' . esc_url( $link ) . '"><' . esc_attr( $wrap ) . ' class="'.implode( ' ' , $classes ) . '" ' . $styles . ' ' . implode( ' ' , $icon_data_attr_array ) . '></' . esc_attr( $wrap ) . '></a>';
		}
	} else {
		// return the default icon
		$icon = '<' . esc_attr( $wrap ) . ' class="' . implode( ' ' , $classes ) . '" ' . $styles . ' ' . implode( ' ' , $icon_data_attr_array ) . '></' . esc_attr( $wrap ) . '>';
	}
	
	// if the user has set up a rotate
	// print out some css to alter the icon
	// rotate -- x degrees
	if( !empty( $rotate ) ) {
		$custom_css = "
            <style>.{$icon_4_css} {
				-ms-transform: rotate({$rotate}deg); /* IE 9 */
				-webkit-transform: rotate({$rotate}deg); /* Safari */
				transform: rotate({$rotate}deg);
            }</style>";
       echo $custom_css;
	}
	
	// loop over and build our icons string
	// if repeat is set
	if( !empty( $repeat ) ) {
		$x = 1;
		$icons = '';
		while( $x <= $repeat ) {
			// return the default icon
			$icons .=  $icon;
			$x++;
		}
		return $icons;
	} else {
		return $icon;
	}
	
}

// hook in and add our custom shortcode
add_shortcode( 'wp-svg-icons', 'generate_wp_svg_icon' );	
?>