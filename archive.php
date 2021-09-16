<?php get_header(); ?>

<div class="archive">
	<header class="archive-header">
		<h1 class="archive-header__title">
			<?php post_type_archive_title(); ?>
		</h1>
	</header>

	<?php get_template_part( 'template-parts/' . get_post_type() . '-post' ); ?>

	<?php get_template_part( 'template-parts/pagination' ); ?>

</div>
<?php
get_footer();
