<?php get_header(); ?>

<div class="archive">
	<header class="archive-header">
		<h1 class="archive-header__title">
			<?php echo esc_html( single_term_title( '', false ) ?? post_type_archive_title( '', false ) ); ?>
		</h1>
	</header>
	<?php $post_type = is_tag() ? 'blog' : get_post_type(); ?>
	<?php get_template_part( 'template-parts/' . $post_type . '-post' ); ?>

	<?php get_template_part( 'template-parts/pagination' ); ?>

</div>
<?php
get_footer();
