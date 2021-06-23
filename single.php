<?php get_header(); ?>

<?php get_template_part( 'template-parts/scroll-indicator' ); ?>


<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-header__title--blog">', '</h1>' ); ?>
		<time datetime="" class="entry-header__date">2021.04.11</time>
		<ul class="tag-list tag-list--entry">
			<li class="tag-list__item"><a href="" class="tag-list__link">HTML</a></li>
			<li class="tag-list__item"><a href="" class="tag-list__link">CSS</a></li>
			<li class="tag-list__item"><a href="" class="tag-list__link">ビジネス</a></li>
		</ul>
	</header>


	<div class="entry-content entry-content--privacy">
		<h2>個人情報の定義</h2>
		<p>本プライバシーポリシーにおいて、個人情報とは生存する個人に関する情報であり、氏名、生年月日、住所、電話番号、メールアドレス等、特定の個人を識別することができるものをいいます。</p>


	</div>
</article>


<?php
foreach ( range( 1, 300 ) as $key => $value ) {
	echo '<br>';
}
?>


<?php
get_footer();
