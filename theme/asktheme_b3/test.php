<?php
/**
 *
 * ASKTHEME B3
 * index page
 *
 */
include_once "./_common.php";
define('_INDEX_', true);
if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH . '/index.php');
    return;
}
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/index_1.css">', 0);

/**
 * 테스트용
 */
//왼쪽메뉴가 있는 테마사용시 = theme.config.php에서 설정
if ($theme_config['use_aside'] == true) {
    include_once(G5_THEME_PATH . '/head_aside.php');
    return;
}
include_once(G5_THEME_PATH . '/head.sub.php');
include_once(G5_LIB_PATH . '/latest.lib.php');

/**
 * 첫페이지 구분
 */
if (defined('_INDEX_')) {
    $page_type = 'indexpage';
} else {
    $page_type = "subpage";
}
?>

<div id='contents-wrap'>

    <?php
    if (!defined('_GNUBOARD_')) {
        exit;
    }
    /**
     * 해더 메뉴 - Morph
     */
    add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/header_morph.css">', 0);
    add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_URL . '/plugin/mnav/css/style.css">', 0);
    add_javascript('<script src="' . G5_THEME_URL . '/plugin/mnav/js/main.js"></script>', 20);
    ?>


    <!--Offcanvas Content Wrapper-->
    <main class="c-offcanvas-content-wrap" role="main" aria-labelledby="accesible-offcanvas">  
        
        <div class="c-page l-wrapper u-pos-relative">

            <h1 id="accesible-offcanvas"><span class="u-hidden-visually">Examples </span>Accesible Offcanvas</h1>
            <h3>Overlay</h3>
            <button class="c-button js-offcanvas-trigger" data-offcanvas-trigger="off-canvas-left">Left</button>
            <button class="c-button js-offcanvas-trigger" data-offcanvas-trigger="off-canvas-right">Right</button>
            <button class="c-button js-offcanvas-trigger" data-offcanvas-trigger="off-canvas-top">Top</button>
            <button class="c-button js-offcanvas-trigger" data-offcanvas-trigger="off-canvas-bottom">Bottom</button>
            <h3>Reveal</h3>
            <button class="c-button js-offcanvas-trigger" data-offcanvas-trigger="off-canvas-left-reveal">Left - Reveal</button>
            <button class="c-button js-offcanvas-trigger" data-offcanvas-trigger="off-canvas-right-reveal">Right - Reveal</button>
            <h3>Push</h3>
            <button class="c-button js-offcanvas-trigger" data-offcanvas-trigger="off-canvas-left-push">Left - Push</button>
            <button class="c-button js-offcanvas-trigger" data-offcanvas-trigger="off-canvas-right-push">Right - Push</button>

            <article class="c-callout">
                <h2 class="c-callout__title">Download</h2>
                <p class="c-callout__text">A progressively enhanced jQuery off-canvas navigation plugin which lets you create fully accessible sidebar or top/bottom sliding (or push) panels with keyboard interactions and ARIA attributes.</p>
                <a class="c-callout__button c-button c-button--green" href="https://github.com/vmitsaras/js-offcanvas/archive/master.zip">Download<b>.zip</b></a>
                <p class="c-callout__footer u-text-center">
                    <a href="http://offcanvas.vasilis.co/">View Demo</a>
                    &nbsp;·&nbsp;            
                    <a href="https://github.com/vmitsaras/js-offcanvas">Github</a>
                </p>
            </article>

        </div>
    </main>

    <!--
    Offcanvas Panels
    -->

    <!--Left-->
    <aside class="js-offcanvas" id="off-canvas-left" role="complementary">
        <div class="c-offcanvas__inner o-box u-pos-relative">
            <ul class="c-menu c-menu--border u-unstyled">
                <li class="c-menu__item c-menu__item--heading">Header</li>
                <li class="c-menu__item"><a class="c-menu__link" href="#gogo">Home</a></li>
                <li class="c-menu__item"><a class="c-menu__link" href="#nogo">About</a></li>
                <li class="c-menu__item"><a class="c-menu__link" href="#nogo">Portfolio</a></li>
                <li class="c-menu__item"><a class="c-menu__link" href="#nogo">Projects</a></li>
                <li class="c-menu__item"><a class="c-menu__link" href="#nogo">Contact</a></li>
            </ul>
        </div>
    </aside>

    <!--Right-->
    <aside class="js-offcanvas js-open" data-offcanvas-options='{"modifiers":"right,overlay"}' id="off-canvas-right" role="complementary">
        <div class="c-offcanvas__inner o-box u-pos-relative">
            <ul class="c-menu c-menu--border u-unstyled">
                <li class="c-menu__item c-menu__item--heading">Header</li>
                <li class="c-menu__item"><a class="c-menu__link" href="#nogo">Home</a></li>
                <li class="c-menu__item"><a class="c-menu__link" href="#nogo">About</a></li>
                <li class="c-menu__item"><a class="c-menu__link" href="#nogo">Portfolio</a></li>
                <li class="c-menu__item"><a class="c-menu__link" href="#nogo">Projects</a></li>
                <li class="c-menu__item"><a class="c-menu__link" href="#nogo">Contact</a></li>
            </ul>
        </div>
        <button class="js-offcanvas-close" data-button-options='{"modifiers":"blue,hard,close-right"}'>Close</button>
    </aside>

    <!--Top-->
    <aside class="js-offcanvas" data-offcanvas-options='{"modifiers":"top,overlay,overflow-top"}' id="off-canvas-top" role="complementary">
        <div class="c-offcanvas__inner u-pos-relative">
            <div class="l-wrapper u-text-center">
                <h3>Actions...</h3>
                <ul class="c-menu u-unstyled o-list-inline">
                    <li class="c-menu__item"><a class="c-menu__link" href="#nogo">Save</a></li>
                    <li class="c-menu__item"><a class="c-menu__link" href="#nogo">Edit</a></li>
                    <li class="c-menu__item"><a class="c-menu__link" href="#nogo">New</a></li>
                    <li class="c-menu__item"><a class="c-menu__link" href="#nogo">Projects</a></li>
                </ul>
            </div>
        </div>
        <button class="js-offcanvas-close" data-button-options='{"modifiers":"green,close-bottom,circle"}'>Done</button>
    </aside>

    <!--Bottom-->
    <aside class="js-offcanvas" data-offcanvas-options='{"modifiers":"bottom,overlay"}' id="off-canvas-bottom" role="complementary">
        <div class="c-offcanvas__inner l-wrapper l-wrapper--sm">
            <h3>Search</h3>
            <form class="c-form js-form" action="#" id="search-form" onsubmit="return false;">
                <div class="c-input-add-on">
                    <span class="c-input-add-on__item"><label for="search">This repository</label></span>
                    <input class="c-input-add-on__field c-input" type="search" placeholder="e.g. Accesible Offcanvas" id="search">
                    <button class="c-input-add-on__item c-button c-button--green">Search</button>
                </div>
            </form>
            <button class="js-offcanvas-close" data-button-options='{"modifiers":"close-right-top,hard"}'>Close</button>
        </div>
    </aside>

    <!--
     Reveal
    -->
    <!-- Reveal Left -->
    <aside class="js-offcanvas" data-offcanvas-options='{"modifiers":"left,reveal,shadow,shadow-right"}' id="off-canvas-left-reveal" role="complementary">
        <div class="c-offcanvas__inner o-box u-pos-relative">
            <ul class="c-menu c-menu--border u-unstyled">
                <li class="c-menu__item c-menu__item--heading">Header</li>
                <li class="c-menu__item"><a class="c-menu__link" href="#nogo">Home</a></li>
                <li class="c-menu__item"><a class="c-menu__link" href="#nogo">About</a></li>
                <li class="c-menu__item"><a class="c-menu__link" href="#nogo">Portfolio</a></li>
                <li class="c-menu__item"><a class="c-menu__link" href="#nogo">Projects</a></li>
                <li class="c-menu__item"><a class="c-menu__link" href="#nogo">Contact</a></li>
            </ul>
        </div>
    </aside>

    <!-- Reveal Right -->
    <aside class="js-offcanvas" data-offcanvas-options='{"modifiers":"right,reveal,shadow,shadow-left"}' id="off-canvas-right-reveal" role="complementary">
        <div class="c-offcanvas__inner o-box u-pos-relative">
            <ul class="c-menu c-menu--border u-unstyled">
                <li class="c-menu__item c-menu__item--heading">Header</li>
                <li class="c-menu__item"><a class="c-menu__link" href="#nogo">Home</a></li>
                <li class="c-menu__item"><a class="c-menu__link" href="#nogo">About</a></li>
                <li class="c-menu__item"><a class="c-menu__link" href="#nogo">Portfolio</a></li>
                <li class="c-menu__item"><a class="c-menu__link" href="#nogo">Projects</a></li>
                <li class="c-menu__item"><a class="c-menu__link" href="#nogo">Contact</a></li>
            </ul>
        </div>
    </aside>

    <!--
     Push
    -->
    <!-- Push Left -->
    <aside class="js-offcanvas" data-offcanvas-options='{"modifiers":"left,push"}' id="off-canvas-left-push" role="complementary">
        <div class="c-offcanvas__inner o-box u-pos-relative">
            <ul class="c-menu c-menu--border u-unstyled">
                <li class="c-menu__item c-menu__item--heading">Header</li>
                <li class="c-menu__item"><a class="c-menu__link" href="#nogo">Home</a></li>
                <li class="c-menu__item"><a class="c-menu__link" href="#nogo">About</a></li>
                <li class="c-menu__item"><a class="c-menu__link" href="#nogo">Portfolio</a></li>
                <li class="c-menu__item"><a class="c-menu__link" href="#nogo">Projects</a></li>
                <li class="c-menu__item"><a class="c-menu__link" href="#nogo">Contact</a></li>
            </ul>
        </div>
    </aside>

    <!-- Push Right -->
    <aside class="js-offcanvas" data-offcanvas-options='{"modifiers":"right,push"}' id="off-canvas-right-push" role="complementary">
        <div class="c-offcanvas__inner o-box u-pos-relative">
            <ul class="c-menu c-menu--border u-unstyled">
                <li class="c-menu__item c-menu__item--heading">Header</li>
                <li class="c-menu__item"><a class="c-menu__link" href="#nogo">Home</a></li>
                <li class="c-menu__item"><a class="c-menu__link" href="#nogo">About</a></li>
                <li class="c-menu__item"><a class="c-menu__link" href="#nogo">Portfolio</a></li>
                <li class="c-menu__item"><a class="c-menu__link" href="#nogo">Projects</a></li>
                <li class="c-menu__item"><a class="c-menu__link" href="#nogo">Contact</a></li>
            </ul>
        </div>
    </aside>

    <a name="gogo" id='gogo'>gogo</>
        <a name="nogo" id='nogo'>Nogo</>





            <style>
                .c-offcanvas, .c-offcanvas-content-wrap {
                    transform: translate3d(0, 0, 0);
                    -webkit-backface-visibility: hidden;
                    backface-visibility: hidden;
                }

                .c-offcanvas, .c-offcanvas-content-wrap, .c-offcanvas-bg.c-offcanvas-bg--reveal, .c-offcanvas-bg.c-offcanvas-bg--push {
                    transition: transform 300ms cubic-bezier(0.4, 0, 0.6, 1);
                }

                .c-offcanvas.is-open {
                    transform: translate3d(0, 0, 0);
                    visibility: visible;
                }

                /**
                 * Offcanvas-content-wrap
                */
                .c-offcanvas-content-wrap {
                    position: relative;
                    z-index: 3;
                    overflow: hidden;
                }

                /**
                 * Offcanvas Panel
                */
                .c-offcanvas {
                    position: fixed;
                    min-height: 100%;
                    max-height: none;
                    top: 0;
                    display: block;
                    background: #fff;
                    overflow: hidden;
                }
                .c-offcanvas--opening {
                    transition-timing-function: cubic-bezier(0.4, 0, 0.6, 1);
                }
                .c-offcanvas.is-closed {
                    max-height: 100%;
                    overflow: hidden;
                    visibility: hidden;
                    box-shadow: none;
                }

                .c-offcanvas.is-scrollable {
                    overflow-y: auto;
                }

                .c-offcanvas--overlay {
                    z-index: 6;
                }

                .c-offcanvas--reveal {
                    z-index: 2;
                }

                /**
                 * Offcanvas BG-Overlay
                */
                .c-offcanvas-bg {
                    position: fixed;
                    top: 0;
                    height: 100%;
                    width: 100%;
                    z-index: 5;
                    left: -100%;
                    background-color: transparent;
                    transition: background-color 400ms cubic-bezier(0.23, 1, 0.32, 1) 0ms;
                }
                .c-offcanvas-bg.is-animating, .c-offcanvas-bg.is-open {
                    left: 0;
                    background-color: rgba(0, 0, 0, 0.68);
                    visibility: visible;
                }
                .c-offcanvas-bg.is-closed {
                    visibility: hidden;
                }

                /**
                 * Position Left
                 *
                */
                .c-offcanvas--left {
                    height: 100%;
                    width: 17em;
                    transform: translate3d(-17em, 0, 0);
                }

                /**
                 *  Position Right
                 *
                */
                .c-offcanvas--right {
                    height: 100%;
                    width: 17em;
                    right: 0;
                    transform: translate3d(17em, 0, 0);
                }

                /**
                 * Position Top
                 *
                */
                .c-offcanvas--top {
                    left: 0;
                    right: 0;
                    top: 0;
                    height: 12.5em;
                    min-height: auto;
                    width: 100%;
                    transform: translate3d(0, -12.5em, 0);
                }

                /**
                 * Position Bottom
                 *
                */
                .c-offcanvas--bottom {
                    top: auto;
                    left: 0;
                    right: 0;
                    bottom: 0;
                    height: 12.5em;
                    min-height: auto;
                    width: 100%;
                    transform: translate3d(0, 12.5em, 0);
                }

                /**
                 * Reveal
                 *
                */
                .c-offcanvas-content-wrap {
                    z-index: 3;
                }

                .c-offcanvas-content-wrap--reveal.c-offcanvas-content-wrap--left.is-open {
                    transform: translate3d(17em, 0, 0);
                }
                .c-offcanvas-content-wrap--reveal.c-offcanvas-content-wrap--right.is-open {
                    transform: translate3d(-17em, 0, 0);
                }

                .c-offcanvas--reveal {
                    z-index: 0;
                    transform: translate3d(0, 0, 0);
                }

                .c-offcanvas-bg.c-offcanvas-bg--reveal.c-offcanvas-bg--left.is-open {
                    transform: translate3d(17em, 0, 0);
                }
                .c-offcanvas-bg.c-offcanvas-bg--reveal.c-offcanvas-bg--right.is-open {
                    transform: translate3d(-17em, 0, 0);
                }

                /**
                 * Push
                 *
                */
                .c-offcanvas--push {
                    z-index: 6;
                }
                .c-offcanvas--push--opening {
                    transition-timing-function: cubic-bezier(0, 0, 0.2, 1);
                }

                .c-offcanvas-content-wrap {
                    z-index: 3;
                }

                .c-offcanvas-content-wrap--push.c-offcanvas-content-wrap--left.is-open {
                    transform: translate3d(17em, 0, 0);
                }
                .c-offcanvas-content-wrap--push.c-offcanvas-content-wrap--right.is-open {
                    transform: translate3d(-17em, 0, 0);
                }

                .c-offcanvas-bg.c-offcanvas-bg--push.c-offcanvas-bg--left.is-open {
                    transform: translate3d(17em, 0, 0);
                }
                .c-offcanvas-bg.c-offcanvas-bg--push.c-offcanvas-bg--right.is-open {
                    transform: translate3d(-17em, 0, 0);
                }

                .u-unstyled, .o-list-inline {
                    margin: 0;
                    padding: 0;
                    list-style: none;
                }

                .u-pos-relative {
                    position: relative !important;
                }

                .u-hidden-visually {
                    position: absolute !important;
                    overflow: hidden !important;
                    width: 1px !important;
                    height: 1px !important;
                    padding: 0 !important;
                    border: 0 !important;
                    clip: rect(1px, 1px, 1px, 1px) !important;
                }

                .u-text-center {
                    text-align: center;
                }

                [tabindex="-1"]:focus {
                    outline: 0;
                }

                .o-list-inline {
                    padding: 0;
                    list-style: none;
                }
                .o-list-inline > li {
                    display: inline-block;
                }

                html {
                    overflow: hidden;
                    font-size: 1em;
                    font-family: "Roboto", sans-serif;
                    line-height: 1.5;
                    background-color: #fff;
                    color: #333;
                    overflow-y: scroll;
                    min-height: 100%;
                    -webkit-text-size-adjust: 100%;
                    -ms-text-size-adjust: 100%;
                }

                p {
                    font-size: 1.18em;
                    margin-bottom: 1.18em;
                    font-weight: 400;
                    font-style: normal;
                    color: #424242;
                }
                @media (min-width: 20em) and (max-width: 41.25em) {
                    p {
                        font-size: 1.18em;
                    }
                }
                @media (min-width: 41.25em) and (max-width: 46.25em) {
                    p {
                        font-size: 1.18em;
                    }
                }
                @media (min-width: 46.25em) and (max-width: 61.25em) {
                    p {
                        font-size: 1.18em;
                    }
                }
                @media (min-width: 61.25em) and (max-width: 81.25em) {
                    p {
                        font-size: 1.18em;
                    }
                }
                @media (min-width: 81.25em) {
                    p {
                        font-size: 1.18em;
                    }
                }

                h1 {
                    font-size: 1.6992em;
                    margin: 0 0 1em 0;
                    line-height: 1.1;
                    font-weight: 500;
                    font-style: normal;
                }
                @media (min-width: 20em) and (max-width: 41.25em) {
                    h1 {
                        font-size: 1.6992em;
                    }
                }
                @media (min-width: 41.25em) and (max-width: 46.25em) {
                    h1 {
                        font-size: 2.15055em;
                    }
                }
                @media (min-width: 46.25em) and (max-width: 61.25em) {
                    h1 {
                        font-size: 2.3128em;
                    }
                }
                @media (min-width: 61.25em) and (max-width: 81.25em) {
                    h1 {
                        font-size: 2.655em;
                    }
                }
                @media (min-width: 81.25em) {
                    h1 {
                        font-size: 3.0208em;
                    }
                }

                h2 {
                    font-size: 1.416em;
                    line-height: 1em;
                    font-weight: 400;
                    font-style: normal;
                    padding: 0 0 0.45074em;
                    margin: 1.18em 0 1.18em 0;
                    text-transform: capitalize;
                    text-indent: -2px;
                }
                @media (min-width: 20em) and (max-width: 41.25em) {
                    h2 {
                        font-size: 1.416em;
                    }
                }
                @media (min-width: 41.25em) and (max-width: 46.25em) {
                    h2 {
                        font-size: 1.593em;
                    }
                }
                @media (min-width: 46.25em) and (max-width: 61.25em) {
                    h2 {
                        font-size: 1.652em;
                    }
                }
                @media (min-width: 61.25em) and (max-width: 81.25em) {
                    h2 {
                        font-size: 1.77em;
                    }
                }
                @media (min-width: 81.25em) {
                    h2 {
                        font-size: 1.888em;
                    }
                }

                h3 {
                    font-size: 1.2em;
                    margin: 1.18em 0 0.7293em 0;
                    font-weight: 500;
                    font-style: normal;
                    line-height: 1.188em;
                    color: #2b2b2b;
                    text-indent: -1px;
                }
                @media (min-width: 20em) and (max-width: 41.25em) {
                    h3 {
                        font-size: 1.2em;
                    }
                }
                @media (min-width: 41.25em) and (max-width: 46.25em) {
                    h3 {
                        font-size: 1.35em;
                    }
                }
                @media (min-width: 46.25em) and (max-width: 61.25em) {
                    h3 {
                        font-size: 1.4em;
                    }
                }
                @media (min-width: 61.25em) and (max-width: 81.25em) {
                    h3 {
                        font-size: 1.5em;
                    }
                }
                @media (min-width: 81.25em) {
                    h3 {
                        font-size: 1.6em;
                    }
                }

                h4 {
                    font-size: 1.18em;
                    font-weight: 300;
                    line-height: 1.409em;
                    margin: 1em 0 0 0;
                    letter-spacing: 1px;
                    color: #727272;
                    text-transform: uppercase;
                }
                @media (min-width: 20em) and (max-width: 41.25em) {
                    h4 {
                        font-size: 1.18em;
                    }
                }
                @media (min-width: 41.25em) and (max-width: 46.25em) {
                    h4 {
                        font-size: 1.18em;
                    }
                }
                @media (min-width: 46.25em) and (max-width: 61.25em) {
                    h4 {
                        font-size: 1.18em;
                    }
                }
                @media (min-width: 61.25em) and (max-width: 81.25em) {
                    h4 {
                        font-size: 1.18em;
                    }
                }
                @media (min-width: 81.25em) {
                    h4 {
                        font-size: 1.18em;
                    }
                }

                .l-wrapper {
                    max-width: 100%;
                    margin: 0 auto;
                    padding-right: 12px;
                    padding-left: 12px;
                }
                @media (min-width: 41.25em) {
                    .l-wrapper {
                        padding-right: 24px;
                        padding-left: 24px;
                    }
                }
                @media (min-width: 46.25em) {
                    .l-wrapper {
                        max-width: 34.2556em;
                    }
                }
                @media (min-width: 81.25em) {
                    .l-wrapper {
                        max-width: 46.97082em;
                    }
                }

                .c-button {
                    background: transparent;
                    background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.08));
                    background-color: #4e4e4e;
                    border-color: #4e4e4e;
                    border-style: solid;
                    border-width: 1px;
                    box-sizing: border-box;
                    border-radius: 5px;
                    color: #fff;
                    cursor: pointer;
                    display: inline-block;
                    font: inherit;
                    font-weight: 300;
                    margin: 0;
                    padding: 0.38198em 0.7293em;
                    margin: 0 0 0.38198em;
                    position: relative;
                    text-align: center;
                    text-decoration: none;
                    user-select: none;
                    overflow: hidden;
                    vertical-align: middle;
                }
                .c-button:hover, .c-button:focus {
                    color: #fafafa;
                }
                @media (min-width: 46.25em) {
                    .c-button {
                        font-size: 1.18em;
                    }
                }

                .c-button::-moz-focus-inner {
                    border: 0;
                    padding: 0;
                }

                .c-button:hover,
                .c-button:focus,
                .c-button:active {
                    outline: 0;
                    text-decoration: none;
                }

                .c-button:focus:not(:hover) {
                    outline: 4px solid #c5dbfc;
                }

                .c-button--hard {
                    border-radius: 0;
                }

                .c-button--green {
                    color: #ffffff;
                    background-color: #8ecd73;
                    border-color: #8ecd73;
                }
                .c-button--green:hover, .c-button--green:focus, .c-button--green:active {
                    background-color: #9dd486;
                    border-color: #9dd486;
                    outline: none;
                }

                .c-button--blue {
                    color: #ffffff;
                    background-color: #378bb5;
                    border-color: #378bb5;
                }
                .c-button--blue:hover, .c-button--blue:focus, .c-button--blue:active {
                    background-color: #2b6d8e;
                    border-color: #2b6d8e;
                    outline: none;
                }

                .c-offcanvas .c-button {
                    margin-bottom: 0;
                }

                .c-button--close-bottom {
                    position: absolute;
                    left: 50%;
                    bottom: -10px;
                    z-index: 10;
                    margin-left: -37px;
                }
                .c-button--close-bottom:hover, .c-button--close-bottom:focus {
                    outline: none !important;
                }

                .c-button--close-right-top {
                    position: absolute;
                    top: -1px;
                    right: -1px;
                    border-radius: 0;
                }
                .c-button--close-right-top:hover, .c-button--close-right-top:focus {
                    outline: none !important;
                }

                .c-button--close-right {
                    position: absolute;
                    bottom: 0;
                    right: 0;
                    z-index: 1;
                    width: 100%;
                    left: 0;
                }
                .c-button--close-right:hover, .c-button--close-right:focus {
                    outline: none !important;
                }

                .c-input:focus {
                    z-index: 1;
                    outline: 0;
                    border-color: #757575;
                    box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2);
                }

                .c-input-add-on {
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -ms-flexbox;
                    display: flex;
                    margin-bottom: 1.5em;
                }

                .c-input-add-on__field {
                    -webkit-box-flex: 1;
                    -webkit-flex: 1;
                    -ms-flex: 1;
                    flex: 1;
                }

                .c-input-add-on__field:not(:first-child) {
                    margin-left: -1px;
                }

                .c-input-add-on__field:not(:last-child) {
                    border-right: 0;
                }

                .c-input-add-on__item {
                    margin: 0;
                }

                .c-input-add-on__field,
                .c-input-add-on__item {
                    border: 1px solid rgba(147, 128, 108, 0.25);
                    padding: 0.5em 0.75em;
                }

                .c-input-add-on__field:first-child,
                .c-input-add-on__item:first-child {
                    border-radius: 2px 0 0 2px;
                }

                .c-input-add-on__field:last-child,
                .c-input-add-on__item:last-child {
                    border-radius: 0 2px 2px 0;
                }

                .c-menu {
                    margin: 0;
                }

                .c-menu--border .c-menu__item {
                    border-bottom: 1px solid #e0e0e0;
                }

                .c-menu__item--heading {
                    padding: 1.18em;
                    text-indent: -0.27858em;
                    font-size: 1.2em;
                }
                @media (min-width: 20em) and (max-width: 41.25em) {
                    .c-menu__item--heading {
                        font-size: 1.2em;
                    }
                }
                @media (min-width: 41.25em) and (max-width: 46.25em) {
                    .c-menu__item--heading {
                        font-size: 1.35em;
                    }
                }
                @media (min-width: 46.25em) and (max-width: 61.25em) {
                    .c-menu__item--heading {
                        font-size: 1.4em;
                    }
                }
                @media (min-width: 61.25em) and (max-width: 81.25em) {
                    .c-menu__item--heading {
                        font-size: 1.5em;
                    }
                }
                @media (min-width: 81.25em) {
                    .c-menu__item--heading {
                        font-size: 1.6em;
                    }
                }

                .c-menu__link {
                    display: block;
                    width: 100%;
                    padding: 0.45074em 1.18em;
                    text-decoration: none;
                    line-height: 1.618em;
                    color: rgba(43, 43, 43, 0.9);
                    font-size: 1.18em;
                    background: #fafafa;
                }
                @media (min-width: 20em) and (max-width: 41.25em) {
                    .c-menu__link {
                        font-size: 1.18em;
                    }
                }
                @media (min-width: 41.25em) and (max-width: 46.25em) {
                    .c-menu__link {
                        font-size: 1.18em;
                    }
                }
                @media (min-width: 46.25em) and (max-width: 61.25em) {
                    .c-menu__link {
                        font-size: 1.18em;
                    }
                }
                @media (min-width: 61.25em) and (max-width: 81.25em) {
                    .c-menu__link {
                        font-size: 1.18em;
                    }
                }
                @media (min-width: 81.25em) {
                    .c-menu__link {
                        font-size: 1.18em;
                    }
                }
                .c-menu__link:hover, .c-menu__link:focus {
                    color: #212121;
                    outline: none;
                    text-decoration: none;
                    background: #eee;
                }

                .c-menu--small .c-menu__link {
                    font-size: 1.18em;
                }

                .c-page {
                    overflow: hidden;
                    padding-top: 1.6992em;
                }
                @media (min-width: 20em) and (max-width: 41.25em) {
                    .c-page {
                        padding-top: 1.6992em;
                    }
                }
                @media (min-width: 41.25em) and (max-width: 46.25em) {
                    .c-page {
                        padding-top: 2.15055em;
                    }
                }
                @media (min-width: 46.25em) and (max-width: 61.25em) {
                    .c-page {
                        padding-top: 2.3128em;
                    }
                }
                @media (min-width: 61.25em) and (max-width: 81.25em) {
                    .c-page {
                        padding-top: 2.655em;
                    }
                }
                @media (min-width: 81.25em) {
                    .c-page {
                        padding-top: 3.0208em;
                    }
                }

                .c-offcanvas--overflow-top {
                    overflow: visible;
                }

                body,
                .c-offcanvas-content-wrap {
                    min-height: 100vh;
                    background-color: #f5f5f5;
                }

                .c-offcanvas--shadow.is-closed:after {
                    content: none;
                }

                .c-offcanvas--shadow:after {
                    content: '';
                    position: absolute;
                    top: 0;
                    bottom: 0;
                    width: 10px;
                    background: linear-gradient(to right, rgba(0, 0, 0, 0.38) 0%, rgba(0, 0, 0, 0) 100%);
                    pointer-events: none;
                }

                .c-offcanvas--shadow-left:after {
                    left: 0;
                }

                .c-offcanvas--shadow-right:after {
                    right: 0;
                    background: linear-gradient(to left, rgba(0, 0, 0, 0.38) 0%, rgba(0, 0, 0, 0) 100%);
                }

                .c-offcanvas--bottom.is-open {
                    box-shadow: 0 -5px 25px rgba(5, 5, 5, 0.38);
                }

                .c-offcanvas-bg--push.c-offcanvas-bg--push {
                    background: transparent;
                }

                .c-offcanvas--push.c-offcanvas--left {
                    border-right: 1px solid #e0e0e0;
                }
                .c-offcanvas--push.c-offcanvas--right {
                    border-left: 1px solid #e0e0e0;
                }

                .c-offcanvas--top .c-menu__item {
                    display: inline-flex;
                }

                .c-callout {
                    border: 2px solid #bdbdbd;
                    border-radius: 5px;
                    background: #eee;
                    padding: 1.18em;
                    margin-top: 3.08915em;
                }

                .c-callout__title {
                    margin: 0;
                }

                .c-callout__text {
                    font-size: 0.98333em;
                    margin-top: 0;
                    color: #757575;
                }
                @media (min-width: 20em) and (max-width: 41.25em) {
                    .c-callout__text {
                        font-size: 0.98333em;
                    }
                }
                @media (min-width: 41.25em) and (max-width: 46.25em) {
                    .c-callout__text {
                        font-size: 0.87407em;
                    }
                }
                @media (min-width: 46.25em) and (max-width: 61.25em) {
                    .c-callout__text {
                        font-size: 0.84286em;
                    }
                }
                @media (min-width: 61.25em) and (max-width: 81.25em) {
                    .c-callout__text {
                        font-size: 0.78667em;
                    }
                }
                @media (min-width: 81.25em) {
                    .c-callout__text {
                        font-size: 0.7375em;
                    }
                }

                .c-callout__button {
                    width: 100%;
                }

                .c-callout__footer {
                    color: #424242;
                    font-size: 0.98333em;
                }
                @media (min-width: 20em) and (max-width: 41.25em) {
                    .c-callout__footer {
                        font-size: 0.98333em;
                    }
                }
                @media (min-width: 41.25em) and (max-width: 46.25em) {
                    .c-callout__footer {
                        font-size: 0.87407em;
                    }
                }
                @media (min-width: 46.25em) and (max-width: 61.25em) {
                    .c-callout__footer {
                        font-size: 0.84286em;
                    }
                }
                @media (min-width: 61.25em) and (max-width: 81.25em) {
                    .c-callout__footer {
                        font-size: 0.78667em;
                    }
                }
                @media (min-width: 81.25em) {
                    .c-callout__footer {
                        font-size: 0.7375em;
                    }
                }
                .c-callout__footer a {
                    color: inherit;
                    text-decoration: none;
                }
                .c-callout__footer a:hover, .c-callout__footer a:focus {
                    color: #212121;
                    outline: none;
                    text-decoration: underline;
                }

            </style>
            <script>
                // https://github.com/vmitsaras/js-offcanvas
                $(function () {

                    $(document).bind("beforecreate.offcanvas", function (e) {
                        var dataOffcanvas = $(e.target).data('offcanvas-component');
                        console.log(dataOffcanvas);
                        dataOffcanvas.onInit = function () {
                            console.log(this);
                        };
                    });

                    $(document).bind("create.offcanvas", function (e) {
                        var dataOffcanvas = $(e.target).data('offcanvas-component');
                        console.log(dataOffcanvas);
                        dataOffcanvas.onOpen = function () {
                            console.log('Callback onOpen');
                        };
                        dataOffcanvas.onClose = function () {
                            console.log('Callback onClose');
                        };
                    });

                    $(document).bind("clicked.offcanvas-trigger clicked.offcanvas", function (e) {
                        var dataBtnText = $(e.target).text();
                        console.log(e.type + '.' + e.namespace + ': ' + dataBtnText);
                    });

                    $(document).bind("open.offcanvas", function (e) {
                        var dataOffcanvasID = $(e.target).attr('id');
                        console.log(e.type + ': #' + dataOffcanvasID);
                    });

                    $(document).bind("resizing.offcanvas", function (e) {
                        var dataOffcanvasID = $(e.target).attr('id');
                        console.log(e.type + ': #' + dataOffcanvasID);
                    });

                    $(document).bind("close.offcanvas", function (e) {
                        var dataOffcanvasID = $(e.target).attr('id');
                        console.log(e.type + ': #' + dataOffcanvasID);
                    });

                    $('.js-open').bind("create.offcanvas", function (e) {
                        var dataOffcanvas = $(this).data('offcanvas-component');
                        setTimeout(function () {
                            //dataOffcanvas.open();
                        }, 200);
                    });

                    $(document).bind("beforecreate.offcanvas", function (e) {
                        var $offcanvas = $(e.target),
                                api = $offcanvas.data('offcanvas-component');



                        function onFocusIn() {
                            console.log('onFocusIn');
                            api.options.resize = false;
                            console.log(api.options.resize);
                            $(window).off('resize.offcanvas orientationchange.offcanvas');
                        }

                        function onFocusOut() {
                            console.log('onFocusOut');
                            api.options.resize = true;
                            console.log(api.options.resize);
                            $(window).on('resize.offcanvas orientationchange.offcanvas');
                            api.resize();
                        }

                        $offcanvas.on('focusin', 'input,textarea', onFocusIn)
                                .on('focusout', 'input,textarea', onFocusOut);
                    });


                    // Trigger Enhance
                    $(document).trigger("enhance");
                });
            </script>
            <?php
            if (!defined('_GNUBOARD_')) {
                exit;
            } // 개별 페이지 접근 불가
            ?>

            <?php if ($is_admin == 'super') { ?><!-- <div style='float:left; text-align:center;'>RUN TIME : <?php echo get_microtime() - $begin_time; ?><br></div> --><?php } ?>

            <!-- ie6,7에서 사이드뷰가 게시판 목록에서 아래 사이드뷰에 가려지는 현상 수정 -->
            <!--[if lte IE 7]>
            <script>
            $(function() {
                var $sv_use = $(".sv_use");
                var count = $sv_use.length;
            
                $sv_use.each(function() {
                    $(this).css("z-index", count);
                    $(this).css("position", "relative");
                    count = count - 1;
                });
            });
            </script>
            <![endif]-->
            </div><!--//#wrapper -->

            <script src="<?php echo G5_THEME_JS_URL ?>/asktheme.js?ver=<?php echo G5_JS_VER; ?>"></script>
            <script src="<?php echo G5_THEME_JS_URL ?>/classie.js?ver=<?php echo G5_JS_VER; ?>"></script>
            <script src="<?php echo G5_THEME_JS_URL ?>/modernizr.custom.mq.js?ver=<?php echo G5_JS_VER; ?>"></script>
            <script type="text/javascript">
                var checkMod = function () {
                    if (Modernizr.mq('(max-width: 480px)')) {
                        return "phone";
                    }
                    if (Modernizr.mq('(max-width: 992px)') && Modernizr.mq('(min-width: 480px)')) {
                        return "tablet";
                    }
                    if (Modernizr.mq('(min-width: 992px)')) {
                        return "desktop";
                    }
                };

                function view_member_menu() {
                    var mod = checkMod();
                    if (mod !== 'desktop') {
                        $('#member-icon').click(function () {
                            return false;
                        });
                    }
                }
                function slideParallax() {
                    var $nowWidth, $nowHeight, _height, _width;
                    $nowWidth = $(window).width();
                    $nowHeight = $(window).height();
                    var movementStrength = 25;
                    _height = movementStrength / $nowHeight;
                    _width = movementStrength / $nowWidth;
                    if (checkMod() === 'desktop') {
                        $(".swiper-slide").mousemove(function (e) {
                            var pageX = e.pageX - ($nowWidth / 2);
                            var pageY = e.pageY - ($nowHeight / 2);
                            var newvalueX = _width * pageX * -1 - 25;
                            var newvalueY = _height * pageY * -1 - 50;
                            $('.swiper-slide').css("background-position", newvalueX + "px     " + newvalueY + "px");
                        });
                    }
                }
                function debouncer(func, timeout) {
                    var timeoutID, timeout = timeout || 200;
                    return function () {
                        var scope = this, args = arguments;
                        clearTimeout(timeoutID);
                        timeoutID = setTimeout(function () {
                            func.apply(scope, Array.prototype.slice.call(args));
                        }, timeout);
                    }
                }
            </script>
            </body>
            </html>
            <?php echo html_end(); // HTML 마지막 처리 함수 : 반드시 넣어주시기 바랍니다.   ?>
            <!-- By ASKTHEME -->
