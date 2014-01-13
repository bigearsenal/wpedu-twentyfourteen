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
 * wp_JetPackVC
 *
 * @version 1.0
 * @updated 00.00.00
 **/
add_action( 'wp', 'wp_JetPackVC' );
function wp_JetPackVC() {

	remove_filter( 'the_content', 'sharing_display', 19 );
	remove_filter( 'the_excerpt', 'sharing_display', 19 );
	
	add_filter( 'the_content', 'JetPackSharingVC', 20 );
	add_filter( 'the_excerpt', 'JetPackSharingVC', 20 );

} // end function wp_JetPackVC






/**
 * JetPackSharingVC
 *
 * @version 1.0
 * @updated 00.00.00
 * 
 * @usage: echo JetPackSharingVC()
 **/
function JetPackSharingVC( $content ) {
	
	if ( function_exists( 'sharing_display' ) ) {
		return $content . "<div class=\"jetpack-sharing-wrapper\">" . sharing_display() . "</div>";
	}

} // end function JetPackSharingVC