<?php
/*
 * 스크랩목록
 */
if (!defined('_GNUBOARD_')) {
    exit;
} // 개별 페이지 접근 불가
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/member.css">', 0);
?>
<div class="container">
    <div class="scrap-wrap">
        <nav class="navbar fixed-top navbar-light bg-faded">
            <h3 class="page-title"><?php echo $g5['title'] ?></h3>
        </nav>
        <!-- 스크랩 목록 시작 { -->
        <div id="scrap" class="new_win mbskin">
            <div class="scrap-table-wrap">
                <table class="table table-hover">
                    <thead class="thead-default">
                        <tr>
                            <th class="co-1">번호</th>
                            <th>제목</th>
                            <th>삭제</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < count($list); $i++) { ?>
                            <tr>
                                <td class="co-1 td_num"><?php echo $list[$i]['num'] ?></td>
                                <td>
                                    <span class="board">[<a href="<?php echo $list[$i]['opener_href'] ?>" target="_blank" onclick="opener.document.location.href = '<?php echo $list[$i]['opener_href'] ?>'; return false;"><?php echo $list[$i]['bo_subject'] ?></a>]</span>
                                    <a href="<?php echo $list[$i]['opener_href_wr_id'] ?>" target="_blank" onclick="opener.document.location.href = '<?php echo $list[$i]['opener_href_wr_id'] ?>';
                                            return false;"><?php echo $list[$i]['subject'] ?></a>
                                    <br/>
                                    <span class="date"><?php echo $list[$i]['ms_datetime'] ?></span>
                                </td>
                                <td class="td_mng"><a href="<?php echo $list[$i]['del_href']; ?>" onclick="del(this.href); return false;" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                            </tr>
                        <?php } ?>

                        <?php if ($i == 0) echo "<tr><td colspan=\"5\" class=\"empty_table\">자료가 없습니다.</td></tr>"; ?>
                    </tbody>
                </table>
            </div>

            <?php echo $_ASKTHEME->get_paging($page, $total_page, "?$qstr&amp;page="); ?>

            <div class="form-footer">
                <button type="button" onclick="window.close();" class="btn btn-sm btn-danger">창닫기</button>
            </div>
        </div>
        <!-- } 스크랩 목록 끝 -->
    </div>
</div>
