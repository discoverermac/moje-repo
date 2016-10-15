<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Dauntless
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                           <?php
                            /* check if the post has a Post Thumbnail assigned to it. */
                            if ( has_post_thumbnail() ) {
                                echo '<div class="single-post-thumbnail">';
                                    the_post_thumbnail( 'dauntless-large-thumb' );
                                echo '</div>';
                                } 
                            ?>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php dauntless_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dauntless' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php dauntless_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

