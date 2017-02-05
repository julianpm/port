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
	
	<header class="entry-header">
		
		<?php
		pt_post_navigation();
		
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif; ?>

	</header><!-- .entry-header -->

	<?php if ( has_post_thumbnail() ){
		the_post_thumbnail();
	} ?>
	
	<div class="entry-content">
		<p><?php echo esc_html_e( 'Project Name: ', 'pt' ) . single_post_title(); ?></p>
		<p><?php echo esc_html_e( 'Category: ', 'pt' ) . pt_post_meta(); ?></p>
		<?php pt_posted_on(); ?>
		<?php the_content(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->