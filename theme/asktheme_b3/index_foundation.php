<?php
/**
 *
 * ASKTHEME B3 
 * index Foundation
 *
 */
include_once "./_common.php";
define('_INDEX_', true); //인덱스페이지처럼 인식함

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH . '/index.php');
    return;
}

//테마 변수를 일반페이지에 설정해서 상단 PC 메뉴를 변경할 수 있습니다. 
//전체 변경은 필히 theme.config.php 파일에서 아래 변수를 수정하세요.
//theme.config.php 설정보다 아래 설정이 우선합니다.
//$theme_config['header'] = 'header_community.php';

include_once(G5_LIB_PATH . '/thumbnail.lib.php');

/**
 * 슬라이더는 head.php 에 설정되어 있습니다.
 * 개별페이지 설정은 아래처럼 $theme_config['slider'] = "슬라이더파일명"; 코드를 사용하면 됩니다. 
 */
$theme_config['slider'] = "_slider_fade.php";
include_once(G5_THEME_PATH . '/head.php');
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/index_foundation.css">', 0);

/**
 * Home Page Foundation 템플릿.
 * index page 로 사용하려면 index.php 로 파일명을 변경하거나 index.php에 본 파일 내용 전체를 복사해 넣으세요.
 */
?>
<!-- .overlap-slider100 , .overlap-slider150 추가시 슬라이더와 겹침 효과 줄 수 있습니다. -->
<div class="container simple-latest-title" id="index-page">
    <!-- 그리드사이 margin 없애려면 아래처럼 no-gutters 추가-->
    <div class='row no-gutters'>
        <!-- 왼쪽 -->
        <section class='aside col-sm-12 col-md-4 col-lg-3'>
            <div class='item-block'>
                <div class="border-block equal-item">
                    <?php echo latest('theme/ask-basic', 'notice', 7, 39); ?>
                </div>
            </div>
            <div class="item-block simple-title">
                <div class="border-block sponsor-info equal-item2">
                    <div class="latest-title"><a href="#sponsor">후원안내</a></div>
                    <ul>
                        <li><span>국민은행</span> : 6789-01-123456-7</li>
                        <li><span>우리은행</span> : 5432-07-456789-5</li>
                        <li><span>농협은행</span> : 1213-11-001201-3</li>
                        <li><span>신한은행</span> : 4456-33-041506-2</li>
                    </ul>
                    <p>예금주) 가나다봉사회</p>
                </div>
            </div>
        </section>
        <!-- //왼쪽 -->
        <!-- -------------------------------------------------오른쪽--------------------------------------------------------------- -->
        <section class='right-contents col-sm-12 col-md-8 col-lg-9'>
            <!-- 블럭을 합쳐보이게 할경우 no-gutters block-merge를 row class 에 추가. -->
            <section class='row latest-equal-wrap no-gutters block-merge-right0'>
                <div class="col-sm-12 col-md-12 col-lg-4 info-block">
                    <div class="border-block equal-item">
                        <div class="card latest-equal-item">
                            <a href="#link1" class="card-link">
                                <img class="card-img-top" src="<?php echo G5_THEME_URL ?>/img/card-f03.jpg" alt="소개">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title">협회소개</h4>
                                <p class="card-text">세상을 변화시키는 힘, 함께 참여한는 봉사활동</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4  delay-_3 info-block">
                    <div class="border-block equal-item">
                        <div class="card latest-equal-item">
                            <a href="#link2" class="card-link"><!-- 사업분야 링크 입력 -->
                                <img class="card-img-top" src="<?php echo G5_THEME_URL ?>/img/card-f02.jpg" alt="분야">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title">활동분야</h4>
                                <p class="card-text">지역사회와 노인, 어린이 돕기, 당뇨병 퇴치</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-4 delay-_6 info-block">
                    <div class="border-block equal-item">
                        <div class="card latest-equal-item">
                            <a href="#link3" class="card-link"><!-- 홍보센터 링크 입력-->
                                <img class="card-img-top" src="<?php echo G5_THEME_URL ?>/img/card-f01.jpg" alt="뉴스">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title">봉사소식</h4>
                                <p class="card-text">협회 봉사활동 정보센터입니다.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="row no-gutters block-merge-right0">
                <div class="col-sm-12">
                    <div class="border-block equal-item2">
                        <!-- 기본 슬라이드형 갤러리 -->
                        <?php echo latest('theme/ask-slider2', 'gallery', 6, 33); ?>
                    </div>
                </div>
            </section>
        </section><!-- //right-contents -->
        <!-- //오른쪽 -->
    </div>
</div>
<div class="container">
    <!-- 하단배너 -->
    <div class="row">
        <div class="col-sm-12">
            <div class="border-block">
                <section class="banner-wrap" id="bottom-banner">
                    <div class="banner-swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <a href="#link"><img src="<?php echo G5_THEME_URL . "/img/banner1.png" ?>"/></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="#link"><img src="<?php echo G5_THEME_URL . "/img/banner3.png" ?>"/></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="#link"><img src="<?php echo G5_THEME_URL . "/img/banner2.png" ?>"/></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="#link"><img src="<?php echo G5_THEME_URL . "/img/banner6.png" ?>"/></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="#link"><img src="<?php echo G5_THEME_URL . "/img/banner4.png" ?>"/></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="#link"><img src="<?php echo G5_THEME_URL . "/img/banner5.png" ?>"/></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="#link"><img src="<?php echo G5_THEME_URL . "/img/banner6.png" ?>"/></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="#link"><img src="<?php echo G5_THEME_URL . "/img/banner4.png" ?>"/></a>
                            </div>
                            <div class="swiper-slide">
                                <a href="#link"><img src="<?php echo G5_THEME_URL . "/img/banner5.png" ?>"/></a>
                            </div>
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>

                    <!-- Initialize Swiper -->
                    <script type="text/javascript">
                        var swiper = new Swiper('.banner-swiper-container', {
                            navigation: {
                                nextEl: '.swiper-button-next',
                                prevEl: '.swiper-button-prev',
                            },
                            pagination: '.swiper-pagination',
                            paginationClickable: true,
                            slidesPerView: 5,
                            spaceBetween: 10,
                            speed: 1000,
                            autoplay: {
                                delay: 3500,
                                disableOnInteraction: false,
                            },
                            grabCursor: true,
                            //해상도별 배너수 조절
                            breakpoints: {
                                1200: {
                                    slidesPerView: 4,
                                    spaceBetween: 10
                                },
                                1024: {
                                    slidesPerView: 4,
                                    spaceBetween: 10
                                },
                                990: {
                                    slidesPerView: 3,
                                    spaceBetween: 10
                                },
                                768: {
                                    slidesPerView: 2,
                                    spaceBetween: 10
                                },
                                640: {
                                    slidesPerView: 1,
                                    spaceBetween: 10
                                },
                                320: {
                                    slidesPerView: 1,
                                    spaceBetween: 10
                                }
                            }
                        });
                    </script>
                </section>
            </div>
        </div>
    </div>
    <!--//하단배너-->
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
        var autoHeightTarget2 = $('#index-page .equal-item');
        $(autoHeightTarget2).matchHeight();
        var autoHeightTarget3 = $('#index-page .equal-item2');
        $(autoHeightTarget3).matchHeight();
    });
</script>
<?php
include_once(G5_THEME_PATH . '/tail.php');
