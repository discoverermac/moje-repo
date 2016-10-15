<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Dauntless
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
                   <?php
                            if ( has_post_thumbnail() ) {
                                echo '<div class="index-thumb">';
                                echo '<a href="' . esc_url( get_permalink() ) . '" title="' . __('Keep Reading ', 'dauntless') . esc_html( get_the_title() ) . '">';
                                the_post_thumbnail( 'dauntless-small-thumb' );
                                echo '</a>';
                                echo '</div>';
                            } 
                   ?>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php dauntless_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
                                                    the_excerpt( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'dauntless' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dauntless' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php dauntless_entry_footer(); ?>
                                   <div class="continue-reading button">
                                        <?php echo '<a href="' . esc_url( get_permalink() ) . '" title="' . __('Continue Reading', 'dauntless') . esc_html(get_the_title() ). '">' . __( 'Continue Reading', 'dauntless' ) . '</a>'; ?>
                                   </div><!-- .entry-footer -->
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
