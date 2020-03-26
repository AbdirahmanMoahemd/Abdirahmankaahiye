<?php
/**
 * LawPress Lite Theme Customizer
 *
 * @package LawPress_Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function lplite_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'lplite_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'lplite_customize_partial_blogdescription',
		) );
	}

	/* Header */
	$wp_customize->add_panel(
		'lplite_header_panel', 
		array(
			'priority' => 5,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __('Header', 'lawpress-lite'),
			'description' => __('Footer Settings', 'lawpress-lite'),
		)
    );
	$wp_customize->add_section( 
		'lplite_header_section' , 
		array(
			'title'      => __( 'Header Settings', 'lawpress-lite' ),
			'priority'   => 10,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'panel' => 'lplite_header_panel',
		) 
	);
	
	// work hours
	$wp_customize->add_setting( 'lplite_work_hours' , array(
		'default'     => __( '08:00 - 17:00', 'lawpress-lite' ),
		'transport'   => 'refresh',
		'sanitize_callback'	=>	'lplite_sanitize_text_field'
	) );
	$wp_customize->add_control( 
		'lplite_work_hours', 
		array(
			'type' 		 => 'text',
			'label'      => __( 'Work Hours', 'lawpress-lite' ),
			'section'    => 'lplite_header_section',
			'settings'   => 'lplite_work_hours',
			//'context'    => 'your_setting_context' 
		)  
	);

	// phone
	$wp_customize->add_setting( 'lplite_phone' , array(
		'default'     => __( '123.456.789', 'lawpress-lite' ),
		'transport'   => 'refresh',
		'sanitize_callback'	=>	'lplite_sanitize_text_field'
	) );
	$wp_customize->add_control( 
		'lplite_phone', 
		array(
			'type' 		 => 'phone',
			'label'      => __( 'Phone Number', 'lawpress-lite' ),
			'section'    => 'lplite_header_section',
			'settings'   => 'lplite_phone', 
		)  
	);

	// social links
	$wp_customize->add_section( 
		'lplite_social_links' , 
		array(
			'title'      => __( 'Social links', 'lawpress-lite' ),
			'priority'   => 10,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'panel' => 'lplite_header_panel',
		) 
	);
	//facebook
	$wp_customize->add_setting( 'lplite_facebook' , array(
		'default'     => '',
		'transport'   => 'refresh',
		'sanitize_callback'	=>	'lplite_esc_url_raw'
	) );
	$wp_customize->add_control( 
		'lplite_facebook', 
		array(
			'type' 		 => 'url',
			'label'      => __( 'Facebook', 'lawpress-lite' ),
			'section'    => 'lplite_social_links',
			'settings'   => 'lplite_facebook', 
		)  
	);
	//twitter
	$wp_customize->add_setting( 'lplite_twitter' , array(
		'default'     => '',
		'transport'   => 'refresh',
		'sanitize_callback'	=>	'lplite_esc_url_raw'
	) );
	$wp_customize->add_control( 
		'lplite_twitter', 
		array(
			'type' 		 => 'url',
			'label'      => __( 'Twitter', 'lawpress-lite' ),
			'section'    => 'lplite_social_links',
			'settings'   => 'lplite_twitter', 
		)  
	);
	//linkedin
	$wp_customize->add_setting( 'lplite_linkedin' , array(
		'default'     => '',
		'transport'   => 'refresh',
		'sanitize_callback'	=>	'lplite_esc_url_raw'
	) );
	$wp_customize->add_control( 
		'lplite_linkedin', 
		array(
			'type' 		 => 'url',
			'label'      => __( 'Linkedin', 'lawpress-lite' ),
			'section'    => 'lplite_social_links',
			'settings'   => 'lplite_linkedin', 
		)  
	);

	/* Primary color */
	$wp_customize->add_setting( 'primary_color' , array(
		'default'     => '#b2660e',
		'transport'   => 'refresh',
		'sanitize_callback'	=>	'lplite_esc_attr'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
		'label'      => __( 'Primary Color', 'lawpress-lite' ),
		'section'    => 'colors',
		'settings'   => 'primary_color',
	) ) );

	/* Menu Background Color */
	$wp_customize->add_setting( 'menu_bg_color' , array(
		'default'     => '#1f244f',
		'transport'   => 'refresh',
		'sanitize_callback'	=>	'lplite_esc_attr'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'menu_bg_color', array(
		'label'      => __( 'Secondary &Menu Background Color', 'lawpress-lite' ),
		'section'    => 'colors',
		'settings'   => 'menu_bg_color',
	) ) );

	/* Text Color */
	$wp_customize->add_setting( 'text_color' , array(
		'default'     => '#404040',
		'transport'   => 'refresh',
		'sanitize_callback'	=>	'lplite_esc_attr'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'text_color', array(
		'label'      => __( 'Text Color', 'lawpress-lite' ),
		'section'    => 'colors',
		'settings'   => 'text_color',
	) ) );

	/* Hero panel */
	$wp_customize->add_panel(
		'home_content_panel', 
		array(
			'priority' => 15,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __('Home Content', 'lawpress-lite'),
			'description' => __('Home page content settings.', 'lawpress-lite'),
		)
    );
	$wp_customize->add_section( 
		'lplite_hero_section' , 
		array(
			'title'      => __( 'Hero Section', 'lawpress-lite' ),
			'priority'   => 10,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'panel' => 'home_content_panel',
		) );
	
	// hero bg
	$wp_customize->add_setting( 'hero_background' , array(
		'default'     => '',
		'transport'   => 'refresh',
		'sanitize_callback'	=>	'lplite_esc_url_raw'
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hero_background_input', 
		array(
			'label'      => __( 'Upload a hero image background', 'lawpress-lite' ),
			'section'    => 'lplite_hero_section',
			'settings'   => 'hero_background',
			//'context'    => 'your_setting_context' 
		) ) );

	// hero title
	$wp_customize->add_setting( 'hero_title' , array(
		'default'     => __( 'Law Firm', 'lawpress-lite' ),
		'transport'   => 'refresh',
		'sanitize_callback'	=>	'lplite_sanitize_text_field'
	) );
	$wp_customize->add_control( 
		'hero_title', 
		array(
			'type' 		 => 'text',
			'label'      => __( 'Hero Title', 'lawpress-lite' ),
			'section'    => 'lplite_hero_section',
			'settings'   => 'hero_title',
			//'context'    => 'your_setting_context' 
		) 
	);

	// hero below title
	$wp_customize->add_setting( 'hero_below_title' , array(
		'default'     => __( 'Professional Legal Help. We will achieve justice for you.', 'lawpress-lite' ),
		'transport'   => 'refresh',
		'sanitize_callback'	=>	'lplite_wpkses'
	) );
	$wp_customize->add_control( 
		'hero_below_title', 
		array(
			'type' 		 => 'textarea',
			'label'      => __( 'Content', 'lawpress-lite' ),
			'section'    => 'lplite_hero_section',
			'settings'   => 'hero_below_title',
			//'context'    => 'your_setting_context' 
		) 
	);

	/* hero contact text */
	$wp_customize->add_setting( 'hero_button_text' , array(
		'default'     => __( 'Contact', 'lawpress-lite' ),
		'transport'   => 'refresh',
		'sanitize_callback'	=>	'lplite_sanitize_text_field'
	) );
	$wp_customize->add_control( 
		'hero_button_text', 
		array(
			'type' 		 => 'text',
			'label'      => __( 'Button Text', 'lawpress-lite' ),
			'section'    => 'lplite_hero_section',
			'settings'   => 'hero_button_text',
			//'context'    => 'your_setting_context' 
		) 
	);

	// button link
	$wp_customize->add_setting( 'hero_link' , array(
		'default'     => '#',
		'transport'   => 'refresh',
		'sanitize_callback'	=>	'lplite_esc_url_raw'
	) );
	$wp_customize->add_control( 
		'hero_link', 
		array(
			'type' 		 => 'url',
			'label'      => __( 'Button Link', 'lawpress-lite' ),
			'section'    => 'lplite_hero_section',
			'settings'   => 'hero_link',
			//'context'    => 'your_setting_context' 
		) 
	);

	/* Practice areas */
	$wp_customize->add_section( 
		'lplite_practice_areas' , 
		array(
			'title'      => __( 'Section Practice Areas', 'lawpress-lite' ),
			'priority'   => 15,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'panel' => 'home_content_panel',
		) );
	
	// title
	$wp_customize->add_setting( 'practice_area_title' , array(
		'default'     => __( 'Our Practice Areas', 'lawpress-lite' ),
		'transport'   => 'refresh',
		'sanitize_callback'	=>	'lplite_sanitize_text_field'
	) );
	$wp_customize->add_control( 
		'practice_area_title', 
		array(
			'type' 		 => 'text',
			'label'      => __( 'Title', 'lawpress-lite' ),
			'section'    => 'lplite_practice_areas',
			'settings'   => 'practice_area_title',
		)  );

	// hide
	$wp_customize->add_setting( 'practice_areas_hide' , array(
		'default'     => '',
		'transport'   => 'refresh',
		'sanitize_callback'	=>	'lplite_sanitize_checkbox'
	) );
	$wp_customize->add_control( 
		'practice_areas_hide', 
		array(
			'type' 		 => 'checkbox',
			'label'      => __( 'Hide', 'lawpress-lite' ),
			'section'    => 'lplite_practice_areas',
			'settings'   => 'practice_areas_hide',
		)  
	);

	/* Cases */
	$wp_customize->add_section( 
		'lplite_cases' , 
		array(
			'title'      => __( 'Section Cases', 'lawpress-lite' ),
			'priority'   => 15,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'panel' => 'home_content_panel',
		) );
	
	// title
	$wp_customize->add_setting( 'case_title' , array(
		'default'     => __( 'Our Cases', 'lawpress-lite' ),
		'transport'   => 'refresh',
		'sanitize_callback'	=>	'lplite_sanitize_text_field'
	) );
	$wp_customize->add_control( 
		'case_title', 
		array(
			'type' 		 => 'text',
			'label'      => __( 'Title', 'lawpress-lite' ),
			'section'    => 'lplite_cases',
			'settings'   => 'case_title',
		)  );

	// hide
	$wp_customize->add_setting( 'cases_hide' , array(
		'default'     => '',
		'transport'   => 'refresh',
		'sanitize_callback'	=>	'lplite_sanitize_checkbox'
	) );
	$wp_customize->add_control( 
		'cases_hide', 
		array(
			'type' 		 => 'checkbox',
			'label'      => __( 'Hide', 'lawpress-lite' ),
			'section'    => 'lplite_cases',
			'settings'   => 'cases_hide',
		)  
	);


	/* Footer */
	$wp_customize->add_panel(
		'lplite_footer_panel', 
		array(
			'priority' => 15,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'title' => __('Footer', 'lawpress-lite'),
			'description' => __('Footer Settings', 'lawpress-lite'),
		)
    );
	$wp_customize->add_section( 
		'lplite_footer_section' , 
		array(
			'title'      => __( 'Copyright', 'lawpress-lite' ),
			'priority'   => 10,
			'capability' => 'edit_theme_options',
			'theme_supports' => '',
			'panel' => 'lplite_footer_panel',
		) 
	);
	
	// footer copyright
	$wp_customize->add_setting( 'footer_copyright' , array(
		'default'     => '',
		'transport'   => 'refresh',
		'sanitize_callback'	=>	'lplite_wpkses'
	) );
	$wp_customize->add_control( 
		'footer_copyright', 
		array(
			'type' 		 => 'textarea',
			'label'      => __( 'Footer copyright', 'lawpress-lite' ),
			'section'    => 'lplite_footer_section',
			'settings'   => 'footer_copyright',
			//'context'    => 'your_setting_context' 
		)  
	);

}
add_action( 'customize_register', 'lplite_customize_register' );

function lplite_esc_url_raw( $value ){
	return esc_url_raw( $value );
}
function lplite_esc_attr( $value ){
	return esc_attr( $value );
}
function lplite_wpkses( $value ){
	$allowed_html = array(
		'a' => array(
			'href' => array(),
			'title' => array(),
			'target' => array()
		),
		'br' => array(),
		'em' => array(),
		'strong' => array(),
	);
	return wp_kses($value, $allowed_html);
}
function lplite_sanitize_checkbox( $checked ){
    // Boolean check.
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
function lplite_sanitize_text_field( $value ){
    return sanitize_text_field( $value );
}


/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function lplite_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function lplite_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function lplite_customize_preview_js() {
	wp_enqueue_script( 'lplite-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'lplite_customize_preview_js' );
