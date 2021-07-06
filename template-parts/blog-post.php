<?php
$args = wp_parse_args(
	$args,
	array(),
);

$have_posts = empty( $args ) ? have_posts() : $args['query']->have_posts();
?>

<?php if ( $have_posts ) : ?>
<section class="blog-card-list blog-card-list--home">
	<?php
	while ( $have_posts ) :
		if ( empty( $args ) ) {
			the_post();
			$have_posts = have_posts();
		} else {
			$args['query']->the_post();
			$have_posts = $args['query']->have_posts();
		}
		?>

	<article class="blog-card">
		<header class="blog-card__header">
			<h2 class="blog-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</header>

		<time datetime="<?php the_time( 'c' ); ?>" class="blog-card__date"><?php the_time( 'Y.m.d' ); ?></time>

		<?php get_template_part( 'template-parts/tag-list', null, array( 'class' => 'tag-list--blog-card' ) ); ?>

	</article>
	<?php endwhile; ?>
</section>
<?php endif; ?>
