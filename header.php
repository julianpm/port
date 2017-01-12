<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package port
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<div class="row">
		<div class="columns small-12">
			<header id="masthead" class="site-header" role="banner">
				
				<?php $port_logo = get_field( 'pt_logo', 'option' );

				if ( $port_logo ){ ?>
					<div class="site-branding">
						<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img src="<?php echo esc_url( $port_logo['url'] ); ?>" alt="<?php echo $port_logo['alt']; ?>">
						</a>
					</div><!-- .site-branding -->
				<?php } ?>

				<nav id="site-navigation" class="main-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
					<i class="fa fa-bars" aria-hidden="true"></i>
				</nav><!-- #site-navigation -->
			</header><!-- #masthead -->
		</div>
	</div>

	<div id="content" class="site-content">
