<?php
if (!defined("_GNUBOARD_")) {
    exit;
} // 개별 페이지 접근 불가
// 선택삭제으로 인해 셀합치기가 가변적으로 변함
$colspan = 5;
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/new.css">', 0);
?>
<div class="content-title-wrap " data-stellar-background-ratio='0.5'>
    <div class='container'>
        <div class='row'>
            <div class='col-sm-12 col-md-6 col-lg-6'>
                <h2><?php echo $g5['title'] ?></h2>
                        <p>New Articles</p>

            </div>
            <div class='col-sm-12 col-md-6 col-lg-6'>
                <div class="text-right"></div>
            </div>
        </div>
    </div>
</div>
<div class="new-wrap container">
    <!-- 전체게시물 검색 시작 { -->
    <fieldset id="new_sch" class="search-board-wrap">
        <legend class="sr-only">상세검색</legend>
        <form name="fnew" method="get">
            <div class="input-group">
                <div class="input-group-prepend">
                    <?php echo $group_select ?>
                </div>
                <label for="view" class="sr-only">검색대상</label>
                <div class="input-group-prepend">
                    <select name="view" id="view" class="">
                        <option value="">전체게시물</option>
                        <option value="w">원글만</option>
                        <option value="c">코멘트만</option>
                    </select>
                </div>
                <label for="mb_id" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
                <input type="text" name="mb_id" value="<?php echo $mb_id ?>" id="mb_id" required class="form-control required" placeholder="아이디입력">
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-secondary"><i class="fa fa-search" aria-hidden="true"></i> <span>검색</span></button>
                </div>
            </div>
        </form>
        <script type="text/javascript">
            /* 셀렉트 박스에서 자동 이동 해제
             function select_change()
             {
             document.fnew.submit();
             }
             */
            document.getElementById("gr_id").value = "<?php echo $gr_id ?>";
            document.getElementById("view").value = "<?php echo $view ?>";
        </script>
    </fieldset>
    <!-- } 전체게시물 검색 끝 -->

    <!-- 전체게시물 목록 시작 { -->
    <form name="fnewlist" method="post" action="#" onsubmit="return fnew_submit(this);">
        <input type="hidden" name="sw"       value="move">
        <input type="hidden" name="view"     value="<?php echo $view; ?>">
        <input type="hidden" name="sfl"      value="<?php echo $sfl; ?>">
        <input type="hidden" name="stx"      value="<?php echo $stx; ?>">
        <input type="hidden" name="bo_table" value="<?php echo $bo_table; ?>">
        <input type="hidden" name="page"     value="<?php echo $page; ?>">
        <input type="hidden" name="pressed"  value="">

        <div class="board-table-wrap">
            <table class="table table-hover">
                <thead class="thead-default">
                    <tr>
                        <th>
                            <?php if ($is_admin) { ?>
                                <label for="all_chk" class="sound_only">목록 전체</label>
                                <input type="checkbox" id="all_chk">
                            <?php } ?>
                            그룹
                        </th>
                        <th>게시판</th>
                        <th>제목</th>
                        <th>이름</th>
                        <th>일시</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < count($list); $i++) {
                        $num = $total_count - ($page - 1) * $config['cf_page_rows'] - $i;
                        $gr_subject = cut_str($list[$i]['gr_subject'], 20);
                        $bo_subject = cut_str($list[$i]['bo_subject'], 20);
                        $wr_subject = get_text(cut_str($list[$i]['wr_subject'], 80));
                        ?>
                        <tr>
                            <td class="td_group">
                                <?php if ($is_admin) { ?>
                                    <label for="chk_bn_id_<?php echo $i; ?>" class="sound_only"><?php echo $num ?>번</label>
                                    <input type="checkbox" name="chk_bn_id[]" value="<?php echo $i; ?>" id="chk_bn_id_<?php echo $i; ?>">
                                    <input type="hidden" name="bo_table[<?php echo $i; ?>]" value="<?php echo $list[$i]['bo_table']; ?>">
                                    <input type="hidden" name="wr_id[<?php echo $i; ?>]" value="<?php echo $list[$i]['wr_id']; ?>">
                                <?php } ?>
                                <a href="./new.php?gr_id=<?php echo $list[$i]['gr_id'] ?>"><?php echo $gr_subject ?></a>
                            </td>
                            <td class="td_board"><a href="./board.php?bo_table=<?php echo $list[$i]['bo_table'] ?>"><?php echo $bo_subject ?></a></td>
                            <td>
                                <a href="<?php echo $list[$i]['href'] ?>"><?php echo $list[$i]['comment'] ?><?php echo $wr_subject ?></a>
                                <div class="sm-show">
                                    <a href="./new.php?gr_id=<?php echo $list[$i]['gr_id'] ?>"><?php echo $gr_subject ?></a>
                                    <?php echo $list[$i]['name'] ?>
                                    <?php echo $list[$i]['datetime2'] ?>
                                </div>
                            </td>
                            <td class="td_name"><div><?php echo $list[$i]['name'] ?></div></td>
                            <td class="td_date"><?php echo $list[$i]['datetime2'] ?></td>
                        </tr>
                    <?php } ?>

                    <?php
                    if ($i == 0) {
                        echo '<tr><td colspan="' . $colspan . '" class="empty_table">게시물이 없습니다.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <?php if ($is_admin) { ?>
            <div class="sir_bw02 sir_bw">
                <button type="submit" onclick="document.pressed=this.title" title="선택삭제" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i><span class="sound_only">선택삭제</span></button>
            </div>
        <?php } ?>
    </form>

    <?php if ($is_admin) { ?>
        <script>
            $(function () {
                $('#all_chk').click(function () {
                    $('[name="chk_bn_id[]"]').attr('checked', this.checked);
                });
            });

            function fnew_submit(f)
            {
                f.pressed.value = document.pressed;

                var cnt = 0;
                for (var i = 0; i < f.length; i++) {
                    if (f.elements[i].name == "chk_bn_id[]" && f.elements[i].checked)
                        cnt++;
                }

                if (!cnt) {
                    alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
                    return false;
                }

                if (!confirm("선택한 게시물을 정말 " + document.pressed + " 하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다")) {
                    return false;
                }

                f.action = "./new_delete.php";

                return true;
            }
        </script>
    <?php } ?>
    <div class="paging-wrap">
        <?php
        //페이징
        echo $_ASKTHEME->get_paging($page, $total_page, "?gr_id=$gr_id&amp;view=$view&amp;mb_id=$mb_id&amp;page=");
        ?>
    </div>
    <!-- } 전체게시물 목록 끝 -->
</div>
