<?php /* Template Name: Blog */ ?>
<?php get_header(); ?>

<?php
$args = array(
	'post_type'      => 'post',
	'posts_per_page' => 9,
	'paged'          => get_query_var( 'paged', 1 ),
);

$the_query                          = new WP_Query( $args );
$GLOBALS['wp_query']->max_num_pages = $the_query->max_num_pages;

?>

<div class="archive">
	<header class="archive-header">
		<?php the_title( '<h1 class="archive-header__title">', '</h1>' ); ?>
	</header>

	<?php get_template_part( 'template-parts/blog-post', null, array( 'query' => $the_query ) ); ?>

	<?php get_template_part( 'template-parts/pagination' ); ?>

</div>

<?php
get_footer();
