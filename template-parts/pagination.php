<?php

global $wp_query;
$big = 999999999;

$current_page = max( 1, get_query_var( 'paged' ) );
$max_page     = $wp_query->max_num_pages;

$args = array(
	'current'   => $current_page,
	'total'     => $max_page,
	'prev_next' => false,
	'end_size'  => 1,
	'mid_size'  => 1,
	'type'      => 'array',
	'prev_next' => true,
	'next_text' => false,
	'prev_text' => false,
);

$paginate_links = paginate_links( $args );

$allowed_html = array(
	'a'    => array(
		'href'  => array(),
		'class' => array(),
	),
	'span' => array(
		'class'        => array(),
		'aria-current' => array(),
	),
)
?>

<?php if ( null !== $paginate_links ) : ?>
<div class="pagination">
	<?php
	foreach ( $paginate_links as $link_tag ) {
		echo wp_kses( $link_tag, $allowed_html );
	}
	?>
</div>
<?php endif; ?>
