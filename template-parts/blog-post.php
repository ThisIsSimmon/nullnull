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
		<ul class="tag-list tag-list--blog-card">
			<?php $tags = get_the_tags(); ?>
			<?php if ( $tags ) : ?>
			<?php foreach ( $tags as $t ) : ?>
			<li class="tag-list__item">
				<a href="<?php echo esc_url( get_tag_link( $t->term_id ) ); ?>" class="tag-list__link">
					<?php echo esc_html( $t->name ); ?>
				</a>
			</li>
			<?php endforeach; ?>
			<?php endif; ?>
		</ul>
	</article>
	<?php endwhile; ?>
</section>
<?php endif; ?>
