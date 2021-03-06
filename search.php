<?php get_header(); ?>

<div class="archive">
	<header class="archive-header">
		<h1 class="archive-header__title">
			<?php the_search_query(); ?>
		</h1>
	</header>
	<?php get_template_part( 'template-parts/blog-post' ); ?>

	<?php get_template_part( 'template-parts/pagination' ); ?>
</div>
<?php
get_footer();
