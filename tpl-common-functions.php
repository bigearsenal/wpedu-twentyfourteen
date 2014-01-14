<?php
/* Template Name: Common Functionality */

/**
 * File Name tpl-common-functions.php
 * @package WordPress
 * @subpackage ParentTheme
 * @license GPL v2 - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @version 1.0
 * @updated 00.00.00
 *
 * Description: This page is currently still under construction though it does work. The end goal is
 * to use it to display common functions that are used through out the development of a WordPress theme.
 **/
#################################################################################################### */

get_header(); ?>

<div id="main-content" class="main-content">

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		<?php
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					
					echo "<article "; post_class(); echo ">";
						echo "<header class=\"entry-header\">";
							echo "<h1 class=\"entry-title\">";
								the_title();
							echo "</h1>";
							echo "<div class=\"h2\">";
								echo get_post_meta( $post->ID, 'secondary_title', true );
							echo "</div>";
						echo "</header>";
						
						echo "<div class=\"entry-content\">";
							
							the_content();
							
							echo JetPackSharingVC();
							
							if ( has_post_thumbnail() ) {
								echo "<p>";
									the_post_thumbnail( 'custom-page-image', array(
										'class' => 'custom-page-image'
									) );
								echo "</p>";
							}
							
							echo wpautop( get_post_meta( $post->ID, 'post_footer_text', true ) );
							
						echo "</div>";
						
					echo "</article>";
					
				} // end while ( have_posts() )
			} // end if ( have_posts() )
		?>

		</div><!-- #content -->
	</div><!-- #primary -->
	
</div><!-- #main-content -->

<?php
get_sidebar();
get_footer();
