<?php
/**
 * 최신글 샘플 페이지 - Portfolio Filter Grid
 */
include_once "./_common.php";
$g5['title'] = "최신글 PORTFOLIO";
$g5['ask_title_desc'] = 'Latest Samples';
//썸네일 함수, 갤러리 최신글 사용시 포함하세요.
include_once(G5_LIB_PATH . '/thumbnail.lib.php');

include_once(G5_THEME_PATH . '/head.php');
define('_INDEX_SUBPAGE_', true);
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/latest.css">', 1);
?>

<div class="latest-wrap container">
    <h2 class="page-title">Portfolio Filter Grid</h2>
    <p>
        3x4 포트폴리오
    </p>
    <section class="row gallery-latest latest-equal-wrap">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class='title-wrap'>
                <h2 class='top-title'><span class='color-point'>P</span>roduct <span class='color-point'>P</span>ortfolio</h2>
                <p>ASKTHEME는 인덱스페이지 6종, 하위페이지 7종, 게시판 6종, 최신글 17종 기본 제공합니다. 계속 업데이트 됩니다.</p>
            </div>
            <?php echo latest('theme/ask-portfolio-shuffle', 'portfolio', 12, 33); ?>
        </div>
    </section>
</div>

<div class="latest-wrap container-fluid">
    <h2 class="page-title">Portfolio Filter Grid</h2>
    <p>
        3x3 포트폴리오 Width 100%;
    </p>
    <section class="row gallery-latest latest-equal-wrap">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class='title-wrap'>
                <h2 class='top-title'><span class='color-point'>P</span>roduct <span class='color-point'>P</span>ortfolio</h2>
                <p>ASKTHEME는 인덱스페이지 6종, 하위페이지 7종, 게시판 6종, 최신글 17종 기본 제공합니다. 계속 업데이트 됩니다.</p>
            </div>
            <?php echo latest('theme/ask-portfolio-shuffle', 'portfolio', 9, 33); ?>
        </div>
    </section>
</div>

<div class="latest-wrap container">
    <h2 class="page-title">Portfolio Filter Grid2</h2>
    <p>
        3x3 포트폴리오 
    </p>
    <section class="row gallery-latest latest-equal-wrap">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class='title-wrap'>
                <h2 class='top-title'><span class='color-point'>P</span>roduct <span class='color-point'>P</span>ortfolio</h2>
                <p>ASKTHEME는 인덱스페이지 6종, 하위페이지 7종, 게시판 6종, 최신글 17종 기본 제공합니다. 계속 업데이트 됩니다.</p>
            </div>
            <?php echo latest('theme/ask-portfolio-shuffle2', 'portfolio', 9, 33); ?>
        </div>
    </section>
</div>
<?php
include_once(G5_THEME_PATH . '/tail.php');
