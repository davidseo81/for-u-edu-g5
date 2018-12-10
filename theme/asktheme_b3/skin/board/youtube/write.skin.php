<?php
/*
 * 글쓰기 
 */
if (!defined('_GNUBOARD_')) {
    exit;
}
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/board-youtube.css">', 10);
?>
<div class="content-title-wrap " data-stellar-background-ratio='0.5'>
    <div class='container'>
        <div class='row'>
            <div class='col-sm-12 col-md-6 col-lg-6 left-side'>
                <h2><?php echo $g5['title'] ?></h2>
                <ul class='board-info board-write'>
                    <li class='d-inline-block'>Read Level:<?php echo $board['bo_read_level'] ?></li>
                    <li class='d-inline-block'>Write Level:<?php echo $board['bo_write_level'] ?></li>
                    <li class='d-inline-block'>Upload Size:<?php echo $board['bo_upload_size'] / 1024 / 1024 ?>Mb</li>
                </ul>
            </div>
            <div class='col-sm-12 col-md-6 col-lg-6'>
                <div class="text-right">

                </div>
            </div>
        </div>
    </div>
</div>
<div class="write-wrap container">
    <div class="margin-wrap-normal">
        <section id="bo_w">
            <!-- 게시물 작성/수정 시작 { -->
            <form name="fwrite" id="fwrite" action="<?php echo $action_url ?>" onsubmit="return fwrite_submit(this);" method="post" enctype="multipart/form-data" autocomplete="off" style="width:<?php echo $width; ?>">
                <input type="hidden" name="uid" value="<?php echo get_uniqid(); ?>">
                <input type="hidden" name="w" value="<?php echo $w ?>">
                <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
                <input type="hidden" name="wr_id" value="<?php echo $wr_id ?>">
                <input type="hidden" name="sca" value="<?php echo $sca ?>">
                <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
                <input type="hidden" name="stx" value="<?php echo $stx ?>">
                <input type="hidden" name="spt" value="<?php echo $spt ?>">
                <input type="hidden" name="sst" value="<?php echo $sst ?>">
                <input type="hidden" name="sod" value="<?php echo $sod ?>">
                <input type="hidden" name="page" value="<?php echo $page ?>">
                <?php
                $option = '';
                $option_hidden = '';
                if ($is_notice || $is_html || $is_secret || $is_mail) {
                    $option = '';
                    if ($is_notice) {
                        $option .= "\n" . '<input type="checkbox" id="notice" name="notice" value="1" ' . $notice_checked . '>' . "\n" . '<label for="notice">공지</label>';
                    }

                    if ($is_html) {
                        if ($is_dhtml_editor) {
                            $option_hidden .= '<input type="hidden" value="html1" name="html">';
                        } else {
                            $option .= "\n" . '<input type="checkbox" id="html" name="html" onclick="html_auto_br(this);" value="' . $html_value . '" ' . $html_checked . '>' . "\n" . '<label for="html">html</label>';
                        }
                    }

                    if ($is_secret) {
                        if ($is_admin || $is_secret == 1) {
                            $option .= "\n" . '<input type="checkbox" id="secret" name="secret" value="secret" ' . $secret_checked . '>' . "\n" . '<label for="secret">비밀글</label>';
                        } else {
                            $option_hidden .= '<input type="hidden" name="secret" value="secret">';
                        }
                    }

                    if ($is_mail) {
                        $option .= "\n" . '<input type="checkbox" id="mail" name="mail" value="mail" ' . $recv_email_checked . '>' . "\n" . '<label for="mail">답변메일받기</label>';
                    }
                }

                echo $option_hidden;
                ?>

                <div class="write-wrap">

                    <?php if ($is_name) { ?>
                        <div class="form-group row">
                            <label for="wr_name" class="col-sm-12 col-md-2 col-form-label">
                                이름<strong class="sr-only">필수</strong>
                            </label>
                            <div class="col-sm-12 col-md-4">
                                <input type="text" name="wr_name" value="<?php echo $name ?>" id="wr_name" required class="form-control required" size="10" maxlength="20">
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ($is_password) { ?>
                        <div class="form-group row">
                            <label for="wr_password" class="col-sm-12 col-md-2 col-form-label">
                                비밀번호<strong class="sr-only">필수</strong>
                            </label>
                            <div class="col-sm-12 col-md-4">
                                <input type="password" name="wr_password" id="wr_password" <?php echo $password_required ?> class="form-control <?php echo $password_required ?>" maxlength="20">
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ($is_email) { ?>
                        <div class="form-group row">
                            <label for="wr_email" class="col-sm-12 col-md-2 col-form-label">
                                이메일
                            </label>
                            <div class="col-sm-12 col-md-4">
                                <input type="text" name="wr_email" value="<?php echo $email ?>" id="wr_email" class="form-control email" size="50" maxlength="100">
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ($is_homepage) { ?>
                        <div class="form-group row">
                            <label for="wr_homepage" class="col-sm-12 col-md-2 col-form-label">
                                홈페이지
                            </label>
                            <div class="col-sm-12 col-md-4">
                                <input type="text" name="wr_email" value="<?php echo $email ?>" id="wr_email" class="form-control email" size="50" maxlength="100">
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ($option) { ?>
                        <div class="form-group row">
                            <label for="" class="col-sm-12 col-md-2 col-form-label">
                                옵션
                            </label>
                            <div class="col-sm-12 col-md-4">
                                <?php echo $option ?>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ($is_category) { ?>
                        <div class="form-group row">
                            <label for="ca_name" class="col-sm-12 col-md-2 col-form-label">
                                분류<strong class="sr-only">필수</strong>
                            </label>
                            <div class="col-sm-12 col-md-4">
                                <select name="ca_name" id="ca_name" required class="form-control required">
                                    <option value="">선택하세요</option>
                                    <?php echo $category_option ?>
                                </select>
                            </div>
                        </div>

                    <?php } ?>
                    <div class="form-group row">
                        <label for="wr_subject" class="col-sm-12 col-md-2 col-form-label">
                            제목<strong class="sr-only">필수</strong>
                        </label>
                        <div class="col-sm-12 col-md-10">
                            <div id="autosave_wrapper" class="input-group">
                                <input type="text" name="wr_subject" value="<?php echo $subject ?>" id="wr_subject" required class="form-control required" size="50" maxlength="255">
                                <?php if ($is_member) { // 임시 저장된 글 기능  ?>
                                    <script src="<?php echo G5_JS_URL; ?>/autosave.js"></script>
                                    <?php
                                    if ($editor_content_js) {
                                        echo $editor_content_js;
                                    }
                                    ?>
                                    <div class="input-group-btn">
                                        <button type="button" id="btn_autosave" class="btn btn-info">임시<span class="hidden-sm"> 저장된 글</span>(<span id="autosave_count"><?php echo $autosave_count; ?></span>)</button>
                                    </div>
                                <?php } ?>
                            </div>
                            <?php if ($is_member) { ?>
                                <div id="autosave_pop" class="autosave-wrap">
                                    <strong>임시 저장된 글 목록</strong>
                                    <div><button type="button" class="autosave_close"><img src="<?php echo $board_skin_url; ?>/img/btn_close.gif" alt="닫기"></button></div>
                                    <ul></ul>
                                    <div><button type="button" class="autosave_close"><img src="<?php echo $board_skin_url; ?>/img/btn_close.gif" alt="닫기"></button></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="wr_content" class="col-sm-12 col-md-2 col-form-label">
                            내용<strong class="sr-only">필수</strong>
                        </label>
                        <div class="col-sm-12 col-md-10 wr_content">
                            <?php if ($write_min || $write_max) { ?>
                                <!-- 최소/최대 글자 수 사용 시 -->
                                <div class="alert alert-info alert-sm" id="char_count_desc">이 게시판은 최소 <strong><?php echo $write_min; ?></strong>글자 이상, 최대 <strong><?php echo $write_max; ?></strong>글자 이하까지 글을 쓰실 수 있습니다.</div>
                            <?php } ?>
                            <?php echo $editor_html; // 에디터 사용시는 에디터로, 아니면 textarea 로 노출 ?>
                            <?php if ($write_min || $write_max) { ?>
                                <!-- 최소/최대 글자 수 사용 시 -->
                                <div id="char_count_wrap"><span id="char_count"></span>글자</div>
                            <?php } ?>
                        </div>
                    </div>

                    <?php for ($i = 1; $is_link && $i <= G5_LINK_COUNT; $i++) { ?>
                        <div class="form-group row">
                            <label for="wr_link<?php echo $i ?>" class="col-sm-12 col-md-2 col-form-label">
                                유튜브 #<?php echo $i ?>
                            </label>
                            <div class="col-sm-12 col-md-10">
                                <input type="text" name="wr_link<?php echo $i ?>" value="<?php
                                if ($w == "u") {
                                    echo$write['wr_link' . $i];
                                }
                                ?>" id="wr_link<?php echo $i ?>" class="form-control" size="50" placeholder="https://www.youtube.com/watch?v=Vl1kO9hObpA 또는 https://youtu.be/Vl1kO9hObpA 형식 유튜브 주소 입력.">
                                
                            </div>
                        </div>
                    <?php } ?>

                    <?php for ($i = 0; $is_file && $i < $file_count; $i++) { ?>
                        <div class="form-group row">
                            <label for="" class="col-sm-12 col-md-2 col-form-label">
                                파일 #<?php echo $i + 1 ?>
                            </label>
                            <div class="col-sm-12 col-md-10 form-files">
                                <input type="file" name="bf_file[]" title="파일첨부 <?php echo $i + 1 ?> : 용량 <?php echo $upload_max_filesize ?> 이하만 업로드 가능" class="form-control-file">
                                <?php if ($is_file_content) { ?>
                                    <input type="text" name="bf_content[]" value="<?php echo ($w == 'u') ? $file[$i]['bf_content'] : ''; ?>" title="파일 설명을 입력해주세요." class="form-control" size="50">
                                <?php } ?>
                                <?php if ($w == 'u' && $file[$i]['file']) { ?>
                                    <input type="checkbox" id="bf_file_del<?php echo $i ?>" name="bf_file_del[<?php echo $i; ?>]" value="1"> <label for="bf_file_del<?php echo $i ?>"><?php echo $file[$i]['source'] . '(' . $file[$i]['size'] . ')'; ?> 파일 삭제</label>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ($is_guest) { ?>
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
                    <?php } ?>
                </div>

                <div class="form-footer">
                    <div class="pull-left">
                        <a href="./board.php?bo_table=<?php echo $bo_table ?>" class="btn_cancel btn btn-danger">취소</a>
                    </div>
                    <div class="pull-right">
                        <!-- button submit 사용금지 : 글쓰기 오류남 -->
                        <input type="submit" value="작성완료" id="btn_submit" accesskey="s" class="btn_submit btn btn-primary">
                    </div>
                </div>
            </form>

            <script type="text/javascript">
                $(function () {
                    //에디터안 이미지 처리
                    $('.wr_content iframe').contents().find('.se2_inputarea img').css('max-width', '100%');
                    $('.btn_cke_sc').click(function () {
                        setTimeout(function () {
                            $('.btn_cke_sc_close').addClass('btn btn-danger btn-sm');
                        }, 100);
                    }).addClass('btn btn-secondary btn-sm');
                });
            </script>
            <script type="text/javascript">
<?php if ($write_min || $write_max) { ?>
                    // 글자수 제한
                    var char_min = parseInt(<?php echo $write_min; ?>); // 최소
                    var char_max = parseInt(<?php echo $write_max; ?>); // 최대
                    check_byte("wr_content", "char_count");

                    $(function () {
                        $("#wr_content").on("keyup", function () {
                            check_byte("wr_content", "char_count");
                        });
                    });

<?php } ?>
                function html_auto_br(obj)
                {
                    if (obj.checked) {
                        result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
                        if (result)
                            obj.value = "html2";
                        else
                            obj.value = "html1";
                    } else
                        obj.value = "";
                }

                function fwrite_submit(f)
                {
<?php echo $editor_js; // 에디터 사용시 자바스크립트에서 내용을 폼필드로 넣어주며 내용이 입력되었는지 검사함            ?>

                    var subject = "";
                    var content = "";
                    $.ajax({
                        url: g5_bbs_url + "/ajax.filter.php",
                        type: "POST",
                        data: {
                            "subject": f.wr_subject.value,
                            "content": f.wr_content.value
                        },
                        dataType: "json",
                        async: false,
                        cache: false,
                        success: function (data, textStatus) {
                            subject = data.subject;
                            content = data.content;
                        }
                    });

                    if (subject) {
                        alert("제목에 금지단어('" + subject + "')가 포함되어있습니다");
                        f.wr_subject.focus();
                        return false;
                    }

                    if (content) {
                        alert("내용에 금지단어('" + content + "')가 포함되어있습니다");
                        if (typeof (ed_wr_content) != "undefined")
                            ed_wr_content.returnFalse();
                        else
                            f.wr_content.focus();
                        return false;
                    }

                    if (document.getElementById("char_count")) {
                        if (char_min > 0 || char_max > 0) {
                            var cnt = parseInt(check_byte("wr_content", "char_count"));
                            if (char_min > 0 && char_min > cnt) {
                                alert("내용은 " + char_min + "글자 이상 쓰셔야 합니다.");
                                return false;
                            } else if (char_max > 0 && char_max < cnt) {
                                alert("내용은 " + char_max + "글자 이하로 쓰셔야 합니다.");
                                return false;
                            }
                        }
                    }

<?php echo $captcha_js; // 캡챠 사용시 자바스크립트에서 입력된 캡챠를 검사함           ?>

                    document.getElementById("btn_submit").disabled = "disabled";

                    return true;
                }
            </script>
        </section>
        <!-- } 게시물 작성/수정 끝 -->
    </div>
</div>
