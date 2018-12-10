<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$content_skin_url.'/style.css">', 0);
?>

	<div id="content">
    <div class="section-header page">
        <h3><?php echo $g5['title']; ?></h3>
    </div>
		<div id="ctt_con">
			<?php echo $str; ?>
    </div>
	</div>