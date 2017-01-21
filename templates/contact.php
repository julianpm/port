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
			while ( have_posts() ) : the_post();

				pt_page_header(); ?>

				<div class="row section-padding">
					<div class="columns small-12">
						<?php the_content();
						pt_contact_info(); ?>
					</div>
				</div>

			<?php endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
