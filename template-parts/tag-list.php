<?php
$args = wp_parse_args(
	$args,
	array( 'class' => '' ),
);
?>

<ul class="tag-list <?php echo esc_attr( $args['class'] ); ?>">
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
