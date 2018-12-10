<?php
/**
 * 최신글 샘플 페이지 - 혼합형
 */
include_once "./_common.php";
$g5['title'] = "최신글 샘플 Basic";
$g5['ask_title_desc'] = 'Latest Samples';
//썸네일 함수, 갤러리 최신글 사용시 포함하세요.
include_once(G5_LIB_PATH . '/thumbnail.lib.php');

include_once(G5_THEME_PATH . '/head.php');
define('_INDEX_SUBPAGE_', true);
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/latest.css">', 1);
?>

<div class="latest-wrap container">
    <h2 class="page-title">Top Gallery형 혼합 최신글</h2>
    <p>
        PC 2열, 태블릿 2열, 폰 1열 출력
    </p>
    <section class="row basic-latest latest-equal-wrap">
        <div class="col-sm-12 col-md-6 col-lg-6">
            <?php echo latest('theme/ask-mixed-gallery', 'notice', 8, 39); ?>
        </div>
        <div class = "col-sm-12 col-md-6 col-lg-6">
            <?php echo latest('theme/ask-mixed-gallery', 'freeboard', 8, 39); ?>
        </div>
    </section>
    
    <h2 class="page-title">좌측 갤러리형 혼합 최신글</h2>
    <p>
        PC 2열, 태블릿 2열, 폰 1열 출력
    </p>
    <section class="row basic-latest latest-equal-wrap">
        <div class="col-sm-12 col-md-6 col-lg-6">
            <?php echo latest('theme/ask-mixed-aside', 'notice', 10, 39); ?>
        </div>
        <div class = "col-sm-12 col-md-6 col-lg-6">
            <?php echo latest('theme/ask-mixed-aside', 'freeboard', 10, 39); ?>
        </div>
    </section>
    
    <h2 class="page-title">웹진 혼합 최신글</h2>
    <p>
        PC 2열, 태블릿 2열, 폰 1열 출력
    </p>
    <section class="row basic-latest latest-equal-wrap">
        <div class="col-sm-12 col-md-6 col-lg-6">
            <?php echo latest('theme/ask-mixed-webzine', 'notice', 5, 39); ?>
        </div>
        <div class = "col-sm-12 col-md-6 col-lg-6">
            <?php echo latest('theme/ask-mixed-webzine', 'freeboard', 5, 39); ?>
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
