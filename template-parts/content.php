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

	<?php if ( has_post_thumbnail() ){ ?>
		<a href="<?php echo esc_url( get_permalink() ); ?>">
			<?php the_post_thumbnail();	?>
		</a>
	<?php } ?>

	<header class="entry-header">
		<?php the_title( '<p class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></p>' ); ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
