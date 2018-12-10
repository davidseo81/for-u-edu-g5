<?php
/**
 *
 * ASKTHEME B3 
 * index classic 2
 *
 */
include_once "./_common.php";
define('_INDEX_', true);

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH . '/index.php');
    return;
}

include_once(G5_THEME_PATH . '/head.php');
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/index_classic2.css">', 0);

/**
 * Home Page Classic 2 템플릿.
 * index page 로 사용하려면 index.php 로 파일명을 변경하거나 index.php에 본 파일 내용 전체를 복사해 넣으세요.
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

    <section class="sub-info" id="sub-info">
        <ul class="sub-list sub-item">
            <li class='sl-wrap sl-customer'>
                <div class="sl-inner">
                    <i class="fa fa-phone-square" aria-hidden="true"></i>
                    <a href="#customer" class="sl-subject flip-animate"><span data-hover="고객">고객</span>센터</a>
                    <p>
                        <span class='cus-tel'>TEL : 02-1234-5678</span>
                        <span class='cus-fax'>FAX : 02-1234-5679</span>
                        <span class='cus-email'>Email : customer@site.kr</span>
                    </p>
                </div>
            </li>
            <li class='sl-wrap sl-note'>
                <div class="sl-inner">
                    <i class="fa fa-commenting-o" aria-hidden="true"></i>
                    <a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=notice" class="sl-subject flip-animate"><span data-hover="공지">공지</span>사항</a>
                    <?php
                    echo latest('theme/basic-main', 'notice', 3, 25);
                    ?>
                </div>
            </li>
            <li class='sl-wrap sl-qna'>
                <div class="sl-inner qa">
                    <i class="fa fa-question" aria-hidden="true"></i>
                    <a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=qa" class="sl-subject flip-animate"><span data-hover="온라인">온라인</span>문의</a>
                    <p class="sl-contents">
                        문의사항을 남겨주시면 빠른 시간안에 답변드리겠습니다.<br/><br/>
                        <a href='<?php echo G5_BBS_URL ?>/board.php?bo_table=qa' class="btn btn-outline-info btn-sm">문의하기</a>
                    </p>

                </div>
            </li>
            <li class='sl-wrap sl-recruit'>
                <div class="sl-inner">
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                    <a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=recruit" class="sl-subject flip-animate"><span data-hover="채용">채용</span>정보</a>
                    <?php
                    /*
                     * 채용정보 게시판이 없으면 생성 안내 메세지 출력
                     * 생성하였다면 if문 삭제해도 됩니다. 아래와 같이 사용하세요.
                     * echo latest('theme/basic', 'recruit', 3, 25); 
                     */
                    if ($_ASKTHEME->is_board('recruit') === true) {
                        echo latest('theme/basic', 'recruit', 3, 25);
                    } else {
                        echo "게시판 recruit 이 없습니다. 생성 후 사용하세요.";
                    }
                    ?>
                </div>
            </li>
        </ul>
    </section>
    <!-- 하단배너 -->
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
    <!--//하단배너-->
</div>
<script type="text/javascript">
    $(function () {
        // init controller
        var controller1 = new ScrollMagic.Controller();
        var scene = new ScrollMagic.Scene({
            triggerElement: "#info-trigger",
            reverse: false,
            triggerHook: 'onEnter'
        }).setClassToggle(".info-block", "fadeInUp_1 visible").addTo(controller1);

        var scene2 = new ScrollMagic.Scene({
            triggerElement: "#sub-info",
            reverse: false,
            triggerHook: 'onEnter'
        }).setClassToggle(".sub-list.sub-item", "fadeInUp_1-5 visible").addTo(controller1);
        $(' .img-hover-effect > div > .card > .img-hover-item ').each(function () {
            $(this).hoverdir();
        });
        $('#demo-1').fsBanner();
    });
</script>
<?php
include_once(G5_THEME_PATH . '/tail.php');
