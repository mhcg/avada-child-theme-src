<?php
/**
 * Google Tag Manager helper functions.
 *
 * @package Avada-Child-Theme
 */

/**
 * Add Google Tag Manager to head.
 */
function mhcg_add_gtm_data_layer() {
	$tp_gtm_data_layer = mhcg_build_gtm_data_layer();
	?>
	<!-- Google Tag Manager Data Layer -->
	<script type='text/javascript'>
		// URL JavaScript toolbox, saves times creating variables.
		var _d = document;
		var _dl = _d.location;
		var _dlp = _dl.pathname;
		var _dls = _dl.search;
		var _dr = _d.referrer;
		var dataLayer = [{
			'postType': '<?php echo esc_js( $tp_gtm_data_layer['post_type'] ); ?>',
			'postCategory': '<?php echo esc_js( $tp_gtm_data_layer['post_category'] ); ?>',
			'postCategories': '<?php echo esc_js( $tp_gtm_data_layer['post_categories'] ); ?>',
			'postTags': '<?php echo esc_js( $tp_gtm_data_layer['post_tags'] ); ?>',
			'is404': '<?php echo esc_js( $tp_gtm_data_layer['is_404'] ); ?>',
			'url404': '<?php echo esc_js( $tp_gtm_data_layer['url_404'] ); ?>',
			'isLoggedIn': '<?php echo esc_js( $tp_gtm_data_layer['is_logged_in'] ); ?>'
		}];
	</script>
	<?php
}

/**
 * Google Tag Manager head code.
 */
function mhcg_add_gtm_head_code() {
	require_once get_theme_file_path( 'parts/gtm-head-code.html' );
}

/**
 * Google Tag Manager body code.
 */
function mhcg_add_gtm_to_body() {
	require_once get_theme_file_path( 'parts/gtm-body-code.html' );
}

/**
 * Returns an array of values for the data layer.
 *
 * @return array Array of values for the data layer.
 */
function mhcg_build_gtm_data_layer() {
	$data_layer = array(
		'post_type'       => ( is_home() ? 'home' : get_post_type() ),
		'is_logged_in'    => ( is_user_logged_in() ? 'Yes' : 'No' ),
		'is_404'          => ( is_404() ? 'Yes' : 'No' ),
		'url_404'         => '',
		'post_category'   => mhcg_post_category(),
		'post_categories' => mhcg_post_categories_list(),
		'post_tags'       => mhcg_post_tags_list(),
	);

	// If 404, create virtual URL with referrer.
	if ( is_404() ) {
		$data_layer['url_404'] = "'/404' + _dlp + '|' + (_dr ? _dr : 'direct')";
	}

	return $data_layer;
}

/**
 * Returns a single, or the only, category.
 *
 * @return string Single category.
 */
function mhcg_post_category() {
	$post_categories = get_categories();
	if ( count( $post_categories ) < 1 ) {
		return '';
	}
	return $post_categories[0]->name;
}

/**
 * Returns a list of categories separated by a comma.
 *
 * @return string List of categories separated by a comma.
 */
function mhcg_post_categories_list() {
	$post_categories = get_categories();
	return implode( ',', array_column( $post_categories, 'name' ) );
}

/**
 * Returns a list of tags separated by a comma.
 *
 * @return string List of tags separated by a comma.
 */
function mhcg_post_tags_list() {
	$tags = array_map(
		function ( $tag ) {
			return get_tag( $tag )->name;
		},
		get_tags()
	);

	return implode( ',', $tags );
}
