<?php
/*
 * 아웃로그인 
 */
if (!defined("_GNUBOARD_")) {
    exit;
}
add_stylesheet('<link rel="stylesheet" href="' . $outlogin_skin_url . '/ask_style.css">', 0);
?>
<div class="outlogin-wrap after-login">

    <!-- 로그인 후 아웃로그인 시작 { -->
    <section id="ol_after" class="ol">
        <header id="ol_after_hd">
            <h2 class="sr-only">나의 회원정보</h2>
            <strong><?php echo $nick ?>님</strong>
            <?php if ($is_admin == 'super' || $is_auth) { ?><a href="<?php echo G5_ADMIN_URL ?>" class="btn_admin btn bt-default"><i class="fa fa-cog" aria-hidden="true"></i></a><?php } ?>
        </header>
        <div id="ol_after_private" class="row no-gutters">
            <div class="col-4">
                <a href="<?php echo G5_BBS_URL ?>/memo.php" target="_blank" id="ol_after_memo" class="win_memo">
                    <span class="sound_only">안 읽은 </span>
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    <?php if ($memo_not_read > 0) { ?>
                        <span><?php echo $memo_not_read ?></span>
                    <?php } ?>
                    <div class="menu-name">쪽지</div>
                </a>
            </div>
            <div class="col-4">
                <a href="<?php echo G5_BBS_URL ?>/point.php" target="_blank" id="ol_after_pt" class="win_point">
                    <i class="fa fa-money" aria-hidden="true"></i>
                    <div class="menu-name"><span><?php echo $point ?></span></div>
                </a>
            </div>
            <div class="col-4">
                <a href="<?php echo G5_BBS_URL ?>/scrap.php" target="_blank" id="ol_after_scrap" class="win_scrap">
                    <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                    <div class="menu-name">스크랩</div>
                </a>
            </div>
        </div>
    </section>
    <footer id="ol_after_ft" class="login-menu row no-gutters">
        <div class="col-4">
            <a href="<?php echo G5_BBS_URL ?>/new.php?mb_id=<?php echo $member['mb_id'] ?>">내최신글</a>
        </div>
        <div class="col-4">
            <a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=register_form.php" id="ol_after_info">정보수정</a>
        </div>
        <div class="col-4">
            <a href="<?php echo G5_BBS_URL ?>/logout.php" id="ol_after_logout">로그아웃</a>
        </div>
    </footer>

    <script type="text/javascript">
        // 탈퇴의 경우 아래 코드를 연동하시면 됩니다.
        function member_leave() {
            if (confirm("정말 회원에서 탈퇴 하시겠습니까?"))
                location.href = "<?php echo G5_BBS_URL ?>/member_confirm.php?url=member_leave.php";
        }
    </script>
    <!-- } 로그인 후 아웃로그인 끝 -->
</div>
