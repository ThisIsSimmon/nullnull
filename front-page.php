<?php get_header(); ?>
<h1 class="visually-hidden">NullNull</h1>

<section class="blog-card-list blog-card-list--home">
	<?php foreach ( range( 1, 8 ) as $i ) : ?>
	<article class="blog-card">
		<header class="blog-card__header">
			<h2 class="blog-card__title"><a href="">2020年に最適なfont-familyの書き方2020年に最適なfont-familyの書き方2020年に最適なfont-familyの書き方</a></h2>
		</header>

		<time datetime="" class="blog-card__date">2021/04/11</time>
		<ul class="tag-list tag-list--blog-card">
			<li class="tag-list__item"><a href="" class="tag-list__link">HTML</a></li>
			<li class="tag-list__item"><a href="" class="tag-list__link">CSS</a></li>
			<li class="tag-list__item"><a href="" class="tag-list__link">ビジネス</a></li>
		</ul>
	</article>
	<?php endforeach; ?>
</section>


<?php get_template_part( 'template-parts/pagination' ); ?>

<?php get_footer(); ?>
