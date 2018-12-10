<?php
/*
 * 웹진형 최신글
 */
if (!defined('_GNUBOARD_')) {
    exit;
}
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/latest.css">', 0);
//이미지 크기 설정
$ask_img['width'] = 400;
$ask_img['height'] = 300;
//모바일 PC 구분해서 내용 길이 설정
$latest_len = 99; //PC
if (is_mobile()) {
    $latest_len = 33; //Mobile
}
?>

<!-- <?php echo $bo_subject; ?> 최신글 시작 { -->
<div class="latest-webzine-wrap">
    <div class='latest-title'><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>"><?php echo $bo_subject; ?></a></div>
    <div class='row webzine-contents'>
        <?php for ($i = 0; $i < count($list); $i++) { ?>
            <?php
            $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $ask_img['width'], $ask_img['height']);
            if ($thumb == false) {
                $thumb['src'] = G5_THEME_IMG_URL . "/no-image.png";
            }
            ?>
            <div class="col-sm-12">
                <div class='row no-gutters'>
                    <div class='thumbnails col-4 col-lg-3'>
                        <img src="<?php echo $thumb['src'] ?>" class="thumb">
                    </div>
                    <div class='col-8 col-lg-9 position-relative'>
                        <div class="media-body">
                            <?php
                            //echo $list[$i]['icon_reply']." ";
                            echo "<a href=\"" . $list[$i]['href'] . "\" class='subject'>";
                            if ($list[$i]['is_notice']) {
                                echo "<strong>" . $list[$i]['subject'] . "</strong>";
                            } else {
                                echo $list[$i]['subject'];
                            }

                            if ($list[$i]['comment_cnt']) {
                                echo $list[$i]['comment_cnt'];
                            }

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
                            echo "</a>";
                            ?>
                            <p>
                                <?php echo cut_str(strip_tags($list[$i]['content']), $latest_len); ?>
                            </p>
                            <div class='writer-info'>
                                <div class='badge badge-light sr-only'><?php echo $list[$i]['name'] ?></div>
                                <div class='badge badge-light date'><?php echo $list[$i]['datetime'] ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }//for ?>
        <?php if (count($list) == 0) { ?>
            <div class="empty-latest-article">게시물이 없습니다.</div>
        <?php } ?>
    </div>

</div>
<!-- } <?php echo $bo_subject; ?> 최신글 끝 -->
