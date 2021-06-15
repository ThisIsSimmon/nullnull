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
                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 14 15" width="14" height="15">
                    <use href="#submit" />
                </svg>
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

        <svg xmlns="http://www.w3.org/2000/svg" hidden>
            <symbol viewbox="0 0 14 15" width="14" height="15" id="submit">
                <path d="M13.316 13.361L9.25 9.18c.916-.904 1.42-2.086 1.42-3.34 0-1.293-.534-2.508-1.503-3.422A5.261 5.261 0 005.538 1c-1.37 0-2.66.503-3.628 1.417C.94 3.331.407 4.547.407 5.838.407 7.13.94 8.346 1.91 9.26a5.26 5.26 0 003.628 1.418c1.181 0 2.3-.374 3.208-1.062l4.066 4.182a.35.35 0 00.253.105.353.353 0 00.23-.084.31.31 0 00.022-.456h0zM1.09 5.838c0-2.312 1.995-4.193 4.448-4.193 2.452 0 4.447 1.881 4.447 4.193 0 2.312-1.995 4.193-4.447 4.193-2.453 0-4.448-1.88-4.448-4.193z" fill="#8F93A3" stroke="#8F93A3" stroke-width=".75" />
            </symbol>

        </svg>