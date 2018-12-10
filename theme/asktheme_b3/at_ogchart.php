<?php
/**
 * 회사 조직도
 */
include_once "./_common.php";
$g5['title'] = "조직도";
$g5['ask_title_desc'] = 'Organization Chart';
//메뉴용 상수
define('AT_MENU_GROUP', '회사소개');
define('_INDEX_SUBPAGE_', true);
include_once(G5_THEME_PATH . '/head.php');
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/at_ogchart.css">', 1);
?>

<div class="ogchart-wrap container">
    <div class="tree og-wrap">
        <ul class="first">
            <li>
                <a href="#ogchart" class="ceo"> <i class="fa fa-user-circle" aria-hidden="true"></i> CEO</a>
                <ul class="child-node">
                    <li class="node1">
                        <a href="#ogchart"> <i class="fa fa-user" aria-hidden="true"></i> 경영지원본부</a>
                        <ul class="sub-child-node">
                            <li>
                                <a href="#ogchart">
                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i> 인사 &middot; 총무팀<br/>
                                    <i class="fa fa-phone-square" aria-hidden="true"></i> 02-0000-1234<br/>
                                    <i class="fa fa-envelope" aria-hidden="true"></i> email@email.com
                                </a>
                            </li>
                            <li>
                                <a href="#ogchart">
                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i> 경리 &middot; 회계팀<br/>
                                    <i class="fa fa-phone-square" aria-hidden="true"></i> 02-0000-2345<br/>
                                    <i class="fa fa-envelope" aria-hidden="true"></i> email@email.com
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="node1">
                        <a href="#ogchart"><i class="fa fa-user" aria-hidden="true"></i> 영업본부</a>
                        <ul class="sub-child-node">
                            <li><a href="#ogchart">
                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i> 영업팀
                                    <br/>
                                    <i class="fa fa-phone-square" aria-hidden="true"></i> 02-0000-2345<br/>
                                    <i class="fa fa-envelope" aria-hidden="true"></i> email@email.com
                                </a>
                            </li>
                            <li>
                                <a href="#ogchart">
                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i> 전산팀<br/>
                                    <i class="fa fa-phone-square" aria-hidden="true"></i> 02-0000-2345<br/>
                                    <i class="fa fa-envelope" aria-hidden="true"></i> email@email.com

                                </a>
                                <!-- 3단계 하위
                                <ul class="sub-sub-child-node">
                                    <li>
                                        <a href="#ogchart">Great Grand Child</a>
                                    </li>
                                    <li>
                                        <a href="#ogchart">Great Grand Child</a>
                                    </li>
                                    <li>
                                        <a href="#ogchart">Great Grand Child</a>
                                    </li>
                                </ul>
                                -->
                            </li>
                            <li><a href="#ogchart">
                                    <i class="fa fa-dot-circle-o" aria-hidden="true"></i> 마케팅기획팀
                                    <br/>
                                    <i class="fa fa-phone-square" aria-hidden="true"></i> 02-0000-2345<br/>
                                    <i class="fa fa-envelope" aria-hidden="true"></i> email@email.com
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="node1">
                        <a href="#ogchart"><i class="fa fa-user" aria-hidden="true"></i> 관리본부</a>
                        <ul class="sub-child-node">
                            <li>
                                <a href="#ogchart"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> 관리팀
                                    <br/>
                                    <i class="fa fa-phone-square" aria-hidden="true"></i> 02-0000-2345<br/>
                                    <i class="fa fa-envelope" aria-hidden="true"></i> email@email.com
                                </a>
                            </li>
                            <li>
                                <a href="#ogchart"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> 운영팀
                                    <br/>
                                    <i class="fa fa-phone-square" aria-hidden="true"></i> 02-0000-2345<br/>
                                    <i class="fa fa-envelope" aria-hidden="true"></i> email@email.com
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="node1">
                        <a href="#ogchart"><i class="fa fa-user" aria-hidden="true"></i> 연구원</a>
                        <ul class="sub-child-node">
                            <li>
                                <a href="#ogchart"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> R&D
                                    <br/>
                                    <i class="fa fa-phone-square" aria-hidden="true"></i> 02-0000-2345<br/>
                                    <i class="fa fa-envelope" aria-hidden="true"></i> email@email.com
                                </a>
                            </li>
                            <li>
                                <a href="#ogchart"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> 연구개발
                                    <br/>
                                    <i class="fa fa-phone-square" aria-hidden="true"></i> 02-0000-2345<br/>
                                    <i class="fa fa-envelope" aria-hidden="true"></i> email@email.com
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>

<?php
include_once(G5_THEME_PATH . '/tail.php');
