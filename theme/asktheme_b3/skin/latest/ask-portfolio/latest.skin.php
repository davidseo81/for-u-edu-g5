<?php
/*
 * 포트폴리오 최신글
 */
if (!defined('_GNUBOARD_')) {
    exit;
}
//이미지 크기 설정
$ask_img['width'] = 600;
$ask_img['height'] = 450;
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/latest-portfolio.css">', 1);
?>

<div class="latest-portfolio-wrap">
    <div class="portfolio-grid row no-gutters">
        <?php for ($i = 0; $i < count($list); $i++) { ?>
            <?php
            $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $ask_img['width'], $ask_img['height']);
            if ($thumb == false) {
                $thumb['src'] = G5_THEME_IMG_URL . "/no-image.png";
            }
            ?>

            <div class='col-6 col-sm-6 col-md-6 col-lg-4'>
                <div class='portfolio-image-wrap'>
                    <a href='<?php echo $list[$i]['href'] ?>' class='pf-link justify-content-between'>
                        <img src="<?php echo $thumb['src'] ?>" class="portfolio-thumb">
                    </a>
                    <div class='pf-mask'>
                        <?php
                        //echo $list[$i]['icon_reply']." ";
                        echo "<h3 class='pf-subject'><a href='{$list[$i]['href']}' class='portfolio-link justify-content-between'>";
                        echo $list[$i]['subject'];
                        echo "</a></h3>";
                        ?>
                        <p class='pf-date'>
                            <?php echo $list[$i]['datetime'] ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if (count($list) == 0) { ?>
            <div class="empty-latest-article">게시물이 없습니다.</div>
        <?php } ?>
    </div>
</div>
