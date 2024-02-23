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

/**
 * Add Google Tag Manager code and data layer.
 */
require_once get_theme_file_path( 'inc/gtm-helpers.php' );

add_action( 'wp_head', 'mhcg_add_gtm_data_layer' );
add_action( 'wp_head', 'mhcg_add_gtm_head_code' );
add_action( 'avada_before_body_content', 'mhcg_add_gtm_to_body' );
