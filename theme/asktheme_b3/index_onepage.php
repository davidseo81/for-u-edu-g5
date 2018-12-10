<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
 *
 * ASKTHEME B3
 * One Page 
 * 스크롤형 원페이지
 *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

//onepage일 경우 지정. 게시판 등에서 원페이지용 해더 인식용.
define('_ONEPAGE_', true);
include_once "./_common.php";
define('_INDEX_', true);
//모바일일 경우 - 반응형은 사용하지 않음.
if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH . '/index.php');
    return;
}

include_once(G5_CAPTCHA_PATH . '/captcha.lib.php');
$sendmail_count = (int) get_session('ss_sendmail_count') + 1;
if ($sendmail_count > 5) {
    alert_close('한번 접속후 일정수의 메일만 발송할 수 있습니다.');
}

//썸네일 함수, 갤러리 최신글 사용시 포함하세요.
include_once(G5_LIB_PATH . '/thumbnail.lib.php');
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/index_onepage.css">', 10);
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/elements.css">', 10);
//theme.config.php 에서 설정할 수 있습니다. 페이지에 직접입력한 값이 우선시 됩니다.
$theme_config['slider'] = "_slider_onepage.php";
include_once(G5_THEME_PATH . '/head.php');
?>
<div class="contetns-list">
    <!-- 데모 안내 : 작업시 삭제하세요. -->
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">데모안내</h4>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <p>원페이지 스크롤형 데모입니다. 게시판, 그누보드 기능 페이지는 기존 링크에서 참고하시기 바랍니다.</p>
    </div>
    <!--
    #################################
    #  회사소개 About
    #################################
    -->
    <section class="about-wrap onepage-section">
        <!-- 메뉴에 설정한 해시태그명을 아래 앵커태그와 일치하게 입력하세요. -->
        <a name="intro" class="spy-anchor" id="intro"></a>
        <div class="intro-wrap container" id='intro-wrap'>
            <!-- 제목 -->
            <div class="_page-title-wrap row justify-content-center">
                <h1 class="head-title px-5"><span>A</span>BOUT</h1>
            </div>

            <div class='intro-text-wrap'>
                <div id="intro-text-trigger"></div>
                <div class="row intro-text" id='intro-text'>
                    <div class="col-sm-12 col-md-4 text1 delay-_3">
                        <h3 class='header-text'>The world's most powerful GNUBOARD website theme</h3>
                    </div>
                    <div class="col-sm-12 col-md-4 text2 delay-_5">
                        <div class='row no-gutters'>
                            <div class='col-3'>
                                <h3 class='header-number'>01</h3>
                            </div>
                            <div class='col-9'>
                                <h4>Paradigm</h4>
                                <p>
                                    독창적인 아이디어, 디지털 기술, 빅데이터 역량을 활용
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4 text3 delay-_8">
                        <div class='row no-gutters'>
                            <div class='col-3'>
                                <h3 class='header-number'>02</h3>
                            </div>
                            <div class='col-9'>
                                <h4>Service</h4>
                                <p>
                                    고객 여러분께서 쉽게 체감하실 수 있는 실용적인 상품과 서비스
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--//.intro-text-wrap -->

            <div class='ceo-wrap'>
                <div class='row ceo-contents'>
                    <div id="ceo-block"></div>
                    <div class='col-sm-12 col-md-12 col-lg-6 ceo-block'>
                        <div class="ceo-con delay-_8">
                            <div class="ceo-text">
                                <h3 class="title-text">안녕하세요 ASKTHEME CEO 홍길동 입니다.</h3>
                                <p>
                                    언제나 변함없이 ASKTHEME를 아껴 주신 고객 및 주주 여러분께 감사드립니다.
                                    그동안 ASKTHEME의 모든 생각과 사업의 중심은 고객 여러분이었습니다.
                                    앞으로도 고객 여러분의 목소리에 늘 귀 기울이면서 차별적 서비스로 한차원 더 도약하기 위해 새롭게 시작하겠습니다.
                                    앞으로도 기존의 패러다임을 혁신하고 게임의 룰을 바꾸는 새로운 도전을 계속하여 더 넓은 시장에서 사랑과 신뢰를 받고, 더 많은 고객에게 행복한 경험을 제공하기 위해 노력하겠습니다.
                                    독창적인 아이디어, 디지털 기술, 빅데이터 역량을 활용하여 새로운 영역을 개척하겠습니다.감사합니다.
                                </p>
                                <div class="ceo-sign">ASKTHEME CEO 홍길동</div>
                            </div>
                        </div>
                    </div>
                    <div class='col-sm-12 col-md-6 col-lg-6 ceo-block delay-_2'>
                        <div class="ceo-pic delay-_8">
                            <img src="<?php echo G5_THEME_URL ?>/img/ceo-1.jpg" class="img-thumbnail">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class='ceo-bottom-wrap container-fluid' id='ceo-bottom-wrap'>
            <div class='row ceo-bottom-contents align-items-center'>
                <div class='col-sm-12 col-md-6 cover-background bg-about'>

                </div>
                <div class='col-sm-12 col-md-6 ceo-bottom-right'>
                    <div class='row'>
                        <div class='col-md-3'>
                            <h3 class='header-number'>01</h3>
                        </div>
                        <div class='col-md-9'>
                            <h4>서비스의 품격과 가치를 높이겠습니다</h4>
                            <p>
                                고객 여러분께서 쉽게 체감하실 수 있는 실용적인 상품과 서비스를 만들겠습니다.<br/>
                                작고 사소한 것이라도 지속적으로 혁신하여, 고객 여러분께 꼭 필요한 서비스를 의미 있는 가치로 제공하겠습니다.
                            </p>
                        </div>

                        <div class='col-md-3'>
                            <h3 class='header-number'>02</h3>
                        </div>
                        <div class='col-md-9'>
                            <h4>상생과 나눔의 경영을 실천하겠습니다</h4>
                            <p>
                                사회공헌활동에 더욱 힘쓰고, 열린나눔 플랫폼을 통해 여러분과 함께 나눔의 문화를 만들어 가겠습니다.<br/>
                                ASKTHEME의 도전과 실천을 통해 더 편리하고 더 행복한 내일을 향해 경주하겠습니다.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section id="company-stats" class="container company-stats">
            <div class="row">
                <div class="col-6 col-sm-6 col-md-3 text-center about-items delay-_2">
                    <i class="fa fa-users fa-4x" aria-hidden="true"></i>
                    <p>
                        314,000<br/>
                        MEMBERS
                    </p>
                </div>
                <div class="col-6 col-sm-6  col-md-3 text-center about-items delay-_4">
                    <i class="fa fa-shopping-basket fa-4x" aria-hidden="true"></i>
                    <p>
                        2500<br/>
                        CHAIN STORES
                    </p>
                </div>
                <div class="col-6 col-sm-6  col-md-3 text-center about-items delay-_6">
                    <i class="fa fa-ship fa-4x" aria-hidden="true"></i>
                    <p>
                        13<br/>
                        OVERSEAS BRANCHES
                    </p>
                </div>
                <div class="col-6 col-sm-6  col-md-3 text-center about-items delay-_8">
                    <i class="fa fa-thumbs-up fa-4x" aria-hidden="true"></i>
                    <p>
                        1<br/>
                        WORLD'S NO.1
                    </p>
                </div>
            </div>
        </section>

        <section id="p-scroll about-company" class="about-company container-fluid">
            <div class="row">
                <div class='cover-pattern col-sm-12 about-company-parallax' data-stellar-background-ratio="0.5">
                    <div class="container">
                        <div class="row justify-content-md-center">
                            <div class="col-sm-12 col-md-8 col-lg-8">
                                <div class="section-header">
                                    <h2><span>About Company</span></h2>
                                    <p>
                                        <span>
                                            회사소개 텍스트를 입력하세요. 이 텍스트는 Dummy Text 입니다
                                            우리는 아이디어 중심적이고 디자인과 사용자 경험에 중점을두고 일하고 있습니다. 
                                            우리의 프로젝트는 소비자를 끌어 들이고, 사람들이 좋아하고 사용하기를 좋아하는 멋진 디지털 제품을 만들고 있습니다.<br/>
                                            멋진 제품으로 고객들과 함께 하겠습니다.
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container about-card" id="about-card">
                        <div class="row">
                            <div class="col-sm-12 col-md-4">
                                <div class="card card-items delay-_2">

                                    <img class="card-img-top img-fluid" src="<?php echo G5_THEME_IMG_URL ?>/about_card_01.jpg" alt="About Company">
                                    <div class="card-body">
                                        <h4 class="card-title">혁신</h4>
                                        <p class="card-text">회사소개 텍스트를 입력하세요. 이 텍스트는 Dummy Text 입니다. 회사소개 텍스트를 입력하세요. 이 텍스트는 Dummy Text 입니다. 회사소개 텍스트를 입력하세요. 이 텍스트는 Dummy Text 입니다.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="card card-items delay-_5">

                                    <img class="card-img-top img-fluid" src="<?php echo G5_THEME_IMG_URL ?>/about_card_02.jpg" alt="About Company">

                                    <div class="card-body">
                                        <h4 class="card-title">시스템</h4>
                                        <p class="card-text">회사소개 텍스트를 입력하세요. 이 텍스트는 Dummy Text 입니다.회사소개 텍스트를 입력하세요. 이 텍스트는 Dummy Text 입니다.회사소개 텍스트를 입력하세요. 이 텍스트는 Dummy Text 입니다.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="card card-items delay-_8">

                                    <img class="card-img-top img-fluid" src="<?php echo G5_THEME_IMG_URL ?>/about_card_03.jpg" alt="About Company">

                                    <div class="card-body">
                                        <h4 class="card-title">경험</h4>
                                        <p class="card-text">회사소개 텍스트를 입력하세요. 이 텍스트는 Dummy Text 입니다.회사소개 텍스트를 입력하세요. 이 텍스트는 Dummy Text 입니다.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--//.container-->
                </div>

            </div>
        </section>
        <script type="text/javascript">
            $(function () {
                /**
                 * * * * * * * * * * * * * * * * * * * * * * * * * * 
                 * 각종 애니메이션 효과
                 * * * * * * * * * * * * * * * * * * * * * * * * * * 
                 */
                var autoHeightTarget = $('.about-card .card');
                $(autoHeightTarget).matchHeight();
                var controller_introduce = new ScrollMagic.Controller();

                //intro text
                var intro_text = new ScrollMagic.Scene({
                    reverse: false, triggerHook: 'onEnter', triggerElement: '#intro-text-trigger'
                }).setClassToggle(".text1, .text2, .text3", "fadeInLeft visible").addTo(controller_introduce);
                //ceo 인사말 
                var ceo_con = new ScrollMagic.Scene({
                    reverse: false, triggerHook: 'onEnter', triggerElement: '#ceo-block'
                }).setClassToggle(".ceo-con", "fadeInLeft visible").addTo(controller_introduce);
                //ceo 사진
                var ceo_pic = new ScrollMagic.Scene({
                    reverse: false, triggerHook: 'onEnter', triggerElement: '#ceo-block'
                }).setClassToggle(".ceo-pic", "fadeInRight visible").addTo(controller_introduce);

                var scene_icon_text = new ScrollMagic.Scene({
                    reverse: false, triggerHook: 'onEnter', triggerElement: '#company-stats'
                }).setClassToggle(".about-items", "fadeInLeft visible").addTo(controller_introduce);

                var scene3 = new ScrollMagic.Scene({
                    reverse: false, triggerHook: 'onEnter', triggerElement: '#ceo-bottom-wrap'
                }).setClassToggle(".ceo-bottom-wrap", "fadeIn visible").addTo(controller_introduce)

                var scene4 = new ScrollMagic.Scene({
                    reverse: false, triggerHook: 'onEnter', triggerElement: '#ceo-bottom-wrap'
                }).setClassToggle(".ceo-bottom-contents", "fadeInUp_1 visible").addTo(controller_introduce)

                var scene5 = new ScrollMagic.Scene({
                    reverse: false, triggerHook: 'onEnter', triggerElement: '#about-card'
                }).setClassToggle(".card-items", "fadeInUp_1 visible").addTo(controller_introduce);

                var scene5_1 = new ScrollMagic.Scene({
                    reverse: false, triggerHook: 'onEnter', triggerElement: '.section-header'
                }).setClassToggle(".section-header", "fadeInDown visible").addTo(controller_introduce);

                scene5.on("start", function () {
                    setTimeout(function () {
                        $(autoHeightTarget).matchHeight();
                    }, 2100);
                });
            });
        </script>
    </section>
    <!-- //회사소개 About 끝 -->

    <section class="onepage-section">
        <a name="service" class="spy-anchor" id="service"></a>
        <div class="container" id="one-service">
            <!-- 제목 -->
            <div class="_page-title-wrap row justify-content-center pb-5">
                <h1 class="head-title px-5"><span>S</span>ERVICE</h1>
            </div>
            <div class="one-servce-contents row">
                <div class="col-sm-12 col-md-12 col-lg-6 service-left">
                    <div id="one-service-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#one-service-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#one-service-carousel" data-slide-to="1"></li>
                            <li data-target="#one-service-carousel" data-slide-to="2"></li>
                            <li data-target="#one-service-carousel" data-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="d-block w-100 embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" width="560" height="315" src="https://www.youtube.com/embed/HkMNOlYcpHg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo G5_THEME_URL ?>/img/one-service1.jpg" class="d-block w-100 one-service-img"/>
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo G5_THEME_URL ?>/img/one-service2.jpg" class="d-block w-100 one-service-img"/>
                            </div>
                            <div class="carousel-item">
                                <img src="<?php echo G5_THEME_URL ?>/img/one-service3.jpg" class="d-block w-100 one-service-img"/>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#one-service-carousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#one-service-carousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 service-right">
                    <div class="onepage-subtitle-wrap">
                        <h2 class="os-title-left">서비스 전문 분야 소개</h2>
                        <div class="title-bar-container">
                            <div class="title-bar"></div>
                        </div>
                    </div>
                    <p>
                        이 텍스트는 Dummy Text 입니다 우리는 아이디어 중심적이고 디자인과 사용자 경험에 중점을두고 일하고 있습니다.
                        우리의 프로젝트는 소비자를 끌어 들이고, 사람들이 좋아하고 사용하기를 좋아하는 멋진 디지털 제품을 만들고 있습니다.
                        멋진 제품으로 고객들과 함께 하겠습니다.
                        이 텍스트는 Dummy Text 입니다 우리는 아이디어 중심적이고 디자인과 사용자 경험에 중점을두고 일하고 있습니다. 
                        우리의 프로젝트는 소비자를 끌어 들이고, 사람들이 좋아하고 사용하기를 좋아하는 멋진 디지털 제품을 만들고 있습니다.
                        멋진 제품으로 고객들과 함께 하겠습니다.
                        이 텍스트는 Dummy Text 입니다 우리는 아이디어 중심적이고 디자인과 사용자 경험에 중점을두고 일하고 있습니다. 
                    </p>
                </div>
            </div>
            <hr class="line-hr">
            <script type="text/javascript">
                $(function () {
                    $('.flip-container').hover(function () {
                        $(this).addClass('hover');
                    }, function () {
                        $(this).removeClass('hover');
                    });
                });
            </script>
            <div class="row one-service-card">
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="flip-container">
                        <div class="flip-cards">
                            <div class="front-card mb-3">
                                <div class="flip-card-header">
                                    <div class="d-inline-block mx-auto">
                                        <i class="fa fa-microchip fa-2x round-icon-bg bg-secondary" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="flip-card-body">
                                    <h5 class="flip-card-title">제품개발</h5>
                                    <p class="flip-card-text">사업분야 텍스트를 입력하세요.  사업분야 텍스트를 입력하세요. 이 텍스트는 Dummy Text 입니다.</p>
                                </div>
                            </div>
                            <div class="reverse-card mb-3">
                                <div class="flip-card-header">
                                    <div class="d-inline-block mx-auto">
                                        <i class="fa fa-microchip fa-2x round-icon-bg bg-secondary" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="flip-card-body">
                                    <h5 class="flip-card-title">Product</h5>
                                    <p class="flip-card-text">사업분야 텍스트를 입력하세요.  사업분야 텍스트를 입력하세요. 이 텍스트는 Dummy Text 입니다.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="flip-container">
                        <div class="flip-cards">
                            <div class="front-card mb-3">
                                <div class="flip-card-header">
                                    <div class="d-inline-block mx-auto">
                                        <i class="fa fa-cubes fa-2x round-icon-bg bg-secondary" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="flip-card-body">
                                    <h5 class="flip-card-title">솔루션</h5>
                                    <p class="flip-card-text">사업분야 텍스트를 입력하세요.  사업분야 텍스트를 입력하세요. 이 텍스트는 Dummy Text 입니다.</p>
                                </div>
                            </div>
                            <div class="reverse-card mb-3">
                                <div class="flip-card-header">
                                    <div class="d-inline-block mx-auto">
                                        <i class="fa fa-cubes fa-2x round-icon-bg bg-secondary" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="flip-card-body">
                                    <h5 class="flip-card-title">Solution</h5>
                                    <p class="flip-card-text">사업분야 텍스트를 입력하세요.  사업분야 텍스트를 입력하세요. 이 텍스트는 Dummy Text 입니다.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="flip-container">
                        <div class="flip-cards">
                            <div class="front-card mb-3">
                                <div class="flip-card-header">
                                    <div class="d-inline-block mx-auto">
                                        <i class="fa fa-comments-o fa-2x round-icon-bg bg-secondary" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="flip-card-body">
                                    <h5 class="flip-card-title">컨설팅</h5>
                                    <p class="flip-card-text">사업분야 텍스트를 입력하세요.  사업분야 텍스트를 입력하세요. 이 텍스트는 Dummy Text 입니다.</p>
                                </div>
                            </div>
                            <div class="reverse-card mb-3">
                                <div class="flip-card-header">
                                    <div class="d-inline-block mx-auto">
                                        <i class="fa fa-comments-o fa-2x round-icon-bg bg-secondary" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="flip-card-body">
                                    <h5 class="flip-card-title">Consulting</h5>
                                    <p class="flip-card-text">사업분야 텍스트를 입력하세요.  사업분야 텍스트를 입력하세요. 이 텍스트는 Dummy Text 입니다.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="flip-container">
                        <div class="flip-cards">
                            <div class="front-card mb-3">
                                <div class="flip-card-header">
                                    <div class="d-inline-block mx-auto">
                                        <i class="fa fa-life-ring fa-2x round-icon-bg bg-secondary" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="flip-card-body">
                                    <h5 class="flip-card-title">서비스</h5>
                                    <p class="flip-card-text">사업분야 텍스트를 입력하세요.  사업분야 텍스트를 입력하세요. 이 텍스트는 Dummy Text 입니다.</p>
                                </div>
                            </div>
                            <div class="reverse-card mb-3">
                                <div class="flip-card-header">
                                    <div class="d-inline-block mx-auto">
                                        <i class="fa fa-life-ring fa-2x round-icon-bg bg-secondary" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="flip-card-body">
                                    <h5 class="flip-card-title">Service</h5>
                                    <p class="flip-card-text">사업분야 텍스트를 입력하세요.  사업분야 텍스트를 입력하세요. 이 텍스트는 Dummy Text 입니다.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--
    ############################################################################
        PortFolio
    ############################################################################
    -->
    <section class="onepage-section">
        <a name="portfolio" class="spy-anchor" id="portfolio"></a>
        <div class="container">
            <!-- 제목 -->
            <div class="_page-title-wrap row justify-content-center pb-5">
                <h1 class="head-title px-5"><span>P</span>ORTFOLIO</h1>
            </div>
            <div class="row">
                <section class="client-info container delay-_2" id="client-info">
                    <div class="client-info-item">
                        <div class='title-wrap'>
                            <h2 class='top-title'><span class='color-point'>O</span>ur <span class='color-point'>C</span>lients</h2>
                            <p>ASKTHEME는 인덱스페이지 6종, 하위페이지 7종, 게시판 6종, 최신글 17종 기본 제공합니다. 계속 업데이트 됩니다.</p>
                        </div>
                        <div class="row text-center no-gutters client-items">
                            <div class="col-6 col-sm-12 col-md-6 col-lg-3">
                                <div class="counter">
                                    <i class="fa fa-code fa-2x"></i>
                                    <h2 class="timer count-title count-number" data-to="200" data-speed="2500"></h2>
                                    <p class="count-text ">Our Customer</p>
                                </div>
                            </div>
                            <div class="col-6 col-sm-12 col-md-6 col-lg-3">
                                <div class="counter delay-_3">
                                    <i class="fa fa-coffee fa-2x"></i>
                                    <h2 class="timer count-title count-number" data-to="2700" data-speed="2500"></h2>
                                    <p class="count-text ">Happy Clients</p>
                                </div>
                            </div>
                            <div class="col-6 col-sm-12 col-md-6 col-lg-3">
                                <div class="counter delay-_6">
                                    <i class="fa fa-lightbulb-o fa-2x"></i>
                                    <h2 class="timer count-title count-number" data-to="21900" data-speed="2500"></h2>
                                    <p class="count-text ">Project Complete</p>
                                </div></div>
                            <div class="col-6 col-sm-12 col-md-6 col-lg-3">
                                <div class="counter delay-_9">
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
            </div>
        </div>

        <!--
        셔플 필터 그리드
        -->
        <div id="portfolio-shuffle">
            <div class='cover-pattern portfolio-parallax' data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="shuffle-grid">
                        <div class='title-wrap'>
                            <h2 class='top-title'><span class='color-point'>P</span>roduct <span class='color-point'>P</span>ortfolio</h2>
                            <p>ASKTHEME는 인덱스페이지 6종, 하위페이지 7종, 게시판 5종, 최신글 17종 기본 제공합니다. 계속 업데이트 됩니다.</p>
                        </div>
                        <div class="sub-shuffle-container">
                            <?php echo latest('theme/ask-portfolio-shuffle2', 'portfolio', 12, 33); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--
    ############################################################################
        하단배너
    ############################################################################
    -->
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

    <!--
    ############################################################################
        Customer
    ############################################################################
    -->
    <section class="onepage-section" id="customer-section">
        <a name="customer" class="spy-anchor" id="customer"></a>
        <div class="cover-pattern contact-parallax" data-stellar-background-ratio="0.5">
            <div class="container">
                <!-- 제목 -->
                <div class="_page-title-wrap row justify-content-center py-5">
                    <h1 class="head-title px-5"><span class="light">C</span>USTOMER</h1>
                </div>
            </div>
            <div class="map-wrap">
                <div class="container-fluid">
                    <div class="row justify-content-md-center">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="daum-map">
                                <!--
                                구글 지도 공유 기능을 이용해 삽입하세요.
                                -->
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.8222622765757!2d126.97600467713734!3d37.56710192168301!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe92b70ac420cf0a8!2z7ISc7Jq47Yq567OE7Iuc7LKt!5e0!3m2!1sko!2skr!4v1535334637172" width="100%" height="650" frameborder="0" style="border:0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <div class="address-info">
                                <div class="title-wrap">
                                    <h2 class="top-title"><span class="color-point">W</span>AY TO <span class="color-point">C</span>OME</h2>
                                </div>

                                <table class="table table-condensed waytocome">
                                    <tr>
                                        <th>주소</th>
                                        <td>서울 중구 태평로1가 54-3 가나다빌딩 1002호</td>
                                    </tr>
                                    <tr>
                                        <th>전화</th>
                                        <td>02-1234-5678</td>
                                    </tr>
                                    <tr>
                                        <th>팩스</th>
                                        <td>02-1234-5679</td>
                                    </tr>
                                    <tr>
                                        <th>이메일</th>
                                        <td>email@youremail.com</td>
                                    </tr>
                                    <tr>
                                        <th>지하철 이용</th>
                                        <td>지하철 이용 방법 안내</td>
                                    </tr>
                                    <tr>
                                        <th>버스 이용</th>
                                        <td>버스노선 및 코스 안내</td>
                                    </tr>
                                </table>

                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-6">
                            <?php
                            //관리자 메일
                            $email = $config['cf_admin_email'];


                            if (!$name) {
                                $name = $email;
                            } else {
                                $name = get_text(stripslashes($name), true);
                            }

                            if (!isset($type)) {
                                $type = 0;
                            }

                            $type_checked[0] = $type_checked[1] = $type_checked[2] = "";
                            $type_checked[$type] = 'checked';
                            ?>
                            <div class="container-fluid">
                                <div class="row one-formmail">
                                    <div class='col-sm-12 cover-pattern formmail-parallax' data-stellar-background-ratio="0.5">
                                        <div class="title-wrap">
                                            <h2 class="top-title"><span class="color-point">C</span>ONTACT <span class="color-point">U</span>S</h2>
                                        </div>
                                        <!-- 폼메일 시작 { -->
                                        <div id="formmail" class="new_win mbskin formmail-wrap">
                                            <form name="fformmail" action="./contact_us_send.php" onsubmit="return fformmail_submit(this);" method="post" enctype="multipart/form-data" style="margin:0px;">
                                                <input type="hidden" name="to" value="<?php echo $email ?>">
                                                <input type="hidden" name="attach" value="2">
                                                <input type="hidden" name="location" value="<?php echo $_SERVER['PHP_SELF'] ?>"/>
                                                <input type="hidden" name="type" value="2">
                                                <?php if ($is_member) { // 회원이면    ?>
                                                    <input type="hidden" name="fnick" value="<?php echo get_text($member['mb_nick']) ?>">
                                                    <input type="hidden" name="fmail" value="<?php echo $member['mb_email'] ?>">
                                                <?php } ?>

                                                <div class="mail-form-wrap">
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <input type="text" name="fnick" id="fnick" required class="form-control required" placeholder="이름">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <input type="text" name="fmail"  id="fmail" required class="form-control required" placeholder="이메일">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <input type="text" name="subject" id="subject" required class="form-control required" placeholder="제목">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <textarea name="content" id="content" required rows='8' class="form-control required" placeholder="내용"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <?php
                                                            $captcha = captcha_html('ask-captcha');
                                                            $captcha = str_replace("숫자음성듣기", '<i class="fa fa-volume-up" aria-hidden="true"></i>', $captcha);
                                                            $captcha = str_replace("새로고침", '<i class="fa fa-refresh" aria-hidden="true"></i>', $captcha);
                                                            $captcha = str_replace('id="captcha_mp3"', 'id="captcha_mp3" class="btn btn-secondary"', $captcha);
                                                            $captcha = str_replace('id="captcha_reload"', 'id="captcha_reload" class="btn btn-secondary"', $captcha);
                                                            $captcha = str_replace('class="captcha_box required"', 'class="captcha_box required btn btn-outline-secondary"', $captcha);
                                                            echo $captcha;
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-footer">
                                                    <button type="submit" id="btn_submit" class="btn_submit btn btn-outline-light"><i class="fa fa-paper-plane" aria-hidden="true"></i> 문의하기</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script type="text/javascript">
                                function fformmail_submit(f) {
<?php echo chk_captcha_js(); ?>

                                    if (f.file1.value || f.file2.value) {
                                        // 4.00.11
                                        if (!confirm("첨부파일의 용량이 큰경우 전송시간이 오래 걸립니다.\n\n메일보내기가 완료되기 전에 창을 닫거나 새로고침 하지 마십시오."))
                                            return false;
                                    }

                                    document.getElementById('btn_submit').disabled = true;

                                    return true;
                                }
                            </script>
                            <!-- } 폼메일 끝 -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        $(function () {
            // init controller
            var controller1 = new ScrollMagic.Controller();

            var client_scene = new ScrollMagic.Scene({
                triggerElement: "#client-info",
                reverse: false,
                triggerHook: 'onEnter'
            }).setClassToggle(".counter", "fadeInRight visible").addTo(controller1);
        });
    </script>
</div>
<?php
include_once(G5_THEME_PATH . '/tail.php');
