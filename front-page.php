<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
			
				pt_page_header(); ?>

				<section class="section-padding work-projects">

					<?php
					$args = array(
						'post_type' 	 => 'projects',
						'posts_per_page' => '8'
					);

					// the query
					$projects = new WP_Query( $args );

					if ( $projects->have_posts() ) :

						while ( $projects->have_posts() ) : $projects->the_post();
				
							get_template_part( 'template-parts/content', 'projects' );

						endwhile;

						wp_reset_postdata();

					endif; ?>

				</section>

			<?php endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
