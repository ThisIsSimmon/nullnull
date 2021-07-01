<?php get_header(); ?>
<h1 class="visually-hidden">NullNull</h1>

<?php if ( have_posts() ) : ?>
<section class="blog-card-list blog-card-list--home">
	<?php
	while ( have_posts() ) :
		the_post();
		?>


	<article class="blog-card">
		<header class="blog-card__header">
			<h2 class="blog-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</header>

		<time datetime="<?php the_time( 'c' ); ?>" class="blog-card__date"><?php the_time( 'Y.m.d' ); ?></time>
		<ul class="tag-list tag-list--blog-card">
			<?php $tags = get_the_tags(); ?>
			<?php if ( $tags ) : ?>
			<?php foreach ( $tags as $tag ) : ?>
			<li class="tag-list__item">
				<a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" class="tag-list__link">
					<?php echo esc_html( $tag->name ); ?>
				</a>
			</li>
			<?php endforeach; ?>
			<?php endif; ?>
		</ul>
	</article>
	<?php endwhile; ?>
</section>
<?php endif; ?>


<?php get_template_part( 'template-parts/pagination' ); ?>

<?php get_footer(); ?>
