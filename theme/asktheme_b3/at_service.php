<?php
/**
 * 회사 서비스
 */
include_once "./_common.php";
$g5['title'] = "사업분야소개";
$g5['ask_title_desc'] = 'Business Areas';
//메뉴용 상수
define('AT_MENU_GROUP', '회사소개');
define('_INDEX_SUBPAGE_', true);
include_once(G5_THEME_PATH . '/head.php');
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/at_service.css">', 1);
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/elements.css">', 10);
?>
<script type="text/javascript">
    /* Mouse Hover effect */
    $(function () {
        $(' .img-hover-effect > div > .card > .img-hover-item ').each(function () {
            $(this).hoverdir();
        });
    });
</script>
<div class="service-wrap">
    <div class="container service-intro-wrap pt-5">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-10 col-lg-8">
                <div id="at-service-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#at-service-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#at-service-carousel" data-slide-to="1"></li>
                        <li data-target="#at-service-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="cap-1 caption d-flex">
                                <div class="big-title delay-_5">
                                    <h1>Service</h1>
                                    <p class="delay-_8">이 텍스트는 Dummy Text 입니다. </p>
                                </div>                                    
                            </div>
                            <img src="<?php echo G5_THEME_URL ?>/img/one-service1.jpg" class="d-block w-100 one-service-img"/>
                        </div>
                        <div class="carousel-item">
                            <div class="cap-2 caption d-flex">
                                <div class="big-title delay-_5">
                                    <h1>Digital branding</h1>
                                    <p class="delay-_8">이 텍스트는 Dummy Text 입니다. </p>
                                </div>                                    
                            </div>
                            <img src="<?php echo G5_THEME_URL ?>/img/one-service2.jpg" class="d-block w-100 one-service-img"/>
                        </div>
                        <div class="carousel-item">
                            <div class="cap-3 caption d-flex">
                                <div class="big-title delay-_5">
                                    <h1>Portfolio</h1>
                                    <p class="delay-_8">이 텍스트는 Dummy Text 입니다. </p>
                                </div>                                    
                            </div>
                            <img src="<?php echo G5_THEME_URL ?>/img/one-service3.jpg" class="d-block w-100 one-service-img"/>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#at-service-carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#at-service-carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="service-intro pt-5">
                    <div class="_page-title-wrap">
                        <h3 class="head-title">서비스 전문 분야 소개</h3>
                    </div>
                    <p>
                        이 텍스트는 Dummy Text 입니다 우리는 아이디어 중심적이고 디자인과 사용자 경험에 중점을두고 일하고 있습니다. 
                        우리의 프로젝트는 소비자를 끌어 들이고, 사람들이 좋아하고 사용하기를 좋아하는 멋진 디지털 제품을 만들고 있습니다. 
                        멋진 제품으로 고객들과 함께 하겠습니다. 
                        이 텍스트는 Dummy Text 입니다 우리는 아이디어 중심적이고 디자인과 사용자 경험에 중점을두고 일하고 있습니다.  
                        우리의 프로젝트는 소비자를 끌어 들이고, 사람들이 좋아하고 사용하기를 좋아하는 멋진 디지털 제품을 만들고 있습니다.  
                        멋진 제품으로 고객들과 함께 하겠습니다. 이 텍스트는 Dummy Text 입니다 우리는 아이디어 중심적이고 디자인과 사용자 경험에 중점을두고 일하고 있습니다.
                    </p>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#at-service-carousel').find('.carousel-item.active .cap-1 .big-title').addClass('fadeInUp');
                $('#at-service-carousel').on('slid.bs.carousel', function (e) {
                    $(this).find('.carousel-item.active .caption .big-title').addClass('fadeInUp');
                    console.log(e);
                });
            });

        </script>
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
        <div class="row at-service-card">
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

    <!-- 사업분야1 -->
    <div class="container">
        <hr class="line-hr">
        <div class="row service-list1" id="service-list1">
            <div class="col-sm-12 col-md-4 delay-_2 service-item">
                <h2>Service</h2>
                <p>이 텍스트는 Dummy Text 입니다. 사업분야 소개글을 간단히 입력하세요.이 텍스트는 Dummy Text 입니다. 사업분야 소개글을 간단히 입력하세요.이 텍스트는 Dummy Text 입니다. 사업분야 소개글을 간단히 입력하세요.</p>
            </div>
            <div class="col-sm-12 col-md-4 delay-_5 service-item">
                <h2>Digital branding</h2>
                <p>이 텍스트는 Dummy Text 입니다. 사업분야 소개글을 입력하세요. 사업분야 소개글을 입력하세요. 이 텍스트는 Dummy Text 입니다. 사업분야 소개글을 입력하세요. </p>
            </div>
            <div class="col-sm-12 col-md-4 delay-_8 service-item">
                <h2>Portfolio</h2>
                <p>이 텍스트는 Dummy Text 입니다. 사업분야 소개글을 입력하세요. 이 텍스트는 Dummy Text 입니다. 사업분야 소개글을 입력하세요. 이 텍스트는 Dummy Text 입니다. 사업분야 소개글을 입력하세요</p>
            </div>
        </div>
    </div>

    <!-- 사업분야2 -->
    <section id="p-scroll service-list2" class="service-list2 container-fluid">
        <div class="row">
            <div class='cover-pattern col-sm-12 service-list2-parallax' data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="row justify-content-md-center">
                        <div class="col-sm-12 col-md-8 col-lg-6">
                            <div class="section-header">
                                <h2>Business Areas</h2>
                                <p>
                                    사업영역 텍스트를 입력하세요. 이 텍스트는 Dummy Text 입니다.
                                    우리는 아이디어 중심적이고 디자인과 사용자 경험에 중점을두고 일하고 있습니다. 
                                    우리의 프로젝트는 소비자를 끌어 들이고, 사람들이 좋아하고 사용하기를 좋아하는 멋진 디지털 제품을 만들고 있습니다.
                                    멋진 제품으로 고객들과 함께 하겠습니다.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container area-card" id="area-card">
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <div class="card card-items delay-_2">
                                <img class="card-img-top img-fluid" src="<?php echo G5_THEME_IMG_URL ?>/service1.png" alt="Business Areas">
                                <div class="card-body">
                                    <h4 class="card-title">제품개발</h4>
                                    <p class="card-text">사업분야 텍스트를 입력하세요. 이 텍스트는 Dummy Text 입니다. 사업분야 텍스트를 입력하세요. 이 텍스트는 Dummy Text 입니다. 사업분야 텍스트를 입력하세요. 이 텍스트는 Dummy Text 입니다.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="card card-items delay-_5">
                                <img class="card-img-top img-fluid" src="<?php echo G5_THEME_IMG_URL ?>/service2.png" alt="Business Areasy">
                                <div class="card-body">
                                    <h4 class="card-title">시스템솔루션</h4>
                                    <p class="card-text">사업분야 텍스트를 입력하세요. 이 텍스트는 Dummy Text 입니다.사업분야 텍스트를 입력하세요. 이 텍스트는 Dummy Text 입니다.사업분야 텍스트를 입력하세요. 이 텍스트는 Dummy Text 입니다.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="card card-items delay-_8">
                                <img class="card-img-top img-fluid" src="<?php echo G5_THEME_IMG_URL ?>/service3.png" alt="Business Areas">
                                <div class="card-body">
                                    <h4 class="card-title">서비스</h4>
                                    <p class="card-text">사업분야 텍스트를 입력하세요. 이 텍스트는 Dummy Text 입니다.사업분야 텍스트를 입력하세요. 이 텍스트는 Dummy Text 입니다.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--//.container-->
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    $(function () {
        var autoHeightTarget = $('.service-list1 .col-sm-12');
        $(autoHeightTarget).matchHeight();
        var autoHeightTarget2 = $('.area-card .card');
        $(autoHeightTarget2).matchHeight();

        var controller_introduce = new ScrollMagic.Controller();
        var scene1 = new ScrollMagic.Scene({
            reverse: false, triggerHook: 'onEnter', triggerElement: '#service-list1'
        }).setClassToggle(".service-item", "fadeInUp_1 visible").addTo(controller_introduce);
        var scene2 = new ScrollMagic.Scene({
            reverse: false, triggerHook: 'onEnter', triggerElement: '#area-card'
        }).setClassToggle(".card-items", "fadeInUp_1 visible").addTo(controller_introduce);
        scene2.on("start", function () {
            setTimeout(function () {
                //$(autoHeightTarget2).matchHeight();
            }, 2100);
        });

    });
</script>
<?php
include_once(G5_THEME_PATH . '/tail.php');
