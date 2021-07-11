<?php

class Email {

	public function __construct() {
		add_action( 'phpmailer_init', array( $this, 'set_phpmailer' ), 10, 1 );

		add_action( 'wp_ajax_send_email', array( $this, 'send_email' ) );
		add_action( 'wp_ajax_nopriv_send_email', array( $this, 'send_email' ) );

	}

	public function set_phpmailer( $phpmailer ) {
		if ( ! is_object( $phpmailer ) ) {
			$phpmailer = (object) $phpmailer;
		}

		$phpmailer->isSMTP();
		$phpmailer->Host       = SMTP_HOST;
		$phpmailer->SMTPAuth   = SMTP_AUTH;
		$phpmailer->Port       = SMTP_PORT;
		$phpmailer->Username   = SMTP_USER;
		$phpmailer->Password   = SMTP_PASS;
		$phpmailer->SMTPSecure = SMTP_SECURE;
		$phpmailer->From       = SMTP_FROM;
		$phpmailer->FromName   = SMTP_NAME;
		// $phpmailer->SMTPDebug   = 0;
		// $phpmailer->Debugoutput = 'html';
	}


	public function send_email() {
		$feedbacks = array();
		try {
			$nonce   = $_POST['contact_form_nonce'] ?? null;
			$name    = isset( $_POST['name'] ) ? wp_strip_all_tags( $_POST['name'], true ) : '';
			$email   = isset( $_POST['email'] ) ? wp_strip_all_tags( $_POST['email'], true ) : '';
			$message = isset( $_POST['message'] ) ? wp_strip_all_tags( $_POST['message'] ) : '';
			if ( ! wp_verify_nonce( $nonce, 'submit_contact_form' ) ) {
				$feedbacks['submit'] = 'failure';
			}

			if ( '' === $name ) {
				$feedbacks['name'] = 'empty';
			}
			if ( '' === $email ) {
				$feedbacks['email'] = 'empty';
			}
			if ( ! is_email( $email ) ) {
				$feedbacks['email'] = 'invalid';
			}
			if ( '' === $message ) {
				$feedbacks['message'] = 'empty';
			}

			if ( ! empty( $feedbacks ) ) {
				wp_send_json( $feedbacks );
			}

			$admin_headers[]     = 'From: ' . SMTP_NAME . ' <' . SMTP_FROM . '>';
			$admin_headers[]     = 'Reply-To: ' . $name . ' <' . $email . '>';
			$successfully_sent   = wp_mail( SMTP_USER, 'お問い合わせ', $message, $admin_headers );
			$feedbacks['submit'] = $successfully_sent ? 'success' : 'failure';

		} catch ( Exception $e ) {
			$feedbacks['submit'] = 'failure';
		}

		wp_send_json( $feedbacks );
	}

}
