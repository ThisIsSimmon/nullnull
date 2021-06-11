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

        <a href="/" class="header-logo">
            <div class="header-logo__inner">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 23 25" width="23" height="25" class="header-logo__text">
                    <g filter="url(#filter0_di)">
                        <path d="M17.65 1c.48 0 .87.16 1.17.48.3.32.45.72.45 1.2v17.49c0 .52-.18.96-.54 1.32-.34.34-.77.51-1.29.51-.28 0-.56-.04-.84-.12-.26-.1-.45-.23-.57-.39L5.02 7.51v12.81c0 .48-.16.88-.48 1.2-.3.32-.7.48-1.2.48-.48 0-.87-.16-1.17-.48-.3-.32-.45-.72-.45-1.2V2.83c0-.52.17-.95.51-1.29.36-.36.8-.54 1.32-.54.3 0 .59.06.87.18.3.12.52.28.66.48L16 15.58V2.68c0-.48.15-.88.45-1.2.32-.32.72-.48 1.2-.48z" fill="#fff" />
                    </g>
                    <defs>
                        <filter id="filter0_di" x=".72" y="0" width="21.55" height="25" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                            <feColorMatrix in="SourceAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" />
                            <feOffset dx="1" dy="1" />
                            <feGaussianBlur stdDeviation="1" />
                            <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.15 0" />
                            <feBlend in2="BackgroundImageFix" result="effect1_dropShadow" />
                            <feBlend in="SourceGraphic" in2="effect1_dropShadow" result="shape" />
                            <feColorMatrix in="SourceAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                            <feOffset dx="-1" dy="-1" />
                            <feGaussianBlur stdDeviation="1" />
                            <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1" />
                            <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.2 0" />
                            <feBlend in2="shape" result="effect2_innerShadow" />
                        </filter>
                    </defs>
                </svg>
            </div>
        </a>

        <nav class="header-nav">
            <ul class="header-nav__list">
                <li class="header-nav__item"><a href="/blog/" class="header-nav__link">Blog</a></li>
                <li class="header-nav__item"><a href="/contact/" class="header-nav__link">Contact</a></li>
            </ul>
        </nav>

        <form action="/" method="get" class="header-search">
            <input type="search" name="s" id="search" value="<?php the_search_query(); ?>" placeholder="Search" class="header-search__field" />
            <button type="submit" class="header-search__submit-button">
                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 14 15" width="14" height="15">
                    <use href="#submit" />
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