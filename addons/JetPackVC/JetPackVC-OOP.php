<?php
/**
 * File Name JetPackVC.php
 * @package WordPress
 * @subpackage JetPackVC
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.0
 * @updated 00.00.00
 **/
####################################################################################################




/**
 * JetPackVC
 *
 * @version 1.0
 * @updated 00.00.00
 **/
$JetPackVC = new JetPackVC();
class JetPackVC {






	/**
	 * __construct
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function __construct() {

		add_action( 'wp', array( &$this, 'wp' ) );

	} // end function __construct






	/**
	 * wp
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 **/
	function wp() {
		
		remove_filter( 'the_content', 'sharing_display', 19 );
		remove_filter( 'the_excerpt', 'sharing_display', 19 );
		
		add_filter( 'the_content', array( &$this, 'jetpack_sharing' ), 19 );
		add_filter( 'the_excerpt', array( &$this, 'jetpack_sharing' ), 19 );

	} // end function wp






	####################################################################################################
	/**
	 * static
	 **/
	####################################################################################################






	/**
	 * jetpack_sharing
	 *
	 * @version 1.0
	 * @updated 00.00.00
	 *
	 * @usage: echo JetPackVC::jetpack_sharing()
	 **/
	function jetpack_sharing() {
		
		if ( function_exists( 'sharing_display' ) ) {

			return "<div class=\"jetpack-sharing-wrapper\">" . sharing_display() . "</div>";

		} // end if ( function_exists( 'sharing_display' ) )

	} // end function jetpack_sharing



} // end class JetPackVC