<?php
/**
 * 회사 약도
 */
include_once "./_common.php";
$g5['title'] = "오시는길";
$g5['ask_title_desc'] = 'Map';
//메뉴용 상수
define('AT_MENU_GROUP', '회사소개');
define('_INDEX_SUBPAGE_', true);
include_once(G5_THEME_PATH . '/head.php');
add_stylesheet('<link rel="stylesheet" href="' . G5_THEME_CSS_URL . '/at_map.css">', 1);
?>
<div class="map-wrap">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-sm-12 col-md-8 col-lg-6">
                <div class="section-header">
                    <h2>WAY TO COME</h2>
                    <table class="table table-condensed waytocom">
                        <tr>
                            <th>주소</th>
                            <td>서울 중구 태평로1가 54-3 가나다빌딩 1002호</td>
                        </tr>
                        <tr>
                            <th>전화</th>
                            <td>02-1234-5678</td>
                        </tr>
                        <tr>
                            <th>팩스</th>
                            <td>02-1234-5679</td>
                        </tr>
                        <tr>
                            <th>이메일</th>
                            <td>email@youremail.com</td>
                        </tr>
                        <tr>
                            <th>지하철 이용</th>
                            <td>지하철 이용 방법 안내</td>
                        </tr>
                        <tr>
                            <th>버스 이용</th>
                            <td>버스노선 및 코스 안내</td>
                        </tr>
                    </table>
                    <!--
                    <p>
                        주소 : 서울 중구 태평로1가 54-3<br/>
                        전화 02-1234-5678<br/>
                        팩스 02-1234-5679<br/>
                        이메일: email@youremail.com<br/>
                        지하철 이용 : 지하철 이용 방법 안내<br/>
                        버스 이용 : 버스노선 및 코스 안내
                    </p>
                    -->
                </div>
            </div>
        </div>
        <div class="daum-map">
            <?php
            /* 다음 지도공유 기능을로 생서하세요
             * http://tip.daum.net/question/88966094?q=%EB%8B%A4%EC%9D%8C%EC%A7%80%EB%8F%84%EA%B3%B5%EC%9C%A0
             * 스크립트에 지도 사이즈는 아래 스크립트 코드처럼 삭제하세요. mapWidth, mapHeight 삭제
             */
            ?>
            <!-- 지도시작-->
            <div id="daumRoughmapContainer1497596219798" class="root_daum_roughmap root_daum_roughmap_landing"></div>
            <script charset="UTF-8" class="daum_roughmap_loader_script" src="http://dmaps.daum.net/map_js_init/roughmapLoader.js"></script>
            <script charset="UTF-8">
                new daum.roughmap.Lander({
                    "timestamp": "1497596219798",
                    "key": "i8ky"
                }).render();
            </script>
            <!-- 지도 끝 -->

        </div>
    </div>
</div>
<?php
include_once(G5_THEME_PATH . '/tail.php');
