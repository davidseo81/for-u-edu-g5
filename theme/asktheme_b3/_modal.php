<?php
    /**
     * 모달창 팝업
     */
    if (!defined("_GNUBOARD_")) {
        exit;
    } // 개별 페이지 접근 불가
    $sql    = " select * from {$g5['new_win_table']} where '" . G5_TIME_YMDHIS . "' between nw_begin_time and nw_end_time and nw_device IN ( 'both', 'pc' )order by nw_id asc ";
    $result = sql_query($sql, false);

?>


<?php
    for ($i = 0; $nw = sql_fetch_array($result); $i++) {
        // 이미 체크 되었다면 Continue
        if ($_COOKIE["hd_pops_{$nw['nw_id']}"]) {
            continue;
        }
    ?>
    <!-- Modal -->
    <script type="text/javascript">
        $(function () {
            $('#hd_pops_<?php echo $nw['nw_id'] ?>').modal();
        });
    </script>
    <div class="modal fade" id="hd_pops_<?php echo $nw['nw_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="ask_popup" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo conv_content($nw['nw_subject'], 1); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo conv_content($nw['nw_content'], 1); ?>
                </div>
                <div class="modal-footer">
                    <button class="hd_pops_reject hd_pops_<?php echo $nw['nw_id']; ?><?php echo $nw['nw_disable_hours']; ?> btn btn-danger"  data-dismiss="modal"><?php echo $nw['nw_disable_hours']; ?>시간 동안 열지않음</button>
                    <button class="hd_pops_close hd_pops_<?php echo $nw['nw_id']; ?> btn btn-secondary"  data-dismiss="modal">닫기</button>
                </div>
            </div>
        </div>
    </div>

    <?php
        }
        if ($i == 0) {
            echo '<span class="sr-only">팝업레이어 알림이 없습니다.</span>';
        }
    ?>


<script>
    $(function () {

        $(".hd_pops_reject").click(function () {
            var id = $(this).attr('class').split(' ');
            var ck_name = id[1];
            var exp_time = parseInt(id[2]);
            $("#" + id[1]).css("display", "none");
            set_cookie(ck_name, 1, exp_time, g5_cookie_domain);
        });
        $('.hd_pops_close').click(function () {
            var idb = $(this).attr('class').split(' ');
            $('#' + idb[1]).css('display', 'none');
        });
        $("#hd").css("z-index", 1000);
    });
</script>
<!-- } 팝업레이어 끝 -->
