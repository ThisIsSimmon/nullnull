<?php

global $wp_query;
$big = 999999999;

$current_page = max( 1, get_query_var( 'paged' ) );
$max_page     = $wp_query->max_num_pages;

$args = array(
	'current'   => $current_page,
	'total'     => $max_page,
	'end_size'  => 1,
	'mid_size'  => 1,
	'type'      => 'array',
	'prev_next' => true,
	'next_text' => false,
	'prev_text' => false,
);

$paginate_links = paginate_links( $args );
$allowed_html   = array(
	'a'    => array(
		'href'       => array(),
		'class'      => array(),
		'aria-label' => array(),
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
		if ( false !== strpos( $link_tag, 'prev page-numbers' ) ) {
			$link_tag = str_replace( '<a', '<a aria-label="前のページ"', $link_tag );
		}
		if ( false !== strpos( $link_tag, 'next page-numbers' ) ) {
			$link_tag = str_replace( '<a', '<a aria-label="次のページ"', $link_tag );
		}
		echo wp_kses( $link_tag, $allowed_html );
	}
	?>
</div>
<?php endif; ?>
