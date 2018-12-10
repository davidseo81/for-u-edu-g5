<?php
/*
 * 회원정보찾기
 */
if (!defined('_GNUBOARD_')) {
    exit;
} // 개별 페이지 접근 불가
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/member.css">', 0);
?>
<div class="container">
    <div class="lost-password-wrap">
        <nav class="navbar fixed-top navbar-light bg-faded">
            <h3 class="page-title"><?php echo $g5['title'] ?></h3>
        </nav>
        <!-- 회원정보 찾기 시작 { -->
        <div id="find_info" class="new_win mbskin lost-password-form-wrap">
            <form name="fpasswordlost" action="<?php echo $action_url ?>" onsubmit="return fpasswordlost_submit(this);" method="post" autocomplete="off">
                <fieldset id="info_fs">
                    <div class="alert alert-info alert-sm">
                        회원가입 시 등록하신 이메일 주소를 입력해 주세요.<br/>
                        해당 이메일로 아이디와 비밀번호 정보를 보내드립니다.
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-envelope-o" aria-hidden="true"></i><strong class="sound_only">필수</strong></div>
                        </div>
                        <input type="text" name="mb_email" id="mb_email" required class="required form-control email" size="30" placeholder="email을 입력하세요">
                    </div>
                </fieldset>
                <div class="form-group">
                    <div class="captcha">
                        <?php
                        $captcha = captcha_html('ask-captcha');
                        $captcha = str_replace("숫자음성듣기", '<i class="fa fa-volume-up" aria-hidden="true"></i>', $captcha);
                        $captcha = str_replace("새로고침", '<i class="fa fa-refresh" aria-hidden="true"></i>', $captcha);
                        $captcha = str_replace('id="captcha_mp3"', 'id="captcha_mp3" class="btn btn-secondary"', $captcha);
                        $captcha = str_replace('id="captcha_reload"', 'id="captcha_reload" class="btn btn-secondary"', $captcha);
                        $captcha = str_replace('class="captcha_box required"', 'class="captcha_box required btn btn-outline-secondary"', $captcha);
                        echo $captcha;
                        ?>
                    </div>
                </div>


                <div class="form-footer">
                    <input type="submit" value="확인" class="btn_submit btn btn-sm btn-primary">
                    <button type="button" onclick="window.close();" class="btn btn-sm btn-danger">창닫기</button>
                </div>
            </form>
        </div>

        <script type="text/javascript">
            function fpasswordlost_submit(f) {
<?php echo chk_captcha_js(); ?>

                return true;
            }

            $(function () {
                var sw = screen.width;
                var sh = screen.height;
                var cw = document.body.clientWidth;
                var ch = document.body.clientHeight;
                var top = sh / 2 - ch / 2 - 100;
                var left = sw / 2 - cw / 2;
                moveTo(left, top);
            });
        </script>
        <!-- } 회원정보 찾기 끝 -->
    </div>
</div>
