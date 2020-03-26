<?php
/**
 * Template Name: Theme Home Page
 * The template for displaying home page
 * 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LawPress_Lite
 */

get_header();

// get customizer data
$lplite_hero_title = get_theme_mod( 'hero_title', __( 'Law Firm', 'lawpress-lite' ) ); 
$lplite_hero_below_title = get_theme_mod( 'hero_below_title', __( 'Professional Legal Help. We will achieve justice for you.', 'lawpress-lite' ) ); 
$lplite_hero_button_text = get_theme_mod( 'hero_button_text', __( 'Contact', 'lawpress-lite' ) ); 
$lplite_hero_link = get_theme_mod( 'hero_link', '#' ); 
$lplite_practice_area_title = get_theme_mod( 'practice_area_title', __( 'Our Practice Areas', 'lawpress-lite' ) );
$lplite_case_title = get_theme_mod( 'case_title', __( 'Our Cases', 'lawpress-lite' ) );

?>
<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<!-- Section Hero -->
		<div class="lplite-section lplite-hero">
			<div class="overlay"></div>
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-5">
						<?php 
							if ( class_exists('LawPress') && class_exists('ACF') ){
								// query for your post type
								$lplite_post_type_query  = new WP_Query(  
									array (  
										'post_type'      => 'lp_attorney',  
										'posts_per_page' => -1  
									)  
								); 
								$lplite_attorney_list = '';
								$lplite_posts_array = $lplite_post_type_query->posts;   
								$lplite_ids_array = wp_list_pluck( $lplite_posts_array, 'post_title', 'ID' );

								$lplite_attorney_list .= '<div class="carousel-container">';
								$lplite_attorney_list .= '<div class="owl-carousel lplite-hero-carousel">';
								foreach( $lplite_ids_array as $lplite_attorney_id => $lplite_attorney_name ) {								
									$lplite_attorney_niche = 'Attorney';
									if ( get_field('lp_attorney_niche', $lplite_attorney_id) ){
										$lplite_attorney_niche = esc_html( get_field('lp_attorney_niche', $lplite_attorney_id) );
									}
									$lplite_attorney_list_has_one = true;

									// get count of cases 
									if ( class_exists('ACF') ){
										$lplite_case_count = 0;
										$lplite_inner_post_type_query  = new WP_Query(  
											array (  
												'post_type'      => 'lp_case',  
												'posts_per_page' => -1  
											)  
										);   
										$lplite_inner_posts_array = $lplite_inner_post_type_query->posts;
										$lplite_inner_ids_array = wp_list_pluck( $lplite_inner_posts_array, 'post_title', 'ID' );
										wp_reset_postdata();
									}

									if ( get_the_post_thumbnail($lplite_attorney_id) ) {
										$lplite_case_classes = 'card-has-thumbnail';
									}
									else $lplite_case_classes = 'card-no-thumbnail';
									
									$lplite_attorney_list .= '<div class="lp-hero-attorney-card '.$lplite_case_classes.' item"><a href="'.esc_url( get_permalink($lplite_attorney_id) ).'">';
									if ( get_the_post_thumbnail($lplite_attorney_id) ) {
										$lplite_attorney_list .= '<div class="lp-hero-thumbnail-container">';
										$lplite_attorney_list .= '<div class="lp-hero-attorney-photo">'.get_the_post_thumbnail($lplite_attorney_id, 'lawpress-thumbnail' ).'</div>';		
										$lplite_attorney_list .= '<div class="overlay"></div>';
										$lplite_attorney_list .= '</div>';
									}

									$lplite_attorney_list .= '<div class="person-info">';
									$lplite_attorney_list .= '<h5 class="attorney-title">'.esc_html( $lplite_attorney_name ).'</h5>';

									$lplite_attorney_list .= '<span class="attorney-subtitle">'.esc_html( $lplite_attorney_niche ).'</span>';
									$lplite_attorney_list .= '</div>';
									$lplite_attorney_list .= '</a></div>';
								}
								$lplite_attorney_list .= '</div>';
								$lplite_attorney_list .= '</div>';
								echo $lplite_attorney_list;
								wp_reset_postdata();
							}
						?>
					</div>
					<div class="col-md-1">
					</div>
					<div class="col-md-6">
						<h1 class="hero-title"><?php echo esc_html($lplite_hero_title); ?></h2>
						<p class="hero-slogan">
							<?php 
							$lplite_allowed_html = array(
								'a' => array(
									'href' => array(),
									'title' => array(),
									'target' => array()
								),
								'br' => array(),
								'em' => array(),
								'strong' => array(),
							);
							echo wp_kses($lplite_hero_below_title, $lplite_allowed_html); 
							?>
							</p>
						<a class="lplite-btn" href="<?php echo esc_url($lplite_hero_link); ?>"><?php echo esc_html($lplite_hero_button_text); ?></a>
					</div>
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .lplite-hero -->

		<?php if ( ! get_theme_mod('practice_areas_hide') ) : ?>
			<!-- Section Practice Areas -->
			<div class="lplite-section lplite-section-practice">
				<div class="container">
					<div class="row">
						<?php
						$lplite_practice_list = '';
						if ( class_exists('LawPress') && class_exists('ACF') ){
							// query for your post type
							$lplite_post_type_query  = new WP_Query(  
								array (  
									'post_type'      => 'lp_practice_area',  
									'posts_per_page' => -1  
								)  
							);   
							$lplite_posts_array = $lplite_post_type_query->posts;   
							$lplite_ids_array = wp_list_pluck( $lplite_posts_array, 'post_title', 'ID' );
							$lplite_practice_list = '';
							$lplite_practice_list = '<h2 class="section-title">'.$lplite_practice_area_title.'</h2>';
							foreach( $lplite_ids_array as $lplite_practice_id => $lplite_practice_name ) {
								if ( get_the_post_thumbnail($lplite_practice_id) ) {
									$lplite_case_classes = 'card-has-thumbnail';
								}
								else $lplite_case_classes = 'card-no-thumbnail';
								$lplite_practice_list .= '<div class="lp-home-practice-area-card col-md-3 '.$lplite_case_classes.'"><a href="'.esc_url( get_permalink($lplite_practice_id) ).'">';

									// get count of cases 
								if ( class_exists('ACF') ){
									$lplite_case_count = 0;
									$lplite_inner_post_type_query  = new WP_Query(  
										array (  
											'post_type'      => 'lp_case',  
											'posts_per_page' => -1  
										)  
									);   
									$lplite_inner_posts_array = $lplite_inner_post_type_query->posts;
									$lplite_inner_ids_array = wp_list_pluck( $lplite_inner_posts_array, 'post_title', 'ID' );
									foreach( $lplite_inner_ids_array as $lplite_case_id => $lplite_case_name ) {
											if ( get_field( 'lp_case_areas', $lplite_case_id ) ){
												$lplite_case_array = get_field( 'lp_case_areas', $lplite_case_id );
												foreach ( $lplite_case_array as $lplite_key => $lplite_inner_area_id ){
													if ( $lplite_inner_area_id == $lplite_practice_id ){
														$lplite_case_count++;
													}
												}
											}
										}
										wp_reset_postdata();
									}

									if ( get_the_post_thumbnail($lplite_practice_id) ) {
										$lplite_practice_list .= '<div class="lp-home-thumbnail-container">';
										$lplite_practice_list .= '<div class="lp-home-practice-area-image">'.get_the_post_thumbnail($lplite_practice_id,array(300,300)).'</div>';
										$lplite_practice_list .= '<div class="overlay"></div>';
										$lplite_practice_list .= '</div>';
									}
									$lplite_practice_list .= '<div class="lp-home-card-info">';
									$lplite_practice_list .= '<h5 class="lp-home-practice-area-title">'.esc_html( $lplite_practice_name ).'</h5>';
									$lplite_practice_list .= '</div>';
									$lplite_practice_list .= '</a></div>';
								}									
							}	
							wp_reset_postdata();	
							echo $lplite_practice_list;
						?>
					</div><!-- .row -->
				</div><!-- .container -->
			</div><!-- .lplite-hero -->
		<?php endif; ?>

		<?php if ( ! get_theme_mod('cases_hide') ) : ?>
		<!-- Section Practice Areas -->
			<div class="lplite-section dark lplite-section-cases">
				<div class="container">
					<div class="row">
						<?php
						if ( class_exists('LawPress') && class_exists('ACF') ){
							// query for your post type
							$lplite_post_type_query  = new WP_Query(  
								array (  
									'post_type'      => 'lp_case',  
									'posts_per_page' => -1  
								)  
							);   
							$lplite_posts_array = $lplite_post_type_query->posts;   
							$lplite_ids_array = wp_list_pluck( $lplite_posts_array, 'post_title', 'ID' );
							$lplite_case_list = '<h2 class="section-title">'.$lplite_case_title.'</h2>';
							foreach( $lplite_ids_array as $lplite_case_id => $lplite_practice_name ) {
								if ( get_the_post_thumbnail($lplite_case_id) ) {
									$lplite_case_classes = 'card-has-thumbnail';
								}
								else $lplite_case_classes = 'card-no-thumbnail';
								$lplite_case_list .= '<div class="lp-home-case-area-card col-md-3 '.$lplite_case_classes.'"><a href="'.esc_url( get_permalink($lplite_case_id) ).'">';

								// get case settlement 
								$lplite_case_settlement = '';
								if ( get_field( 'lp_case_settlement', $lplite_case_id ) ){
									$lplite_case_settlement = get_field( 'lp_case_settlement', $lplite_case_id );
								}
								
								if ( get_the_post_thumbnail($lplite_case_id) ) {
									$lplite_case_list .= '<div class="lp-home-thumbnail-container">';
									$lplite_case_list .= '<div class="lp-home-practice-area-image">'.get_the_post_thumbnail($lplite_case_id,array(300,300)).'</div>';		
									$lplite_case_list .= '<div class="overlay"></div>';

									// info icon - cases
									if ( array_key_exists('info_icons', $lawpress_options['lawpress_main']) ){
										if ( $lawpress_options['lawpress_main']['info_icons'] == 1 ){
											$lplite_case_list .= '<div class="lp-home-cases-info"><i class="fas fa-dollar-sign"></i><span class="case-settlement">'.esc_html( $lplite_case_settlement ).'</span></div>';
										}
									}
									$lplite_case_list .= '</div>';
								} else{
									if ( array_key_exists('info_icons', $lawpress_options['lawpress_main']) ){
										if ( $lawpress_options['lawpress_main']['info_icons'] == 1 ){
											$lplite_case_list .= '<div class="lp-home-cases-info"><i class="fas fa-dollar-sign"></i><span class="case-settlement">'.esc_html( $lplite_case_settlement ).'</span></div>';
										}
									}
								}
								$lplite_case_list .= '<div class="lp-home-card-info">';
								$lplite_case_list .= '<h5 class="lp-home-case-area-title">'.esc_html( $lplite_practice_name ).'</h5>';
								$lplite_case_list .= '</div>';
								$lplite_case_list .= '</a></div>';
							}	
							$lplite_case_list .= '</div>';
							wp_reset_postdata();				
							echo $lplite_case_list;
						}
						?>
					</div><!-- .row -->
				</div><!-- .container -->
			</div><!-- .lplite-section -->
		<?php endif; ?>

		<div class="container">
			<div class="row">
				<div class="col lplite-section">
					<?php
					while ( have_posts() ) :
						the_post();
						the_content();

									// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					endwhile; // End of the loop.
					?>
				</div>
			</div><!-- .row -->
		</div><!-- .container -->
	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
