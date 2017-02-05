<?php
/**
 * The template for displaying archive pages
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

						<div class="columns small-12 large-4">
							
							<?php get_template_part( 'template-parts/content', 'projects' ); ?>
							
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
