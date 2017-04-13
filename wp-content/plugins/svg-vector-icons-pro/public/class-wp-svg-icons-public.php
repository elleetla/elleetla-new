<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @package    WP_SVG_Icons
 * @subpackage WP_SVG_Icons/public
 * @author     Evan Herman <Evan.M.Herman@gmail.com>
 * @link       http://www.evan-herman.com/wordpress-plugin/wp-svg-icons/
 */
 
class WP_SVG_Icons_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    3.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    3.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    3.0.0
	 * @var      string    $plugin_name       The name of the plugin.
	 * @var      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
	
		$this->plugin_name = $plugin_name;
		$this->version = $version;
		
		// allow the icon shortcode to be used in widgets
		// so users don't need to add this themselves
		add_filter('widget_text', 'do_shortcode');
		
	}

	/**
	 * Register our stylesheets for the public-facing side of the site.
	 *
	 * @since    3.0.0
	 */
	public function enqueue_styles() {
	
		// load side style
		wp_enqueue_style( 'wp-svg-icon-front-end-styles' , plugin_dir_url( __FILE__ ) . '../public/css/wordpress-svg-frontend-style.min.css' );
				
		// if the user has opted to enqueue the default icon pack
		// load it up on the front end
		if ( get_option( 'wp_svg_icons_enqueue_defualt_icon_pack' , '1' ) == '1' ) {
			// enqueue default font icon pack, if setting dictates so
			wp_enqueue_style( 'default-icon-styles' , plugin_dir_url( __FILE__ ) . '../admin/css/wordpress-svg-icon-plugin-style.min.css' );
		}
		
		// Enqueue custom styles if the user has uploaded a custom pack
		$dest = wp_upload_dir();
		$upload['subdir'] = '/wp-svg-icons/custom-pack';
		$path = $dest['basedir'] . $upload['subdir'];
		$customPackStyles = '/style.css';	
			
		// Check if there is a custom pack style file
		// if there is enqueue it
		if ( file_exists( $path . $customPackStyles ) ) {
			wp_register_style( 'wp_svg_custom_pack_style' , '/wp-content/uploads/wp-svg-icons/custom-pack' . $customPackStyles );
			wp_enqueue_style( 'wp_svg_custom_pack_style' );
		}
		
		// load up the nav walker, if the user allows for it
		// maybe they have a theme they don't want to do this too?
		if( get_option( 'wp_svg_icons_load_custom_walker' ) != '' && get_option( 'wp_svg_icons_load_custom_walker', '0' ) == '1' ) {
			/* Filter the nav walker */
			add_filter( 'wp_nav_menu_args', array( &$this , 'modify_nav_menu_args' ) );
		} else {
			add_filter( 'nav_menu_item_title', array( $this, 'filter_custom_navigations' ), 10, 4 );
		}
						
	}
	
	/**
	*	Instead of a custom nav walker,
	*	append custom classes (to ensure that this plugin works across ALL themes)
	*/
	function filter_custom_navigations( $title, $item, $args, $depth ) {
		$icon = get_post_meta( $item->ID, '_menu_item_icon', true );
		if( $icon != 'no icon' ) {
			if ( strpos( $icon, 'wp-svg-' ) !== false) {
				$icon = '<i class="' . $icon . '"></i> ';
			} else {
				$icon = '<i class="wp-svg-custom-' . $icon . '"></i> ';
			}
		} else {
			$icon = '';
		}
		return $icon . $title;
	}

	
	/*
	*	Filter the nav walker
	* 	used to allow our icons to be used in the navigation
	* 	@since 3.0.0
	*/
	public function modify_nav_menu_args( $args ) {
		// seems to be working on all menus
		$args['walker'] = new wp_svg_icon_nav_walker;
		return $args;
	}
	
}

/*
*	Include our shortcode [wp-svg-icons wrap="b" icon="#"]
* 	@since    v3.0.0 free
*/
include_once( plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/wp-svg-icons-shortcode.php' );

/*
*	Include our shortcode  [wp-svg-icons-hover-container icon="#"][/wp-svg-icons-hover-container]
*	- Hover Style Call Out Container
* 	@since    v1.1.3 pro
*/
include_once( plugin_dir_path( dirname( __FILE__ ) ) . 'public/partials/wp-svg-icons-container-shortcode.php' );