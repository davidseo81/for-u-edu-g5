<?php
/*
 * 쪽지보내기
 */
if (!defined('_GNUBOARD_')) {
    exit;
} // 개별 페이지 접근 불가
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/member.css">', 0);
?>
<div class="container">
    <div class="memo-wrap">
        <nav class="navbar fixed-top navbar-light bg-faded">
            <ul class="memo-menu">
                <li><a href="./memo.php?kind=recv">받은쪽지</a></li>
                <li><a href="./memo.php?kind=send">보낸쪽지</a></li>
                <li><a href="./memo_form.php">쪽지쓰기</a></li>
            </ul>
        </nav>
        <!-- 쪽지 보내기 시작 { -->
        <div id="memo_write" class="new_win mbskin">

            <form name="fmemoform" action="<?php echo $memo_action_url; ?>" onsubmit="return fmemoform_submit(this);" method="post" autocomplete="off">
                <div class="memo-form-wrap">

                    <div class="form-group row">
                        <label for="me_recv_mb_id" class="col-sm-12 col-md-2 col-form-label">
                            받는 회원아이디<strong class="sound_only">필수</strong>
                        </label>
                        <div class="col-sm-12 col-md-10">
                            <input type="text" name="me_recv_mb_id" value="<?php echo $me_recv_mb_id ?>" id="me_recv_mb_id" required class="form-control required" size="47">
                            <div class="alert alert-info alert-sm">여러 회원에게 보낼때는 컴마(,)로 구분하세요.</div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="me_memo" class="col-sm-12 col-md-2 col-form-label">
                            내용
                        </label>
                        <div class="col-sm-12 col-md-10">
                            <textarea name="me_memo" id="me_memo" required rows='8' class="form-control required"><?php echo $content ?></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-12 col-md-2 col-form-label">
                            자동등록방지
                        </label>
                        <div class="col-sm-12 col-md-10">
                            <?php
                            $captcha = captcha_html('ask-captcha');
                            $captcha = str_replace("숫자음성듣기", '<i class="fa fa-volume-up" aria-hidden="true"></i>', $captcha);
                            $captcha = str_replace("새로고침", '<i class="fa fa-refresh" aria-hidden="true"></i>', $captcha);
                            $captcha = str_replace('id="captcha_mp3"', 'id="captcha_mp3" class="btn btn-secondary"', $captcha);
                            $captcha = str_replace('id="captcha_reload"', 'id="captcha_reload" class="btn btn-secondary"', $captcha);
                            $captcha = str_replace('class="captcha_box required"', 'class="captcha_box required btn btn-outline-secondary"', $captcha);
                            echo $captcha;
                            ?>
                            <div class="alert alert-info alert-sm">쪽지 보낼때 회원당 <?php echo number_format($config['cf_memo_send_point']); ?>점의 포인트를 차감합니다.</div>
                        </div>
                    </div>
                </div>

                <div class="form-footer">
                    <input type="submit" value="보내기" id="btn_submit" class="btn_submit btn btn-sm btn-primary">
                    <button type="button" onclick="window.close();" class="btn btn-sm btn-danger">창닫기</button>
                </div>
            </form>
        </div>

        <script type="text/javascript">
            function fmemoform_submit(f) {
<?php echo chk_captcha_js(); ?>

                return true;
            }
        </script>
        <!-- } 쪽지 보내기 끝 -->
    </div>
</div>
