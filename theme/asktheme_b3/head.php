<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *
 *  * head.php
 * ASKTHEME B3 테마
 * 
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

if (!defined('_GNUBOARD_')) {
    exit;
}

//왼쪽메뉴가 있는 테마사용시 = theme.config.php에서 설정
if ($theme_config['use_aside'] == true) {
    include_once(G5_THEME_PATH . '/head_aside.php');
    return;
}
include_once(G5_THEME_PATH . '/head.sub.php');
include_once(G5_LIB_PATH . '/latest.lib.php');
include_once(G5_LIB_PATH . '/outlogin.lib.php');
include_once(G5_LIB_PATH . '/poll.lib.php');
include_once(G5_LIB_PATH . '/visit.lib.php');
include_once(G5_LIB_PATH . '/connect.lib.php');
include_once(G5_LIB_PATH . '/popular.lib.php');


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
            <?php if (_INDEX_ !== true) { ?>
                <!-- 서브페이지 및 그누보드 페이지용 -->

            <?php } ?>
