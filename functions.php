<?php
/**
 * File Name functions.php
 * @package WordPress
 * @subpackage ChildTheme
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.0
 * @updated 00.00.00
 **/
#################################################################################################### */






/**
 * Initiate Addons
 **/
require_once( "addons/initiate-addons.php" );






/**
 * ChildTheme Class
 *
 * @version 1.0
 * @updated 00.00.00
 **/
$ChildTheme = new ChildTheme();
$ChildTheme->init_child_theme();
class ChildTheme {
	
	
	
	
	
	
	/**
	 * __construct
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function __construct() {
		
		$this->set( 'template_directory', get_template_directory() );
		$this->set( 'template_directory_uri', get_template_directory_uri() );
		$this->set( 'stylesheet_directory', get_stylesheet_directory() );
		$this->set( 'stylesheet_directory_uri', get_stylesheet_directory_uri() );
		
	} // end function __construct
	
	
	
	
	
	
	/**
	 * init_child_theme
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function init_child_theme() {
		
		add_action( 'after_setup_theme', array( &$this, 'after_setup_theme' ) );
		add_action( 'init', array( &$this, 'init' ) );
		
	} // end function init_child_theme
	
	
	
	
	
	
	/**
     * set
     *
     * @version 1.0
     * @updated 00.00.00
     **/
    function set( $key, $val = false ) {

        if ( isset( $key ) AND ! empty( $key ) ) {
            $this->$key = $val;
        }

    } // end function set
	
	
	
	
	
	
	/**
	 * After Setup Theme
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function after_setup_theme() {
		
		// Translations can be added to the /languages/ directory.
		// load_theme_textdomain( 'childtheme', "$this->stylesheet_directory/languages" );
		
		add_image_size( 'custom-page-image', 700, 1000, false );
		
	} // end function after_setup_theme
	
	
	
	
	
	
	/**
	 * Initiate
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function init() {
		
		
		// register styles and scripts
		$this->register_style_and_scripts();
		
		
		/**
		 * Front End - Enqueue, Print & other menial labor
		 **/
		
		// CSS // wp_print_styles
		add_action( 'wp_print_styles', array( &$this, 'wp_print_styles' ) );
		
		// Javascripts // wp_enqueue_scripts // wp_print_scripts
		add_action( 'wp_enqueue_scripts', array( &$this, 'wp_enqueue_scripts' ) );
		
		// Admin Menu and Links
		add_action( 'admin_menu', array( &$this, 'remove_mene_page' ), 99 );
		add_action( 'admin_menu', array( &$this, 'remove_submenus' ), 200 );
		
	} // end function init
	
	
	
	
	
	
	/**
	 * Admin Initiate
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function admin_init() {
		
		
		
	} // end function admin_init 
	
	
	
	
	
	
	/**
	 * Widgets Initiate
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function widgets_init() {
		
		// widgets_init
		
	} // end function widgets_init
	
	
	
	
	
	
	####################################################################################################
	/**
	 * Register / De-Register Scripts & CSS
	 **/
	####################################################################################################
	
	
	
	
	
	
	/**
	 * Register Styles and Scripts
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function register_style_and_scripts() {
		
		/**
		 * CSS
		 **/
		wp_register_style( 'parenttheme-style', "$this->template_directory_uri/style.css" );
		wp_register_style( 'childtheme-responsive', "$this->stylesheet_directory_uri/css/responsive.css" );
		wp_register_style( 'childtheme-style', "$this->stylesheet_directory_uri/style.css" );
		
		// wp_register_style( 'font-awesome', $this->parent_theme->template_directory_uri . "/css/font-awesome.css" );
		
		
		
		/**
		 * JS
		 **/
		
		// Custom JS
		// wp_register_script( 'childTheme', "$this->stylesheet_directory_uri/js/childTheme.js", array( 'helper' ) );
		
	} // end function register_style_and_scripts
	
	
	
	
	
	
	####################################################################################################
	/**
	 * Front End - Enqueue, Print & other menial labor
	 **/
	####################################################################################################
	
	
	
	
	
	
	/**
	 * Add CSS
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function wp_print_styles() {
		
		wp_enqueue_style( 'parenttheme-style' );
		wp_enqueue_style( 'childtheme-default' );		
		wp_enqueue_style( 'childtheme-responsive' );

	} // end function wp_print_styles
	
	
	
	
	
	
	/**
	 * Enqueue Scripts
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function wp_enqueue_scripts() {
		
		wp_enqueue_script( 'childTheme' );
		
	} // function wp_enqueue_scripts 
	
	
	
	
	
	
	####################################################################################################
	/**
	 * Admin Menu & Links
	 **/
	####################################################################################################
	
	
	
	
	
	
	/**
	 * Remove Menu Pages
	 * 
	 * @version 0.1
	 * @updated 11.18.12
	 **/
    function remove_mene_page() {
		
		// remove_menu_page( 'edit.php' );
		remove_menu_page( 'link-manager.php' );
		// remove_menu_page( 'edit-comments.php' );
        
    } // end function remove_mene_page

	
	
	
	
	
	/**
	 * Remove Sub Menu Pages
	 * 
	 * @version 0.1
	 * @updated 11.18.12
	 **/
	function remove_submenus() {
		global $submenu;
		
		// print_r($submenu);
		
		// Dashboard menu
		// unset($submenu['index.php'][10]); // Removes Updates
		
		// Posts menu
		// unset($submenu['edit.php'][5]); // Leads to listing of available posts to edit
		// unset($submenu['edit.php'][10]); // Add new post
		// unset($submenu['edit.php'][15]); // Remove categories
		// unset($submenu['edit.php'][16]); // Removes Post Tags
		
		// Media Menu
		// unset($submenu['upload.php'][5]); // View the Media library
		// unset($submenu['upload.php'][10]); // Add to Media library
		
		// Links Menu
		//  unset($submenu['link-manager.php'][5]); // Link manager
		//  unset($submenu['link-manager.php'][10]); // Add new link
		//  unset($submenu['link-manager.php'][15]); // Link Categories
		
		// Pages Menu
		// unset($submenu['edit.php?post_type=page'][5]); // The Pages listing
		// unset($submenu['edit.php?post_type=page'][10]); // Add New page
		
		// Appearance Menu
		// unset($submenu['themes.php'][5]); // Removes 'Themes'
		// unset($submenu['themes.php'][7]); // Widgets
		unset($submenu['themes.php'][12]); // Removes Theme Editor
		
		// Plugins Menu
		// unset($submenu['plugins.php'][5]); // Plugin Manager
		// unset($submenu['plugins.php'][10]); // Add New Plugins
		unset($submenu['plugins.php'][15]); // Plugin Editor
		
		// Users Menu
		// unset($submenu['users.php'][5]); // Users list
		// unset($submenu['users.php'][10]); // Add new user
		// unset($submenu['users.php'][15]); // Edit your profile
		
		// Tools Menu
		unset($submenu['tools.php'][5]); // Tools area
		// unset($submenu['tools.php'][10]); // Import
		// unset($submenu['tools.php'][15]); // Export
		// unset($submenu['tools.php'][20]); // Upgrade plugins and core files
		
		// Settings Menu
		// unset($submenu['options-general.php'][10]); // General Options
		// unset($submenu['options-general.php'][15]); // Writing
		// unset($submenu['options-general.php'][20]); // Reading
		// unset($submenu['options-general.php'][25]); // Discussion
		// unset($submenu['options-general.php'][30]); // Media
		// unset($submenu['options-general.php'][35]); // Privacy
		// unset($submenu['options-general.php'][40]); // Permalinks
		// unset($submenu['options-general.php'][45]); // Misc
		
		// print_r($submenu);
		
	} // end function remove_submenus
	
	
	
	
} // end class ChildTheme