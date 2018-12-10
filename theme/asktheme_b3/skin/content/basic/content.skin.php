<?php
if (!defined('_GNUBOARD_')) {
    exit;
}
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/content.css">', 0);
?>
<div class="container">
    <div class="content-wrap">
        <div class="content-title">
            <h2><?php echo $g5['title']; ?></h2>
        </div>
        <article id="ctt" class="ctt_<?php echo $co_id; ?>">
            <div id="ctt_con">
                <?php echo $str; ?>
            </div>

        </article>
    </div>
</div>
