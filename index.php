<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package port
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) :

			pt_post_header(); ?>

			<section class="section-padding">
				<div class="row" id="post-list">

					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post(); ?>

						<div class="columns small-12 medium-6 large-4">
						
							<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
						
						</div>

					<?php
					endwhile; ?>

				</div>
			</section>

		<?php
		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
