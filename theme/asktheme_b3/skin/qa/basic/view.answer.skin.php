<?php
/*
 * 1:1문의 답변 내용
 */
if (!defined("_GNUBOARD_")) {
    exit;
} // 개별 페이지 접근 불가
?>
<hr/>
<section id="bo_v_ans" class="qa-reply-list">
    <h4>답변: <?php echo get_text($answer['qa_subject']); ?></h4>
    <div id="ans_datetime">
        <?php echo $answer['qa_datetime']; ?>
    </div>

    <div id="ans_con" class="qa-reply-content">
        <?php echo conv_content($answer['qa_content'], $answer['qa_html']); ?>
    </div>

    <div id="ans_add" class="btn-group btn-group-sm pull-right">
        <a href="<?php echo $rewrite_href; ?>" class="btn btn-primary">추가질문</a>
        <?php if ($answer_update_href) { ?>
            <a href="<?php echo $answer_update_href; ?>" class="btn btn-secondary">답변수정</a>
        <?php } ?>
        <?php if ($answer_delete_href) { ?>
            <a href="<?php echo $answer_delete_href; ?>" class="btn btn-danger" onclick="del(this.href); return false;">답변삭제</a>
        <?php } ?>
    </div>
</section>
