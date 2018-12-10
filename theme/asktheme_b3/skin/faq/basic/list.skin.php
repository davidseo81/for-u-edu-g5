<?php
/*
 * FAQ 스킨
 */
if (!defined('_GNUBOARD_')) {
    exit;
} // 개별 페이지 접근 불가
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/faq.css">', 0);
?>
<!-- FAQ 시작 { -->
<div class="content-title-wrap " data-stellar-background-ratio='0.5'>
    <div class='container'>
        <div class='row'>
            <div class='col-sm-12 col-md-6 col-lg-6'>
                <h2><?php echo $g5['title'] ?></h2>
                <p>Frequently Asked Questions</p>
            </div>
            <div class='col-sm-12 col-md-6 col-lg-6'>
                <div class="text-right">
                    <span>Total</span>  <?php echo number_format($total_count) ?>건<?php echo $page ?> 페이지
                </div>
            </div>
        </div>
    </div>
</div>
<div class="faq-wrap container">
    <?php
    if ($himg_src) {
        echo '<div id="faq_himg" class="faq_img"><img src="' . $himg_src . '" alt=""></div>';
    }

    // 상단 HTML
    echo '<div id="faq_hhtml">' . conv_content($fm['fm_head_html'], 1) . '</div>';
    ?>
    <?php
    if (count($faq_master_list)) {
        ?>
        <ul class="list-group">
            <?php
            foreach ($faq_master_list as $v) {
                $category_msg = '';
                $category_option = '';
                $active = '';
                if ($v['fm_id'] == $fm_id) { // 현재 선택된 카테고리라면
                    $category_option = ' id="bo_cate_on"';
                    $category_msg = '<span class="sound_only">열린 분류 </span>';
                    $active = 'active';
                }
                ?>
                <li class="list-group-item <?php echo $active ?>"><a href="<?php echo $category_href; ?>?fm_id=<?php echo $v['fm_id']; ?>" <?php echo $category_option; ?> ><?php echo $category_msg . $v['fm_subject']; ?></a></li>
                <?php
            }
            ?>
        </ul>

    <?php } ?>
    <?php
// FAQ 내용
    if (count($faq_list)) {
        ?>
        <hr/>
        <div id="accordion" role="tablist" aria-multiselectable="true">
            <?php
            $i = 0;
            foreach ($faq_list as $key => $v) {
                if (empty($v)) {
                    continue;
                }
                $first_open = 'false';
                $class = "";
                $first_show = "";
                if ($i == 0) {
                    $first_open = 'true';
                    $first_show = "show";
                } else {
                    $class = 'class="collapsed"';
                }
                ?>
                <div class="card">
                    <div class="card-header" role="tab" id="faq_<?php echo $i ?>">
                        <h5 class="mb-0">
                            <a <?php echo $class ?> data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i ?>" aria-expanded="<?php echo $first_open ?>" aria-controls="collapse<?php echo $i ?>">
                                <?php echo conv_content($v['fa_subject'], 1); ?>
                            </a>
                        </h5>
                    </div>
                    <div id="collapse<?php echo $i ?>" class="collapse <?php echo $first_show ?>" role="tabpanel" aria-labelledby="faq_<?php echo $i ?>">
                        <div class="card-body">
                            <?php echo conv_content($v['fa_content'], 1); ?>
                        </div>
                    </div>
                </div>
                <?php
                $i++;
            }
            ?>
        </div>

        <?php
    } else {
        if ($stx) {
            ?>
            <div class="alert alert-info alert-sm" role="alert">
                <h4 class="alert-heading">Notice</h4>
                <p>검색된 결과물이 없습니다.</p>
            </div>
        <?php } else { ?>
            <div class="alert alert-info alert-sm" role="alert">
                <h4 class="alert-heading">Notice</h4>
                <p>등록된 FAQ가 없습니다.</p>
                <?php
                if ($is_admin) {
                    echo '<p class="mb-0">FAQ를 새로 등록하시려면 <a href="' . G5_ADMIN_URL . '/faqmasterlist.php">FAQ관리</a> 메뉴를 이용하십시오.</p>';
                }
                ?>
            </div>
            <?php
        }
    }
    ?>


    <div class="paging-wrap">
        <?php
        echo $_ASKTHEME->get_paging($page, $total_page, $_SERVER['SCRIPT_NAME'] . '?' . $qstr . '&amp;page=');
        ?>
    </div>
    <?php
    // 하단 HTML
    echo '<div id="faq_thtml">' . conv_content($fm['fm_tail_html'], 1) . '</div>';

    if ($timg_src) {
        echo '<div id="faq_timg" class="faq_img"><img src="' . $timg_src . '" alt=""></div>';
    }
    ?>

    <div id="faq_sch" class="search-wrap">
        <legend class="sr-only">FAQ 검색</legend>
        <form name="faq_search_form" method="get">
            <input type="hidden" name="fm_id" value="<?php echo $fm_id; ?>">
            <div class="input-group">
                <input type="text" name="stx" value="<?php echo $stx; ?>" required id="stx" class="form-control required" size="15" maxlength="15">
                <span class="input-group-btn">
                    <button class="btn btn-secondary" type="submit">검색</button>
                </span>
            </div>
        </form>
    </div>
    <!-- } FAQ 끝 -->

    <?php
    if ($admin_href) {
        echo '<div class="faq_admin"><a href="' . $admin_href . '" class="btn btn-primary btn-sm"><i class="fa fa-cog" aria-hidden="true"></i> FAQ 수정</a></div>';
    }
    ?>

    <script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>
</div>
