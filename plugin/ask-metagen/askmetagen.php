<?php

/**
 * ASK MetaTag Generator
 * 유료 프로그램입니다. 불법복제 금지
 */
if (!defined('_GNUBOARD_')) {
    exit;
}
include_once G5_PLUGIN_PATH . DIRECTORY_SEPARATOR . 'ask-metagen' . DIRECTORY_SEPARATOR . 'askmetagen.config.php';
include_once G5_PLUGIN_PATH . DIRECTORY_SEPARATOR . 'ask-metagen' . DIRECTORY_SEPARATOR . 'askmetagen.lib.php';

$tags = new MetaTags;

//게시물 내용보기
if ($bo_table && $wr_id) {
    //게시물 가져오기
    $_tmp_view = $tags->get_view($bo_table, $wr_id, false);
    $_view = $_tmp_view['0'];
    //설명
    $_description = cut_str(strip_tags($_view['wr_content']), 120);
    //제목
    $_title = cut_str(strip_tags($_view['wr_subject']), 60);
    //URL
    $_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'] . "?bo_table={$bo_table}&wr_id={$wr_id}";
    //첨부파일
    $_file = $tags->get_file($bo_table, $wr_id, $_view['wr_content']);

    //og title을 사용자가 입력한 값으로 사용.
    if ($_view['wr_8']) {
        //title 게시물 여분필드 8번
        $_title = strip_tags($_view['wr_8']);
    }    
    //사용자 지정 메타태그가 있다면 사용
    if ($_view['wr_9']) {
        //keywords는 게시물 여분필드 9번
        $_keywords = strip_tags($_view['wr_9']);
        $tags->meta('keywords', $_keywords);
    }
    if ($_view['wr_10']) {
        //description는 게시물 여분필드 10번
        $_description = strip_tags($_view['wr_10']);
    }

    $tags->meta('description', $_description);
    $tags->og('description', $_description);
    //게시물 고유주소
    $tags->link('canonical', $_url);
    $tags->og('title', $_title);
    $tags->og('url', $_url);
    $tags->og('type', 'article');
    //첨부이미지
    if (count($_file) > 0) {
        $tags->og('image', $_file['0']);
        $_json_ld_image = $_file;
    } else {
        $_json_ld_image = G5_URL . '/img/no_img.png';
    }
    //트위터는 og 태그를 공유하기 때문에 카드타입만 설정
    $tags->twitter('card', 'summary_large_image');


    /*
     * 게시물 내용보기 구조화
     */

    //회원이미지
    $_member_image = $tags->get_member_image($_view['mb_id']);
    //Json LD
    $tags->jsonld(array(
        '@context' => 'http://schema.org',
        '@type' => 'Article',
        'mainEntityOfPage' => array(
            '@type' => 'WebPage',
            '@id' => $_url
        ),
        'name' => $_view['wr_name'],
        'author' => array(
            '@type' => 'Person',
            'name' => $_view['wr_name']
        ),
        'datePublished' => $_view['wr_datetime'],
        'headline' => $_view['wr_subject'],
        'description' => $_description,
        'image' => $_json_ld_image,
        'publisher' => array(
            '@type' => 'Organization',
            'name' => $_view['wr_name'],
            'logo' => array(
                '@type' => 'ImageObject',
                'name' => 'MemberLogo',
                'width' => '60',
                'height' => '60',
                'url' => $_member_image
            )
        ),
        'dateModified' => $_view['wr_last']
    ));
} elseif ($bo_table) {
    //게시판 목록
    $_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'] . "?bo_table={$bo_table}";
    $tags->link('canonical', $_url);
    $tags->og('title', $board['bo_subject']);
    $tags->og('url', $_url);
    $tags->og('type', 'article');
    $tags->meta('keywords', $board['bo_9']);
    $tags->meta('description', $board['bo_10']);
} elseif ($co_id) {
    $_content = $tags->get_content($co_id);
    //내용관리
    $_url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'] . "?co_id={$co_id}";
    $tags->link('canonical', $_url);
    $tags->og('title', $_content['co_subject']);
    $tags->og('url', $_url);
    $tags->og('type', 'article');
    $tags->meta('description', cut_str(strip_tags($_content['co_content']), 90));
} else {
    //일반페이지용
    $tags->link('canonical', AMG_INDEX_URL);
    $tags->og('title', AMG_INDEX_TITLE);
    $tags->og('url', AMG_INDEX_URL);
    $tags->og('type', 'website');
    $tags->meta('description', AMG_INDEX_DESCRIPTION);
    $tags->meta('keywords', AMG_INDEX_KEYWORDS);
    //$tags->og('image', '이미지 URL');
    
}

echo "<!-- ASK Metatag Generator -->" . PHP_EOL;
echo $tags->render();
echo "<!-- //ASK Metatag Generator -->\n\n" . PHP_EOL;
