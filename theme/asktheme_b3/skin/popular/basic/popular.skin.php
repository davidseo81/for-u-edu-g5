<?php
if (!defined("_GNUBOARD_")) {
    exit;
}
add_stylesheet('<link rel="stylesheet" href="' . $popular_skin_url . '/ask_style.css">', 0);
?>

<!-- 인기검색어 시작 { -->
<section id="popular">
    <div>
        <h2 class="sr-only">인기검색어</h2>
        <ul>
            <?php
            if (isset($list) && is_array($list)) {
                for ($i = 0; $i < count($list); $i++) {
                    ?>
                    <li><a href="<?php echo G5_BBS_URL ?>/search.php?sfl=wr_subject&amp;sop=and&amp;stx=<?php echo urlencode($list[$i]['pp_word']) ?>"><?php echo get_text($list[$i]['pp_word']); ?></a></li>
                    <?php
                }   //end for
            }   //end if
            ?>
        </ul>
    </div>
</section>
<!-- } 인기검색어 끝 -->
