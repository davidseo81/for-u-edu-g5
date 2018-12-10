<?php
global $_ASKTHEME;
/*
 * 포트폴리오 Shuffle2 최신글
 */
if (!defined('_GNUBOARD_')) {
    exit;
}
//이미지 크기 설정
$ask_img['width'] = 640;
$ask_img['height'] = 360;
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/latest-portfolio-shuffle2.css">', 100);
add_javascript('<script src="' . G5_THEME_URL . '/plugin/shuffle/shuffle.min.js"></script>', 100);

$custom_class = cut_str(md5($bo_subject), 9, '') . rand(1000, 9999);
?>
<div class="category-list-items2" data-toggle="buttons">
    <label class="btn btn-outline-primary active">
        <input type="radio" name="shuffle-filter<?php echo $custom_class ?>" value="all" checked="checked" class="sr-only"/>전체
    </label>
    <?php
    $categorys = $_ASKTHEME->get_category($bo_table);
    foreach ($categorys as $cate_item) {
        ?>
        <label class="btn btn-outline-primary">
            <input type="radio" name="shuffle-filter<?php echo $custom_class ?>" value="<?php echo $cate_item ?>" class="sr-only"/><?php echo $cate_item ?>
        </label>
    <?php } ?>
</div>
<div class="latest-portfolio-shuffle-wrap2 <?php echo $custom_class ?>">
    <div class="row no-gutters ask-shuffle ask-shuffle<?php echo $custom_class ?> ">
        <?php for ($i = 0; $i < count($list); $i++) { ?>
            <?php
            $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $ask_img['width'], $ask_img['height']);
            if ($thumb == false) {
                $thumb['src'] = G5_THEME_IMG_URL . "/no-image.png";
            }
            ?>
            <div class='col-6 col-sm-12 col-md-6 col-lg-4 image-item<?php echo $bo_table ?> my-sizer-element<?php echo $bo_table ?>' data-groups='["<?php echo $list[$i]['ca_name']; ?>"]'>
                <div class='aspect aspect--16x9 img-mask-wrap'>
                    <div class="aspect__inner">
                        <img src="<?php echo $thumb['src'] ?>" class="portfolio-thumb">
                        <a href='<?php echo $list[$i]['href'] ?>' class="ss-subject sr-only">
                            <?php echo $list[$i]['subject'] ?>
                        </a>
                        <div class="hover-mask">
                            <div class="d-block link-icon">
                                <a href='<?php echo $list[$i]['href'] ?>' class="mask-link d-inline-block">
                                    <i class="fa fa-link fa-2x round-icon-bg bg-secondary"></i>
                                </a>
                                <h2 class="d-block">
                                    <a href='<?php echo $list[$i]['href'] ?>' class="mask-subject">
                                        <?php echo $list[$i]['subject'] ?>
                                    </a>
                                </h2>
                                <p>
                                    <?php echo $list[$i]['datetime'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if (count($list) == 0) { ?>
            <div class="empty-latest-article">게시물이 없습니다.</div>
        <?php } ?>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        var Shuffle = window.Shuffle;

        var myShuffle = new Shuffle(document.querySelector('.ask-shuffle<?php echo $custom_class ?>'), {
            itemSelector: '.image-item<?php echo $bo_table ?>',
            sizer: '.my-sizer-element<?php echo $bo_table ?>',
            buffer: 1
        });

        window.jQuery('input[name="shuffle-filter<?php echo $custom_class ?>"]').on('change', function (evt) {
            var input = evt.currentTarget;
            if (input.checked) {
                //console.log(input.value);
                myShuffle.filter(input.value);
            }
        });
    });
</script>