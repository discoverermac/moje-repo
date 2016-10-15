<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Dauntless
 */

if ( ! function_exists( 'dauntless_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function dauntless_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><!--<time class="updated" datetime="%3$s">%4$s</time>-->';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( ' %s', 'post date', 'dauntless' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( ' %s', 'post author', 'dauntless' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . '<i class="fa fa-calendar fa-1g"></i>' . $posted_on . '</span><span class="byline"> ' .  '<i class="fa fa-male fa-1g"></i>'. $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'dauntless_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function dauntless_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'dauntless' ) );
		if ( $categories_list && dauntless_categorized_blog() ) {
			printf( '<span class="cat-links">' . '<i class="fa fa-tag fa-1g"></i>' . esc_html__( ' %1$s', 'dauntless' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'dauntless' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">'  . ' <i class="fa fa-tags fa-1g"></i>'. esc_html__( 'Tagged %1$s', 'dauntless' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
                                   echo ' <i class="fa fa-comment fa-1g"></i>';
		comments_popup_link( esc_html__( ' Leave a comment', 'dauntless' ),  esc_html__( ' 1 ', 'dauntless' ), esc_html__( '% Comments', 'dauntless' ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
                        
			' <i class="fa fa-edit fa-1g"> </i>' . esc_html__( ' Edit %s', 'dauntless' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function dauntless_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'dauntless_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'dauntless_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so dauntless_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so dauntless_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in dauntless_categorized_blog.
 */
function dauntless_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'dauntless_categories' );
}
add_action( 'edit_category', 'dauntless_category_transient_flusher' );
add_action( 'save_post',     'dauntless_category_transient_flusher' );

/*
 * Social media icon menu from Justin Tadlock
 */

function dauntless_social_menu() {
    if ( has_nav_menu( 'social' ) ) {
	wp_nav_menu(
		array(
			'theme_location'  => 'social',
			'container'       => 'div',
			'container_id' => 'cssmenu',
			'container_class' => 'menu-social',
			'menu_id'         => 'menu-social-items',
			'menu_class'      => 'menu-items',
			'depth'           => 1,
                                                    'link_before'     => '<span class="screen-reader-text">',
			'link_after'      => '</span>',
//			'fallback_cb'     => '',
		)
	);
    }
}
