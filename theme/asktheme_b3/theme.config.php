<?php

/**
 * ASKTHEME B3 Version 1.7.2.5
 * 이 테마는 유료 테마입니다.
 * 구매하지 않고 사용하는것은 불법입니다.
 *
 */
if (!defined('_GNUBOARD_')) {
    exit;
}
// 테마가 지원하는 장치 설정 pc, mobile
// 선언하지 않거나 값을 지정하지 않으면 그누보드5의 설정을 따른다.
// G5_SET_DEVICE 상수 설정 보다 우선 적용됨
define('G5_THEME_DEVICE', 'pc');

$theme_config = array();

// 갤러리 이미지 수 등의 설정을 지정하시면 게시판관리에서 해당 값을
// 가져오기 기능을 통해 게시판 설정의 해당 필드에 바로 적용할 수 있습니다.
// 사용하지 않는 스킨 설정은 값을 비워두시면 됩니다.

$theme_config['set_default_skin'] = false; // 기본환경설정의 최근게시물 등의 기본스킨 변경여부 true, false
$theme_config['preview_board_skin'] = 'basic'; // 테마 미리보기 때 적용될 기본 게시판 스킨
$theme_config['preview_mobile_board_skin'] = 'basic'; // 테마 미리보기 때 적용될 기본 모바일 게시판 스킨
$theme_config['cf_member_skin'] = 'basic'; // 회원 스킨
$theme_config['cf_mobile_member_skin'] = 'basic'; // 모바일 회원 스킨
$theme_config['cf_new_skin'] = 'basic'; // 최근게시물 스킨
$theme_config['cf_mobile_new_skin'] = 'basic'; // 모바일 최근게시물 스킨$theme_config[
$theme_config['cf_search_skin'] = 'basic'; // 검색 스킨
$theme_config['cf_mobile_search_skin'] = 'basic'; // 모바일 검색 스킨
$theme_config['cf_connect_skin'] = 'basic'; // 접속자 스킨
$theme_config['cf_mobile_connect_skin'] = 'basic'; // 모바일 접속자 스킨
$theme_config['cf_faq_skin'] = 'basic'; // FAQ 스킨
$theme_config['cf_mobile_faq_skin'] = 'basic'; // 모바일 FAQ 스킨
$theme_config['bo_gallery_cols'] = 4; // 갤러리 이미지 수
$theme_config['bo_gallery_width'] = 174; // 갤러리 이미지 폭
$theme_config['bo_gallery_height'] = 124; // 갤러리 이미지 높이
$theme_config['bo_mobile_gallery_width'] = 125; // 모바일 갤러리 이미지 폭
$theme_config['bo_mobile_gallery_height'] = 100; // 모바일 갤러리 이미지 높이
$theme_config['bo_image_width'] = 600; // 게시판 뷰 이미지 폭
$theme_config['qa_skin'] = 'basic'; // 1:1문의 스킨
$theme_config['qa_mobile_skin'] = 'basic';

/**
 * ASKTHEME 상수
 */
//테마 템플릿 디렉토리
define('ASKTHEME_TEMPLATE', '_template');
define('DS', DIRECTORY_SEPARATOR);
define('ASKTHEME_TEMPLATE_PATH', G5_THEME_PATH . DS . ASKTHEME_TEMPLATE);
define('ASKTHEME_TEMPLATE_HEADER', 'header');
define('ASKTHEME_TEMPLATE_HEADER_PATH', ASKTHEME_TEMPLATE_PATH . DS . ASKTHEME_TEMPLATE_HEADER);
define('ASKTHEME_TEMPLATE_PAGE', 'page');
define('ASKTHEME_TEMPLATE_PAGE_PATH', ASKTHEME_TEMPLATE_PATH . DS . ASKTHEME_TEMPLATE_PAGE);

/**
 * 해더 선택
 * _template/header 폴더에 해더 템플릿 파일이 있습니다.
 * 사용할 파일명을 아래와 같이 입력하세요
 * 원페이지용 해더는 default, gray, white 중 하나를 사용하세요.
 */
$theme_config['header'] = "header_pure.php";

/**
 * 슬라이더 선택
 */
$theme_config['slider'] = "_slider.php";

/**
 * Aside - 왼쪽메뉴형 사용여부 선택, 일반페이지는 적용되지 않습니다. 그누보드 게시판, 로그인, 회원가입, 새글등 그누보드 기능에서 출력. 일반페이지에는 직접 적용.
 * 일반페이지 상단 상수 설정으로 사용여부 선택
 * define('_INDEX_SUBPAGE_', false);//일반하위 페이지 상단에 왼쪽과 같이 설정하고 use_aside 는 true 해야 일반하위페이지도 왼쪽 메뉴가 출력됩니다.
 * 기본값은 사용하지 않음 : false
 * head_aside.php, tail_aside.php
 */
$theme_config['use_aside'] = false;

if (!class_exists(Asktheme)) {

    /**
     * ASKTHEME CLASS
     */
    class Asktheme
    {

        /**
         * 환경설정값
         * @var type
         */
        private $config;

        /**
         * G5 변수
         * @var type
         */
        private $g5;

        /**
         * member 회원변수
         * @var type
         */
        private $member;

        public function __construct()
        {
            global $config, $g5, $member;
            $this->config = $config;
            $this->g5 = $g5;
            $this->member = $member;
        }

        /**
         * 스크립트 파일명.
         * @return type
         */
        public static function get_script_name()
        {
            global $sca;
            //게시판일경우
            if (isset($_GET['bo_table'])) {
                $link = "board.php?bo_table=" . $_GET['bo_table'];
                if ($_GET['sca']) {
                    $link .= "&sca={$sca}";
                }
            } elseif (isset($_GET['co_id'])) {
                $link = "content.php?co_id=" . $_GET['co_id'];
            } else {
                $link = $_SERVER['SCRIPT_NAME'];
            }
            return $link;
        }

        /**
         * 현재메뉴의 me_code
         * @global type $g5
         * @return type
         */
        public static function get_menu_code()
        {
            global $g5, $is_admin;
            $me_link = self::get_script_name();
            $sql = "select me_code from {$g5['menu_table']} where me_use = '1' and me_link like '%{$me_link}%' order by me_code limit 1";
            $result = sql_fetch($sql);
            return $result;
        }

        /**
         * 메뉴가져오기
         * @global type $g5
         * @return type
         */
        public static function get_sub_menu()
        {
            global $g5;
            $me = self::get_menu_code();
            //두자리 가져오기
            $me_code = substr($me['me_code'], 0, 2);
            $sql = " select * from {$g5['menu_table']} where me_use = '1' and length(me_code) = '4' and substring(me_code, 1, 2) = '{$me_code}' order by me_order, me_id ";

            $result = sql_query($sql);
            $str = array();
            for ($i = 0; $rows = sql_fetch_array($result); $i++) {
                $str[] = $rows;
            }
            return $str;
        }

        /**
         * 페이징 처리
         * @param type $current_page
         * @param type $total_page
         * @param type $args
         * @return type
         */
        public function get_paging($current_page, $total_page, $args)
        {

            $list_page = $this->config['cf_write_pages'];
            //모바일은 페이징을 5 단위로 한다.
            if (is_mobile()) {
                $list_page = $this->config['cf_mobile_pages'];
            }
            $paging = get_paging($list_page, $current_page, $total_page, $args);
            $paging = str_replace('<nav class="pg_wrap"><span class="pg">', '<nav aria-label="paging"><ul class="pagination justify-content-center">' . PHP_EOL, $paging);
            $paging = str_replace('</span></nav>', '</ul></nav>' . PHP_EOL, $paging);
            $paging = str_replace('<strong class="pg_current">', '<li class="page-item active"><a class="page-link" href="#currentpage">', $paging);
            $paging = str_replace('</strong>', '<span class="sr-only">현재페이지</span></a>' . PHP_EOL, $paging);
            $paging = str_replace('<span class="sound_only">페이지</span>', '', $paging);
            $paging = str_replace('<span class="sound_only">열린</span>', '', $paging);
            $paging = str_replace('<a href=', '<li class="page-item"><a class="page-link" href=', $paging);
            $paging = str_replace('</a>', '</a></li>' . PHP_EOL, $paging);
            $paging = str_replace('처음', '<i class="fa fa-angle-double-left" aria-hidden="true"></i>', $paging);
            $paging = str_replace('맨끝', '<i class="fa fa-angle-double-right" aria-hidden="true"></i>', $paging);
            $paging = str_replace('다음', '<i class="fa fa-angle-right" aria-hidden="true"></i>', $paging);
            $paging = str_replace('이전', '<i class="fa fa-angle-left" aria-hidden="true"></i>', $paging);
            $paging = str_replace('', '', $paging);
            return $paging;
        }

        /**
         * 페이징 처리
         * @param type $paging
         * @return type
         */
        public function write_paging($paging)
        {
            $paging = str_replace('<nav class="pg_wrap"><span class="pg">', '<nav aria-label="paging"><ul class="pagination justify-content-center">' . PHP_EOL, $paging);
            $paging = str_replace('</span></nav>', '</ul></nav>' . PHP_EOL, $paging);
            $paging = str_replace('<strong class="pg_current">', '<li class="page-item active"><a class="page-link" href="#currentpage">', $paging);
            $paging = str_replace('</strong>', '<span class="sr-only">현재페이지</span></a></li>' . PHP_EOL, $paging);
            $paging = str_replace('<span class="sound_only">페이지</span>', '', $paging);
            $paging = str_replace('<span class="sound_only">열린</span>', '', $paging);
            $paging = str_replace('<a href=', '<li class="page-item"><a class="page-link" href=', $paging);
            $paging = str_replace('</a>', '</a></li>' . PHP_EOL, $paging);
            $paging = str_replace('처음', '<i class="fa fa-angle-double-left" aria-hidden="true"></i>', $paging);
            $paging = str_replace('맨끝', '<i class="fa fa-angle-double-right" aria-hidden="true"></i>', $paging);
            $paging = str_replace('다음', '<i class="fa fa-angle-right" aria-hidden="true"></i>', $paging);
            $paging = str_replace('이전', '<i class="fa fa-angle-left" aria-hidden="true"></i>', $paging);
            $paging = str_replace('', '', $paging);
            return $paging;
        }

        /**
         * 카테고리 dropdowns로 변환
         * @param type $category
         * @return type
         */
        public function category($category, $add_class = '')
        {
            $category = str_replace("<li>", '', $category);
            $category = str_replace("</li>", '', $category);
            $category = str_replace("<a ", '<a class="dropdown-item" ', $category);
            return $category;
        }

        /**
         * 카테고리 목록
         * @param type $category
         * @param type $add_class
         * @return type
         */
        public function category_ol($category, $add_class = '')
        {
            $category = str_replace("<li>", "<li class='{$add_class}'>", $category);
            return $category;
        }

        /**
         * 게시판 카테고리 가져오기
         * @param type $bo_table
         * @return type
         */
        public function get_category($bo_table)
        {
            $sql = "select bo_category_list from {$this->g5['board_table']} where bo_table = '{$bo_table}'";
            $cate = sql_fetch($sql);
            $cate = explode('|', $cate['bo_category_list']);
            return $cate;
        }

        /**
         * Print_r
         * @param type $var
         * @param type $subject
         */
        public static function print_t($var, $subject = null)
        {
            echo "<div class='well'>";
            if ($subject) {
                echo "<div class='alert alert-info alert-sm'>{$subject}</div>";
            }
            echo "<textarea style='width:100%; height: 280px;'>";
            print_r($var);
            echo "</textarea>";
            echo "</div>";
        }

        /**
         * 리다이렉트
         * @param type $uri
         * @param string $method
         * @param type $code
         */
        public static function redirect($uri = '', $method = 'auto', $code = null)
        {
            // IIS environment likely? Use 'refresh' for better compatibility
            if ($method === 'auto' && isset($_SERVER['SERVER_SOFTWARE']) && strpos($_SERVER['SERVER_SOFTWARE'], 'Microsoft-IIS') !== false) {
                $method = 'refresh';
            } elseif ($method !== 'refresh' && (empty($code) or !is_numeric($code))) {
                if (isset($_SERVER['SERVER_PROTOCOL'], $_SERVER['REQUEST_METHOD']) && $_SERVER['SERVER_PROTOCOL'] === 'HTTP/1.1') {
                    $code = ($_SERVER['REQUEST_METHOD'] !== 'GET') ? 303// reference: http://en.wikipedia.org/wiki/Post/Redirect/Get
                     : 307;
                } else {
                    $code = 302;
                }
            }

            switch ($method) {
                case 'refresh':
                    header('Refresh:0;url=' . $uri);
                    break;
                default:
                    header('Location: ' . $uri, true, $code);
                    break;
            }
            exit;
        }

        /**
         * 경고후 닫기
         * @param type $msg
         */
        public static function alert_close($msg)
        {
            echo "<script type='text/javascript'>";
            echo "alert('{$msg}'); opener.location.reload();window.close();";
            echo "</script>";
        }

        /**
         * 경고후 opener 주소 이동.
         * @param type $msg
         * @param type $url
         */
        public static function alert_redirect($msg, $url)
        {

            echo "<script type='text/javascript'>";
            echo "alert('{$msg}'); opener.location.replace('{$url}');window.close();";
            echo "</script>";
        }

        /**
         * 읽지않은 메모
         * @return type
         */
        public function get_notread_memo($mb_id)
        {
            $g5 = $this->g5;
            $sql = " select count(*) as cnt from {$g5['memo_table']} where me_recv_mb_id = '{$mb_id}' and me_read_datetime = '0000-00-00 00:00:00' ";
            $row = sql_fetch($sql);
            $memo_not_read = $row['cnt'];
            return $memo_not_read;
        }

        /**
         * 회원별명
         * @return boolean
         */
        public function get_member_nick()
        {
            if (array_key_exists('mb_nick', $this->member)) {
                $nick = get_text(cut_str($this->member['mb_nick'], $this->config['cf_cut_name']));
                return $nick;
            } else {
                return false;
            }
        }

        /**
         * 회원포인트
         * @return boolean
         */
        public function get_member_point()
        {
            if (array_key_exists('mb_point', $this->member)) {
                $point = number_format($this->member['mb_point']);
                return $point;
            } else {
                return false;
            }
        }

        /**
         * 게시판 유무 체크
         * @param $table
         * @return bool
         */
        public function is_board($table)
        {
            $sql = "select count(*) as cnt from `" . $this->g5['board_table'] . "` where `bo_table` = '{$table}'";
            $result = sql_fetch($sql);
            if ($result['cnt'] > 0) {
                return true;
            } else {
                return false;
            }
        }

        /**
         * 메세지 출력
         * @param type $message
         * @param type $type
         */
        public function message($message, $type = 'info')
        {
            $str = "<div class='alert alert-{$type} alert-dismissible fade show' role='alert'>" . PHP_EOL
                . "<h4 class='alert-heading'>Message</h4>" . PHP_EOL
                . "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>" . PHP_EOL
                . "<span aria-hidden='true'>&times;</span>" . PHP_EOL
                . "</button>" . PHP_EOL
                . "<p>{$message}</p>" . PHP_EOL
                . "</div>" . PHP_EOL;
            echo $str;
        }

        /**
         * 그룹정보 조회
         * @param type $gr_id
         * @return type
         */
        public function get_group_info($gr_id)
        {
            $g5 = $this->g5;
            $sql = " select * from {$g5['group_table']} where gr_id = '{$gr_id}' ";
            $group = sql_fetch($sql);
            return $group;
        }

        /**
         * 해당그룹의 게시판 목록
         * @param type $gr_id
         * @return type
         */
        public function get_groupboard_info($gr_id)
        {
            $g5 = $this->g5;
            $sql = " select * from {$g5['board_table']} where gr_id = '{$gr_id}' order by bo_order asc ";
            $result = sql_query($sql);
            $data = array();
            while ($rows = sql_fetch_array($result)) {
                $data[] = $rows;
            }
            return $data;
        }

        /**
         * 게시판 정보
         * @param type $bo_table
         * @return type
         */
        public function get_board_info($bo_table)
        {
            $g5 = $this->g5;
            $sql = " select * from {$g5['board_table']} where bo_table = '{$bo_table}' ";
            $board = sql_fetch($sql);
            return $board;
        }

        /**
         * 카테고리 탭형식 최신글
         * @param type $skin_dir
         * @param type $board_table
         * @param type $row
         * @param type $sub_lens
         * @return boolean|string
         */
        public function make_tab_latest($skin_dir, $board_table, $row, $sub_lens)
        {
            $rand = rand(1000, 9999);
            $board = $this->get_board_info($board_table);
            $bo_table = $board_table;
            if ($board['bo_use_category']) {
                $cate = explode('|', $board['bo_category_list']);
                $tabs = '<nav class="nav nav-tabs" id="' . $bo_table . $rand . '-tabs" role="tablist">';
                //탭 해더
                foreach ($cate as $key => $value) {
                    $active = '';
                    if ($key == 0) {
                        $active = 'active';
                    }
                    $tabs .= ' <a class="nav-item nav-link ' . $active . ' " id="' . $bo_table . $key . $rand . '-tab-list" data-toggle="tab" href="#' . $bo_table . $key . $rand . '-item" role="tab" aria-controls="' . $bo_table . $key . $rand . '-item" aria-selected="true">' . $value . '</a>';
                }
                $tabs .= '</nav>';

                //탭 컨텐츠 생성
                $tabs .= '<div class="tab-content" id="nav-tabContent' . $bo_table . $rand . '">';
                foreach ($cate as $key => $value) {
                    $active = '';
                    if ($key == 0) {
                        $active = 'active';
                    }
                    $tabs .= '<div class="tab-pane fade show ' . $active . '" id="' . $bo_table . $key . $rand . '-item" role="tabpanel" aria-labelledby="' . $bo_table . $key . $rand . '-tab-list">';
                    $tabs .= ask_tab_latest($skin_dir, $board_table, $value, $row, $sub_lens, 1);
                    $tabs .= '</div>';
                }
                $tabs .= '</div>';
                return $tabs;
            } else {
                return false;
            }
        }

        /**
         * Tab Swiper 그룹 탭 스와이퍼
         * @param type $skin_dir
         * @param type $gr_id
         * @param type $row
         * @param type $sub_lens
         * @return string
         */
        public function make_group_swiper($gr_id, $skin_dir, $row, $sub_lens, $tab_menu_lens)
        {
            $g5 = $this->g5;
            $uniq_id = cut_str(md5('item_unic_id_' . rand(1000, 2000)), 10, '');
            $group = $this->get_groupboard_info($gr_id);
            $tab_header = '<div class="swiper-container swiper-tab-menu menu_uid_' . $uniq_id . '"><div class="swiper-wrapper">';
            foreach ($group as $key => $value) {
                $select = '';
                if ($key == 0) {
                    $select = 'selected';
                }
                $tab_header .= '<div class="swiper-slide latest-equal-item ' . $select . '">' . $value['bo_subject'] . '</div>';
            }

            $tab_header .= '</div></div>';
            $tab_contents = '<div class="swiper-container swiper-tab-contents contents_uid_' . $uniq_id . '"><div class="swiper-wrapper">';
            foreach ($group as $x => $contents) {
                $tab_contents .= '<div class="swiper-slide">';
                //스킨이 배열로 넘어오면 게시판별 스킨 지정.
                if (is_array($skin_dir)) {
                    foreach ($skin_dir as $skin_key => $name) {
                        if ($contents['bo_table'] == trim($skin_key)) {
                            $skin = $name;
                        }
                    }
                } else {
                    $skin = $skin_dir;
                }
                //줄수
                if (is_array($row)) {
                    foreach ($row as $row_key => $rows) {
                        if ($contents['bo_table'] == trim($row_key)) {
                            $item_row = $rows;
                        }
                    }
                } else {
                    $item_row = $row;
                }
                //제목글자수
                if (is_array($sub_lens)) {
                    foreach ($sub_lens as $lens_key => $subject_lens) {
                        if ($contents['bo_table'] == trim($lens_key)) {
                            $item_subject_lens = $subject_lens;
                        }
                    }
                } else {
                    $item_subject_lens = $sub_lens;
                }
                $tab_contents .= latest($skin, $contents['bo_table'], $item_row, $item_subject_lens, 1);
                $tab_contents .= '</div>';
            }
            $tab_contents .= '</div></div>';

            $tab = '<div class="tab-swiper-wrap">';
            $tab .= $tab_header;
            $tab .= $tab_contents;
            $tab .= '</div>';
            $tab .= '<script>
                $(function () {
                    function setCurrentSlide(ele, index) {
                        $(".menu_uid_' . $uniq_id . ' .swiper-slide").removeClass("selected");
                        ele.addClass("selected");
                        //swiperTabMenu.initialSlide=index;
                    }

                    var swiperTabMenu = new Swiper(\'.menu_uid_' . $uniq_id . '\', {
                        slidesPerView: ' . $tab_menu_lens . ',
                        paginationClickable: true,
                        spaceBetween: 10,
                        freeMode: true,
                        loop: false,
                        on: {

                        },
                        //해상도별 제목탭 개수
                        breakpoints: {
                            1200: {
                                slidesPerView: 5,
                                spaceBetween: 10
                            },
                            1024: {
                                slidesPerView: 4,
                                spaceBetween: 10
                            },
                            990: {
                                slidesPerView: 4,
                                spaceBetween: 10
                            },
                            768: {
                                slidesPerView: 4,
                                spaceBetween: 10
                            },
                            640: {
                                slidesPerView: 4,
                                spaceBetween: 10
                            },
                            320: {
                                slidesPerView: 4,
                                spaceBetween: 10
                            }
                        }
                    });
                    swiperTabMenu.slides.each(function (index, val) {
                        var ele = $(this);
                        ele.on("click", function () {
                            setCurrentSlide(ele, index);
                            swiperTabContents.slideTo(index, 500, false);
                            //mySwiper.initialSlide=index;
                        });
                    });


                    var swiperTabContents = new Swiper(\'.contents_uid_' . $uniq_id . '\', {
                        direction: \'horizontal\',
                        loop: false,
                        autoHeight: true,
                        on: {
                            slideChangeTransitionEnd: function () {
                                var n = swiperTabContents.activeIndex;
                                setCurrentSlide($(".menu_uid_' . $uniq_id . ' .swiper-slide").eq(n), n);
                                swiperTabMenu.slideTo(n, 500, false);
                            }
                        }
                    });
                });
            </script>';
            return $tab;
        }

        /**
         * 회원 포인트 순위
         * @param type $row
         * @return type
         */
        public function point_rank($row = 10)
        {
            $g5 = $this->g5;
            $sql = "SELECT * from {$g5['member_table']} order by mb_point desc limit {$row}";
            $result = sql_query($sql);
            $point = array();
            while ($data = sql_fetch_array($result)) {
                $point[] = $data;
            }
            return $point;
        }

        /**
         * 새글리스트뽑기
         * @param type $row
         * @return type
         */
        public function new_list($row = 10)
        {
            $g5 = $this->g5;
            $sql = "select a.*, b.bo_subject, b.bo_mobile_subject, c.gr_subject, c.gr_id from {$g5['board_new_table']} a, {$g5['board_table']} b, {$g5['group_table']} c where a.bo_table = b.bo_table and b.gr_id = c.gr_id and b.bo_use_search = 1 order by a.bn_id desc limit {$row}";
            $result = sql_query($sql);
            $list = array();
            for ($i = 0; $row = sql_fetch_array($result); $i++) {
                $tmp_write_table = $g5['write_prefix'] . $row['bo_table'];

                if ($row['wr_id'] == $row['wr_parent']) {

                    // 원글
                    $comment = "";
                    $comment_link = "";
                    $row2 = sql_fetch(" select * from {$tmp_write_table} where wr_id = '{$row['wr_id']}' ");
                    $list[$i] = $row2;
                    // 당일인 경우 시간으로 표시함
                    $datetime = substr($row2['wr_datetime'], 0, 10);
                    $datetime2 = $row2['wr_datetime'];
                    if ($datetime == G5_TIME_YMD) {
                        $datetime2 = substr($datetime2, 11, 5);
                    } else {
                        $datetime2 = substr($datetime2, 5, 5);
                    }
                } else {

                    // 코멘트
                    $comment = '<i class="fa fa-commenting-o" aria-hidden="true"></i> ';
                    $comment_link = '#c_' . $row['wr_id'];
                    $row2 = sql_fetch(" select * from {$tmp_write_table} where wr_id = '{$row['wr_parent']}' ");
                    $row3 = sql_fetch(" select mb_id, wr_name, wr_email, wr_homepage, wr_datetime from {$tmp_write_table} where wr_id = '{$row['wr_id']}' ");
                    $list[$i] = $row2;
                    $list[$i]['wr_id'] = $row['wr_id'];
                    $list[$i]['mb_id'] = $row3['mb_id'];
                    $list[$i]['wr_name'] = $row3['wr_name'];
                    $list[$i]['wr_email'] = $row3['wr_email'];
                    $list[$i]['wr_homepage'] = $row3['wr_homepage'];

                    // 당일인 경우 시간으로 표시함
                    $datetime = substr($row3['wr_datetime'], 0, 10);
                    $datetime2 = $row3['wr_datetime'];
                    if ($datetime == G5_TIME_YMD) {
                        $datetime2 = substr($datetime2, 11, 5);
                    } else {
                        $datetime2 = substr($datetime2, 5, 5);
                    }
                }

                $list[$i]['gr_id'] = $row['gr_id'];
                $list[$i]['bo_table'] = $row['bo_table'];
                $list[$i]['name'] = $name;
                $list[$i]['comment'] = $comment;
                $list[$i]['href'] = G5_BBS_URL . '/board.php?bo_table=' . $row['bo_table'] . '&amp;wr_id=' . $row2['wr_id'] . $comment_link;
                $list[$i]['datetime'] = $datetime;
                $list[$i]['datetime2'] = $datetime2;

                $list[$i]['gr_subject'] = $row['gr_subject'];
                $list[$i]['bo_subject'] = ((G5_IS_MOBILE && $row['bo_mobile_subject']) ? $row['bo_mobile_subject'] : $row['bo_subject']);
                $list[$i]['wr_subject'] = $row2['wr_subject'];
            }
            return $list;
        }

    }

}
$_ASKTHEME = new Asktheme();

if (!function_exists(ask_tab_latest)) {

//탭최신글 컨텐츠
    function ask_tab_latest($skin_dir = '', $bo_table, $category, $rows, $subject_len, $cache_time = 1, $options = '')
    {
        global $g5;

        if (!$skin_dir) {
            $skin_dir = 'basic';
        }

        if (preg_match('#^theme/(.+)$#', $skin_dir, $match)) {
            if (G5_IS_MOBILE) {
                $latest_skin_path = G5_THEME_MOBILE_PATH . '/' . G5_SKIN_DIR . '/latest/' . $match[1];
                if (!is_dir($latest_skin_path)) {
                    $latest_skin_path = G5_THEME_PATH . '/' . G5_SKIN_DIR . '/latest/' . $match[1];
                }
                $latest_skin_url = str_replace(G5_PATH, G5_URL, $latest_skin_path);
            } else {
                $latest_skin_path = G5_THEME_PATH . '/' . G5_SKIN_DIR . '/latest/' . $match[1];
                $latest_skin_url = str_replace(G5_PATH, G5_URL, $latest_skin_path);
            }
            $skin_dir = $match[1];
        } else {
            if (G5_IS_MOBILE) {
                $latest_skin_path = G5_MOBILE_PATH . '/' . G5_SKIN_DIR . '/latest/' . $skin_dir;
                $latest_skin_url = G5_MOBILE_URL . '/' . G5_SKIN_DIR . '/latest/' . $skin_dir;
            } else {
                $latest_skin_path = G5_SKIN_PATH . '/latest/' . $skin_dir;
                $latest_skin_url = G5_SKIN_URL . '/latest/' . $skin_dir;
            }
        }
        //파일 캐시 사용 여부와 상관없이 게시판 정보 불러오기
        $sql = " select * from {$g5['board_table']} where bo_table = '{$bo_table}' ";
        $board = sql_fetch($sql);
        $bo_subject = get_text($board['bo_subject']);

        $cache_fwrite = false;

        $list = array();

        $tmp_write_table = $g5['write_prefix'] . $bo_table; // 게시판 테이블 전체이름
        $sql = " select * from {$tmp_write_table} where wr_is_comment = 0 and ca_name ='{$category}' order by wr_num limit 0, {$rows} ";

        $result = sql_query($sql);
        for ($i = 0; $row = sql_fetch_array($result); $i++) {
            $list[$i] = get_list($row, $board, $latest_skin_url, $subject_len);
        }

        /*
        if ($cache_fwrite) {
        $handle = fopen($cache_file, 'w');
        $cache_content = "<?php\nif (!defined('_GNUBOARD_')) exit;\n\$bo_subject='" . sql_escape_string($bo_subject) . "';\n\$list=" . var_export($list, true) . "?>";
        fwrite($handle, $cache_content);
        fclose($handle);
        }
         *
         */

        ob_start();
        include $latest_skin_path . '/latest.skin.php';
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }

}

if (!function_exists(au_file_total)) {

    /**
     * 첨부파일 개수를 게시물에 업데이트
     * @global type $g5
     * @param type $bo_table
     * @param type $wr_id
     */
    function au_file_total($bo_table, $wr_id)
    {
        global $g5;
        $write_table = $g5['write_prefix'] . $bo_table;
        $row = sql_fetch(" select count(*) as cnt from {$g5['board_file_table']} where bo_table = '{$bo_table}' and wr_id = '{$wr_id}' ");
        sql_query(" update {$write_table} set wr_file = '{$row['cnt']}' where wr_id = '{$wr_id}' ");
    }

}

if (!function_exists(youtube_link_upload)) {

    /**
     * Youtube link 썸네일 업로드 및 등록
     * @global type $bo_table
     * @global type $wr_id
     * @global type $g5
     * @param type $wr_link
     */
    function youtube_link_upload($wr_link)
    {
        global $bo_table, $wr_id, $g5;
        $youtube_desc_dir = G5_DATA_PATH . DIRECTORY_SEPARATOR . 'file' . DIRECTORY_SEPARATOR . $bo_table;
        //유튜브 주소만 처리
        if (strstr($wr_link, 'youtube.com') || strstr($wr_link, 'youtu.be')) {
            if (strstr($wr_link, 'youtube.com')) {
                parse_str(parse_url($wr_link, PHP_URL_QUERY), $my_arr);
                $youtube_url = $my_arr['v'];
            } elseif (strstr($wr_link, 'youtu.be')) {
                preg_match("/youtu.be\/([^&]+)/", $wr_link, $my_arr);
                $youtube_url = $my_arr['1'];
            }

            parse_str(parse_url($wr_link, PHP_URL_QUERY), $my_arr);
            $wr_file_name = "youtube_" . $bo_table . "_" . md5($youtube_url) . '.jpg';
            $wr_file_path = $youtube_desc_dir . DIRECTORY_SEPARATOR . $wr_file_name;

            //파일이 없으면 업로드
            if (!file_exists($wr_file_path)) {
                //sddefault.jpg ,maxresdefault.jpg
                file_put_contents($wr_file_path, file_get_contents("http://img.youtube.com/vi/{$youtube_url}/sddefault.jpg"));

                //이미지 정보
                $file_info = getimagesize($wr_file_path);
                //파일사이즈
                $file_size = filesize($wr_file_path);
                //첨부파일 마지막 번호
                $last_bf_no = sql_fetch("select * from {$g5['board_file_table']} where bo_table = '{$bo_table}' and wr_id='{$wr_id}' order by bf_no desc");
                if ($last_bf_no) {
                    $bf_no = $last_bf_no['bf_no'] + 1;
                } else {
                    $bf_no = "0";
                }
                //DB 입력
                $sql = " insert into {$g5['board_file_table']}
                    set bo_table = '{$bo_table}',
                         wr_id = '{$wr_id}',
                         bf_no = '{$bf_no}',
                         bf_source = '{$youtube_url}.jpg',
                         bf_file = '{$wr_file_name}',
                         bf_content = 'youtube image',
                         bf_download = 0,
                         bf_filesize = '{$file_size}',
                         bf_width = '{$file_info['0']}',
                         bf_height = '{$file_info['1']}',
                         bf_type = '{$file_info['2']}',
                         bf_datetime = '" . G5_TIME_YMDHIS . "' ";
                sql_query($sql);
                // 파일의 개수를 게시물에 업데이트 한다.
                au_file_total($bo_table, $wr_id);
                return true;
            }
        }
    }

}

if (!function_exists(auth_idcheck)) {
    function auth_idcheck()
    {
        global $g5, $member;
        $is_auth = false;
        $sql = " select count(*) as cnt from {$g5['auth_table']} where mb_id = '{$member['mb_id']}' ";
        $row = sql_fetch($sql);
        if ($row['cnt']) {
            $is_auth = true;
        }
        return $is_auth;
    }
}


if (!function_exists(filemtime_remote)) {
    /**
     * 서버 파일 최종 수정시간 체크
     */
    function filemtime_remote($uri)
    {
        //자기 서버는 직접 체크
        if (strstr(trim($uri), $_SERVER['HTTP_HOST']) == true) {
            $path = str_replace('https://', '', $uri);
            $path = str_replace('http://', '', $path);
            $path = str_replace($_SERVER['HTTP_HOST'], '', $path);
            $path = preg_replace('/\?.*/', '', $path);
            return @filemtime(getcwd() . $path);
        } else {
            $uri = parse_url($uri);
            $handle = @fsockopen($uri['host'], 80);
            if (!$handle) {
                return 0;
            }

            fputs($handle, "GET $uri[path] HTTP/1.1\r\nHost: $uri[host]\r\n\r\n");
            $result = 0;
            while (!feof($handle)) {
                $line = fgets($handle, 1024);
                if (!trim($line)) {
                    break;
                }

                $col = strpos($line, ':');
                if ($col !== false) {
                    $header = trim(substr($line, 0, $col));
                    $value = trim(substr($line, $col + 1));
                    if (strtolower($header) == 'last-modified') {
                        $result = strtotime($value);
                        break;
                    }
                }
            }
            fclose($handle);
            return $result;
        }
    }
}

if (!function_exists(get_lastmodify_date)) {
    /**
     * 메뉴에등록된 경로 최종수정시간 가져오기
     */
    function get_lastmodify_date($link)
    {
        global $g5;
        if (strstr($link, 'board.php')) {
            //게시판일 경우 마지막 게시물 업데이트 시간
            //테이블명 가져오기
            $tmp_board = explode('?bo_table=', $link);
            $tmp_table = explode('&', $tmp_board['1']);
            $table_name = $tmp_table['0'];
            $query = "select wr_datetime from {$g5['write_prefix']}free order by wr_datetime desc limit 1";
            $last_article = sql_fetch($query);
            $lastmod = substr($last_article['wr_datetime'], 0, 10);
        } else if (strstr($link, 'qalist.php')) {
            //QA일 경우 마지막 게시물 업데이트 시간
            $query = "select qa_datetime from {$g5['qa_content_table']} order by qa_datetime desc limit 1";
            $last_article = sql_fetch($query);
            $lastmod = substr($last_article['qa_datetime'], 0, 10);
        } else if (strstr($link, 'qalist.php')) {
            //NEW일 경우 마지막 게시물 업데이트 시간
            $query = "select bn_datetime from {$g5['board_new_table']} order by bn_datetime desc limit 1";
            $last_article = sql_fetch($query);
            $lastmod = substr($last_article['bn_datetime'], 0, 10);
        } else {
            //일반 파일 수정일
            $lastmod = date("Y-m-d", filemtime_remote($link));
        }
        return $lastmod;
    }
}