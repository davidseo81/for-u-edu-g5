<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *
 * ASIDE
 * head_aside.php
 * ASKTHEME B3 테마
 * 
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

if (!defined('_GNUBOARD_')) {
    exit;
}
include_once(G5_THEME_PATH . '/head.sub.php');
include_once(G5_LIB_PATH . '/latest.lib.php');
include_once(G5_LIB_PATH . '/outlogin.lib.php');
include_once(G5_LIB_PATH . '/poll.lib.php');
include_once(G5_LIB_PATH . '/visit.lib.php');
include_once(G5_LIB_PATH . '/connect.lib.php');
include_once(G5_LIB_PATH . '/popular.lib.php');
add_javascript('<script src="' . G5_THEME_URL . '/plugin/sticky_sidebar/jquery.sticky-sidebar.min.js"></script>', 100);


if (defined('_INDEX_')) {
    /*
     * 팝업 레이어 - 모달, 일반, 둘중 하나만 사용하세요.
     * Modal 형식 팝업 - 팝업창 1개만 띄울때 추천
     * 모바일에서는 Modal 팝업창을 사용하도록 설정함.
     */
    if (is_mobile()) {
        include_once(G5_THEME_PATH . '/_modal.php');
    } else {
        include G5_BBS_PATH . '/newwin.inc.php';
    }
}
/**
 * 첫페이지 구분
 */
if (defined('_INDEX_')) {
    $page_type = 'indexpage';
} else {
    $page_type = "subpage";
}
?>
<div id='contents-wrap' class="row-offcanvas row-offcanvas-right c-offcanvas-content-wrap" role="main" aria-labelledby="accesible-offcanvas" data-slideout-ignore>
    <a name="home" class="home-anchor" id="home"></a>

    <?php
    /* # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # 
     * 
     * 테마 헤더 메뉴 설정
     * theme.config.php
     * $theme_config['header'] = "헤더메뉴파일명 - 기본 header_default.php"; 
     * 파일경로 : _template/header/
     * 
      # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # */
    $inc_header = ASKTHEME_TEMPLATE_HEADER_PATH . DS . $theme_config['header'];
    if (isset($theme_config['header']) && file_exists($inc_header)) {
        include_once $inc_header;
    } else {
        $_ASKTHEME->message('해더 파일이 없습니다. 입력한 파일명 ' . $theme_config['header'] . '를 확인하세요.', 'warning');
    }

    //슬라이더 출력
    if ($page_type == 'indexpage') {
        /* # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # 
         * 
         * 테마 메인페이지 슬라이더 설정
         * theme.config.php
         * $theme_config['slider'] = "슬라이더파일명 - 기본 _slider.php"; 
         * 파일경로 : theme/asktheme_b3/_slider.php
         * 
          # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # */
        $slider_inc = G5_THEME_PATH . DS . $theme_config['slider'];
        if (isset($theme_config['slider']) && file_exists($slider_inc)) {
            include_once $slider_inc;
        } else {
            $_ASKTHEME->message('슬라이더 파일이 없습니다. 입력한 파일명 ' . $theme_config['slider'] . '를 확인하세요.', 'warning');
        }
    } else {
        //하위 페이지용 서브 헤더.
        include_once(G5_THEME_PATH . '/_sub_head.php');
    }
    ?>

    <!--
    #########################################################################################################
           컨텐츠 시작
    #########################################################################################################
    -->
    <div id="contents_wrapper" class="<?php echo $page_type ?>">
        <div id="container">
            <?php if (_INDEX_ !== true && _INDEX_SUBPAGE_ !== true) { ?>
                <?php
                /**
                 * 좌,우를 나눠서 디자인 할 경우 사용할 수 있습니다.
                 * 일반페이지는 왼쪽메뉴를 직접 입력해야 합니다. 디자인도 변경되니 그에 맞게 수정하여야 합니다.
                 * 게시판,  검색, 1:1문의 FAQ등 자동으로 왼쪽메뉴가 출력됩니다.
                 * 관리자->메뉴설정 에서 http:// 를 입력하지 않고 /bbs/board.php?bo_table=free 와 같이 입력해야 왼쪽메뉴가 자동으로 나옵니다.
                 * 왼쪽 메뉴를 사용하지 않을 페이지는 최상단에 define('_INDEX_SUBPAGE_', true);을 입력해주세요.
                 * 왼쪽 메뉴 사용여부는 theme.config.php $theme_config['use_aside'] = true; 변수를 설정하세요. true면 사용합니다.
                 * asktheme b3는 기본적으로 왼쪽메뉴를 사용하지 않습니다. full width 반응형에 최적화 되어 잇습니다.
                 * 모바일에서는 출력하지 않게 설정
                 */
                ?>
                <div class='container'>
                    <div class='row'>
                        <!--ASIDE -->
                        <div class='aside-wrap col-sm-12 col-md-12 col-lg-2'>
                            <?php
                            //하위메뉴 자동출력 - 작동하지 않을경우 직접 입력.
                            $submenu = Asktheme::get_sub_menu();
                            if ($submenu) {
                                $menu_str = '<div class="sub-menu-wrap"><ul class="right-menu">';
                                $menu_title = "";
                                foreach ($submenu as $menu) {
                                    $active = "";
                                    if (
                                            strstr($menu['me_link'], Asktheme::get_script_name()) ||
                                            strstr(Asktheme::get_script_name(), $menu['me_link'])
                                    ) {
                                        $active = " class='active'";
                                        $menu_title .= $menu['me_name'];
                                        //관리자 메뉴에 Hash를 사용할 경우
                                        if (strstr($menu['me_link'], '#')) {
                                            $menu_title = $g5['title'];
                                        }
                                    }
                                    $menu_str .= "<li {$active}><a href='{$menu['me_link']}'><i class='fa fa-caret-right' aria-hidden='true'></i> {$menu['me_name']}</a></li>" . PHP_EOL;
                                }
                                $menu_str .= '</ul></div>';
                            }
                            ?>
                            <div id="sidebar" class="sidebar">
                                <div class="sidebar__inner">
                                    <?php
                                    echo "<h3>MENU</h3>";
                                    echo $menu_str;
                                    /**
                                     * 하단에 추가 컨텐츠 삽입하세요.
                                     * width 조절은 aside-wrap과 right-contents 의 그리드를 함께 조절해야 합니다. 
                                     * aside-wrap col-sm-12 col-md-3 col-lg-3 로 하였다면
                                     * right-contents col-sm-12 col-md-9 col-lg-9 로 해야합니다. 그리드는 bootstrap4 grid 도움말을 참고하세요.
                                     */
                                    ?>
                                </div>
                            </div>
                            <script type="text/javascript">
                                $(function () {
                                    $('#sidebar').stickySidebar({
                                        topSpacing: 80,
                                        bottomSpacing: 60
                                    });
                                });
                            </script>

                        </div>
                        <!--//ASIDE -->
                        <div class='right-contents col-sm-12 col-md-12 col-lg-10'>
                        <?php } ?>
