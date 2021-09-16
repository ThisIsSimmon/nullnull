<?php

class Custom_Post_Types {

	public function __construct() {
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'pre_get_posts', array( $this, 'post_archive_count' ) );
		add_filter( 'works_rewrite_rules', '__return_empty_array' );
	}

	public function register_post_types() {
		register_post_type(
			'works',
			array(
				'label'              => 'Works',
				'public'             => false,
				'publicly_queryable' => true,
				'has_archive'        => true,
				'menu_position'      => 20,
				'supports'           => array(
					'title',
					'thumbnail',
				),
				'rewrite'            => array(
					'with_front' => false,
				),
				'show_ui'            => true,
				'show_in_rest'       => true,
				'menu_icon'          => 'dashicons-coffee',
			)
		);
	}

	public function post_archive_count( $query ) {
		if ( is_admin() || ! $query->is_main_query() ) {
			return;
		}

		// 作ったもの
		if ( $query->is_post_type_archive( 'works' ) ) {
			$query->set( 'posts_per_page', 4 );
			return;
		}
	}

}
