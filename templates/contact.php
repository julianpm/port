<?php
/**
 * TEMPLATE NAME: Contact
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package port
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post(); ?>

				<section class="section-padding">
					<div class="row section-padding">
						<div class="columns small-12">
							<?php the_content(); ?>
						</div>
					</div>

					<?php pt_contact_info(); ?>
				</section>
			
			<?php endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
