<?php
/**
 * TEMPLATE NAME: About
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package port
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				pt_page_header();

				pt_about_me();

				pt_my_services();

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
