<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package port
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() ){
		
		the_post_thumbnail(); ?>
		
		<a href="<?php echo esc_url( get_permalink() ); ?>">
			<header>
				<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title">', '</h2>' );
				endif; ?>
				<?php pso_post_meta(); ?>
			</header>
		</a>
		
	<?php } ?>

</article><!-- #post-## -->
