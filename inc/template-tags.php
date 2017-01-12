<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package port
 */

if ( ! function_exists( 'pt_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function pt_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'pt' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'pt' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'pt_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function pt_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'pt' ) );
		if ( $categories_list && pt_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'pt' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'pt' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'pt' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'pt' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'pt' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function pt_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'pt_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'pt_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so pt_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so pt_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in pt_categorized_blog.
 */
function pt_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'pt_categories' );
}
add_action( 'edit_category', 'pt_category_transient_flusher' );
add_action( 'save_post',     'pt_category_transient_flusher' );


// PAGE HEADER
function pt_page_header(){
	if ( function_exists( 'get_field' ) ){
		$primary_hero = get_field( 'pt_primary_hero_image', 'option' );
		$second_hero = get_field( 'pt_second_hero_image', 'option' );
		$third_hero = get_field( 'pt_third_hero_image', 'option' );

		if ( $primary_hero ){ ?>

			<header class="page-header">
				<div class="page-header-large">
					<img src="<?php echo esc_url( $primary_hero['url'] ); ?>" alt="<?php echo $primary_hero['alt']; ?>">
				</div>
				<div class="page-header-small">
					<img src="<?php echo esc_url( $second_hero['url'] ); ?>" alt="<?php echo $second_hero['alt']; ?>">
					<img src="<?php echo esc_url( $third_hero['url'] ); ?>" alt="<?php echo $third_hero['alt']; ?>">
				</div>
			</header>

		<?php }

	}
}
