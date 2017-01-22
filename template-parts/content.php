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
	
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		
		<?php the_excerpt(); ?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
