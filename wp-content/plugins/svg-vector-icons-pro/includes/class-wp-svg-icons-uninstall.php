<?php
/**
 * Fired during plugin uninstall.
 *
 * This class defines all code necessary to run during the plugin's uninstall.
 *
 * @since      3.0.0
 * @package    svg-vector-icon-plugin
 * @subpackage svg-vector-icon-plugin/includes
 * @author     Evan Herman <Evan.M.Herman@gmail.com>
 * @link       http://www.evan-herman.com/wordpress-plugin/wp-svg-icons/
 */
 
class WP_SVG_Icons_Uninstall {

	/**
	 * Long Description.
	 *
	 * @since    3.0.0 
	 */
	public static function uninstall() {
		
		// Step #1
		// clean up our plugin settings
		delete_option( 'wp_svg_icons_enqueue_defualt_icon_pack' );
		delete_option( 'wp_svg_icons_defualt_icon_container' );
		delete_option( 'wp_svg_icons_clear_all_data_on_uninstall' );
		delete_option( 'wp_svg_icons_review_stop_bugging_me' );
		delete_option( 'wp_svg_icons_activation_date' );
		
		// Step #1
		// check if the user wants to remove all announcemnts
		// and do so, if set
		if ( get_option( 'wp_svg_icons_clear_all_data_on_uninstall' , '1' ) == '1' ) {	
			$dest = wp_upload_dir();
			$dest_path = $dest['path'];
			$split_path = explode( 'uploads/' , $dest_path );
			$custom_pack_dir = $split_path[0] . 'uploads/wp-svg-icons/';
			if ( is_dir( $custom_pack_dir ) ) {
				WP_SVG_Icons_Uninstall::wp_svg_icons_delete_entire_directory( $custom_pack_dir );
			}
		}

	}
	
	// recursive delete directory
	public function wp_svg_icons_delete_entire_directory( $dir ) { 
		if ( is_dir( $dir ) ) { 
			$objects = scandir( $dir ); 
			foreach ($objects as $object ) { 
				if ( $object != "." && $object != ".." ) { 
					if ( filetype( $dir."/".$object) == "dir" ) WP_SVG_Icons_Uninstall::wp_svg_icons_delete_entire_directory( $dir."/".$object); else unlink( $dir."/".$object ); 
				} 
			} 
			reset( $objects ); 
			rmdir( $dir ); 
		} 
	} 

}