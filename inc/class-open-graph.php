<?php

class Open_Graph {

	public function __construct() {
		if ( is_admin() ) {
			require_once ABSPATH . 'wp-admin/includes/file.php';
			add_action( 'save_post', array( $this, 'generate_og_image' ), 10, 2 );
			add_action( 'add_meta_boxes', array( $this, 'register_og_image_meta_box' ) );
		}
	}

	public function generate_og_image( $post_ID, $post ) {
		$post_title          = wp_strip_all_tags( $post->post_title );
		$nonce               = $_POST['og_image_nonce'] ?? null;
		$regenerate_og_image = isset( $_POST['regenerate_og_image'] ) ? true : false;
		$wrap_width          = isset( $_POST['wrap_width'] ) ? $_POST['wrap_width'] : 15;

		if ( '' === $post_title || ! wp_verify_nonce( $nonce, 'save_og_image' ) ) {
			return;
		}

		$upload_dir    = wp_upload_dir()['basedir'] . '/og/';
		$base_image    = THEME_PATH . '/assets/img/dist/common/og_blog_post.png';
		$new_file_name = "{$post->post_type}_{$post_ID}.png";
		$new_image     = imagecreatefrompng( $base_image );
		$text          = $this->mb_wordwrap( $post_title, $wrap_width, PHP_EOL );
		$font_file     = THEME_PATH . '/assets/font/m-plus-rounded-1c-v10-latin_japanese-700.ttf';
		$font_color    = imagecolorallocate( $new_image, 41, 45, 61 );
		$font_size     = 50;
		$angle         = 0;
		$x             = 88;
		$y             = 88 + $font_size;

		imagefttext(
			$new_image,
			$font_size,
			$angle,
			$x,
			$y,
			$font_color,
			$font_file,
			$text,
			array( 'linespacing' => 1.5 )
		);

		$creds = request_filesystem_credentials( '', '', false, false, null );
		if ( WP_Filesystem( $creds ) ) {
			global $wp_filesystem;
			if ( ! $wp_filesystem->is_dir( $upload_dir ) ) {
				$wp_filesystem->mkdir( $upload_dir );
			}

			if ( ! $wp_filesystem->exists( $upload_dir . $new_file_name ) || $regenerate_og_image ) {
				imagepng( $new_image, $upload_dir . $new_file_name );
				imagedestroy( $new_image );
			}
		}

	}

	public function register_og_image_meta_box() {
		add_meta_box( 'og-image', 'OG Image', array( $this, 'og_image_meta_box' ), 'post', 'side', 'low' );
	}

	public function og_image_meta_box() {
		$creds = request_filesystem_credentials( '', '', false, false, null );
		if ( WP_Filesystem( $creds ) ) {
			global $wp_filesystem, $post;
			$og_dir     = wp_upload_dir()['basedir'] . '/og/';
			$og_url     = wp_upload_dir()['baseurl'] . '/og/';
			$image_name = "{$post->post_type}_{$post->ID}.png";
			if ( $wp_filesystem->exists( $og_dir . $image_name ) ) {
				echo '<label for="regenerate-og-image" style="display:block; margin-top: 1rem;"><input type="checkbox" id="regenerate-og-image" name="regenerate_og_image">Regenerate</label>';
				echo '<label for="wrap-width" style="display:block; margin-top: 1rem;">Wrap width <input type="number" id="wrap-width" name="wrap_width" value="15"></label>';
				printf( '<img src="%s?ver=%s" style="image-rendering: -webkit-optimize-contrast; margin-top: 1rem;">', esc_url( $og_url . $image_name ), filemtime( $og_dir . $image_name ) );
			}

			wp_nonce_field( 'save_og_image', 'og_image_nonce' );
		}
	}

	private function mb_wordwrap( $str, $width = 35, $break = PHP_EOL ) {
		$c   = mb_strlen( $str );
		$arr = array();
		for ( $i = 0; $i <= $c; $i += $width ) {
			$arr[] = mb_substr( $str, $i, $width );
		}
		return implode( $break, $arr );
	}
}
