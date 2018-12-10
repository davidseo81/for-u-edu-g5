<?php
/*
 * 아웃로그인 - basic simple
 */
if (!defined("_GNUBOARD_")) {
    exit;
}
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/outlogin-basic-simple.css">', 0);
?>
<div class="outlogin-simple-wrap before-login">
    <!-- 로그인 전 아웃로그인 시작 { -->
    <section id="ol_before" class="ol">
        <h3 class='sr-only'>회원로그인</h3>
        <form name="foutlogin" action="<?php echo $outlogin_action_url ?>" onsubmit="return fhead_submit(this);" method="post" autocomplete="off">
            <fieldset>
                <input type="hidden" name="url" value="<?php echo $outlogin_url ?>">
                <div class='d-flex'>
                    <div class='flex-column'>
                        <div class="form-group border">
                            <label for="ol_id" class='sr-only'>Member ID</label>
                            <input type="text" id="ol_id" name="mb_id" required class="form-control required border-0" maxlength="20" placeholder="회원아이디 입력" autocomplete="off">
                        </div>
                        <div class="form-group border border-top-0">
                            <label for="ol_pw" class='sr-only'>Password</label>
                            <input type="password" name="mb_password" id="ol_pw" required class="form-control required border-0" maxlength="20" placeholder="회원 비밀번호 입력" autocomplete="off">
                        </div>
                    </div>
                    <div class='button-wrap align-self-stretch'>
                        <button type="submit" id="ol_submit" class="btn btn-primary btn-sm">로그인</button>
                    </div>
                </div>
                <div class="login-menu d-flex justify-content-center1">
                    <fieldset class="image-check flex-row mr-auto">
                        <input type="checkbox" name="auto_login" id="auto_login" class="sr-only">
                        <label class="chkbox" for="auto_login">Auto</label>
                    </fieldset>
                    <a href="<?php echo G5_BBS_URL ?>/register.php" class="flex-row btn01 btn btn-default btn-sm">
                        <i class="fa fa-sign-in" aria-hidden="true"></i>
                        <span>회원</span> 가입
                    </a>
                    <a href="<?php echo G5_BBS_URL ?>/password_lost.php" target="_blank" id="ol_password_lost" class="flex-row btn02 btn btn-default btn-sm">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        <span>정보</span>찾기
                    </a>
                </div>
            </fieldset>
        </form>
        <?php
        // 소셜로그인 사용시 소셜로그인 버튼
        @include_once(get_social_skin_path() . '/social_outlogin.skin.1.php');
        ?>
    </section>
    <script type="text/javascript">
        $(function () {

            $("#auto_login").click(function () {
                if ($(this).is(":checked")) {
                    if (!confirm("자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?"))
                        return false;
                }
            });
        });

        function fhead_submit(f) {
            return true;
        }
    </script>
    <!-- } 로그인 전 아웃로그인 끝 -->
</div>
