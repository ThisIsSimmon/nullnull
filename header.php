<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@400;700&family=Quicksand:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_theme_file_uri(); ?>/style.css?ver=<?php echo time(); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-barba="wrapper">

    <header id="header" class="header">

        <a href="/" class="header-logo">
            <div class="header-logo__inner"></div>
        </a>

        <nav class="header-nav">
            <ul class="header-nav__list">
                <li class="header-nav__item"><a href="/blog/" class="header-nav__link">Blog</a></li>
                <li class="header-nav__item"><a href="/contact/" class="header-nav__link">Contact</a></li>
            </ul>
        </nav>

        <form action="/" method="get" class="header-search">
            <input type="search" name="s" value="<?php the_search_query(); ?>" placeholder="Search" class="header-search__field" />
            <button type="submit" class="header-search__submit-button">
                <!-- <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 14 15" width="14" height="15">
                    <use href="#submit" />
                </svg> -->
            </button>
        </form>

        <button type="button" id="js-menu-open" class="menu-open">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <div id="js-menu" class="menu">
            <button type="button" id="js-menu-close" class="menu-close">
                <span></span>
                <span></span>
            </button>

            <form action="/" method="get" class="menu-search">
                <input type="search" name="s" value="<?php the_search_query(); ?>" placeholder="Search" class="menu-search__field" />
                <button type="submit" class="menu-search__submit-button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 14 15" width="14" height="15">
                        <use href="#submit" />
                    </svg>
                </button>
            </form>

            <nav class="menu-nav">
                <ul class="menu-nav__list">
                    <li class="menu-nav__item"><a href="/blog/" class="menu-nav__link">Blog</a></li>
                    <li class="menu-nav__item"><a href="/contact/" class="menu-nav__link">Contact</a></li>
                    <li class="menu-nav__item"><a href="/privacy/" class="menu-nav__link">Privacy</a></li>
                </ul>
            </nav>

            <div class="menu-sns">
                <a href="https://twitter.com/thisissimmon" target="_blank" rel="noopener noreferrer" class="menu-sns__button menu-sns__button--twitter"></a>
            </div>
        </div>

    </header>


    <main id="main" data-barba="container" data-barba-namespace="home">
