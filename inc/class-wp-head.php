<?php

class WP_Head {

	public function __construct() {
		add_action( 'wp_head', array( $this, 'faster_tags' ), 1 );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_debug_mode_styles' ), 1 );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ), 10 );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ), 11 );

	}

	public function enqueue_debug_mode_styles() {
		if ( 'local' === wp_get_environment_type() ) {
			wp_enqueue_style( 'style', THEME_URI . '/style.css', array( 'google-fonts' ), filemtime( THEME_PATH . '/style.css' ), 'all' );
		}
	}

	public function enqueue_styles() {
		// wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;500;700&family=Quicksand:wght@500;700&display=swap', array(), false, 'all' );
		wp_enqueue_style( 'google-fonts', $this->all_google_fonts(), array(), false, 'all' );
		if ( 'local' !== wp_get_environment_type() ) {
			wp_enqueue_style( 'style', THEME_URI . '/style.css', array( 'google-fonts' ), filemtime( THEME_PATH . '/style.css' ), 'all' );
		}
	}

	public function enqueue_scripts() {
		wp_enqueue_script( 'focus-visible', THEME_URI . '/assets/js/focus-visible.min.js', array(), '5.2.0', false );
		wp_enqueue_script( 'micromodal', THEME_URI . '/assets/js/micromodal.min.js', array(), '0.4.6', false );
		wp_enqueue_script( 'app', THEME_URI . '/assets/js/app.js', array( 'micromodal' ), filemtime( THEME_PATH . '/assets/js/app.js' ), false );
	}


	public function faster_tags() {
		echo '<link rel="preconnect" href="https://fonts.gstatic.com">';
	}


	private function all_google_fonts() {
		$fonts = array(
			'M+PLUS+Rounded+1c:wght@400;500;700',
			'Quicksand:wght@500;700',
			'display=swap',
		);

		$fonts_collection = add_query_arg(
			array(
				'family' => implode( '&', $fonts ),
			),
			'https://fonts.googleapis.com/css2'
		);

		return $fonts_collection;
	}
}
