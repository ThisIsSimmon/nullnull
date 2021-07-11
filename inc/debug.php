<?php

function d() {

	if ( false === WP_DEBUG ) {
		return;
	}

	$arg_count = count( func_get_args() );
	ob_start();
	foreach ( func_get_args() as $i => $arg ) {
		var_dump( $arg );
	}
	$dump = ob_get_clean();

	$dump = preg_replace_callback(
		'/^\s++/m',
		function( $m ) {
			return str_repeat( ' ', strlen( $m[0] ) * 2 );
		},
		$dump
	);

	$caller = debug_backtrace( DEBUG_BACKTRACE_IGNORE_ARGS, 1 )[0];

	$header = sprintf(
		'<div style="%s">',
		implode(
			';',
			array(
				'background: #e9ebf1',
				'font-size: 1.6rem',
				'max-height: 100vh',
				'padding: 8rem 2rem',
				'width: 100%',
			)
		)
	);

	$header .= sprintf(
		'<pre style="%s">',
		implode(
			';',
			array(
				'background-color: #fff',
				'margin: 0 auto',
				'max-width: 1000px',
				'max-height: calc(100% - 16rem)',
				'overflow: scroll',
				'padding: 4rem',
			)
		)
	);

	$header .= sprintf(
		'<span style="%s">%s:%d</span>',
		implode(
			';',
			array(
				'display: block',
				'font-weight: bold',
				'font-size: 1.4em',
				'margin-bottom: 2rem',
			)
		),
		$caller['file'],
		$caller['line']
	);

	$footer = '</pre></div>';

	$isCli = ( php_sapi_name() === 'cli' );
	echo $isCli ? strip_tags( $header ) : $header;
	echo $dump;
	echo $isCli ? strip_tags( $footer ) : $footer;
}

function r( $var ) {

	if ( false === WP_DEBUG ) {
		return;
	}

	$header = sprintf(
		'<div style="%s">',
		implode(
			';',
			array(
				'background: #e9ebf1',
				'font-size: 1.6rem',
				'height: 100%',
				'left: 0',
				'padding: 8rem 2rem',
				'position: fixed',
				'top: 0',
				'width: 100%',
				'z-index: 1000',
			)
		)
	);

	$header .= sprintf(
		'<pre style="%s">',
		implode(
			';',
			array(
				'background-color: #fff',
				'margin: 0 auto',
				'max-width: 1000px',
				'max-height: 100%',
				'overflow: scroll',
				'padding: 4rem',
			)
		)
	);
	echo $header;
	print_r( func_get_args() );
	echo '</pre></div>';

}
