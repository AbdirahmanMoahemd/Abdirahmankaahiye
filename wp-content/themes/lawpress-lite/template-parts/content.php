<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package LawPress_Lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				lplite_posted_on();
				lplite_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php 
	$lplite_current_post_type = get_post_type();
	if ( ( ($lplite_current_post_type != 'lp_practice_area') && ! is_single() ) || ( ( $lplite_current_post_type != 'lp_case' )  && ! is_single() ) || ( ($lplite_current_post_type != 'lp_attorney') && ! is_single() ) ){
		lplite_post_thumbnail(); 
	}
	?>

	<div class="entry-content">
		<?php

		if ( is_single() ){
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'lawpress-lite' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );
		}
		else {
			the_excerpt();
		}

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lawpress-lite' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php lplite_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
