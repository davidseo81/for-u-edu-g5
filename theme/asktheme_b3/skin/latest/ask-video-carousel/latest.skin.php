<?php
/*
 * ASKTHEME 기본 최신글
 */
if (!defined('_GNUBOARD_')) {
    exit;
}
add_javascript('<script src="' . G5_THEME_URL . '/plugin/owlcarousel/owl.carousel.min.js"></script>', 1);

add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/latest.css">', 10);
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_URL . '/plugin/owlcarousel/assets/owl.carousel.min.css">', 10);
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_URL . '/plugin/owlcarousel/assets/owl.theme.default.min.css">', 10);
$custom_class = cut_str(md5($bo_subject), 9, '');
?>
<div class="latest-video-carousel-wrap">
    <div class='owl-carousel owl-theme <?php echo "video-class-{$custom_class}"; ?>'>
        <?php for ($i = 0; $i < count($list); $i++) { ?>
            <div class="item-video" data-merge="<?php echo $i ?>">
                <a class="owl-video" href="<?php echo $list[$i]['wr_link1'] ?>"></a>
            </div>
        <?php } ?>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        $('.<?php echo "video-class-{$custom_class}"; ?>').owlCarousel({
            items: 1,
            merge: false,
            loop: true,
            margin: 10,
            video: true,
            videoWidth: false,
            videoHeight: false,
            center: true,
            responsive: {
                480: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1024: {
                    items: 3
                }

            }
        });
    });
</script>