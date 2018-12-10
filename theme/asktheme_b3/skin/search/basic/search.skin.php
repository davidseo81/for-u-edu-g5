<?php
/*
 * 검색
 */

if (!defined("_GNUBOARD_")) {
    exit;
}

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/search.css">', 0);
?>
<div class="content-title-wrap " data-stellar-background-ratio='0.5'>
    <div class='container'>
        <div class='row'>
            <div class='col-sm-12 col-md-6 col-lg-6'>
                <h2><?php echo $g5['title'] ?></h2>
            </div>
            <div class='col-sm-12 col-md-6 col-lg-6'>
                <div class="text-right">
                    <?php if($page && $total_page > 0) { ?>
                    <?php echo number_format($page) ?>/<?php echo number_format($total_page) ?> 페이지 열람 중
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="search-list-wrap container">
    <!-- 전체검색 시작 { -->
    <div class="search-board-wrap">
        <form name="fsearch" onsubmit="return fsearch_submit(this);" method="get">
            <input type="hidden" name="srows" value="<?php echo $srows ?>">
            <fieldset id="sch_res_detail">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <legend class="sr-only">상세검색</legend>
                        <?php echo $group_select ?>
                        <script type="text/javascript">document.getElementById("gr_id").value = "<?php echo $gr_id ?>";</script>
                    </div>
                    <div class="input-group-prepend">
                        <label for="sfl" class="sr-only">검색조건</label>
                        <select name="sfl" id="sfl">
                            <option value="wr_subject||wr_content"<?php echo get_selected($_GET['sfl'], "wr_subject||wr_content") ?>>제목+내용</option>
                            <option value="wr_subject"<?php echo get_selected($_GET['sfl'], "wr_subject") ?>>제목</option>
                            <option value="wr_content"<?php echo get_selected($_GET['sfl'], "wr_content") ?>>내용</option>
                            <option value="mb_id"<?php echo get_selected($_GET['sfl'], "mb_id") ?>>회원아이디</option>
                            <option value="wr_name"<?php echo get_selected($_GET['sfl'], "wr_name") ?>>이름</option>
                        </select>
                    </div>
                    <label for="stx" class="sr-only">검색어<strong class="sr-only"> 필수</strong></label>
                    <input type="text" name="stx" value="<?php echo $text_stx ?>" id="stx" required class="form-control required" maxlength="20">
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> <span>검색</span></button>
                    </div>
                </div>

                <div class="search-option">
                    <label for="sop_or"><input type="radio" value="or" <?php echo ($sop == "or") ? "checked" : ""; ?> id="sop_or" name="sop">OR</label>
                    <label for="sop_and"><input type="radio" value="and" <?php echo ($sop == "and") ? "checked" : ""; ?> id="sop_and" name="sop">AND</label>
                </div>

                <script type="text/javascript">
                    function fsearch_submit(f) {
                        if (f.stx.value.length < 2) {
                            alert("검색어는 두글자 이상 입력하십시오.");
                            f.stx.select();
                            f.stx.focus();
                            return false;
                        }

                        // 검색에 많은 부하가 걸리는 경우 이 주석을 제거하세요.
                        var cnt = 0;
                        for (var i = 0; i < f.stx.value.length; i++) {
                            if (f.stx.value.charAt(i) == ' ')
                                cnt++;
                        }

                        if (cnt > 1) {
                            alert("빠른 검색을 위하여 검색어에 공백은 한개만 입력할 수 있습니다.");
                            f.stx.select();
                            f.stx.focus();
                            return false;
                        }

                        f.action = "";
                        return true;
                    }
                </script>

            </fieldset>
        </form>
    </div>
    <div id="sch_result">

        <?php
        if ($stx) {
            if ($board_count) {
                ?>
                <section id="sch_res_ov">
                    <h2 class="search-title"><span><?php echo $stx ?></span> 전체검색 결과</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">게시판</li>
                        <li class="breadcrumb-item"><?php echo $board_count ?>개</li>
                        <li class="breadcrumb-item">게시물</li>
                        <li class="breadcrumb-item"><?php echo number_format($total_count) ?>개</li>
                    </ol>
                </section>
                <?php
            }
        }
        ?>

        <?php
        if ($stx) {
            if ($board_count) {
                $str_board_list = str_replace('<li>', '<li class="list-group-item sub-list">', $str_board_list);
                ?>
                <ul id="sch_res_board" class="list-group">
                    <li class="list-group-item"><a href="?<?php echo $search_query ?>&amp;gr_id=<?php echo $gr_id ?>" <?php echo $sch_all ?>>전체게시판</a></li>
                    <?php echo $str_board_list; ?>
                </ul>

                <?php
            } else {
                ?>
                <div class="empty-result"><i class="fa fa-5x fa-exclamation-circle" aria-hidden="true"></i> <br/><br/> 검색된 자료가 하나도 없습니다.</div>
                <?php
            }
        }
        ?>

        <?php if ($stx && $board_count) { ?>
            <section class="sch_res_list">
            <?php } ?>
            <?php
            $k = 0;
            for ($idx = $table_index, $k = 0; $idx < count($search_table) && $k < $rows; $idx++) {
                ?>
                <h2 class="sub-title"><a href="./board.php?bo_table=<?php echo $search_table[$idx] ?>&amp;<?php echo $search_query ?>"><?php echo $bo_subject[$idx] ?> 게시판 내 결과</a></h2>
                <ul class="search-list">
                    <?php
                    for ($i = 0; $i < count($list[$idx]) && $k < $rows; $i++, $k++) {
                        if ($list[$idx][$i]['wr_is_comment']) {
                            $comment_def = '<span class="badge badge-success badge-sm">댓글</span> ';
                            $comment_href = '#c_' . $list[$idx][$i]['wr_id'];
                        } else {
                            $comment_def = '';
                            $comment_href = '';
                        }
                        ?>

                        <li>
                            <a href="<?php echo $list[$idx][$i]['href'] ?><?php echo $comment_href ?>" class="sch_res_title search-subject"><?php echo $comment_def ?><?php echo $list[$idx][$i]['subject'] ?></a>                           
                            <p class="search-content">
                                <a href="<?php echo $list[$idx][$i]['href'] ?><?php echo $comment_href ?>" target="_blank" class="badge badge-light badge-sm"><i class="fa fa-external-link" aria-hidden="true"></i> <span>새창</span></a>
                                <?php echo cut_str(strip_tags($list[$idx][$i]['content']), 90) ?>
                            </p>
                            <div class="wr-info">
                                <span><i class="fa fa-user" aria-hidden="true"></i> <?php echo $list[$idx][$i]['name'] ?></span>
                                <span class="sch_datetime"><?php echo $list[$idx][$i]['wr_datetime'] ?></span>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
                <div class="sch_more"><a href="./board.php?bo_table=<?php echo $search_table[$idx] ?>&amp;<?php echo $search_query ?>" class="btn btn-secondary btn-sm"><?php echo $bo_subject[$idx] ?> 결과 더보기</a></div>
            <?php } ?>
            <?php if ($stx && $board_count) { ?>
            </section>
        <?php } ?>
        <?php
        //페이징
        echo $_ASKTHEME->get_paging($page, $total_page, $_SERVER['SCRIPT_NAME'] . '?' . $search_query . '&amp;gr_id=' . $gr_id . '&amp;srows=' . $srows . '&amp;onetable=' . $onetable . '&amp;page=');
        ?>

    </div>
    <!-- } 전체검색 끝 -->
</div>
