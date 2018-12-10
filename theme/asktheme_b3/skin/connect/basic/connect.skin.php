<?php

if (!defined('_GNUBOARD_')) {
    exit;
} 
// 회원수는 $row['mb_cnt'];
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/current_connect.css">', 0);
?>
<span class="badge badge-secondary">
    <?php echo $row['total_cnt'];?>
</span>
