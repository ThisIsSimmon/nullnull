<?php

class Init {

	public function __construct() {
		if ( is_admin() || is_user_logged_in() && 'local' !== wp_get_environment_type() ) {
			require_once ABSPATH . 'wp-admin/includes/file.php';
			add_action( 'init', array( $this, 'check_sw_file' ), 1 );
		}
		add_action( 'init', array( $this, 'convert_tags_from_flat_to_hierarchical' ) );
		add_action( 'init', array( $this, 'enable_page_excerpt' ) );
	}

	public function convert_tags_from_flat_to_hierarchical(): void {
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

	public function enable_page_excerpt(): void {
		add_post_type_support( 'page', 'excerpt' );
	}

	public function check_sw_file(): void {
		$creds = request_filesystem_credentials( '', '', false, false, null );
		if ( WP_Filesystem( $creds ) ) {
			global $wp_filesystem;
			$root_sw  = get_home_path() . '/sw.js';
			$theme_sw = THEME_PATH . '/assets/js/sw.js';

			if ( ! $wp_filesystem->exists( $root_sw ) ) {
				$theme_sw_content = $wp_filesystem->get_contents( $theme_sw );
				$wp_filesystem->put_contents(
					$root_sw,
					$theme_sw_content,
					FS_CHMOD_FILE
				);
			} else {
				$root_sw_filetime  = $wp_filesystem->mtime( $root_sw );
				$theme_sw_filetime = $wp_filesystem->mtime( $theme_sw );
				if ( $root_sw_filetime < $theme_sw_filetime ) {
					$theme_sw_content = $wp_filesystem->get_contents( $theme_sw );
					$wp_filesystem->put_contents(
						$root_sw,
						$theme_sw_content,
						FS_CHMOD_FILE
					);
				}
			}
		}

	}
}
