<?php get_header(); ?>

<div class="page-not-found">
    <img class="page-not-found__img" src="<?php echo esc_url( THEME_IMAGE_URI ); ?>/404/404.svg" alt="404" width="470" height="176" />
    <img class="page-not-found__img " src="<?php echo esc_url( THEME_IMAGE_URI ); ?>/404/page_not_found.svg" alt="Page not found" width="348" height="42" />

    <button type="button" class="button-gradient">
        <span class="button-gradient__text button-gradient__text--en">BACK TO HOME</span>
    </button>

    <a href="/" class="button-gradient button-gradient--404">
        <span class="button-gradient__text button-gradient__text--en">BACK TO HOME</span>
    </a>

</div>


<?php get_footer(); ?>