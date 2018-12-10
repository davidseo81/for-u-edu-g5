<?php

/**
 * ASK Backup 
 * 유료 프로그램입니다. 불법복제 금지
 */
$sub_menu = '100900';
include_once "./_common.php";
include_once "./askbackup.config.php";
include_once "./askbackup.lib.php";
if ($is_admin != 'super') {
    die('access denied');
}
//테이블 오버헤드 최적화
/*
if ($overhead) {
    foreach ($tables as $key => $value) {
        sql_query("optimize table `{$value}`");
    }
    alert('최적화가 완료되었습니다. ' . "optimize table `{$value}`", './askbackup.php?reload=' . time());
    exit;
}
*/
$db = new MySQLBackup(G5_MYSQL_HOST, G5_MYSQL_USER, G5_MYSQL_PASSWORD, G5_MYSQL_DB, 3306);
$db->addTables($tables); //테이블
$db->setFilename(ASK_BACKUP_DIR . DIRECTORY_SEPARATOR . 'db_' . G5_MYSQL_DB . date('Y-m-d(his)', time())); //파일명
if ($_POST['data_type'] == 'structure') {
    //DB 구조만 백업
    $db->setDumpDatas(false);
    $db->setDumpStructure(true);
} elseif ($data_type == 'data') {
    //DB 데이터만
    $db->setDumpDatas(true);
    $db->setDumpStructure(false);
} else {
    $db->setDumpDatas(true);
    $db->setDumpStructure(true);
}
$db->setCompress('zip'); //압축
$db->setDelete(true); //자동삭제
$db->setDownload(true); //자동다운로드
$db->dump();
