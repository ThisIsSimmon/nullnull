<?php

class Init {

	public function __construct() {
		add_action( 'init', array( $this, 'convert_tags_from_flat_to_hierarchical' ) );
		add_action( 'init', array( $this, 'enable_page_excerpt' ) );
	}

	public function convert_tags_from_flat_to_hierarchical() {
		$tag_slug_args               = get_taxonomy( 'post_tag' );
		$tag_slug_args->hierarchical = true;
		$tag_slug_args->meta_box_cb  = 'post_categories_meta_box';
		$tag_slug_args->labels       = array(
			'parent_item'   => '親タグ',
			'add_new_item'  => '新規タグを追加',
			'new_item_name' => '新規タグ名',
		);
		register_taxonomy( 'post_tag', 'post', (array) $tag_slug_args );
	}

	public function enable_page_excerpt() {
		add_post_type_support( 'page', 'excerpt' );
	}
}
