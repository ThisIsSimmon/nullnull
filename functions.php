<?php

if ( ! defined( 'ABSPATH' ) ) die;


define( 'THEME_URI',  get_theme_file_uri() );
define( 'THEME_IMAGE_URI',  THEME_URI . '/assets/img/dist' );
define( 'THEME_PATH',  get_theme_file_path() );


require THEME_PATH . '/inc/class-wp-head.php';
new WP_Head();