<?php
$args = wp_parse_args(
	$args,
	array(),
);

$have_posts = empty( $args ) ? have_posts() : $args['query']->have_posts();
?>

<?php if ( $have_posts ) : ?>
<section class="works-card-list">
	<?php
	while ( $have_posts ) :
		if ( empty( $args ) ) {
			the_post();
			$have_posts = have_posts();
		} else {
			$args['query']->the_post();
			$have_posts = $args['query']->have_posts();
		}

		$works_meta = get_post_meta( get_the_ID(), 'works', true );
		?>

	<article class="works-card">
		<figure class="works-card__image">
			<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail(); ?>
			<?php endif; ?>
		</figure>

		<p class="works-card__meta">
			<time datetime="<?php the_time( 'c' ); ?>" class="works-card__date"><?php the_time( 'Y.m.d' ); ?></time>
			<span class="works-card__type"><?php echo esc_html( $works_meta['type'] ); ?></span>
		</p>

		<h2 class="works-card__title"><a href="<?php echo esc_attr( $works_meta['product_url'] ); ?>" target="_blank" rel="noreferrer noopener"><?php the_title(); ?></a></h2>

		<?php if ( get_post_status( $works_meta['notice_post_id'] ) ) : ?>
		<a href="<?php echo esc_attr( get_permalink( $works_meta['notice_post_id'] ) ); ?>" class="works-card__learn-more">Learn more</a>
		<?php endif; ?>
	</article>
	<?php endwhile; ?>
</section>
<?php endif; ?>
