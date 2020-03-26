<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package LawPress_Lite
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses lplite_header_style()
 */
function lplite_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'lplite_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'lplite_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'lplite_custom_header_setup' );

if ( ! function_exists( 'lplite_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see lplite_custom_header_setup().
	 */
	function lplite_header_style() {
		// defaults
		$header_text_color = get_header_textcolor();
		$primary_color = get_theme_mod( 'primary_color', '#b2660e' );
		$menu_bg_color = get_theme_mod( 'menu_bg_color', '#2f374f' );
		$text_color = get_theme_mod( 'text_color', '#404040' );
		$hero_background = get_theme_mod( 'hero_background', ' ' );

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
			?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
		// If the user has set a custom color for the text use that.
		else :
			?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php endif; ?>
		.site-branding .branding-icon, 
		a, 
		a:visited,
		a.branding-info:hover,
		.site-title a:hover,
		body .site-footer a:hover,
		.blog .entry-title a:hover,
		.lp-table tbody a:hover,
		.lp-table.light tbody a:hover,
		.lp-attorney-content a:hover
		{
			color: <?php echo esc_attr( $primary_color ); ?>;
		}    

		input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="search"], input[type="number"], input[type="tel"], input[type="range"], input[type="date"], input[type="month"], input[type="week"], input[type="time"], input[type="datetime"], input[type="datetime-local"], input[type="color"], textarea
		{
			outline-color: <?php echo esc_attr( $primary_color ); ?>;
		}

		#site-navigation .menu-item a:hover,
		#site-navigation .menu-item a:focus,
		.site-branding .branding-social-icon:hover,
		.focus > .sub-menu li:before,
		.lplite-hero-carousel .owl-dot.active span, .lplite-hero-carousel .owl-dot:hover span,
		.lplite-hero-carousel .owl-next span,
		.lplite-hero-carousel .owl-prev span,
		.lplite-btn,
		.lp-home-practice-area-card a:hover .lp-home-card-info,
		input[type="submit"].search-submit,
		.lp-home-cases-info,
		.dark .lp-home-case-area-card a:hover .lp-home-card-info,
		.site-footer .menu li.menu-item:before,
		button, 
		input[type="button"], 
		input[type="reset"], 
		input[type="submit"],
		.nav-links > div a,
		.more-link,
		.lp-attorney-card a:hover .person-info,
		.lp-cases-info,
		.lp-practice-area-card a:hover .lp-card-info,
		.lp-grid-card a:hover .lp-card-info,
		.lp-icon-info,
		.lp-table thead,
		.lp-social-link:hover,
		.lp-carousel .owl-dot.active span, .lp-carousel .owl-dot:hover span, 
		.lp-carousel .owl-next span:hover, .lp-carousel .owl-prev span:hover
		{
			background-color: <?php echo esc_attr( $primary_color ); ?>;
		}

		.main-navigation ul ul,
		.lp-home-practice-area-card .lp-home-card-info,
		.lp-attorney-card .person-info,
		.lp-practice-area-card .lp-card-info,
		.lp-grid-card .lp-card-info,
		table.lp-table th, table.lp-table td
		{
			border-color: <?php echo esc_attr( $primary_color ); ?>;
		}
		code{
			border-left-color: <?php echo esc_attr( $primary_color ); ?>;
		}
		.dark .lp-home-case-area-card a:hover .lp-home-card-info,
		table.lp-table.light th, table.lp-table.light td
		{
			border-color: <?php echo esc_attr( $menu_bg_color ); ?>;
		}
		#site-navigation,
		.main-navigation ul ul,
		.site-branding .branding-social-icon,
		.lplite-hero-carousel .owl-next span:hover,
		.lplite-hero-carousel .owl-prev span:hover,
		.lplite-btn:hover,
		.lp-home-practice-area-card .lp-home-card-info,
		.lplite-section.dark,
		.site-footer,
		button:hover, 
		input[type="button"]:hover, 
		input[type="reset"]:hover, 
		input[type="submit"]:hover,
		input[type="text"], input[type="email"], input[type="url"], input[type="password"], input[type="search"], input[type="number"], input[type="tel"], input[type="range"], input[type="date"], input[type="month"], input[type="week"], input[type="time"], input[type="datetime"], input[type="datetime-local"], input[type="color"], textarea,
		input[type="submit"].search-submit:hover,
		.nav-links > div a:hover,
		.more-link:hover,
		.lp-attorney-card .person-info,
		.lp-practice-area-card .lp-card-info,
		.lp-grid-card .lp-card-info,
		.lp-table tbody,
		.lp-social-link,
		.lp-carousel .owl-next span, .lp-carousel .owl-prev span, .lp-carousel .owl-dot span
		{
			background-color: <?php echo esc_attr( $menu_bg_color ); ?>;
		}

		body,
		button,
		input,
		select,
		optgroup,
		textarea,
		a.branding-info,
		.site-title a,
		.lplite-hero-carousel .person-info .attorney-title,
		.lplite-hero-carousel .person-info .attorney-subtitle,
		.lp-home-case-area-title,
		.blog .entry-title a,
		.lp-table.light tbody,
		.lp-table.light tbody a,
		.lp-attorney-content a,
		.testimonial-carousel-card p
		{
			color: <?php echo esc_attr( $text_color ); ?>;
		}
		.lplite-hero{
			background-image: url('<?php echo esc_url( $hero_background ); ?>');
			background-repeat: no-repeat;
			background-size: cover;
			background-position: center center;
		}	
		</style>
		<?php
	}
endif;
