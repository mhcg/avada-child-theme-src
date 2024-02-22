<?php
/**
 * Avada Child Theme.
 *
 * @package Avada-Child-Theme
 */

/**
 * Standard Avada custom styles override.
 */
function theme_enqueue_styles() {
	wp_enqueue_style(
		'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', 20 );

/**
 * Standard Avada language setup for child theme.
 */
function avada_lang_setup() {
	$lang = get_stylesheet_directory() . '/languages';
	load_child_theme_textdomain( 'Avada', $lang );
}
add_action( 'after_setup_theme', 'avada_lang_setup' );
