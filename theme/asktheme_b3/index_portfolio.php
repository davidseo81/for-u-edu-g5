<?php
/**
 *
 * ASKTHEME B3
 * index portfolio
 *
 */
include_once "./_common.php";
//썸네일 함수, 갤러리 최신글 사용시 포함하세요.
include_once(G5_LIB_PATH . '/thumbnail.lib.php');
define('_INDEX_', true);
if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH . '/index.php');
    return;
}
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/index_portfolio.css">', 0);

/**
 * 슬라이더는 head.php 에 설정되어 있습니다.
 * 개별페이지 설정은 아래처럼 $theme_config['slider'] = "슬라이더파일명"; 코드를 사용하면 됩니다. 
 */
$theme_config['slider'] = "_slider_portfolio.php";
include_once(G5_THEME_PATH . '/head.php');
?>
<div class="portfolio-wrap " id="index-page">

    <section class="client-info container delay-_2" id="client-info">
        <div class="client-info-item">
            <div class='title-wrap'>
                <h2 class='top-title'><span class='color-point'>O</span>ur <span class='color-point'>C</span>lients</h2>
                <p>ASKTHEME는 인덱스페이지 6종, 하위페이지 7종, 게시판 5종, 최신글 17종 기본 제공합니다. 계속 업데이트 됩니다.</p>
            </div>
            <div class="row text-center no-gutters">
                <div class="col-6 col-sm-12 col-md-6 col-lg-3">
                    <div class="counter">
                        <i class="fa fa-code fa-2x"></i>
                        <h2 class="timer count-title count-number" data-to="200" data-speed="2500"></h2>
                        <p class="count-text ">Our Customer</p>
                    </div>
                </div>
                <div class="col-6 col-sm-12 col-md-6 col-lg-3">
                    <div class="counter">
                        <i class="fa fa-coffee fa-2x"></i>
                        <h2 class="timer count-title count-number" data-to="2700" data-speed="2500"></h2>
                        <p class="count-text ">Happy Clients</p>
                    </div>
                </div>
                <div class="col-6 col-sm-12 col-md-6 col-lg-3">
                    <div class="counter">
                        <i class="fa fa-lightbulb-o fa-2x"></i>
                        <h2 class="timer count-title count-number" data-to="21900" data-speed="2500"></h2>
                        <p class="count-text ">Project Complete</p>
                    </div></div>
                <div class="col-6 col-sm-12 col-md-6 col-lg-3">
                    <div class="counter">
                        <i class="fa fa-bug fa-2x"></i>
                        <h2 class="timer count-title count-number" data-to="357" data-speed="2500"></h2>
                        <p class="count-text ">Coffee With Clients</p>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            (function ($) {
                $.fn.countTo = function (options) {
                    options = options || {};

                    return $(this).each(function () {
                        // set options for current element
                        var settings = $.extend({}, $.fn.countTo.defaults, {
                            from: $(this).data('from'),
                            to: $(this).data('to'),
                            speed: $(this).data('speed'),
                            refreshInterval: $(this).data('refresh-interval'),
                            decimals: $(this).data('decimals')
                        }, options);

                        // how many times to update the value, and how much to increment the value on each update
                        var loops = Math.ceil(settings.speed / settings.refreshInterval),
                                increment = (settings.to - settings.from) / loops;

                        // references & variables that will change with each update
                        var self = this,
                                $self = $(this),
                                loopCount = 0,
                                value = settings.from,
                                data = $self.data('countTo') || {};

                        $self.data('countTo', data);

                        // if an existing interval can be found, clear it first
                        if (data.interval) {
                            clearInterval(data.interval);
                        }
                        data.interval = setInterval(updateTimer, settings.refreshInterval);

                        // initialize the element with the starting value
                        render(value);

                        function updateTimer() {
                            value += increment;
                            loopCount++;

                            render(value);

                            if (typeof (settings.onUpdate) == 'function') {
                                settings.onUpdate.call(self, value);
                            }

                            if (loopCount >= loops) {
                                // remove the interval
                                $self.removeData('countTo');
                                clearInterval(data.interval);
                                value = settings.to;

                                if (typeof (settings.onComplete) == 'function') {
                                    settings.onComplete.call(self, value);
                                }
                            }
                        }

                        function render(value) {
                            var formattedValue = settings.formatter.call(self, value, settings);
                            $self.html(formattedValue);
                        }
                    });
                };

                $.fn.countTo.defaults = {
                    from: 0, // the number the element should start at
                    to: 0, // the number the element should end at
                    speed: 1000, // how long it should take to count between the target numbers
                    refreshInterval: 100, // how often the element should be updated
                    decimals: 0, // the number of decimal places to show
                    formatter: formatter, // handler for formatting the value before rendering
                    onUpdate: null, // callback method for every time the element is updated
                    onComplete: null       // callback method for when the element finishes updating
                };

                function formatter(value, settings) {
                    return value.toFixed(settings.decimals);
                }
            }(jQuery));

            jQuery(function ($) {
                // custom formatting example
                $('.count-number').data('countToOptions', {
                    formatter: function (value, options) {
                        return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
                    }
                });

                // start all the timers
                $('.timer').each(count);

                function count(options) {
                    var $this = $(this);
                    options = $.extend({}, options || {}, $this.data('countToOptions') || {});
                    $this.countTo(options);
                }
            });
        </script>
    </section>


    <!--
    동영상 포트폴리오
    -->
    <section class="video-carousel container delay-_6" id="video-carousel">
        <div class="video-carousel-item">
            <div class='title-wrap'>
                <h2 class='top-title'><span class='color-point'>P</span>roduct <span class='color-point'>V</span>ideos</h2>
                <p>ASKTHEME는 인덱스페이지 6종, 하위페이지 7종, 게시판 5종, 최신글 17종 기본 제공합니다. 계속 업데이트 됩니다.</p>
            </div>
            <?php
            echo latest('theme/ask-video-carousel', 'youtube', 9, 33);
            ?>
        </div>
    </section>



    <!--
    셔플 필터 그리드
    -->
    <section class="container-fluid delay-_9" id="sub-info-shuffle">
        <div class="shuffle-grid">
            <div class='title-wrap'>
                <h2 class='top-title'><span class='color-point'>P</span>roduct <span class='color-point'>P</span>ortfolio</h2>
                <p>ASKTHEME는 인덱스페이지 6종, 하위페이지 7종, 게시판 5종, 최신글 17종 기본 제공합니다. 계속 업데이트 됩니다.</p>
            </div>
            <div class="sub-shuffle-container">
                <?php echo latest('theme/ask-portfolio-shuffle', 'portfolio', 12, 33); ?>
            </div>
        </div>
    </section>


    <section class="sub-info" id="sub-info">
        <div class="sub-info-bg cover-pattern" data-stellar-background-ratio="0.2">
            <div class="container-fluid sub-info-container delay-_5">
                <div class='title-wrap'>
                    <h2 class='top-title'><span class='color-point'>P</span>roduct <span class='color-point'>L</span>ist </h2>
                    <p>ASKTHEME는 인덱스페이지 6종, 하위페이지 7종, 게시판 5종, 최신글 17종 기본 제공합니다. 계속 업데이트 됩니다.</p>
                </div>
                <?php echo latest('theme/ask-portfolio', 'portfolio', 6, 33); ?>
            </div>
        </div>
    </section>

    <!-- 하단배너 -->
    <section class="banner-wrap" id="bottom-banner">
        <div class="container">
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
                <!--
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                -->
            </div>
        </div>

    </section>
    <!--//하단배너-->

    <section id="intro-section" class="intro-section cover-background delay-_6">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-5">
                    <div class="row mb-4">
                        <div class="col-sm-12 intro-head-text">
                            <h3>고객의 가치를 최고로 여기겠습니다 <i class="fa fa-exclamation" aria-hidden="true"></i> </h3>
                            <p>
                                간단한 인사말 입력하세요. Dummy text 입니다. 내용을 입력해 주세요.간단한 인사말 입력하세요. Dummy text 입니다. 내용을 입력해 주세요.내용을 입력해 주세요.간단한 인사말 입력하세요. Dummy text 입니다. 내용을 입력해 주세요.
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="sub-text1-wrap col-sm-12 col-md-6 col-lg-6">
                            <div class="row no-gutters">
                                <div class="col-2 col-sm-3">
                                    <h5><i class="fa fa-trophy" aria-hidden="true"></i></h5>
                                </div>
                                <div class="col-10 col-sm-9 text">
                                    <h4>최고의 가치는 고객 <i class="fa fa-exclamation" aria-hidden="true"></i></h4>
                                    고객을 위한 경영을 우선으로 합니다. Dummy text 입니다. 
                                    고객을 위한 경영을 우선으로 합니다. Dummy text 입니다. 내용을 입력해 주세요.
                                </div>
                            </div>
                        </div>
                        <div class="sub-text2-wrap col-sm-12 col-md-6 col-lg-6">
                            <div class="row no-gutters">
                                <div class="col-2 col-sm-3">
                                    <h5><i class="fa fa-database" aria-hidden="true"></i></h5>
                                </div>
                                <div class="col-10 col-sm-9 text">
                                    <h4>서비스 만족 <i class="fa fa-exclamation" aria-hidden="true"></i></h4>
                                    고객을 위한 경영을 우선으로 합니다. Dummy text 입니다. 
                                    고객을 위한 경영을 우선으로 합니다. Dummy text 입니다. 내용을 입력해 주세요.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    $(function () {

        // init controller
        var controller1 = new ScrollMagic.Controller();

        var client_scene = new ScrollMagic.Scene({
            triggerElement: "#client-info",
            reverse: false,
            triggerHook: 'onEnter'
        }).setClassToggle(".client-info-item", "fadeInRight visible").addTo(controller1);

        var scene = new ScrollMagic.Scene({
            triggerElement: "#video-carousel",
            reverse: false,
            triggerHook: 'onEnter'
        }).setClassToggle(".video-carousel-item", "fadeInLeft visible").addTo(controller1);

        /*
         var scene2 = new ScrollMagic.Scene({
         triggerElement: "#sub-info",
         reverse: false,
         triggerHook: 'onEnter'
         }).setClassToggle(".sub-list", "fadeInUp_1-5 visible").addTo(controller1);
         */
        var scene3 = new ScrollMagic.Scene({
            triggerElement: "#intro-section",
            reverse: false,
            triggerHook: 'onEnter'
        }).setClassToggle(".intro-section", "fadeIn visible").addTo(controller1);

        var scene4 = new ScrollMagic.Scene({
            triggerElement: "#sub-info",
            reverse: false,
            triggerHook: 'onEnter'
        }).setClassToggle(".sub-info-container", "fadeInUp_1-5 visible").addTo(controller1);

        //셔플 필터 그리드
        var scene4_1 = new ScrollMagic.Scene({
            triggerElement: "#sub-info-shuffle",
            reverse: false,
            triggerHook: 'onEnter'
        }).setClassToggle(".shuffle-grid", "fadeIn visible").addTo(controller1);

        //banner
        var scene5 = new ScrollMagic.Scene({
            triggerElement: "#bottom-banner",
            reverse: false,
            triggerHook: 'onEnter'
        }).setClassToggle(".banner-swiper-container", "fadeInUp_1-5 visible").addTo(controller1);

        $(' .img-hover-effect > div > .card > .img-hover-item ').each(function () {
            $(this).hoverdir();
        });
    });
</script>
<!-- Initialize Swiper -->
<script type="text/javascript">
    var swiper = new Swiper('.banner-swiper-container', {
        /*
         navigation: {
         nextEl: '.swiper-button-next',
         prevEl: '.swiper-button-prev',
         },
         */
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
<?php
include_once(G5_THEME_PATH . '/tail.php');
