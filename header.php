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
        <!-- <div class="header__inner"> -->

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
            <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="Search" />
            <button type="submit">
                <svg viewbox="0 0 14 15" width="14" height="15">
                    <use xlink:href="#submit"></use>
                </svg>
            </button>
        </form>

        <!-- </div> -->
    </header>


    <main id="main" data-barba="container" data-barba-namespace="home">

        <svg xmlns="http://www.w3.org/2000/svg" hidden>
            <symbol viewbox="0 0 14 15" width="14" height="15" id="submit">
                <path d="M13.316 13.361L9.25 9.18c.916-.904 1.42-2.086 1.42-3.34 0-1.293-.534-2.508-1.503-3.422A5.261 5.261 0 005.538 1c-1.37 0-2.66.503-3.628 1.417C.94 3.331.407 4.547.407 5.838.407 7.13.94 8.346 1.91 9.26a5.26 5.26 0 003.628 1.418c1.181 0 2.3-.374 3.208-1.062l4.066 4.182a.35.35 0 00.253.105.353.353 0 00.23-.084.31.31 0 00.022-.456h0zM1.09 5.838c0-2.312 1.995-4.193 4.448-4.193 2.452 0 4.447 1.881 4.447 4.193 0 2.312-1.995 4.193-4.447 4.193-2.453 0-4.448-1.88-4.448-4.193z" fill="#8F93A3" stroke="#8F93A3" stroke-width=".75" />
            </symbol>
        </svg>

        <p>あああああContact今何時ですか？感じでどうでしょう。Googleが提供する</p>