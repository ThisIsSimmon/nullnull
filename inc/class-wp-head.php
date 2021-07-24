<?php

class WP_Head {

	public function __construct() {
		add_action( 'wp_head', array( $this, 'robots_tags' ), 1 );
		add_action( 'wp_head', array( $this, 'google_analytics_tag' ), 2 );
		add_action( 'wp_head', array( $this, 'link_tags' ), 3 );
		add_action( 'wp_head', array( $this, 'og_tags' ), 4 );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_debug_mode_styles' ), 1 );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ), 10 );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ), 11 );
		add_filter( 'script_loader_tag', array( $this, 'replace_script_tags' ), 10, 2 );
		$this->remove_unnecessary_tags();
	}

	public function robots_tags() {
		if ( is_tag() ) {
			echo '<meta name="robots" content="noindex, follow">';
		}
	}

	public function google_analytics_tag() {
		if ( 'local' === wp_get_environment_type() || is_admin() ) {
			return;
		}
		$gtag = <<<GTAG
		 <!-- Global site tag (gtag.js) - Google Analytics -->
		 <script async src="https://www.googletagmanager.com/gtag/js?id=%s"></script>
		 <script>
		   window.dataLayer = window.dataLayer || [];
		   function gtag(){dataLayer.push(arguments);}
		   gtag('js', new Date());

		   gtag('config', '%s');
		 </script>
GTAG;
		printf( $gtag, GTAG_ID, GTAG_ID );
	}


	public function link_tags() {
		$theme_image_uri = THEME_IMAGE_URI;
		$theme_uri       = THEME_URI;
		$allowed_html    = array(
			'link' => array(
				'rel'  => array(),
				'href' => array(),
				'type' => array(),
			),
		);

		$output_link_tags = <<<EOT
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link rel="icon" href="{$theme_image_uri}/common/favicon.svg" type="image/svg+xml">
		<link rel="manifest" href="{$theme_uri}/manifest.json">
		<link rel="icon alternate" href="{$theme_image_uri}/common/favicon.png" type="image/png">
		<link rel="apple-touch-icon" href="{$theme_image_uri}/common/apple-touch-icon.png">
EOT;
		echo wp_kses( $output_link_tags, $allowed_html );
	}

	public function og_tags() {
		$allowed_html = array(
			'meta' => array(
				'property' => array(),
				'content'  => array(),
				'name'     => array(),
			),
		);

		$site_name   = get_bloginfo( 'name' );
		$title       = '';
		$url         = '';
		$image       = '';
		$type        = 'website';
		$description = 'フリーランスWeb制作者Simmonの技術情報ブログ';

		switch ( true ) {
			case is_home():
				$title = get_bloginfo( 'name' );
				$url   = home_url();
				$image = THEME_IMAGE_URI . '/common/og_home.png';
				break;
			case is_singular( 'post' ):
				global $post;
				$title       = get_the_title();
				$url         = get_the_permalink();
				$post_type   = get_post_type( $post );
				$post_ID     = get_the_ID();
				$image       = wp_upload_dir()['baseurl'] . "/og/{$post_type}_{$post_ID}.png";
				$type        = 'article';
				$description = get_the_excerpt( $post_ID );
				break;

			case is_page():
				global $post;
				$title       = get_the_title();
				$url         = get_the_permalink();
				$image       = THEME_IMAGE_URI . "/common/og_{$post->post_name}.png";
				$type        = 'article';
				$post_ID     = get_the_ID();
				$description = get_the_excerpt( $post_ID );
				break;
			case is_tag():
				$title       = single_term_title( '', false );
				$url         = get_tag_link( get_query_var( 'tag_id' ) );
				$description = "タグ：{$title}の記事一覧";
				break;

			default:
				# code...
				break;
		}

		$output_og_tags = <<<EOT
		<meta name="description" content="{$description}">
		<meta property="fb:app_id" content="789202198451880">
		<meta property="og:site_name" content="{$site_name}">
		<meta property="og:title" content="{$title}">
		<meta property="og:description" content="{$description}">
		<meta property="og:image" content="{$image}">
		<meta property="og:image:width" content="1200">
		<meta property="og:image:height" content="630">
		<meta property="og:image:alt" content="{$title}">
		<meta property="og:locale" content="ja_JP">
		<meta property="og:type" content="{$type}">
		<meta property="og:url" content="{$url}">
		<meta name="twitter:site" content="@thisissimmon">
		<meta name="twitter:card" content="summary_large_image">
EOT;
		echo wp_kses( $output_og_tags, $allowed_html );
	}

	public function enqueue_debug_mode_styles() {
		if ( 'local' === wp_get_environment_type() ) {
			wp_enqueue_style( 'style', THEME_URI . '/style.pre.css', array(), filemtime( THEME_PATH . '/style.pre.css' ), 'all' );
		}
	}

	public function enqueue_styles() {
		// wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;500;700&family=Quicksand:wght@500;700&display=swap', array(), null, 'all' );
		if ( 'local' !== wp_get_environment_type() ) {
			wp_enqueue_style( 'style', THEME_URI . '/style.min.css', array(), filemtime( THEME_PATH . '/style.min.css' ), 'all' );
		}
	}

	public function enqueue_scripts() {
		wp_enqueue_script( 'focus-visible', THEME_URI . '/assets/js/focus-visible.min.js', array(), '5.2.0', false );
		wp_enqueue_script( 'google-fonts', THEME_URI . '/assets/js/google-fonts.js', array(), '1.6.26', false );
		wp_enqueue_script( 'micromodal', THEME_URI . '/assets/js/micromodal.min.js', array(), '0.4.6', false );
		wp_enqueue_script( 'gsap', THEME_URI . '/assets/js/gsap.min.js', array(), '3.7.0', false );
		wp_enqueue_script( 'ScrollTrigger', THEME_URI . '/assets/js/ScrollTrigger.min.js', array( 'gsap' ), '3.7.0', false );
		wp_enqueue_script( 'prism', THEME_URI . '/assets/js/prism.min.js', array(), '1.24.0', false );
		wp_enqueue_script( 'app', THEME_URI . '/assets/js/app.js', array( 'micromodal', 'ScrollTrigger', 'prism' ), filemtime( THEME_PATH . '/assets/js/app.js' ), false );
	}

	public function replace_script_tags( $tag, $handle ) {
		if ( is_admin() ) {
			return $tag;
		}

		if ( 'app' === $handle ) {
			return str_replace( "type='text/javascript'", 'type="module" defer', $tag );
		}

		if ( 'google-fonts' === $handle ) {
			return str_replace( "type='text/javascript'", 'async', $tag );
		}

		return str_replace( "type='text/javascript'", 'defer', $tag );
	}

	public function remove_unnecessary_tags() {
		remove_action( 'wp_head', 'wp_generator' );
		remove_action( 'wp_head', 'rsd_link' );
		remove_action( 'wp_head', 'wlwmanifest_link' );
	}

}
