<?php
/*
 * 기본 최신글 - 타이틀 없음
 */
if (!defined('_GNUBOARD_')) {
    exit;
} // 개별 페이지 접근 불가
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="' . $latest_skin_url . '/ask_style.css">', 0);
?>
<!-- <?php echo $bo_subject; ?> 최신글 시작 { -->
<div class="latest-wrap basic-main">
    <strong class="sr-only"><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>"><?php echo $bo_subject; ?></a></strong>
    <ul class="board-latest sl-contents">
        <?php for ($i = 0; $i < count($list); $i++) { ?>
            <li>
                <?php
                //echo $list[$i]['icon_reply']." ";
                echo "<a href=\"" . $list[$i]['href'] . "\">";
                echo $list[$i]['subject'];

                echo "</a>";
                ?>
            </li>
        <?php } ?>
        <?php if (count($list) == 0) { ?>
            <li class="empty-latest-article">게시물이 없습니다.</li>
            <?php } ?>
    </ul>
</div>
<!-- } <?php echo $bo_subject; ?> 최신글 끝 -->
