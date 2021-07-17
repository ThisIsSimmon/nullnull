<?php get_header(); ?>

<?php get_template_part( 'template-parts/scroll-indicator' ); ?>


<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-header__title--blog">', '</h1>' ); ?>
		<time datetime="<?php the_time( 'c' ); ?>" class="entry-header__date"><?php the_time( 'Y.m.d' ); ?></time>
		<?php get_template_part( 'template-parts/tag-list', null, array( 'class' => 'tag-list--entry' ) ); ?>
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
