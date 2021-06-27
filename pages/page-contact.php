<?php /* Template Name: Contact */ ?>

<?php get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-header__title">', '</h1>' ); ?>
	</header>

	<div class="entry-content entry-content--contact">
		<form class="contact-form" action="" method="post">
			<div class="contact-form__filed">
				<label class="contact-form__label" for="name">Name</label>
				<input class="contact-form__input contact-form__input--input" type="text" name="name" id="name" />
			</div>

			<div class="contact-form__filed">
				<label class="contact-form__label" for="email">Email</label>
				<input class="contact-form__input contact-form__input--input" type="email" name="email" id="email" />
			</div>

			<div class="contact-form__filed">
				<label class="contact-form__label" for="message">Message</label>
				<textarea class="contact-form__input contact-form__input--textarea" name="message" id="message" cols="30" rows="13"></textarea>
			</div>

			<button type="submit" class="button-gradient">
				<span class="button-gradient__text button-gradient__text--en">SUBMIT</span>
			</button>
		</form>
	</div>

</article>

<?php get_footer(); ?>
