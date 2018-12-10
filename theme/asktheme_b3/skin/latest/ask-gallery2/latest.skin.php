<?php
/*
 * 갤러리 최신글
 */
if (!defined('_GNUBOARD_')) {
    exit;
}
//이미지 크기 설정
$ask_img['width'] = 400;
$ask_img['height'] = 300;
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/latest.css">', 0);
?>

<div class="latest-gallery-wrap">
    <div class='latest-title'><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>"><?php echo $bo_subject; ?></a></div>
    <div class="gallery-grid row">
        <?php for ($i = 0; $i < count($list); $i++) { ?>
            <?php 
            $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $ask_img['width'], $ask_img['height']);
            if($thumb == false){
                 $thumb['src'] = G5_THEME_IMG_URL . "/no-image.png";
            }
            ?>

            <div class='col-6 col-sm-6 col-md-4 col-lg-4'>
                <div class='gallery-image'>
                    <img src="<?php echo $thumb['src'] ?>" class="gall-thumb">
                    <?php
                    //echo $list[$i]['icon_reply']." ";
                    echo "<a href=\"" . $list[$i]['href'] . "\" class='gallery-link justify-content-between'>";


                    // if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
                    // if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }

                    if (isset($list[$i]['icon_new'])) {
                        echo " " . $list[$i]['icon_new'];
                    }
                    if (isset($list[$i]['icon_hot'])) {
                        echo " " . $list[$i]['icon_hot'];
                    }
                    if (isset($list[$i]['icon_file'])) {
                        echo " " . $list[$i]['icon_file'];
                    }
                    if (isset($list[$i]['icon_link'])) {
                        echo " " . $list[$i]['icon_link'];
                    }
                    if (isset($list[$i]['icon_secret'])) {
                        echo " " . $list[$i]['icon_secret'];
                    }
                    if ($list[$i]['is_notice']) {
                        echo "<strong>" . $list[$i]['subject'] . "</strong>";
                    } else {
                        echo $list[$i]['subject'];
                    }
                    if ($list[$i]['comment_cnt']) {
                        echo "<span class='comment-count'>" . $list[$i]['comment_cnt'] . "</span>";
                    }
                    echo "</a>";
                    ?>
                    <div class='gallery-date'>
                        <?php echo $list[$i]['datetime'] ?>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if (count($list) == 0) { ?>
            <div class="empty-latest-article">게시물이 없습니다.</div>
        <?php } ?>
    </div>
</div>
