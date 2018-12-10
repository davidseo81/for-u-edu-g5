<?php
/**
 * ASK Backup 
 * 유료 프로그램입니다. 불법복제 금지
 */
$sub_menu = '100991';
include_once "./_common.php";
include_once "./askbackup.config.php";
include_once "./askbackup.lib.php";


$g5['title'] = 'ASK DB Backup';
include_once G5_ADMIN_PATH . DIRECTORY_SEPARATOR . 'admin.head.php';
add_stylesheet('<link rel="stylesheet" href="' . G5_PLUGIN_URL . '/ask-backup/css/style.css">', 0);
?>
<h2>그누보드 DB 백업</h2>
<div class="local_desc02 local_desc">
    <p>관리자에서 간단하게 백업할 수 있습니다.</p>
    <p>백업완료되면 자동다운로드 됩니다. 대용량 백업시 오류가 날 수 있으니 SSH에 접속해 직접 Dump 하시기 바랍니다.</p>
</div>

<section class="db-list">
    <form name="fbackup" id="fbackup" action="./askbackup.update.php" method="post" enctype="multipart/form-data">
        <div class='form-action'>
            <div class='options float-left'>
                <label><input type="radio" name='data_type' value="structure"/>DB구조만 백업</label>
                <label><input type="radio" name='data_type' value="data"/>DB데이터만 백업</label>
                <label><input type="radio" name='data_type' value="all" checked="checked"/>구조,데이터 모두 백업</label>
            </div>
            <div class='float-right btn-group'>
                <button class='btn btn-primary' type='submit'>백업하기</button>
            </div>
        </div>
        <?php
        //MySQL Table schema
        $sql = "SELECT *,TABLE_COLLATION as tbl_coll, TABLE_NAME AS 'tablename', table_rows AS 'rows', (data_length + index_length) AS 'size'
                FROM information_schema.tables WHERE information_schema.tables.table_schema='" . G5_MYSQL_DB . "'";
        $result = sql_query($sql);
        $table = "<table class='db-list table table-bordered '>";
        $table .= "<thead class='thead-dark'>";
        $table .= "<tr>";
        $table .= "<th class='table-no'><label><input type='checkbox' name='allcheck' value=''> All</label></th><th>테이블명</th><th>데이터정렬방식</th><th>엔진</th><th>행</th><th>크기(Kb)</th>";
        //$table .= "<th>부담</th>";
        $table .= "</tr>";
        $table .= "<tbody>";
        $overhead_size = 0;
        for ($i = 0; $list = sql_fetch_array($result); $i++) {
            $no = $i + 1;
            /*
              $sql2 = "select DATA_FREE as data_free FROM INFORMATION_SCHEMA.PARTITIONS WHERE TABLE_SCHEMA = '" . G5_MYSQL_DB . "' AND  TABLE_NAME   = '{$list['tablename']}'";
              $tbl_status = sql_fetch($sql2);
              $tr_bg = '';
              $overhead_class = '';
              //테이블 오버헤드
              /*
              if ($tbl_status['data_free'] > 0) {
              $tr_bg = "class='overhead-table'";
              $overhead_size += $tbl_status['data_free'];
              $overhead_class = 'overhead';
              }
             * 
             */
            $table .= "<tr {$tr_bg}>";
            $table .= "<td><label for='{$list['tablename']}'><input class='{$overhead_class}' type='checkbox' name='tables[]' value='{$list['tablename']}' id='{$list['tablename']}'/> {$no}</label></td>";
            $table .= "<td><label for='{$list['tablename']}'>{$list['tablename']}</label></td>";
            $table .= "<td>{$list['tbl_coll']}</td>";
            $table .= "<td>{$list['ENGINE']}</td>";
            $table .= "<td>{$list['rows']}</td>";
            $table .= "<td><span>" . round($list['size'] / 1024, 1) . "</span> kb</td>";
            //$table .= "<td>{$tbl_status['data_free']}</td>";
            $table .= "<tr>";
        }
        $table .= "</tbody>";
        $table .= "</table>";
        echo $table;
        ?>
        <div class='form-action'>
            <?php
            /* if ($overhead_size > 0) { ?>
                <div class='float-left btn-group'>
                    <label><input type="checkbox" name='overhead' value="1"/>오버헤드가 있는 테이블</label>
                    <button class='btn btn-warning' type='submit'>테이블 최적화</button>
                </div>
            <?php } */ ?>
            <div class='float-right btn-group'>
                <button class='btn btn-primary' type='submit'>백업하기</button>
            </div>
        </div>
    </form>
</section>
<script type="text/javascript">
    $(function () {
        $('input[name=overhead]').click(function (event) {
            if ($(this).is(':checked') == true) {
                $('.overhead').attr('checked', true);
            } else {
                $('.overhead').attr('checked', false);
            }
        });
        $('input[name=allcheck]').click(function (event) {
            if ($(this).is(':checked') == true) {
                $('input[name="tables[]"]').attr('checked', true);
            } else {
                $('input[name="tables[]"]').attr('checked', false);
            }
        });
        $("#fbackup").submit(function (event) {
            if ($('input[name=data_type]').is(':checked') == false) {
                alert('백업 종류를 선택하세요. DB구조 또는 DB구조 및 데이터 백업');
                return false;
            }
            var table_arr = $('input[name="tables[]"]:checked').length;
            if (table_arr == 0) {
                alert('하나이상의 테이블을 선택하세요.');
                return false;
            }
            return true;
        });
    });
</script>
<?php
include_once G5_ADMIN_PATH . DIRECTORY_SEPARATOR . 'admin.tail.php';
