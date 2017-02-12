<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package port
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info row">
			<div class="columns small-12">
				<?php pt_social_media(); ?>
				<p>© PORT - <?php echo date( 'Y' ); ?><?php echo esc_html_e( '. All Rights Reserved. By Julian Meanchoff.' ); ?></p>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
