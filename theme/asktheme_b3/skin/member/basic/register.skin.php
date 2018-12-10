<?php
if (!defined('_GNUBOARD_')) {
    exit;
} // 개별 페이지 접근 불가
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/member.css">', 0);
?>

<div class="member-wrap container">
    <h3 class="page-title"><?php echo $g5['title'] ?></h3>
    <!-- 회원가입약관 동의 시작 { -->
    <div class="mbskin register-agree">
        <form  name="fregister" id="fregister" action="<?php echo $register_action_url ?>" onsubmit="return fregister_submit(this);" method="POST" autocomplete="off">

            <div class="alert alert-info alert-sm">
                <i class="fa fa-info-circle" aria-hidden="true"></i> 회원가입약관 및 개인정보처리방침안내의 내용에 동의하셔야 회원가입 하실 수 있습니다.
            </div>

            <section id="fregister_term" class="form-group row">
                <label for="" class="col-sm-12 col-form-label">회원가입약관</label>
                <div class="col-sm-12">
                    <textarea readonly class="form-control terms" rows="7"><?php echo get_text($config['cf_stipulation']) ?></textarea>

                    <fieldset class="fregister_agree image-check">
                        <input type="checkbox" name="agree" value="1" id="agree11" class="sr-only">                        
                        <label for="agree11" class="chkbox">회원가입약관의 내용에 동의합니다.</label>
                    </fieldset>
                </div>
            </section>

            <section id="fregister_private" class="form-group row">
                <label for="" class="col-sm-12 col-form-label">개인정보처리방침안내</label>
                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <caption class="sr-only">개인정보처리방침안내</caption>
                        <thead>
                            <tr>
                                <th>목적</th>
                                <th>항목</th>
                                <th>보유기간</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>이용자 식별 및 본인여부 확인</td>
                                <td>아이디, 이름, 비밀번호</td>
                                <td>회원 탈퇴 시까지</td>
                            </tr>
                            <tr>
                                <td>고객서비스 이용에 관한 통지,<br>CS대응을 위한 이용자 식별</td>
                                <td>연락처 (이메일, 휴대전화번호)</td>
                                <td>회원 탈퇴 시까지</td>
                            </tr>
                        </tbody>
                    </table>
                    <fieldset class="fregister_agree image-check">
                        <input type="checkbox" name="agree2" value="1" id="agree22" class="sr-only">
                        <label for="agree22" class="chkbox">
                            개인정보처리방침 내용에 동의합니다.
                        </label>
                    </fieldset>
                </div>
            </section>
            <section class="form-footer">
                <button type="submit" class="btn btn-primary btn-sm btn_submit">회원가입</button>
                <a href="<?php echo G5_URL ?>" class="btn btn-sm btn-danger">취소</a>
            </section>
        </form>

        <script>
            function fregister_submit(f)
            {
                if (!f.agree.checked) {
                    alert("회원가입약관의 내용에 동의하셔야 회원가입 하실 수 있습니다.");
                    f.agree.focus();
                    return false;
                }

                if (!f.agree2.checked) {
                    alert("개인정보처리방침안내의 내용에 동의하셔야 회원가입 하실 수 있습니다.");
                    f.agree2.focus();
                    return false;
                }

                return true;
            }
        </script>
    </div>
    <!-- } 회원가입 약관 동의 끝 -->
</div>
