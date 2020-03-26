<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package LawPress_Lite
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container">
			<div class="row">
				<?php for ( $i=1; $i <= 4; $i++ ) : ?>
					<?php if ( is_active_sidebar('footer-widgets-'.$i) ) : ?>
						<div class="col-12 col-sm">
							<?php dynamic_sidebar('footer-widgets-'.$i); ?>
						</div>
					<?php endif; ?>
				<?php endfor; ?>
			</div><!-- .row -->
			<div class="row">
				<div class="col"><div class="divider"></div></div>
			</div><!-- .row -->
			<div class="row">
				<div class="site-info col">
					<?php if ( ! get_theme_mod('footer_copyright') != '' ) : ?>
						<?php
						/* translators: 1: Year. */
						printf( esc_html__( 'Copyright %1$d All Rights Reserved.', 'lawpress-lite' ), esc_html(date('Y') ));
						?>
						<span class="sep"> | </span>
						<?php
						/* translators: 1: Theme name, 2: Theme author. */
						printf( esc_html__( 'Theme: %1$s by %2$s.', 'lawpress-lite' ), 'LawPress Lite', '<a href="https://businessupwebsite.com">Ivan Chernyakov</a>' );
						?>
					<?php else : ?>

						<?php 
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
						echo wp_kses( get_theme_mod('footer_copyright'), $allowed_html );

						 ?>
					<?php endif; ?>
				</div><!-- .site-info -->
			</div><!-- .row -->
		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
