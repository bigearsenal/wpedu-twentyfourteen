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
					?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
						<?php the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header>' ); ?>
					
						<div class="entry-content">
							<?php the_content(); ?>
						</div><!-- .entry-content -->
						
					</article><!-- #post-## -->
					
					<?php
					
				} // end while ( have_posts() )
			} // end if ( have_posts() )
		?>

		</div><!-- #content -->
	</div><!-- #primary -->
	
</div><!-- #main-content -->

<?php
get_footer();
