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
					the_title( '<p class="entry-title">', '</p>' );
					pt_post_meta();
				?>
			</header>
		</a>

	<?php } ?>

</article><!-- #post-## -->
