<?php
/**
 * Single Slider Gallery
 * 1장씩만 슬라이드 되는 갤러리입니다.
 */
if (!defined('_GNUBOARD_')) {
    exit;
}
//이미지 크기 설정
$ask_img['width'] = 600;
$ask_img['height'] = 450;
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/latest.css">', 0);
//중복방지용
$uniq_class = $bo_table . md5(rand(0, 1000));
?>
<!-- <?php echo $bo_subject; ?> 최신글 시작 { -->
<div class="single-slider-latest-wrap">
    <div class='latest-title'><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>"><?php echo $bo_subject; ?></a></div>
    <div class="gallery-swiper-container single-slider-<?php echo $uniq_class ?>">
        <div class="swiper-wrapper">
            <?php for ($i = 0; $i < count($list); $i++) { ?>
                <?php
                $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $ask_img['width'], $ask_img['height']);
                if ($thumb == false) {
                    $thumb['src'] = G5_THEME_IMG_URL . "/no-image.png";
                }
                ?>
                <div class="swiper-slide">
                    <div class="img-wrap">
                        <?php
                        echo "<img src='{$thumb['src']}' class='gall-thumb'>";
                        echo "<a href=\"" . $list[$i]['href'] . "\" class='gall-link'>";
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
                    </div>
                </div>
            <?php } ?>
            <?php if (count($list) == 0) { ?>
                <li class="empty-latest-article">게시물이 없습니다.</li>
            <?php } ?>

        </div>
        <!-- Add Pagination -->
        <div class="latest-swiper-pagination swiper-pagination-<?php echo $bo_table ?>"></div>
        <!-- 
        <div class="swiper-button-next-<?php echo $bo_table ?>"></div>
        <div class="swiper-button-prev-<?php echo $bo_table ?>"></div>
        -->
    </div>
</div>
<!-- } <?php echo $bo_subject; ?> 최신글 끝 -->


<!-- Initialize Swiper -->
<script type="text/javascript">
    var swiper = new Swiper('.single-slider-<?php echo $uniq_class ?>', {
        pagination: '.swiper-pagination-<?php echo $uniq_class ?>',
        paginationClickable: true,
        slidesPerView: 1,
        spaceBetween: 10,
        nextButton: '.swiper-button-next-<?php echo $uniq_class ?>',
        prevButton: '.swiper-button-prev-<?php echo $uniq_class ?>',
        speed: 1000,
        loop: true, //반복
        autoplay: {//자동실행
            delay: 2500,
            disableOnInteraction: false
        },
        grabCursor: true,
        breakpoints: {
            1200: {
                slidesPerView: 1,
                spaceBetween: 10
            },
            1024: {
                slidesPerView: 1,
                spaceBetween: 10
            },
            768: {
                slidesPerView: 1,
                spaceBetween: 10
            },
            640: {
                slidesPerView: 1,
                spaceBetween: 10
            },
            320: {
                slidesPerView: 1,
                spaceBetween: 10
            }
        }
    });
</script>
