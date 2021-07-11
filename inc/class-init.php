<?php

class Init {

	public function __construct() {
		add_action( 'init', array( $this, 'convert_tags_from_flat_to_hierarchical' ) );
		add_action( 'init', array( $this, 'enable_page_excerpt' ) );
		add_action( 'init', array( $this, 'disable_revisions' ) );
		add_action( 'init', array( $this, 'disable_autosave' ) );

	}

	public function convert_tags_from_flat_to_hierarchical() {
		$tag_slug_args               = get_taxonomy( 'post_tag' );
		$tag_slug_args->hierarchical = true;
		$tag_slug_args->meta_box_cb  = 'post_categories_meta_box';
		$tag_slug_args->labels       = array(
			'parent_item' => 'Parent tag',
		);
		register_taxonomy( 'post_tag', 'post', (array) $tag_slug_args );
	}

	public function enable_page_excerpt() {
		add_post_type_support( 'page', 'excerpt' );
	}

	public function disable_revisions() {
		$post_types = get_post_types(
			array(
				'public'   => true,
				'_builtin' => true,
			)
		);
		foreach ( $post_types as $post_type ) {
			remove_post_type_support( $post_type, 'revisions' );
		}
	}

	public function disable_autosave() {
		wp_deregister_script( 'autosave' );
	}

}
