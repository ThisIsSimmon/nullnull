<?php

defined( 'ABSPATH' ) || exit;


define( 'THEME_URI', get_theme_file_uri() );
define( 'THEME_IMAGE_URI', THEME_URI . '/assets/img/dist' );
define( 'THEME_PATH', get_theme_file_path() );

require THEME_PATH . '/inc/debug.php';

require THEME_PATH . '/inc/class-init.php';
new Init();

require THEME_PATH . '/inc/class-custom-post-types.php';
new Custom_Post_Types();

require THEME_PATH . '/inc/class-works-custom-field.php';
new Works_Custom_Field();

require THEME_PATH . '/inc/class-login.php';
new Login();

require THEME_PATH . '/inc/class-wp-head.php';
new WP_Head();

require THEME_PATH . '/inc/class-wp-footer.php';
new WP_footer();

require THEME_PATH . '/inc/class-email.php';
new Email();

require THEME_PATH . '/inc/class-open-graph.php';
new Open_Graph();

add_filter(
	'wp_terms_checklist_args',
	function( $args, $post_id ) {
		if ( ! isset( $args['checked_ontop'] ) ) {
			$args['checked_ontop'] = false;
		}
		return $args;
	},
	10,
	2
);

add_filter( 'wp_sitemaps_enabled', '__return_false' );

add_action(
	'after_setup_theme',
	function() {

		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );

	}
);

function disable_generating_unnecessary_images( array $sizes ): array {
	unset( $sizes['thumbnail'] );
	unset( $sizes['medium_large'] );
	unset( $sizes['1536x1536'] );
	unset( $sizes['2048x2048'] );
	return $sizes;
}
add_filter( 'intermediate_image_sizes_advanced', 'disable_generating_unnecessary_images' );
add_filter( 'big_image_size_threshold', '__return_false' );
