<?php
/**
 * 회사 연혁
 */
include_once "./_common.php";
$g5['title'] = "연혁";
$g5['ask_title_desc'] = 'Company History';
//메뉴용 상수
define('AT_MENU_GROUP', '회사소개');
define('_INDEX_SUBPAGE_', true);
include_once(G5_THEME_PATH . '/head.php');
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/at_history.css">', 1);
?>
<div class="history-wrap container">
    <div class="row">
        <div class="col-sm-12 justify-content-md-center">
            <ul class="timeline timeline-centered">
                <li class="timeline-item period">
                    <div class="timeline-info"></div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h2 class="timeline-title">2017년</h2>
                    </div>
                </li>
                <li class="timeline-item">
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <div class="lcard">
                            <div class="lcard-head equal-item">
                                <img src="<?php echo G5_THEME_IMG_URL ?>/lcard-top-img1.jpg" class="lcard-img">
                            </div>
                            <div class="lcard-body equal-item">
                                <h3 class="timeline-title"><i class="fa fa-globe" aria-hidden="true"></i> Nicrosoft 파트너쉽 체결</h3>
                                <p>파트너쉽 체결로 더 다양한 서비스를 제공</p>
                                <span class="date">2017년 5월 10일</span>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="timeline-item">
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <div class="lcard">
                            <div class="lcard-head equal-item">
                                <img src="<?php echo G5_THEME_IMG_URL ?>/lcard-top-img2.jpg" class="lcard-img">
                            </div>
                            <div class="lcard-body equal-item">
                                <h3 class="timeline-title"><i class="fa fa-quora" aria-hidden="true"></i> 솔루션 KS 인증</h3>
                                <p>솔류션 업계 최초 KS 인증</p>
                                <span class="date">2017년 3월 8일</span>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="timeline-item">
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <div class="lcard">
                            <div class="lcard-head equal-item">
                                <img src="<?php echo G5_THEME_IMG_URL ?>/lcard-top-img3.jpg" class="lcard-img">
                            </div>
                            <div class="lcard-body equal-item">
                                <h3 class="timeline-title"><i class="fa fa-globe" aria-hidden="true"></i> 이미지 연혁</h3>
                                <p>연혁을 입력하세요. Dummy Text 입니다.</p>
                                <span class="date">2017년 1월 10일</span>
                            </div>
                        </div>
                    </div>
                </li>
                <!--년도표시-->
                <li class="timeline-item period">
                    <div class="timeline-info"></div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h2 class="timeline-title">2016년</h2>
                    </div>
                </li>
                <li class="timeline-item period sr-only"></li>
                <!--//년도표시-->
                <li class="timeline-item">
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <div class="lcard">
                            <div class="lcard-head equal-item">
                                <i class="fa fa-globe fa-4x" aria-hidden="true"></i>
                            </div>
                            <div class="lcard-body equal-item">
                                <h3 class="timeline-title"><i class="fa fa-check-square-o" aria-hidden="true"></i> 자동인터넷견적시스템</h3>
                                <p>인터넷을 통한 자동견적시스템 개발 및 납품계약 체결</p>
                                <span class="date">2016년 8월 8일</span>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="timeline-item">
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <div class="lcard">
                            <div class="lcard-head equal-item">
                                <i class="fa fa-desktop fa-4x" aria-hidden="true"></i>
                            </div>
                            <div class="lcard-body equal-item">
                                <h3 class="timeline-title"><i class="fa fa-building-o" aria-hidden="true"></i> 디자인센터 설립</h3>
                                <p>정부투자기관 선정</p>
                                <span class="date">2016년 3월 4일</span>
                            </div>
                        </div>
                    </div>
                </li>
                <!--년도표시 -->
                <li class="timeline-item period">
                    <div class="timeline-info"></div>
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <h2 class="timeline-title">2015년</h2>
                    </div>
                </li>
                <li class="timeline-item period sr-only"></li>
                <!--//년도표시-->
                <li class="timeline-item">
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <div class="lcard">
                            <div class="lcard-head equal-item">
                                <i class="fa fa-truck fa-4x" aria-hidden="true"></i>
                            </div>
                            <div class="lcard-body equal-item">
                                <h3 class="timeline-title"><i class="fa fa-bus" aria-hidden="true"></i> 본사이전</h3>
                                <p>신사옥으로 이전</p>
                                <span class="date">2015년 9월 22일</span>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="timeline-item">
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <div class="lcard">
                            <div class="lcard-head equal-item">
                                <i class="fa fa-building-o fa-4x" aria-hidden="true"></i>
                            </div>
                            <div class="lcard-body equal-item">
                                <h3 class="timeline-title"><i class="fa fa-building" aria-hidden="true"></i> ASKTHEME 회사설립</h3>
                                <p>모바일 솔루션 전문기업 설립</p>
                                <span class="date">2015년 5월 12일</span>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        var autoHeightTarget = $('.lcard .equal-item');
        $(autoHeightTarget).matchHeight();

        var controller_introduce = new ScrollMagic.Controller();
        var scene1 = new ScrollMagic.Scene({
            reverse: false, triggerHook: 'onEnter', triggerElement: '.timeline-content'
        }).setClassToggle(".timeline-content", "fadeInUp_1 visible").addTo(controller_introduce);
    });
</script>
<?php
include_once(G5_THEME_PATH . '/tail.php');
