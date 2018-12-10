<?php
if (!defined('_GNUBOARD_')) {
    exit;
}
$connect_now = connect('theme/basic');
?>
<!-- #########################################################################################################
        Mobile Member Menu 
############################################################################################################## -->
<!-- js-offcanvas mobile-member-menu c-offcanvas is-closed c-offcanvas--right c-offcanvas--push -->
<div class="js-offcanvas mobile-member-menu c-offcanvas is-closed" id="off-canvas-right-push"  data-offcanvas-options='{"modifiers":"right,push"}' role="complementary">
    <a href="#sidemenu" name="sidemenu" class="sr-only">sidemenu</a>
    <a href="#close-mobile-menu" class="close-mobile-menu d-none"><i class="fa fa-window-close" aria-hidden="true"></i></a>
    <h3 class="mobile-menu-title"><i class="fa fa-user" aria-hidden="true"></i> Member</h3>
    <ul class="basic-top-menu">
        <li>
            <a href="<?php echo G5_URL ?>"><i class="fa fa-home" aria-hidden="true"></i> HOME</a>
        </li>
        <?php if ($is_member) { ?>
            <?php if ($is_admin || auth_idcheck() == true) { ?>
                <li><a href="<?php echo G5_ADMIN_URL ?>"><i class="fa fa-cog" aria-hidden="true"></i> <span>관리자</span></a></li>
            <?php } ?>
            <li>
                <a href="<?php echo G5_BBS_URL ?>/memo.php" target="_blank" id="ol_after_memo" class="win_memo">
                    <span class="sound_only">안 읽은 </span> <i class="fa fa-envelope-o" aria-hidden="true"></i> <span>쪽지</span>
                    <?php if ($_ASKTHEME->get_notread_memo($member['mb_id'])) { ?>
                        <span class="badge badge-primary badge-pill"><?php echo $_ASKTHEME->get_notread_memo($member['mb_id']); ?></span>
                    <?php } ?>
                </a>
            </li>
            <li>
                <a href="<?php echo G5_BBS_URL ?>/point.php" target="_blank" id="ol_after_pt" class="win_point">
                    <i class="fa fa-money" aria-hidden="true"></i> <span>포인트</span>
                    <?php echo $_ASKTHEME->get_member_point(); ?>
                </a>
            </li>
            <li>
                <a href="<?php echo G5_BBS_URL ?>/scrap.php" target="_blank" id="ol_after_scrap" class="win_scrap"><i class="fa fa-bookmark-o" aria-hidden="true"></i> <span>스크랩</span></a>
            </li>
            <li><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php"> <i class="fa fa-user-circle-o" aria-hidden="true"></i> <span>정보</span>수정</a></li>
            <li><a href="<?php echo G5_BBS_URL ?>/logout.php"><i class="fa fa-lock" aria-hidden="true"></i> 로그아웃</a></li>
        <?php } else { ?>
            <li><a href="<?php echo G5_BBS_URL ?>/register.php"><i class="fa fa-user-plus" aria-hidden="true"></i> <span>회원</span>가입</a></li>
            <li><a href="<?php echo G5_BBS_URL ?>/login.php"><i class="fa fa-unlock-alt" aria-hidden="true"></i>  로그인</a></li>
        <?php } ?>
        <li><a href="<?php echo G5_BBS_URL ?>/faq.php"><i class="fa fa-question-circle-o" aria-hidden="true"></i> <span>FAQ</span></a></li>
        <li><a href="<?php echo G5_BBS_URL ?>/qalist.php"><i class="fa fa-question" aria-hidden="true"></i> <span>1:1문의</span></a></li>

        <li><a href="<?php echo G5_BBS_URL ?>/current_connect.php"><i class="fa fa-plug" aria-hidden="true"></i> 접속자  <?php echo $connect_now; ?></a></li>

        <li><a href="<?php echo G5_BBS_URL ?>/new.php"><i class="fa fa-newspaper-o" aria-hidden="true"></i> 새글</a></li>

    </ul>
</div>