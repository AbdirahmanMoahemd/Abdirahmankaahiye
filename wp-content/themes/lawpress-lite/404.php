<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package LawPress_Lite
 */

get_header();
?>
<div class="container">
	<div class="row">
	<div id="primary" class="content-area col">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'lawpress-lite' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'lawpress-lite' ); ?></p>

					<?php
					get_search_form();

					//the_widget( 'WP_Widget_Recent_Posts' );
					?>

					<?php
					

					the_widget( 'WP_Widget_Tag_Cloud' );
					?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
	</div><!-- .row -->
</div><!-- .container -->
<?php
get_footer();
