<?php
/*
 * 현재접속자
 */
if (!defined('_GNUBOARD_')) {
    exit;
}
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/current_connect.css">', 0);
?>
<div class="content-title-wrap " data-stellar-background-ratio='0.5'>
    <div class='container'>
        <div class='row'>
            <div class='col-sm-12 col-md-6 col-lg-6'>
                <h2><?php echo $g5['title'] ?></h2>
                <p>Connector</p>
            </div>
            <div class='col-sm-12 col-md-6 col-lg-6'>
                <div class="text-right">

                </div>
            </div>
        </div>
    </div>
</div>
<div class="connect-wrap container">
    <!-- 현재접속자 목록 시작 { -->
    <div class="table-wrap">
        <table id="current_connect_tbl" class="table">
            <thead class="thead-default">
                <tr>
                    <th>번호</th>
                    <th>이름</th>
                    <th>위치</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $i < count($list); $i++) {
                    //$location = conv_content($list[$i]['lo_location'], 0);
                    $location = $list[$i]['lo_location'];
                    // 최고관리자에게만 허용
                    // 이 조건문은 가능한 변경하지 마십시오.
                    if ($list[$i]['lo_url'] && $is_admin == 'super') {
                        $display_location = "<a href=\"" . $list[$i]['lo_url'] . "\">" . $location . "</a>";
                    } else {
                        $display_location = $location;
                    }
                    ?>
                    <tr>
                        <td class="td_num"><?php echo $list[$i]['num'] ?></td>
                        <td class="td_name"><?php echo $list[$i]['name'] ?></td>
                        <td><?php echo $display_location ?></td>
                    </tr>
                    <?php
                }
                if ($i == 0)
                    echo "<tr><td colspan=\"3\" class=\"empty_table\">현재 접속자가 없습니다.</td></tr>";
                ?>
            </tbody>
        </table>
    </div>
    <!-- } 현재접속자 목록 끝 -->
</div>
