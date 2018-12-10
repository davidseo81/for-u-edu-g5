<?php
if (!defined("_GNUBOARD_")) {
    exit;
}
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/poll.css">', 0);
?>
<div class="container">
    <div class="poll-result-wrap sub-contents">
        <nav class="navbar fixed-top navbar-light bg-faded">
            <h3 class="page-title"><?php echo $g5['title'] ?></h3>
        </nav>
        <!-- 설문조사 결과 시작 { -->
        <div id="poll_result" class="new_win">
            <!-- 설문조사 결과 그래프 시작 { -->
            <section id="poll_result_list">
                <h2><?php echo $po_subject ?> 결과</h2>
                <span>전체 <?php echo $nf_total_po_cnt ?>표</span>
                <dl>
                    <dd>
                        <ol>
                            <?php for ($i = 1; $i <= count($list); $i++) { ?>
                                <li>
                                    <p>
                                        <?php echo $list[$i]['content'] ?>
                                        <strong><?php echo $list[$i]['cnt'] ?> 표</strong>
                                        <span><?php echo number_format($list[$i]['rate'], 1) ?> 퍼센트</span>
                                    </p>
                                    <div class="poll_result_graph">
                                        <span style="width:<?php echo number_format($list[$i]['rate'], 1) ?>%"></span>
                                    </div>
                                </li>
                            <?php } ?>
                        </ol>
                    </dd>
                </dl>
            </section>
            <!-- } 설문조사 결과 그래프 끝 -->

            <!-- 설문조사 기타의견 시작 { -->
            <?php if ($is_etc) { ?>
                <section id="poll_result_cmt">
                    <h2>이 설문에 대한 기타의견</h2>

                    <?php for ($i = 0; $i < count($list2); $i++) { ?>
                        <article>
                            <header class="poll-comment-header">
                                <h1 class="sr-only"><?php echo $list2[$i]['pc_name'] ?><span class="sound_only">님의 의견</span></h1>
                                <span class="comment-user"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $list2[$i]['name'] ?></span>
                                <span class="poll_datetime"><?php echo $list2[$i]['datetime'] ?></span>
                            </header>
                            <p class="poll-comment">
                                <?php echo $list2[$i]['idea'] ?>
                            </p>
                            <footer>
                                <span class="poll_cmt_del">
                                    <?php
                                    if ($list2[$i]['del']) {
                                        echo $list2[$i]['del'] . "삭제</a>";
                                    }
                                    ?>
                                </span>
                            </footer>
                        </article>
                    <?php } ?>

                    <?php if ($member['mb_level'] >= $po['po_level']) { ?>
                        <form name="fpollresult" action="./poll_etc_update.php" onsubmit="return fpollresult_submit(this);" method="post" autocomplete="off">
                            <input type="hidden" name="po_id" value="<?php echo $po_id ?>">
                            <input type="hidden" name="w" value="">
                            <input type="hidden" name="skin_dir" value="<?php echo urlencode($skin_dir); ?>">
                            <?php if ($is_member) { ?><input type="hidden" name="pc_name" value="<?php echo get_text(cut_str($member['mb_nick'], 255)) ?>"><?php } ?>
                            <h2><?php echo $po_etc ?></h2>

                            <div class="poll-result-comment">
                                <?php if ($is_guest) { ?>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <input type="text" name="pc_name" id="pc_name" required class="form-control required" size="10" placeholder="이름">
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="text" id="pc_idea" name="pc_idea" required class="form-control required" size="47" maxlength="100" placeholder="의견">
                                    </div>
                                </div>

                                <?php if ($is_guest) { ?>
                                    <div class="form-group row">
                                        <div class="col-sm-12 col-md-10">
                                            <?php
                                            $captcha = captcha_html('ask-captcha');
                                            $captcha = str_replace("숫자음성듣기", '<i class="fa fa-volume-up" aria-hidden="true"></i>', $captcha);
                                            $captcha = str_replace("새로고침", '<i class="fa fa-refresh" aria-hidden="true"></i>', $captcha);
                                            $captcha = str_replace('id="captcha_mp3"', 'id="captcha_mp3" class="btn btn-secondary"', $captcha);
                                            $captcha = str_replace('id="captcha_reload"', 'id="captcha_reload" class="btn btn-secondary"', $captcha);
                                            $captcha = str_replace('class="captcha_box required"', 'class="captcha_box required btn btn-secondary"', $captcha);
                                            echo $captcha;
                                            ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                            <div class="btn_confirm">
                                <input type="submit" class="btn_submit btn btn-primary" value="의견남기기">
                            </div>
                        </form>
                    <?php } ?>

                </section>
            <?php } ?>
            <!-- } 설문조사 기타의견 끝 -->

            <!-- 설문조사 다른 결과 보기 시작 { -->
            <aside id="poll_result_oth">
                <h2>다른 투표 결과 보기</h2>
                <ul>
                    <?php for ($i = 0; $i < count($list3); $i++) { ?>
                        <li><a href="./poll_result.php?po_id=<?php echo $list3[$i]['po_id'] ?>&amp;skin_dir=<?php echo urlencode($skin_dir); ?>">[<?php echo $list3[$i]['date'] ?>] <?php echo $list3[$i]['subject'] ?></a></li>
                    <?php } ?>
                </ul>
            </aside>
            <!-- } 설문조사 다른 결과 보기 끝 -->

            <div class="form-footer">
                <button type="button" onclick="window.close();" class="btn btn-danger">창닫기</button>
            </div>
        </div>

        <script type="text/javascript">
            $(function () {
                $(".poll_delete").click(function () {
                    if (!confirm("해당 기타의견을 삭제하시겠습니까?"))
                        return false;
                });
            });

            function fpollresult_submit(f) {
<?php
if ($is_guest) {
    echo chk_captcha_js();
}
?>

                return true;
            }
        </script>
        <!-- } 설문조사 결과 끝 -->
    </div>
</div>
