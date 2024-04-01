<?php

/**
 * Basic Theme Setup like add_theme_support calls.
 * We are enabling legacy menus here because the new Navigation
 * is not fully capable yet.
 * https://developer.wordpress.org/reference/hooks/after_setup_theme/
 */
add_action('after_setup_theme','cod_theme_setup');
function cod_theme_setup(): void {
	add_theme_support( 'menus' );
  add_theme_support( 'editor-styles' );
	load_theme_textdomain( 'codium', get_parent_theme_file_path() . '/languages' ); // Loads our PHP translation files.
}

/**
 * Need to add something to the head of the site?
 * Don't do it directly in the header.php file.
 * We don't even have a header.php file anymore.
 * The action below is the correct way to do this.
 * https://developer.wordpress.org/reference/hooks/wp_head/
 */
add_action('wp_head','cod_wp_head');
function cod_wp_head(): void {}

/**
 * Need something added directly to the footer?
 * https://developer.wordpress.org/reference/hooks/wp_footer/
 */
add_action('wp_footer','cod_wp_footer');
function cod_wp_footer(): void {}

/**
 * If you need to add anything right after the body tag, use this hook.
 * https://developer.wordpress.org/reference/hooks/wp_body_open/
 */
add_action( 'wp_body_open', 'cod_wp_body_open' );
function cod_wp_body_open(): void {}

/**
 * Jetpack documentation uses the loop_start action instead of init.
 * The reason we are using init is because the sharing buttons do show up
 * when we use the `the_content` filter in a mega menu walker.
 * https://jetpack.com/support/sharing/
 */
add_action( 'init', 'cod_jetpack_remove_share' );
function cod_jetpack_remove_share(): void {
	remove_filter( 'the_content', 'sharing_display', 19 );
	remove_filter( 'the_excerpt', 'sharing_display', 19 );
	remove_theme_support( 'core-block-patterns' );
}
