<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package port
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header-simple">
					<h1 class="page-title"><?php esc_html_e( '404', 'pt' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content section-padding">
					<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'pt' ); ?></p>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
