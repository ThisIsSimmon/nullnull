<?php

class WP_footer {

	public function __construct() {
		add_action( 'wp_footer', array( $this, 'structured_data' ), 1 );
	}

	public function structured_data() {

		$site_name        = get_bloginfo( 'name' );
		$site_description = 'フリーランスWeb制作者Simmonの技術情報ブログ';
		$site_icon        = THEME_IMAGE_URI . '/common/apple-touch-icon.png';
		$home_url         = home_url( '/' );
		$schema_org       = array();

		$publisher = array(
			'@context'    => 'http://schema.org',
			'@type'       => 'Organization',
			'name'        => $site_name,
			'description' => $site_description,
			'logo'        => array(
				'@type' => 'ImageObject',
				'url'   => $site_icon,
			),
		);

		if ( is_home() ) {
			$schema_org['home'] = array(
				'@context'  => 'http://schema.org',
				'@type'     => 'WebSite',
				'name'      => $site_name,
				'url'       => $home_url,
				'publisher' => $publisher,
			);
		}

		if ( is_singular( 'post' ) ) {
			$post_type  = get_post_type();
			$post_ID    = get_the_ID();
			$og_url     = wp_upload_dir()['baseurl'] . '/og/';
			$image_name = "{$post_type}_{$post_ID}.png";

			$schema_org['blog_posting'] = array(
				'@context'         => 'https://schema.org',
				'@type'            => 'BlogPosting',
				'mainEntityOfPage' => array(
					'@type' => 'WebPage',
					'@id'   => get_the_permalink(),
				),
				'headline'         => get_the_title(),
				'image'            => array(
					$og_url . $image_name,
				),
				'datePublished'    => get_the_time( 'c' ),
				'dateModified'     => get_the_modified_time( 'c' ),
				'author'           => array(
					'@type' => 'Person',
					'name'  => 'Simmon',
				),
				'publisher'        => $publisher,
			);

			$schema_org['breadcrumb'] = array(
				'@context'        => 'https://schema.org',
				'@type'           => 'BreadcrumbList',
				'itemListElement' => array(
					array(
						'@type'    => 'ListItem',
						'position' => 1,
						'name'     => 'Home',
						'item'     => $home_url,
					),
					array(
						'@type'    => 'ListItem',
						'position' => 2,
						'name'     => 'Blog',
						'item'     => $home_url . 'blog',
					),
					array(
						'@type'    => 'ListItem',
						'position' => 3,
						'name'     => get_the_title(),
						'item'     => get_the_permalink(),
					),
				),
			);
		}

		$this->output_as_json( $schema_org );
	}

	private function output_as_json( $schema_org ) {
		foreach ( $schema_org as $data ) {
			echo '<script type="application/ld+json" class="json-ld">';
			echo json_encode( $data );
			echo '</script>';
		}
	}
}
