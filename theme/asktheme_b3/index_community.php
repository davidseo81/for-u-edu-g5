<?php
/**
 *
 * ASKTHEME B3 
 * index community
 *
 */
include_once "./_common.php";
define('_INDEX_', true);

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH . '/index.php');
    return;
}

//테마 변수를 일반페이지에 설정해서 상단 PC 메뉴를 변경할 수 있습니다. 
//전체 변경은 필히 theme.config.php 파일에서 아래 변수를 수정하세요.
//theme.config.php 설정보다 아래 설정이 우선합니다.
//$theme_config['header'] = 'header_community.php';

include_once(G5_LIB_PATH . '/thumbnail.lib.php');
include_once(G5_THEME_PATH . '/head.php');
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/index_community.css">', 0);

/**
 * Home Page Community 템플릿.
 * index page 로 사용하려면 index.php 로 파일명을 변경하거나 index.php에 본 파일 내용 전체를 복사해 넣으세요.
 */
?>
<div class="container simple-latest-title" id="index-page">
    <!-- 그리드사이 margin 없애려면 아래처럼 no-gutters 추가-->
    <div class='row no-gutters'>
        <!-- 왼쪽 -->
        <section class='aside col-sm-12 col-md-4 col-lg-3'>
            <div class='item-block'>
                <!-- .border-block을 씌우면 테두리 및 그림자 박스 효과가 생깁니다. -->
                <div class="border-block">
                    <?php echo outlogin('theme/basic_simple'); ?>
                </div>
            </div>
            <div class='item-block'><div class="border-block">
                    <?php echo latest('theme/ask-basic', 'notice', 5, 39); ?>
                </div>
            </div>
            <div class="item-block simple-title">
                <div class="border-block">
                    <?php echo poll('theme/basic') ?>
                </div>
            </div>
            <div class="item-block simple-title">
                <div class="border-block left-banner-sample">
                    배너
                </div>
            </div>
            <!--회원포인트순위-->
            <div class="item-block simple-title">
                <div class="border-block">
                    <div class='rank-wrap'>
                        <div class='rank-title'>
                            <a href='#point-rank'>포인트순위</a>
                        </div>
                        <div class='point-rank-content'>
                            <ul class='rank-list'>
                                <?php
                                $rank = $_ASKTHEME->point_rank(10);
                                foreach ($rank as $key => $value) {
                                    $key += 1;
                                    echo "<li>";
                                    echo "<span class='badge badge-secondary badge-cycle1'>{$key}</span>";
                                    echo " {$value['mb_nick']}";
                                    echo "<div class='point-number'><span class='badge badge-light'>" . number_format($value['mb_point']) . "</span></div>";
                                    echo "</li>";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--//회원포인트순위-->
            <!--새글-->
            <div class="item-block simple-title">
                <div class="border-block">
                    <div class='newlist-wrap'>
                        <div class='newlist-title'>
                            <a href='<?php echo G5_BBS_URL ?>/new.php'>NEW</a>
                        </div>
                        <div class='newlist-content'>
                            <ul class='newlist-list d-flex flex-column'>
                                <?php
                                $list = $_ASKTHEME->new_list(10);
                                for ($i = 0; $i < count($list); $i++) {
                                    $gr_subject = cut_str($list[$i]['gr_subject'], 20);
                                    $bo_subject = cut_str($list[$i]['bo_subject'], 20);
                                    $wr_subject = get_text(cut_str($list[$i]['wr_subject'], 80));
                                    ?>
                                    <li>
                                        <div class='d-flex'>
                                            <div class='item board-subject'><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $list[$i]['bo_table'] ?>" class='badge badge-light'><?php echo $bo_subject ?></a></div>
                                            <div class='item article-subject'>
                                                <a href="<?php echo $list[$i]['href'] ?>"><?php echo $list[$i]['comment'] ?><?php echo cut_str($wr_subject, 30); ?></a>
                                            </div>
                                            <div class="item article-date"><span class='badge badge-light'><?php echo $list[$i]['datetime2'] ?></span></div>
                                        </div>
                                    </li>
                                <?php } ?>

                                <?php
                                if ($i == 0) {
                                    echo '<li><span class="empty_table">게시물이 없습니다.</span></li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--//새글-->
            <div class="item-block simple-title">
                <div class="border-block left-banner-sample">
                    배너
                </div>
            </div>
        </section>
        <!-- //왼쪽 -->
        <!-- -------------------------------------------------오른쪽--------------------------------------------------------------- -->
        <section class='right-contents col-sm-12 col-md-8 col-lg-9'>
            <!-- 블럭을 합쳐보이게 할경우 no-gutters block-merge를 row class 에 추가. -->
            <section class='row latest-equal-wrap no-gutters block-merge-right0'>
                <div class='col-sm-12 col-md-12 col-lg-6'>
                    <div class="border-block">
                        <?php
                        //모바일에서는 뽑아올 게시물수를 달리 할 수 있습니다.
                        $item_rows = 4;
                        if (is_mobile() == true) {
                            //모바일
                            $item_rows = "5";
                        }
                        echo latest('theme/ask-mixed-webzine', 'notice', $item_rows, 39);
                        ?>
                    </div>
                </div>
                <div class='col-sm-12 col-md-12 col-lg-6'>
                    <div class="border-block">
                        <?php
                        //모바일에서는 뽑아올 게시물수를 달리 할 수 있습니다.
                        $item_rows = 8;
                        if (is_mobile() == true) {
                            //모바일
                            $item_rows = "10";
                        }
                        echo latest('theme/ask-mixed-aside', 'news', $item_rows, 39);
                        ?>
                    </div>
                </div>
            </section>
            <!--갤러리-->
            <section class="row no-gutters block-merge-right0">
                <div class="col-sm-12">
                    <div class="border-block">
                        <?php
                        //모바일에서는 뽑아올 게시물수를 달리 할 수 있습니다.
                        $item_rows = 12;
                        if (is_mobile() == true) {
                            //모바일
                            $item_rows = "6";
                        }
                        echo latest('theme/ask-gallery3', 'gallery', $item_rows, 33);
                        ?>
                    </div>
                </div>
            </section>
            <!--//갤러리-->
            <!--웹진형-->
            <section class="row latest-equal-wrap no-gutters block-merge-right0">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="border-block">
                        <?php
                        //모바일에서는 뽑아올 게시물수를 달리 할 수 있습니다.
                        $item_rows = 4;
                        if (is_mobile() == true) {
                            //모바일
                            $item_rows = "3";
                        }
                        echo latest('theme/ask-webzine', 'promotion', $item_rows, 33);
                        ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="border-block">
                        <?php
                        //모바일에서는 뽑아올 게시물수를 달리 할 수 있습니다.
                        $item_rows = 4;
                        if (is_mobile() == true) {
                            //모바일
                            $item_rows = "3";
                        }
                        echo latest('theme/ask-webzine', 'promotion', $item_rows, 33);
                        ?>
                    </div>
                </div>
            </section>
            <!--//웹진형-->
            <section class="row basic-latest latest-equal-wrap no-gutters block-merge-right0">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="border-block">
                        <!-- 카테고리 탭형식 최신글-->
                        <div class="latest-tab-wrap">
                            <div class="border border-medium-light border-top-0 latest-equal-item">
                                <?php
                                /*
                                 * 탭 생성 - 전용스킨만 사용. ask-tab-basic
                                 * echo $_ASKTHEME->make_tab_header('스킨디렉토리', '게시판테이블명', 줄수, 제목길이);
                                 */
                                echo $_ASKTHEME->make_tab_latest('theme/ask-tab-basic', 'qa', 5, 39);
                                ?>
                            </div>
                        </div>
                        <!-- //카테고리 탭형식 최신글-->
                    </div>
                </div>
                <div class = "col-sm-12 col-md-12 col-lg-6">
                    <div class="border-block">
                        <!-- 카테고리 탭형식 최신글-->
                        <div class="latest-tab-wrap">
                            <div class="border border-medium-light border-top-0 latest-equal-item">
                                <?php
                                /*
                                 * 탭 생성 - 전용스킨만 사용. ask-tab-basic
                                 * echo $_ASKTHEME->make_tab_header('스킨디렉토리', '게시판테이블명', 줄수, 제목길이);
                                 */
                                echo $_ASKTHEME->make_tab_latest('theme/ask-tab-basic', 'freeboard', 5, 39);
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- //카테고리 탭형식 최신글-->
                </div>
            </section>
            <section class="row index-banner no-gutters block-merge-right0">
                <div class="banner-wrap col-sm-12">
                    <a href="#banner"><img src="<?php echo G5_THEME_IMG_URL ?>/banner825.png"/></a>
                </div>
            </section>
            <section class="row no-gutters block-merge-right0">
                <div class="col-sm-12">
                    <!-- PC 최신글 -->
                    <div class='d-none d-md-none d-lg-block'>
                        <section class="row basic-latest latest-equal-wrap no-gutters">
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="border-block">
                                    <?php echo latest('theme/ask-basic', 'notice', 5, 39); ?>
                                </div>
                            </div>
                            <div class = "col-sm-12 col-md-6 col-lg-4">
                                <div class="border-block">
                                    <?php echo latest('theme/ask-basic', 'freeboard', 5, 39); ?>
                                </div>
                            </div>
                            <div class = "col-sm-12 col-md-6 col-lg-4">
                                <div class="border-block">
                                    <?php echo latest('theme/ask-basic', 'qa', 5, 39); ?>
                                </div>
                            </div>
                        </section>
                    </div>

                    <!-- 모바일에서만 출력 -->
                    <div class='d-block d-sm-block d-md-block d-lg-none'>
                        <section class="basic-latest latest-equal-wrap">
                            <div class="border-block">
                                <div class='latest-tab-wrap'>
                                    <!-- Tab -->
                                    <div class='border border-medium-light border-top-0'>
                                        <nav class='nav nav-tabs' role='tablist'>
                                            <a class='nav-item nav-link active' id='tab-notice' href='#tab-notice-item' data-toggle="tab" role='tab' aria-controls='tab-notice-item' aria-selected="true">공지사항</a>
                                            <a class='nav-item nav-link' id='tab-freeboard' href='#tab-freeboard-item' data-toggle="tab" role='tab' aria-controls='tab-freeboard-item' aria-selected="true">자게</a>
                                            <a class='nav-item nav-link' id='tab-qa' href='#tab-qa-item' data-toggle="tab" role='tab' aria-controls='tab-qa-item' aria-selected="true">질문답변</a>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </section>
            <section class="row no-gutters block-merge-right0">
                <div class="col-sm-12">
                    <div class="border-block">
                        <!-- 기본 슬라이드형 갤러리 -->
                        <?php echo latest('theme/ask-slider', 'gallery', 6, 33); ?>
                    </div>
                </div>
            </section>
        </section><!-- //right-contents -->
        <!-- //오른쪽 -->
    </div>
    
</div>
<br/>
<script type="text/javascript">
    /* Mouse Hover effect */
    $(function () {
        $(' .img-hover-effect > div > .card > .img-hover-item ').each(function () {
            $(this).hoverdir();
        });
        $('#demo-1').fsBanner();
    });
</script>
<script type = "text/javascript">
    $(function () {
        var autoHeightTarget = $('.latest-equal-wrap .latest-equal-item');
        $(autoHeightTarget).matchHeight();
    });
</script>
<?php
include_once(G5_THEME_PATH . '/tail.php');
