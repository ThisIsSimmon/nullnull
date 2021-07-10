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
		$post_title = wp_strip_all_tags( $post->post_title );

		if ( '' === $post_title ) {
			return;
		}

		$upload_dir    = wp_upload_dir()['basedir'] . '/og/';
		$base_image    = THEME_PATH . '/assets/img/dist/common/og_blog_post.png';
		$new_file_name = "{$post->post_type}_{$post_ID}.png";
		$new_image     = imagecreatefrompng( $base_image );
		$text          = $this->mb_wordwrap( $post_title, 15, PHP_EOL, true );
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
			imagepng( $new_image, $upload_dir . $new_file_name );
			imagedestroy( $new_image );
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
				printf( '<img src="%s" style="image-rendering: -webkit-optimize-contrast; margin-top: 1rem;">', esc_url( $og_url . $image_name ) );
			}
		}
	}

	private function mb_wordwrap( $string, $width = 75, $break = "\n", $cut = false ) {
		if ( ! $cut ) {
			$regexp = '#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){' . $width . ',}\b#U';
		} else {
			$regexp = '#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){' . $width . '}#';
		}
		$string_length = mb_strlen( $string, 'UTF-8' );
		$cut_length    = ceil( $string_length / $width );
		$i             = 1;
		$return        = '';
		while ( $i < $cut_length ) {
			preg_match( $regexp, $string, $matches );
			$new_string = ( ! $matches ? $string : $matches[0] );
			$return    .= $new_string . $break;
			$string     = substr( $string, strlen( $new_string ) );
			$i++;
		}
		return $return . $string;
	}
}
