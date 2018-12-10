<?php
/*
 * 아웃로그인
 */
if (!defined("_GNUBOARD_")) {
    exit;
}
add_stylesheet('<link rel="stylesheet" href="' . $outlogin_skin_url . '/ask_style.css">', 0);
?>
<div class="outlogin-wrap before-login">
    <!-- 로그인 전 아웃로그인 시작 { -->
    <section id="ol_before" class="ol">
        <h2 class="sr-only">회원로그인</h2>
        <form name="foutlogin" action="<?php echo $outlogin_action_url ?>" onsubmit="return fhead_submit(this);" method="post" autocomplete="off">
            <fieldset>
                <input type="hidden" name="url" value="<?php echo $outlogin_url ?>">
                <div class="form-group">
                    <div class="input-group">
                        <div id="ol_idlabel" class="input-group-prepend"><span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i><strong class="sound_only">필수</strong></span></div>
                        <input type="text" id="ol_id" name="mb_id" required class="form-control required" maxlength="20">
                        <div class="input-group-append right-addon">
                            <span class="input-group-text">
                                <fieldset class="image-check">
                                    <input type="checkbox" name="auto_login" id="auto_login" class="sr-only">
                                    <label class="chkbox" for="auto_login">A</label>
                                </fieldset>
                            </span>
                        </div>
                    </div>

                    <div class="input-group">
                        <div id="ol_pwlabel" class="input-group-prepend"><span class="input-group-text"><i class="fa fa-unlock-alt" aria-hidden="true"></i><strong class="sound_only">필수</strong></span></div>
                        <input type="password" name="mb_password" id="ol_pw" required class="form-control required" maxlength="20">
                        <div class="input-group-append ight-addon">
                            <button type="submit" id="ol_submit" class="btn btn-primary"><i class="fa fa-sign-in" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
                <div class="form-footer">
                    <a href="<?php echo G5_BBS_URL ?>/register.php" class="btn01 btn btn-default btn-sm"><i class="fa fa-sign-in" aria-hidden="true"></i> <span>회원</span> 가입</a>
                    <a href="<?php echo G5_BBS_URL ?>/password_lost.php" target="_blank" id="ol_password_lost" class="btn02 btn btn-default btn-sm"><i class="fa fa-search" aria-hidden="true"></i> <span>정보</span>찾기</a>
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
