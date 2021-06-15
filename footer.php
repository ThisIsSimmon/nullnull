    </main><!-- main -->

    <footer class="footer">

        <nav class="footer-nav">
            <ul class="footer-nav__list">
                <li class="footer-nav__item"><a href="/blog/" class="footer-nav__link">Blog</a></li>
                <li class="footer-nav__item"><a href="/contact/" class="footer-nav__link">Contact</a></li>
                <li class="footer-nav__item"><a href="/contact/" class="footer-nav__link">Privacy</a></li>
            </ul>
        </nav>

        <div class="sns">
            <a href="https://twitter.com/thisissimmon" target="_blank" rel="noopener noreferrer" class="sns__button sns__button--twitter"></a>
        </div>

        <small class="footer__copyright">&copy; 2021 Simmon</small>
    </footer>

    <?php wp_footer(); ?>
    <script type="module" src="<?php echo get_theme_file_uri();
                                ?>/assets/js/app.js"></script>
    <script src="<?php echo get_theme_file_uri(); ?>/assets/js/focus-visible.min.js"></script>
    </body>

    </html>