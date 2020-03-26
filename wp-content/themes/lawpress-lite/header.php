<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package LawPress_Lite
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'lawpress-lite' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-3 col-md-6">
						<?php
						the_custom_logo();
						if ( is_front_page() && is_home() ) :
							?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php
						else :
							?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
						endif;
						$lplite_description = get_bloginfo( 'description', 'display' );
						if ( $lplite_description || is_customize_preview() ) :
							?>
							<p class="site-description"><?php echo $lplite_description; /* WPCS: xss ok. */ ?></p>
						<?php endif; ?>
					</div>
					<div class="col-lg-3 col-md-6 hours-column">
						<?php if ( get_theme_mod('lplite_work_hours') != '' ) : ?>
							<i class="far fa-clock branding-icon"></i><span class="branding-info"><?php echo esc_html(get_theme_mod('lplite_work_hours') ) ?></span>
						<?php endif; ?>
					</div>
					<div class="col-lg-3 col-md-6 phone-column">
						<?php if ( get_theme_mod('lplite_phone') != '' ) : ?>
							<i class="fas fa-phone branding-icon"></i><a class="branding-info" href="tel:<?php echo esc_attr(get_theme_mod('lplite_phone') ) ?>"><?php echo esc_html(get_theme_mod('lplite_phone') ) ?></a>
						<?php endif; ?>
					</div>
					<div class="col-lg-3 col-md-6 social-column">
						<?php if ( get_theme_mod('lplite_facebook') != '' ) : ?>
							<a class="branding-social-icon" href="<?php echo esc_url( get_theme_mod('lplite_facebook') ) ?>"><i class="fab fa-facebook branding-icon"></i></a>
						<?php endif; ?>
						<?php if ( get_theme_mod('lplite_twitter') != '' ) : ?>
							<a class="branding-social-icon" href="<?php echo esc_url( get_theme_mod('lplite_twitter') ) ?>"><i class="fab fa-twitter branding-icon"></i></a>
						<?php endif; ?>
						<?php if ( get_theme_mod('lplite_linkedin') != '' ) : ?>
							<a class="branding-social-icon" href="<?php echo esc_url( get_theme_mod('lplite_linkedin') ) ?>"><i class="fab fa-linkedin branding-icon"></i></a>
						<?php endif; ?>
					</div>
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<div class="container">
				<div class="row">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fas fa-bars"></i></button>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					) );
					?>
				</div><!-- .row -->
			</div><!-- .container -->
		</nav><!-- #site-navigation -->
			
	</header><!-- #masthead -->

	<div id="content" class="site-content">
