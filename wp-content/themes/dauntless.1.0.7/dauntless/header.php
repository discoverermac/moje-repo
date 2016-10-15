<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dauntless
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site row">
<!--	<a class="skip-link screen-reader-text" href="#content"><?php // esc_html_e( 'Skip to content', 'dauntless' ); ?></a>-->

	<header id="masthead" class="site-header row" role="banner">
                <?php if ( get_header_image() && ('blank'== get_header_textcolor())) : ?>
                        <div class="header-image">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                    <img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
                            </a>
                        </div> <!-- header-image -->
                <?php endif; // End header image check. ?>
                        <div class="site-branding row" style='background-image: url(<?php header_image(); ?>)'>
                                <div class="site-title-holder large-8 large-centered  medium-8 medium-centered  small-8 small-centered columns">

                                                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                                <p class="site-description"><?php echo get_bloginfo( 'description', 'display' ); /* WPCS: xss ok. */ ?></p>

                                </div>
                        </div><!-- .site-branding -->
                        
		<nav id="site-navigation" class="main-navigation" role="navigation">

			<?php

                                                                        wp_nav_menu(array(
                                                                        'theme_location' => 'primary',
                                                                        'menu_id' => 'primary-menu',
//                                                                        'fallback_cb' => 'false',
                                                                        'container_id' => 'cssmenu'
                                                                      ));

                                                            ?>
                                                    <?php dauntless_social_menu(); ?>


		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->

	<div id="content" class="site-content row">
