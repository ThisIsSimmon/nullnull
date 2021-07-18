<?php

class Login {

	public function __construct() {
		add_action( 'login_enqueue_scripts', array( $this, 'enqueue_login_style' ), 1 );
		add_filter( 'login_headerurl', array( $this, 'change_login_header_url' ), 10, 1 );
	}

	public function change_login_header_url( $login_header_url ) {
		$login_header_url = home_url();
		return home_url;
	}

	public function enqueue_login_style() {
		wp_enqueue_style( 'login-google-fonts', 'https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;500;700&family=Quicksand:wght@500;700&display=swap', array(), null, 'all' );
		wp_enqueue_style( 'login-style', THEME_URI . '/assets/css/login.css', array( 'login-google-fonts', 'login' ), filemtime( THEME_PATH . '/assets/css/login.css' ) );
	}


}
