<?php /* Template Name: Contact */ ?>

<?php get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-header__title">', '</h1>' ); ?>
	</header>

	<div class="entry-content entry-content--contact">
		<form class="contact-form" action="" method="post" novalidate>
			<div class="contact-form__filed">
				<label class="contact-form__label" for="name">
					<span>Name</span>
					<span class="contact-form__error" aria-hidden="true"></span>
				</label>
				<input class="contact-form__input contact-form__input--input" type="text" name="name" id="name" autocomplete="name" />
			</div>

			<div class="contact-form__filed">
				<label class="contact-form__label" for="email">
					<span>Email</span>
					<span class="contact-form__error" aria-hidden="true"></span>
				</label>
				<input class="contact-form__input contact-form__input--input" type="email" name="email" id="email" autocomplete="email" />
			</div>

			<div class="contact-form__filed">
				<label class="contact-form__label" for="message">
					<span>Message</span>
					<span class="contact-form__error" aria-hidden="true"></span>
				</label>
				<textarea class="contact-form__input contact-form__input--textarea" name="message" id="message" cols="30" rows="13"></textarea>
			</div>

			<button type="submit" class="button-gradient">
				<span class="button-gradient__text button-gradient__text--en">SUBMIT</span>
			</button>
		</form>
	</div>

</article>

<?php get_footer(); ?>
