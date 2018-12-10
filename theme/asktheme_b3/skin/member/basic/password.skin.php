<?php
if (!defined('_GNUBOARD_')) {
    exit;
} // 개별 페이지 접근 불가
$delete_str = "";
if ($w == 'x') {
    $delete_str = "댓";
}
if ($w == 'u') {
    $g5['title'] = $delete_str . "글 수정";
} else if ($w == 'd' || $w == 'x') {
    $g5['title'] = $delete_str . "글 삭제";
} else {
    $g5['title'] = $g5['title'];
}

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/member.css">', 0);
include_once(G5_THEME_PATH . '/head.php');
?>
<div class="password-wrap container">
    <h3 class="page-title"><?php echo $g5['title'] ?></h3>
    <!-- 비밀번호 확인 시작 { -->
    <div id="pw_confirm" class="mbskin password-confirm">
        <div class="alert alert-danger">
            <?php if ($w == 'u') { ?>
                <strong>작성자만 글을 수정할 수 있습니다.</strong><br/>
                작성자 본인이라면, 글 작성시 입력한 비밀번호를 입력하여 글을 수정할 수 있습니다.
            <?php } else if ($w == 'd' || $w == 'x') { ?>
                <strong>작성자만 글을 삭제할 수 있습니다.</strong><br/>
                작성자 본인이라면, 글 작성시 입력한 비밀번호를 입력하여 글을 삭제할 수 있습니다.
            <?php } else { ?>
                <strong>비밀글 기능으로 보호된 글입니다.</strong><br/>
                작성자와 관리자만 열람하실 수 있습니다. 본인이라면 비밀번호를 입력하세요.
            <?php } ?>
        </div>


        <form name="fboardpassword" action="<?php echo $action; ?>" method="post">
            <input type="hidden" name="w" value="<?php echo $w ?>">
            <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
            <input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
            <input type="hidden" name="comment_id" value="<?php echo $comment_id ?>">
            <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
            <input type="hidden" name="stx" value="<?php echo $stx ?>">
            <input type="hidden" name="page" value="<?php echo $page ?>">

            <div class="input-group">
                <label for="password_wr_password" class="input-group-prepend">
                    <div class="input-group-prepend">
                        <i class="fa fa-unlock-alt" aria-hidden="true"> <span>비밀번호</span></i><strong class="sound_only">필수</strong>
                    </div>
                </label>
                <input type="password" name="wr_password" id="password_wr_password" required class="form-control required" size="15" maxLength="20">
                <div class="input-group-btn"> 
                    <button type="submit" class="btn btn-sm btn-primary">확인</button>
                </div>
            </div>
        </form>

        <br/>
        <div class="form-footer">
            <a href="<?php echo $return_url ?>" class="btn btn-sm btn-secondary">돌아가기</a>
        </div>

    </div>
</div>
<!-- } 비밀번호 확인 끝 -->
<?php
include_once(G5_THEME_PATH . '/tail.php');
