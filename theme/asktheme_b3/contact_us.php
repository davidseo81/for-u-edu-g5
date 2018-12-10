<?php
/**
 * Contact Us
 * 관리자 메일로 문의가 발송됩니다.
 */
include_once('./_common.php');
include_once(G5_CAPTCHA_PATH . '/captcha.lib.php');

$sendmail_count = (int) get_session('ss_sendmail_count') + 1;
if ($sendmail_count > 5) {
    alert_close('한번 접속후 일정수의 메일만 발송할 수 있습니다.');
}

$g5['title'] = 'Contact Us';
define('_INDEX_SUBPAGE_', true);
include_once(G5_THEME_PATH . '/head.php');
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/contact_us.css">', 1);

//관리자 메일
$email = $config['cf_admin_email'];


if (!$name) {
    $name = $email;
} else {
    $name = get_text(stripslashes($name), true);
}

if (!isset($type)) {
    $type = 0;
}

$type_checked[0] = $type_checked[1] = $type_checked[2] = "";
$type_checked[$type] = 'checked';
?>
<div class="container-fluid">
    <div class="row formmail">
        <div class='col-sm-12 cover-pattern formmail-parallax' data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-sm-12 col-md-8 col-lg-6">
                        <div class="section-header">
                            <h2>CONTACT INFO</h2>
                            <p>
                                서울시 구로구 가산디지털1로 xx-xx<br/>
                                전화 02-1234-5678<br/>
                                팩스 02-1234-5679<br/>
                                이메일: email@youremail.com

                            </p>
                        </div>
                    </div>
                </div>
                <!-- 폼메일 시작 { -->
                <div id="formmail" class="new_win mbskin formmail-wrap">
                    <form name="fformmail" action="./contact_us_send.php" onsubmit="return fformmail_submit(this);" method="post" enctype="multipart/form-data" style="margin:0px;">
                        <input type="hidden" name="to" value="<?php echo $email ?>">
                        <input type="hidden" name="attach" value="2">
                        <?php if ($is_member) { // 회원이면   ?>
                            <input type="hidden" name="fnick" value="<?php echo get_text($member['mb_nick']) ?>">
                            <input type="hidden" name="fmail" value="<?php echo $member['mb_email'] ?>">
                        <?php } ?>

                        <div class="mail-form-wrap">

                            <div class="form-group row">
                                <label for="fnick" class="col-sm-12 col-md-2 col-form-label">
                                    이름<strong class="sound_only">필수</strong>
                                </label>
                                <div class="col-sm-12 col-md-10">
                                    <input type="text" name="fnick" id="fnick" required class="form-control required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fmail" class="col-sm-12 col-md-2 col-form-label">
                                    E-mail<strong class="sound_only">필수</strong>
                                </label>
                                <div class="col-sm-12 col-md-10">
                                    <input type="text" name="fmail"  id="fmail" required class="form-control required">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="subject" class="col-sm-12 col-md-2 col-form-label">
                                    제목<strong class="sound_only">필수</strong>
                                </label>
                                <div class="col-sm-12 col-md-10">
                                    <input type="text" name="subject" id="subject" required class="form-control required">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-12 col-md-2 col-form-label">
                                    형식
                                </label>
                                <div class="col-sm-12 col-md-10">
                                    <input type="radio" name="type" value="0" id="type_text" checked> <label for="type_text">TEXT</label>
                                    <input type="radio" name="type" value="1" id="type_html"> <label for="type_html">HTML</label>
                                    <input type="radio" name="type" value="2" id="type_both"> <label for="type_both">TEXT+HTML</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="content" class="col-sm-12 col-md-2 col-form-label">
                                    내용<strong class="sound_only">필수</strong>
                                </label>
                                <div class="col-sm-12 col-md-10">
                                    <textarea name="content" id="content" required rows='8' class="form-control required"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="file1" class="col-sm-12 col-md-2 col-form-label">
                                    첨부 파일 1
                                </label>
                                <div class="col-sm-12 col-md-10">
                                    <input type="file" name="file1"  id="file1"  class="form-control-file">
                                    <div class="alert alert-info alert-sm">첨부 파일은 누락될 수 있으므로 메일을 보낸 후 파일이 첨부 되었는지 반드시 확인해 주시기 바랍니다.</div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="file2" class="col-sm-12 col-md-2 col-form-label">
                                    첨부 파일 2
                                </label>
                                <div class="col-sm-12 col-md-10">
                                    <input type="file" name="file2" id="file2" class="form-control-file">
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
                                </div>
                            </div>
                        </div>

                        <div class="form-footer">
                            <button type="submit" id="btn_submit" class="btn_submit btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i> 문의하기</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    with (document.fformmail) {
        if (typeof fname != "undefined")
            fname.focus();
        else if (typeof subject != "undefined")
            subject.focus();
    }

    function fformmail_submit(f) {
<?php echo chk_captcha_js(); ?>

        if (f.file1.value || f.file2.value) {
            // 4.00.11
            if (!confirm("첨부파일의 용량이 큰경우 전송시간이 오래 걸립니다.\n\n메일보내기가 완료되기 전에 창을 닫거나 새로고침 하지 마십시오."))
                return false;
        }

        document.getElementById('btn_submit').disabled = true;

        return true;
    }
</script>
<!-- } 폼메일 끝 -->


<?php
include_once(G5_THEME_PATH . '/tail.php');
