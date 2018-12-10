<?php
/*
 * 1:1문의 보기
 */
if (!defined("_GNUBOARD_")) {
    exit;
} // 개별 페이지 접근 불가
include_once(G5_LIB_PATH . '/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/qalist.css">', 0);
?>
<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>
<div class="content-title-wrap " data-stellar-background-ratio='0.5'>
    <div class='container'>
        <div class='row'>
            <div class='col-sm-12 col-md-6 col-lg-6'>
                <h2><?php echo $g5['title'] ?></h2>
                <p>Contact</p>
            </div>
            <div class='col-sm-12 col-md-6 col-lg-6'>
                <div class="text-right">
                    문의를 남겨주세요.
                </div>
            </div>
        </div>
    </div>
</div>
<div class="qa-wrap container qa-view-wrap">
    <!-- 게시물 읽기 시작 { -->
    <article id="bo_v">
        <header>
            <h2 id="bo_v_title" class="qa-subject">
                <?php
                echo "[" . $view['category'] . "]";
                echo $view['subject']; // 글제목 출력
                ?>
            </h2>
        </header>

        <section id="bo_v_info" class="qa-info">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><?php echo $view['name'] ?></li>
                <li class="breadcrumb-item"><?php echo $view['datetime']; ?></li>
                <?php if ($view['email'] || $view['hp']) { ?>
                    <?php if ($view['email']) { ?>
                        <li class="breadcrumb-item"><?php echo $view['email']; ?></li>
                    <?php } ?>
                    <?php if ($view['hp']) { ?>
                        <li class="breadcrumb-item"><?php echo $view['hp']; ?></li>
                    <?php } ?>
                <?php } ?>
            </ol>
        </section>
        <!-- 게시물 상단 버튼 시작 { -->
        <div id="bo_v_top" class="qa-button">
            <?php
            ob_start();
            ?>
            <?php if ($prev_href || $next_href) { ?>
                <div class="btn-group-sm pull-left">
                    <?php if ($prev_href) { ?><a href="<?php echo $prev_href ?>" class="btn btn-secondary"><i class="fa fa-chevron-left" aria-hidden="true"></i> <span>이전글</span></a><?php } ?>
                    <?php if ($next_href) { ?><a href="<?php echo $next_href ?>" class="btn btn-secondary"><span>다음글 </span><i class="fa fa-chevron-right" aria-hidden="true"></i></a><?php } ?>
                </div>
            <?php } ?>

            <div class="btn-group-sm pull-right">
                <?php if ($update_href) { ?><a href="<?php echo $update_href ?>" class="btn btn-secondary"><i class="fa fa-pencil" aria-hidden="true"></i> <span>수정</span></a><?php } ?>
                <?php if ($delete_href) { ?><a href="<?php echo $delete_href ?>" class="btn btn-danger" onclick="del(this.href); return false;"><i class="fa fa-trash-o" aria-hidden="true"></i> <span>삭제</span></a><?php } ?>
                <a href="<?php echo $list_href ?>" class="btn btn-secondary"><i class="fa fa-list" aria-hidden="true"></i> <span>목록</span></a>
                <?php if ($write_href) { ?><a href="<?php echo $write_href ?>" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 글쓰기</a><?php } ?>
            </div>
            <?php
            $link_buttons = ob_get_contents();
            ob_end_flush();
            ?>
        </div>
        <hr/>
        <!-- } 게시물 상단 버튼 끝 -->
        <?php if ($view['download_count']) { ?>
            <!-- 첨부파일 시작 { -->
            <section id="bo_v_file" class="qa-file">
                <h2 class="sr-only">첨부파일</h2>
                <ul class="pull-left">
                    <?php
                    // 가변 파일
                    for ($i = 0; $i < $view['download_count']; $i++) {
                        ?>
                        <li>
                            <a href="<?php echo $view['download_href'][$i]; ?>" class="view_file_download">
                                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                <strong><?php echo $view['download_source'][$i] ?></strong>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </section>
            <!-- } 첨부파일 끝 -->
        <?php } ?>

        <section id="bo_v_atc" class="qa-content-wrap">
            <h2 id="bo_v_atc_title" class="sr-only">본문</h2>

            <?php
            // 파일 출력
            if ($view['img_count']) {
                echo "<div id=\"bo_v_img\">\n";

                for ($i = 0; $i < $view['img_count']; $i++) {
                    //echo $view['img_file'][$i];
                    echo get_view_thumbnail($view['img_file'][$i], $qaconfig['qa_image_width']);
                }

                echo "</div>\n";
            }
            ?>

            <!-- 본문 내용 시작 { -->
            <div id="bo_v_con" class="qa-content"><?php echo get_view_thumbnail($view['content'], $qaconfig['qa_image_width']); ?></div>
            <!-- } 본문 내용 끝 -->

            <?php if ($view['qa_type']) { ?>
                <div id="bo_v_addq" class="qa-add"><a href="<?php echo $rewrite_href; ?>" class="btn_b01">추가질문</a></div>
            <?php } ?>

        </section>

        <?php
        // 질문글에서 답변이 있으면 답변 출력, 답변이 없고 관리자이면 답변등록폼 출력
        if (!$view['qa_type']) {
            if ($view['qa_status'] && $answer['qa_id']) {
                include_once($qa_skin_path . '/view.answer.skin.php');
            } else {
                include_once($qa_skin_path . '/view.answerform.skin.php');
            }
        }
        ?>

        <?php if ($view['rel_count']) { ?>
            <section id="bo_v_rel" class="qa-relation">
                <h4><i class="fa fa-link" aria-hidden="true"></i> 연관질문</h4>
                <div class="table-qar">
                    <table class="table table-bordered">
                        <thead class="thead-default">
                            <tr>
                                <th>분류</th>
                                <th>제목</th>
                                <th>상태</th>
                                <th>등록일</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i = 0; $i < $view['rel_count']; $i++) {
                                ?>
                                <tr>
                                    <td class="td_category"><?php echo get_text($rel_list[$i]['category']); ?></td>
                                    <td>
                                        <a href="<?php echo $rel_list[$i]['view_href']; ?>">
                                            <span class="cate-show">[<?php echo get_text($rel_list[$i]['category']); ?>]</span> <?php echo $rel_list[$i]['subject']; ?>
                                        </a>
                                        <div class="sm-show">
                                            <?php echo $rel_list[$i]['name']; ?> / <?php echo $rel_list[$i]['date']; ?>
                                            <?php if ($rel_list[$i]['qa_status']) { ?>
                                                <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                                                <span class="badge badge-success">답변완료</span>
                                            <?php } else { ?>
                                                <i class="fa fa-pause" aria-hidden="true"></i>
                                                <span class="badge badge-secondary">답변대기</span>    
                                            <?php } ?>
                                        </div>
                                    </td>
                                    <td class="td_stat <?php echo ($list[$i]['qa_status'] ? 'txt_done' : 'txt_rdy'); ?>">
                                        <?php if ($rel_list[$i]['qa_status']) { ?>
                                            <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                                            <span class="badge badge-success">답변완료</span>
                                        <?php } else { ?>
                                            <i class="fa fa-pause" aria-hidden="true"></i>
                                            <span class="badge badge-secondary">답변대기</span>    
                                        <?php } ?>
                                    </td>
                                    <td class="td_date"><?php echo $rel_list[$i]['date']; ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        <?php } ?>

        <hr/>
        <!-- 링크 버튼 시작 { -->
        <div id="bo_v_bot" class="qa-button bottom">            
            <?php echo $link_buttons ?>
        </div>
        <!-- } 링크 버튼 끝 -->

    </article>
    <!-- } 게시판 읽기 끝 -->

    <script type="text/javascript">
        $(function () {
            $("a.view_image").click(function () {
                window.open(this.href, "large_image", "location=yes,links=no,toolbar=no,top=10,left=10,width=10,height=10,resizable=yes,scrollbars=no,status=no");
                return false;
            });

            // 이미지 리사이즈
            $("#bo_v_atc").viewimageresize();
        });
    </script>
</div>
