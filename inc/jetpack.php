<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.com/
 *
 * @package port
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 */
function pt_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'post-list',
		'render'    => 'pt_infinite_scroll_render',
		'footer'    => 'page',
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'pt_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function pt_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post(); ?>
		
		<div class="columns small-12 large-4">
			<?php
			if ( is_search() ){
				get_template_part( 'template-parts/content', 'search' );
			} elseif ( is_archive( 'projects' ) ) {
				get_template_part( 'template-parts/content', 'projects' );
			} else {
				get_template_part( 'template-parts/content', get_post_format() );
			} ?>
		</div>

	<?php }
}

/**
 * Change Load More text
 */
function pt_infinite_scroll_js_settings( $settings ) {
	$settings['text'] = esc_html__( 'View More', 'pt' );
	return $settings;
}
add_filter( 'infinite_scroll_js_settings', 'pt_infinite_scroll_js_settings' );