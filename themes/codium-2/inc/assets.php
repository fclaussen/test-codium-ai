<?php

/**
 * Loads our front-end css in the content editor with the appropriate prefixes
 * and also loads the editor-exclusive editor.css file.
 */
add_action('after_setup_theme','cod2_editor_styles');
function cod2_editor_styles(): void {
  add_editor_style( ['build/css/main.css', 'build/css/editor.css'] ); // Loads our css inside the iframe.
}

// Enqueues our CSS and JS files in the front-end.
add_action( 'wp_enqueue_scripts', 'cod2_enqueue_scripts' ); // Loads our css in the front end.
function cod2_enqueue_scripts(): void {
	/**
	 * If you are looking to enqueue more files, just duplicate the block of code
	 * below and change the name of the file and folder.
	 * If it is a JS file, don't forget to change from wp_enqueue_style to wp_enqueue_script.
	 * And also make note to choose the correct JS enqueueing strategy. (Since 6.3.0).
	 * https://developer.wordpress.org/reference/functions/wp_enqueue_script/
	 *
	 * When enqueueing JS files, make sure you add
	 * `wp_set_script_translations('my-script', 'textdomain');` right after enqueueing it so that
	 * your JS files can be translated using gettext functions like __().
	 * TIP: The filename is important, it seems to need to be ${textdomain}-${locale}-${handle}.json
	 * There are scripts in the package.json file that will help you generate these files.
	 * https://developer.wordpress.org/reference/functions/wp_set_script_translations/
	 * https://developer.wordpress.org/cli/commands/i18n/make-json/
	 */
	if (
		is_readable( get_parent_theme_file_path( '/build/css/main.asset.php' ) ) &&
		is_readable( get_parent_theme_file_path( '/build/css/main.css' ) )
	) {
		$main_css = require get_parent_theme_file_path( '/build/css/main.asset.php' );
		wp_enqueue_style(
			'cod2-main-css',
			get_parent_theme_file_uri( '/build/css/main.css' ),
			$main_css['dependencies'],
			$main_css['version']
		);
	}
};

/**
 * Enqueues files in the editor. It does load them for the entire editor,
 * not just the content area so be careful to not add CSS that breaks
 * the WP Editor look and feel.
 */
// add_action( 'enqueue_block_editor_assets', 'cod2_enqueue_editor_scripts' );
// function cod2_enqueue_editor_scripts(): void {
// 	if (
// 		is_readable( get_parent_theme_file_path( '/build/js/editor.asset.php' ) ) &&
// 		is_readable( get_parent_theme_file_path( '/build/js/editor.js' ) )
// 	) {
// 		$editor_asset = require get_parent_theme_file_path( '/build/js/editor.asset.php' );
// 		wp_enqueue_script(
// 			'cod2-editor-js',
// 			get_parent_theme_file_uri( '/build/js/editor.js' ),
// 			$editor_asset['dependencies'],
// 			$editor_asset['version']
// 		);
// 	}
// }
