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
include_once(G5_THEME_PATH . '/head.php');

/**
 * 일반페이지 index #1 템플릿
 */
?>
<div class="container" id="index-page">
    <section class="row card-box img-hover-effect" id="info-trigger">
        <div class="col-sm-12 col-md-4 info-block">
            <div class="card">
                <div class="img-hover-item">
                    <a href="#link1"><!-- 회사소개 링크 입력 -->
                        <img class="card-img-top" src="<?php echo G5_THEME_URL ?>/img/card3.png" alt="회사소개">
                        <div class="img-hover-desc"><i class="fa fa-link" aria-hidden="true"></i></div>
                    </a>
                </div>
                <div class="card-body">
                    <h4 class="card-title">회사소개</h4>
                    <p class="card-text">최고의 기술로 더 나은 세상을 만드는 기업</p>
                    <a href="<?php echo G5_THEME_URL ?>/at_introduce.php" class="btn btn-light btn-sm">More</a>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 delay-_3 info-block">
            <div class="card">
                <div class="img-hover-item">
                    <a href="#link2"><!-- 사업분야 링크 입력 -->
                        <img class="card-img-top" src="<?php echo G5_THEME_URL ?>/img/card2.png" alt="사업분야">
                        <div class="img-hover-desc"><i class="fa fa-link" aria-hidden="true"></i></div>
                    </a>
                </div>
                <div class="card-body">
                    <h4 class="card-title">사업분야</h4>
                    <p class="card-text">모바일, PC용 솔루션, POS, 기타</p>
                    <a href="<?php echo G5_THEME_URL ?>/at_service.php" class="btn btn-light btn-sm">More</a>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4 delay-_6 info-block">
            <div class="card">
                <div class="img-hover-item">
                    <a href="#link3"><!-- 홍보센터 링크 입력-->
                        <img class="card-img-top" src="<?php echo G5_THEME_URL ?>/img/card1.png" alt="홍보센터">
                        <div class="img-hover-desc"><i class="fa fa-link" aria-hidden="true"></i></div>
                    </a>
                </div>
                <div class="card-body">
                    <h4 class="card-title">홍보센터</h4>
                    <p class="card-text">Company 홍보센터입니다.</p>
                    <a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=promotion" class="btn btn-light btn-sm">More</a>
                </div>
            </div>
        </div>
    </section>
</div>

<section class="sub-info" id="sub-info">
    <div class="sub-info-bg cover-pattern" data-stellar-background-ratio="0.2">
        <div class="container sub-info-container">
            <div class="row no-gutters">
                <div class="col-6 col-sm-6 col-md-6 col-lg-3 delay-_5">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-inline-block">
                                <i class="fa fa-phone-square fa-3x bg-secondary round-icon-bg" aria-hidden="true"></i>
                            </div>
                            <a href="#customer" class="sl-subject">고객센터</a>
                        </div>
                        <div class="card-body">
                            <ul class="customer-info">
                                <li class='cus-tel'>TEL : 02-1234-5678</li>
                                <li class='cus-fax'>FAX : 02-1234-5679</li>
                                <li class='cus-email'>Email : customer@site.kr</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-inline-block">
                                <i class="fa fa-commenting-o fa-3x bg-secondary round-icon-bg" aria-hidden="true"></i>
                            </div>
                            <a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=notice" class="sl-subject">공지사항</a>
                        </div>
                        <div class="card-body">
                            <?php
                            echo latest('theme/basic-main', 'notice', 3, 66);
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-inline-block">
                                <i class="fa fa-question fa-3x bg-secondary round-icon-bg" aria-hidden="true"></i>
                            </div>
                            <a href="<?php echo G5_THEME_URL ?>/contact_us.php" class="sl-subject"><span class="">온라인</span>문의</a>
                        </div>
                        <div class="card-body text-center">
                            <span class="help">
                                문의사항을 남겨주시면 빠른 시간안에 답변드리겠습니다.
                            </span>
                            <br/><br/>
                            <div class='d-inline-block mx-auto'>
                                <a href='<?php echo G5_THEME_URL ?>/contact_us.php' class="btn btn-secondary btn-sm">문의하기</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-inline-block">
                                <i class="fa fa-user-plus fa-3x bg-secondary round-icon-bg" aria-hidden="true"></i>
                            </div>
                            <a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=recruit" class="sl-subject">채용정보</a>
                        </div>
                        <div class="card-body">
                            <?php
                            /*
                             * 채용정보 게시판이 없으면 생성 안내 메세지 출력
                             * 생성하였다면 if문 삭제해도 됩니다. 아래와 같이 사용하세요.
                             * echo latest('theme/basic', 'recruit', 3, 25); 
                             */
                            if ($_ASKTHEME->is_board('recruit') === true) {
                                echo latest('theme/basic', 'recruit', 3, 66);
                            } else {
                                echo "게시판 recruit 이 없습니다. 생성 후 사용하세요.";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
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
<script type="text/javascript">
    $(function () {

        var autoHeightTarget = $('.sub-info .card');
        $(autoHeightTarget).matchHeight();
        // init controller
        var controller1 = new ScrollMagic.Controller();
        var scene = new ScrollMagic.Scene({
            triggerElement: "#info-trigger",
            reverse: false,
            triggerHook: 'onEnter'
        }).setClassToggle(".info-block", "fadeInUp_1 visible").addTo(controller1);

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
<?php
include_once(G5_THEME_PATH . '/tail.php');
