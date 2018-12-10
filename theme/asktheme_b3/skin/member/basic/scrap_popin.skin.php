<?php
/*
 * 스크랩
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
        <!-- 스크랩 시작 { -->
        <div id="scrap_do" class="new_win mbskin">
            <form name="f_scrap_popin" action="./scrap_popin_update.php" method="post">
                <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
                <input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">

                <div class="scrap-table-wrap">
                    <table class="table table-condensed">
                        <tbody>
                            <tr>
                                <th class="co-1">제목</th>
                                <td><?php echo get_text(cut_str($write['wr_subject'], 255)) ?></td>
                            </tr>
                            <tr>
                                <th class="co-1"><label for="wr_content">댓글</label></th>
                                <td><textarea name="wr_content" id="wr_content" class="form-control" rows="5"></textarea></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="alert alert-info alert-sm">
                    스크랩을 하시면서 감사 혹은 격려의 댓글을 남기실 수 있습니다.
                </div>

                <div class="form-footer">
                    <input type="submit" value="스크랩 확인" class="btn_submit btn btn-sm btn-secondary">
                </div>
            </form>
        </div>
        <!-- } 스크랩 끝 -->
    </div>
</div>
