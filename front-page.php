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
			
				pt_page_header();

				$args = array(
					'post_type' 	 => 'projects',
					'posts_per_page' => '4',
					'orderby'		 => 'rand'
				);

				// the query
				$projects = new WP_Query( $args );

				if ( $projects->have_posts() ) : ?>

					<section class="section-padding work-projects-wrapper">
						<h3><?php echo esc_html_e( "Here are some things I've worked on", "pt" ); ?></h3>
						<div class="work-projects">

							<?php while ( $projects->have_posts() ) : $projects->the_post();
					
								get_template_part( 'template-parts/content', 'projects' );

							endwhile;

							wp_reset_postdata(); ?>

						</div>
						<a class="btn" href="<?php echo esc_url( home_url( '/projects' ) ); ?>"><?php echo esc_html_e( 'View More', 'pt' ); ?></a>
					</section>

				<?php
				endif;
				
			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
