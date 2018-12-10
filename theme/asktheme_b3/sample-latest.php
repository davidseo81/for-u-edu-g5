<?php
/**
 * 최신글 샘플 페이지
 */
include_once "./_common.php";
$g5['title'] = "최신글 샘플";
$g5['ask_title_desc'] = 'Latest Samples';
//썸네일 함수, 갤러리 최신글 사용시 포함하세요.
include_once(G5_LIB_PATH . '/thumbnail.lib.php');

include_once(G5_THEME_PATH . '/head.php');
define('_INDEX_SUBPAGE_', true);
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/latest.css">', 1);
?>
컨텐츠
<script type = "text/javascript">
    $(function () {
        var autoHeightTarget = $('.latest-equal-wrap .latest-equal-item');
        $(autoHeightTarget).matchHeight();
    });
</script>
<?php
include_once(G5_THEME_PATH . '/tail.php');
