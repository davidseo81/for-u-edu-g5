<?php
/*
 * 로그인 스킨
 */
if (!defined('_GNUBOARD_')) {
    exit;
}
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/member.css">', 0);
include_once(G5_THEME_PATH . '/head.php');
?>
<div class="member-wrap container">
    <div class="member-login">
        <h3 class="page-title sr-only"><?php echo $g5['title'] ?></h3>
        <!-- 로그인 시작 { -->
        <div id="mb_login" class="mbskin fadeInUp_1">
            <form name="flogin" action="<?php echo $login_action_url ?>" onsubmit="return flogin_submit(this);" method="post">
                <input type="hidden" name="url" value="<?php echo $login_url ?>">

                <legend class="sr-only">회원로그인</legend>
                <div class="input-group">
                    <label for="login_id" class="login_id input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-id-badge" aria-hidden="true"></i><strong class="sound_only"> 필수</strong>
                        </div>
                    </label>
                    <input type="text" name="mb_id" id="login_id" required class="form-control required" size="20" maxLength="20">
                    <span class="input-group-append">
                        <div class="input-group-text btn-right">
                            <fieldset class="image-check">
                                <input type="checkbox" name="auto_login" id="login_auto_login" class="sr-only">
                                <label class="chkbox" for="login_auto_login">Auto</label>
                            </fieldset>
                        </div>
                    </span>
                </div>
                <div class="input-group">
                    <label for="login_pw" class="login_pw input-group-prepend">
                        <div class="input-group-text btn-right">
                            <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                            <strong class="sound_only"> 필수</strong>
                        </div>
                    </label>
                    <input type="password" name="mb_password" id="login_pw" required class="form-control required" size="20" maxLength="20">
                    <span class="input-group-append btn-right">
                        <button type="submit" class="btn btn-secondary login-button">로그인</button>
                    </span>
                </div>
                <div class="form-footer">
                    <a href="<?php echo G5_BBS_URL ?>/password_lost.php" target="_blank" id="login_password_lost" class="btn02 btn btn-default btn-sm"><i class="fa fa-search" aria-hidden="true"></i>
                        <span>아이디 비밀번호</span>
                        찾기</a>
                    <a href="./register.php" class="btn01 btn btn-default btn-sm"><i class="fa fa-sign-in" aria-hidden="true"></i>
                        <span>회원</span> 가입</a>
                </div>
                <?php
                // 소셜로그인 사용시 소셜로그인 버튼
                @include_once(get_social_skin_path() . '/social_login.skin.php');
                ?>
                <aside id="login_info" class="sr-only">
                    <h3 class="sr-only">회원로그인 안내</h3>
                    <p class="alert alert-info alert-sm">
                        &middot; 아이디/비밀번호 분실시 아이디/비밀번호 찾기를 이용하십시오.<br/>
                        &middot; 아직 회원이 아니시라면 회원으로 가입 후 이용해 주십시오.
                    </p>
                </aside>

            </form>
        </div>

        <script type="text/javascript">
            $(function () {
                $("#login_auto_login").click(function () {
                    if (this.checked) {
                        this.checked = confirm("자동로그인을 사용하시면 다음부터 회원아이디와 비밀번호를 입력하실 필요가 없습니다.\n\n공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?");
                    }
                });
            });

            function flogin_submit(f) {
                return true;
            }
        </script>
        <!-- } 로그인 끝 -->
    </div>
</div>
<?php
include_once(G5_THEME_PATH . '/tail.php');
