<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Dauntless
 */

get_header(); ?>

	<div id="primary" class="content-area large-9 medium-8 small-12 columns">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>
                                                    
                                                            <?php // the_post_navigation(); ?>
                    
                                                            <!-- Alternative post navigation with thumbnails    -->
                                                            <nav class="navigation">
                                                                    <?php get_template_part('/inc/_wptricks-sp-navigation', 'single');  ?>
                                                            </nav>   
                                                            

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
