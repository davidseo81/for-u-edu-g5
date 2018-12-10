<?php
/*
 * 1:1 문의 리스트 
 */
if (!defined('_GNUBOARD_')) {
    exit;
} // 개별 페이지 접근 불가
// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 5;

if ($is_checkbox) {
    $colspan++;
}

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/qalist.css">', 0);
?>
<div class="content-title-wrap " data-stellar-background-ratio='0.5'>
    <div class='container'>
        <div class='row'>
            <div class='col-sm-12 col-md-6 col-lg-6'>
                <h2><?php echo $g5['title'] ?></h2>
                <p>Contact</p>
            </div>
            <div class='col-sm-12 col-md-6 col-lg-6'>
                <div class="text-right">
                    <span>Total</span> <?php echo number_format($total_count) ?>건 <?php echo $page ?> 페이지
                </div>
            </div>
        </div>
    </div>
</div>
<div class="qa-wrap container">
    <div id="bo_list">
        <!-- 게시판 페이지 정보 및 버튼 시작 { -->
        <div class="qa-header">
            <?php if ($admin_href || $write_href) { ?>
                <div class="btn-group-sm pull-right">
                    <?php if ($admin_href) { ?><a href="<?php echo $admin_href ?>" class="btn btn-secondary"><i class="fa fa-cog" aria-hidden="true"></i> <span>관리자</span></a><?php } ?>
                    <?php if ($write_href) { ?><a href="<?php echo $write_href ?>" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <span>문의</span>등록</a><?php } ?>
                </div>
            <?php } ?>
        </div>
        <!-- } 게시판 페이지 정보 및 버튼 끝 -->
        <?php if ($category_option) { ?>
            <!-- 카테고리 시작 { -->
            <ul class="nav nav-tabs qa-cate">
                <?php
                $category_option = str_replace("<li", "<li class='nav-item'", $category_option);
                $category_option = str_replace("<a", "<a class='nav-link'", $category_option);
                if (!$sca) {
                    $category_option = str_replace("<a", "<a class='nav-link'", $category_option);
                }
                echo $category_option;
                ?>
            </ul>
            <!-- } 카테고리 끝 -->
        <?php } ?>
        <form name="fqalist" id="fqalist" action="./qadelete.php" onsubmit="return fqalist_submit(this);" method="post">
            <input type="hidden" name="stx" value="<?php echo $stx; ?>">
            <input type="hidden" name="sca" value="<?php echo $sca; ?>">
            <input type="hidden" name="page" value="<?php echo $page; ?>">

            <div class="table-wrap">
                <table class="table table-hover">
                    <caption class="sr-only"><?php echo $board['bo_subject'] ?> 목록</caption>
                    <thead class="thead-default">
                        <tr>
                            <th>
                                번호
                                <?php if ($is_checkbox) { ?>
                                    <label for="chkall" class="sound_only">현재 페이지 게시물 전체</label>
                                    <input type="checkbox" id="chkall" onclick="if (this.checked)
                                                    all_checked(true);
                                                else
                                                    all_checked(false);">
                                       <?php } ?>
                            <th>분류</th>
                            <th>제목</th>
                            <th>글쓴이</th>
                            <th>상태</th>
                            <th>등록일</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 0; $i < count($list); $i++) {
                            ?>
                            <tr>
                                <td class="td_num">
                                    <?php echo $list[$i]['num']; ?>
                                    <?php if ($is_checkbox) { ?>
                                        <label for="chk_qa_id_<?php echo $i ?>" class="sound_only"><?php echo $list[$i]['subject']; ?></label>
                                        <input type="checkbox" name="chk_qa_id[]" value="<?php echo $list[$i]['qa_id'] ?>" id="chk_qa_id_<?php echo $i ?>">
                                    <?php } ?>
                                <td class="td_category"><?php echo $list[$i]['category']; ?></td>
                                <td class="td_subject">
                                    <a href="<?php echo $list[$i]['view_href']; ?>">
                                        <?php echo $list[$i]['subject']; ?>
                                    </a>
                                    <?php
                                    if ($list[$i]['icon_file'] != "") {
                                        echo '<i class="fa fa-floppy-o" aria-hidden="true"></i>';
                                    }
                                    ?>
                                    <div class="sm-show">
                                        <?php echo $list[$i]['name']; ?> / <?php echo $list[$i]['date']; ?>
                                        <?php if ($list[$i]['qa_status']) { ?>
                                            <i class="fa fa-check-circle-o" aria-hidden="true"> <span class="badge badge-success">답변완료</span></i>

                                        <?php } else { ?>
                                            <i class="fa fa-pause" aria-hidden="true"> <span class="badge badge-secondary">답변대기</span>  </i>

                                        <?php } ?>
                                    </div>
                                </td>
                                <td class="td_name"><?php echo $list[$i]['name']; ?></td>
                                <td class="td_stat <?php echo ($list[$i]['qa_status'] ? 'txt_done' : 'txt_rdy'); ?>">
                                    <?php if ($list[$i]['qa_status']) { ?>
                                        <i class="fa fa-check-circle-o" aria-hidden="true"> <span class="badge badge-success">답변완료</span></i>                                        
                                    <?php } else { ?>
                                        <i class="fa fa-pause" aria-hidden="true"> <span class="badge badge-secondary">답변대기</span> </i>                                          
                                    <?php } ?>
                                </td>
                                <td class="td_date"><?php echo $list[$i]['date']; ?></td>
                            </tr>
                            <?php
                        }
                        ?>

                        <?php
                        if ($i == 0) {
                            echo '<tr><td colspan="' . $colspan . '" class="empty_table">게시물이 없습니다.</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="qa-header">
                <?php if ($is_checkbox) { ?>

                    <div class="pull-left"><input type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed = this.value" class="btn btn-danger"></div>

                <?php } ?>

                <div class="btn-group-sm pull-right">
                    <?php if ($list_href) { ?><a href="<?php echo $list_href ?>" class="btn btn-secondary"><i class="fa fa-list" aria-hidden="true"></i> <span>목록</span></a><?php } ?>
                    <?php if ($write_href) { ?><a href="<?php echo $write_href ?>" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <span>문의</span>등록</a><?php } ?>
                </div>
            </div>
        </form>
    </div>

    <?php if ($is_checkbox) { ?>
        <noscript>
        <p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
        </noscript>
    <?php } ?>

    <div class="paging-wrap">
        <?php echo preg_replace('/(\.php)(&amp;|&)/i', '$1?', $_ASKTHEME->get_paging($page, $total_page, './qalist.php' . $qstr . '&amp;page='));?>
    </div>
    <!-- 게시판 검색 시작 { -->
    <fieldset id="bo_sch" class="search-wrap">
        <legend class="sr-only">게시물 검색</legend>

        <form name="fsearch" method="get">
            <input type="hidden" name="sca" value="<?php echo $sca ?>">
            <div class="input-group">
                <input type="text" name="stx" value="<?php echo stripslashes($stx) ?>" id="stx" required  class="form-control required" size="15" maxlength="15">
                <span class="input-group-btn">
                    <button class="btn btn-secondary" type="submit">검색</button>
                </span>
            </div>
        </form>
    </fieldset>    
    <!-- } 게시판 검색 끝 -->

    <?php if ($is_checkbox) { ?>
        <script type="text/javascript">
            function all_checked(sw) {
                var f = document.fqalist;

                for (var i = 0; i < f.length; i++) {
                    if (f.elements[i].name == "chk_qa_id[]")
                        f.elements[i].checked = sw;
                }
            }

            function fqalist_submit(f) {
                var chk_count = 0;

                for (var i = 0; i < f.length; i++) {
                    if (f.elements[i].name == "chk_qa_id[]" && f.elements[i].checked)
                        chk_count++;
                }

                if (!chk_count) {
                    alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
                    return false;
                }

                if (document.pressed == "선택삭제") {
                    if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다"))
                        return false;
                }

                return true;
            }
        </script>
    <?php } ?>
    <!-- } 게시판 목록 끝 -->
</div>
