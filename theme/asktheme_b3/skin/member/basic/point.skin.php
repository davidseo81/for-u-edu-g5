<?php
/*
 * 포인트내역
 */
if (!defined('_GNUBOARD_')) {
    exit;
} // 개별 페이지 접근 불가
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/member.css">', 0);
?>
<div class="container">
    <div class="point-wrap">
        <nav class="navbar fixed-top navbar-light bg-faded">
            <h3 class="page-title"><?php echo $g5['title'] ?></h3>
        </nav>
        <div id="point" class="new_win point-table-wrap">
            <table class="table table-hover">
                <thead class="thead-default">
                    <tr>
                        <th>일시</th>
                        <th>내용</th>
                        <th>만료</th>
                        <th>지급</th>
                        <th>사용</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sum_point1 = $sum_point2 = $sum_point3 = 0;

                    $sql = " select *
                    {$sql_common}
                    {$sql_order}
                    limit {$from_record}, {$rows} ";
                    $result = sql_query($sql);
                    for ($i = 0; $row = sql_fetch_array($result); $i++) {
                        $point1 = $point2 = 0;
                        if ($row['po_point'] > 0) {
                            $point1 = '+' . number_format($row['po_point']);
                            $sum_point1 += $row['po_point'];
                        } else {
                            $point2 = number_format($row['po_point']);
                            $sum_point2 += $row['po_point'];
                        }

                        $po_content = $row['po_content'];

                        $expr = '';
                        if ($row['po_expired'] == 1) {
                            $expr = ' txt_expired';
                        }
                        ?>
                        <tr>
                            <td class="td_datetime">
                                <?php echo substr($row['po_datetime'], 2, 17); ?>
                            </td>
                            <td><?php echo $po_content; ?></td>
                            <td class="td_date<?php echo $expr; ?>">
                                <?php if ($row['po_expired'] == 1) { ?>
                                    만료<?php echo substr(str_replace('-', '', $row['po_expire_date']), 2); ?>
                                    <?php
                                } else {
                                    echo $row['po_expire_date'] == '9999-12-31' ? '&nbsp;' : $row['po_expire_date'];
                                }
                                ?>
                            </td>
                            <td class="td_numbig"><?php echo $point1; ?></td>
                            <td class="td_numbig"><?php echo $point2; ?></td>
                        </tr>
                        <?php
                    }

                    if ($i == 0) {
                        echo '<tr><td colspan="5" class="empty_table">자료가 없습니다.</td></tr>';
                    } else {
                        if ($sum_point1 > 0) {
                            $sum_point1 = "+" . number_format($sum_point1);
                        }
                        $sum_point2 = number_format($sum_point2);
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th scope="row" colspan="3">소계</th>
                        <td><?php echo $sum_point1; ?></td>
                        <td><?php echo $sum_point2; ?></td>
                    </tr>
                    <tr>
                        <th scope="row" colspan="3">보유포인트</th>
                        <td colspan="2"><?php echo number_format($member['mb_point']); ?></td>
                    </tr>
                </tfoot>
            </table>

            <?php echo $_ASKTHEME->get_paging($page, $total_page, $_SERVER['SCRIPT_NAME'] . '?' . $qstr . '&amp;page='); ?>

            <div class="form-footer">
                <button type="button" onclick="javascript:window.close();" class="btn btn-sm btn-danger">창닫기</button>
            </div>
        </div>
    </div>
</div>
