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
				<button type="button" id="js-submit" class="button-gradient button-gradient--contact">
					<span class="button-gradient__text button-gradient__text--en">SUBMIT</span>
				</button>
			</div>
		</form>
	</div>

</article>

<?php get_footer(); ?>
