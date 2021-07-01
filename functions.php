<?php

defined( 'ABSPATH' ) || exit;


define( 'THEME_URI', get_theme_file_uri() );
define( 'THEME_IMAGE_URI', THEME_URI . '/assets/img/dist' );
define( 'THEME_PATH', get_theme_file_path() );


require THEME_PATH . '/inc/class-init.php';
new Init();

require THEME_PATH . '/inc/class-wp-head.php';
new WP_Head();

require THEME_PATH . '/inc/class-email.php';
new Email();

// カテゴリーの階層維持
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


// function post_has_archive( $args, $post_type ) {

// 	if ( 'post' == $post_type ) {
// 		$args['rewrite']     = true;
// 		$args['has_archive'] = 'blog'; //任意のスラッグ名
// 	}
// 	return $args;

// }
// add_filter( 'register_post_type_args', 'post_has_archive', 10, 2 );
