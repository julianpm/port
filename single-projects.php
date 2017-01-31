<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package port
 */

get_header(); ?>

	<div id="primary" class="content-area section-padding">
		<main id="main" class="site-main" role="main">
					
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'single-'. get_post_type() );

			endwhile; // End of the loop.
			?>
					
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
