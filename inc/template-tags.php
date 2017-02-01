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
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Published on: %s', 'post date', 'pt' ),
		'<span' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</span>'
	);

	// $byline = sprintf(
	// 	esc_html_x( 'by %s', 'post author', 'pt' ),
	// 	'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	// );

	echo '<p class="posted-on">' . $posted_on . '</p>'; // WPCS: XSS OK.

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


// GET CATEGORY
function pt_post_meta(){

	if ('projects' == get_post_type() ){
		
		$pt_category = get_the_terms( get_the_ID(), 'project-category' );
		
		if ( $pt_category ){
			echo '<span class="post-meta">'.esc_html( $pt_category[0]->name ).'</span>';
		}

	} 

}

/**
 * Display navigation to next/previous post when applicable.
 *
 */
function pt_post_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );
	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">	
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', '<i class="fa fa-chevron-left" aria-hidden="true"></i>' );
				next_post_link( '<div class="nav-next">%link</div>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>' );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}


// PAGE HEADER
function pt_page_header(){
	if ( function_exists( 'get_field' ) ){
		$hero_title = get_field( 'pt_hero_title', 'option' );
		$hero_subtitle = get_field( 'pt_hero_subtitle', 'option' );
		$second_hero_image = get_field( 'pt_second_hero_image');
		$third_hero_image = get_field( 'pt_third_hero_image');

		if ( has_post_thumbnail() ){ ?>

			<header class="page-header">
				<div class="page-header-large">
					<?php the_post_thumbnail(); ?>
					<div class="overlay">
						<?php if ( $hero_title ){ ?>
							<h1><?php echo esc_html( $hero_title ); ?></h1>
						<?php }
						if ( $hero_subtitle ){ ?>
							<h2><?php echo esc_html( $hero_subtitle ); ?></h2>
						<?php } ?>
					</div>
				</div> <!-- end of page-header-large -->
				<div class="page-header-small">
					<?php echo wp_get_attachment_image( $second_hero_image, 'full' ); ?>
					<?php echo wp_get_attachment_image( $third_hero_image, 'full' ); ?>
				</div> <!-- end of page-header-small -->
			</header>

		<?php } else { ?>

			<header class="page-header-simple">
				<h1><?php the_title(); ?></h1>
			</header>

		<?php }

	}
}


// POST HEADER
function pt_post_header(){
	if ( function_exists( 'get_field' ) ){ ?>

		<header class="page-header-simple">
			
			<?php if ( is_home() ){ ?>

				<h1><?php single_post_title(); ?></h1>
			
			<?php } else { ?>

				<h1>
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</h1>

			<?php } ?>

		</header>

	<?php }
}


// SINGLE PROJECT CLIENT NAME
function pt_client_name(){
	if ( function_exists( 'get_field' ) ){
		$client = get_field( 'pt_client_name' );

		if ( $client ){ ?>

			<p><?php echo esc_html_e( 'Client: ', 'pt' ) . ( $client ); ?></p>

		<?php }
	}
}


// SOCIAL MEDIA
function pt_social_media(){
	if ( function_exists( 'get_field' ) ){
		$social_media = get_field( 'pt_social_media', 'option' );

		if ( $social_media ){ ?>

			<ul>
			
			<?php foreach( $social_media as $social_media_item ){
				$social_media_icon = $social_media_item['pt_social_media_icon'];
				$social_media_link = $social_media_item['pt_social_media_link'];
	
				if ( $social_media_link && $social_media_icon ){ ?>
					
					<li>
						<a href="<?php echo esc_url( $social_media_link ); ?>">
							<i class="fa fa-<?php echo esc_html( $social_media_icon ); ?>" aria-hidden="true"></i>
						</a>
					</li>
				
				<?php }

			} ?>

			</ul>
		
		<?php }

	}
}


// ABOUT PAGE ABOUT ME
function pt_about_me(){
	if ( function_exists( 'get_field' ) ){
		$my_services_info_image = get_field( 'pt_my_services_info_image' );

		if ( $my_services_info_image ){ ?>
	
			<section class="about-info">
				<div class="about-info_image">
					<?php echo wp_get_attachment_image( $my_services_info_image, 'full' ); ?>
				</div>
				<div class="about-info_text">
					<?php the_content(); ?>
				</div>
			</section>
		
		<?php }
	}
}


// ABOUT PAGE MY SERVICES
function pt_my_services(){
	if ( function_exists( 'get_field' ) ){
		$my_services_image = get_field( 'pt_my_services_image' );
		$my_services_info = get_field( 'pt_my_services_info' );

		if ( $my_services_image ){ ?>

			<section class="about-info about-info_services">
				<div class="about-info_text">
					<h3 class="about-info_text__title"><?php echo esc_html_e( 'My Services', 'pt' ); ?></h3>
					<?php if ( $my_services_info ){ ?>
						
						<div class="row about-info_services__inner">
							
							<?php foreach ( $my_services_info as $my_services_info_item ){
								$my_services_info_icon = $my_services_info_item[ 'pt_my_services_info_icon' ];
								$my_services_info_text = $my_services_info_item[ 'pt_my_services_info_text' ];

								if ( $my_services_info_text ){ ?>

									<div class="columns small-12 large-6 card card-services">
										<?php if ( $my_services_info_icon ){ ?>
											<i class="fa fa-<?php echo esc_html( $my_services_info_icon ); ?>" aria-hidden="true"></i>
										<?php } ?>
										<?php echo wp_kses_post( $my_services_info_text ); ?>
									</div>

								<?php }

							} ?>

						</div>

					<?php } ?>
				</div>
				<div class="about-info_image">
					<img src="<?php echo esc_url( $my_services_image['url'] ); ?>" alt="<?php echo $my_services_image['alt']; ?>">
				</div>
			</section>

		<?php }

	}
}


// CONTACT PAGE CONTACT INFO
function pt_contact_info(){
	if ( function_exists( 'get_field' ) ){
		$primary_phone = get_field( 'pt_primary_phone' );
		$secondary_phone = get_field( 'pt_secondary_phone' );
		$email = get_field( 'pt_email' );
		$website = get_field( 'pt_website' );
		$location = get_field( 'pt_location' ); ?>

		<section class="row">
			
			<?php if ( $primary_phone || $secondary_phone ){ ?>

				<div class="columns small-12 large-4 card">
					<i class="fa fa-phone" aria-hidden="true"></i>
					<a href="tel:012345678902"><?php echo esc_html( $primary_phone ); ?></a>
					<a href="tel:012345678903"><?php echo esc_html( $secondary_phone ); ?></a>
				</div>

			<?php }

			if ( $email || $website ){ ?>

				<div class="columns small-12 large-4 card">
					<i class="fa fa-envelope-o" aria-hidden="true"></i>
					<a href="mailto:sendme@email.com"><?php echo esc_html( $email ); ?></a>
					<a href="http://webaddress.com"><?php echo esc_html( $website ); ?></a>
					<p></p>
					<p></p>
				</div>

			<?php }

			if ( $location ){ ?>

				<div class="columns small-12 large-4 card">
					<i class="fa fa-location-arrow" aria-hidden="true"></i>
					<p><?php echo esc_html( $location ); ?></p>
				</div>

			<?php } ?>

		</section>

	<?php }
}