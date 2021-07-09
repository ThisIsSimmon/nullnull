<?php /* Template Name: Contact */ ?>

<?php get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-header__title">', '</h1>' ); ?>
	</header>

	<div class="entry-content entry-content--contact">
		<form id="js-contact-form" class="contact-form" action="<?php echo esc_url( admin_url( 'admin-ajax.php' ) ); ?>" method="post" novalidate>
			<div class="contact-form__filed">
				<label class="contact-form__label" for="name">
					<span>Name</span>
					<span class="contact-form__error contact-form__error--name" aria-hidden="true"></span>
				</label>
				<input class="contact-form__input contact-form__input--input" type="text" name="name" id="name" autocomplete="name" />
			</div>

			<div class="contact-form__filed">
				<label class="contact-form__label" for="email">
					<span>Email</span>
					<span class="contact-form__error contact-form__error--email" aria-hidden="true"></span>
				</label>
				<input class="contact-form__input contact-form__input--input" type="email" name="email" id="email" autocomplete="email" />
			</div>

			<div class="contact-form__filed">
				<label class="contact-form__label" for="message">
					<span>Message</span>
					<span class="contact-form__error contact-form__error--message" aria-hidden="true"></span>
				</label>
				<textarea class="contact-form__input contact-form__input--textarea" name="message" id="message" cols="30" rows="13"></textarea>
			</div>

			<?php wp_nonce_field( CONTACT_FORM_NONCE, '_contactformnonce' ); ?>
			<div class="contact-form__filed">
				<span class="contact-form__error contact-form__error--submit" aria-hidden="true"></span>
				<button type="button" id="js-submit" class="submit-button" data-status="" aria-label="送信">
					<span class="submit-button__text">SUBMIT</span>
					<div class="submit-button__loader">
						<svg class="submit-button__loader-svg" viewBox="0 0 40 40">
							<circle class="submit-button__loader-circle" cx="20" cy="20" r="18" />
						</svg>
					</div>
					<svg class="submit-button__checkmark-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52" width="52" height="52">
						<path class="submit-button__checkmark-path" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
					</svg>

				</button>
			</div>

		</form>
	</div>

</article>

<?php get_footer(); ?>
