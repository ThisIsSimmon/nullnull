<?php

class Open_Graph {

	public function __construct() {
		if ( is_admin() ) {
			add_action( 'save_post', array( $this, 'generate_og_image' ), 10, 2 );
		}

	}

	public function generate_og_image( $post_ID, $post ) {
		$post_title = wp_strip_all_tags( $post->post_title );

		if ( '' === $post_title ) {
			return;
		}

		$upload_dir    = wp_upload_dir()['basedir'] . '/og/';
		$base_image    = THEME_PATH . '/assets/img/dist/common/og_blog_post.png';
		$new_file_name = "og_blog_{$post_ID}.png";
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
			array( 'linespacing' => 1 )
		);

		require_once ABSPATH . 'wp-admin/includes/file.php';
		if ( WP_Filesystem() ) {
			global $wp_filesystem;
			if ( ! $wp_filesystem->is_dir( $upload_dir ) ) {
				$wp_filesystem->mkdir( $upload_dir );
			}
			imagepng( $new_image, $upload_dir . $new_file_name );
			imagedestroy( $new_image );
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
