<?php
/**
 * 하위페이지 해더 !!
 */
if (!defined("_GNUBOARD_")) {
    exit;
} // 개별 페이지 접근 불가
$rand_page = rand(1, 4);

//하위메뉴 자동출력 - 작동하지 않을경우 직접 메뉴를 작성하세요.
$submenu = Asktheme::get_sub_menu();
if ($submenu) {
    $menu_str = '<div class="sub-menu-wrap"><ul class="side-left-menu">';
    $menu_title = "";
    foreach ($submenu as $menu) {
        $active = "";
        if (strstr($menu['me_link'], Asktheme::get_script_name())) {
            $active = " class='active'";
            $menu_title = $menu['me_name'];
            //관리자 메뉴에 Hash를 사용할 경우
            if (strstr($menu['me_link'], '#')) {
                $menu_title = $g5['title'];
            }
        }
        $menu_str .= "<li {$active}><a href='{$menu['me_link']}'>{$menu['me_name']}</a></li>";
    }
    $menu_str .= '</ul></div>';
}

if ($menu_title) {
    $page_title = $menu_title;
    if ($bo_table) {
        $page_title = $board['bo_subject'];
    }
} else {
    if ($bo_table) {
        $page_title = $board['bo_subject'];
    } else {
        $page_title = $g5['title'];
    }
}
//내용관리 제목 반영하기
if (isset($co_id) && $co_id != '') {
    $page_title_tmp = explode('|', $g5['title']);
    $page_title = trim($page_title_tmp['0']);
}
?>

<div id="sub-header" class="sub-header-pic <?php echo $theme_config['ask_sub_theme_name'] ?>" style='background-image:url(<?php echo G5_THEME_URL . "/img/sub-header{$rand_page}.jpg?v=1" ?>);' data-stellar-background-ratio=".2">
    <div class="container">
        <h2 id="page-title" class="page-title fadeInDown" style="font-size: 2rem;"><?php echo $page_title; ?></h2>
        <?php
        // echo $menu_str;
        ?>
    </div>
    <?php
    if ($_SERVER['REMOTE_ADDR'] == '211.199.31.233') {
        ?>
        <div class="sub-navi-wrap">
            <div class="container">
                <div class="display-navi">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">홈</a></li>
                            <li class='breadcrumb-item'>
                                <?php if ($bo_table && $wr_id) { ?>
                                    <a href="<?php echo $g5['bbs_url'] . '/board.php?bo_table=' . $bo_table; ?>">
                                    <?php } ?>
                                    <?php echo $page_title ?>
                                    <?php if ($bo_table && $wr_id) { ?>
                                    </a>
                                <?php } ?>
                            </li>
                            <?php
                            if ($bo_table && $wr_id) {
                                $subject_text = explode('>', $g5['title']);
                                $subject_text = cut_str($subject_text[0], 21);
                                echo "<li class='breadcrumb-item'>";
                                echo $subject_text;
                                echo "</li>";
                            }
                            ?>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>
<script type="text/javascript">
    $(function () {
        //PC에서만 시차 스크롤 사용
        var deviceMode = checkMod();
        if (deviceMode == 'desktop') {
            $.stellar({
                horizontalScrolling: false,
                verticalOffset: 40
            });
        }
        /*
         $(window).scroll(function () {
         var targetDiv = $('.sub-header-pic');
         var currentScroll = $(this).scrollTop();
         if (currentScroll >= 1 && currentScroll < 500) {
         $(targetDiv).css('margin-bottom', -(currentScroll / 10));
         } else {
         $(targetDiv).css('margin-bottom', 0);
         }
         });*/
        var mod = checkMod();
        var triggerHeight = 0.19;
        if (mod == 'phone') {
            triggerHeight = .22;
        }
        var tween = TweenMax.to('#page-title', 0.5, {css: {scaleX: .9, scaleY: .9, opacity: .2}, ease: Linear.easeNone});
        var controller_subpage = new ScrollMagic.Controller();
        var pageTitleEffect = new ScrollMagic.Scene({
            triggerElement: '#contents_wrapper', duration: 300, triggerHook: triggerHeight
        }).setTween(tween).addTo(controller_subpage);
        pageTitleEffect.on("start", function () {
            $('#page-title').removeClass('fadeInDown');
        });

    });
</script>