<?php
/**
 * 최신글 샘플 페이지 - Tab
 */
include_once "./_common.php";
$g5['title'] = "최신글 샘플 Tab";
$g5['ask_title_desc'] = 'Latest Samples';
//썸네일 함수, 갤러리 최신글 사용시 포함하세요.
include_once(G5_LIB_PATH . '/thumbnail.lib.php');

include_once(G5_THEME_PATH . '/head.php');
define('_INDEX_SUBPAGE_', true);
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/latest.css">', 1);
?>

<div class="latest-wrap container">
    <h2 class="page-title">기본 탭형식 최신글</h2>
    <p>
        PC 2열, 태블릿 2열, 폰 1열 출력 - 카테고리를 탭으로 불러옵니다.
    </p>
    <section class="row basic-latest latest-equal-wrap">
        <div class="col-sm-12 col-md-6 col-lg-6">
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
        <div class = "col-sm-12 col-md-6 col-lg-6">
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
            <!-- //카테고리 탭형식 최신글-->
        </div>
    </section>




    <h2 class="page-title">Tab Swiper</h2>
    <p>
        탭 스와이퍼 최신글
    </p>
    <section class="row basic-latest latest-equal-wrap">
        <div class='col-sm-12 col-lg-6'>
            <?php
            /*
             * 탭 스와이퍼 - 전용스킨만 사용. ask-tab-basic
             * echo $_ASKTHEME->make_group_swiper('그룹테이블명', '스킨디렉토리', 줄수, 제목길이, 탭메뉴개수); 
             * - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
             * 스킨을 게시판마다 다르게 설정 가능합니다. 배열로 예제와 같이 정의하세요.
             * $tabinfo = array('테이블명'=>'스킨명');
             * 하나의 스킨만 사용할 경우 theme/ask-tab-swiper-basic 와 같이 스킨명만 입력
             */

            //게시판 스킨 지정
            $tabinfo['skin'] = array('qa' => 'theme/ask-tab-swiper-basic', 'notice' => 'theme/ask-tab-swiper-basic', 'gallery' => 'theme/ask-tab-swiper-gallery', 'freeboard' => 'theme/ask-tab-swiper-basic', 'recruit' => 'theme/ask-tab-swiper-basic', 'free' => 'theme/ask-tab-swiper-basic');
            //게시판별 뽑아올 줄수
            $tabinfo['row'] = array('qa' => 10, 'notice' => 10, 'gallery' => 6, 'freeboard' => 10, 'recruit' => 10, 'free' => 10);
            //게시판별 제목길이
            $tabinfo['subject_lens'] = array('qa' => 48, 'notice' => 48, 'gallery' => 30, 'freeboard' => 60, 'recruit' => 60, 'free' => 60);

            //그룹 전체 동일하게 스킨, 게시물줄수, 제목길이를 지정하려면 직접 값을 넣으세요.
            echo $_ASKTHEME->make_group_swiper('community', $tabinfo['skin'], $tabinfo['row'], $tabinfo['subject_lens'], 5);
            ?>
        </div>
        <div class='col-sm-12 col-lg-6'>
            <?php
            /*
             * 탭 스와이퍼 - 전용스킨만 사용. ask-tab-basic
             * echo $_ASKTHEME->make_group_swiper('그룹테이블명','스킨디렉토리', 줄수, 제목길이, 탭메뉴수); 
             */

            echo $_ASKTHEME->make_group_swiper('shop', 'theme/ask-tab-swiper-basic', 5, 39, 4);
            ?>
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
