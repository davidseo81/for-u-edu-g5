<?php
/**
 * 최신글 샘플 페이지 - Basic
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
    <h2 class="page-title">기본 최신글</h2>
    <p>
        PC 4열, 태블릿 2열, 폰 1열 출력 .simple-latest-title 로 감싸면 타이틀이 아래와 같이 변경됩니다.
    </p>
    <!-- 기본 최신글 -->
    <section class="row basic-latest latest-equal-wrap simple-latest-title">
        <div class="col-sm-12 col-md-6 col-lg-3">
            <?php echo latest('theme/ask-basic', 'notice', 5, 39); ?>
        </div>
        <div class = "col-sm-12 col-md-6 col-lg-3">
            <?php echo latest('theme/ask-basic', 'freeboard', 5, 39); ?>
        </div>
        <div class = "col-sm-12 col-md-6 col-lg-3">
            <?php echo latest('theme/ask-basic', 'qa', 5, 39); ?>
        </div>
        <div class = "col-sm-12 col-md-6 col-lg-3">
            <?php echo latest('theme/ask-basic', 'recruit', 5, 39); ?>
        </div>
    </section>
    <p>
        PC 3열, 태블릿 3열, 폰 1열 출력
    </p>
    <section class="row basic-latest latest-equal-wrap">
        <div class="col-sm-12 col-md-4 col-lg-4">
            <?php echo latest('theme/ask-basic', 'notice', 5, 39); ?>
        </div>
        <div class = "col-sm-12 col-md-4 col-lg-4">
            <?php echo latest('theme/ask-basic', 'freeboard', 5, 39); ?>
        </div>
        <div class = "col-sm-12 col-md-4 col-lg-4">
            <?php echo latest('theme/ask-basic', 'qa', 5, 39); ?>
        </div>
    </section>
    <!-- //기본 최신글 -->


    <!--  
    ####################################################
    ## PC 출력과 모바일 출력을 구분하는 예제입니다. 
    ## d-none d-md-block 은 테블릿 이상 사이즈에서 출력
    ## d-block d-sm-none d-md-none 은 모바일에서만 출력
    ####################################################
    -->
    <h2 class="page-title">PC, 모바일 구분형</h2>
    <p>
        PC 4열, 태블릿 2열, 폰 1열 출력, <span class='badge badge-info'>모바일</span>에서는 탭형으로 출력.
    </p>
    <!-- PC 최신글 -->
    <div class='d-none d-md-block'>
        <section class="row basic-latest latest-equal-wrap">
            <div class="col-sm-12 col-md-6 col-lg-3">
                <?php echo latest('theme/ask-basic', 'notice', 5, 39); ?>
            </div>
            <div class = "col-sm-12 col-md-6 col-lg-3">
                <?php echo latest('theme/ask-basic', 'freeboard', 5, 39); ?>
            </div>
            <div class = "col-sm-12 col-md-6 col-lg-3">
                <?php echo latest('theme/ask-basic', 'qa', 5, 39); ?>
            </div>
            <div class = "col-sm-12 col-md-6 col-lg-3">
                <?php echo latest('theme/ask-basic', 'recruit', 5, 39); ?>
            </div>
        </section>
    </div>

    <!-- 모바일에서만 출력 -->
    <div class='d-block d-sm-none d-md-none'>
        <section class="basic-latest latest-equal-wrap">
            <div class='latest-tab-wrap'>
                <!-- Tab -->
                <div class='border border-medium-light border-top-0'>
                    <nav class='nav nav-tabs' role='tablist'>
                        <a class='nav-item nav-link active' id='tab-notice' href='#tab-notice-item' data-toggle="tab" role='tab' aria-controls='tab-notice-item' aria-selected="true">공지사항</a>
                        <a class='nav-item nav-link' id='tab-freeboard' href='#tab-freeboard-item' data-toggle="tab" role='tab' aria-controls='tab-freeboard-item' aria-selected="true">자게</a>
                        <a class='nav-item nav-link' id='tab-qa' href='#tab-qa-item' data-toggle="tab" role='tab' aria-controls='tab-qa-item' aria-selected="true">질문답변</a>
                        <a class='nav-item nav-link' id='tab-recruit' href='#tab-recruit-item' data-toggle="tab" role='tab' aria-controls='tab-recruit-item' aria-selected="true">채용정보</a>
                    </nav>
                    <div class='tab-content'>
                        <div class='tab-pane fade show active' id='tab-notice-item' role='tabpanel' aria-labelledby='tab-notice'>
                            <?php echo latest('theme/ask-tab-basic', 'notice', 5, 60); ?>
                        </div>
                        <div class='tab-pane fade show' id='tab-freeboard-item' role='tabpanel' aria-labelledby='tab-freeboard'>
                            <?php echo latest('theme/ask-tab-basic', 'freeboard', 5, 60); ?>
                        </div>
                        <div class='tab-pane fade show' id='tab-qa-item' role='tabpanel' aria-labelledby='tab-qa'>
                            <?php echo latest('theme/ask-tab-basic', 'qa', 5, 60); ?>
                        </div>
                        <div class='tab-pane fade show' id='tab-recruit-item' role='tabpanel' aria-labelledby='tab-recruit'>
                            <?php echo latest('theme/ask-tab-basic', 'recruit', 5, 60); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <h2 class="page-title">웹진 최신글</h2>
    <p>
        PC 2열, 태블릿 2열, 폰 1열 출력
    </p>
    <!-- 기본 최신글 -->
    <section class="row basic-latest latest-equal-wrap">
        <div class="col-sm-12 col-md-6 col-lg-6">
            <?php echo latest('theme/ask-webzine', 'notice', 3, $latest_len);?>
        </div>
        <div class = "col-sm-12 col-md-6 col-lg-6">
            <?php echo latest('theme/ask-webzine', 'freeboard', 3, $latest_len); ?>
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
