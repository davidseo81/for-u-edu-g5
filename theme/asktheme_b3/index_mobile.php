<?php
/**
 *
 * ASKTHEME B3 
 * index Mobile 전용 페이지
 * 모바일 전용페이지 입니다.
 *
 */
include_once "./_common.php";
include_once(G5_LIB_PATH . '/thumbnail.lib.php');

define('_INDEX_', true); //인덱스페이지처럼 인식함
//테마 변수를 일반페이지에 설정해서 상단 PC 메뉴를 변경할 수 있습니다. 
//전체 변경은 필히 theme.config.php 파일에서 아래 변수를 수정하세요.
//theme.config.php 설정보다 아래 설정이 우선합니다.
//$theme_config['header'] = 'header_community.php';

/**
 * 슬라이더는 head.php 에 설정되어 있습니다.
 * 개별페이지 설정은 아래처럼 $theme_config['slider'] = "슬라이더파일명"; 코드를 사용하면 됩니다. 
 */
//$theme_config['slider'] = "_slider_fade.php";

include_once(G5_THEME_PATH . '/head.php');
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/index_mobile.css">', 0);

/**
 * Home Page Foundation 템플릿.
 * index page 로 사용하려면 index.php 로 파일명을 변경하거나 index.php에 본 파일 내용 전체를 복사해 넣으세요.
 */
?>
<!-- .overlap-slider100 , .overlap-slider150 추가시 슬라이더와 겹침 효과 줄 수 있습니다. -->
<div class="container" id="index-page">
    <div class="tab-swiper-wrap">
        <div class="tab-swiper-container swiper-tab-menu menu_uid">
            <div class="swiper-wrapper">
                <div class="swiper-slide latest-equal-item">AAA</div>
                <div class="swiper-slide latest-equal-item">BBB</div>
                <div class="swiper-slide latest-equal-item">CCC</div>
                <div class="swiper-slide latest-equal-item">DDD</div>
                <div class="swiper-slide latest-equal-item">EEE</div>
            </div>
        </div>
        <div class="tab-swiper-container swiper-tab-contents contents_uid swiper-container-autoheight">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    aaa
                </div>
                <div class="swiper-slide">
                    BBB
                </div>
                <div class="swiper-slide">
                    CCC
                </div>
                <div class="swiper-slide">
                    DDD
                </div>
                <div class="swiper-slide">
                    EEEEE
                </div>
            </div>                
        </div>
    </div>
</div>
<script type = "text/javascript">
    $(function () {
        var autoHeightTarget = $('.latest-equal-wrap .latest-equal-item');
        $(autoHeightTarget).matchHeight();
        function setCurrentSlide(ele, index) {
            $(".menu_uid .swiper-slide").removeClass("selected");
            ele.addClass("selected");
            //swiperTabMenu.initialSlide=index;
        }

        var swiperTabMenu = new Swiper('.menu_uid', {
            slidesPerView: 5,
            paginationClickable: true,
            spaceBetween: 10,
            freeMode: true,
            loop: false,
            on: {

            },
            //해상도별 제목탭 개수
            breakpoints: {
                1200: {
                    slidesPerView: 5,
                    spaceBetween: 10
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 10
                },
                990: {
                    slidesPerView: 4,
                    spaceBetween: 10
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 10
                },
                640: {
                    slidesPerView: 4,
                    spaceBetween: 10
                },
                320: {
                    slidesPerView: 4,
                    spaceBetween: 10
                }
            }
        });
        swiperTabMenu.slides.each(function (index, val) {
            var ele = $(this);
            ele.on("click", function () {
                setCurrentSlide(ele, index);
                swiperTabContents.slideTo(index, 500, false);
                //mySwiper.initialSlide=index;
            });
        });
        var swiperTabContents = new Swiper('.contents_uid', {
            direction: 'horizontal',
            loop: false,
            autoHeight: true,
            on: {
                slideChangeTransitionEnd: function () {
                    var n = swiperTabContents.activeIndex;
                    setCurrentSlide($(".menu_uid .swiper-slide").eq(n), n);
                    swiperTabMenu.slideTo(n, 500, false);
                }
            }
        });
    });
</script>
<?php
include_once(G5_THEME_PATH . '/tail.php');
