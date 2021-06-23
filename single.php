<?php get_header(); ?>

<?php get_template_part( 'template-parts/scroll-indicator' ); ?>
<?php
foreach ( range( 1, 300 ) as $key => $value ) {
	echo '<br>';
}
?>


<?php
get_footer();
