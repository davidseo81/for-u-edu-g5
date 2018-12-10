<?php
/**
 * 최신글 샘플 페이지 - Portfolio
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
    <h2 class="page-title">포트폴리오 최신글</h2>
    <p>
        3x3 포트폴리오
    </p>
    <section class="row gallery-latest latest-equal-wrap">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h3>포트폴리오 3열 3단</h3>
            <?php echo latest('theme/ask-portfolio', 'portfolio', 9, 33); ?>
        </div>
    </section>
</div>
<div class="latest-wrap container-fluid">
    <h2 class="page-title">포트폴리오 최신글 Width 100%</h2>
    <p>
        3x2 포트폴리오
    </p>
    <section class="row gallery-latest latest-equal-wrap">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h3>포트폴리오 3열 2단 WIdth 100%</h3>
            <?php echo latest('theme/ask-portfolio', 'portfolio', 6, 33); ?>
        </div>
    </section>
</div>

<div class="latest-wrap container-fluid">
    <h2 class="page-title">포트폴리오 최신글 Width 100% 1단</h2>
    <p>
        4x1 포트폴리오
    </p>
    <section class="row gallery-latest latest-equal-wrap">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <h3>포트폴리오 4열 1단 WIdth 100%</h3>
            <?php echo latest('theme/ask-portfolio-col4', 'portfolio', 4, 33); ?>
        </div>
    </section>
</div>

<script type = "text/javascript">
    $(function () {
        var autoHeightTarget = $('.latest-equal-wrap .latest-equal-item');
        $(autoHeightTarget).matchHeight();
    });
</script>
<?php
include_once(G5_THEME_PATH . '/tail.php');
