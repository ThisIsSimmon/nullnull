</main><!-- main -->

<footer class="footer">

	<nav class="footer-nav">
		<ul class="footer-nav__list">
			<li class="footer-nav__item"><a href="/blog/" class="footer-nav__link">Blog</a></li>
			<li class="footer-nav__item"><a href="/works/" class="footer-nav__link">Works</a></li>
			<li class="footer-nav__item"><a href="/contact/" class="footer-nav__link">Contact</a></li>
			<li class="footer-nav__item"><a href="/privacy/" class="footer-nav__link">Privacy</a></li>
		</ul>
	</nav>

	<div class="sns sns--footer">
		<a href="https://twitter.com/thisissimmon" target="_blank" rel="noopener noreferrer" class="sns__button sns__button--twitter" aria-label="Twitter"></a>
		<a href="https://github.com/ThisIsSimmon" target="_blank" rel="noopener noreferrer" class="sns__button sns__button--github" aria-label="GitHub"></a>
	</div>

	<small class="footer__copyright">&copy; <?php echo esc_html( wp_date( 'Y' ) ); ?> Simmon</small>
</footer>

<?php wp_footer(); ?>
</body>

</html>
