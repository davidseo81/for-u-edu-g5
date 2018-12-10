<?php

//유튜브 링크가 있다면 썸네일용 유튜브 이미지 등록.
if ($wr_link1) {
    youtube_link_upload($wr_link1);
}
if ($wr_link2) {
    youtube_link_upload($wr_link2);
}