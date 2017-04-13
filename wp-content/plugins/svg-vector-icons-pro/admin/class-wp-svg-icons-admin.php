<?php
		
/**
 * The dashboard-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      3.0.0
 * @package    svg-vector-icon-plugin
 * @subpackage svg-vector-icon-plugin/includes
 * @author     Evan Herman <Evan.M.Herman@gmail.com>
 * @link       https://www.evan-herman.com/wordpress-plugin/wp-svg-icons/
 */
class WP_SVG_Icons_Admin {

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
	 * @var      string    $plugin_name       The name of this plugin.
	 * @var      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
	
		$this->plugin_name = $plugin_name;
		$this->version = $version;
		
		// load our dependencies
		$this->include_dependencies();		
		
		// setup our constants
		define( 'EH_DEV_SHOP_WP_SVG_ICONS_PRO', 'WP SVG Icons' );
					
		if( !defined( 'EH_DEV_SHOP_URL' ) ) {
			define( 'EH_DEV_SHOP_URL', 'https://www.evan-herman.com' );
		}
		 
		// add custom button to edit.php page
		add_action('media_buttons', array( $this , 'add_insert_icon_button') , 15 );
				
		// add our custom field to the menus
		add_filter( 'wp_nav_menu_item_custom_fields', array( $this, 'wp_svg_icons_add_custom_nav_fields' ), 10, 4 );
		add_filter( 'get_wp_svg_icon_nav_item_data', array( $this, 'wp_svg_icons_item_data' ), 10, 4 );
		// save menu custom fields
		add_action( 'wp_update_nav_menu_item', array( $this, 'wp_svg_icons_update_custom_nav_fields'), 10, 2 );
		// custom nav walker filter
		add_filter( 'wp_edit_nav_menu_walker', array( $this, 'wp_svg_icons_edit_walker'), 10, 2 );
					
		// action hook which handles the ajax request of deleting files
		add_action('wp_ajax_svg_delete_custom_pack', array( $this , 'svg_delete_custom_pack_ajax' ) );
		
		/** Suppot Actions **/
		// Remote activation function
		add_action('admin_init', array( $this , 'wp_svg_icons_activate_license' ) );
		// Remove deactivation function 
		add_action('admin_init', array( $this , 'wp_svg_icons_deactivate_license' ) );
		// Cross check the validity of our supportl icense , twice a day
		add_action('wp_svg_icons_support_license_check', array( $this , 'crosscheck_support_license' ) );
		// register wp svg icon license settings
		add_action('admin_init', array( $this , 'wp_svg_icons_register_settings' ) );		
	}
		
			
	/**
	 * Register the stylesheets for the Dashboard.
	 *
	 * @since    3.0.0
	 */
	public function enqueue_styles() {
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Admin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Admin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-svg-icons-admin.min.css', array(), $this->version, 'all' );
		
		// maybe combine?
		wp_enqueue_style( 'admin-icon-page-styles' , plugin_dir_url( __FILE__ ) . 'css/wordpress-svg-icon-plugin-style.min.css' );
		wp_enqueue_style( 'default-icon-styles' , plugin_dir_url( __FILE__ ) . 'css/default-icon-styles.min.css' );
	
		// load container/hover effect styles
		wp_enqueue_style( 'wp-svg-icon-container-styles' , plugin_dir_url( __FILE__ ) . '../public/css/wordpress-svg-icons-hover-styles.css' );

		
		// animate.css from CDN
		// @since v1.1.3
		wp_enqueue_style( 'animate-css' , '//cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css' );
		
	}
	
	/**
	 * Register the JavaScript for the dashboard.
	 *
	 * @since    3.0.0
	 */
	public function enqueue_scripts() {	
		
		$dest = wp_upload_dir();
		$dest_path = explode( '/uploads/' , $dest['path'] );
		$customFontPackPath = $dest_path[0] . '/uploads/wp-svg-icons/custom-pack/style.css';
		if ( file_exists( $customFontPackPath ) ) {
			$active_pack = 'true';
		} else {
			$active_pack = 'false';
		}

		// enqueue our necessary JS and CSS files
		wp_register_script( 'admin-icon-page-script.js', plugin_dir_url( __FILE__ ) . 'js/wordpress-svg-icon-plugin-scripts.js', array( 'jquery' , 'jquery-ui-core' , 'jquery-ui-slider' ), $this->version , false );
		
		wp_localize_script( 'admin-icon-page-script.js' , 'localized_data' , array(
			'site_url' => site_url(),
			'custom_pack_active' => $active_pack,
			'default_icon_element' => get_option( 'wp_svg_icons_defualt_icon_container' , 'i' ),
		) );
		wp_enqueue_script( 'admin-icon-page-script.js' );
		
		// enqueue our color picker js + styles
		/* Enqueue the color picker dependencies */
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_style( 'wp-color-picker' ); 
		
		// custom font pack scripts
		$this->wordpress_svg_icon_plugin_custom_icon_pack_scripts();
		
		// enqueue our nav scripts/styles
		$this->enqueue_custom_nav_scripts_on_nav_menu_page();
		
		// custom font pack found error
		add_action('admin_notices', array( &$this , 'wp_svg_customPack_installed_error' ) );

		// set the custom upload directory
		add_action( 'admin_head', array( &$this , 'wp_svg_change_downloads_upload_dir' ) , 999 );
		
	}
	
	// ajax delete our .zip and entire directory for the custom pack!
	function svg_delete_custom_pack_ajax() {
		$dest = wp_upload_dir();
		$dest_path = explode( '/uploads/' , $dest['path'] );
		$customFontPackFolderPath = $dest_path[0] . '/uploads/wp-svg-icons/custom-pack/';
		$zip_fileName = 'wp-svg-custom-pack.zip';
		// delete the custom icon pack .zip
		$delete_zip = $this->recursive_delete_directory( $customFontPackFolderPath . $zip_fileName );
		// delete the entire custom font pack folder
		$delete_directory = $this->recursive_delete_directory( $customFontPackFolderPath );
		die();
	}
	
	/* Here, were going to create a new field for the 'menu' - to allow users to add icons to menus */
	function wp_svg_icons_add_custom_nav_fields( $item_id, $item, $depth, $args ) {
		$item->subtitle = ( get_post_meta( $item_id, '_menu_item_icon', true ) ) ? get_post_meta( $item_id, '_menu_item_icon', true ) : 'no icon';
		return $item;
	}
	
	/* Here, were going to create a new field for the 'menu' - to allow users to add icons to menus */
	function wp_svg_icons_item_data( $item_id, $item, $depth, $args ) {
		$item->subtitle = ( get_post_meta( $item_id, '_menu_item_icon', true ) ) ? get_post_meta( $item_id, '_menu_item_icon', true ) : '';
		return $item;
	}
	
	/* Custom Nav Walker Function */
	function wp_svg_icons_edit_walker($walker,$menu_id) {
		$walker = 'WP_SVG_Icons_Pro_Nav_Walker';
		return $walker;
	}
	
	/* Save custom menu field */
	function wp_svg_icons_update_custom_nav_fields( $menu_id, $menu_item_db_id ) {
	
	    // Check if element is properly sent
		if( isset( $_REQUEST['menu-item-icon'] ) ) {
			if ( is_array( $_REQUEST['menu-item-icon'] ) ) {
				$subtitle_value = $_REQUEST['menu-item-icon'][$menu_item_db_id];
				update_post_meta( $menu_item_db_id, '_menu_item_icon', $subtitle_value );
			}
		}
	    
	}
	
	/* 
	*	Set custom upload directory 
	*/
	function wp_svg_change_downloads_upload_dir() {
		$page_base = get_current_screen()->base;
		if ( $page_base == 'wp-svg-icons_page_wp-svg-icons-custom-set' ) {
			add_filter( 'upload_dir', array( &$this , 'wp_svg_set_upload_dir' ) );
		} 
	}
	
	/*
	*	set our custom upload directory
	*/
	function wp_svg_set_upload_dir( $upload ) {
		$upload['subdir'] = '/wp-svg-icons/custom-pack';
		$upload['path'] = $upload['basedir'] . $upload['subdir'];
		$upload['url']   = $upload['baseurl'] . $upload['subdir'];
		return $upload;
	}
	
	// load our dependencies here
	private function include_dependencies() {
		/**
		* Load our Icons Page
		*/
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/wp-svg-icons-icon-page.php';
	}
			
	/*
	*	'Insert Icon' Button	
	*/
	function add_insert_icon_button() {
		echo '<a href="'.plugin_dir_url( dirname( __FILE__ ) ).'admin/partials/wp-svg-icons-default-icons-page.php?" class="thickbox button" title="'.__( "WP SVG Icons" , "wp-svg-icons" ).'"><span class="wp-svg-wordpress"></span>  Add Icon</a>';
	}
	
	/*
	*	Enqueue scripts on custom icon pack page
	*/
	function wordpress_svg_icon_plugin_custom_icon_pack_scripts() {	
	
		$screen_base = get_current_screen()->base;
		
		$dest = wp_upload_dir();
	
		$dest_path = $dest['basedir'] . '/wp-svg-icons/custom-pack';
				
		if ( $screen_base == 'wp-svg-icons_page_wp-svg-icons-custom-set' ) {

			if ( file_exists( $dest_path.'/wp-svg-custom-pack.zip' ) ) {
				// enqueue our custom delete script
				wp_register_script( 'wp-svg-delete-custom-pack',  plugin_dir_url(__FILE__).'js/wp-svg-delete-custom-pack-ajax.js');	
				// localize an array of text to translate
				$translation_array = array(
					'confirm' => __( 'Are you sure you want to uninstall your custom icon pack? This cannot be undone.' , 'wp-svg-icons' ),
					'success' => __( 'Custom font pack successfully uninstalled!' , 'wp-svg-icons' ),
					'error' => __( 'Error uninstalling your custom font pack. Try again. If the error persists you will have to delete the file manually.' , 'wp-svg-icons' )
				);
				wp_localize_script( 'wp-svg-delete-custom-pack', 'translation_array', $translation_array );
				wp_enqueue_script( 'wp-svg-delete-custom-pack' );
				// jquery dropdown scripts
				wp_register_script( 'wp-svg-jquery-dropdown',  plugin_dir_url(__FILE__).'js/jquery.dropdown.min.js');	
				wp_enqueue_script( 'wp-svg-jquery-dropdown' );
			}			

			// jquery dropdown styles
			wp_register_style( 'wp-svg-jquery-dropdown-style',  plugin_dir_url(__FILE__).'css/jquery.dropdown.css');	
			wp_enqueue_style( 'wp-svg-jquery-dropdown-style' );
				
		}
				
	}
	
	/*
	*	Enqueue scripts on nav menu page
	*/
	function enqueue_custom_nav_scripts_on_nav_menu_page() {
		$screen_base = get_current_screen()->base;
		// load jQuery dropdown on nav menu, to add our icons to the menu
		if( $screen_base == 'nav-menus' ) {
			// scripts			
			wp_register_script( 'wp-svg-icon-dropdown' , plugin_dir_url(__FILE__).'js/bootstrap-select.min.js' , array( 'jquery' ), 'all' );
			wp_enqueue_script( 'wp-svg-icon-dropdown' );
						
			wp_register_script( 'custom-icon-menu-script' , plugin_dir_url(__FILE__).'js/custom-icon-menu-script.js' , array( 'jquery' , 'jquery-ui-core', 'jquery-ui-selectable' ), 'all'  );
			wp_enqueue_script( 'custom-icon-menu-script' );
			
			//styles
			wp_register_style( 'wp-svg-icon-dropdown-styles',  plugin_dir_url(__FILE__).'css/bootstrap-select.min.css');	
			wp_enqueue_style( 'wp-svg-icon-dropdown-styles' );
			
			wp_register_style( 'bootstrap-dropdown-css',  plugin_dir_url(__FILE__).'css/bootstrap.css');	
			wp_enqueue_style( 'bootstrap-dropdown-css' );
			
			// load our custom icons!
			$this->enqueue_custom_icons();
			
		}
	}
		
	function enqueue_custom_icons() {
		// enqueue our custom icon pack styles if they exist
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
	}
	
	
	/* 
	*	Custom Pack Already Installed Admin Notification Error 
	*/
	function wp_svg_customPack_installed_error() {
			$page_base = get_current_screen()->base;
			if ( $page_base == 'wp-svg-icons_page_wp-svg-icons-custom-set' ) {
					$dest = wp_upload_dir();
					$dest_path = $dest['path'];
						// if a file exists print the error on the custom pack upload page
						if ( file_exists( $dest_path . '/wp-svg-custom-pack.zip' ) ) {
							 ?>
							 <script>
								 jQuery(document).ready(function() { 
									jQuery(".wp-svg-custom-pack-preloader").show(); 
									jQuery(".svg-custom-pack-buttons").after("<div class=error><p><?php _e('You already have a font pack installed. If you want to install a new font pack, you must first uninstall the current one.','wp-svg-icons'); ?></p></div>");  
									 jQuery(".preview-icon-code-box").show(); 
									 jQuery( '#uninstall-pack-button' ).removeAttr( 'disabled' );
									 jQuery(".dropDownButton").removeAttr("disabled"); 
									 jQuery("#wp_svg_custom_pack_field").attr("disabled","disabled"); 
									 jQuery("input[value=Import]").attr("disabled","disabled");
									 
									jQuery.get( "<?php echo site_url(); ?>/wp-content/uploads/wp-svg-icons/custom-pack/demo.html", function( data ) {
										jQuery( ".current-font-pack" ).html( data );
									});
										
									jQuery.get("<?php echo site_url(); ?>/wp-content/uploads/wp-svg-icons/custom-pack/style.css", function( data ) { 
										jQuery("head").append("<style>"+data+"</style>"); 
									}); 
										
								});
							 </script>
							 <?php						
						} else { 
							/*
							* Custom icon pack does not exist...
							*/
							?>
							<script>
								jQuery(document).ready(function() { 
									jQuery(".wp-svg-custom-pack-preloader").hide(); 
									jQuery("#uninstall-pack-button").attr("disabled","disabled"); 
									jQuery("#dropDownButton").attr("disabled","disabled"); });
							</script>
							<?php
						}
				}	
			}
	
	
	/* 
		Function To Recursively Delete an entire directory 
	*/
	public function recursive_delete_directory( $dir ) { 
		   if ( is_dir( $dir ) ) { 
			 $objects = scandir( $dir ); 
			 foreach ($objects as $object ) { 
			   if ( $object != "." && $object != ".." ) { 
				 if ( filetype( $dir."/".$object) == "dir" ) $this->recursive_delete_directory( $dir."/".$object); else unlink( $dir."/".$object ); 
			   } 
			 } 
			 reset( $objects ); 
			 rmdir( $dir ); 
		 } 
	} 
	
	
	/** Support License Functions **/
	/*
			* schedule_wp_svg_icons_support_cron()
			* Setup our twice daily transient, to cross check the API key ( if set )
			* since @v1.1.4
			*/
			public function schedule_wp_svg_icons_support_cron() {
					wp_schedule_event( current_time( 'timestamp' ), 'twicedaily', 'wp_svg_icons_support_license_check');
				}
				
			/*
			* crosscheck_support_license()
			* API Request to cross check the license, and update the option based on the result
			* since @v1.1.4
			*/
			public function crosscheck_support_license() {
					// only run if the user has a valid license installed
					if ( get_option( 'wp_svg_icons_license_status' ) !== false && get_option( 'wp_svg_icons_license_status' ) == 'valid' ) {
						// api parameters, cross checking the license
							$api_params = array( 
								'edd_action'=> 'check_license', 
								'license' 	=> trim( get_option( 'wp_svg_icons_license_key' ) ), 
								'item_name' => urlencode( EH_DEV_SHOP_WP_SVG_ICONS_PRO ), // the name of our product
								'url'       => home_url()
							);
							// Call the custom API.
							$response = wp_remote_get( add_query_arg( $api_params, EH_DEV_SHOP_URL ), array( 'timeout' => 15, 'sslverify' => false ) );
							
							// decode the license data
							$license_data = json_decode( wp_remote_retrieve_body( $response ) );
							// check license status
							if ( $license_data->license != 'valid' ) {
								update_option( 'wp_svg_icons_license_status', $license_data->license );
								update_option( 'wp_svg_icons_license_data', $license_data );
							}
					}	
				}
			
			/*
			* wp_svg_icons_activate_license()
			* Remote Support License Activation
			* since @v1.1.4
			*/
			public function wp_svg_icons_activate_license() {
						
					// listen for our activate button to be clicked
					if( isset( $_POST['wp_svg_icons_license_activate'] ) ) {
											
						// run a quick security check 
						if( ! check_admin_referer( 'wp_svg_icons_nonce', 'wp_svg_icons_nonce' ) ) 	
							return; // get out if we didn't click the Activate button

						// retrieve the license from the database
						$license = trim( get_option( 'wp_svg_icons_license_key' ) );
							
						// data to send in our API request
						$api_params = array( 
							'edd_action'=> 'activate_license', 
							'license' 	=> $license, 
							'item_name' => urlencode( EH_DEV_SHOP_WP_SVG_ICONS_PRO ), // the name of our product
							'url'       => home_url()
						);
						
						// Call the custom API.
						$response = wp_remote_post( EH_DEV_SHOP_URL, array(
							'timeout'   => 15,
							'sslverify' => false,
							'body'      => $api_params
						) );	
						
						// make sure the response came back okay
						if ( is_wp_error( $response ) )
							return false;

						// decode the license data
						$license_data = json_decode( wp_remote_retrieve_body( $response ) );
						
						// $license_data->license returns "valid" or "invalid"
						update_option( 'wp_svg_icons_license_status', $license_data->license );
						update_option( 'wp_svg_icons_license_data', $license_data );

					}
				} // end remote activation
		

			/*
			* wp_svg_icons_deactivate_license()
			* Remote Support License De-activation
			* since @v1.1.3 pro
			*/
			public function wp_svg_icons_deactivate_license() {
	
						
					// listen for our activate button to be clicked
					if( isset( $_POST['wp_svg_icons_license_deactivate'] ) ) {

						// run a quick security check 
						if( ! check_admin_referer( 'wp_svg_icons_nonce', 'wp_svg_icons_nonce' ) ) {	
							return; // get out if we didn't click the Activate button
						}

						// retrieve the license from the database
						$license = trim( get_option( 'wp_svg_icons_license_key' ) );
												
						// data to send in our API request
						$api_params = array( 
							'edd_action'=> 'deactivate_license', 
							'license' 	=> $license, 
							'item_name' => urlencode( EH_DEV_SHOP_WP_SVG_ICONS_PRO ), // the name of our product
							'url'       => home_url()
						);
						
						// Call the custom API.
						$response = wp_remote_post( EH_DEV_SHOP_URL, array(
							'timeout'   => 15,
							'sslverify' => false,
							'body'      => $api_params
						) );
						
						// make sure the response came back okay
						if ( is_wp_error( $response ) )
							return __( 'Oh no, there seems to be an error. Please try again at a later time. If the error persists, please get in touch with our support team to get this resolved' , 'wp-svg-icons' );

						// decode the license data
						$license_data = json_decode( wp_remote_retrieve_body( $response ) );
						
						// $license_data->license returns either "deactivated" or "failed"
						if( $license_data->license == 'deactivated' )
							delete_option( 'wp_svg_icons_license_status' );

					}
				} // end remove deactivation
				
				
			/*
			* wp_svg_icons_register_settings()
			* Register a setting for support license users
			* since @v1.1.3 pro
			*/
			function wp_svg_icons_register_settings() {
					// creates our settings in the options table
					register_setting('wp_svg_icons_license', 'wp_svg_icons_license_key', array( &$this , 'wp_svg_icons_sanitize_license' ) );
				}
				
			/*
			* wp_svg_icons_sanitize_license()
			* save license key function
			* since @v1.1.3 pro
			*/
			function wp_svg_icons_sanitize_license( $new ) {
					$old = get_option( 'wp_svg_icons_license_key' );
					if( $old && $old != $new ) {
						delete_option( 'wp_svg_icons_license_status' ); // new license has been entered, so must reactivate
					}
					return $new;
				}	
								
						
} // end Class

// include necessary nav walker files
include_once( plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/walker/wp_svg_icons_custom_walker.php' );

// toggle navigation files
if( get_option( 'wp_svg_icons_load_custom_walker' , '0' ) != '' && get_option( 'wp_svg_icons_load_custom_walker' , '0' ) == '1' ) {
	include_once( plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/walker/front_end_custom_walker.php' ); 
}