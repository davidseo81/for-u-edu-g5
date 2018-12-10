<?php
/*
 * 쪽지목록
 */
if (!defined('_GNUBOARD_')) {
    exit;
} // 개별 페이지 접근 불가
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/member.css">', 0);
//배열 페이징
/*
if (G5_IS_MOBILE) {
    $rows = $config['cf_mobile_pages'];
} else {
    $rows = $config['cf_write_pages'];
}
if ($page < 1) {
    $page = 1;
} // 페이지가 없으면 첫 페이지 (1 페이지)
$total_page = ceil(count($list) / $rows);  // 전체 페이지 계산
$from_record = ($page - 1) * $rows; // 시작 열을 구함
$write_pages = $_ASKTHEME->get_paging($page, $total_page, './memo.php?kind=' . $kind . $qstr . '&amp;page=');
$list = array_slice($list, $from_record, $rows);
 * 
 */
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

        <!-- 쪽지 목록 시작 { -->
        <div id="memo_list" class="new_win mbskin">
            <div class="memo-table-wrap">
                <table class="table table-hover">
                    <caption>
                        전체 <?php echo $kind_title ?>쪽지 <?php echo $total_count ?>통<br>
                    </caption>
                    <thead class="thead-default">
                        <tr>
                            <th><?php echo ($kind == "recv") ? "보낸사람" : "받는사람"; ?></th>
                            <th>보낸시간</th>
                            <th>읽은시간</th>
                            <th>관리</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php for ($i = 0; $i < count($list); $i++) { ?>
                            <tr>
                                <td><?php echo $list[$i]['name'] ?></td>
                                <td class="td_datetime"><a href="<?php echo $list[$i]['view_href'] ?>"><?php echo $list[$i]['send_datetime'] ?></a></td>
                                <td class="td_datetime"><a href="<?php echo $list[$i]['view_href'] ?>"><?php echo $list[$i]['read_datetime'] ?></a></td>
                                <td class="td_mng"><a href="<?php echo $list[$i]['del_href'] ?>" onclick="del(this.href); return false;" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                            </tr>
                        <?php } ?>
                        <?php
                        if ($i == 0) {
                            echo '<tr><td colspan="4" class="empty_table">자료가 없습니다.</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="paging-wrap">
                <?php echo $_ASKTHEME->get_paging($page, $total_page, $_SERVER['SCRIPT_NAME'] . '?' . $qstr . '&amp;page='); ?>
            </div>
            <div class="alert alert-info alert-sm">
                쪽지 보관일수는 최장 <strong><?php echo $config['cf_memo_del'] ?></strong>일 입니다.
            </div>

            <div class="form-footer">
                <button type="button" onclick="window.close();" class="btn btn-sm btn-danger">창닫기</button>
            </div>
        </div>
        <!-- } 쪽지 목록 끝 -->
    </div>
</div>
