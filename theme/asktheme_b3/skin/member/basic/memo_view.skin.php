<?php
/*
 * 쪽지보기
 */
if (!defined('_GNUBOARD_')) {
    exit;
} // 개별 페이지 접근 불가
$nick = get_sideview($mb['mb_id'], $mb['mb_nick'], $mb['mb_email'], $mb['mb_homepage']);
if ($kind == "recv") {
    $kind_str = "보낸";
    $kind_date = "받은";
} else {
    $kind_str = "받는";
    $kind_date = "보낸";
}

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/member.css">', 0);
?>
<div class="container">
    <div class="memo-wrap">
        <nav class="navbar fixed-top navbar-light bg-faded">
            <ul class="memo-menu">
                <li><a href="./memo.php?kind=recv">받은쪽지</a></li>
                <li><a href="./memo.php?kind=send">보낸쪽지</a></li>
                <li><a href="./memo_form.php">쪽지쓰기</a></li>
            </ul>
        </nav>
        <!-- 쪽지보기 시작 { -->
        <div id="memo_view" class="new_win mbskin">
            <article id="memo_view_contents">
                <header>
                    <h3 class="sr-only">쪽지 내용</h3>
                </header>
                <ul id="memo_view_ul" class="memo-info">
                    <li class="memo_view_li">
                        <span class="memo_view_subj"><?php echo $kind_str ?>사람</span>
                        <strong><?php echo $nick ?></strong>
                    </li>
                    <li class="memo_view_li">
                        <span class="memo_view_subj"><?php echo $kind_date ?>시간</span>
                        <strong><?php echo $memo['me_send_datetime'] ?></strong>
                    </li>
                </ul>
                <p class="memo-content">
                    <?php echo conv_content($memo['me_memo'], 0) ?>
                </p>
            </article>

            <div class="form-footer">
                <?php if ($prev_link) { ?>
                    <a href="<?php echo $prev_link ?>" class="btn btn-secondary"><i class="fa fa-chevron-left" aria-hidden="true"></i> <span>이전쪽지</span></a>
                <?php } ?>
                <?php if ($next_link) { ?>
                    <a href="<?php echo $next_link ?>" class="btn btn-secondary"><span>다음쪽지</span> <i class="fa fa-chevron-right" aria-hidden="true"></i></a></a>
                <?php } ?>
                    <?php if ($kind == 'recv') { ?><a href="./memo_form.php?me_recv_mb_id=<?php echo $mb['mb_id'] ?>&amp;me_id=<?php echo $memo['me_id'] ?>" class="btn btn-primary"><i class="fa fa-reply" aria-hidden="true"></i> <span>답장</span></a><?php } ?>
                <a href="<?php echo $list_link ?>" class="btn btn-secondary"><i class="fa fa-list" aria-hidden="true"></i> <span>목록</span></a>
                <button type="button" onclick="window.close();" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> <span>창닫기</span></button>
            </div>
        </div>
        <!-- } 쪽지보기 끝 -->
    </div>
</div>
