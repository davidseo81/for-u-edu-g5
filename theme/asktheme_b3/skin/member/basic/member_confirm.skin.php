<?php
/**
 * 비밀번호 확인
 */
if (!defined('_GNUBOARD_')) {
    exit;
} // 개별 페이지 접근 불가
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/member.css">', 0);
include_once(G5_THEME_PATH . '/head.php');
?>
<div class="member-wrap container">
    <h3 class="page-title sr-only"><?php echo $g5['title'] ?></h3>
    <!-- 회원 비밀번호 확인 시작 { -->
    <div id="mb_confirm" class="mbskin member-confirm">
        <div class="alert alert-info alert-sm">
            &middot; <strong>비밀번호를 한번 더 입력해주세요.</strong>
            <br/>
            <?php if ($url == 'member_leave.php') { ?>
                &middot;  비밀번호를 입력하시면 회원탈퇴가 완료됩니다.
            <?php } else { ?>
                &middot; 회원님의 정보를 안전하게 보호하기 위해 비밀번호를 한번 더 확인합니다.
            <?php } ?>
        </div>

        <form name="fmemberconfirm" action="<?php echo $url ?>" onsubmit="return fmemberconfirm_submit(this);" method="post">
            <input type="hidden" name="mb_id" value="<?php echo $member['mb_id'] ?>">
            <input type="hidden" name="w" value="u">

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="mb_id">아이디</span>
                </div>
                <input type="text" class="form-control" value="<?php echo $member['mb_id'] ?>" readonly placeholder="회원아이디" aria-describedby="mb_id">
            </div>

            <div class="input-group">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="confirm_mb_password" aria-describedby="mb_password">비밀번호<strong class="sound_only">필수</strong></label>
                </div>
                <input type="password" name="mb_password"  id="confirm_mb_password" required class="form-control required" size="15" maxLength="20">
            </div>

            <div class="form-footer">
                <input type="submit" value="확인" id="btn_submit" class="btn_submit btn-sm btn btn-primary">
                <a href="<?php echo G5_URL ?>" class="btn btn-sm btn-danger">취소</a>
            </div>

        </form>
    </div>

    <script type="text/javascript">
        function fmemberconfirm_submit(f) {
            document.getElementById("btn_submit").disabled = true;

            return true;
        }
    </script>
    <!-- } 회원 비밀번호 확인 끝 -->
</div>
<?php
include_once(G5_THEME_PATH . '/tail.php');
