<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="<?php echo get_theme_file_uri(); ?>/style.css?ver=<?php echo time(); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-barba="wrapper">

    <header id="header" class="header">
        <div class="header__inner">

            <a href="/" class="logo">
                <div class="logo__inner">
                    <span class="logo__text">N</span>
                </div>
            </a>

            <nav class="global-nav">
                <ul class="global-nav__list">
                    <li><a href="/blog/">Blog</a></li>
                    <li><a href="/contact/">Contact</a></li>
                </ul>
            </nav>

            <form action="/" method="get">
                <label for="search">Search in <?php echo home_url('/'); ?></label>
                <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="Search" />
                <input type="image" alt="Search" src="<?php bloginfo('template_url'); ?>/images/search.png" />
            </form>

        </div>
    </header>


    <main id="main" data-barba="container" data-barba-namespace="home">