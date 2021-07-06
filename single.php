<?php get_header(); ?>

<?php get_template_part( 'template-parts/scroll-indicator' ); ?>


<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-header__title--blog">', '</h1>' ); ?>
		<time datetime="" class="entry-header__date">2021.04.11</time>
		<ul class="tag-list tag-list--entry">
			<li class="tag-list__item"><a href="" class="tag-list__link">HTML</a></li>
			<li class="tag-list__item"><a href="" class="tag-list__link">CSS</a></li>
			<li class="tag-list__item"><a href="" class="tag-list__link">ビジネス</a></li>
		</ul>
	</header>


	<div class="entry-content entry-content--blog">
		<?php the_content(); ?>
	</div>

	<footer class="entry-footer">
		<?php get_template_part( 'template-parts/share' ); ?>
	</footer>
</article>

<?php get_template_part( 'template-parts/profile' ); ?>

<?php
get_footer();
