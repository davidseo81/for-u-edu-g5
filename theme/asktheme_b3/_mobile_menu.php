<?php
/**
 * 모바일 메뉴
 */
if (!defined('_GNUBOARD_')) {
    exit;
} // 개별 페이지 접근 불가
?>

<!-- 
#########################################################################################################
# Mobile Menu 
#########################################################################################################
슬라이더 설정
class = js-offcanvas
id = off-canvas-left-push
data-offcanvas-options='{"modifiers":"left,push"}'
role = complementary
-->
<div class="basic-menu-wrap js-offcanvas" data-offcanvas-options='{"modifiers":"left,push"}' id="off-canvas-left-push" role="complementary">
    <a href="#sidemenu" name="sidemenu" class="sr-only">sidemenu</a>
    <div class="js-offcanvas-left mobile-side-menu">
        <h3 class="mobile-menu-title"><i class="fa fa-bars" aria-hidden="true"></i> MENU</h3>
        <a href="#close-mobile-menu" class="close-mobile-menu d-none"><i class="fa fa-window-close" aria-hidden="true"></i></a>
        <div class="mobile-search-form navi-child site-search">
            <!-- 모바일 검색 -->
            <legend class="sr-only">사이트 내 전체검색</legend>
            <form name="fsearchbox" method="get" action="<?php echo G5_BBS_URL ?>/search.php" onsubmit="return fsearchbox_submit(this);">
                <div class="input-group justify-content-center">
                    <input type="hidden" name="sfl" value="wr_subject||wr_content">
                    <input type="hidden" name="sop" value="and">
                    <label for="sch_stx_mobile" class="sr-only">검색어<strong class="sr-only"> 필수</strong></label>
                    <input type="text" name="stx" id="sch_stx_mobile" class="mobile-search-field" maxlength="20" placeholder="검색어 입력">
                    <div class='input-group-btn'>
                        <button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <nav id="moile-side-menu" class="mobile-menu">
            <ul class="main-menu home-nav">
                <?php
                $sql = " select * from {$g5['menu_table']} where me_use = '1' and length(me_code) = '2' order by me_order, me_id ";
                $result = sql_query($sql, false);
                $gnb_zindex = 999; // gnb_1dli z-index 값 설정용

                for ($i = 0; $row = sql_fetch_array($result); $i++) {
                    ?>
                    <li class="nav-parent">
                        <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" class="parent_menu nav-links">
                            <span><?php echo $row['me_name'] ?></span>
                        </a>
                        <?php
                        $sql2 = " select * from {$g5['menu_table']} where me_use = '1' and length(me_code) = '4' and substring(me_code, 1, 2) = '{$row['me_code']}' order by me_order, me_id ";
                        $result2 = sql_query($sql2);

                        for ($k = 0; $row2 = sql_fetch_array($result2); $k++) {
                            if ($k == 0) {
                                echo '<ul class="sub-menu navi-child">' . PHP_EOL;
                            }
                            ?>
                        <li class='sub-list'><a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>"><?php echo $row2['me_name'] ?></a></li>
                        <?php
                    }

                    if ($k > 0) {
                        echo '</ul>' . PHP_EOL;
                    }
                    ?>
                    </li>
                    <?php
                }

                if ($i == 0) {
                    ?>
                    <li class='nav-parent'><?php if ($is_admin) { ?><a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php" class="parent_menu nav-links">관리자모드 &gt; 환경설정 &gt; 메뉴설정에서 설정하실 수 있습니다.</a><?php } ?></li>
                <?php } ?>
            </ul>
        </nav>
        <button class="close-button" id="close-button">Close Menu</button>
    </div>
</div>